CREATE DATABASE kampus;
USE kampus;

CREATE TABLE jurusan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_jurusan VARCHAR(50) NOT NULL,
    kepala_jurusan VARCHAR(100)
);

INSERT INTO `jurusan` (`id`, `nama_jurusan`, `kepala_jurusan`) VALUES (NULL, 'Akuntansi', 'Thomson');

CREATE TABLE mahasiswa (
    nim VARCHAR(10) PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    id_jurusan INT,
    angkatan INT,
    alamat TEXT,
    tanggal_lahir DATE,
    FOREIGN KEY (id_jurusan) REFERENCES jurusan(id)
);

CREATE TABLE mata_kuliah (
    kode VARCHAR(10) PRIMARY KEY,
    nama_matkul VARCHAR(100) NOT NULL,
    sks INT,
    semester INT
);

CREATE TABLE nilai (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nim VARCHAR(10),
    kode_matkul VARCHAR(10),
    nilai_angka FLOAT,
    nilai_huruf CHAR(1),
    FOREIGN KEY (nim) REFERENCES mahasiswa(nim),
    FOREIGN KEY (kode_matkul) REFERENCES mata_kuliah(kode)
);