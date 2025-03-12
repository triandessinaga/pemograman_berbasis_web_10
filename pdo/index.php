<?php
/**
 * buat nama filenya :index.php
 * Halaman utama sistem
 */
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sistem Pengelolaan Data Mahasiswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Sistem Pengelolaan Data Mahasiswa</h1>
        
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Mahasiswa</h5>
                        <p class="card-text">Kelola data mahasiswa termasuk tambah, edit, dan hapus.</p>
                        <a href="daftar_mahasiswa.php" class="btn btn-primary">Akses</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Jurusan</h5>
                        <p class="card-text">Kelola data jurusan termasuk tambah, edit, dan hapus.</p>
                        <a href="#" class="btn btn-primary">Akses</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Mata Kuliah</h5>
                        <p class="card-text">Kelola data mata kuliah termasuk tambah, edit, dan hapus.</p>
                        <a href="#" class="btn btn-primary">Akses</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
