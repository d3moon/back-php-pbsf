<?php
require_once 'config/Database.php';

class VaccineModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function create($data) {
        $name = $data['nome'];
        $targetAudience = $data['publico_alvo'];

        if ($targetAudience !== 'Adulto' && $targetAudience !== 'Criança') {
            return false;
        }

        $query = "INSERT INTO vaccines (nome, publico_alvo) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss", $name, $targetAudience);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function getAll() {
        $query = "SELECT * FROM vaccines";
        $result = $this->conn->query($query);
        $vaccines = array();
        while ($row = $result->fetch_assoc()) {
            $vaccines[] = $row;
        }
        return $vaccines;
    }

    public function getById($id) {
    $query = "SELECT * FROM vaccines WHERE id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}

    public function update($data) {
        $id = $data['id'];
        $name = $data['nome'];
        $targetAudience = $data['publico_alvo'];

        if ($targetAudience !== 'Adulto' && $targetAudience !== 'Criança') {
            return false;
        }

        $query = "UPDATE vaccines SET nome = ?, publico_alvo = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssi", $name, $targetAudience, $id);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

     public function delete($id) {
        $query = "DELETE FROM vaccines WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
