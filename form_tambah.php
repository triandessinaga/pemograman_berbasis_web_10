<!DOCTYPE html>
<html>
<head>
    <title>Form Tambah Mahasiswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Tambah Data Mahasiswa</h2>
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
                    include 'koneksi.php';
                    $query = "SELECT * FROM jurusan";
                    $hasil = mysqli_query($koneksi, $query);
                    while($row = mysqli_fetch_assoc($hasil)) {
                        echo "<option value='".$row['id']."'>".$row['nama_jurusan']."</option>";
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
</body>
</html>