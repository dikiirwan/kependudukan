-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Sep 2019 pada 07.46
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kependudukan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelahiran`
--

CREATE TABLE `kelahiran` (
  `id_kelahiran` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `tmpt_lahir` varchar(128) NOT NULL,
  `tgl_lahir` varchar(30) NOT NULL,
  `no_ktp_ayah` varchar(30) NOT NULL,
  `no_ktp_ibu` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelahiran`
--

INSERT INTO `kelahiran` (`id_kelahiran`, `nama`, `tmpt_lahir`, `tgl_lahir`, `no_ktp_ayah`, `no_ktp_ibu`, `jenis_kelamin`, `date_created`) VALUES
(1, 'Ahmad A', 'Bihara', '09/14/2019', '1234567891234567', '1234567891234568', 'Laki-laki', 1567794800);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kematian`
--

CREATE TABLE `kematian` (
  `id_kematian` int(11) NOT NULL,
  `tgl_kematian` varchar(30) NOT NULL,
  `no_ktp` varchar(30) NOT NULL,
  `no_kk` varchar(30) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kematian`
--

INSERT INTO `kematian` (`id_kematian`, `tgl_kematian`, `no_ktp`, `no_kk`, `nama`, `jenis_kelamin`, `status`, `date_created`) VALUES
(1, '09/02/2019', '1234567891234567', '1234567891234568', 'Budi A', 'Laki-laki', 'Menikah', 1567851980);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendatang`
--

CREATE TABLE `pendatang` (
  `id_pendatang` int(11) NOT NULL,
  `no_ktp` varchar(30) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL,
  `asal` varchar(128) NOT NULL,
  `tujuan` varchar(128) NOT NULL,
  `tgl_datang` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pendatang`
--

INSERT INTO `pendatang` (`id_pendatang`, `no_ktp`, `nama`, `jenis_kelamin`, `asal`, `tujuan`, `tgl_datang`, `status`, `date_created`) VALUES
(1, '1234567891234568', 'Siti Aisyah', 'Perempuan', 'Balangan', 'Penelitian', '09/02/2019', 'Pelajar', 1567852914);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penduduk`
--

CREATE TABLE `penduduk` (
  `id_penduduk` int(11) NOT NULL,
  `no_ktp` varchar(30) NOT NULL,
  `no_kk` varchar(30) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `telp` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL,
  `tgl_lahir` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penduduk`
--

INSERT INTO `penduduk` (`id_penduduk`, `no_ktp`, `no_kk`, `nama`, `alamat`, `telp`, `jenis_kelamin`, `tgl_lahir`, `status`, `date_created`) VALUES
(1, '1234567891234567', '1234567891234568', 'Budi A', 'Jln Bihara Hilir Rt.01 Rw.01 Kec. Awayan', '085822104317', 'Laki-laki', '09/29/2019', 'Menikah', 1567791138);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pindahan`
--

CREATE TABLE `pindahan` (
  `id_pindahan` int(11) NOT NULL,
  `no_ktp` varchar(30) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL,
  `tujuan` varchar(128) NOT NULL,
  `status` varchar(30) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pindahan`
--

INSERT INTO `pindahan` (`id_pindahan`, `no_ktp`, `nama`, `jenis_kelamin`, `tujuan`, `status`, `date_created`) VALUES
(1, '1234567891234567', 'budi', 'Laki-laki', 'Pindah Rumah', 'Menikah', 1567854155),
(2, '1234567891234569', 'Budi Ahmad', 'Laki-laki', 'Pindah Rumah', 'Menikah', 1567955963);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_user`
--

CREATE TABLE `role_user` (
  `id_role` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `role_user`
--

INSERT INTO `role_user` (`id_role`, `role`) VALUES
(1, 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `gambar` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `gambar`, `role_id`, `is_active`, `date_created`) VALUES
(2, 'dikiirwan', '$2y$10$fUNF8tLuWzNJnAFwUMx95euah1pG7HjT1l8bd0m0as9cx8JJyOUfS', 'Diki Irwan', 'default.jpg', 1, 1, 1567746617),
(3, 'badrun', '$2y$10$9fJa3n/svNxaxG6xvIc8k.7HRmvggCEZ8eE.vBCzKFlg2EtWc22lW', 'Badrun', 'default.jpg', 1, 1, 1567746863),
(4, 'mahasiswa', '$2y$10$vW16pAJfnmpvYukrvT59SOE71z02lBO7aPSjqwo7wzHbq4LgWfyyW', 'Mahasiswa', 'default.jpg', 1, 1, 1567747208),
(5, 'budi', '$2y$10$p7OrflBobDhy8I4nDL2AeOvHJ60KV.AsASmmsO8IRPKyP2wVTL4DK', 'budi', 'default.jpg', 1, 1, 1567762804),
(6, 'adul', '$2y$10$Z0X5vDqcJWSxa//H.p.i0.Tui2psOavEH/ojQGpI46Nj.arsy57ki', 'adul', 'default.jpg', 1, 1, 1567763213);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kelahiran`
--
ALTER TABLE `kelahiran`
  ADD PRIMARY KEY (`id_kelahiran`);

--
-- Indeks untuk tabel `kematian`
--
ALTER TABLE `kematian`
  ADD PRIMARY KEY (`id_kematian`);

--
-- Indeks untuk tabel `pendatang`
--
ALTER TABLE `pendatang`
  ADD PRIMARY KEY (`id_pendatang`);

--
-- Indeks untuk tabel `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`id_penduduk`);

--
-- Indeks untuk tabel `pindahan`
--
ALTER TABLE `pindahan`
  ADD PRIMARY KEY (`id_pindahan`);

--
-- Indeks untuk tabel `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kelahiran`
--
ALTER TABLE `kelahiran`
  MODIFY `id_kelahiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kematian`
--
ALTER TABLE `kematian`
  MODIFY `id_kematian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pendatang`
--
ALTER TABLE `pendatang`
  MODIFY `id_pendatang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `penduduk`
--
ALTER TABLE `penduduk`
  MODIFY `id_penduduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pindahan`
--
ALTER TABLE `pindahan`
  MODIFY `id_pindahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
