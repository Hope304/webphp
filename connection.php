<?php
class Database {
    private $host = 'localhost';
    private $dbName = 'ecommerce';
    private $username = 'root';
    private $password = '';
    private static $instance = null;
    public $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }
    public static function getInstance(){
        if (!isset(self::$instance)) {
            self::$instance = new Database();
        }
        return self::$instance->conn;
    }
}
?>