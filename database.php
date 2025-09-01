<?php
class Database {
    private $servername = "127.0.0.1:3307";
    private $username = "root";
    private $password = "root";
    private $dbname = "RestEasy";
    public $conn;
    public function __construct() {
        $this->connect();
    }
    private function connect() {
        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Error with connection: " . $e->getMessage();
        }
    }
    public function getConnection() {
        return $this->conn;
    }
    public function executeQuery($sql) {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
class GetQuery {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function execute($sql) {
        $conn = $this->db->getConnection();
        return $this->db->executeQuery($sql);
    }
}
function get_query($sql) {
    $userFetcher = new GetQuery();
    return $userFetcher->execute($sql);
}
?>