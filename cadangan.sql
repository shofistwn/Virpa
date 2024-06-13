-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Waktu pembuatan: 28 Des 2023 pada 22.01
-- Versi server: 5.7.39
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `virpa_posyandu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bayi`
--

CREATE TABLE `bayi` (
  `id_bayi` int(11) UNSIGNED NOT NULL,
  `id_user` int(11) UNSIGNED DEFAULT NULL,
  `kode_bayi` int(11) DEFAULT NULL,
  `nama_bayi` varchar(100) DEFAULT NULL,
  `umur` int(11) DEFAULT NULL,
  `berat_badan` double(10,2) DEFAULT NULL,
  `tinggi_badan` double(10,2) DEFAULT NULL,
  `lingkar_kepala` double(10,2) DEFAULT NULL,
  `jenis_kelamin` varchar(100) DEFAULT NULL,
  `imt` varchar(100) DEFAULT NULL,
  `status_gizi` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `bayi`
--

INSERT INTO `bayi` (`id_bayi`, `id_user`, `kode_bayi`, `nama_bayi`, `umur`, `berat_badan`, `tinggi_badan`, `lingkar_kepala`, `jenis_kelamin`, `imt`, `status_gizi`, `created_at`, `updated_at`, `tgl_lahir`) VALUES
(11, 6, 8931, 'bayikita', 33, 44.00, 44.00, 44.00, 'L', '227.27272727273', 'Obese', '2023-12-28 11:07:25', NULL, '2023-01-28'),
(12, 6, 8068, 'bayikita', 10, 33.00, 33.00, 33.00, 'L', '303.0303030303', 'Obese', '2023-12-28 11:13:36', NULL, '2023-02-08'),
(13, 7, 5492, 'tidak sekali', 6, 6.70, 55.00, 32.00, 'L', '22.148760330579', 'Obese', '2023-12-28 21:59:00', NULL, '2023-05-29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_klasifikasi`
--

CREATE TABLE `data_klasifikasi` (
  `id_klasifikasi` int(11) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `umur` int(11) NOT NULL,
  `berat_badan` double(10,2) NOT NULL,
  `tinggi_badan_cm` double(10,2) NOT NULL,
  `tinggi_badan_m` double(10,2) NOT NULL,
  `lingkar_kepala` double(10,2) DEFAULT NULL,
  `imt` varchar(100) NOT NULL,
  `status_gizi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `data_klasifikasi`
--

INSERT INTO `data_klasifikasi` (`id_klasifikasi`, `jenis_kelamin`, `umur`, `berat_badan`, `tinggi_badan_cm`, `tinggi_badan_m`, `lingkar_kepala`, `imt`, `status_gizi`) VALUES
(1, 'P', 33, 55.00, 44.00, 0.44, 33.00, '284.09090909091', 'Obese'),
(2, 'P', 33, 55.00, 44.00, 0.44, 33.00, '284.09090909091', 'Obese'),
(3, 'P', 44, 13.80, 82.50, 0.82, 45.50, '20.275482093664', 'Obese'),
(4, 'P', 44, 13.80, 82.50, 0.82, 45.50, '20.275482093664', 'Obese'),
(5, 'L', 32, 13.80, 82.50, 0.82, 45.50, '20.275482093664', 'Obese'),
(6, 'L', 88, 66.00, 55.00, 0.55, NULL, '218.18181818182', 'Obese'),
(7, 'P', 66, 66.00, 88.00, 0.88, NULL, '85.227272727273', 'Obese'),
(8, 'P', 34, 13.80, 82.50, 0.82, 45.50, '20.275482093664', 'Obese'),
(9, 'L', 36, 20.00, 95.00, 0.95, NULL, '22.160664819945', 'Obese'),
(10, 'L', 18, 66.00, 55.00, 0.55, 44.00, '218.18181818182', 'Obese'),
(11, 'L', 12, 66.00, 55.00, 0.55, 44.00, '218.18181818182', 'Obese'),
(12, 'L', 12, 66.00, 55.00, 0.55, 44.00, '218.18181818182', 'Obese'),
(13, 'L', 12, 66.00, 55.00, 0.55, 44.00, '218.18181818182', 'Obese'),
(14, 'L', 12, 66.00, 55.00, 0.55, 44.00, '218.18181818182', 'Obese'),
(15, 'L', 12, 66.00, 55.00, 0.55, 44.00, '218.18181818182', 'Obese'),
(16, 'L', 12, 66.00, 55.00, 0.55, 44.00, '218.18181818182', 'Obese'),
(17, 'L', 12, 66.00, 55.00, 0.55, 44.00, '218.18181818182', 'Obese'),
(18, 'L', 12, 66.00, 55.00, 0.55, 44.00, '218.18181818182', 'Obese'),
(19, 'L', 12, 66.00, 55.00, 0.55, 44.00, '218.18181818182', 'Obese'),
(20, 'L', 12, 66.00, 55.00, 0.55, 44.00, '218.18181818182', 'Obese'),
(21, 'L', 12, 66.00, 55.00, 0.55, 44.00, '218.18181818182', 'Obese'),
(22, 'L', 12, 66.00, 55.00, 0.55, 44.00, '218.18181818182', 'Obese'),
(23, 'L', 12, 66.00, 55.00, 0.55, 44.00, '218.18181818182', 'Obese'),
(24, 'L', 12, 66.00, 55.00, 0.55, 44.00, '218.18181818182', 'Obese'),
(25, 'L', 12, 66.00, 55.00, 0.55, 44.00, '218.18181818182', 'Obese'),
(26, 'L', 12, 66.00, 55.00, 0.55, 44.00, '218.18181818182', 'Obese'),
(27, 'L', 12, 66.00, 55.00, 0.55, 44.00, '218.18181818182', 'Obese'),
(28, 'L', 12, 66.00, 55.00, 0.55, 44.00, '218.18181818182', 'Obese'),
(29, 'L', 12, 56.00, 88.00, 0.88, 44.00, '72.314049586777', 'Obese'),
(30, 'L', 12, 56.00, 88.00, 0.88, 44.00, '72.314049586777', 'Obese'),
(31, 'L', 12, 56.00, 88.00, 0.88, 44.00, '72.314049586777', 'Obese'),
(32, 'L', 12, 56.00, 88.00, 0.88, 44.00, '72.314049586777', 'Obese'),
(33, 'L', 12, 88.00, 88.00, 0.88, 44.00, '113.63636363636', 'Obese'),
(34, '', 0, 121.00, 23.00, 0.23, 34.00, '2287.3345935728', '54.2'),
(35, '', 0, 121.00, 23.00, 0.23, 34.00, '2287.3345935728', '54.2'),
(36, '', 0, 121.00, 23.00, 0.23, NULL, '2287.3345935728', '1.1'),
(37, '', 0, 121.00, 23.00, 0.23, NULL, '2287.3345935728', '1.1'),
(38, '', 0, 121.00, 23.00, 0.23, NULL, '2287.3345935728', '1.1'),
(39, '', 0, 121.00, 23.00, 0.23, 44.00, '2287.3345935728', '0.75'),
(40, '', 0, 121.00, 23.00, 0.23, 44.00, '2287.3345935728', '54.2'),
(41, '', 0, 121.00, 23.00, 0.23, 42.00, '2287.3345935728', '85.5'),
(42, '', 0, 121.00, 23.00, 0.23, 46.00, '2287.3345935728', '85.5'),
(43, '', 0, 121.00, 23.00, 0.23, 49.00, '2287.3345935728', '0.75'),
(44, 'L', 12, 121.00, 23.00, 0.23, 34.00, '2287.3345935728', 'Obese'),
(45, 'L', 26, 121.00, 23.00, 0.23, 51.43, '2287.3345935728', 'Obese'),
(46, 'P', 48, 23.00, 324.00, 3.24, 58.35, '2.1909769852157', 'Obese'),
(47, 'P', 49, 23.00, 324.00, 3.24, 55.37, '2.1909769852157', 'Obese'),
(48, 'L', 89, 44.00, 50.00, 0.50, NULL, '176', 'Obese'),
(49, 'L', 96, 79.00, 38.00, 0.38, NULL, '547.09141274238', 'Obese'),
(50, 'L', 29, 24.00, 66.00, 0.66, NULL, '55.096418732782', 'Obese'),
(51, 'L', 44, 44.00, 33.00, 0.33, 45.00, '404.0404040404', 'Obese'),
(52, 'L', 46, 44.00, 33.00, 0.33, 45.00, '404.0404040404', 'Obese'),
(53, 'L', 55, 55.00, 44.00, 0.44, 55.00, '284.09090909091', 'Obese'),
(54, 'L', 33, 44.00, 44.00, 0.44, 44.00, '227.27272727273', 'Obese'),
(55, 'L', 10, 33.00, 33.00, 0.33, 33.00, '303.0303030303', 'Obese'),
(56, 'L', 12, 43.00, 56.00, 0.56, NULL, '137.11734693878', 'Normal'),
(57, 'L', 28, 7.80, 76.50, 0.76, NULL, '13.328207099833', 'Gizi Kurang'),
(58, 'L', 28, 7.80, 74.50, 0.74, NULL, '14.053421017071', 'Gizi Kurang'),
(59, 'L', 28, 8.60, 74.50, 0.74, NULL, '15.494797531643', 'Normal'),
(60, 'L', 6, 6.70, 55.00, 0.55, 32.00, '22.148760330579', 'Obese');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2023-10-21-181541', 'App\\Database\\Migrations\\UserMigration', 'default', 'App', 1698581117, 1),
(2, '2023-10-21-181854', 'App\\Database\\Migrations\\BayiMigration', 'default', 'App', 1698581117, 1),
(3, '2023-10-21-182827', 'App\\Database\\Migrations\\UpdateUser', 'default', 'App', 1698581117, 1),
(4, '2023-10-25-105249', 'App\\Database\\Migrations\\AddFieldtoBayi', 'default', 'App', 1698581117, 1),
(5, '2023-10-26-145444', 'App\\Database\\Migrations\\DataKlasifikasi', 'default', 'App', 1698581117, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) UNSIGNED NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `telepon` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `telepon`, `email`, `username`, `password`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '081234567890', 'admin@gmail.com', 'admin', '$2y$10$t76O6OV8XDFmTGERYPnE8eyNHQfBmFQTbcH/gE2Vsr5Y4ofqoeG0.', 'admin', '2023-10-29 14:42:03', NULL),
(6, 'mantap', '023423', 'dartalfatih04@gmail.com', 'qwer', '$2y$10$FwweqqM.kQOPzKIjRDrkweLDzG/SOsfR.67qfzoCjSOBmZ3ME9P/a', 'ibu', '2023-12-27 22:48:59', '2023-12-27 22:48:59'),
(7, 'Voluptatibus laborum', 'Sit ipsam ea officia', 'kanyxybi@mailinator.com', 'vimicecaxe', '$2y$10$bLAPXhPc0wlJ0awwZrlgluHfpgmM1kzwytc2c0ZX5tZIgN.1PAij.', 'ibu', '2023-12-27 22:49:39', '2023-12-27 22:49:39');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bayi`
--
ALTER TABLE `bayi`
  ADD PRIMARY KEY (`id_bayi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `data_klasifikasi`
--
ALTER TABLE `data_klasifikasi`
  ADD PRIMARY KEY (`id_klasifikasi`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bayi`
--
ALTER TABLE `bayi`
  MODIFY `id_bayi` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `data_klasifikasi`
--
ALTER TABLE `data_klasifikasi`
  MODIFY `id_klasifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bayi`
--
ALTER TABLE `bayi`
  ADD CONSTRAINT `bayi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
