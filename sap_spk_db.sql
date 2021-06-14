-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2021 at 08:43 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sap_spk_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `status` enum('daftar','unggulan','belum unggulan') NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `id_pembeli`, `status`, `total`) VALUES
(1, 4, 'daftar', 0),
(2, 7, 'daftar', 0);

-- --------------------------------------------------------

--
-- Table structure for table `alternatif_nilai`
--

CREATE TABLE `alternatif_nilai` (
  `id_alternatif_nilai` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_subkriteria` int(11) NOT NULL,
  `id_nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alternatif_nilai`
--

INSERT INTO `alternatif_nilai` (`id_alternatif_nilai`, `id_alternatif`, `id_kriteria`, `id_subkriteria`, `id_nilai`) VALUES
(1, 1, 1, 1, 1),
(2, 1, 6, 5, 5),
(3, 1, 7, 10, 10),
(4, 1, 8, 16, 16),
(5, 1, 9, 19, 19),
(6, 1, 13, 29, 29),
(7, 2, 1, 1, 1),
(8, 2, 6, 6, 6),
(9, 2, 7, 33, 33),
(10, 2, 8, 16, 16),
(11, 2, 9, 20, 20),
(12, 2, 13, 31, 31);

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `id_tujuan` int(11) NOT NULL,
  `judul` varchar(30) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(3, 'operator', 'Website Operator');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`) VALUES
(1, 'Pekerjaan'),
(6, 'Penghasilan'),
(7, 'Riwayat Kredit'),
(8, 'Usia'),
(9, 'Uang Muka'),
(13, 'Jangka Waktu');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_nilai`
--

CREATE TABLE `kriteria_nilai` (
  `id_kriteria_nilai` int(11) NOT NULL,
  `kriteria_id_dari` int(11) NOT NULL,
  `kriteria_id_tujuan` int(11) NOT NULL,
  `nilai` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria_nilai`
--

INSERT INTO `kriteria_nilai` (`id_kriteria_nilai`, `kriteria_id_dari`, `kriteria_id_tujuan`, `nilai`) VALUES
(1, 1, 2, 3),
(2, 1, 3, 5),
(3, 1, 4, 7),
(4, 1, 5, 9),
(5, 2, 3, 3),
(6, 2, 4, 5),
(7, 2, 5, 7),
(8, 3, 4, 3),
(9, 3, 5, 5),
(10, 4, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(0);

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` int(11) NOT NULL,
  `nama_pembeli` varchar(100) NOT NULL,
  `usia` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `penghasilan` int(15) NOT NULL,
  `riwayat_kredit` varchar(30) NOT NULL,
  `uang_muka` int(11) NOT NULL,
  `jangka_waktu` varchar(20) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `no_telpon` varchar(20) NOT NULL,
  `pas_foto` varchar(200) NOT NULL,
  `ktp` varchar(200) NOT NULL,
  `kk` varchar(200) NOT NULL,
  `surat_nikah` varchar(200) DEFAULT NULL,
  `slip_gaji` varchar(200) DEFAULT NULL,
  `sk_terakhir` varchar(200) DEFAULT NULL,
  `surat_ket_kerja` varchar(200) DEFAULT NULL,
  `siup` varchar(200) DEFAULT NULL,
  `daftar_perusahaan` varchar(200) DEFAULT NULL,
  `surat_ket_dom` varchar(200) DEFAULT NULL,
  `laporan_keuangan` varchar(200) DEFAULT NULL,
  `npwp` varchar(200) NOT NULL,
  `buku_tabungan` varchar(200) NOT NULL,
  `rekening_koran` varchar(200) NOT NULL,
  `surat_pernyataan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`id_pembeli`, `nama_pembeli`, `usia`, `status`, `alamat`, `pekerjaan`, `penghasilan`, `riwayat_kredit`, `uang_muka`, `jangka_waktu`, `agama`, `no_telpon`, `pas_foto`, `ktp`, `kk`, `surat_nikah`, `slip_gaji`, `sk_terakhir`, `surat_ket_kerja`, `siup`, `daftar_perusahaan`, `surat_ket_dom`, `laporan_keuangan`, `npwp`, `buku_tabungan`, `rekening_koran`, `surat_pernyataan`) VALUES
