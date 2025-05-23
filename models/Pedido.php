<?php
require_once 'config/database.php';

class Pedido
{
    private $db;

    public function __construct()
    {
        $this->db = Database::conexion();
    }

    public function crearPedido($id_cliente, $carrito, $direccion = '')
    {
        // Total del carrito
        $total = array_reduce($carrito, function ($sum, $item) {
            return $sum + ($item['precio'] * $item['cantidad']);
        }, 0);

        // Creamos el pedido
        $sql = "INSERT INTO Pedido (direccion, fecha_facturacion, valor_total, estado, id_cliente, id_tipoPago) 
                VALUES (?, NOW(), ?, 'Pendiente', ?, 1)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$direccion, $total, $id_cliente]);

        $id_pedido = $this->db->lastInsertId();

        // Insertamos el detalle de pedido
        $sqlDetalle = "INSERT INTO Detalle_Pedido (cantidad, sub_total, id_pedido, id_producto) 
                    VALUES (?, ?, ?, ?)";
        $stmtDetalle = $this->db->prepare($sqlDetalle);

        foreach ($carrito as $id_producto => $item) {
            $subtotal = $item['precio'] * $item['cantidad'];
            $stmtDetalle->execute([$item['cantidad'], $subtotal, $id_pedido, $id_producto]);
        }
    }

    // Aquí puedes agregar funciones como listar pedidos, cambiar estado, etc.
}
