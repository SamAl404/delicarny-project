<?php
require_once __DIR__ . '/../controllers/ProductoController.php';

$controller = new ProductoController();
$controller->handleRequest();
$products = $controller->listProducts();

include '../views/admin/products/productos.php';
?>