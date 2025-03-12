<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Mahasiswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Daftar Mahasiswa</h2>
        
        <?php
        if(isset($_GET['status'])) {
            if($_GET['status'] == 'success') {
                echo "<div class='alert alert-success'>Data berhasil ditambahkan</div>";
            } else if($_GET['status'] == 'failed') {
                echo "<div class='alert alert-danger'>Gagal menambahkan data</div>";
            } else if($_GET['status'] == 'updated') {
                echo "<div class='alert alert-info'>Data berhasil diperbarui</div>";
            } else if($_GET['status'] == 'deleted') {
                echo "<div class='alert alert-warning'>Data berhasil dihapus</div>";
            }
        }
        ?>
        
        <a href="form_tambah.php" class="btn btn-primary mb-3">Tambah Mahasiswa</a>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Angkatan</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT m.nim, m.nama, j.nama_jurusan, m.angkatan 
                          FROM mahasiswa m 
                          JOIN jurusan j ON m.id_jurusan = j.id";
                $hasil = mysqli_query($koneksi, $query);
                
                while($row = mysqli_fetch_assoc($hasil)) {
                    echo "<tr>";
                    echo "<td>".$row['nim']."</td>";
                    echo "<td>".$row['nama']."</td>";
                    echo "<td>".$row['nama_jurusan']."</td>";
                    echo "<td>".$row['angkatan']."</td>";
                    echo "<td>
                            <a href='form_edit.php?nim=".$row['nim']."' class='btn btn-sm btn-warning'>Edit</a>
                            <a href='proses_hapus.php?nim=".$row['nim']."' class='btn btn-sm btn-danger' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>