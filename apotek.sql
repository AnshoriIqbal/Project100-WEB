-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2020 at 10:27 AM
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
-- Database: `apotek`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id_detailpenjualan` int(12) NOT NULL,
  `id_obat` int(12) NOT NULL,
  `id_penjualan` int(12) NOT NULL,
  `jumlah` int(12) NOT NULL,
  `total` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id_detailpenjualan`, `id_obat`, `id_penjualan`, `jumlah`, `total`, `harga`, `created_at`, `updated_at`) VALUES
(24, 22, 19, 10, 40000, 4000, '2020-06-27 23:49:12', '2020-06-27 23:49:12'),
(25, 23, 19, 5, 35000, 7000, '2020-06-27 23:49:25', '2020-06-27 23:49:25'),
(26, 23, 19, 20, 100000, 5000, '2020-06-27 23:49:43', '2020-06-27 23:49:43'),
(27, 22, 20, 5, 25000, 5000, '2020-06-27 23:54:09', '2020-06-27 23:54:09');

-- --------------------------------------------------------

--
-- Table structure for table `detail_supply`
--

CREATE TABLE `detail_supply` (
  `id_detailsupply` int(12) NOT NULL,
  `id_supply` int(12) NOT NULL,
  `id_obat` int(12) NOT NULL,
  `id_detailpenjualan` int(12) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_supply`
--

INSERT INTO `detail_supply` (`id_detailsupply`, `id_supply`, `id_obat`, `id_detailpenjualan`, `created_at`, `updated_at`) VALUES
(16, 1, 23, 24, '2020-06-28 00:25:48', '2020-06-28 00:25:48'),
(17, 1, 22, 26, '2020-06-28 00:26:40', '2020-06-28 00:26:40'),
(18, 1, 24, 25, '2020-06-28 00:27:12', '2020-06-28 00:27:12');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(12) NOT NULL,
  `namaKaryawan` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `jenisKelamin` enum('laki-laki','perempuan') NOT NULL,
  `noTelp` bigint(13) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `namaKaryawan`, `alamat`, `jenisKelamin`, `noTelp`, `created_at`, `updated_at`) VALUES
(11, 'Nisa', 'JL. Kartika', 'perempuan', 8566667738, NULL, NULL),
(12, 'Bambang', 'Jl.Imam Bonjol', 'laki-laki', 8763728398, NULL, NULL),
(13, 'Susilo', 'Jl.Kartini', 'laki-laki', 8423972698, NULL, NULL),
(14, 'Iqbal', 'Jl. Kartini', 'laki-laki', 89765356789, NULL, NULL),
(15, 'Andin', 'JL. Sudirman', 'perempuan', 9889865547, NULL, NULL),
(16, 'Andre Septiastika', 'Pujungan', 'laki-laki', 87862238556, '2020-06-05 03:45:26', '2020-06-05 03:46:30');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(12) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `jenis_obat` varchar(12) NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `jenis_obat`, `stock`, `created_at`, `updated_at`) VALUES
(22, 'paaramex', 'pil', 100, NULL, NULL),
(23, 'Balsem', 'salep', 100, NULL, NULL),
(24, 'panadol', 'sirup', 100, '2020-04-11 14:28:59', '2020-04-11 14:28:59'),
(25, 'antangin', 'sirup', 100, '2020-04-11 16:08:22', '2020-04-11 16:08:22'),
(26, 'Oskadon', 'pill', 100, NULL, '2020-05-27 18:35:29'),
(27, 'Bodrex', 'Pil', 100, '2020-06-05 05:01:44', '2020-06-05 05:01:44');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(12) NOT NULL,
  `namapelanggan` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `jenisKelamin` enum('laki-laki','perempuan','','') NOT NULL,
  `noTelp` bigint(12) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `namapelanggan`, `alamat`, `jenisKelamin`, `noTelp`, `created_at`, `updated_at`) VALUES
(11, 'Jaka', 'Jl. Manokwari', 'laki-laki', 89776554356, NULL, NULL),
(12, 'Sueb', 'Jl. Bisma', 'laki-laki', 89965554432, NULL, NULL),
(13, 'Johan', 'Jl. jalan jalan', 'laki-laki', 8765475847, NULL, NULL),
(14, 'Siti', 'Jl. Patimura', 'perempuan', 835678754467, NULL, NULL),
(15, 'Maryam ', 'Jl. Merak', 'perempuan', 81234568876, NULL, NULL),
(16, 'Andre Septiastika', 'Br. Mekarsari, Pujungan', 'laki-laki', 87862238556, '2020-06-05 03:48:05', '2020-06-26 19:48:30');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `tanggalPengembalian` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id_pengembalian`, `id_karyawan`, `tanggalPengembalian`, `created_at`, `updated_at`) VALUES
(11, 11, '2020-06-01', NULL, NULL),
(12, 12, '2020-06-05', NULL, NULL),
(13, 13, '2020-06-22', NULL, NULL),
(14, 14, '2020-06-30', NULL, NULL),
(15, 15, '2020-06-14', NULL, '2020-06-05 04:03:28'),
(18, 16, '2020-06-26', '2020-06-26 07:39:48', '2020-06-26 07:39:48');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(12) NOT NULL,
  `tanggalPenjualan` date NOT NULL,
  `id_karyawan` int(12) NOT NULL,
  `id_pelanggan` int(12) NOT NULL,
  `hargatotal` int(9) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cash` bigint(20) DEFAULT NULL,
  `kembalian` bigint(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `tanggalPenjualan`, `id_karyawan`, `id_pelanggan`, `hargatotal`, `created_at`, `updated_at`, `cash`, `kembalian`, `status`) VALUES
(19, '2020-06-30', 12, 16, 175000, '2020-06-27 23:48:46', '2020-06-27 23:48:46', 200000, 25000, 'Lunas'),
(20, '2020-06-28', 14, 11, NULL, '2020-06-27 23:53:41', '2020-06-27 23:53:41', NULL, NULL, 'Belum Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(12) NOT NULL,
  `id_pengembalian` int(12) DEFAULT NULL,
  `namaSupplier` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `noTelp` bigint(12) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `id_pengembalian`, `namaSupplier`, `alamat`, `noTelp`, `created_at`, `updated_at`) VALUES
(11, 11, 'PT Interbat', 'Jl Imam Bonjol Kompl Ligamas Bl A-2/21 Tangerang', 55768884, NULL, NULL),
(12, 12, 'PT Daya Sembada', 'Jl Simpang Lima 1 Mal Ciputra 66 Lt UG Semarang', 8449568, NULL, NULL),
(13, 13, 'CV Eka Jaya Sakti', 'Jl Berdikari Raya 1 Semarang', 7471786, NULL, NULL),
(14, 14, 'CV Karsa Mandiri', 'Jl Lampersari 12 Semarang', 8415540, NULL, NULL),
(15, 15, 'PT Dexa Medica', 'Jl Kelapa Gading Slt Kompl Gading Serpong Sktr 1-B Bl BJ-8/2 Tangerang', 54200134, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supply`
--

