1. Struktur Kelas
   Sistem ini menggunakan 3 kelas utama:
   a. Database (koneksi.php)

Kelas ini menangani koneksi ke database menggunakan PDO
Memiliki metode untuk melakukan query select dan execute (insert/update/delete)
Mengimplementasikan error handling dengan try-catch
Menggunakan prepared statements untuk keamanan

b. Mahasiswa (Mahasiswa.php)

Kelas yang bertugas mengelola data mahasiswa
Memiliki metode-metode CRUD: getAllMahasiswa(), getMahasiswaByNim(), tambahMahasiswa(), updateMahasiswa(), dan hapusMahasiswa()
Menggunakan objek Database untuk komunikasi dengan database

c. Jurusan (Jurusan.php)

Kelas untuk mengelola data jurusan
Memiliki metode-metode CRUD: getAllJurusan(), getJurusanById(), tambahJurusan(), updateJurusan(), dan hapusJurusan()
Menggunakan objek Database untuk komunikasi dengan database

2. Keunggulan Pendekatan OOP dan PDO

Modularitas: Kode diorganisir dalam kelas-kelas yang masing-masing memiliki tanggung jawab spesifik.
Keamanan: Penggunaan PDO dengan prepared statements mencegah SQL Injection.
Keterbacaan: Kode lebih mudah dibaca dan dipahami karena teroganisir dalam kelas-kelas.
Pemeliharaan: Perubahan pada satu bagian sistem tidak mempengaruhi bagian lain.
Portabilitas: PDO mendukung 12+ database, sehingga memudahkan jika ingin berganti database.

3. File View/Template
   File-file view tetap sama dengan studi kasus sebelumnya, namun dimodifikasi untuk bekerja dengan kelas-kelas OOP:

index.php: Halaman utama sistem
daftar_mahasiswa.php: Menampilkan daftar mahasiswa
form_tambah.php: Form untuk menambah data mahasiswa
form_edit.php: Form untuk mengedit data mahasiswa
proses_tambah.php: Memproses penambahan data mahasiswa
proses_edit.php: Memproses update data mahasiswa
proses_hapus.php: Memproses penghapusan data mahasiswa

4. Penanganan Pesan

Menggunakan session untuk menyimpan dan menampilkan pesan sukses/error
Implementasi tipe pesan (success, danger) untuk Bootstrap alert

5. Keamanan

Menggunakan PDO dengan prepared statements untuk mencegah SQL Injection
Validasi input sebelum diproses
Menggunakan mysqli_real_escape_string untuk data yang dimasukkan ke database

Implementasi ini membuat kode lebih terstruktur, aman, dan mudah dikembangkan lebih lanjut, serta memudahkan mahasiswa untuk memahami konsep OOP dan PDO dalam pengembangan aplikasi web yang terintegrasi dengan database.
