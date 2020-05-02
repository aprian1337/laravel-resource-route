-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2020 at 10:04 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kegiatan2`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `KD_BRG` int(11) NOT NULL,
  `NM_BRG` varchar(30) DEFAULT NULL,
  `MERK` varchar(20) DEFAULT NULL,
  `TYPE` varchar(20) DEFAULT NULL,
  `HARGA` varchar(15) DEFAULT NULL,
  `STOK` varchar(10) DEFAULT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(17, '2014_10_12_100000_create_password_resets_table', 2),
(18, '2014_10_12_000000_create_users_table', 3),
(19, '2019_08_19_000000_create_failed_jobs_table', 3),
(20, '2020_05_02_035356_user', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `KD_PEMBELI` int(11) NOT NULL,
  `NM_PEMBELI` varchar(1024) DEFAULT NULL,
  `JENIS_KELAMIN` varchar(1024) DEFAULT NULL,
  `ALAMAT` text DEFAULT NULL,
  `KOTA` varchar(20) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`KD_PEMBELI`, `NM_PEMBELI`, `JENIS_KELAMIN`, `ALAMAT`, `KOTA`, `updated_at`, `created_at`) VALUES
(1, 'Dwiky', 'Laki-Laki', 'OIJoisajdiojsaioda', 'Malang', '2020-05-02 08:27:41', '2020-05-02 08:27:41'),
(2, 'Dwiky', 'Laki-Laki', 'OIJoisajdiojsaioda', 'Malang', '2020-05-02 08:28:07', '2020-05-02 08:28:07'),
(3, 'pokpo', 'Perempuan', 'opdaks', 'odsak', '2020-05-02 08:29:03', '2020-05-02 08:29:03'),
(4, 'mkmlkklmolij', 'Perempuan', 'okadsdasd', 'opkdoaspad', '2020-05-02 08:44:16', '2020-05-02 08:44:16'),
(5, 'dkopqkwpodkqpok', 'Perempuan', 'kdposa', 'kopkdas', '2020-05-02 08:45:29', '2020-05-02 08:45:29'),
(6, 'dsokpqwkdo', 'Perempuan', 'o;pksaoda', 'kpodakssak;odl', '2020-05-02 08:46:26', '2020-05-02 08:46:26'),
(7, 'dsokpqwkdo', 'Perempuan', 'o;pksaoda', 'kpodakssak;odl', '2020-05-02 08:47:03', '2020-05-02 08:47:03'),
(8, 'dsokpqwkdo', 'Perempuan', 'o;pksaoda', 'kpodakssak;odl', '2020-05-02 08:48:26', '2020-05-02 08:48:26'),
(9, 'dpaskdpoaksdopkpok', 'Perempuan', 'l,;asdm;das', 'sdakopo', '2020-05-02 10:15:27', '2020-05-02 10:15:27'),
(10, 'dsoakdposadpk', 'Perempuan', 'okpodaskpdoas', 'kpoksapdp', '2020-05-02 10:15:37', '2020-05-02 10:15:37'),
(11, 'dskapdokaspok', 'Laki-Laki', 'opkop', 'dakspokaopk', '2020-05-02 10:15:49', '2020-05-02 10:15:49'),
(12, 'ebikun', 'Perempuan', 'iya', 'bwi', '2020-05-02 12:57:09', '2020-05-02 12:57:09');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `KD_TRX` int(11) NOT NULL,
  `KD_BRG` int(11) DEFAULT NULL,
  `KD_PEMBELI` int(11) DEFAULT NULL,
  `TGL_BELI` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@aww.com', NULL, '$2y$10$.c3K8EGLzQTYk0FcOEdrxePBYegmShiEHWtyj0XY2MZUqHK5PuESe', NULL, '2020-05-01 23:36:23', '2020-05-01 23:36:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`KD_BRG`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`KD_PEMBELI`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`KD_TRX`),
  ADD KEY `FK_RELATIONSHIP_1` (`KD_PEMBELI`),
  ADD KEY `FK_RELATIONSHIP_2` (`KD_BRG`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `KD_BRG` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `KD_PEMBELI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `KD_TRX` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `FK_RELATIONSHIP_1` FOREIGN KEY (`KD_PEMBELI`) REFERENCES `pembeli` (`KD_PEMBELI`),
  ADD CONSTRAINT `FK_RELATIONSHIP_2` FOREIGN KEY (`KD_BRG`) REFERENCES `barang` (`KD_BRG`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
