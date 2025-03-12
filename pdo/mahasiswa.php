<?php
/**
 * buat nama filenya : mahasiswa.php
 * Class untuk mengelola data mahasiswa
 */
require_once 'koneksi.php';

class Mahasiswa {
    private $db;
    
    public function __construct() {
        $this->db = new Database();
    }
    
    // Method untuk mengambil semua data mahasiswa
    public function getAllMahasiswa() {
        $query = "SELECT m.nim, m.nama, j.nama_jurusan, m.angkatan 
                  FROM mahasiswa m 
                  JOIN jurusan j ON m.id_jurusan = j.id";
        return $this->db->select($query);
    }
    
    // Method untuk mengambil data mahasiswa berdasarkan NIM
    public function getMahasiswaByNim($nim) {
        $query = "SELECT * FROM mahasiswa WHERE nim = ?";
        $stmt = $this->db->select($query, [$nim]);
        return $stmt->fetch();
    }
    
    // Method untuk menambah data mahasiswa
    public function tambahMahasiswa($nim, $nama, $id_jurusan, $angkatan, $alamat, $tanggal_lahir) {
        $query = "INSERT INTO mahasiswa (nim, nama, id_jurusan, angkatan, alamat, tanggal_lahir) 
                  VALUES (?, ?, ?, ?, ?, ?)";
        $params = [$nim, $nama, $id_jurusan, $angkatan, $alamat, $tanggal_lahir];
        return $this->db->execute($query, $params);
    }
    
    // Method untuk mengupdate data mahasiswa
    public function updateMahasiswa($nim, $nama, $id_jurusan, $angkatan, $alamat, $tanggal_lahir) {
        $query = "UPDATE mahasiswa 
                  SET nama = ?, id_jurusan = ?, angkatan = ?, alamat = ?, tanggal_lahir = ? 
                  WHERE nim = ?";
        $params = [$nama, $id_jurusan, $angkatan, $alamat, $tanggal_lahir, $nim];
        return $this->db->execute($query, $params);
    }
    
    // Method untuk menghapus data mahasiswa
    public function hapusMahasiswa($nim) {
        $query = "DELETE FROM mahasiswa WHERE nim = ?";
        return $this->db->execute($query, [$nim]);
    }
}
?>