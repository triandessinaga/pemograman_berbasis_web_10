<?php
/**
 * buat nama filenya :jurusan.php
 * Class untuk mengelola data jurusan
 */
require_once 'koneksi.php';

class Jurusan {
    private $db;
    
    public function __construct() {
        $this->db = new Database();
    }
    
    // Method untuk mengambil semua data jurusan
    public function getAllJurusan() {
        $query = "SELECT * FROM jurusan";
        return $this->db->select($query);
    }
    
    // Method untuk mengambil data jurusan berdasarkan ID
    public function getJurusanById($id) {
        $query = "SELECT * FROM jurusan WHERE id = ?";
        $stmt = $this->db->select($query, [$id]);
        return $stmt->fetch();
    }
    
    // Method untuk menambah data jurusan
    public function tambahJurusan($nama_jurusan, $kepala_jurusan) {
        $query = "INSERT INTO jurusan (nama_jurusan, kepala_jurusan) VALUES (?, ?)";
        return $this->db->execute($query, [$nama_jurusan, $kepala_jurusan]);
    }
    
    // Method untuk mengupdate data jurusan
    public function updateJurusan($id, $nama_jurusan, $kepala_jurusan) {
        $query = "UPDATE jurusan SET nama_jurusan = ?, kepala_jurusan = ? WHERE id = ?";
        return $this->db->execute($query, [$nama_jurusan, $kepala_jurusan, $id]);
    }
    
    // Method untuk menghapus data jurusan
    public function hapusJurusan($id) {
        $query = "DELETE FROM jurusan WHERE id = ?";
        return $this->db->execute($query, [$id]);
    }
}
?>