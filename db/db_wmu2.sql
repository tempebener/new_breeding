-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30 Sep 2019 pada 05.29
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_wmu2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `level_users`
--

CREATE TABLE `level_users` (
  `id_level` int(10) NOT NULL,
  `nama_level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `level_users`
--

INSERT INTO `level_users` (`id_level`, `nama_level`) VALUES
(2, 'warehouse'),
(4, 'Manager'),
(5, 'admin'),
(6, 'sales');

-- --------------------------------------------------------

--
-- Struktur dari tabel `modul`
--

CREATE TABLE `modul` (
  `id_modul` int(5) NOT NULL,
  `nama_modul` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `link` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `static_content` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `publish` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `status` enum('user','admin') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `urutan` int(5) NOT NULL,
  `link_seo` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `modul`
--

INSERT INTO `modul` (`id_modul`, `nama_modul`, `username`, `link`, `static_content`, `gambar`, `publish`, `status`, `aktif`, `urutan`, `link_seo`) VALUES
(2, 'Manajemen User', 'admin', 'manajemenuser', '', '', 'Y', 'user', 'Y', 0, ''),
(82, 'barang', 'admin', 'listbarang', '', '', 'Y', 'user', 'Y', 0, ''),
(81, 'gudang', 'admin', 'listgudang', '', '', 'Y', 'user', 'Y', 0, ''),
(77, 'action edit', 'admin', 'action_edit', '', '', 'Y', 'user', 'Y', 0, ''),
(78, 'kategori', 'admin', 'kategoribrg', '', '', 'Y', 'user', 'Y', 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bw_detail`
--

CREATE TABLE `tb_bw_detail` (
  `id_bw_detail` int(10) NOT NULL,
  `id_stock` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `id_chickin` int(11) NOT NULL,
  `id_kandang` int(11) NOT NULL,
  `id_plant` int(11) NOT NULL,
  `jml_jantan` float NOT NULL,
  `jml_betina` float NOT NULL,
  `uniform_jantan` float NOT NULL,
  `uniform_betina` float NOT NULL,
  `rata2_bw` float NOT NULL,
  `satuan_bw` varchar(11) NOT NULL DEFAULT 'Gram',
  `create_date` datetime NOT NULL,
  `create_user` varchar(22) NOT NULL,
  `update_date` datetime NOT NULL,
  `update_user` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_bw_detail`
--

INSERT INTO `tb_bw_detail` (`id_bw_detail`, `id_stock`, `id_jadwal`, `id_chickin`, `id_kandang`, `id_plant`, `jml_jantan`, `jml_betina`, `uniform_jantan`, `uniform_betina`, `rata2_bw`, `satuan_bw`, `create_date`, `create_user`, `update_date`, `update_user`) VALUES
(1, 2, 104, 2, 2, 1, 12, 11, 0, 0, 0, 'Gram', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 1, 4, 1, 1, 1, 5, 5, 0, 0, 0, 'Gram', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(3, 3, 204, 3, 3, 1, 5, 5, 0, 0, 0, 'Gram', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(4, 1, 1, 1, 1, 1, 3, 3, 50, 50, 3, 'Gram', '0000-00-00 00:00:00', '', '2019-09-12 10:44:12', ''),
(5, 1, 2, 1, 1, 1, 3, 3, 0, 0, 0, 'Gram', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(6, 1, 3, 1, 1, 1, 4, 4, 0, 0, 0, 'Gram', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(7, 1, 17, 1, 1, 1, 2.5, 5, 25, 50, 3.5, 'Gram', '2019-09-12 02:34:31', '', '2019-09-12 02:38:58', ''),
(8, 2, 117, 2, 2, 1, 20, 80, 20, 80, 100, 'Gram', '2019-09-12 02:42:41', '', '0000-00-00 00:00:00', ''),
(9, 3, 217, 3, 3, 1, 40.5, 50.5, 40.5, 50.5, 100, 'Gram', '2019-09-12 02:44:33', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_chickin`
--

CREATE TABLE `tb_chickin` (
  `id_chickin` int(10) NOT NULL,
  `no_chickin` varchar(200) NOT NULL,
  `id_perusahaan` int(10) NOT NULL,
  `id_unit_bisnis` int(10) NOT NULL,
  `id_plant` int(10) NOT NULL,
  `id_kandang` int(10) NOT NULL,
  `id_supplier` int(10) NOT NULL,
  `id_flock` int(10) NOT NULL,
  `tgl_chickin` datetime NOT NULL,
  `jml_betina` int(100) NOT NULL,
  `jml_jantan` int(100) NOT NULL,
  `harga_unit` int(50) NOT NULL,
  `total_harga` int(50) NOT NULL,
  `id_strain` int(10) NOT NULL,
  `umur_chickin` int(11) NOT NULL,
  `status_chickin` varchar(22) NOT NULL,
  `periode` int(10) NOT NULL,
  `create_date` datetime NOT NULL,
  `create_user` varchar(200) NOT NULL,
  `update_date` datetime NOT NULL,
  `update_user` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_chickin`
--

INSERT INTO `tb_chickin` (`id_chickin`, `no_chickin`, `id_perusahaan`, `id_unit_bisnis`, `id_plant`, `id_kandang`, `id_supplier`, `id_flock`, `tgl_chickin`, `jml_betina`, `jml_jantan`, `harga_unit`, `total_harga`, `id_strain`, `umur_chickin`, `status_chickin`, `periode`, `create_date`, `create_user`, `update_date`, `update_user`) VALUES
(1, 'PS01/K01/LH/19090001', 1, 2, 1, 1, 1, 1, '2018-12-30 00:00:00', 9448, 1360, 0, 0, 1, 5, '1', 2, '2019-09-18 17:49:04', '', '0000-00-00 00:00:00', ''),
(7, 'GPS01/K08/LH/19090001', 1, 1, 1, 8, 1, 0, '2019-09-29 00:00:00', 44, 33, 0, 0, 1, 6, '1', 1, '2019-09-29 03:35:03', '', '2019-09-30 00:27:53', ''),
(8, 'GPS01/K07/CB/19090001', 1, 1, 1, 7, 1, 0, '2019-09-29 00:00:00', 123, 123, 0, 0, 2, 3, '1', 1, '2019-09-29 13:15:17', '', '0000-00-00 00:00:00', ''),
(9, 'GPS01/K08/LH/19090002', 1, 1, 1, 8, 1, 0, '2019-09-30 00:00:00', 2, 3, 0, 0, 1, 3, '1', 2, '2019-09-29 13:41:40', '', '0000-00-00 00:00:00', ''),
(10, 'PS01/K01/LH/19090003', 1, 2, 1, 1, 2, 0, '2019-09-29 00:00:00', 123, 122, 0, 0, 1, 3, '1', 3, '2019-09-29 15:03:16', '', '0000-00-00 00:00:00', ''),
(11, 'PS01/K03/CB/19090001', 1, 2, 1, 3, 1, 0, '2019-09-30 00:00:00', 123, 133, 0, 0, 2, 10, '1', 1, '2019-09-30 10:09:49', '', '0000-00-00 00:00:00', ''),
(12, 'PS01/K04/LH/19090001', 1, 2, 1, 4, 2, 0, '2019-09-30 00:00:00', 111, 121, 0, 0, 1, 10, '1', 1, '2019-09-30 10:10:24', '', '0000-00-00 00:00:00', ''),
(13, 'PS01/K05/HB/19090001', 1, 2, 1, 5, 1, 0, '2019-09-30 00:00:00', 143, 155, 0, 0, 3, 10, '1', 1, '2019-09-30 10:11:05', '', '0000-00-00 00:00:00', ''),
(14, 'PS01/K06/CB/19090001', 1, 2, 1, 6, 1, 0, '2019-09-30 00:00:00', 77, 88, 0, 0, 2, 10, '1', 1, '2019-09-30 10:11:41', '', '0000-00-00 00:00:00', ''),
(15, 'PS01/K02/LH/19090001', 1, 2, 1, 2, 1, 0, '2019-09-30 00:00:00', 122, 211, 0, 0, 1, 10, '1', 1, '2019-09-30 10:15:28', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_egg_stock`
--

CREATE TABLE `tb_egg_stock` (
  `id_egg_stock` int(10) NOT NULL,
  `id_chickin` int(10) NOT NULL,
  `pt_jam` time NOT NULL,
  `pt_tray` varchar(22) NOT NULL,
  `pt_butir` int(20) NOT NULL,
  `total_pt` int(20) NOT NULL,
  `he_a` int(20) NOT NULL,
  `he_b` int(20) NOT NULL,
  `he_c` int(20) NOT NULL,
  `he_d` int(20) NOT NULL,
  `total_he` int(20) NOT NULL,
  `kecil` int(20) NOT NULL,
  `jumbo` int(20) NOT NULL,
  `abnormal` int(20) NOT NULL,
  `retak` int(20) NOT NULL,
  `total_telur_komersial` int(20) NOT NULL,
  `total_produksi_telur` int(20) NOT NULL,
  `create_date` datetime NOT NULL,
  `create_user` int(22) NOT NULL,
  `update_date` datetime NOT NULL,
  `update_user` int(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_flock`
--

CREATE TABLE `tb_flock` (
  `id_flock` int(10) NOT NULL,
  `nama_flock` varchar(200) NOT NULL,
  `create_date` datetime NOT NULL,
  `create_user` varchar(200) NOT NULL,
  `update_date` datetime NOT NULL,
  `update_user` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_flock`
--

INSERT INTO `tb_flock` (`id_flock`, `nama_flock`, `create_date`, `create_user`, `update_date`, `update_user`) VALUES
(1, '01', '2019-08-14 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, '02', '2019-08-14 00:00:00', '', '0000-00-00 00:00:00', ''),
(3, '03', '2019-08-14 00:00:00', '', '0000-00-00 00:00:00', ''),
(4, '04', '2019-09-01 00:00:00', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_grading_telur_detail`
--

CREATE TABLE `tb_grading_telur_detail` (
  `id_grading_telur_detail` int(10) NOT NULL,
  `id_stock` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `id_chickin` int(11) NOT NULL,
  `id_kandang` int(11) NOT NULL,
  `id_plant` int(11) NOT NULL,
  `pt_jam` datetime NOT NULL,
  `pt_tray` varchar(50) NOT NULL,
  `pt_butir` int(50) NOT NULL,
  `pt_total` int(50) NOT NULL,
  `he_a` int(50) NOT NULL,
  `he_b` int(50) NOT NULL,
  `he_c` int(50) NOT NULL,
  `he_d` int(50) NOT NULL,
  `total_he` int(50) NOT NULL,
  `komersial_kecil` int(20) NOT NULL,
  `komersial_jumbo` int(20) NOT NULL,
  `komersial_abnormal` int(20) NOT NULL,
  `komersial_retak` int(20) NOT NULL,
  `total_komersial` int(20) NOT NULL,
  `total_produksi` int(20) NOT NULL,
  `harga_beli` int(50) NOT NULL,
  `create_date` datetime NOT NULL,
  `create_user` varchar(50) NOT NULL,
  `update_date` datetime NOT NULL,
  `update_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_grading_telur_detail`
--

INSERT INTO `tb_grading_telur_detail` (`id_grading_telur_detail`, `id_stock`, `id_jadwal`, `id_chickin`, `id_kandang`, `id_plant`, `pt_jam`, `pt_tray`, `pt_butir`, `pt_total`, `he_a`, `he_b`, `he_c`, `he_d`, `total_he`, `komersial_kecil`, `komersial_jumbo`, `komersial_abnormal`, `komersial_retak`, `total_komersial`, `total_produksi`, `harga_beli`, `create_date`, `create_user`, `update_date`, `update_user`) VALUES
(1, 3, 1, 1, 1, 1, '0000-00-00 00:00:00', '', 0, 0, 5, 5, 5, 5, 20, 2, 2, 2, 2, 8, 28, 0, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 1, 2, 1, 1, 1, '0000-00-00 00:00:00', '', 0, 0, 5, 6, 7, 8, 26, 8, 7, 6, 5, 26, 52, 0, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(3, 1, 3, 1, 1, 1, '0000-00-00 00:00:00', '', 0, 0, 20, 0, 0, 0, 20, 1, 15, 1, 3, 20, 40, 0, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(4, 1, 28, 1, 1, 1, '0000-00-00 00:00:00', '', 0, 0, 1, 1, 1, 1, 4, 2, 2, 2, 2, 8, 12, 0, '2019-09-23 16:45:50', '', '0000-00-00 00:00:00', ''),
(5, 1, 29, 1, 1, 1, '0000-00-00 00:00:00', '', 0, 0, 1, 0, 2, 0, 3, 1, 1, 1, 1, 4, 7, 0, '2019-09-24 10:51:48', '', '0000-00-00 00:00:00', ''),
(6, 2, 129, 2, 2, 1, '0000-00-00 00:00:00', '', 0, 0, 1, 1, 2, 3, 7, 0, 1, 0, 0, 1, 8, 0, '2019-09-24 10:56:45', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `id_jadwal` int(10) NOT NULL,
  `kode_jadwal` varchar(200) NOT NULL,
  `id_chickin` int(10) NOT NULL,
  `no_chickin` varchar(50) NOT NULL,
  `hari_ke` int(11) NOT NULL,
  `tgl_pembuatan` datetime NOT NULL,
  `status_jadwal` int(10) NOT NULL,
  `create_date` datetime NOT NULL,
  `create_user` varchar(200) NOT NULL,
  `update_date` datetime NOT NULL,
  `update_user` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`id_jadwal`, `kode_jadwal`, `id_chickin`, `no_chickin`, `hari_ke`, `tgl_pembuatan`, `status_jadwal`, `create_date`, `create_user`, `update_date`, `update_user`) VALUES
(1, '', 1, 'PS01/K01/LH/19090001', 1, '2018-12-30 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, '', 1, 'PS01/K01/LH/19090001', 2, '2018-12-31 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(3, '', 1, 'PS01/K01/LH/19090001', 3, '2019-01-01 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(4, '', 1, 'PS01/K01/LH/19090001', 4, '2019-01-02 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(5, '', 1, 'PS01/K01/LH/19090001', 5, '2019-01-03 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(21, '', 7, 'GPS01/K08/LH/19090001', 1, '2019-09-29 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(22, '', 7, 'GPS01/K08/LH/19090001', 2, '2019-09-30 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(23, '', 7, 'GPS01/K08/LH/19090001', 3, '2019-10-01 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(24, '', 8, 'GPS01/K07/CB/19090001', 1, '2019-09-29 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(25, '', 8, 'GPS01/K07/CB/19090001', 2, '2019-09-30 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(26, '', 8, 'GPS01/K07/CB/19090001', 3, '2019-10-01 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(27, '', 9, 'GPS01/K08/LH/19090002', 1, '2019-10-03 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(28, '', 9, 'GPS01/K08/LH/19090002', 2, '2019-10-04 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(29, '', 9, 'GPS01/K08/LH/19090002', 3, '2019-10-05 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(30, '', 10, 'PS01/K01/LH/19090003', 1, '2019-09-29 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(31, '', 10, 'PS01/K01/LH/19090003', 2, '2019-09-30 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(32, '', 10, 'PS01/K01/LH/19090003', 3, '2019-10-01 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(33, '', 11, 'PS01/K03/CB/19090001', 1, '2019-09-30 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(34, '', 11, 'PS01/K03/CB/19090001', 2, '2019-10-01 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(35, '', 11, 'PS01/K03/CB/19090001', 3, '2019-10-02 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(36, '', 11, 'PS01/K03/CB/19090001', 4, '2019-10-03 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(37, '', 11, 'PS01/K03/CB/19090001', 5, '2019-10-04 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(38, '', 11, 'PS01/K03/CB/19090001', 6, '2019-10-05 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(39, '', 11, 'PS01/K03/CB/19090001', 7, '2019-10-06 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(40, '', 11, 'PS01/K03/CB/19090001', 8, '2019-10-07 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(41, '', 11, 'PS01/K03/CB/19090001', 9, '2019-10-08 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(42, '', 11, 'PS01/K03/CB/19090001', 10, '2019-10-09 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(43, '', 12, 'PS01/K04/LH/19090001', 1, '2019-09-30 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(44, '', 12, 'PS01/K04/LH/19090001', 2, '2019-10-01 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(45, '', 12, 'PS01/K04/LH/19090001', 3, '2019-10-02 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(46, '', 12, 'PS01/K04/LH/19090001', 4, '2019-10-03 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(47, '', 12, 'PS01/K04/LH/19090001', 5, '2019-10-04 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(48, '', 12, 'PS01/K04/LH/19090001', 6, '2019-10-05 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(49, '', 12, 'PS01/K04/LH/19090001', 7, '2019-10-06 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(50, '', 12, 'PS01/K04/LH/19090001', 8, '2019-10-07 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(51, '', 12, 'PS01/K04/LH/19090001', 9, '2019-10-08 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(52, '', 12, 'PS01/K04/LH/19090001', 10, '2019-10-09 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(53, '', 13, 'PS01/K05/HB/19090001', 1, '2019-09-30 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(54, '', 13, 'PS01/K05/HB/19090001', 2, '2019-10-01 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(55, '', 13, 'PS01/K05/HB/19090001', 3, '2019-10-02 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(56, '', 13, 'PS01/K05/HB/19090001', 4, '2019-10-03 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(57, '', 13, 'PS01/K05/HB/19090001', 5, '2019-10-04 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(58, '', 13, 'PS01/K05/HB/19090001', 6, '2019-10-05 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(59, '', 13, 'PS01/K05/HB/19090001', 7, '2019-10-06 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(60, '', 13, 'PS01/K05/HB/19090001', 8, '2019-10-07 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(61, '', 13, 'PS01/K05/HB/19090001', 9, '2019-10-08 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(62, '', 13, 'PS01/K05/HB/19090001', 10, '2019-10-09 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(63, '', 14, 'PS01/K06/CB/19090001', 1, '2019-09-30 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(64, '', 14, 'PS01/K06/CB/19090001', 2, '2019-10-01 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(65, '', 14, 'PS01/K06/CB/19090001', 3, '2019-10-02 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(66, '', 14, 'PS01/K06/CB/19090001', 4, '2019-10-03 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(67, '', 14, 'PS01/K06/CB/19090001', 5, '2019-10-04 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(68, '', 14, 'PS01/K06/CB/19090001', 6, '2019-10-05 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(69, '', 14, 'PS01/K06/CB/19090001', 7, '2019-10-06 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(70, '', 14, 'PS01/K06/CB/19090001', 8, '2019-10-07 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(71, '', 14, 'PS01/K06/CB/19090001', 9, '2019-10-08 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(72, '', 14, 'PS01/K06/CB/19090001', 10, '2019-10-09 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(73, '', 15, 'PS01/K02/LH/19090001', 1, '2019-09-30 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(74, '', 15, 'PS01/K02/LH/19090001', 2, '2019-10-01 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(75, '', 15, 'PS01/K02/LH/19090001', 3, '2019-10-02 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(76, '', 15, 'PS01/K02/LH/19090001', 4, '2019-10-03 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(77, '', 15, 'PS01/K02/LH/19090001', 5, '2019-10-04 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(78, '', 15, 'PS01/K02/LH/19090001', 6, '2019-10-05 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(79, '', 15, 'PS01/K02/LH/19090001', 7, '2019-10-06 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(80, '', 15, 'PS01/K02/LH/19090001', 8, '2019-10-07 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(81, '', 15, 'PS01/K02/LH/19090001', 9, '2019-10-08 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(82, '', 15, 'PS01/K02/LH/19090001', 10, '2019-10-09 00:00:00', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kandang`
--

CREATE TABLE `tb_kandang` (
  `id_kandang` int(12) NOT NULL,
  `nama_kandang` varchar(200) NOT NULL,
  `kode_kandang` varchar(10) NOT NULL,
  `id_perusahaan` int(10) NOT NULL,
  `id_plant` int(10) NOT NULL,
  `id_flock` int(10) NOT NULL,
  `id_kat_kandang` int(10) NOT NULL,
  `tgl_pembuatan_kandang` date NOT NULL,
  `status_kandang` int(10) NOT NULL DEFAULT '1',
  `create_date` datetime NOT NULL,
  `create_user` varchar(22) NOT NULL,
  `update_date` datetime NOT NULL,
  `update_user` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kandang`
--

INSERT INTO `tb_kandang` (`id_kandang`, `nama_kandang`, `kode_kandang`, `id_perusahaan`, `id_plant`, `id_flock`, `id_kat_kandang`, `tgl_pembuatan_kandang`, `status_kandang`, `create_date`, `create_user`, `update_date`, `update_user`) VALUES
(1, 'KANDANG 01', 'K01', 1, 1, 1, 1, '2019-09-11', 1, '0000-00-00 00:00:00', '', '2019-09-24 00:16:44', ''),
(2, 'KANDANG 02', 'K02', 1, 1, 1, 1, '2019-09-06', 1, '0000-00-00 00:00:00', '', '2019-09-24 00:46:29', ''),
(3, 'KANDANG 03', 'K03', 1, 1, 1, 1, '2019-09-01', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(4, 'KANDANG 04', 'K04', 1, 1, 2, 1, '2019-09-01', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(5, 'KANDANG 05', 'K05', 1, 1, 2, 1, '2019-09-01', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(6, 'KANDANG 06', 'K06', 1, 1, 2, 1, '2019-09-01', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(7, 'KANDANG 07', 'K07', 1, 1, 3, 1, '2019-09-01', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(8, 'KANDANG 08', 'K08', 1, 1, 3, 1, '2019-09-02', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(9, 'KANDANG 01', 'K01', 1, 2, 1, 1, '2019-09-17', 1, '2019-09-17 11:13:22', '', '0000-00-00 00:00:00', ''),
(10, 'AAA', 'KAAA', 1, 1, 4, 1, '0000-00-00', 1, '2019-09-25 03:28:14', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kat_kandang`
--

CREATE TABLE `tb_kat_kandang` (
  `id_kat_kandang` int(10) NOT NULL,
  `nama_kat_kandang` varchar(200) NOT NULL,
  `kode_kandang` varchar(22) NOT NULL,
  `create_date` datetime NOT NULL,
  `create_user` varchar(200) NOT NULL,
  `update_date` datetime NOT NULL,
  `update_user` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kat_kandang`
--

INSERT INTO `tb_kat_kandang` (`id_kat_kandang`, `nama_kat_kandang`, `kode_kandang`, `create_date`, `create_user`, `update_date`, `update_user`) VALUES
(1, 'Basic Open House', '', '2019-09-01 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 'Closed House with', '', '2019-09-01 00:00:00', '', '0000-00-00 00:00:00', ''),
(3, 'Closed House', '', '2019-09-01 00:00:00', '', '0000-00-00 00:00:00', ''),
(4, 'Double Deck', '', '2019-09-01 00:00:00', '', '0000-00-00 00:00:00', ''),
(5, 'Open House', '', '2019-09-01 00:00:00', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kat_stock`
--

CREATE TABLE `tb_kat_stock` (
  `id_kat_stock` int(5) NOT NULL,
  `nama_kat_stock` varchar(200) NOT NULL,
  `satuan_stock` varchar(5) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `id_material_stock` int(11) NOT NULL,
  `id_supplier` int(10) NOT NULL,
  `publish` varchar(2) NOT NULL,
  `create_date` datetime NOT NULL,
  `create_user` varchar(200) NOT NULL,
  `update_date` datetime NOT NULL,
  `update_user` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tb_kat_stock`
--

INSERT INTO `tb_kat_stock` (`id_kat_stock`, `nama_kat_stock`, `satuan_stock`, `harga_beli`, `id_material_stock`, `id_supplier`, `publish`, `create_date`, `create_user`, `update_date`, `update_user`) VALUES
(1, 'pakan 608', 'Kg', 10000, 1, 1, 'Y', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 'MF 606', 'Kg', 15000, 1, 1, 'Y', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(3, 'Formalin', 'Gr', 8000, 2, 1, 'Y', '0000-00-00 00:00:00', '', '2019-09-01 16:50:44', ''),
(4, 'Piretamas', 'Gr', 5000, 2, 2, 'Y', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(5, 'BLB', 'Gram', 15000, 1, 2, 'Y', '2019-09-23 10:16:50', '', '2019-09-24 00:57:20', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_material_stock`
--

CREATE TABLE `tb_material_stock` (
  `id_material_stock` int(11) NOT NULL,
  `nama_material_stock` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_material_stock`
--

INSERT INTO `tb_material_stock` (`id_material_stock`, `nama_material_stock`) VALUES
(1, 'feed'),
(2, 'ovk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ovk_detail`
--

CREATE TABLE `tb_ovk_detail` (
  `id_ovk_detail` int(10) NOT NULL,
  `id_stock` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `id_chickin` int(11) NOT NULL,
  `id_kandang` int(11) NOT NULL,
  `id_plant` int(11) NOT NULL,
  `jml_ovk` float NOT NULL,
  `satuan_unit` varchar(50) NOT NULL,
  `create_date` datetime NOT NULL,
  `create_user` varchar(22) NOT NULL,
  `update_date` datetime NOT NULL,
  `update_user` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_ovk_detail`
--

INSERT INTO `tb_ovk_detail` (`id_ovk_detail`, `id_stock`, `id_jadwal`, `id_chickin`, `id_kandang`, `id_plant`, `jml_ovk`, `satuan_unit`, `create_date`, `create_user`, `update_date`, `update_user`) VALUES
(1, 2, 1, 1, 0, 0, 100, 'Gr', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', '0'),
(2, 1, 1, 1, 0, 0, 100, 'Gr', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', '0'),
(3, 2, 2, 1, 0, 0, 50, 'Gr', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', '0'),
(4, 1, 2, 1, 0, 0, 100, 'Gr', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', '0'),
(5, 1, 3, 1, 0, 0, 100, 'Gr', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pakan_detail`
--

CREATE TABLE `tb_pakan_detail` (
  `id_pakan_detail` int(10) NOT NULL,
  `id_stock` int(10) NOT NULL,
  `jml_betina` float NOT NULL,
  `jml_jantan` float NOT NULL,
  `jml_pakan` float NOT NULL,
  `harga_beli` int(20) NOT NULL,
  `id_jadwal` int(10) NOT NULL,
  `id_chickin` int(10) NOT NULL,
  `id_kandang` int(10) NOT NULL,
  `id_plant` int(10) NOT NULL,
  `id_flock` int(10) NOT NULL,
  `create_user` varchar(200) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_user` varchar(200) NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tb_pakan_detail`
--

INSERT INTO `tb_pakan_detail` (`id_pakan_detail`, `id_stock`, `jml_betina`, `jml_jantan`, `jml_pakan`, `harga_beli`, `id_jadwal`, `id_chickin`, `id_kandang`, `id_plant`, `id_flock`, `create_user`, `create_date`, `update_user`, `update_date`) VALUES
(2, 7, 100, 100, 200, 15000, 101, 2, 0, 0, 0, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(3, 4, 50, 50, 100, 10000, 2, 1, 0, 0, 0, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(4, 3, 100, 100, 200, 15000, 2, 1, 0, 0, 0, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(5, 4, 100, 100, 200, 10000, 3, 1, 0, 0, 0, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(6, 3, 200, 200, 400, 15000, 3, 1, 0, 0, 0, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(7, 7, 100, 100, 200, 15000, 103, 2, 0, 0, 0, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(8, 7, 50, 50, 100, 0, 102, 2, 0, 0, 0, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(9, 4, 100, 100, 200, 0, 1, 1, 0, 1, 0, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(10, 3, 50, 50, 100, 0, 1, 1, 0, 1, 0, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(11, 0, 0, 0, 0, 0, 28, 1, 0, 0, 0, '', '2019-09-23 10:33:01', '', '0000-00-00 00:00:00'),
(12, 5, 0, 0, 0, 0, 28, 1, 0, 0, 0, '', '2019-09-23 10:33:01', '', '0000-00-00 00:00:00'),
(13, 7, 90, 10, 100, 0, 6, 2, 0, 0, 0, '', '2019-09-28 13:42:06', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_permintaan`
--

CREATE TABLE `tb_permintaan` (
  `id_permintaan` int(10) NOT NULL,
  `no_permintaan` varchar(15) NOT NULL,
  `tgl_permintaan` datetime NOT NULL,
  `id_chickin` int(11) NOT NULL,
  `id_plant` int(11) NOT NULL,
  `status_pesan` varchar(15) NOT NULL,
  `create_user` varchar(50) NOT NULL,
  `create_date` datetime NOT NULL,
  `approve_user` varchar(15) NOT NULL,
  `approve_date` datetime NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_permintaan_detail`
--

CREATE TABLE `tb_permintaan_detail` (
  `id_permintaan_detail` int(12) NOT NULL,
  `id_permintaan` int(12) NOT NULL,
  `id_stok` int(12) NOT NULL,
  `jml_pesan` int(100) NOT NULL,
  `harga_beli` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_perusahaan`
--

CREATE TABLE `tb_perusahaan` (
  `id_perusahaan` int(11) NOT NULL,
  `nama_perusahaan` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(15) NOT NULL,
  `fax` varchar(15) NOT NULL,
  `email` varchar(15) NOT NULL,
  `website` varchar(50) NOT NULL,
  `tgl_pembuatan` datetime NOT NULL,
  `create_date` datetime NOT NULL,
  `create_user` varchar(22) NOT NULL,
  `update_date` datetime NOT NULL,
  `update_user` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_perusahaan`
--

INSERT INTO `tb_perusahaan` (`id_perusahaan`, `nama_perusahaan`, `alamat`, `telp`, `fax`, `email`, `website`, `tgl_pembuatan`, `create_date`, `create_user`, `update_date`, `update_user`) VALUES
(1, 'PT WIDODO MAKMUR UNGGAS', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_plant`
--

CREATE TABLE `tb_plant` (
  `id_plant` int(11) NOT NULL,
  `nama_plant` text NOT NULL,
  `kode_plant` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(15) NOT NULL,
  `fax` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `website` varchar(50) NOT NULL,
  `id_perusahaan` int(10) NOT NULL,
  `create_date` datetime NOT NULL,
  `create_user` varchar(200) NOT NULL,
  `update_date` datetime NOT NULL,
  `update_user` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_plant`
--

INSERT INTO `tb_plant` (`id_plant`, `nama_plant`, `kode_plant`, `alamat`, `telp`, `fax`, `email`, `website`, `id_perusahaan`, `create_date`, `create_user`, `update_date`, `update_user`) VALUES
(1, 'FARM TONGGOR', '01', '', '', '', '', '', 1, '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 'HATCHERY KWANGEN', '02', '', '', '', '', '', 1, '0000-00-00 00:00:00', '', '2019-09-12 13:05:51', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_populasi_detail`
--

CREATE TABLE `tb_populasi_detail` (
  `id_populasi_detail` int(10) NOT NULL,
  `id_stock` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `id_chickin` int(11) NOT NULL,
  `id_kandang` int(11) NOT NULL,
  `id_plant` int(11) NOT NULL,
  `male_mati` int(11) NOT NULL,
  `male_cull` int(11) NOT NULL,
  `male_seleksi` int(11) NOT NULL,
  `male_afkir` int(11) NOT NULL,
  `total_male` int(50) NOT NULL,
  `female_mati` int(11) NOT NULL,
  `female_cull` int(11) NOT NULL,
  `female_seleksi` int(11) NOT NULL,
  `female_afkir` int(11) NOT NULL,
  `total_female` int(50) NOT NULL,
  `total_akhir` int(50) NOT NULL,
  `create_user` varchar(200) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_user` varchar(200) NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_populasi_detail`
--

INSERT INTO `tb_populasi_detail` (`id_populasi_detail`, `id_stock`, `id_jadwal`, `id_chickin`, `id_kandang`, `id_plant`, `male_mati`, `male_cull`, `male_seleksi`, `male_afkir`, `total_male`, `female_mati`, `female_cull`, `female_seleksi`, `female_afkir`, `total_female`, `total_akhir`, `create_user`, `create_date`, `update_user`, `update_date`) VALUES
(5, 3, 1, 1, 1, 1, 9, 3, 3, 7, 22, 1, 2, 3, 4, 10, 32, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(6, 4, 2, 1, 1, 1, 1, 2, 3, 4, 10, 4, 3, 2, 1, 10, 20, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(7, 1, 3, 1, 1, 1, 0, 2, 0, 3, 5, 4, 3, 2, 1, 10, 15, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(8, 2, 6, 2, 2, 1, 8, 2, 1, 4, 15, 2, 2, 2, 2, 8, 23, '', '2019-09-28 13:42:40', '', '0000-00-00 00:00:00'),
(9, 10, 31, 10, 1, 1, 1, 2, 2, 3, 8, 2, 5, 4, 1, 12, 20, '', '2019-09-30 10:17:51', '', '0000-00-00 00:00:00'),
(10, 15, 73, 15, 2, 1, 2, 3, 4, 3, 12, 2, 3, 1, 3, 9, 21, '', '2019-09-30 10:19:42', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_status`
--

CREATE TABLE `tb_status` (
  `id_status` int(11) NOT NULL,
  `nama_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_status`
--

INSERT INTO `tb_status` (`id_status`, `nama_status`) VALUES
(1, 'Aktif'),
(2, 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_stock`
--

CREATE TABLE `tb_stock` (
  `id_stock` int(10) NOT NULL,
  `nama_stock` varchar(200) NOT NULL,
  `kode_stock` varchar(200) NOT NULL,
  `id_kat_stock` int(10) NOT NULL,
  `id_material_stock` int(11) NOT NULL,
  `id_chickin` int(10) NOT NULL,
  `jml_stock` int(200) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `harga_beli` varchar(200) NOT NULL,
  `status_stock` int(1) NOT NULL,
  `tgl_pembuatan` datetime NOT NULL,
  `tgl_update` datetime NOT NULL,
  `username` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tb_stock`
--

INSERT INTO `tb_stock` (`id_stock`, `nama_stock`, `kode_stock`, `id_kat_stock`, `id_material_stock`, `id_chickin`, `jml_stock`, `satuan`, `harga_beli`, `status_stock`, `tgl_pembuatan`, `tgl_update`, `username`) VALUES
(1, 'Piretamas', '', 4, 2, 1, 110, 'Gr', '5000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(2, 'Formalin', '', 3, 2, 1, 0, 'Gr', '8000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(3, 'MF 606', '', 2, 1, 1, 0, 'Kg', '15000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(4, 'pakan 608', '', 1, 1, 1, 50, 'Kg', '10000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(5, 'Piretamas', '', 4, 2, 2, 0, 'Gr', '5000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(6, 'Formalin', '', 3, 2, 2, 0, 'Gr', '8000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(7, 'MF 606', '', 2, 1, 2, 0, 'Kg', '15000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(8, 'pakan 608', '', 1, 1, 2, 50, 'Kg', '15000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(9, 'Piretamas', '', 4, 2, 3, 111, 'Gr', '5000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(10, 'Formalin', '', 3, 2, 3, 0, 'Gr', '8000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(11, 'MF 606', '', 2, 1, 3, 0, 'Kg', '15000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(12, 'pakan 608', '', 1, 1, 3, 0, 'Kg', '10000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(13, 'Piretamas', '', 4, 2, 4, 0, 'Gr', '5000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(14, 'Formalin', '', 3, 2, 4, 0, 'Gr', '8000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(15, 'MF 606', '', 2, 1, 4, 0, 'Kg', '15000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(16, 'pakan 608', '', 1, 1, 4, 0, 'Kg', '10000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(17, 'Piretamas', '', 4, 2, 5, 0, 'Gr', '5000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(18, 'Formalin', '', 3, 2, 5, 0, 'Gr', '8000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(19, 'MF 606', '', 2, 1, 5, 0, 'Kg', '15000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(20, 'pakan 608', '', 1, 1, 5, 0, 'Kg', '10000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(21, 'Piretamas', '', 4, 2, 6, 0, 'Gr', '5000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(22, 'Formalin', '', 3, 2, 6, 0, 'Gr', '8000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(23, 'MF 606', '', 2, 1, 6, 0, 'Kg', '15000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(24, 'pakan 608', '', 1, 1, 6, 0, 'Kg', '10000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(25, 'Piretamas', '', 4, 2, 7, 0, 'Gr', '5000', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(26, 'Formalin', '', 3, 2, 7, 0, 'Gr', '8000', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(27, 'MF 606', '', 2, 1, 7, 0, 'Kg', '15000', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(28, 'pakan 608', '', 1, 1, 7, 0, 'Kg', '10000', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(29, 'Piretamas', '', 4, 2, 8, 0, 'Gr', '5000', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(30, 'Formalin', '', 3, 2, 8, 0, 'Gr', '8000', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(31, 'MF 606', '', 2, 1, 8, 0, 'Kg', '15000', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(32, 'pakan 608', '', 1, 1, 8, 0, 'Kg', '10000', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(33, 'Piretamas', '', 4, 2, 9, 0, 'Gr', '5000', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(34, 'Formalin', '', 3, 2, 9, 0, 'Gr', '8000', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(35, 'MF 606', '', 2, 1, 9, 0, 'Kg', '15000', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(36, 'pakan 608', '', 1, 1, 9, 0, 'Kg', '10000', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(37, 'Piretamas', '', 4, 2, 10, 0, 'Gr', '5000', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(38, 'Formalin', '', 3, 2, 10, 0, 'Gr', '8000', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(39, 'MF 606', '', 2, 1, 10, 0, 'Kg', '15000', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(40, 'pakan 608', '', 1, 1, 10, 0, 'Kg', '10000', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(41, 'Piretamas', '', 4, 2, 11, 0, 'Gr', '5000', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(42, 'Formalin', '', 3, 2, 11, 0, 'Gr', '8000', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(43, 'MF 606', '', 2, 1, 11, 0, 'Kg', '15000', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(44, 'pakan 608', '', 1, 1, 11, 0, 'Kg', '10000', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(45, 'Piretamas', '', 4, 2, 12, 0, 'Gr', '5000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(46, 'Formalin', '', 3, 2, 12, 0, 'Gr', '8000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(47, 'MF 606', '', 2, 1, 12, 0, 'Kg', '15000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(48, 'pakan 608', '', 1, 1, 12, 0, 'Kg', '10000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(49, 'Piretamas', '', 4, 2, 13, 0, 'Gr', '5000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(50, 'Formalin', '', 3, 2, 13, 0, 'Gr', '8000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(51, 'MF 606', '', 2, 1, 13, 0, 'Kg', '15000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(52, 'pakan 608', '', 1, 1, 13, 0, 'Kg', '10000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(53, 'Piretamas', '', 4, 2, 14, 0, 'Gr', '5000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(54, 'Formalin', '', 3, 2, 14, 0, 'Gr', '8000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(55, 'MF 606', '', 2, 1, 14, 0, 'Kg', '15000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(56, 'pakan 608', '', 1, 1, 14, 0, 'Kg', '10000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(57, 'Piretamas', '', 4, 2, 15, 0, 'Gr', '5000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(58, 'Formalin', '', 3, 2, 15, 0, 'Gr', '8000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(59, 'MF 606', '', 2, 1, 15, 0, 'Kg', '15000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(60, 'pakan 608', '', 1, 1, 15, 0, 'Kg', '10000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(61, 'BLB', '', 5, 1, 1, 0, 'Gram', '15000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(62, 'Piretamas', '', 4, 2, 1, 0, 'Gr', '5000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(63, 'Formalin', '', 3, 2, 1, 0, 'Gr', '8000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(64, 'MF 606', '', 2, 1, 1, 0, 'Kg', '15000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(65, 'pakan 608', '', 1, 1, 1, 0, 'Kg', '10000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(66, 'BLB', '', 5, 1, 1, 0, 'Gram', '15000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(67, 'Piretamas', '', 4, 2, 1, 0, 'Gr', '5000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(68, 'Formalin', '', 3, 2, 1, 0, 'Gr', '8000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(69, 'MF 606', '', 2, 1, 1, 0, 'Kg', '15000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(70, 'pakan 608', '', 1, 1, 1, 0, 'Kg', '10000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(71, 'BLB', '', 5, 1, 3, 0, 'Gram', '15000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(72, 'Piretamas', '', 4, 2, 3, 0, 'Gr', '5000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(73, 'Formalin', '', 3, 2, 3, 0, 'Gr', '8000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(74, 'MF 606', '', 2, 1, 3, 0, 'Kg', '15000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(75, 'pakan 608', '', 1, 1, 3, 0, 'Kg', '10000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(76, 'BLB', '', 5, 1, 4, 0, 'Gram', '15000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(77, 'Piretamas', '', 4, 2, 4, 0, 'Gr', '5000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(78, 'Formalin', '', 3, 2, 4, 0, 'Gr', '8000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(79, 'MF 606', '', 2, 1, 4, 0, 'Kg', '15000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(80, 'pakan 608', '', 1, 1, 4, 0, 'Kg', '10000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(81, 'BLB', '', 5, 1, 5, 0, 'Gram', '15000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(82, 'Piretamas', '', 4, 2, 5, 0, 'Gr', '5000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(83, 'Formalin', '', 3, 2, 5, 0, 'Gr', '8000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(84, 'MF 606', '', 2, 1, 5, 0, 'Kg', '15000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(85, 'pakan 608', '', 1, 1, 5, 0, 'Kg', '10000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(86, 'BLB', '', 5, 1, 6, 0, 'Gram', '15000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(87, 'Piretamas', '', 4, 2, 6, 0, 'Gr', '5000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(88, 'Formalin', '', 3, 2, 6, 0, 'Gr', '8000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(89, 'MF 606', '', 2, 1, 6, 0, 'Kg', '15000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(90, 'pakan 608', '', 1, 1, 6, 0, 'Kg', '10000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(91, 'BLB', '', 5, 1, 7, 0, 'Gram', '15000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(92, 'Piretamas', '', 4, 2, 7, 0, 'Gr', '5000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(93, 'Formalin', '', 3, 2, 7, 0, 'Gr', '8000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(94, 'MF 606', '', 2, 1, 7, 0, 'Kg', '15000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(95, 'pakan 608', '', 1, 1, 7, 0, 'Kg', '10000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(96, 'BLB', '', 5, 1, 8, 0, 'Gram', '15000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(97, 'Piretamas', '', 4, 2, 8, 0, 'Gr', '5000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(98, 'Formalin', '', 3, 2, 8, 0, 'Gr', '8000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(99, 'MF 606', '', 2, 1, 8, 0, 'Kg', '15000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(100, 'pakan 608', '', 1, 1, 8, 0, 'Kg', '10000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(101, 'BLB', '', 5, 1, 9, 0, 'Gram', '15000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(102, 'Piretamas', '', 4, 2, 9, 0, 'Gr', '5000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(103, 'Formalin', '', 3, 2, 9, 0, 'Gr', '8000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(104, 'MF 606', '', 2, 1, 9, 0, 'Kg', '15000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(105, 'pakan 608', '', 1, 1, 9, 0, 'Kg', '10000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(106, 'BLB', '', 5, 1, 10, 0, 'Gram', '15000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(107, 'Piretamas', '', 4, 2, 10, 0, 'Gr', '5000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(108, 'Formalin', '', 3, 2, 10, 0, 'Gr', '8000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(109, 'MF 606', '', 2, 1, 10, 0, 'Kg', '15000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(110, 'pakan 608', '', 1, 1, 10, 0, 'Kg', '10000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(111, 'BLB', '', 5, 1, 11, 0, 'Gram', '15000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(112, 'Piretamas', '', 4, 2, 11, 0, 'Gr', '5000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(113, 'Formalin', '', 3, 2, 11, 0, 'Gr', '8000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(114, 'MF 606', '', 2, 1, 11, 0, 'Kg', '15000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(115, 'pakan 608', '', 1, 1, 11, 0, 'Kg', '10000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(116, 'BLB', '', 5, 1, 12, 0, 'Gram', '15000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(117, 'Piretamas', '', 4, 2, 12, 0, 'Gr', '5000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(118, 'Formalin', '', 3, 2, 12, 0, 'Gr', '8000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(119, 'MF 606', '', 2, 1, 12, 0, 'Kg', '15000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(120, 'pakan 608', '', 1, 1, 12, 0, 'Kg', '10000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(121, 'BLB', '', 5, 1, 13, 0, 'Gram', '15000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(122, 'Piretamas', '', 4, 2, 13, 0, 'Gr', '5000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(123, 'Formalin', '', 3, 2, 13, 0, 'Gr', '8000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(124, 'MF 606', '', 2, 1, 13, 0, 'Kg', '15000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(125, 'pakan 608', '', 1, 1, 13, 0, 'Kg', '10000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(126, 'BLB', '', 5, 1, 14, 0, 'Gram', '15000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(127, 'Piretamas', '', 4, 2, 14, 0, 'Gr', '5000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(128, 'Formalin', '', 3, 2, 14, 0, 'Gr', '8000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(129, 'MF 606', '', 2, 1, 14, 0, 'Kg', '15000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(130, 'pakan 608', '', 1, 1, 14, 0, 'Kg', '10000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(131, 'BLB', '', 5, 1, 15, 0, 'Gram', '15000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(132, 'Piretamas', '', 4, 2, 15, 0, 'Gr', '5000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(133, 'Formalin', '', 3, 2, 15, 0, 'Gr', '8000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(134, 'MF 606', '', 2, 1, 15, 0, 'Kg', '15000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(135, 'pakan 608', '', 1, 1, 15, 0, 'Kg', '10000', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_strain`
--

CREATE TABLE `tb_strain` (
  `id_strain` int(10) NOT NULL,
  `nama_strain` varchar(255) NOT NULL,
  `kode_strain` varchar(20) NOT NULL,
  `create_date` datetime NOT NULL,
  `create_user` varchar(20) NOT NULL,
  `update_date` datetime NOT NULL,
  `update_user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_strain`
--

INSERT INTO `tb_strain` (`id_strain`, `nama_strain`, `kode_strain`, `create_date`, `create_user`, `update_date`, `update_user`) VALUES
(1, 'Lohman', 'LH', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 'Cobb', 'CB', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(3, 'Hubbard', 'HB', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `id_supplier` int(10) NOT NULL,
  `nama_supplier` varchar(200) NOT NULL,
  `kode_unit_bisnis` varchar(200) NOT NULL,
  `create_date` datetime NOT NULL,
  `create_user` varchar(20) NOT NULL,
  `update_date` datetime NOT NULL,
  `update_user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_supplier`
--

INSERT INTO `tb_supplier` (`id_supplier`, `nama_supplier`, `kode_unit_bisnis`, `create_date`, `create_user`, `update_date`, `update_user`) VALUES
(1, 'WMU', 'GPS', '2019-09-18 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 'JAPFA', 'GPS', '2019-09-18 00:00:00', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_unit_bisnis`
--

CREATE TABLE `tb_unit_bisnis` (
  `id_unit_bisnis` int(10) NOT NULL,
  `nama_unit_bisnis` varchar(200) NOT NULL,
  `kode_unit_bisnis` varchar(10) NOT NULL,
  `id_perusahaan` int(10) NOT NULL,
  `create_date` datetime NOT NULL,
  `create_user` varchar(50) NOT NULL,
  `update_date` datetime NOT NULL,
  `update_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_unit_bisnis`
--

INSERT INTO `tb_unit_bisnis` (`id_unit_bisnis`, `nama_unit_bisnis`, `kode_unit_bisnis`, `id_perusahaan`, `create_date`, `create_user`, `update_date`, `update_user`) VALUES
(1, 'Grand Parent Stock Farm', 'GPS', 1, '2019-09-17 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 'Parent Stock Farm', 'PS', 1, '2019-09-17 00:00:00', '', '0000-00-00 00:00:00', ''),
(3, 'Final Stock/Broiler Farm', 'FS', 1, '2019-09-17 00:00:00', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `nik_employee` varchar(22) NOT NULL,
  `nama_lengkap` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `foto` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'user',
  `blokir` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `id_session` varchar(255) NOT NULL,
  `tgl_gabung` date NOT NULL,
  `tgl_keluar` date NOT NULL,
  `alamat` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`username`, `password`, `nik_employee`, `nama_lengkap`, `email`, `no_telp`, `foto`, `level`, `blokir`, `id_session`, `tgl_gabung`, `tgl_keluar`, `alamat`) VALUES
('admin', 'bff0cc42103de1b4721370e84dc24f635a7afeca41198c9b3e03946a1b6b7191d14356408a5e57ce6daf77e6e800c66fac7ab0482d57d48d23e6808e4b562daa', '123456', 'Ajie', 'adjiedwisandy@gmail.com', '081284857609', '14553255_1764512750456659_109914453692121088_n1.jpg', 'admin', 'N', 'q173s8hs1jl04st35169ccl8o7', '0000-00-00', '0000-00-00', 'jln bogem'),
('james', 'edbd881f1ee2f76ba0bd70fd184f87711be991a0401fd07ccd4b199665f00761afc91731d8d8ba6cbb188b2ed5bfb465b9f3d30231eb0430b9f90fe91d136648', '', 'james', 'james@hjyt.com', '123445678', '', 'admin', 'N', 'b4cc344d25a2efe540adbf2678e2304c-20190221092604', '0000-00-00', '0000-00-00', 'ciracas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_modul`
--

CREATE TABLE `users_modul` (
  `id_umod` int(11) NOT NULL,
  `id_session` varchar(255) NOT NULL,
  `id_modul` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users_modul`
--

INSERT INTO `users_modul` (`id_umod`, `id_session`, `id_modul`) VALUES
(1, 'ed1d859c50262701d92e5cbf39652792-20170120090507', 70),
(2, 'ed1d859c50262701d92e5cbf39652792-20170120090507', 65),
(3, 'ed1d859c50262701d92e5cbf39652792-20170120090507', 63),
(4, 'f76ad5ee772ac196cbc09824e24859ee', 70),
(5, 'f76ad5ee772ac196cbc09824e24859ee', 65),
(6, 'f76ad5ee772ac196cbc09824e24859ee', 63),
(7, 'ed1d859c50262701d92e5cbf39652792-20170120090507', 18),
(8, 'ed1d859c50262701d92e5cbf39652792-20170120090507', 66),
(9, 'ed1d859c50262701d92e5cbf39652792-20170120090507', 33),
(10, '3460d81e02faa3559f9e02c9a766fcbd-20170124215625', 18),
(11, 'ed1d859c50262701d92e5cbf39652792-20170120090507', 41),
(12, '6bec9c852847242e384a4d5ac0962ba0-20170406140423', 18),
(13, 'fa7688658d8b38aae731826ea1daebb5-20170521103501', 18),
(14, '4750bf69e103ade024ac0d8c9d49ba30-20171010120424', 18),
(15, '4750bf69e103ade024ac0d8c9d49ba30-20171010120424', 46),
(17, '1febb523d4e1b96472fea9495d2eb987-20171206120525', 64),
(26, '1febb523d4e1b96472fea9495d2eb987-20171206120525', 62),
(19, '1febb523d4e1b96472fea9495d2eb987-20171206120525', 34),
(20, '1febb523d4e1b96472fea9495d2eb987-20171206120525', 18),
(21, '99922f48ac546217be824666b09797dc-20171206190033', 64),
(22, '99922f48ac546217be824666b09797dc-20171206190033', 62),
(23, '99922f48ac546217be824666b09797dc-20171206190033', 34),
(24, '99922f48ac546217be824666b09797dc-20171206190033', 18),
(25, '1febb523d4e1b96472fea9495d2eb987-20171206120525', 63),
(29, 'b69c93ee70ba1ad7836c5fa2ecbafc93-20180808172554', 34),
(30, 'b69c93ee70ba1ad7836c5fa2ecbafc93-20180808172554', 31),
(31, '0ca97907b8c6c5c8732d4223ed04b9b9-20181203004605', 2),
(33, '0ca97907b8c6c5c8732d4223ed04b9b9-20181203005956', 18),
(35, 'bb0ed6ad56f41c6de469776171261226-20181203011902', 76),
(37, 'bb0ed6ad56f41c6de469776171261226-20181203011902', 77),
(38, 'bb0ed6ad56f41c6de469776171261226-20181203011902', 78),
(39, 'bb0ed6ad56f41c6de469776171261226-20181203011902', 79),
(40, '63eefbd45d89e8c91f24b609f7539942-20190207174807', 82),
(41, '63eefbd45d89e8c91f24b609f7539942-20190207174807', 0),
(42, '63eefbd45d89e8c91f24b609f7539942-20190207174807', 0),
(43, 'b4cc344d25a2efe540adbf2678e2304c-20190221092200', 2),
(44, '4750bf69e103ade024ac0d8c9d49ba30-20190309182458', 82),
(45, 'd686a53fb86a6c31fa6faa1d9333267e-20190309182818', 82);

-- --------------------------------------------------------

--
-- Struktur dari tabel `wmu_conf_perusahaan`
--

CREATE TABLE `wmu_conf_perusahaan` (
  `id_perusahaan` int(11) NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `npwp_perusahaan` varchar(100) NOT NULL,
  `alamat_perusahaan` text NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `email` varchar(150) NOT NULL,
  `fax` varchar(150) NOT NULL,
  `website` varchar(255) NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `wmu_conf_perusahaan`
--

INSERT INTO `wmu_conf_perusahaan` (`id_perusahaan`, `nama_perusahaan`, `npwp_perusahaan`, `alamat_perusahaan`, `telepon`, `email`, `fax`, `website`, `kode_pos`, `logo`) VALUES
(1, 'PT WIDODO MAKMUR UNGGAS', '', 'Jalan Cilangkap, Jakarta Timur', '021-xxxxxxxx', '', '0751461691', '', 13740, 'widodo_makmur_perkasa_pt.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `level_users`
--
ALTER TABLE `level_users`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `modul`
--
ALTER TABLE `modul`
  ADD PRIMARY KEY (`id_modul`);

--
-- Indexes for table `tb_bw_detail`
--
ALTER TABLE `tb_bw_detail`
  ADD PRIMARY KEY (`id_bw_detail`);

--
-- Indexes for table `tb_chickin`
--
ALTER TABLE `tb_chickin`
  ADD PRIMARY KEY (`id_chickin`);

--
-- Indexes for table `tb_egg_stock`
--
ALTER TABLE `tb_egg_stock`
  ADD PRIMARY KEY (`id_egg_stock`);

--
-- Indexes for table `tb_flock`
--
ALTER TABLE `tb_flock`
  ADD PRIMARY KEY (`id_flock`);

--
-- Indexes for table `tb_grading_telur_detail`
--
ALTER TABLE `tb_grading_telur_detail`
  ADD PRIMARY KEY (`id_grading_telur_detail`);

--
-- Indexes for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `tb_kandang`
--
ALTER TABLE `tb_kandang`
  ADD PRIMARY KEY (`id_kandang`);

--
-- Indexes for table `tb_kat_kandang`
--
ALTER TABLE `tb_kat_kandang`
  ADD PRIMARY KEY (`id_kat_kandang`);

--
-- Indexes for table `tb_kat_stock`
--
ALTER TABLE `tb_kat_stock`
  ADD PRIMARY KEY (`id_kat_stock`);

--
-- Indexes for table `tb_material_stock`
--
ALTER TABLE `tb_material_stock`
  ADD PRIMARY KEY (`id_material_stock`);

--
-- Indexes for table `tb_ovk_detail`
--
ALTER TABLE `tb_ovk_detail`
  ADD PRIMARY KEY (`id_ovk_detail`);

--
-- Indexes for table `tb_pakan_detail`
--
ALTER TABLE `tb_pakan_detail`
  ADD PRIMARY KEY (`id_pakan_detail`);

--
-- Indexes for table `tb_permintaan`
--
ALTER TABLE `tb_permintaan`
  ADD PRIMARY KEY (`id_permintaan`);

--
-- Indexes for table `tb_permintaan_detail`
--
ALTER TABLE `tb_permintaan_detail`
  ADD PRIMARY KEY (`id_permintaan_detail`);

--
-- Indexes for table `tb_perusahaan`
--
ALTER TABLE `tb_perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indexes for table `tb_plant`
--
ALTER TABLE `tb_plant`
  ADD PRIMARY KEY (`id_plant`);

--
-- Indexes for table `tb_populasi_detail`
--
ALTER TABLE `tb_populasi_detail`
  ADD PRIMARY KEY (`id_populasi_detail`);

--
-- Indexes for table `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `tb_stock`
--
ALTER TABLE `tb_stock`
  ADD PRIMARY KEY (`id_stock`);

--
-- Indexes for table `tb_strain`
--
ALTER TABLE `tb_strain`
  ADD PRIMARY KEY (`id_strain`);

--
-- Indexes for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `tb_unit_bisnis`
--
ALTER TABLE `tb_unit_bisnis`
  ADD PRIMARY KEY (`id_unit_bisnis`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `users_modul`
--
ALTER TABLE `users_modul`
  ADD PRIMARY KEY (`id_umod`);

--
-- Indexes for table `wmu_conf_perusahaan`
--
ALTER TABLE `wmu_conf_perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `level_users`
--
ALTER TABLE `level_users`
  MODIFY `id_level` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `modul`
--
ALTER TABLE `modul`
  MODIFY `id_modul` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT for table `tb_bw_detail`
--
ALTER TABLE `tb_bw_detail`
  MODIFY `id_bw_detail` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tb_chickin`
--
ALTER TABLE `tb_chickin`
  MODIFY `id_chickin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tb_egg_stock`
--
ALTER TABLE `tb_egg_stock`
  MODIFY `id_egg_stock` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_flock`
--
ALTER TABLE `tb_flock`
  MODIFY `id_flock` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_grading_telur_detail`
--
ALTER TABLE `tb_grading_telur_detail`
  MODIFY `id_grading_telur_detail` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `id_jadwal` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT for table `tb_kandang`
--
ALTER TABLE `tb_kandang`
  MODIFY `id_kandang` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tb_kat_kandang`
--
ALTER TABLE `tb_kat_kandang`
  MODIFY `id_kat_kandang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_kat_stock`
--
ALTER TABLE `tb_kat_stock`
  MODIFY `id_kat_stock` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_material_stock`
--
ALTER TABLE `tb_material_stock`
  MODIFY `id_material_stock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_ovk_detail`
--
ALTER TABLE `tb_ovk_detail`
  MODIFY `id_ovk_detail` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_pakan_detail`
--
ALTER TABLE `tb_pakan_detail`
  MODIFY `id_pakan_detail` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tb_permintaan`
--
ALTER TABLE `tb_permintaan`
  MODIFY `id_permintaan` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_permintaan_detail`
--
ALTER TABLE `tb_permintaan_detail`
  MODIFY `id_permintaan_detail` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_perusahaan`
--
ALTER TABLE `tb_perusahaan`
  MODIFY `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_plant`
--
ALTER TABLE `tb_plant`
  MODIFY `id_plant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_populasi_detail`
--
ALTER TABLE `tb_populasi_detail`
  MODIFY `id_populasi_detail` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tb_status`
--
ALTER TABLE `tb_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_stock`
--
ALTER TABLE `tb_stock`
  MODIFY `id_stock` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;
--
-- AUTO_INCREMENT for table `tb_strain`
--
ALTER TABLE `tb_strain`
  MODIFY `id_strain` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  MODIFY `id_supplier` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_unit_bisnis`
--
ALTER TABLE `tb_unit_bisnis`
  MODIFY `id_unit_bisnis` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users_modul`
--
ALTER TABLE `users_modul`
  MODIFY `id_umod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `wmu_conf_perusahaan`
--
ALTER TABLE `wmu_conf_perusahaan`
  MODIFY `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
