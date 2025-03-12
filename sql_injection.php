<?php
// Koneksi database
$koneksi = mysqli_connect("localhost", "root", "", "kampus");

// Memeriksa koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Mengambil data dari form
$nim = $_POST['nim'];

// Cara tidak aman:
// $sql = "SELECT * FROM mahasiswa WHERE nim = '$nim'";
// $hasil = mysqli_query($koneksi, $sql);

// Cara aman dengan prepared statements:
$stmt = $koneksi->prepare("SELECT * FROM mahasiswa WHERE nim = ?");
$stmt->bind_param("s", $nim);
$stmt->execute();
$hasil = $stmt->get_result();

while($row = $hasil->fetch_assoc()) {
    echo "Nama: " . $row["nama"] . "<br>";
}

$stmt->close();
$koneksi->close();
?>