(3, 'Jonaidi Madri, S.H., M.H.', 52, 'Menikah', 'Jl. Walet', 'Pegawai Negeri Sipil', 7400000, 'Kolektibilitas 2', 8500000, '15 Tahun', 'Islam', '12345', '609758fb75b4f-pas_foto3x4.pdf', '6097563bce570-2_ektp.pdf', '6097563bcfff8-3_kk.pdf', '6097563bd1f20-4_surat_nikah.pdf', '6097563bd3f98-5_slip_gaji.pdf', '6097563bd5b10-6_sk_terakhir.pdf', NULL, NULL, NULL, NULL, NULL, '6097563bde4bb-12_npwp.pdf', '6097563bdf6a5-13_buku_tabungan.pdf', '6097563be9f74-14_rekening_koran.pdf', '6097563bebe63-15_surat_pernyataan.pdf'),
(4, 'Jar\'an Kadir, S.H.', 49, 'Cerai', 'Jl. Permata', 'Karyawan Swasta', 6700000, 'Kolektibilitas 4', 7000000, '20 Tahun', 'Kristen Protestan', '12345', '609756fa9c0e7-1_pas_foto.pdf', '609756fa9df7f-2_ektp.pdf', '609756faa861f-3_kk.pdf', '609756faa9e23-4_surat_cerai.pdf', '609756faab955-5_slip_gaji.pdf', NULL, '609756fab02ef-7_surat_keterangan_kerja.pdf', NULL, NULL, NULL, NULL, '609756fabb012-12_npwp.pdf', '609756fabc3d3-13_buku_tabungan.pdf', '609756fabda9a-14_rekening_koran.pdf', '609756fabf141-15_surat_pernyataan.pdf'),
(5, 'Riswan Laidi, S.H.', 28, 'Lajang', 'Jl. in aja dulu', 'Wiraswasta', 5900000, 'Kolektibilitas 3', 10000000, '10 Tahun', 'Hindhu', '123', '6097576ab784f-1_pas_foto.pdf', '6097576ac1e83-2_ektp.pdf', '6097576ac2ade-3_kk.pdf', NULL, NULL, NULL, NULL, '6097576ac9bb6-8_siup.pdf', '6097576acb3e2-9_tanda_daftar_perusahaan.pdf', '6097576acd39f-10_surat_keterangan_domisili.pdf', '6097576acf348-11_laporan_keuangan.pdf', '6097576ad0ebe-12_npwp.pdf', '6097576ad2321-13_buku_tabungan.pdf', '6097576ad39f3-14_rekening_koran.pdf', '6097576ad4c9e-15_surat_pernyataan.pdf'),
(6, 'Karnali, S.H.', 59, 'Menikah', 'Jl. Jalan aja', 'Pegawai Negeri Sipil', 6000000, 'Kolektibilitas 1', 8500000, '20 Tahun', 'Buddha', '1234', '60975807e428f-1_pas_foto.pdf', '60975807e5665-2_ektp.pdf', '60975807f064f-3_kk.pdf', '60975807f2692-4_surat_nikah.pdf', '60975897583bc-5_slip_gaji.pdf', '609758975bb07-6_sk_terakhir.pdf', NULL, NULL, NULL, NULL, NULL, '609758081183c-12_npwp.pdf', '60975808134f7-13_buku_tabungan.pdf', '6097580815531-14_rekening_koran.pdf', '60975808175a9-15_surat_pernyataan.pdf'),
(7, 'Proklamasi Putra Moses Prawinaranegara Hambuako, S.H.', 34, 'Menikah', 'Jl. Moh. Yamin', 'Pegawai Negeri Sipil', 7654000, 'Kolektibilitas 1', 10000000, '10 Tahun', 'Konghuchu', '123', '60975bfaae769-1_pas_foto.pdf', '60975bfaaf2bb-2_ektp.pdf', '60975bfab0104-3_kk.pdf', '60975c6033a4f-4_surat_nikah.pdf', '60975c6034fcc-5_slip_gaji.pdf', '60975c60362bb-6_sk_terakhir.pdf', '60975c60379ca-7_surat_keterangan_kerja.pdf', '60975c6039092-8_siup.pdf', '60975c603a5bf-9_tanda_daftar_perusahaan.pdf', '60975c603c043-10_surat_keterangan_domisili.pdf', '60975c603d4de-11_laporan_keuangan.pdf', '60975bfab8730-12_npwp.pdf', '60975bfab9169-13_buku_tabungan.pdf', '60975bfab9b26-14_rekening_koran.pdf', '60975bfaba684-15_surat_pernyataan.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `nama_depan` varchar(30) NOT NULL,
  `nama_belakang` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `subjek` varchar(30) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria`
--

CREATE TABLE `subkriteria` (
  `id_subkriteria` int(11) NOT NULL,
  `nama_subkriteria` varchar(50) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `tipe` enum('teks','nilai') DEFAULT NULL,
  `nilai_minimum` double DEFAULT NULL,
  `nilai_maksimum` double DEFAULT NULL,
  `op_min` varchar(4) DEFAULT NULL,
  `op_max` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subkriteria`
--

INSERT INTO `subkriteria` (`id_subkriteria`, `nama_subkriteria`, `id_kriteria`, `tipe`, `nilai_minimum`, `nilai_maksimum`, `op_min`, `op_max`) VALUES
(1, 'Pegawai Negeri Sipil', 1, 'teks', NULL, NULL, NULL, NULL),
(2, 'Karyawan Swasta', 1, 'teks', NULL, NULL, NULL, NULL),
(3, 'Wiraswasta', 1, 'teks', NULL, NULL, NULL, NULL),
(4, '6000000 - 8000000', 6, 'nilai', 6000000, 8000000, '=>', '<='),
(5, '4500000 - 6000000', 6, 'nilai', 4500000, 6000000, '=>', '<='),
(6, '2800000 - 4500000', 6, 'nilai', 2800000, 4500000, '=>', '<='),
(10, 'Kolektibilitas 1', 7, 'teks', NULL, NULL, NULL, NULL),
(12, 'Kolektibilitas 3', 7, 'teks', NULL, NULL, NULL, NULL),
(13, 'Kolektibilitas 4', 7, 'teks', NULL, NULL, NULL, NULL),
(14, 'Kolektibilitas 5', 7, 'teks', NULL, NULL, NULL, NULL),
(15, '21 - 30', 8, 'nilai', 21, 30, '=>', '<='),
(16, '31 - 40', 8, 'nilai', 31, 40, '=>', '<='),
(17, '41 - 55', 8, 'nilai', 41, 55, '=>', '<='),
(18, '7000000', 9, 'teks', NULL, NULL, NULL, NULL),
(19, '8500000', 9, 'teks', NULL, NULL, NULL, NULL),
(20, '10000000', 9, 'teks', NULL, NULL, NULL, NULL),
(29, '10', 13, 'teks', NULL, NULL, NULL, NULL),
(30, '15', 13, 'teks', NULL, NULL, NULL, NULL),
(31, '20', 13, 'teks', NULL, NULL, NULL, NULL),
(33, 'Kolektibilitas 2', 7, 'teks', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria_hasil`
--

CREATE TABLE `subkriteria_hasil` (
  `id_subkriteria_hasil` int(11) NOT NULL,
  `id_subkriteria` int(11) NOT NULL,
  `prioritas` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subkriteria_hasil`
--

INSERT INTO `subkriteria_hasil` (`id_subkriteria_hasil`, `id_subkriteria`, `prioritas`) VALUES
(1, 1, 1),
(2, 4, 0.5137562237316323),
(3, 7, 0.4591700059245647),
(4, 2, 0.44825276236315115),
(5, 5, 0.4435739436939739),
(6, 8, 0.5137562237316323),
(7, 3, 0.5137562237316323),
(8, 6, 0.5137562237316323),
(9, 9, 0.5137562237316323),
(10, 10, 1),
(11, 11, 1),
(12, 12, 1),
(13, 13, 1),
(14, 14, 1),
(15, 15, 1),
(16, 16, 1),
(17, 17, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria_nilai`
--

CREATE TABLE `subkriteria_nilai` (
  `id_subkriteria_nilai` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `subkriteria_id_dari` int(11) NOT NULL,
  `subkriteria_id_tujuan` int(11) NOT NULL,
  `nilai` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subkriteria_nilai`
--

INSERT INTO `subkriteria_nilai` (`id_subkriteria_nilai`, `id_kriteria`, `subkriteria_id_dari`, `subkriteria_id_tujuan`, `nilai`) VALUES
(1, 1, 1, 4, 1),
(2, 1, 1, 7, 3),
(3, 1, 1, 2, 5),
(4, 1, 1, 5, 7),
(5, 1, 1, 8, 1),
(6, 1, 1, 3, 1),
(7, 1, 1, 6, 1),
(8, 1, 1, 9, 1),
(9, 1, 4, 7, 1),
(10, 1, 4, 2, 1),
(11, 1, 4, 5, 1),
(12, 1, 4, 8, 1),
(13, 1, 4, 3, 1),
(14, 1, 4, 6, 1),
(15, 1, 4, 9, 1),
(16, 1, 7, 2, 1),
(17, 1, 7, 5, 1),
(18, 1, 7, 8, 1),
(19, 1, 7, 3, 1),
(20, 1, 7, 6, 1),
(21, 1, 7, 9, 1),
(22, 1, 2, 5, 1),
(23, 1, 2, 8, 1),
(24, 1, 2, 3, 1),
(25, 1, 2, 6, 1),
(26, 1, 2, 9, 1),
(27, 1, 5, 8, 1),
(28, 1, 5, 3, 1),
(29, 1, 5, 6, 1),
(30, 1, 5, 9, 1),
(31, 1, 8, 3, 1),
(32, 1, 8, 6, 1),
(33, 1, 8, 9, 1),
(34, 1, 3, 6, 1),
(35, 1, 3, 9, 1),
(36, 1, 6, 9, 1),
(37, 2, 10, 11, 1),
(38, 2, 10, 12, 1),
(39, 2, 10, 13, 1),
(40, 2, 10, 14, 1),
(41, 2, 11, 12, 1),
(42, 2, 11, 13, 1),
(43, 2, 11, 14, 1),
(44, 2, 12, 13, 1),
(45, 2, 12, 14, 1),
(46, 2, 13, 14, 1),
(47, 3, 15, 16, 1),
(48, 3, 15, 17, 1),
(49, 3, 16, 17, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(2, '::1', 'adeharioyudanto@gmail.com', '$2y$08$lql0hvJRq4GxXKCbmJYYkuaENe7ueD19b5redhklCccv3oISDZ8Pq', NULL, 'adeharioyudanto@gmail.com', NULL, NULL, NULL, 'wE6G7IA9IV5mDpbxZXG2le', 1619100985, 1623650538, 1, 'Ade Ariyo', 'Yudanto', 'PT. Serasi Anugrah Pratama', '081370231033'),
(3, '::1', 'gunanta.s@gmail.com', '$2y$08$IjJPCdE8gle4hYHoSa/kG.hoipD7PRXThSm/e.vLjLBUZGjGpjUaq', NULL, 'gunanta.s@gmail.com', NULL, NULL, NULL, NULL, 1619101074, 1623582251, 1, 'Gunanta', 'Sembiring', 'PT. Serasi Anugrah Pratama', '081375388797'),
(4, '::1', 'ridhorinaldy@gmail.com', '$2y$08$tJhD3PuodvVTCGfjAejoK.ufBFSNr2QN19mbMVdho/fzonnQbz6sq', NULL, 'ridhorinaldy@gmail.com', NULL, NULL, NULL, NULL, 1619101760, 1619246712, 1, 'Ridho', 'Rinaldy', 'PT. Berkah Rizki Putra', '081345678899'),
(5, '::1', 'jimmypelawi@gmail.com', '$2y$08$VemYZpi3IZBguTisFmVqFOTqLv5uDwxX6Dvz32LaL1iu.sXZXlvMK', NULL, 'jimmypelawi@gmail.com', NULL, NULL, NULL, NULL, 1619101861, 1619844720, 1, 'Jimmy', 'Pelawi', 'CV. Pelawinta Durian', '081323456789');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(52, 2, 1),
(59, 3, 3),
(15, 4, 3),
(65, 5, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `alternatif_nilai`
--
ALTER TABLE `alternatif_nilai`
  ADD PRIMARY KEY (`id_alternatif_nilai`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `kriteria_nilai`
--
ALTER TABLE `kriteria_nilai`
  ADD PRIMARY KEY (`id_kriteria_nilai`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD PRIMARY KEY (`id_subkriteria`);

--
-- Indexes for table `subkriteria_hasil`
--
ALTER TABLE `subkriteria_hasil`
  ADD PRIMARY KEY (`id_subkriteria_hasil`);

--
-- Indexes for table `subkriteria_nilai`
--
ALTER TABLE `subkriteria_nilai`
  ADD PRIMARY KEY (`id_subkriteria_nilai`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `alternatif_nilai`
--
ALTER TABLE `alternatif_nilai`
  MODIFY `id_alternatif_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `kriteria_nilai`
--
ALTER TABLE `kriteria_nilai`
  MODIFY `id_kriteria_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id_pembeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `subkriteria_hasil`
--
ALTER TABLE `subkriteria_hasil`
  MODIFY `id_subkriteria_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `subkriteria_nilai`
--
ALTER TABLE `subkriteria_nilai`
  MODIFY `id_subkriteria_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
