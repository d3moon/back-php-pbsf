<?php
class Database {
    private $host = "";
    private $db_name = "";
    private $username = "";
    private $password = "";
    private $port = 3306; 
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try { 
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name, $this->port);
            $this->conn->set_charset("utf8");
        } catch (mysqli_sql_exception $exception) {
            echo "Erro na conexão com o banco de dados: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>
