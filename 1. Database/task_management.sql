-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Nov 2022 pada 13.14
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task_management`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `start_date` date NOT NULL,
  `finish_date` date NOT NULL,
  `status` enum('New','On Progress','Finish') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `task`
--

INSERT INTO `task` (`id`, `category_id`, `title`, `description`, `start_date`, `finish_date`, `status`) VALUES
(1, 1, 'Makan Nasreng', 'makan mi dengan sedikit toping nasi mweheheh.', '2022-11-01', '2022-11-01', 'Finish'),
(5, 3, 'Minum', 'Minum Sprite', '2022-11-01', '2022-11-01', 'Finish');

-- --------------------------------------------------------

--
-- Struktur dari tabel `task_categories`
--

CREATE TABLE `task_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `task_categories`
--

INSERT INTO `task_categories` (`id`, `name`) VALUES
(1, 'Makan Besar'),
(3, 'Minum');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_categories_id_task` (`category_id`);

--
-- Indeks untuk tabel `task_categories`
--
ALTER TABLE `task_categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `task_categories`
--
ALTER TABLE `task_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `fk_categories_id_task` FOREIGN KEY (`category_id`) REFERENCES `task_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
