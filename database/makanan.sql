-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Okt 2021 pada 10.35
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `makanan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `biodata`
--

CREATE TABLE `biodata` (
  `id_biodata` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(250) DEFAULT NULL,
  `nama_lengkap` varchar(20) DEFAULT NULL,
  `telepon` varchar(250) DEFAULT NULL,
  `alamat` varchar(250) DEFAULT NULL,
  `kota` varchar(250) DEFAULT NULL,
  `jenis_kelamin` varchar(250) DEFAULT NULL,
  `tempat` varchar(250) DEFAULT NULL,
  `tgl_lahir` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar_produk`
--

CREATE TABLE `gambar_produk` (
  `id_gambar` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `gambar_tambah` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `image`
--

CREATE TABLE `image` (
  `id_image` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `gambar_add` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_kategori` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bukti_tf` varchar(250) NOT NULL,
  `nominal` varchar(250) NOT NULL,
  `tgl_awal` varchar(10) NOT NULL,
  `tgl_akhir` varchar(10) NOT NULL,
  `status_tf` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_produk` varchar(250) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `harga` varchar(250) NOT NULL,
  `diskon` int(11) NOT NULL,
  `keterangan` varchar(250) NOT NULL,
  `gambar` varchar(250) NOT NULL,
  `varian` enum('Y','T') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `join_us` varchar(259) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_user` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verifikasi_daftar` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `join_us`, `role`, `status_user`, `logo`, `verifikasi_daftar`) VALUES
(1, 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', '', 'Admin', 'True', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `varian`
--

CREATE TABLE `varian` (
  `id_varian` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `nama_varian` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`id_biodata`);

--
-- Indeks untuk tabel `gambar_produk`
--
ALTER TABLE `gambar_produk`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indeks untuk tabel `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id_image`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `varian`
--
ALTER TABLE `varian`
  ADD PRIMARY KEY (`id_varian`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `biodata`
--
ALTER TABLE `biodata`
  MODIFY `id_biodata` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `gambar_produk`
--
ALTER TABLE `gambar_produk`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `image`
--
ALTER TABLE `image`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `varian`
--
ALTER TABLE `varian`
  MODIFY `id_varian` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
