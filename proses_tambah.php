<?php
include 'koneksi.php';

// Mengambil data dari form
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$id_jurusan = $_POST['id_jurusan'];
$angkatan = $_POST['angkatan'];
$alamat = $_POST['alamat'];
$tanggal_lahir = $_POST['tanggal_lahir'];

// Query SQL untuk insert data
$sql = "INSERT INTO mahasiswa (nim, nama, id_jurusan, angkatan, alamat, tanggal_lahir) 
        VALUES ('$nim', '$nama', $id_jurusan, $angkatan, '$alamat', '$tanggal_lahir')";

// Eksekusi query
if (mysqli_query($koneksi, $sql)) {
    header("Location: daftar_mahasiswa.php?status=success");
} else {
    header("Location: daftar_mahasiswa.php?status=failed");
}

// Menutup koneksi
mysqli_close($koneksi);
?>