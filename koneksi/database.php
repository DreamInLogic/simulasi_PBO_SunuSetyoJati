<?php
// File: koneksi/database.php

class Database {
    private $host = "localhost";
    private $username = "root"; // Sesuaikan dengan username MySQL kamu
    private $password = "";     // Sesuaikan dengan password MySQL kamu
    private $db_name = "DB_SIMULASI_PBO_KELAS_SunuSetyoJati";
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name, 
                $this->username, 
                $this->password
            );
            // Mengatur error mode ke exception untuk mempermudah debugging
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Koneksi database gagal: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>