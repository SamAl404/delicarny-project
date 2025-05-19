<?php
require_once("modelos/producto.php");

class ProductoControlador {
    private $modelo;

    public function __construct($conexion) {
        $this->modelo = new Producto($conexion);
    }

    public function manejarSolicitud() {
        $accion = $_GET['accion'] ?? '';
        $id = $_GET['id'] ?? null;

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $data = [
                'nombre' => $_POST['nombre'],
                'valor_unitario' => $_POST['valor_unitario'],
                'estado' => $_POST['estado'],
                'id_categoria' => $_POST['id_categoria']
            ];

            if (!empty($_POST['id_producto'])) {
                $this->modelo->actualizar($_POST['id_producto'], $data);
            } else {
                $this->modelo->insertar($data);
            }

            header("Location: index.php");
            exit;
        }

        if ($accion === "eliminar" && $id) {
            $this->modelo->eliminar($id);
            header("Location: index.php");
            exit;
        }

        $productos = $this->modelo->obtenerTodos();
        $productoEditar = ($accion === "editar" && $id) ? $this->modelo->obtenerPorId($id) : null;

        require("vista/productoVista.php");
    }
}