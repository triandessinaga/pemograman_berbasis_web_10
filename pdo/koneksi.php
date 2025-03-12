<?php
/**
 * buat nama filenya :koneksi.php
 * File untuk menangani koneksi database menggunakan PDO
 */
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "kampus";
    private $connection;
    
    // Constructor untuk membuat koneksi
    public function __construct() {
        try {
            $this->connection = new PDO(
                "mysql:host={$this->host};dbname={$this->database}",
                $this->username,
                $this->password
            );
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            die("Koneksi gagal: " . $e->getMessage());
        }
    }
    
    // Getter untuk mendapatkan koneksi
    public function getConnection() {
        return $this->connection;
    }
    
    // Method untuk menjalankan query select
    public function select($query, $params = []) {
        try {
            $stmt = $this->connection->prepare($query);
            $stmt->execute($params);
            return $stmt;
        } catch(PDOException $e) {
            die("Query error: " . $e->getMessage());
        }
    }
    
    // Method untuk menjalankan query insert, update, delete
    public function execute($query, $params = []) {
        try {
            $stmt = $this->connection->prepare($query);
            return $stmt->execute($params);
        } catch(PDOException $e) {
            die("Query error: " . $e->getMessage());
        }
    }

    // Method untuk mendapatkan id terakhir yang diinsert
    public function lastInsertId() {
        return $this->connection->lastInsertId();
    }
}
?>