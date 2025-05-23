<?php

require_once '../config/database.php'; // Asegúrate de que la ruta sea correcta
class Categoria {
    public function obtenerCategorias() {
        $db = Database::conexion(); // Asegúrate de tener este método en tu clase Database
        $result = $db->query("SELECT id_categoria, nombre FROM categoria");
        $categorias = [];
        while ($row = $result->fetch_assoc()) {
            $categorias[] = $row;
        }
        return $categorias;
    }
}