<?php
include 'koneksi.php';

// Mengambil data dari form
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$id_jurusan = $_POST['id_jurusan'];
$angkatan = $_POST['angkatan'];
$alamat = $_POST['alamat'];
$tanggal_lahir = $_POST['tanggal_lahir'];

// Query SQL untuk update data
$sql = "UPDATE mahasiswa 
        SET nama='$nama', id_jurusan=$id_jurusan, angkatan=$angkatan, 
            alamat='$alamat', tanggal_lahir='$tanggal_lahir' 
        WHERE nim='$nim'";

// Eksekusi query
if (mysqli_query($koneksi, $sql)) {
    header("Location: daftar_mahasiswa.php?status=updated");
} else {
    header("Location: daftar_mahasiswa.php?status=failed");
}

// Menutup koneksi
mysqli_close($koneksi);
?>