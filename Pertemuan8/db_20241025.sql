-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Des 2022 pada 07.02
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_20241025`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nim` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nim`, `jurusan`, `email`, `gambar`) VALUES
(1, 'ocit', '20241025', 'PTI', 'ocit@gmail.com', '1.jpg	'),
(2, 'pame', '20241005', 'PTI', 'pame@gmail.com', 'fahmi.jpg'),
(3, 'mad', '20241015', 'PTI', 'mad@gmail.com', '2.jpg'),
(4, 'yik', '20241022', 'PTI', 'yik@gmail.com', '3.jpg'),
(5, 'fik', '20241026', 'PTI', 'fik@gmail.com', '4.jpg'),
(6, 'lang', '20241011', 'PTI', 'lang@gmail.com', '5.jpg'),
(7, 'bo', '20241012', 'PTI', 'bo@gmail.com', '6.jpg'),
(8, 'dot', '20241008', 'PTI', 'dot@gmail.com', '7.jpg'),
(9, 'bot', '20241009', 'PTI', 'bot@gmail.com', '8.jpg'),
(10, 'min', '20241003', 'PTI', 'min@gmail.com', '63ad0cd6c38dc.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
