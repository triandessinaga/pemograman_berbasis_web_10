<?php
include 'koneksi.php';

// Mengambil NIM dari parameter URL
$nim = $_GET['nim'];

// Query SQL untuk delete data
$sql = "DELETE FROM mahasiswa WHERE nim='$nim'";

// Eksekusi query
if (mysqli_query($koneksi, $sql)) {
    header("Location: daftar_mahasiswa.php?status=deleted");
} else {
    header("Location: daftar_mahasiswa.php?status=failed");
}

// Menutup koneksi
mysqli_close($koneksi);
?>