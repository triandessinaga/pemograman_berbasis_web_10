

<?php
/**
 * buat nama filenya :proses_tambah.php
 * File untuk memproses penambahan data mahasiswa
 */
session_start();
require_once 'Mahasiswa.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $id_jurusan = $_POST['id_jurusan'];
    $angkatan = $_POST['angkatan'];
    $alamat = $_POST['alamat'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    
    $mahasiswaObj = new Mahasiswa();
    $result = $mahasiswaObj->tambahMahasiswa($nim, $nama, $id_jurusan, $angkatan, $alamat, $tanggal_lahir);
    
    if($result) {
        $_SESSION['message'] = "Data mahasiswa berhasil ditambahkan";
        $_SESSION['message_type'] = "success";
    } else {
        $_SESSION['message'] = "Gagal menambahkan data mahasiswa";
        $_SESSION['message_type'] = "danger";
    }
    
    header("Location: daftar_mahasiswa.php");
    exit();
} else {
    header("Location: form_tambah.php");
    exit();
}
?>