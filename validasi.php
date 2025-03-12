<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "kampus");

// Ambil input dari form
$nim = $_POST['nim'];

// Cek apakah input hanya angka
if (ctype_digit($nim)) {
    // Gunakan Prepared Statement untuk keamanan
    $stmt = $koneksi->prepare("SELECT * FROM mahasiswa WHERE nim = ?");
    $stmt->bind_param("s", $nim);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Mahasiswa ditemukan.";
    } else {
        echo "Mahasiswa tidak ditemukan.";
    }

    $stmt->close();
} else {
    echo "NIM tidak valid. Harap masukkan angka saja.";
}

// Tutup koneksi
mysqli_close($koneksi);
?>
