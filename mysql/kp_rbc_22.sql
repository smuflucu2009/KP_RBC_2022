-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2023 at 03:55 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kp_rbc_22`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(5) NOT NULL,
  `judul_artikel` varchar(100) DEFAULT NULL,
  `jenis_artikel` varchar(15) DEFAULT NULL,
  `isi_artikel` longtext DEFAULT NULL,
  `waktu_artikel` date DEFAULT NULL,
  `deleted_at` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul_artikel`, `jenis_artikel`, `isi_artikel`, `waktu_artikel`, `deleted_at`) VALUES
(1, 'Test_1', '.', '<h1><em>fhgfhgfg</em></h1><div>Bagaimana bisa</div><div><br><br></div>', '2022-12-25', 0),
(2, 'Test_2', 'Info Lomba', 'Lomba - lomba apa yang bikin capek ?? lomba lari.... (krik - krik - krik)', '2022-12-24', 0),
(3, 'WADIDAW, MUI MENGHALALKAN JUDI!!!!', 'Research News', '<div>KATANYA SIH HALAL YAAAA</div>', '1998-06-05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bidang`
--

CREATE TABLE `bidang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_bidang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bidang`
--

INSERT INTO `bidang` (`id`, `nama_bidang`, `created_at`, `updated_at`) VALUES
(1, 'RPL', NULL, NULL),
(2, 'Multimedia', NULL, NULL),
(3, 'Jaringan', NULL, NULL),
(4, 'Embedded', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `no` int(2) DEFAULT NULL,
  `tanggal_masuk` int(4) DEFAULT NULL,
  `judul_buku` varchar(69) DEFAULT NULL,
  `penulis` varchar(31) DEFAULT NULL,
  `penerbit` varchar(25) DEFAULT NULL,
  `isbn` varchar(17) DEFAULT NULL,
  `jenis_peminatan` varchar(34) DEFAULT NULL,
  `detail_jenis_peminatan` varchar(18) DEFAULT NULL,
  `kode_peminatan` varchar(1) DEFAULT NULL,
  `kode_detail_jenis_peminatan` int(2) DEFAULT NULL,
  `kode_tahun` int(2) DEFAULT NULL,
  `kode_nomor_urut_buku` varchar(3) DEFAULT NULL,
  `kode_gabungan_final` varchar(11) NOT NULL,
  `status_pinjam` tinyint(1) DEFAULT 0,
  `deleted_at` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`no`, `tanggal_masuk`, `judul_buku`, `penulis`, `penerbit`, `isbn`, `jenis_peminatan`, `detail_jenis_peminatan`, `kode_peminatan`, `kode_detail_jenis_peminatan`, `kode_tahun`, `kode_nomor_urut_buku`, `kode_gabungan_final`, `status_pinjam`, `deleted_at`) VALUES
(2, 2022, 'PEMROGRAMAN APLIKASI MOBILE SMARTPHONE DAN TABLET PC BERBASIS ANDROID', 'NAZARUDDIN SAFAAT H', 'INFORMATIKA BANDUNG', '978-602-8758-52-9', 'Perangkat Lunak & Mobile Computing', 'Mobile Development', 'P', 12, 25, '002', 'P.12.25.002', 0, 0),
(3, 2022, 'PEMROGRAMAN APLIKASI MOBILE SMARTPHONE DAN TABLET PC BERBASIS ANDROID', 'NAZARUDDIN SAFAAT H', 'INFORMATIKA BANDUNG', '978-602-8758-52-9', 'Perangkat Lunak & Mobile Computing', 'Mobile Development', 'P', 12, 26, '003', 'P.12.26.003', 0, 0),
(4, 2022, 'PANDUAN LENGKAP PEMROGRAMAN ANDROID', 'ZAMRONY P. JUHARA', 'ANDI YOGYAKARTA', '978-979-29-5346-6', 'Perangkat Lunak & Mobile Computing', 'Mobile Development', 'P', 12, 26, '004', 'P.12.26.004', 0, 0),
(5, 2022, 'PRO J2ME POLISH OPEN SOURCE WIRELESS JAVA TOOLS SUITE', 'ROBERT VIRKUS', 'APRESS', '1-59059-503-3', 'Perangkat Lunak & Mobile Computing', 'Mobile Development', 'P', 12, 27, '005', 'P.12.27.005', 0, 0),
(6, 2022, 'PEMROGRAMAN SMARTPHONE MENGGUNAKAN SDK ANDROID DAN HACKING ANDROID', 'PROF. JAZI EKO ISTIYANTO, PH. D', 'GRAHA ILMU', '978-979-756-889-4', 'Perangkat Lunak & Mobile Computing', 'Mobile Development', 'P', 12, 28, '006', 'P.12.28.006', 0, 0),
(7, 2022, 'ANDROID PROGRAMMING WITH ECLIPSE', 'WAHANA KOMPUTER', 'ANDI YOGYAKARTA', '978-979-29-4021-3', 'Perangkat Lunak & Mobile Computing', 'Mobile Development', 'P', 12, 29, '007', 'P.12.29.007', 1, 0),
(8, 2022, 'ANDROID PROGRAMMING WITH ECLIPSE', 'WAHANA KOMPUTER', 'ANDI YOGYAKARTA', '978-979-29-4021-3', 'Perangkat Lunak & Mobile Computing', 'Mobile Development', 'P', 12, 30, '008', 'P.12.30.008', 0, 0),
(9, 2022, 'RAGAM APLIKASI ANDROID UNTUK UKM', 'WAHANA KOMPUTER', 'ANDI YOGYAKARTA', '978-979-29-4335-1', 'Perangkat Lunak & Mobile Computing', 'Mobile Development', 'P', 12, 30, '009', 'P.12.30.009', 0, 0),
(10, 2022, 'STEP BY STEP MENJADI PROGRAMMER ANDROID', 'WAHANA KOMPUTER', 'ANDI YOGYAKARTA', '978-979-29-3511-0', 'Perangkat Lunak & Mobile Computing', 'Mobile Development', 'P', 12, 31, '010', 'P.12.31.010', 0, 0),
(11, 2022, 'STEP BY STEP MENJADI PROGRAMMER ANDROID', 'WAHANA KOMPUTER', 'ANDI YOGYAKARTA', '978-979-29-3511-0', 'Perangkat Lunak & Mobile Computing', 'Mobile Development', 'P', 12, 32, '011', 'P.12.32.011', 0, 0),
(14, 2022, 'PEMROGRAMAN GRAFIK DENGAN JAVA', 'ANDIK TAUFIQ', 'INFORMATIKA BANDUNG', '978-602-8758-15-4', 'Perangkat Lunak & Mobile Computing', 'Mobile Development', 'P', 12, 32, '014', 'P.12.32.014', 0, 0),
(12, 2022, 'STEP BY STEP MENJADI PROGRAMMER ANDROID', 'WAHANA KOMPUTER', 'ANDI YOGYAKARTA', '978-979-29-3511-0', 'Perangkat Lunak & Mobile Computing', 'Mobile Development', 'P', 12, 33, '012', 'P.12.33.012', 0, 0),
(15, 2022, 'PEMROGRAMAN GRAFIK DENGAN JAVA', 'ANDIK TAUFIQ', 'INFORMATIKA BANDUNG', '978-602-8758-15-4', 'Perangkat Lunak & Mobile Computing', 'Mobile Development', 'P', 12, 33, '015', 'P.12.33.015', 0, 0),
(16, 2022, 'PEMROGRAMAN APLIKASI MOBILE SMARTPHONE DAN TABLET BERBASIS ANDROID', 'NAZARUDDIN SAFAAT H', 'INFORMATIKA BANDUNG', '978-602-1514-47-4', 'Perangkat Lunak & Mobile Computing', 'Mobile Development', 'P', 12, 33, '016', 'P.12.33.016', 0, 0),
(13, 2022, 'STEP BY STEP MENJADI PROGRAMMER ANDROID', 'WAHANA KOMPUTER', 'ANDI YOGYAKARTA', '978-979-29-3511-0', 'Perangkat Lunak & Mobile Computing', 'Mobile Development', 'P', 12, 34, '013', 'P.12.34.013', 0, 0),
(17, 2022, 'MEMBANGUN APLIKASI MOBILE DENGAN QT SDK', 'ERICK KURNIAWAN', 'ANDI YOGYAKARTA', '978-979-29-2721-4', 'Perangkat Lunak & Mobile Computing', 'Mobile Development', 'P', 12, 34, '017', 'P.12.34.017', 0, 0),
(18, 2022, 'MEMBANGUN APLIKASI MOBILE DENGAN QT SDK', 'ERICK KURNIAWAN', 'ANDI YOGYAKARTA', '978-979-29-2721-4', 'Perangkat Lunak & Mobile Computing', 'Mobile Development', 'P', 12, 35, '018', 'P.12.35.018', 0, 0),
(19, 2022, 'MEMBANGUN OBJECT ORIENTED SOFTWARE DENGAN JAVA DAN OBJECT DATABASE', 'DJON IRWANTO, S.KOM, MM', 'PT. ELEX MEDIA KOMPUTINDO', '978-979-27-1477-7', 'Perangkat Lunak & Mobile Computing', 'Mobile Development', 'P', 12, 35, '019', 'P.12.35.019', 0, 0),
(20, 2022, 'RATIONAL ROSE UNTUK PEMODELAN BERORIENTASI OBJEK', 'ADI NUGROHO', 'INFORMATIKA BANDUNG', '979-3338-61-X', 'Perangkat Lunak & Mobile Computing', 'Mobile Development', 'P', 12, 36, '020', 'P.12.36.020', 0, 0),
(1, 2022, 'JARKOM', 'DIDI SUHARDI', 'AIRLANGGA', '-', 'Diluar Peminatan', 'Diluar Peminatan', 'X', 30, 24, '001', 'X.30.24.001', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name_category`, `created_at`, `updated_at`) VALUES
(1, 'Info Magang', '2023-01-30 23:47:22', '2023-01-30 23:47:22'),
(2, 'Info Lomba', '2023-01-30 23:47:22', '2023-01-30 23:47:22'),
(3, 'Research News', '2023-01-30 23:47:22', '2023-01-30 23:47:22'),
(4, 'Meditekkom', '2023-01-30 23:47:22', '2023-01-30 23:47:22');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_dosen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_dosen2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `nama_dosen`, `nama_dosen2`, `created_at`, `updated_at`) VALUES
(1, 'Dania Eridani S.T., M.Eng', 'Dania Eridani S.T., M.Eng', NULL, NULL),
(2, 'Dr. Adian Fatchur Rochim, S.T., M.T. SMIEEE', 'Dr. Adian Fatchur Rochim, S.T., M.T. SMIEEE', NULL, NULL),
(3, 'Eko Didik Widianto S.T., M.T.', 'Eko Didik Widianto S.T., M.T.', NULL, NULL),
(4, 'Rinta Kridalukmana, M.Kom., MT., PhD', 'Rinta Kridalukmana, M.Kom., MT., PhD', NULL, NULL),
(5, 'Dr. Ir. R. Rizal Isnanto S.T., M.M., M.T., IPM', 'Dr. Ir. R. Rizal Isnanto S.T., M.M., M.T., IPM', NULL, NULL),
(6, 'Kurniawan Teguh Martono S.T., M.T.', 'Kurniawan Teguh Martono S.T., M.T.', NULL, NULL),
(7, 'Risma Septiana S.T., M.Eng.', 'Risma Septiana S.T., M.Eng.', NULL, NULL),
(8, 'Ike Pertiwi Windasari S.T., M.T.', 'Ike Pertiwi Windasari S.T., M.T.', NULL, NULL),
(9, 'Adnan Fauzi S.T., M.Kom.', 'Adnan Fauzi S.T., M.Kom.', NULL, NULL),
(10, 'Dr. Oky Dwi Nurhayati S.T., M.T.', 'Dr. Oky Dwi Nurhayati S.T., M.T.', NULL, NULL),
(11, 'Agung Budi Prasetijo S.T., M.I.T., Ph.D.', 'Agung Budi Prasetijo S.T., M.I.T., Ph.D.', NULL, NULL),
(12, 'Patricia Evericho Mountaines, S.T., M.Cs.', 'Patricia Evericho Mountaines, S.T., M.Cs.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galery`
--

CREATE TABLE `galery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kp`
--

CREATE TABLE `kp` (
  `id_kp` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bidang_id` bigint(20) UNSIGNED NOT NULL,
  `tahun` int(11) NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dosen_id` bigint(20) UNSIGNED NOT NULL,
  `dosen2_id` bigint(20) UNSIGNED DEFAULT NULL,
  `abstrak` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kp`
--

INSERT INTO `kp` (`id_kp`, `name`, `nim`, `bidang_id`, `tahun`, `judul`, `perusahaan`, `lokasi_perusahaan`, `dosen_id`, `dosen2_id`, `abstrak`, `file`, `created_at`, `deleted_at`) VALUES
(30, 'Aldi Mulyawan', '21120119120026', 4, 2021, 'IMPLEMENTASI MONITORING UPLOAD DATA DRIVER MONITORING SYSTEM', 'PT BERAU COAL HEAD OFFICE BERAU, KALIMANTAN TIMUR', 'Jl. Pemuda, No. 40, Tanjungredeb, Tj. Redeb, Berau, Kabupaten Berau, Kalimantan Timur 77311', 1, NULL, 'Teknologi yang dewasa ini sedang berkembang sangat pesat membuat banyak sektor yang \r\ntidak bergerak di bidang teknologi dipaksa untuk menerapkan teknologi yang dapat membatu \r\nmempermudah dan melancarkan kegiatan. Salah satu contohnya merupaka, PT Berau Coal yang \r\nmerupakan perusahaan yang bergerak dibidang pertambangan batu bara dan beroperasi di Berau, \r\nKalimantan Timur. Perusahaan PT Berau Coal memiliki banyak pekerja, Banyaknya pekerja \r\ntersebut sering menimbulkan kendala sulitnya memantau kinerja dari tiap pekerja. Sehingga \r\ndiperlukan sebuah sistem yang dapat memantau kinerja dari tiap pekerja pada PT Berau Coal.\r\nSistem ini merupakan perangkat lunak berupa layanan penyimpanan data sebagai tempat \r\nkontraktor untuk mengirimkan data post-event driver monitoring system. Sistem ini juga \r\nmenyediakan tampilan monitoring singkat serta visualisasi upload data post-event driver \r\nmonitoring system yang telah diupload oleh kontraktor. Sistem ini dikembangkan dengan \r\nmenggunakan google drive sebagai tempat penyimpanan data post-event, google spreadsheets \r\nsebagai tampilan singkat dari data post-event yang telah diupload kontraktor, google apps script \r\nsebagai penyedia automatisasi pada sistem, serta tableau sebagai alat visualisasi data post-event \r\nyang telah diupload oleh kontraktor\r\nPada akhir kerja praktik ini penulis beserta rekan telah berhasil membuat suatu sistem \r\nupload monitoring driver monitoring system berupa layanan upload data, serta tampilan singkat \r\ndan visualisasi dari data yang telah diupload. Diharapkan ke depannya bagi pengguna yang akan \r\nmenggunakan sistem ini dapat dimudahkan dalam melakukan monitoring driver monitoring system', '230201065710.Laporan Kerja Praktik_Aldi Mulyawan_21120119120026.pdf', NULL, 0),
(31, 'Ilham Farras Adnawan', '21120119140133', 1, 2022, 'PEMBUATAN FITUR MODUL PEMBELAJARAN DAN STUDI  KASUS PADA APLIKASI EDUKASI GRATIFIKASI MENGGUNAKAN FLUTTER DI BADAN KEUANGAN  DAERAH KABUPATEN BOYOLALI', 'BADAN KEUANGAN  DAERAH KABUPATEN BOYOLALI', 'Wonosari, Kemiri, Kec. Mojosongo, Kabupaten Boyolali, Jawa Tengah 57482', 9, NULL, 'Kegiatan kerja praktik adalah mata kuliah wajib bagi mahasiswa Teknik Komputer untuk \r\nmemenuhi syarat kelulusan. Kerja praktik ini dilakukan di Badan Keuangan Daerah (BKD) \r\nKabupaten Boyolali. BKD merupakan unsur pelaksana otonomi daerah dipimpin oleh seorang \r\nKepala Dinas yang mempunyai tugas memimpin dan mengkoordinasi pelaksanaan urusan \r\npemerintahan daerah berdasarkan atas otonomi daerah dan tugas pembantu dibidang pendapatan,\r\npengelolaan keuangan dan aset daerah. Kerja praktik dilaksanakan di Boyolali yang dimulai \r\ntanggal 14 Februari 2022 sampai dengan tanggal 24 Maret 2022.\r\nKerja praktik yang dilakukan adalah membuat suatu aplikasi edukasi gratifikasi \r\nmenggunakan flutter. Aplikasi edukasi gratifikasi ini menggunakan bahasa pemrograman dart. \r\nSelanjutnya aplikasi edukasi gratifikasi ini memiliki berbagai fitur, diantaranya terdapat dua fitur, \r\nPertama yaitu modul pembelajaran dan yang kedua adalah studi kasus.\r\nHasil akhir kerja praktik ini Penulis telah berhasil membuat aplikasi edukasi gratifikasi \r\nmenggunakan flutter dalam rangka melakukan pencegahan korupsi melalui identifikasi gratifikasi \r\nyang diterima Pegawai Negeri dan Penyelenggara Negara serta masyarakat secara luas.', '230201065945.Laporan Kerja Praktik_Ilham Farras Adnawan_21120119140133.pdf', NULL, 0);

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
(12, '2014_10_12_000000_create_users_table', 1),
(13, '2014_10_12_100000_create_password_resets_table', 1),
(14, '2019_08_19_000000_create_failed_jobs_table', 1),
(15, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(16, '2023_01_04_045110_create__dosen.table', 1),
(17, '2023_01_04_045220_create__bidang.table', 1),
(18, '2023_01_04_071221_create_kp_table', 1),
(19, '2023_01_04_081628_create_skripsi_table', 1),
(20, '2023_01_07_113401_categories', 1),
(21, '2023_01_07_120924_posts', 1),
(22, '2023_01_09_053657_galerries', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pinjambuku`
--

CREATE TABLE `pinjambuku` (
  `id_pinjam` int(50) NOT NULL,
  `kode_gabungan_final` varchar(11) CHARACTER SET utf8 NOT NULL,
  `id_user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `awal_pinjam` date DEFAULT current_timestamp(),
  `akhir_pinjam` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pinjambuku`
--

INSERT INTO `pinjambuku` (`id_pinjam`, `kode_gabungan_final`, `id_user`, `awal_pinjam`, `akhir_pinjam`) VALUES
(3, 'P.12.29.007', '21120120140155', '2023-01-24', '2023-02-07');

-- --------------------------------------------------------

--
-- Table structure for table `postingan`
--

CREATE TABLE `postingan` (
  `id_postingan` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `cover_gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `waktu_posting` date DEFAULT current_timestamp(),
  `deleted_at` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `postingan`
--

INSERT INTO `postingan` (`id_postingan`, `judul`, `deskripsi`, `category_id`, `cover_gambar`, `waktu_posting`, `deleted_at`) VALUES
(3, 'dsfsdf', '<div><strong>sdfsdfsdfsdf</strong></div>', 2, '230201030435.pngwing.com.png', '2023-02-01', 0);

-- --------------------------------------------------------

--
-- Table structure for table `skripsi`
--

CREATE TABLE `skripsi` (
  `id_skripsi` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bidang_id` bigint(20) UNSIGNED NOT NULL,
  `tahun` int(11) NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dosen_id` bigint(20) UNSIGNED NOT NULL,
  `dosen2_id` bigint(20) UNSIGNED NOT NULL,
  `abstrak` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skripsi`
--

INSERT INTO `skripsi` (`id_skripsi`, `name`, `nim`, `bidang_id`, `tahun`, `judul`, `dosen_id`, `dosen2_id`, `abstrak`, `file`, `created_at`, `deleted_at`) VALUES
(1, 'sadsadas', '3213123123', 1, 2121, 'asdasdsada', 1, 5, 'asdasdasdasd', 'asdasdasdasd', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama_user`, `id_user`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Admin', '1122334455', '$2y$10$mOWWdODofPASGdZSeItkEuJt7IPdOQydBKMwqM3IvILTZOMYGu4NC', '1', NULL, '2023-01-11 08:01:32', '2023-01-11 08:01:32'),
(5, 'Raung Kawijayan', '21120120140155', '$2y$10$7rrNPOvtI2aisALnoM20oOkqG8kDLurimVxKANu/XyEgNxPzAHCOi', '2', NULL, '2023-01-11 08:01:32', '2023-01-11 08:01:32'),
(7, 'Aldi Mulyawan', '21120119120026', '$2y$10$S2Qy4I.4hVBcFN9bGoLzqOwCtcfzLBHTd0e8RZ0n1si6Fh4Fi14jO', '2', NULL, '2023-01-23 20:25:59', '2023-01-23 20:25:59'),
(8, 'Fauzan Zaman', '21120119140124', '$2y$10$cqX3ROKWuNXQMPoVvzNEyOy64Bc132W4TI2202ia2KaGDR4mno/bG', '2', NULL, '2023-01-23 20:25:59', '2023-01-23 20:25:59'),
(9, 'Muhammad Fahreza Isnanto', '21120120120009', '$2y$10$xvyd1kS/G2lcYw3a95ChZOJU9HalY4K9QPBr/F/AdeCJN/yprvi8C', '2', NULL, '2023-01-23 20:25:59', '2023-01-23 20:25:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`kode_gabungan_final`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galery`
--
ALTER TABLE `galery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galery_post_id_foreign` (`post_id`);

--
-- Indexes for table `kp`
--
ALTER TABLE `kp`
  ADD PRIMARY KEY (`id_kp`),
  ADD KEY `kp_bidang_id_foreign` (`bidang_id`),
  ADD KEY `kp_dosen_id_foreign` (`dosen_id`),
  ADD KEY `kp_dosen2_id_foreign` (`dosen2_id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pinjambuku`
--
ALTER TABLE `pinjambuku`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `pinjam_kode_gabungan_final_foreign` (`kode_gabungan_final`),
  ADD KEY `pinjam_id_user_foreign` (`id_user`);

--
-- Indexes for table `postingan`
--
ALTER TABLE `postingan`
  ADD PRIMARY KEY (`id_postingan`),
  ADD KEY `postingan_category_id_foreign` (`category_id`);

--
-- Indexes for table `skripsi`
--
ALTER TABLE `skripsi`
  ADD PRIMARY KEY (`id_skripsi`),
  ADD KEY `skripsi_bidang_id_foreign` (`bidang_id`),
  ADD KEY `skripsi_dosen_id_foreign` (`dosen_id`),
  ADD KEY `skripsi_dosen2_id_foreign` (`dosen2_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_id_user_unique` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galery`
--
ALTER TABLE `galery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kp`
--
ALTER TABLE `kp`
  MODIFY `id_kp` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pinjambuku`
--
ALTER TABLE `pinjambuku`
  MODIFY `id_pinjam` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `postingan`
--
ALTER TABLE `postingan`
  MODIFY `id_postingan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `skripsi`
--
ALTER TABLE `skripsi`
  MODIFY `id_skripsi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `galery`
--
ALTER TABLE `galery`
  ADD CONSTRAINT `galery_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `postingan` (`id_postingan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kp`
--
ALTER TABLE `kp`
  ADD CONSTRAINT `kp_bidang_id_foreign` FOREIGN KEY (`bidang_id`) REFERENCES `bidang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kp_dosen2_id_foreign` FOREIGN KEY (`dosen2_id`) REFERENCES `dosen` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kp_dosen_id_foreign` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pinjambuku`
--
ALTER TABLE `pinjambuku`
  ADD CONSTRAINT `pinjam_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pinjam_kode_gabungan_final_foreign` FOREIGN KEY (`kode_gabungan_final`) REFERENCES `buku` (`kode_gabungan_final`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `postingan`
--
ALTER TABLE `postingan`
  ADD CONSTRAINT `postingan_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `skripsi`
--
ALTER TABLE `skripsi`
  ADD CONSTRAINT `skripsi_bidang_id_foreign` FOREIGN KEY (`bidang_id`) REFERENCES `bidang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `skripsi_dosen2_id_foreign` FOREIGN KEY (`dosen2_id`) REFERENCES `dosen` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `skripsi_dosen_id_foreign` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
