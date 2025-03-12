
<?php
/**
 * buat nama filenya daftar_mahasiswa.php
 * Halaman untuk menampilkan daftar mahasiswa
 */
session_start();
require_once 'Mahasiswa.php';

$mahasiswaObj = new Mahasiswa();
$daftarMahasiswa = $mahasiswaObj->getAllMahasiswa();
?>
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
        if(isset($_SESSION['message'])) {
            echo "<div class='alert alert-".$_SESSION['message_type']."'>".$_SESSION['message']."</div>";
            unset($_SESSION['message']);
            unset($_SESSION['message_type']);
        }
        ?>
        
        <a href="form_tambah.php" class="btn btn-primary mb-3">Tambah Mahasiswa</a>
        <a href="index.php" class="btn btn-secondary mb-3 ml-2">Kembali ke Menu Utama</a>
        
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
                foreach($daftarMahasiswa as $row) {
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
                
                if($daftarMahasiswa->rowCount() == 0) {
                    echo "<tr><td colspan='5' class='text-center'>Tidak ada data</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>