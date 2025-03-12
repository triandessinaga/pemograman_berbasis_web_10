

<?php
/**
 * buat nama filenya form_edit.php
 * Halaman form untuk mengedit data mahasiswa
 */
require_once 'Mahasiswa.php';
require_once 'Jurusan.php';

if(!isset($_GET['nim'])) {
    header("Location: daftar_mahasiswa.php");
    exit();
}

$nim = $_GET['nim'];
$mahasiswaObj = new Mahasiswa();
$data = $mahasiswaObj->getMahasiswaByNim($nim);

if(!$data) {
    header("Location: daftar_mahasiswa.php");
    exit();
}

$jurusanObj = new Jurusan();
$daftarJurusan = $jurusanObj->getAllJurusan();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Mahasiswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Data Mahasiswa</h2>
        <a href="daftar_mahasiswa.php" class="btn btn-secondary mb-3">Kembali</a>
        
        <form action="proses_edit.php" method="POST">
            <div class="form-group">
                <label>NIM:</label>
                <input type="text" class="form-control" name="nim" value="<?php echo $data['nim']; ?>" readonly>
            </div>
            <div class="form-group">
                <label>Nama:</label>
                <input type="text" class="form-control" name="nama" value="<?php echo $data['nama']; ?>" required>
            </div>
            <div class="form-group">
                <label>Jurusan:</label>
                <select class="form-control" name="id_jurusan">
                    <?php
                    foreach($daftarJurusan as $jurusan) {
                        $selected = ($jurusan['id'] == $data['id_jurusan']) ? 'selected' : '';
                        echo "<option value='".$jurusan['id']."' ".$selected.">".$jurusan['nama_jurusan']."</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Angkatan:</label>
                <input type="number" class="form-control" name="angkatan" value="<?php echo $data['angkatan']; ?>" required>
            </div>
            <div class="form-group">
                <label>Alamat:</label>
                <textarea class="form-control" name="alamat"><?php echo $data['alamat']; ?></textarea>
            </div>
            <div class="form-group">
                <label>Tanggal Lahir:</label>
                <input type="date" class="form-control" name="tanggal_lahir" value="<?php echo $data['tanggal_lahir']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>