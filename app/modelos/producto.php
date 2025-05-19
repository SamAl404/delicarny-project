<?php
class Producto {
    private $conn;

    public function __construct($conexion) {
        $this->conn = $conexion;
    }

    public function obtenerTodos() {
        return $this->conn->query("SELECT * FROM Producto")->fetch_all(MYSQLI_ASSOC);
    }

    public function obtenerPorId($id) {
        $stmt = $this->conn->prepare("SELECT * FROM Producto WHERE id_producto = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function insertar($data) {
        $stmt = $this->conn->prepare("INSERT INTO Producto (nombre, valor_unitario, estado, id_categoria) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sdsi", $data['nombre'], $data['valor_unitario'], $data['estado'], $data['id_categoria']);
        return $stmt->execute();
    }

    public function actualizar($id, $data) {
        $stmt = $this->conn->prepare("UPDATE Producto SET nombre=?, valor_unitario=?, estado=?, id_categoria=? WHERE id_producto=?");
        $stmt->bind_param("sdsii", $data['nombre'], $data['valor_unitario'], $data['estado'], $data['id_categoria'], $id);
        return $stmt->execute();
    }

    public function eliminar($id) {
        $stmt = $this->conn->prepare("DELETE FROM Producto WHERE id_producto=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}