CREATE TABLE `supply` (
  `id_supply` int(12) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `hargatotal` int(12) NOT NULL,
  `tanggalOrder` date NOT NULL,
  `tanggalPenerimaan` date NOT NULL,
  `tanggalBayar` date NOT NULL,
  `id_karyawan` int(12) NOT NULL,
  `id_supplier` int(12) NOT NULL,
  `id_obat` int(12) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supply`
--

INSERT INTO `supply` (`id_supply`, `quantity`, `hargatotal`, `tanggalOrder`, `tanggalPenerimaan`, `tanggalBayar`, `id_karyawan`, `id_supplier`, `id_obat`, `created_at`, `updated_at`) VALUES
(1, '10', 90000, '2020-06-28', '2020-06-28', '2020-06-28', 16, 11, 22, '2020-06-28 00:14:41', '2020-06-28 00:14:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `roles` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `roles`) VALUES
(1, 'anshori iqbal', 'anshori@undiksha.ac.id', NULL, '$2y$10$m9rhOPRqYnDRr7VOxAFte.9gBFfaajao5meoScjn7aDToDNhlu/MC', NULL, '2020-04-20 17:27:23', '2020-04-20 17:27:23', '[\"admin\"]'),
(2, 'anshori iqbal 2', 'anshori2@undiksha.ac.id', NULL, '$2y$10$fm39tAjNwzEKsIsVdcIYoOwTH3FfJ880v36sd16AGU7Y4ahQ5Zaj2', NULL, '2020-04-20 17:53:30', '2020-04-20 17:53:30', '[\"klien\"]'),
(3, 'anshori iqbal 3', 'anshori3@undiksha.ac.id', NULL, '$2y$10$tt7zmibcFz0VI2jqdB18M.oE22VaoZqNp/bCXz85vDKdJYeg8FGNW', NULL, '2020-04-20 17:54:26', '2020-04-20 17:54:26', '[\"admin\",\"klien\"]');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id_detailpenjualan`),
  ADD KEY `FOREIGN KEY` (`id_obat`) USING BTREE,
  ADD KEY `Id_Penjualan` (`id_penjualan`);

--
-- Indexes for table `detail_supply`
--
ALTER TABLE `detail_supply`
  ADD PRIMARY KEY (`id_detailsupply`),
  ADD KEY `id_obat` (`id_obat`),
  ADD KEY `Id_detailpenjualan` (`id_detailpenjualan`),
  ADD KEY `id_supply` (`id_supply`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `id_karyawan` (`id_karyawan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`),
  ADD KEY `id_pengembalian` (`id_pengembalian`);

--
-- Indexes for table `supply`
--
ALTER TABLE `supply`
  ADD PRIMARY KEY (`id_supply`),
  ADD KEY `id_supplier` (`id_supplier`),
  ADD KEY `id_obat` (`id_obat`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id_detailpenjualan` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `detail_supply`
--
ALTER TABLE `detail_supply`
  MODIFY `id_detailsupply` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `supply`
--
ALTER TABLE `supply`
  MODIFY `id_supply` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD CONSTRAINT `detail_penjualan_ibfk_1` FOREIGN KEY (`id_penjualan`) REFERENCES `penjualan` (`id_penjualan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_supply`
--
ALTER TABLE `detail_supply`
  ADD CONSTRAINT `detail_supply_ibfk_1` FOREIGN KEY (`id_detailpenjualan`) REFERENCES `detail_penjualan` (`id_detailpenjualan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_supply_ibfk_2` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `pengembalian_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penjualan_ibfk_2` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `supplier_ibfk_1` FOREIGN KEY (`id_pengembalian`) REFERENCES `pengembalian` (`id_pengembalian`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
