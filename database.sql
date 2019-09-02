-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Sep 2019 pada 14.51
-- Versi server: 10.1.30-MariaDB
-- Versi PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kostning`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kostning`
--

CREATE TABLE `kostning` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kampus` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tahun` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kostning`
--

INSERT INTO `kostning` (`id`, `nama`, `kampus`, `jurusan`, `telp`, `alamat`, `tahun`, `gambar`) VALUES
(1, 'hernanda cp', 'Polinema', 'Teknik Informatika', '083846434450', 'trenggalek', '2019', '5d243bc094ccc.jpg'),
(2, 'candra', '', '', '1234', 'malang', '2019', '5d22df559d8f3.jpg'),
(3, 'Gideon', '', '', '19', 'sby', '2000', '5d235a38c5938.jpg'),
(8, 'hernanda', '', '', '19', 'sby', '2000', ''),
(9, 'hernanda cp', '', '', '19', 'sby', '2000', ''),
(14, 'Hernanda Candra P', '', '', '08', 'TRENGGALEK', '2019', '5d22de4b4b63d.jpg'),
(15, 'Hernanda Candra P', '', '', '08', 'TRENGGALEK', '2019', '5d22ddea672ae.jpg'),
(16, '9', '', '', '08', 'TRENGGALEK', '2019', '5d23565460740.jpg'),
(17, 'he', 'Polinema', 'Teknik Informatika', '19', 'sby', '2000', '5d243d8986b2a.jpg'),
(19, 'hernanda', 'Polinema', 'ti', '19', 'sby', '2000', '5d2560a70fd60.jpg'),
(20, 'hernanda', 'Polinema', 'ti', '19', 'sby', '2000', '5d31beb459d39.jpg'),
(21, 'Hernanda Candra P', 'POLINEMA', 'Teknik Informatika', '08', 'TRENGGALEK', '2019', '5d31c8031a1f6.jpg'),
(22, '9', 'POLINEMA', 'Teknik Informatika', '08', 'TRENGGALEK', '2019', '5d31c83ac3335.jpg'),
(23, 'Hernanda Candra P', 'POLINEMA', 'Teknik Informatika', '08', 'TRENGGALEK', '2019', '5d31d07ae4168.jpg'),
(24, 'Hernanda Candra P', 'POLINEMA', 'Teknik Informatika', '08', 'TRENGGALEK', '2019', '5d31d1060ac40.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'hernanda', '$2y$10$fpe6znjZ0NL.LvomJcf0ye9Sryq6nLxVnVzzgi0POXraGMk9rt4H.'),
(2, '1741720184', '$2y$10$mK6C6OJu0kLwptDjlmqM3OJtCAQc8HlbbtXkoL81FtTzXdA8X9BuK'),
(3, 'letsplay09.lp@gmail.com', '$2y$10$3UHpj8AUxxfKaM0moYWETu5uk5X2JpihJHp27Xot2Dwxo00OAC7fy');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kostning`
--
ALTER TABLE `kostning`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kostning`
--
ALTER TABLE `kostning`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
