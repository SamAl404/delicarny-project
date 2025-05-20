<?php

class Database
{

    public static function conexion()
    { 
        try {
            $conexion = new mysqli("localhost","root", "", "db_delicarny");
            $conexion->set_charset("utf8");
        } catch (Exception $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $conexion;
    }
}