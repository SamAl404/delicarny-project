<?php
require_once 'config/database.php';

class Cliente
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    // Verifica si existe un cliente por teléfono, si no, lo crea
    public function obtenerOCrear($nombre, $telefono)
    {
        $sql = "SELECT id_cliente FROM Cliente WHERE telefono = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$telefono]);

        if ($row = $stmt->fetch()) {
            return $row['id_cliente'];
        }

        $sql = "INSERT INTO Cliente (nombre, telefono) VALUES (?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$nombre, $telefono]);
        return $this->db->lastInsertId();
    }

    // Puedes agregar más funciones aquí si deseas un CRUD completo
}
