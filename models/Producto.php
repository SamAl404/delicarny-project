<?php
class Producto {
    private $conn;
    private $table = 'producto';

    public $id_producto;
    public $nombre;
    public $valor_unitario;
    public $estado;
    public $id_categoria;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function create() {
        $query = "INSERT INTO " . $this->table . " 
                 (nombre, valor_unitario, estado, id_categoria)
                 VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        
        $stmt->bind_param("sdii",
            $this->nombre,
            $this->valor_unitario,
            $this->estado,
            $this->id_categoria
        );

        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->valor_unitario = htmlspecialchars(strip_tags($this->valor_unitario));
        $this->estado = htmlspecialchars(strip_tags($this->estado));
        $this->id_categoria = htmlspecialchars(strip_tags($this->id_categoria));

        return $stmt->execute();
    }

    public function update() {
        $query = "UPDATE " . $this->table . " SET 
                  nombre = ?,
                  valor_unitario = ?,
                  estado = ?,
                  id_categoria = ?
                  WHERE id_producto = ?";
        $stmt = $this->conn->prepare($query);
        
        $stmt->bind_param("sdiii",
            $this->nombre,
            $this->valor_unitario,
            $this->estado,
            $this->id_categoria,
            $this->id_producto
        );

        $this->id_producto = htmlspecialchars(strip_tags($this->id_producto));
        // Other sanitizations same as create

        return $stmt->execute();
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table . " WHERE id_producto = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $this->id_producto);
        $this->id_producto = htmlspecialchars(strip_tags($this->id_producto));
        return $stmt->execute();
    }
}
?>