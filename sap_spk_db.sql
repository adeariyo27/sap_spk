-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21 Jun 2021 pada 03.33
-- Versi Server: 10.1.21-MariaDB
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
-- Struktur dari tabel `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `id_pembeli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatif_nilai`
--

CREATE TABLE `alternatif_nilai` (
  `id_alternatif_nilai` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_subkriteria` int(11) NOT NULL,
  `id_nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alternatif_nilai`
--

INSERT INTO `alternatif_nilai` (`id_alternatif_nilai`, `id_alternatif`, `id_kriteria`, `id_subkriteria`, `id_nilai`) VALUES
(1, 10, 1, 1, 1),
(2, 10, 6, 6, 6),
(3, 10, 7, 10, 10),
(4, 10, 8, 17, 17),
(5, 10, 9, 19, 19),
(6, 10, 13, 31, 31),
(7, 11, 1, 2, 2),
(8, 11, 6, 5, 5),
(9, 11, 7, 12, 12),
(10, 11, 8, 15, 15),
(11, 11, 9, 18, 18),
(12, 11, 13, 29, 29),
(13, 12, 1, 3, 3),
(14, 12, 6, 4, 4),
(15, 12, 7, 10, 10),
(16, 12, 8, 15, 15),
(17, 12, 9, 20, 20),
(18, 12, 13, 30, 30),
(19, 13, 1, 2, 2),
(20, 13, 6, 4, 4),
(21, 13, 7, 10, 10),
(22, 13, 8, 16, 16),
(23, 13, 9, 19, 19),
(24, 13, 13, 30, 30),
(25, 14, 1, 1, 1),
(26, 14, 6, 5, 5),
(27, 14, 7, 33, 33),
(28, 14, 8, 17, 17),
(29, 14, 9, 18, 18),
(30, 14, 13, 30, 30),
(31, 15, 1, 1, 1),
(32, 15, 6, 4, 4),
(33, 15, 7, 12, 12),
(34, 15, 8, 16, 16),
(35, 15, 9, 19, 19),
(36, 15, 13, 30, 30),
(37, 15, 1, 1, 1),
(38, 15, 6, 6, 6),
(39, 15, 7, 10, 10),
(40, 15, 8, 17, 17),
(41, 15, 9, 19, 19),
(42, 15, 13, 31, 31),
(43, 16, 1, 2, 2),
(44, 16, 6, 5, 5),
(45, 16, 7, 12, 12),
(46, 16, 8, 15, 15),
(47, 16, 9, 18, 18),
(48, 16, 13, 29, 29),
(49, 17, 1, 3, 3),
(50, 17, 6, 4, 4),
(51, 17, 7, 10, 10),
(52, 17, 8, 16, 16),
(53, 17, 9, 20, 20),
(54, 17, 13, 30, 30),
(55, 18, 1, 1, 1),
(56, 18, 6, 5, 5),
(57, 18, 7, 33, 33),
(58, 18, 8, 17, 17),
(59, 18, 9, 18, 18),
(60, 18, 13, 30, 30),
(61, 19, 1, 2, 2),
(62, 19, 6, 4, 4),
(63, 19, 7, 10, 10),
(64, 19, 8, 16, 16),
(65, 19, 9, 19, 19),
(66, 19, 13, 30, 30),
(67, 20, 1, 1, 1),
(68, 20, 6, 6, 6),
(69, 20, 7, 10, 10),
(70, 20, 8, 17, 17),
(71, 20, 9, 19, 19),
(72, 20, 13, 31, 31);

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `id_tujuan` int(11) NOT NULL,
  `judul` varchar(30) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(3, 'operator', 'Website Operator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria`
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
-- Struktur dari tabel `kriteria_hasil`
--

CREATE TABLE `kriteria_hasil` (
  `id_kriteria_hasil` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `prioritas` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria_hasil`
--

INSERT INTO `kriteria_hasil` (`id_kriteria_hasil`, `id_kriteria`, `prioritas`) VALUES
(1, 1, 0.4615431061754154),
(2, 6, 0.25418056782781356),
(3, 7, 0.13975407893800026),
(4, 8, 0.07329292628034877),
(5, 9, 0.04033506707040206),
(6, 13, 0.03089425370802007);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria_nilai`
--

CREATE TABLE `kriteria_nilai` (
  `id_kriteria_nilai` int(11) NOT NULL,
  `kriteria_id_dari` int(11) NOT NULL,
  `kriteria_id_tujuan` int(11) NOT NULL,
  `nilai` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria_nilai`
--

INSERT INTO `kriteria_nilai` (`id_kriteria_nilai`, `kriteria_id_dari`, `kriteria_id_tujuan`, `nilai`) VALUES
(376, 1, 6, 3),
(377, 1, 7, 5),
(378, 1, 8, 7),
(379, 1, 9, 9),
(380, 1, 13, 9),
(381, 6, 7, 3),
(382, 6, 8, 5),
(383, 6, 9, 7),
(384, 6, 13, 7),
(385, 7, 8, 3),
(386, 7, 9, 5),
(387, 7, 13, 5),
(388, 8, 9, 3),
(389, 8, 13, 3),
(390, 9, 13, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembeli`
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
-- Dumping data untuk tabel `pembeli`
--

INSERT INTO `pembeli` (`id_pembeli`, `nama_pembeli`, `usia`, `status`, `alamat`, `pekerjaan`, `penghasilan`, `riwayat_kredit`, `uang_muka`, `jangka_waktu`, `agama`, `no_telpon`, `pas_foto`, `ktp`, `kk`, `surat_nikah`, `slip_gaji`, `sk_terakhir`, `surat_ket_kerja`, `siup`, `daftar_perusahaan`, `surat_ket_dom`, `laporan_keuangan`, `npwp`, `buku_tabungan`, `rekening_koran`, `surat_pernyataan`) VALUES
(3, 'Calon Pembeli 5', 31, 'Menikah', 'Jl. Walet', 'Karyawan Swasta', 6800000, 'Kolektibilitas 1', 8500000, '15 Tahun', 'Islam', '12345', '609758fb75b4f-pas_foto3x4.pdf', '6097563bce570-2_ektp.pdf', '6097563bcfff8-3_kk.pdf', '6097563bd1f20-4_surat_nikah.pdf', '6097563bd3f98-5_slip_gaji.pdf', '6097563bd5b10-6_sk_terakhir.pdf', NULL, NULL, NULL, NULL, NULL, '6097563bde4bb-12_npwp.pdf', '6097563bdf6a5-13_buku_tabungan.pdf', '6097563be9f74-14_rekening_koran.pdf', '6097563bebe63-15_surat_pernyataan.pdf'),
(4, 'Calon Pembeli 4', 54, 'Cerai', 'Jl. Permata', 'Pegawai Negeri Sipil', 6000000, 'Kolektibilitas 4', 10000000, '15 Tahun', 'Kristen Protestan', '12345', '609756fa9c0e7-1_pas_foto.pdf', '609756fa9df7f-2_ektp.pdf', '609756faa861f-3_kk.pdf', '609756faa9e23-4_surat_cerai.pdf', '609756faab955-5_slip_gaji.pdf', NULL, '609756fab02ef-7_surat_keterangan_kerja.pdf', NULL, NULL, NULL, NULL, '609756fabb012-12_npwp.pdf', '609756fabc3d3-13_buku_tabungan.pdf', '609756fabda9a-14_rekening_koran.pdf', '609756fabf141-15_surat_pernyataan.pdf'),
(5, 'Calon Pembeli 3', 37, 'Lajang', 'Jl. in aja dulu', 'Wiraswasta', 7000000, 'Kolektibilitas 1', 7000000, '15 Tahun', 'Hindhu', '123', '6097576ab784f-1_pas_foto.pdf', '6097576ac1e83-2_ektp.pdf', '6097576ac2ade-3_kk.pdf', NULL, NULL, NULL, NULL, '6097576ac9bb6-8_siup.pdf', '6097576acb3e2-9_tanda_daftar_perusahaan.pdf', '6097576acd39f-10_surat_keterangan_domisili.pdf', '6097576acf348-11_laporan_keuangan.pdf', '6097576ad0ebe-12_npwp.pdf', '6097576ad2321-13_buku_tabungan.pdf', '6097576ad39f3-14_rekening_koran.pdf', '6097576ad4c9e-15_surat_pernyataan.pdf'),
(6, 'Calon Pembeli 2', 25, 'Menikah', 'Jl. Jalan aja', 'Karyawan Swasta', 5500000, 'Kolektibilitas 2', 10000000, '10 Tahun', 'Buddha', '1234', '60975807e428f-1_pas_foto.pdf', '60975807e5665-2_ektp.pdf', '60975807f064f-3_kk.pdf', '60975807f2692-4_surat_nikah.pdf', '60975897583bc-5_slip_gaji.pdf', '609758975bb07-6_sk_terakhir.pdf', NULL, NULL, NULL, NULL, NULL, '609758081183c-12_npwp.pdf', '60975808134f7-13_buku_tabungan.pdf', '6097580815531-14_rekening_koran.pdf', '60975808175a9-15_surat_pernyataan.pdf'),
(7, 'Calon Pembeli 1', 43, 'Menikah', 'Jl. Moh. Yamin', 'Pegawai Negeri Sipil', 4000000, 'Kolektibilitas 1', 8500000, '20 Tahun', 'Konghuchu', '123', '60975bfaae769-1_pas_foto.pdf', '60975bfaaf2bb-2_ektp.pdf', '60975bfab0104-3_kk.pdf', '60975c6033a4f-4_surat_nikah.pdf', '60975c6034fcc-5_slip_gaji.pdf', '60975c60362bb-6_sk_terakhir.pdf', '60975c60379ca-7_surat_keterangan_kerja.pdf', '60975c6039092-8_siup.pdf', '60975c603a5bf-9_tanda_daftar_perusahaan.pdf', '60975c603c043-10_surat_keterangan_domisili.pdf', '60975c603d4de-11_laporan_keuangan.pdf', '60975bfab8730-12_npwp.pdf', '60975bfab9169-13_buku_tabungan.pdf', '60975bfab9b26-14_rekening_koran.pdf', '60975bfaba684-15_surat_pernyataan.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
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
-- Struktur dari tabel `subkriteria`
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
-- Dumping data untuk tabel `subkriteria`
--

INSERT INTO `subkriteria` (`id_subkriteria`, `nama_subkriteria`, `id_kriteria`, `tipe`, `nilai_minimum`, `nilai_maksimum`, `op_min`, `op_max`) VALUES
(1, 'Pegawai Negeri Sipil', 1, 'teks', NULL, NULL, NULL, NULL),
(2, 'Karyawan Swasta', 1, 'teks', NULL, NULL, NULL, NULL),
(3, 'Wiraswasta', 1, 'teks', NULL, NULL, NULL, NULL),
(4, '6000000 - 8000000', 6, 'nilai', 6000000, 8000000, '>', '<='),
(5, '4500000 - 6000000', 6, 'nilai', 4500000, 6000000, '>', '<='),
(6, '2800000 - 4500000', 6, 'nilai', 2800000, 4500000, '=>', '<='),
(10, 'Kolektibilitas 1', 7, 'teks', NULL, NULL, NULL, NULL),
(12, 'Kolektibilitas 2', 7, 'teks', NULL, NULL, NULL, NULL),
(15, '21 - 30', 8, 'nilai', 21, 30, '=>', '<='),
(16, '31 - 40', 8, 'nilai', 31, 40, '=>', '<='),
(17, '41 - 55', 8, 'nilai', 41, 55, '=>', '<='),
(18, '10000000', 9, 'teks', NULL, NULL, NULL, NULL),
(19, '8500000', 9, 'teks', NULL, NULL, NULL, NULL),
(20, '7000000', 9, 'teks', NULL, NULL, NULL, NULL),
(29, '10', 13, 'teks', NULL, NULL, NULL, NULL),
(30, '15', 13, 'teks', NULL, NULL, NULL, NULL),
(31, '20', 13, 'teks', NULL, NULL, NULL, NULL),
(33, 'Kolektibilitas 3 / 4 / 5', 7, 'teks', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `subkriteria_hasil`
--

CREATE TABLE `subkriteria_hasil` (
  `id_subkriteria_hasil` int(11) NOT NULL,
  `id_subkriteria` int(11) NOT NULL,
  `prioritas` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `subkriteria_hasil`
--

INSERT INTO `subkriteria_hasil` (`id_subkriteria_hasil`, `id_subkriteria`, `prioritas`) VALUES
(1, 1, 0.633345720302242),
(2, 2, 0.2604979561501301),
(3, 3, 0.1061563235476279),
(4, 29, 0.633345720302242),
(5, 30, 0.2604979561501301),
(6, 31, 0.1061563235476279),
(7, 4, 0.633345720302242),
(8, 5, 0.2604979561501301),
(9, 6, 0.1061563235476279),
(10, 10, 0.7481644136416662),
(11, 12, 0.180402113497564),
(12, 33, 0.07143347286076991),
(13, 15, 0.6686968945033461),
(14, 16, 0.24310098503646893),
(15, 17, 0.08820212046018498),
(16, 18, 0.633345720302242),
(17, 19, 0.2604979561501301),
(18, 20, 0.1061563235476279);

-- --------------------------------------------------------

--
-- Struktur dari tabel `subkriteria_nilai`
--

CREATE TABLE `subkriteria_nilai` (
  `id_subkriteria_nilai` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `subkriteria_id_dari` int(11) NOT NULL,
  `subkriteria_id_tujuan` int(11) NOT NULL,
  `nilai` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `subkriteria_nilai`
--

INSERT INTO `subkriteria_nilai` (`id_subkriteria_nilai`, `id_kriteria`, `subkriteria_id_dari`, `subkriteria_id_tujuan`, `nilai`) VALUES
(13, 13, 29, 30, 3),
(14, 13, 29, 31, 5),
(15, 13, 30, 31, 3),
(16, 6, 4, 5, 3),
(17, 6, 4, 6, 5),
(18, 6, 5, 6, 3),
(22, 8, 15, 16, 3),
(23, 8, 15, 17, 7),
(24, 8, 16, 17, 3),
(28, 9, 18, 19, 3),
(29, 9, 18, 20, 5),
(30, 9, 19, 20, 3),
(46, 1, 1, 2, 3),
(47, 1, 1, 3, 5),
(48, 1, 2, 3, 3),
(49, 7, 10, 12, 5),
(50, 7, 10, 33, 9),
(51, 7, 12, 33, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(2, '::1', 'adeharioyudanto@gmail.com', '$2y$08$lql0hvJRq4GxXKCbmJYYkuaENe7ueD19b5redhklCccv3oISDZ8Pq', NULL, 'adeharioyudanto@gmail.com', NULL, NULL, NULL, 'Qp9Dutj9KDMDNMBFtblKue', 1619100985, 1624188053, 1, 'Ade Ariyo', 'Yudanto', 'PT. Serasi Anugrah Pratama', '081370231033'),
(3, '::1', 'gunanta.s@gmail.com', '$2y$08$IjJPCdE8gle4hYHoSa/kG.hoipD7PRXThSm/e.vLjLBUZGjGpjUaq', NULL, 'gunanta.s@gmail.com', NULL, NULL, NULL, NULL, 1619101074, 1623582251, 1, 'Gunanta', 'Sembiring', 'PT. Serasi Anugrah Pratama', '081375388797'),
(4, '::1', 'ridhorinaldy@gmail.com', '$2y$08$tJhD3PuodvVTCGfjAejoK.ufBFSNr2QN19mbMVdho/fzonnQbz6sq', NULL, 'ridhorinaldy@gmail.com', NULL, NULL, NULL, NULL, 1619101760, 1619246712, 1, 'Ridho', 'Rinaldy', 'PT. Berkah Rizki Putra', '081345678899'),
(5, '::1', 'jimmypelawi@gmail.com', '$2y$08$VemYZpi3IZBguTisFmVqFOTqLv5uDwxX6Dvz32LaL1iu.sXZXlvMK', NULL, 'jimmypelawi@gmail.com', NULL, NULL, NULL, NULL, 1619101861, 1619844720, 1, 'Jimmy', 'Pelawi', 'CV. Pelawinta Durian', '081323456789');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users_groups`
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
-- Indexes for table `kriteria_hasil`
--
ALTER TABLE `kriteria_hasil`
  ADD PRIMARY KEY (`id_kriteria_hasil`);

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
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `alternatif_nilai`
--
ALTER TABLE `alternatif_nilai`
  MODIFY `id_alternatif_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
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
-- AUTO_INCREMENT for table `kriteria_hasil`
--
ALTER TABLE `kriteria_hasil`
  MODIFY `id_kriteria_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `kriteria_nilai`
--
ALTER TABLE `kriteria_nilai`
  MODIFY `id_kriteria_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=391;
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
  MODIFY `id_subkriteria_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `subkriteria_nilai`
--
ALTER TABLE `subkriteria_nilai`
  MODIFY `id_subkriteria_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
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
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
