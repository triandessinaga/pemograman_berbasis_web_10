<?php
include 'koneksi.php';

// Mengambil data mahasiswa berdasarkan NIM
$nim = $_GET['nim'];
$query = "SELECT * FROM mahasiswa WHERE nim='$nim'";
$hasil = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($hasil);
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
                    $query_jurusan = "SELECT * FROM jurusan";
                    $hasil_jurusan = mysqli_query($koneksi, $query_jurusan);
                    while($row_jurusan = mysqli_fetch_assoc($hasil_jurusan)) {
                        $selected = ($row_jurusan['id'] == $data['id_jurusan']) ? 'selected' : '';
                        echo "<option value='".$row_jurusan['id']."' ".$selected.">".$row_jurusan['nama_jurusan']."</option>";
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
</body>
</html>