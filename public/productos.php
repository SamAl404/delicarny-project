<?php
require_once __DIR__ . '/../controllers/ProductoController.php';
require_once __DIR__ . '/../models/Categoria.php';

$controller = new ProductoController();
$controller->handleRequest();
$products = $controller->listProducts();
$categoriaModel = new Categoria();
$categorias = $categoriaModel->obtenerCategorias();

include '../views/admin/products/productos.php';
?>