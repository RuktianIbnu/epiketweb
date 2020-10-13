-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Okt 2020 pada 23.41
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiket`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto_pendataan_drc`
--

CREATE TABLE `foto_pendataan_drc` (
  `id_pendataan_drc` int(11) NOT NULL,
  `path` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_jenis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kegiatan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `kode_jenis`, `jenis_kegiatan`, `created_at`, `updated_at`) VALUES
(1, 'rpt', 'Rapat', '2020-04-07 00:21:54', '2020-04-07 00:21:54'),
(2, 'installasi', 'instalasi aplikasi, jaringan, server dll', '2020-04-07 00:25:30', '2020-04-07 00:25:30'),
(5, 'asdas', 'asdasda', '2020-04-07 00:49:27', '2020-04-07 00:49:27'),
(6, 'asdaasdadsasd', 'sdasdasdsa', '2020-04-07 00:49:42', '2020-04-07 00:49:42'),
(7, 'fghdhfgdghf', 'dgfhghfghf', '2020-04-07 00:49:46', '2020-04-07 00:49:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(2, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(3, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(4, '2016_06_01_000004_create_oauth_clients_table', 1),
(5, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(6, '2019_05_23_022421_create_permission_tables', 1),
(7, '2019_05_23_041944_create_users_table', 1),
(8, '2019_05_23_061357_create_table_log_table', 1),
(9, '2019_10_17_040717_create_ms_subdirektorat_table', 1),
(10, '2019_11_14_020705_create_pendataan_tamu_table', 1),
(11, '2020_02_11_071705_create_pendataan_drc_table', 1),
(12, '2020_02_12_035011_create_foto_pendataan_drc_table', 1),
(13, '2020_02_17_101132_create_subdit_table', 1),
(14, '2020_02_18_063618_create_seksi_table', 1),
(15, '2020_03_20_070600_create_partner', 2),
(16, '2020_04_03_045227_create_kegiatan_table', 3),
(17, '2020_04_08_013231_create_ruang_table', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(2, 'App\\User', 5),
(2, 'App\\User', 11),
(2, 'App\\User', 24),
(2, 'App\\User', 26),
(2, 'App\\User', 32),
(2, 'App\\User', 34),
(2, 'App\\User', 35),
(2, 'App\\User', 43),
(2, 'App\\User', 48),
(2, 'App\\User', 49),
(2, 'App\\User', 53),
(2, 'App\\User', 56),
(2, 'App\\User', 66),
(2, 'App\\User', 72),
(2, 'App\\User', 76),
(2, 'App\\User', 81),
(2, 'App\\User', 82),
(2, 'App\\User', 84),
(2, 'App\\User', 87),
(2, 'App\\User', 88),
(2, 'App\\User', 90),
(2, 'App\\User', 93),
(2, 'App\\User', 94),
(2, 'App\\User', 97),
(2, 'App\\User', 102),
(2, 'App\\User', 103),
(3, 'App\\User', 3),
(3, 'App\\User', 9),
(3, 'App\\User', 12),
(3, 'App\\User', 14),
(3, 'App\\User', 15),
(3, 'App\\User', 19),
(3, 'App\\User', 25),
(3, 'App\\User', 29),
(3, 'App\\User', 33),
(3, 'App\\User', 36),
(3, 'App\\User', 38),
(3, 'App\\User', 41),
(3, 'App\\User', 42),
(3, 'App\\User', 59),
(3, 'App\\User', 63),
(3, 'App\\User', 68),
(3, 'App\\User', 70),
(3, 'App\\User', 71),
(3, 'App\\User', 75),
(3, 'App\\User', 77),
(3, 'App\\User', 80),
(3, 'App\\User', 86),
(3, 'App\\User', 91),
(3, 'App\\User', 100),
(3, 'App\\User', 104),
(4, 'App\\User', 13),
(4, 'App\\User', 16),
(4, 'App\\User', 20),
(4, 'App\\User', 21),
(4, 'App\\User', 27),
(4, 'App\\User', 28),
(4, 'App\\User', 30),
(4, 'App\\User', 31),
(4, 'App\\User', 37),
(4, 'App\\User', 39),
(4, 'App\\User', 45),
(4, 'App\\User', 46),
(4, 'App\\User', 47),
(4, 'App\\User', 50),
(4, 'App\\User', 52),
(4, 'App\\User', 54),
(4, 'App\\User', 57),
(4, 'App\\User', 58),
(4, 'App\\User', 62),
(4, 'App\\User', 64),
(4, 'App\\User', 67),
(4, 'App\\User', 69),
(4, 'App\\User', 73),
(4, 'App\\User', 83),
(4, 'App\\User', 89),
(4, 'App\\User', 98),
(5, 'App\\User', 2),
(5, 'App\\User', 6),
(5, 'App\\User', 7),
(5, 'App\\User', 8),
(5, 'App\\User', 10),
(5, 'App\\User', 17),
(5, 'App\\User', 18),
(5, 'App\\User', 22),
(5, 'App\\User', 23),
(5, 'App\\User', 40),
(5, 'App\\User', 44),
(5, 'App\\User', 51),
(5, 'App\\User', 55),
(5, 'App\\User', 60),
(5, 'App\\User', 61),
(5, 'App\\User', 65),
(5, 'App\\User', 74),
(5, 'App\\User', 78),
(5, 'App\\User', 79),
(5, 'App\\User', 85),
(5, 'App\\User', 92),
(5, 'App\\User', 95),
(5, 'App\\User', 96),
(5, 'App\\User', 99),
(5, 'App\\User', 101),
(5, 'App\\User', 105),
(5, 'App\\User', 106);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_subdirektorat`
--

CREATE TABLE `ms_subdirektorat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_subdirektorat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_subdirektorat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip_kasubdit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', '5Ant9X8lc5zYJ9Yw7mOh5X0g2cuNzJDqOdiInBlO', 'http://localhost', 1, 0, 0, '2020-03-18 19:13:20', '2020-03-18 19:13:20'),
(2, NULL, 'Laravel Password Grant Client', 'VjJe05FXUSfC9eEllLY8FBOVCDNw2YnnaMZI9BZP', 'http://localhost', 0, 1, 0, '2020-03-18 19:13:20', '2020-03-18 19:13:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-03-18 19:13:20', '2020-03-18 19:13:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `partner`
--

CREATE TABLE `partner` (
  `id_pendataan_drc` int(11) NOT NULL,
  `nip_petugas_2` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `partner`
--

INSERT INTO `partner` (`id_pendataan_drc`, `nip_petugas_2`, `created_at`, `updated_at`) VALUES
(5950, '276878944388245131', '2020-03-20 00:34:57', '2020-03-20 00:34:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendataan_drc`
--

CREATE TABLE `pendataan_drc` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `petugas_1` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `petugas_2` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suhu_ruangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ac_backup_1` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ac_backup_2` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ups_redudancy` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ups_load` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ups_runtime` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ups_temp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ac_1` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ac_2` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ac_3` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pendataan_drc`
--

INSERT INTO `pendataan_drc` (`id`, `tanggal`, `waktu`, `petugas_1`, `petugas_2`, `suhu_ruangan`, `ac_backup_1`, `ac_backup_2`, `ups_redudancy`, `ups_load`, `ups_runtime`, `ups_temp`, `ac_1`, `ac_2`, `ac_3`, `keterangan`, `created_at`, `updated_at`) VALUES
(8, '2020-03-20', '00:04:00', 'superadmin', '213154321654561321', '12', '31', 'qe', 'asd', 'da', 'ad', '32', 'as', 'as', 'as', 'as', '2020-03-20 00:34:57', '2020-03-21 07:34:38'),
(9, '2020-03-20', '00:04:00', 'superadmin', '276878944388245131', '12', '31', 'qe', 'asd', 'da', 'ad', '32', 'as', 'as', 'as', 'as', '2020-03-20 00:34:57', '2020-03-20 00:34:57'),
(10, '2020-03-20', '00:04:00', 'superadmin', '425251272902472652', '12', '31', 'qe', 'asd', 'da', 'ad', '32', 'as', 'as', 'as', 'as', '2020-03-21 07:32:07', '2020-03-21 07:32:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendataan_tamu`
--

CREATE TABLE `pendataan_tamu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departement` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `lokasi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail_lokasi` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `kategori` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lain_lain` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `efek` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resiko` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_petugas` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_pemberitahuan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_pemberitahuan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo_perintah` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_perintah` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo_kegiatan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip_petugas2` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_petugas2` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pendataan_tamu`
--

INSERT INTO `pendataan_tamu` (`id`, `nama`, `departement`, `jumlah`, `lokasi`, `detail_lokasi`, `tanggal_mulai`, `tanggal_selesai`, `start_time`, `end_time`, `kategori`, `lain_lain`, `deskripsi`, `efek`, `resiko`, `id_petugas`, `photo_pemberitahuan`, `type_pemberitahuan`, `photo_perintah`, `type_perintah`, `photo_kegiatan`, `status`, `nip_petugas2`, `nama_petugas2`, `created_at`, `updated_at`) VALUES
(5, 'marko simic', 'persija', 1, 'Pusdakim 1 lantai 2', '1', '2020-04-08', '2020-04-08', '04:53:44', '08:57:58', '2', NULL, 'The gutters between columns in our predefined grid classes can be removed with .no-gutters. This removes the negative margins from .row and the horizontal padding from all immediate children columns.\r\n\r\nHere’s the source code for creating these styles. Note that column overrides are scoped to only the first children columns and are targeted via attribute selector. While this generates a more specific selector, column padding can still be further customized with spacing utilities.', 'The gutters between columns in our predefined grid classes can be removed with .no-gutters. This removes the negative margins from .row and the horizontal padding from all immediate children columns.\r\n\r\nHere’s the source code for creating these styles. Note that column overrides are scoped to only the first children columns and are targeted via attribute selector. While this generates a more specific selector, column padding can still be further customized with spacing utilities.', 'fgdgf', 'superadmin', 'files/foto_pemberitahuan//202004085332.pdf', 'pdf', 'files/foto_perintah//202004082626.pdf', NULL, 'files/foto_kegiatan//202004088491.jpg', 'checkout', '199507252019011001', 'Ruktian Ibnu Wijonarko', '2020-04-07 21:53:44', '2020-04-08 01:57:58'),
(6, 'dimas', 'Humas', 2, 'Pusdakim 1 lantai 2', '2', '2020-04-08', '2020-04-08', '09:16:58', '09:23:31', '5', NULL, 'foto - foto', '-', '-', '199507252019011001', NULL, NULL, NULL, NULL, 'files/foto_kegiatan//202004088372.jpg', 'checkout', '199507252019011001', 'Ruktian Ibnu Wijonarko', '2020-04-08 02:16:58', '2020-04-08 02:23:31'),
(7, 'cahyo', 'signet', 1, 'Pusdakim 1 lantai 2', '1', '2020-04-18', '2020-04-18', '08:51:15', '16:01:52', '2', NULL, 'test', 'test', 'test', 'superadmin', NULL, NULL, NULL, NULL, 'files/foto_kegiatan//202004183274.jpg', 'checkout', '199507252019011001', 'Ruktian Ibnu Wijonarko', '2020-04-18 01:51:15', '2020-04-18 02:01:52'),
(8, 'test', 'test', 2, 'Pusdakim 1 lantai 2', '1', '2020-04-20', '2020-04-20', '10:30:47', '10:31:20', '2', NULL, 'asas', 'as', 'sa', '199507252019011001', 'files/foto_pemberitahuan//202004204962.pdf', 'pdf', 'files/foto_perintah//202004209636.pdf', NULL, 'files/foto_kegiatan//202004204472.jpg', 'checkout', '199507252019011001', 'Ruktian Ibnu Wijonarko', '2020-04-19 20:30:47', '2020-04-19 20:31:20'),
(9, 'asdasd', 'asdasd', 2, 'Pusdakim 1 lantai 2', '1', '2020-04-20', '2020-04-20', '10:34:42', '10:35:23', '2', NULL, 'sdaas', 'asd', 'asd', '199507252019011001', 'files/foto_pemberitahuan//202004205097.pdf', 'pdf', 'files/foto_perintah//202004204126.pdf', NULL, 'files/foto_kegiatan//202004208630.jpg', 'checkout', '199507252019011001', 'Ruktian Ibnu Wijonarko', '2020-04-19 20:34:42', '2020-04-19 20:35:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Melihat daftar pendataan', 'web', '2020-03-18 09:31:33', '2020-03-18 09:31:33'),
(2, 'Menambah data pendataan', 'web', '2020-03-18 09:31:33', '2020-03-18 09:31:33'),
(3, 'Mengubah data pendataan', 'web', '2020-03-18 09:31:33', '2020-03-18 09:31:33'),
(4, 'Semua proses pendataan', 'web', '2020-03-18 09:31:33', '2020-03-18 09:31:33'),
(5, 'Aksi master', 'web', '2020-03-18 09:31:33', '2020-03-18 09:31:33'),
(6, 'Mencetak seluruh Laporan', 'web', '2020-03-18 09:31:33', '2020-03-18 09:31:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'SUPERADMIN', 'web', '2020-03-18 09:31:33', '2020-03-18 09:31:33'),
(2, 'DIREKTUR', 'web', '2020-03-18 09:31:33', '2020-03-18 09:31:33'),
(3, 'KASUBDIT', 'web', '2020-03-18 09:31:33', '2020-03-18 09:31:33'),
(4, 'KASI', 'web', '2020-03-18 09:31:33', '2020-03-18 09:31:33'),
(5, 'PETUGAS', 'web', '2020-03-18 09:31:33', '2020-03-18 09:31:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 4),
(1, 5),
(2, 1),
(2, 4),
(2, 5),
(3, 1),
(3, 4),
(3, 5),
(4, 1),
(4, 4),
(4, 5),
(5, 1),
(6, 1),
(6, 2),
(6, 3),
(6, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruang`
--

CREATE TABLE `ruang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_ruang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ruang`
--

INSERT INTO `ruang` (`id`, `nama_ruang`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'rapat', 'ruang rapat', '2020-04-07 19:24:04', '2020-04-07 19:24:04'),
(2, 'sdfsd', 'asedsfd', '2020-04-07 19:24:13', '2020-04-07 19:24:13'),
(3, 'asd', 'asd', '2020-04-07 19:24:16', '2020-04-07 19:24:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `seksi`
--

CREATE TABLE `seksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_seksi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_seksi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_subdirektorat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `seksi`
--

INSERT INTO `seksi` (`id`, `kode_seksi`, `nama_seksi`, `kode_subdirektorat`, `created_at`, `updated_at`) VALUES
(1, 'ren', 'perencanaan', 'renbang', '2020-03-19 20:38:33', '2020-03-19 20:38:33'),
(2, 'bang', 'pengembangan', 'renbang', '2020-03-19 20:38:44', '2020-03-19 20:38:44'),
(3, 'dayaguna', 'pendayagunaan', 'renbang', '2020-03-19 20:38:56', '2020-03-19 20:38:56'),
(4, 'wil1', 'wilayah 1', 'harman', '2020-03-19 20:39:05', '2020-03-19 20:39:05'),
(5, 'wil2', 'wilayah 2', 'harman', '2020-03-19 20:39:13', '2020-03-19 20:39:13'),
(6, 'wil 3', 'wilayah 3', 'harman', '2020-03-19 20:39:20', '2020-03-19 20:39:20'),
(8, 'sdfsdf', 'dfsd', 'harman', '2020-04-08 00:11:55', '2020-04-08 00:11:55'),
(9, 'sdfsd', 'sdfsdf', 'harman', '2020-04-08 00:11:59', '2020-04-08 00:11:59'),
(10, 'sd', 'd', 'harman', '2020-04-08 00:12:02', '2020-04-08 00:12:02'),
(14, 'sdf', 'sdf', 'harman', '2020-04-08 00:12:14', '2020-04-08 00:12:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `subdit`
--

CREATE TABLE `subdit` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_subdirektorat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_subdirektorat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `subdit`
--

INSERT INTO `subdit` (`id`, `kode_subdirektorat`, `nama_subdirektorat`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test', '2020-03-18 19:13:40', '2020-03-18 19:13:40'),
(2, 'renbang', 'Perencanaan Dan Pengembangan', '2020-03-18 19:14:01', '2020-03-18 19:14:01'),
(3, 'harman', 'Pemeliharaan dan Pengamanan', '2020-03-19 20:38:16', '2020-03-19 20:38:16'),
(4, 'JASMATIK', 'kerjasama keimigrasian', '2020-03-20 02:56:48', '2020-03-20 02:56:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_log`
--

CREATE TABLE `tbl_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `log` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_subdirektorat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_seksi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aktif` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_pengguna` smallint(6) NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nip`, `nama`, `no_hp`, `password`, `kode_subdirektorat`, `kode_seksi`, `aktif`, `level_pengguna`, `photo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'Super Admin', NULL, '$2y$10$JRpVSYEqVN7X9SsiPmFTEe9axbzijp5E1pdp1C4nGZZ6M/9fV0iI2', '', '', '1', 1, NULL, NULL, '2020-03-18 09:31:33', '2020-03-18 09:31:33'),
(2, '276878944388245131', 'Artanto Anggriawan', NULL, '$2y$10$JRpVSYEqVN7X9SsiPmFTEe9axbzijp5E1pdp1C4nGZZ6M/9fV0iI2', 'RENBANG', 'bang', '1', 5, NULL, NULL, '2020-03-18 09:31:33', '2020-03-23 02:47:23'),
(103, '195952525141522525', 'agato', '25252525525252', '$2y$10$sOAbQ2vgcr5Ys/Tl7EghF.1v0CgEPgm1lsP56jPPdc94VHk8xevbO', NULL, NULL, '1', 2, NULL, NULL, '2020-03-20 02:58:12', '2020-03-20 03:04:44'),
(104, '213154321654561321', 'iman', '1231654231', '$2y$10$RJqxMg2plziU3HcAqzAKFuotlVo.Vt9vZRnnT3JC5B70DINiAcnUy', 'renbang', NULL, '1', 3, NULL, NULL, '2020-03-20 03:00:02', '2020-03-23 02:42:33'),
(105, '199507252019011005', 'test', '081319886308', '$2y$10$lD8n.vhi5zF63k4oJ7wBQOPJ.yb4X37rAVrLYyeG06Gj8x0vDQ7Ay', 'renbang', 'ren', '1', 5, NULL, NULL, '2020-03-29 00:22:45', '2020-03-29 01:28:16'),
(106, '199507252019011001', 'Ruktian Ibnu Wijonarko', '081319886308', '$2y$10$DsNYH3UuZitUSKwa3bzET.rqqcOEkgaHMjHcekYeeP4NDDCmFHXem', 'renbang', 'ren', '1', 5, 'files/foto_petugas/199507252019011001/199507252019011001.jpg', NULL, '2020-04-08 02:15:11', '2020-04-21 23:21:41');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `ms_subdirektorat`
--
ALTER TABLE `ms_subdirektorat`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ms_subdirektorat_kode_subdirektorat_unique` (`kode_subdirektorat`);

--
-- Indeks untuk tabel `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indeks untuk tabel `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indeks untuk tabel `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indeks untuk tabel `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indeks untuk tabel `pendataan_drc`
--
ALTER TABLE `pendataan_drc`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pendataan_tamu`
--
ALTER TABLE `pendataan_tamu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `seksi`
--
ALTER TABLE `seksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `subdit`
--
ALTER TABLE `subdit`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subdit_kode_subdirektorat_unique` (`kode_subdirektorat`);

--
-- Indeks untuk tabel `tbl_log`
--
ALTER TABLE `tbl_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_log_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nip_unique` (`nip`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `ms_subdirektorat`
--
ALTER TABLE `ms_subdirektorat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pendataan_drc`
--
ALTER TABLE `pendataan_drc`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pendataan_tamu`
--
ALTER TABLE `pendataan_tamu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `ruang`
--
ALTER TABLE `ruang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `seksi`
--
ALTER TABLE `seksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `subdit`
--
ALTER TABLE `subdit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_log`
--
ALTER TABLE `tbl_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_log`
--
ALTER TABLE `tbl_log`
  ADD CONSTRAINT `tbl_log_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
