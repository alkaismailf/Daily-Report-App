-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2021 at 05:45 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dailyreport`
--

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_08_23_080942_create_report_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_report`
--

CREATE TABLE `tb_report` (
  `id_report` int(10) UNSIGNED NOT NULL,
  `nik` bigint(20) UNSIGNED NOT NULL,
  `task` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_report`
--

INSERT INTO `tb_report` (`id_report`, `nik`, `task`, `description`, `created_at`, `updated_at`) VALUES
(1, 20151255477, 'Membuat roti buaya', '- Membuat Adonan\r\n- Memanggang Roti', '2021-08-23 22:24:27', '2021-08-23 22:24:27'),
(2, 20151255477, 'Memasak Nasi', '- Mencuci beras\r\n- Memasukkan tempat nanak nasi', '2021-08-23 22:25:15', '2021-08-24 00:06:57'),
(3, 20162488190, 'Ganti cat velg', '- Lepas velg\r\n- Amplas velg\r\n- Cat velg dengan warna ungu', '2021-08-23 22:26:26', '2021-08-23 22:26:26'),
(4, 20162488190, 'Servis motor', '- Pembersihan CVT\r\n- Ganti Oli\r\n- Ganti Filter', '2021-08-23 22:27:15', '2021-08-23 22:27:15'),
(5, 20157542814, 'Membuat Jadwal Piket', '- Mendata setiap pegawai\r\n- Mengundi jadwal', '2021-08-24 22:55:04', '2021-08-24 22:55:04'),
(6, 20157542814, 'Masak telur', '- Menggunakan telur buaya\r\n- Digoreng ceplok\r\n- Ditambah bumbu lada hitam', '2021-08-26 07:56:07', '2021-08-26 07:56:07'),
(7, 20151255477, 'coba-coba', 'lorem ipsum', '2021-08-08 17:00:00', NULL),
(8, 20162488190, 'iseng doang', 'cuma iseng jangan serius', '2021-08-09 17:00:00', NULL),
(9, 20151255477, 'testing', 'testing \r\ncek 1 2 3 4', '2021-08-11 17:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nik` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('L','P') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('pegawai','manajer') COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nik`, `name`, `gender`, `alamat`, `email`, `password`, `role`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 20151255477, 'Lucas Thornberry', 'L', 'Buah Batu', 'lucas.tbr@yahoo.com', '$2y$10$LnQ/etY0O3BmuZlGVLyos.VJ9kLstMAD2yCDcTtaK8YyOED0yIb8S', 'pegawai', 'Anchor-Wallpapers-12.jpg', NULL, '2021-08-23 22:23:24', '2021-08-26 04:26:23'),
(2, 20162488190, 'Andy Respata', 'L', 'Cilengkrang', 'andyres24@gmail.com', '$2y$10$ya.CS5sEs0U3G0hsTkIGzuxAxdh3Z6pXenEcc7vdkrTqKB8VsQbC.', 'pegawai', 'Sword & Shield.jpg', NULL, '2021-08-23 22:23:43', '2021-08-26 04:27:57'),
(3, 20157542814, 'Julia Rodriguez', 'P', 'Cimahi', 'julia.rod@gmail.com', '$2y$10$tD4fRRTbKP69ixJn.ZflkeLag3VdwFVlqOxtiKNmNRElyJr14/bSa', 'manajer', 'Anchor.png', NULL, '2021-08-24 01:02:35', '2021-08-26 06:00:15');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tb_report`
--
ALTER TABLE `tb_report`
  ADD PRIMARY KEY (`id_report`),
  ADD KEY `tb_report_nik_foreign` (`nik`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tb_user_nik_unique` (`nik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_report`
--
ALTER TABLE `tb_report`
  MODIFY `id_report` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_report`
--
ALTER TABLE `tb_report`
  ADD CONSTRAINT `tb_report_nik_foreign` FOREIGN KEY (`nik`) REFERENCES `users` (`nik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
