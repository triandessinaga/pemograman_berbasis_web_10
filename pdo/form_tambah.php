<?php
/**
 * buat nama filenya :form_tambah.php
 * Halaman form untuk menambah data mahasiswa
 */
require_once 'jurusan.php';

$jurusanObj = new Jurusan();
$daftarJurusan = $jurusanObj->getAllJurusan();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Tambah Mahasiswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Tambah Data Mahasiswa</h2>
        <a href="daftar_mahasiswa.php" class="btn btn-secondary mb-3">Kembali</a>
        
        <form action="proses_tambah.php" method="POST">
            <div class="form-group">
                <label>NIM:</label>
                <input type="text" class="form-control" name="nim" required>
            </div>
            <div class="form-group">
                <label>Nama:</label>
                <input type="text" class="form-control" name="nama" required>
            </div>
            <div class="form-group">
                <label>Jurusan:</label>
                <select class="form-control" name="id_jurusan">
                    <?php
                    foreach($daftarJurusan as $jurusan) {
                        echo "<option value='".$jurusan['id']."'>".$jurusan['nama_jurusan']."</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Angkatan:</label>
                <input type="number" class="form-control" name="angkatan" required>
            </div>
            <div class="form-group">
                <label>Alamat:</label>
                <textarea class="form-control" name="alamat"></textarea>
            </div>
            <div class="form-group">
                <label>Tanggal Lahir:</label>
                <input type="date" class="form-control" name="tanggal_lahir">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>