<?php
require_once 'models/Producto.php';

class MenuController
{
    public function index()
    {
        $producto = new Producto();
        $productos = $producto->obtenerProductosPorCategoria();

        $agrupado = [];
        foreach ($productos as $p) {
            $cat = $p['nombre_categoria'];
            if (!isset($agrupado[$cat])) {
                $agrupado[$cat] = [];
            }
            $agrupado[$cat][] = $p;
        }

        require_once 'views/menu/index.php';
    }
}
