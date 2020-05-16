-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Bulan Mei 2020 pada 09.34
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_penilaian`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(10) NOT NULL,
  `nip` int(10) NOT NULL,
  `nama_dosen` varchar(25) NOT NULL,
  `jeniskelamin` varchar(10) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `email` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nip`, `nama_dosen`, `jeniskelamin`, `alamat`, `email`) VALUES
(1, 100009, 'Dina Risky Alin Saputri', 'Perempuan', 'Malang', 'dinarisky04@gmail.com'),
(2, 100010, 'Ardan Anjung Kusuma', 'Laki-laki', 'Bojonegoro', 'ardananjungk@gmail.com'),
(3, 100011, 'Indra Pradika Utomo', 'Laki-laki', 'Jalan Arif Margono', 'indrapradika@gmail.com'),
(5, 100012, 'Silvi Natalia Putri', 'Perempuan', 'Jalan Menjangan Blok10', 'silvinatalia@gmail.com'),
(6, 100013, 'Chandra Dewi Putriningsih', 'Perempuan', 'Jalan Kesumba Blok C', 'chandradewi@gmail.com'),
(8, 123, 'Dina Risky Alin Saputri', 'jh3', 'Jalan Merak', 'agitariirawan44@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(10) NOT NULL,
  `nim` int(10) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `jeniskelamin` varchar(10) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `jurusan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nim`, `nama`, `jeniskelamin`, `alamat`, `jurusan`) VALUES
(1, 1841720016, 'Dina Risky Alin Saputri', 'Perempuan', 'Jalan Supriadi Gg 3 No 48', 'Teknik Informatika'),
(4, 1841720006, 'Silvi Indah Novitasari', 'Perempuan', 'Jalan Merdeka Gg 2', 'Teknik Industri'),
(5, 1841720077, 'Subhan Indra Prayogi', 'Laki-laki', 'Jalan Semanggi Gg 05', 'Teknik Mesin'),
(6, 1841720190, 'Agit Ari Irawan', 'Laki-laki', 'Jalan Jowar Blok A', 'Teknik Informatika'),
(11, 1841720066, 'Osa Mahanani', 'Perempuan', 'Jalan Menjangan Blok B', 'Teknik Kimia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matakuliah`
--

CREATE TABLE `matakuliah` (
  `id_matakuliah` int(10) NOT NULL,
  `kode_mk` varchar(20) NOT NULL,
  `matakuliah` varchar(35) NOT NULL,
  `sks` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `matakuliah`
--

INSERT INTO `matakuliah` (`id_matakuliah`, `kode_mk`, `matakuliah`, `sks`) VALUES
(2, 'PWL', 'Pemrograman Web Lanjut', 4),
(3, 'SMBD', 'Sistem Manajemen Basis Data', 6),
(4, 'KKG', 'Komputasi Kognitif', 5),
(5, 'ADBO', 'Analisis Desain Berorientasi Objek', 3),
(7, 'MP', 'Manajemen Proyek', 2),
(8, 'AL', 'Aljabar Linier', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(10) NOT NULL,
  `id_dosen` int(10) NOT NULL,
  `id_matakuliah` int(10) NOT NULL,
  `id_mahasiswa` int(10) NOT NULL,
  `nilai` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_dosen`, `id_matakuliah`, `id_mahasiswa`, `nilai`) VALUES
(5, 2, 2, 1, '90'),
(6, 3, 3, 5, '90'),
(9, 6, 3, 4, '98'),
(10, 6, 3, 4, '98'),
(11, 6, 3, 4, '98'),
(12, 6, 3, 4, '98'),
(13, 5, 5, 5, '78');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(15) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(90) NOT NULL,
  `email` varchar(100) NOT NULL,
  `notelp` varchar(25) NOT NULL,
  `level` varchar(25) NOT NULL DEFAULT 'user',
  `status` varchar(25) NOT NULL DEFAULT 'Tidak Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `email`, `notelp`, `level`, `status`) VALUES
(1, 'Dina Risky Alin Saputri', 'dinarisky', '202cb962ac59075b964b07152d234b70', 'dinarisky04@gmail.com', '085649722109', 'user', 'Aktif'),
(2, 'Silvi Indah Novitasarii', 'silvinovita', '42513881c5745ee8fa73969ce315ce6c', 'silviindahnovitasari@gmail.com', '085203032345', 'user', 'Tidak Aktif'),
(3, 'Admin1', 'admin', 'e00cf25ad42683b3df678c61f42c6bda', 'admin_dina@gmail.com', '085709900121', 'admin', 'Aktif'),
(4, 'Subhan Indra Prayoga', 'subhan', 'f9f8c03639a119299c4179e7a1797642', 'subhan@gmail.com', '085758904660', 'user', 'Tidak Aktif'),
(5, 'Ardan Anjung Kusuma', 'ardananjungkusuma', 'd2219d75098abd01493908d2f7f4d13d', 'ardananjungkusuma@gmail.com', '08525871235', 'user', 'Tidak Aktif'),
(9, 'Angelita', 'angel', 'f4f068e71e0d87bf0ad51e6214ab84e9', 'angel@gmail.com', '0857771085', 'dosen', 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indeks untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`id_matakuliah`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_dosen` (`id_dosen`),
  ADD KEY `id_matakuliah` (`id_matakuliah`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id_matakuliah` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`id_matakuliah`) REFERENCES `matakuliah` (`id_matakuliah`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_3` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
