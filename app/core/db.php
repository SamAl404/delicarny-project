<?php
class Database
{
    public static function connect()
    {
        try {
            $conexion = new mysqli("localhost", "root", "", "db_delicarny");
            $conexion->query("SET NAMES 'utf8'");
            echo "Conexion exitosa";
            
            return $conexion;
        } catch (Exception $e) {
            die("Conexion fallida: " . $e->getMessage());
        }
    }
}

?>
