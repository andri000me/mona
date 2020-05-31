-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Bulan Mei 2020 pada 16.07
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beautysky`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `biodata`
--

CREATE TABLE `biodata` (
  `id_biodata` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nama_user` varchar(50) DEFAULT NULL,
  `jkel` int(11) DEFAULT 0,
  `email` varchar(30) DEFAULT NULL,
  `telp` varchar(12) DEFAULT '0',
  `alamat` varchar(100) DEFAULT NULL,
  `pendidikan` int(1) NOT NULL,
  `foto` varchar(30) DEFAULT NULL,
  `surat_lamaran` varchar(30) DEFAULT NULL,
  `ijazah` varchar(30) DEFAULT NULL,
  `tgl_isi` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `biodata`
--

INSERT INTO `biodata` (`id_biodata`, `id_user`, `nama_user`, `jkel`, `email`, `telp`, `alamat`, `pendidikan`, `foto`, `surat_lamaran`, `ijazah`, `tgl_isi`) VALUES
(2, 1, 'Muhammad Ardi Setiawan', 1, 'a@a.com', '0', 'Bantoel Oetara', 1, NULL, NULL, NULL, '2019-12-16 22:59:19'),
(9, 25, 'Earlita Azzahra', 0, 'gpoex.mas@gmail.com', '0', 'Salakan', 1, '01e50c681c345367154.jpg', '01e50c681c3453671541.jpg', '01e50c681c3453671542.jpg', '2020-02-09 10:22:05'),
(10, 26, 'Alfarizi', 1, 'gpoex.mas@gmail.com', '0', 'Salakan', 4, '7d77e825b81631269251.jpg', '7d77e825b816312692511.jpg', '7d77e825b816312692512.jpg', '2020-02-09 10:38:30'),
(11, 27, 'Rissa Safitri', 0, 'rissa@gmail.com', '0', 'ka', 3, '53572f9ad3789753767.jpg', '53572f9ad3789753767.png', '53572f9ad37897537671.jpg', '2020-02-10 22:46:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_jawab`
--

CREATE TABLE `hasil_jawab` (
  `id_hasil` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_soal` int(11) DEFAULT NULL,
  `jawaban` int(11) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  `skorpsiko` int(11) DEFAULT 0,
  `tgl_isi` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hasil_jawab`
--

INSERT INTO `hasil_jawab` (`id_hasil`, `id_user`, `id_soal`, `jawaban`, `status`, `skorpsiko`, `tgl_isi`) VALUES
(1, 26, 48, 1, '1', 0, '2020-02-16 11:23:45'),
(2, 26, 49, 1, '1', 0, '2020-02-16 11:23:47'),
(3, 26, 50, 1, '1', 0, '2020-02-16 11:23:49'),
(4, 26, 51, 1, '1', 0, '2020-02-16 11:23:52'),
(5, 26, 52, 1, '1', 0, '2020-02-16 11:23:55'),
(6, 26, 53, 1, '1', 0, '2020-02-16 11:23:56'),
(7, 26, 54, 1, '1', 0, '2020-02-16 11:23:58'),
(8, 26, 55, 1, '1', 0, '2020-02-16 11:24:00'),
(9, 26, 56, 1, '1', 0, '2020-02-16 11:24:02'),
(10, 26, 57, 1, '1', 0, '2020-02-16 11:24:04'),
(15, 26, 59, 4, '1', 0, '2020-02-16 11:24:50'),
(16, 26, 23, 1, '1', 0, '2020-02-16 11:25:18'),
(17, 26, 24, 1, '1', 0, '2020-02-16 11:25:23'),
(18, 26, 25, 1, '1', 0, '2020-02-16 11:25:25'),
(19, 26, 26, 1, '1', 0, '2020-02-16 11:25:26'),
(20, 26, 27, 1, '1', 0, '2020-02-16 11:25:28'),
(21, 26, 28, 1, '1', 0, '2020-02-16 11:25:30'),
(22, 26, 29, 1, '1', 0, '2020-02-16 11:25:31'),
(23, 26, 30, 1, '1', 0, '2020-02-16 11:25:33'),
(24, 26, 31, 1, '1', 0, '2020-02-16 11:25:35'),
(25, 26, 32, 1, '1', 0, '2020-02-16 11:25:39'),
(27, 26, 33, 1, '0', 1, '2020-02-16 11:30:04'),
(28, 25, 48, 1, '1', 0, '2020-02-16 11:39:53'),
(29, 25, 49, 1, '1', 0, '2020-02-16 11:39:54'),
(30, 25, 50, 1, '1', 0, '2020-02-16 11:39:56'),
(31, 25, 51, 1, '1', 0, '2020-02-16 11:39:58'),
(32, 25, 52, 1, '1', 0, '2020-02-16 11:39:59'),
(33, 25, 53, 1, '1', 0, '2020-02-16 11:40:01'),
(34, 25, 54, 1, '1', 0, '2020-02-16 11:40:02'),
(35, 25, 55, 1, '1', 0, '2020-02-16 11:40:04'),
(36, 25, 56, 1, '1', 0, '2020-02-16 11:40:06'),
(37, 25, 57, 1, '1', 0, '2020-02-16 11:40:10'),
(38, 25, 23, 1, '1', 0, '2020-02-16 11:40:20'),
(39, 25, 24, 2, '0', 0, '2020-02-16 11:40:22'),
(40, 25, 25, 3, '0', 0, '2020-02-16 11:40:24'),
(41, 25, 26, 4, '0', 0, '2020-02-16 11:40:26'),
(42, 25, 27, 2, '0', 0, '2020-02-16 11:40:28'),
(43, 25, 28, 3, '0', 0, '2020-02-16 11:40:30'),
(44, 25, 29, 4, '0', 0, '2020-02-16 11:40:32'),
(48, 25, 36, 1, '0', 1, '2020-02-16 11:43:37'),
(49, 25, 60, 4, '0', 4, '2020-02-16 11:44:19'),
(50, 25, 61, 4, '0', 4, '2020-02-16 11:42:06'),
(51, 25, 62, 1, '0', 1, '2020-02-16 11:43:18'),
(52, 25, 59, 1, '0', 0, '2020-02-16 12:24:30'),
(53, 26, 34, 4, '0', 4, '2020-02-16 12:30:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_test`
--

CREATE TABLE `jadwal_test` (
  `id_jadwal` int(11) NOT NULL,
  `id_level` int(11) DEFAULT NULL,
  `tgl_mulai` datetime DEFAULT NULL,
  `tgl_selesai` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal_test`
--

INSERT INTO `jadwal_test` (`id_jadwal`, `id_level`, `tgl_mulai`, `tgl_selesai`) VALUES
(14, 4, '2020-02-09 10:22:00', '2020-02-20 22:18:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(25) DEFAULT NULL,
  `tgl_isi` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `tgl_isi`) VALUES
(1, 'Matematika', '2019-12-21 16:40:06'),
(3, 'Bahasa Inggris', '2019-12-28 15:27:06'),
(4, 'x', '2020-02-10 14:43:36'),
(100, 'PSIKOTES', '2020-01-08 14:11:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'admin'),
(2, 'manager'),
(3, 'dokter'),
(4, 'pijat'),
(5, 'apoteker');

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal`
--

CREATE TABLE `soal` (
  `id_soal` int(11) NOT NULL,
  `id_level` int(11) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `pertanyaan` varchar(500) DEFAULT NULL,
  `jawab_a` varchar(200) DEFAULT NULL,
  `jawab_b` varchar(200) DEFAULT NULL,
  `jawab_c` varchar(200) DEFAULT NULL,
  `jawab_d` varchar(200) DEFAULT NULL,
  `kunci` int(11) DEFAULT NULL,
  `deleted` int(1) NOT NULL DEFAULT 0,
  `tgl_isi` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `soal`
--

INSERT INTO `soal` (`id_soal`, `id_level`, `id_kategori`, `pertanyaan`, `jawab_a`, `jawab_b`, `jawab_c`, `jawab_d`, `kunci`, `deleted`, `tgl_isi`) VALUES
(23, 4, 3, '<p>qwe</p>', '<p>qe</p>', '<p>qwe</p>', '<p>qew</p>', '<p>qqwe</p>', 1, 0, '2020-02-09 10:19:02'),
(24, 4, 3, '<p>qwe</p>', '<p>qe</p>', '<p>qwe</p>', '<p>qew</p>', '<p>qqwe</p>', 1, 0, '2020-02-09 10:19:02'),
(25, 4, 3, '<p>qwe</p>', '<p>qe</p>', '<p>qwe</p>', '<p>qew</p>', '<p>qqwe</p>', 1, 0, '2020-02-09 10:19:02'),
(26, 4, 3, '<p>qwe</p>', '<p>qe</p>', '<p>qwe</p>', '<p>qew</p>', '<p>qqwe</p>', 1, 0, '2020-02-09 10:19:02'),
(27, 4, 3, '<p>qwe</p>', '<p>qe</p>', '<p>qwe</p>', '<p>qew</p>', '<p>qqwe</p>', 1, 0, '2020-02-09 10:19:02'),
(28, 4, 3, '<p>qwe</p>', '<p>qe</p>', '<p>qwe</p>', '<p>qew</p>', '<p>qqwe</p>', 1, 0, '2020-02-09 10:19:02'),
(29, 4, 3, '<p>qwe</p>', '<p>qe</p>', '<p>qwe</p>', '<p>qew</p>', '<p>qqwe</p>', 1, 0, '2020-02-09 10:19:02'),
(30, 4, 3, '<p>qwe</p>', '<p>qe</p>', '<p>qwe</p>', '<p>qew</p>', '<p>qqwe</p>', 1, 0, '2020-02-09 10:19:02'),
(31, 4, 3, '<p>qwe</p>', '<p>qe</p>', '<p>qwe</p>', '<p>qew</p>', '<p>qqwe</p>', 1, 0, '2020-02-09 10:19:02'),
(32, 4, 3, '<p>qwe</p>', '<p>qe</p>', '<p>qwe</p>', '<p>qew</p>', '<p>qqwe</p>', 1, 0, '2020-02-09 10:19:02'),
(33, NULL, 100, '<p>sg</p>', '<p>sdg</p>', '<p>sdg</p>', '<p>sdg</p>', '<p>sdg</p>', 4, 0, '2020-02-09 10:22:54'),
(34, NULL, 100, '<p>sg</p>', '<p>sdg</p>', '<p>sdg</p>', '<p>sdg</p>', '<p>sdg</p>', 4, 0, '2020-02-09 10:22:54'),
(35, NULL, 100, '<p>sg</p>', '<p>sdg</p>', '<p>sdg</p>', '<p>sdg</p>', '<p>sdg</p>', 4, 0, '2020-02-09 10:22:54'),
(36, NULL, 100, '<p>sg</p>', '<p>sdg</p>', '<p>sdg</p>', '<p>sdg</p>', '<p>sdg</p>', 4, 0, '2020-02-09 10:22:54'),
(48, 4, 1, '<p>qwe</p>', '<p>qe</p>', '<p>qwe</p>', '<p>qew</p>', '<p>qqwe</p>', 1, 0, '2020-02-09 10:19:02'),
(49, 4, 1, '<p>qwe</p>', '<p>qe</p>', '<p>qwe</p>', '<p>qew</p>', '<p>qqwe</p>', 1, 0, '2020-02-09 10:19:02'),
(50, 4, 1, '<p>qwe</p>', '<p>qe</p>', '<p>qwe</p>', '<p>qew</p>', '<p>qqwe</p>', 1, 0, '2020-02-09 10:19:02'),
(51, 4, 1, '<p>qwe</p>', '<p>qe</p>', '<p>qwe</p>', '<p>qew</p>', '<p>qqwe</p>', 1, 0, '2020-02-09 10:19:02'),
(52, 4, 1, '<p>qwe</p>', '<p>qe</p>', '<p>qwe</p>', '<p>qew</p>', '<p>qqwe</p>', 1, 0, '2020-02-09 10:19:02'),
(53, 4, 1, '<p>qwe</p>', '<p>qe</p>', '<p>qwe</p>', '<p>qew</p>', '<p>qqwe</p>', 1, 0, '2020-02-09 10:19:02'),
(54, 4, 1, '<p>qwe</p>', '<p>qe</p>', '<p>qwe</p>', '<p>qew</p>', '<p>qqwe</p>', 1, 0, '2020-02-09 10:19:02'),
(55, 4, 1, '<p>qwe</p>', '<p>qe</p>', '<p>qwe</p>', '<p>qew</p>', '<p>qqwe</p>', 1, 0, '2020-02-09 10:19:02'),
(56, 4, 1, '<p>qwe</p>', '<p>qe</p>', '<p>qwe</p>', '<p>qew</p>', '<p>qqwe</p>', 1, 0, '2020-02-09 10:19:02'),
(57, 4, 1, '<p>qwe</p>', '<p>qe</p>', '<p>qwe</p>', '<p>qew</p>', '<p>qqwe</p>', 1, 0, '2020-02-09 10:19:02'),
(58, 3, 3, 'as', 'as', 'asd', 'asd', 'asd', 1, 1, '0000-00-00 00:00:00'),
(59, 4, 4, '<p><span style=\"background-color: #008000;\">XXX</span></p>', '<p><span style=\"background-color: #008000;\">XXX</span></p>', '<p><span style=\"background-color: #008000;\">XXX</span></p>', '<p><span style=\"background-color: #008000;\">XXX</span></p>', '<p><span style=\"background-color: #008000;\">XXX</span></p>', 4, 0, '2020-02-10 21:44:11'),
(60, NULL, 100, '<p>qweqwe</p>', '<p>qwe</p>', '<p>qweqweqwe</p>', '<p>qweqweq</p>', '<p>wqweqweqwe</p>', 4, 0, '2020-02-16 11:26:39'),
(61, NULL, 100, '<p>qwe</p>', '<p>qwe</p>', '<p>qwe</p>', '<p>qwe</p>', '<p>qwe</p>', 4, 0, '2020-02-16 11:27:13'),
(62, NULL, 100, '<div style=\"text-align: center;\">aaa\r\n<table style=\"border-collapse: collapse; width: 100%;\" border=\"1\">\r\n<tbody>\r\n<tr style=\"height: 18px;\">\r\n<td style=\"width: 16.6667%; height: 18px;\">dfs</td>\r\n<td style=\"width: 16.6667%; height: 18px;\">sdf</td>\r\n<td style=\"width: 16.6667%; height: 18px;\">sdfsdfs</td>\r\n<td style=\"width: 16.6667%; height: 18px;\">sdfsdf</td>\r\n<td style=\"width: 16.6667%; height: 18px;\">sdf</td>\r\n<td style=\"width: 16.6667%; height: 18px;\">adfsd</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\naaa', '<div style=\"text-align: center;\">aaa\r\n<table style=\"border-collapse: collapse; width: 100%;\" border=\"1\">\r\n<tbody>\r\n<tr style=\"height: 18px;\">\r\n<td style=\"width: 16.6667%; height: 18px;\">dfs</td>\r\n<td ', '<div style=\"text-align: center;\">aaa\r\n<table style=\"border-collapse: collapse; width: 100%;\" border=\"1\">\r\n<tbody>\r\n<tr style=\"height: 18px;\">\r\n<td style=\"width: 16.6667%; height: 18px;\">dfs</td>\r\n<td ', '<div style=\"text-align: center;\">aaa\r\n<table style=\"border-collapse: collapse; width: 100%;\" border=\"1\">\r\n<tbody>\r\n<tr style=\"height: 18px;\">\r\n<td style=\"width: 16.6667%; height: 18px;\">dfs</td>\r\n<td ', '<div style=\"text-align: center;\">aaa\r\n<table style=\"border-collapse: collapse; width: 100%;\" border=\"1\">\r\n<tbody>\r\n<tr style=\"height: 18px;\">\r\n<td style=\"width: 16.6667%; height: 18px;\">dfs</td>\r\n<td ', 3, 0, '2020-02-16 11:28:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_level` int(11) DEFAULT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(45) NOT NULL,
  `is_karyawan` int(11) NOT NULL DEFAULT 0,
  `deleted` int(11) DEFAULT 0,
  `tgl_isi` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `id_level`, `username`, `password`, `is_karyawan`, `deleted`, `tgl_isi`) VALUES
(1, 1, 'q', '7694f4a66316e53c8cdd9d9954bd611d', 0, 0, '2019-12-14 15:22:54'),
(25, 4, 'zahra', '01e50c681c0b05ff22686b3e0f7290d3', 1, 0, '2020-02-09 10:21:00'),
(26, 4, 'faris', '7d77e825b80cff62a72e680c1c81424f', 1, 0, '2020-02-09 10:38:04'),
(27, 4, 'rissa', '53572f9ad33e2bf4525d89d938a08d36', 0, 0, '2020-02-10 22:39:58');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`id_biodata`),
  ADD KEY `fk_biodata_user` (`id_user`);

--
-- Indeks untuk tabel `hasil_jawab`
--
ALTER TABLE `hasil_jawab`
  ADD PRIMARY KEY (`id_hasil`),
  ADD KEY `fk_hasil_jawab_user` (`id_user`),
  ADD KEY `fk_hasil_jawab_soal` (`id_soal`);

--
-- Indeks untuk tabel `jadwal_test`
--
ALTER TABLE `jadwal_test`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `fk_jadwal_test_level` (`id_level`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id_soal`),
  ADD KEY `fk_soal_level` (`id_level`),
  ADD KEY `fk_soal_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_user_level` (`id_level`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `biodata`
--
ALTER TABLE `biodata`
  MODIFY `id_biodata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `hasil_jawab`
--
ALTER TABLE `hasil_jawab`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `jadwal_test`
--
ALTER TABLE `jadwal_test`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT untuk tabel `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `soal`
--
ALTER TABLE `soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `biodata`
--
ALTER TABLE `biodata`
  ADD CONSTRAINT `fk_biodata_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `hasil_jawab`
--
ALTER TABLE `hasil_jawab`
  ADD CONSTRAINT `fk_hasil_jawab_soal` FOREIGN KEY (`id_soal`) REFERENCES `soal` (`id_soal`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_hasil_jawab_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `jadwal_test`
--
ALTER TABLE `jadwal_test`
  ADD CONSTRAINT `fk_jadwal_test_level` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `soal`
--
ALTER TABLE `soal`
  ADD CONSTRAINT `fk_soal_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_soal_level` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_level` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
