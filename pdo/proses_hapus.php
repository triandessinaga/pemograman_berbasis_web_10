

<?php
/**
 * buat nama filenya :proses_hapus.php
 * File untuk memproses penghapusan data mahasiswa
 */
session_start();
require_once 'Mahasiswa.php';

if(isset($_GET['nim'])) {
    $nim = $_GET['nim'];
    
    $mahasiswaObj = new Mahasiswa();
    $result = $mahasiswaObj->hapusMahasiswa($nim);
    
    if($result) {
        $_SESSION['message'] = "Data mahasiswa berhasil dihapus";
        $_SESSION['message_type'] = "success";
    } else {
        $_SESSION['message'] = "Gagal menghapus data mahasiswa";
        $_SESSION['message_type'] = "danger";
    }
}

header("Location: daftar_mahasiswa.php");
exit();
?>