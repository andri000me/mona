-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12 Des 2019 pada 13.34
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mona`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `biodata`
--

DROP TABLE IF EXISTS `biodata`;
CREATE TABLE `biodata` (
  `id_biodata` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nama_user` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `jkel` int(11) DEFAULT '0',
  `foto` longblob,
  `surat_lamaran` longblob,
  `ijazah` longblob,
  `tgl_isi` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_jawab`
--

DROP TABLE IF EXISTS `hasil_jawab`;
CREATE TABLE `hasil_jawab` (
  `id_hasil` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_soal` int(11) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  `tgl_isi` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_test`
--

DROP TABLE IF EXISTS `jadwal_test`;
CREATE TABLE `jadwal_test` (
  `id_jadwal` int(11) NOT NULL,
  `id_level` int(11) DEFAULT NULL,
  `tgl_mulai` datetime DEFAULT NULL,
  `tgl_selesai` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

DROP TABLE IF EXISTS `level`;
CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal`
--

DROP TABLE IF EXISTS `soal`;
CREATE TABLE `soal` (
  `id_soal` int(11) NOT NULL,
  `id_level` int(11) DEFAULT NULL,
  `pertanyaan` varchar(500) DEFAULT NULL,
  `jawab_a` varchar(200) DEFAULT NULL,
  `jawab_b` varchar(200) DEFAULT NULL,
  `jawab_c` varchar(200) DEFAULT NULL,
  `jawab_d` varchar(200) DEFAULT NULL,
  `kunci` int(11) DEFAULT NULL,
  `tgl_isi` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `suspend` int(11) NOT NULL DEFAULT '0',
  `password` varchar(45) NOT NULL,
  `id_level` int(11),
  `tgl_isi` datetime DEFAULT CURRENT_TIMESTAMP,
  `deleted` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`id_biodata`),
  ADD KEY `fk_biodata_user` (`id_user`);

--
-- Indexes for table `hasil_jawab`
--
ALTER TABLE `hasil_jawab`
  ADD PRIMARY KEY (`id_hasil`),
  ADD KEY `fk_hasil_jawab_user` (`id_user`),
  ADD KEY `fk_hasil_jawab_soal` (`id_soal`);

--
-- Indexes for table `jadwal_test`
--
ALTER TABLE `jadwal_test`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `fk_jadwal_test_level` (`id_level`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id_soal`),
  ADD KEY `fk_soal_level` (`id_level`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_user_level` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biodata`
--
ALTER TABLE `biodata`
  MODIFY `id_biodata` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hasil_jawab`
--
ALTER TABLE `hasil_jawab`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwal_test`
--
ALTER TABLE `jadwal_test`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

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
