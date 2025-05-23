<?php
class Producto
{
    private $conn;
    private $table = 'producto';

    public $id_producto;
    public $nombre;
    public $valor_unitario;
    public $estado;
    public $id_categoria;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function read()
    {
        $query = "SELECT p.*, c.nombre AS nombre_categoria 
                  FROM producto p 
                  INNER JOIN categoria c ON p.id_categoria = c.id_categoria";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function create()
    {
        $query = "INSERT INTO " . $this->table . " 
                 (nombre, valor_unitario, estado, id_categoria)
                 VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);

        $stmt->bind_param(
            "sdii",
            $this->nombre,
            $this->valor_unitario,
            $this->estado,
            $this->id_categoria
        );

        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->valor_unitario = htmlspecialchars(strip_tags($this->valor_unitario));
        $this->estado = htmlspecialchars(strip_tags($this->estado));
        $this->id_categoria = htmlspecialchars(strip_tags($this->id_categoria));

        return $stmt->execute();
    }

    public function update()
    {
        $query = "UPDATE " . $this->table . " SET 
                  nombre = ?,
                  valor_unitario = ?,
                  estado = ?,
                  id_categoria = ?
                  WHERE id_producto = ?";
        $stmt = $this->conn->prepare($query);

        $stmt->bind_param(
            "sdiii",
            $this->nombre,
            $this->valor_unitario,
            $this->estado,
            $this->id_categoria,
            $this->id_producto
        );

        $this->id_producto = htmlspecialchars(strip_tags($this->id_producto));
        // Other sanitizations same as create

        return $stmt->execute();
    }

    public function delete()
    {
        // Verifica si hay detalles asociados
        $queryCheck = "SELECT COUNT(*) as total FROM detalle_pedido WHERE id_producto = ?";
        $stmtCheck = $this->conn->prepare($queryCheck);
        $stmtCheck->bind_param("i", $this->id_producto);
        $stmtCheck->execute();
        $result = $stmtCheck->get_result();
        $row = $result->fetch_assoc();
        $stmtCheck->close();

        if ($row['total'] > 0) {
            // Hay pedidos asociados, muestra mensaje y no elimina
            echo "<div class='alert alert-danger'>No se puede eliminar el producto porque tiene pedidos asociados.</div>";
            return false;
        }

        // Si no hay detalles asociados, elimina normalmente
        $query = "DELETE FROM " . $this->table . " WHERE id_producto = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $this->id_producto);
        $this->id_producto = htmlspecialchars(strip_tags($this->id_producto));
        return $stmt->execute();
    }
}
