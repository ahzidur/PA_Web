-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Nov 2022 pada 08.24
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zidan_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama`, `email`, `username`, `password`) VALUES
(1, 'Rausyan', 'rausyanfikrkarmayoga@gmail.com', '2009106020', '$2y$10$KLoYZbKtLQm6ala6W3EJkesIpDo57n0BghTUUGQiX2fGGhRE0Mu4G'),
(2, 'Asep', 'asep@gmail.com', 'asep', '$2y$10$i.7Jb8lww2TQvufVPPaZqeCjfZvkiaz5ysb4.P0Y/g49xAKcUY462'),
(3, 'koko', 'koko@gmail.com', 'koko', '$2y$10$mp3jbuZN3csBKgnnrjxQr.Hp8kAXCTQT8EQHJpRPZuA.pgH0RvMey'),
(4, 'bagas', 'bagas', 'bagas', 'bagas'),
(5, 'caco', 'caco', 'caco', '$2y$10$jGDi/zG1twclY9zZcXEGGOfKggY2gGlHZOf29llph4vc0YxZOb17G');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `nama`, `harga`, `gambar`) VALUES
(1, 'AC', '1900000', 'AC.jpeg'),
(2, 'Kipas', '400000', 'Kipas Angin.jpg'),
(3, 'Kulkas', '1200000', 'Kulkas.jpg'),
(4, 'Lampu', '80000', 'Lampu.jpg'),
(5, 'Mesin Cuci', '1000000', 'Mesin Cuci.jpg'),
(6, 'TV', '2500000', 'TV.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `telepon` varchar(14) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tanggal_beli` date NOT NULL,
  `barang_id` int(11) NOT NULL,
  `jumlah` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id`, `nama`, `telepon`, `alamat`, `tanggal_beli`, `barang_id`, `jumlah`) VALUES
(1, 'Rausyanfikr Adi Karmayoga', '081351580524', 'Jl. Abdul W. Syahranie', '2022-10-29', 1, 0),
(2, 'Rausyanfikr Adi Karmayoga', '081351580524', 'Jl. Abdul W. Syahranie', '2022-10-30', 2, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `email`, `password`) VALUES
(2, 'samsul', 'samsul', 'samsul@gmail.com', 'samsul'),
(3, 'joko', 'joko', 'joko@gmail.com', '$2y$10$Qkyv.Rmd9yvS2tQrBOp0/u1TgGrJ0mGq.75nk6a/JcA'),
(4, 'udin', 'udin', 'udin', '$2y$10$YulwbrraQCwSX//jFrpkrOcJJfhDCoabGQuS77Lf10g'),
(5, 'bayu', 'bayu', 'bayu', '$2y$10$eBYm7AqC8955okrIDTeL6ueEEIopZiW5/AMJe.LQAww'),
(6, 'kayu', 'kayu', 'kayu', '$2y$10$UqWGPjJmJfchhGfUbHBPT.eed3PpI.E514HxM5ob6vG');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
