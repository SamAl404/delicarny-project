<?php
require_once '../models/Producto.php';
require_once '../config/database.php';

class ProductoController
{
    private $model;

    public function __construct()
    {
        $this->model = new Producto(Database::conexion());
    }

    public function listProducts()
    {
        return $this->model->read();
    }

    public function handleRequest()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['action'])) {
                switch ($_POST['action']) {
                    case 'create':
                        $this->model->nombre = $_POST['nombre'];
                        $this->model->valor_unitario = $_POST['valor_unitario'];
                        $this->model->estado = $_POST['estado'];
                        $this->model->id_categoria = $_POST['id_categoria'];

                        if ($this->model->create()) {
                            header("Location: productos.php");
                        } else {
                            echo "Error creando producto.";
                        }
                        exit();

                    case 'update':
                        $this->model->id_producto = $_POST['id_producto'];
                        $this->model->nombre = $_POST['nombre'];
                        $this->model->valor_unitario = $_POST['valor_unitario'];
                        $this->model->estado = $_POST['estado'];
                        $this->model->id_categoria = $_POST['id_categoria'];
                        if ($this->model->update()) {
                            header("Location: productos.php");
                        } else {
                            echo "Error Actualizando producto.";
                        }
                        exit();

                    case 'delete':
                        $this->model->id_producto = $_POST['id_producto'];
                        if ($this->model->delete()) {
                            header("Location: productos.php");
                        } else {
                            echo "Error borrando producto.";
                        }
                        exit();
                }
            }
        }
    }
}
