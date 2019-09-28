-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2019 at 01:37 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wmu-rpa_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cam_company_plant`
--

CREATE TABLE `cam_company_plant` (
  `account_cp` varchar(2) NOT NULL,
  `name_cp` varchar(50) DEFAULT NULL,
  `address_1` text,
  `address_2` text,
  `city_cp` varchar(50) DEFAULT NULL,
  `no_telpon` varchar(35) DEFAULT NULL,
  `no_fax` varchar(35) DEFAULT NULL,
  `blocked` varchar(3) DEFAULT NULL,
  `create_user` varchar(35) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `modified_user` varchar(35) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cam_company_plant`
--

INSERT INTO `cam_company_plant` (`account_cp`, `name_cp`, `address_1`, `address_2`, `city_cp`, `no_telpon`, `no_fax`, `blocked`, `create_user`, `create_date`, `modified_user`, `modified_date`) VALUES
('01', 'Plant-1 Cileungsi	', 'Gandoang\r\n', 'Kec. Cileungsi', 'Kab. Bogor', NULL, NULL, 'N', 'admin', '2019-04-01 00:00:00', NULL, NULL),
('02', 'Plant-1 Jonggol', 'Jonggol', 'Jonggol', 'Kab. Bogor', NULL, NULL, 'N', 'admin', '2019-04-01 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cam_department`
--

CREATE TABLE `cam_department` (
  `account_department` varchar(4) NOT NULL,
  `name_department` varchar(35) DEFAULT NULL,
  `blocked` varchar(3) DEFAULT NULL,
  `create_user` varchar(35) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `modified_user` varchar(35) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cam_employee`
--

CREATE TABLE `cam_employee` (
  `account_employee` varchar(10) NOT NULL,
  `first_name` varchar(35) DEFAULT NULL,
  `last_name` varchar(35) DEFAULT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `birth_city` varchar(35) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `hire_date` date DEFAULT NULL,
  `account_level` varchar(2) DEFAULT NULL,
  `account_job` varchar(4) DEFAULT NULL,
  `account_department` varchar(4) DEFAULT NULL,
  `account_company` varchar(6) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `create_user` varchar(35) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `modified_user` varchar(35) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cam_material_category`
--

CREATE TABLE `cam_material_category` (
  `account_mc` varchar(2) NOT NULL,
  `name_mp` varchar(50) DEFAULT NULL,
  `advance` varchar(3) DEFAULT NULL,
  `blocked` varchar(3) DEFAULT NULL,
  `create_user` varchar(35) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `modified_user` varchar(35) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cam_material_category`
--

INSERT INTO `cam_material_category` (`account_mc`, `name_mp`, `advance`, `blocked`, `create_user`, `create_date`, `modified_user`, `modified_date`) VALUES
('P1', 'Pembelian daging sapi import', 'Yes', 'N', 'admin', '2019-04-01 00:00:00', NULL, NULL),
('P2', 'Pembelian daging sapi lokal', 'Yes', 'N', 'admin', '2019-04-01 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cam_material_product`
--

CREATE TABLE `cam_material_product` (
  `account_mp` varchar(11) NOT NULL,
  `account_mc` varchar(15) DEFAULT NULL,
  `description` varchar(25) DEFAULT NULL,
  `description_sales` varchar(25) DEFAULT NULL,
  `description_purchase` varchar(25) DEFAULT NULL,
  `spesification_1` varchar(25) DEFAULT NULL,
  `spesification_2` varchar(25) DEFAULT NULL,
  `spesification_3` varchar(25) DEFAULT NULL,
  `spesification_4` varchar(25) DEFAULT NULL,
  `stock` int(5) DEFAULT NULL,
  `unit_code` varchar(10) DEFAULT NULL,
  `price_sales` int(10) DEFAULT NULL,
  `blocked_mp` varchar(2) DEFAULT NULL,
  `create_user` varchar(50) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `modified_user` varchar(50) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cam_material_product`
--

INSERT INTO `cam_material_product` (`account_mp`, `account_mc`, `description`, `description_sales`, `description_purchase`, `spesification_1`, `spesification_2`, `spesification_3`, `spesification_4`, `stock`, `unit_code`, `price_sales`, `blocked_mp`, `create_user`, `create_date`, `modified_user`, `modified_date`) VALUES
('MP0000001', 'P1', 'Blade', 'Blade', 'Blade', 'sapi', 'import', 'Frozen', 'Choice', 10, 'kg', NULL, NULL, 'admin', '2019-04-01 00:00:00', NULL, NULL),
('MP0000002', 'P1', 'Silverside', 'Silverside', 'Silverside', 'sapi', 'import', 'Frozen', 'Choice', 11, 'kg', NULL, NULL, 'admin', '2019-04-01 00:00:00', NULL, NULL),
('MP0000003', 'P2', 'Blade lokal', 'Blade lokal', 'Blade lokal', 'sapi', 'lokal', 'Frozen', 'Choice', 11, 'kg', NULL, NULL, 'admin', '2019-04-01 00:00:00', NULL, NULL),
('MP0000004', 'P2', 'Silverside lokal', 'Silverside lokal', 'Silverside lokal', 'sapi', 'lokal', 'Frozen', 'Choice', 12, NULL, NULL, NULL, 'admin', '2019-04-01 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cam_purchase_order`
--

CREATE TABLE `cam_purchase_order` (
  `account_po` int(4) NOT NULL,
  `no_po` varchar(15) DEFAULT NULL,
  `no_pr` varchar(15) DEFAULT NULL,
  `date_po` date DEFAULT NULL,
  `expeted_date` date DEFAULT NULL,
  `account_vendor` varchar(15) DEFAULT NULL,
  `account_cp` int(5) DEFAULT NULL,
  `account_freight` int(5) DEFAULT NULL,
  `account_payment` int(5) DEFAULT NULL,
  `currency` varchar(5) DEFAULT NULL,
  `account_mc` varchar(5) DEFAULT NULL,
  `account_status` int(5) DEFAULT NULL,
  `summary_purchase` text,
  `create_user` varchar(50) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `modified_user` varchar(50) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `approve_user` varchar(50) DEFAULT NULL,
  `approve_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cam_purchase_order`
--

INSERT INTO `cam_purchase_order` (`account_po`, `no_po`, `no_pr`, `date_po`, `expeted_date`, `account_vendor`, `account_cp`, `account_freight`, `account_payment`, `currency`, `account_mc`, `account_status`, `summary_purchase`, `create_user`, `create_date`, `modified_user`, `modified_date`, `approve_user`, `approve_date`) VALUES
(1, 'PO-000001', 'PR-000001', '2019-04-04', '2019-04-04', '1', 1, 1, NULL, 'IDR', 'P1', 3, NULL, 'admin', '2019-04-04 00:00:00', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cam_purchase_order_down_payment`
--

CREATE TABLE `cam_purchase_order_down_payment` (
  `account_payment` varchar(8) NOT NULL,
  `name_payment` varchar(50) DEFAULT NULL,
  `deposite` int(15) DEFAULT NULL,
  `blocked` varchar(3) DEFAULT NULL,
  `create_user` varchar(35) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `modified_user` varchar(35) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cam_purchase_order_freight`
--

CREATE TABLE `cam_purchase_order_freight` (
  `account_freight` varchar(8) NOT NULL,
  `name_freight` varchar(50) DEFAULT NULL,
  `price` int(15) DEFAULT NULL,
  `blocked` varchar(3) DEFAULT NULL,
  `create_user` varchar(35) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `modified_user` varchar(35) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cam_purchase_order_freight`
--

INSERT INTO `cam_purchase_order_freight` (`account_freight`, `name_freight`, `price`, `blocked`, `create_user`, `create_date`, `modified_user`, `modified_date`) VALUES
('1', 'Biaya angkut pembelian', 150000, 'N', 'admin', '2019-04-01 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cam_purchase_order_items`
--

CREATE TABLE `cam_purchase_order_items` (
  `account_po_items` int(4) NOT NULL,
  `no_po` varchar(15) DEFAULT NULL,
  `account_mp` varchar(15) DEFAULT NULL,
  `qty` int(10) DEFAULT NULL,
  `account_unit` varchar(5) DEFAULT NULL,
  `price_unit` int(10) DEFAULT NULL,
  `discount` int(3) DEFAULT NULL,
  `amount` int(10) DEFAULT NULL,
  `account_tax` int(5) DEFAULT NULL,
  `create_user` varchar(50) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cam_purchase_order_items`
--

INSERT INTO `cam_purchase_order_items` (`account_po_items`, `no_po`, `account_mp`, `qty`, `account_unit`, `price_unit`, `discount`, `amount`, `account_tax`, `create_user`, `create_date`) VALUES
(1, 'PO-000001', 'MP0000001', 11, 'kg', 12000, NULL, 120000, NULL, 'admin', '2019-04-04 00:00:00'),
(2, 'PO-000001', 'MP0000002', 5, 'kg', 11000, 0, 55000, NULL, 'admin', '2019-04-04 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cam_purchase_order_vendor`
--

CREATE TABLE `cam_purchase_order_vendor` (
  `account_vendor` int(8) NOT NULL,
  `no_vendor` varchar(15) DEFAULT NULL,
  `name_vendor` varchar(50) DEFAULT NULL,
  `address_1` text,
  `address_2` text,
  `city_vendor` varchar(50) DEFAULT NULL,
  `account_mp` varchar(2) DEFAULT NULL,
  `blocked` varchar(3) DEFAULT NULL,
  `create_user` varchar(35) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cam_purchase_order_vendor`
--

INSERT INTO `cam_purchase_order_vendor` (`account_vendor`, `no_vendor`, `name_vendor`, `address_1`, `address_2`, `city_vendor`, `account_mp`, `blocked`, `create_user`, `create_date`) VALUES
(1, 'V-0001', 'PT. Beef Food Indonesia', 'Gandoang', 'Cileungsi', 'Kab. Bogor', 'P1', 'N', 'admin', '2019-04-04 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cam_purchase_requisition`
--

CREATE TABLE `cam_purchase_requisition` (
  `account_pr` int(10) NOT NULL,
  `no_pr` varchar(15) NOT NULL,
  `date_request` date NOT NULL,
  `account_mc` varchar(3) NOT NULL,
  `account_department` varchar(5) DEFAULT NULL,
  `account_employee` varchar(10) DEFAULT NULL,
  `account_cp` varchar(3) DEFAULT NULL,
  `account_status` int(2) DEFAULT NULL,
  `create_user` varchar(30) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `modified_user` varchar(30) DEFAULT NULL,
  `modified_date` date DEFAULT NULL,
  `approve_user` varchar(30) DEFAULT NULL,
  `approve_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cam_purchase_requisition`
--

INSERT INTO `cam_purchase_requisition` (`account_pr`, `no_pr`, `date_request`, `account_mc`, `account_department`, `account_employee`, `account_cp`, `account_status`, `create_user`, `create_date`, `modified_user`, `modified_date`, `approve_user`, `approve_date`) VALUES
(2, 'PR-000002', '2019-04-16', 'P1', NULL, NULL, NULL, 2, 'admin', '2019-04-16 01:32:28', NULL, NULL, NULL, NULL),
(3, 'PR-000003', '2019-04-16', 'P1', NULL, NULL, NULL, 2, 'admin', '2019-04-16 01:35:27', NULL, NULL, NULL, NULL),
(4, 'PR-000004', '2019-04-16', 'P1', NULL, NULL, NULL, 2, 'admin', '2019-04-16 01:35:37', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cam_purchase_requisition_items`
--

CREATE TABLE `cam_purchase_requisition_items` (
  `account_pr_items` int(11) NOT NULL,
  `no_po` varchar(23) NOT NULL,
  `no_pr` varchar(23) NOT NULL,
  `account_mp` varchar(10) NOT NULL,
  `qty` int(5) NOT NULL,
  `unit_code` varchar(11) NOT NULL,
  `required_date` date NOT NULL,
  `note` text NOT NULL,
  `create_user` varchar(33) NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cam_purchase_requisition_items`
--

INSERT INTO `cam_purchase_requisition_items` (`account_pr_items`, `no_po`, `no_pr`, `account_mp`, `qty`, `unit_code`, `required_date`, `note`, `create_user`, `create_date`) VALUES
(1, 'PO-000001', 'PR-000001', 'MP0000001', 11, 'kg', '2019-04-01', 'zzzzz', 'admin', '2019-04-01 00:00:00'),
(2, 'PO-000002', 'PR-000001', 'MP0000002', 5, 'kg', '2019-04-01', '', 'admin', '2019-04-01 00:00:00'),
(3, 'PO-000001', 'PR-000004', 'MP0000002', 2, 'kg', '2019-04-16', 'test', 'admin', '2019-04-16 01:35:37');

-- --------------------------------------------------------

--
-- Table structure for table `cam_status`
--

CREATE TABLE `cam_status` (
  `account_status` varchar(2) NOT NULL,
  `description_status` varchar(35) DEFAULT NULL,
  `Group` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cam_status`
--

INSERT INTO `cam_status` (`account_status`, `description_status`, `Group`) VALUES
('1', 'Approved', 0),
('2', 'Reject', 0),
('3', 'Request Approve', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cam_unit`
--

CREATE TABLE `cam_unit` (
  `unit_code` varchar(19) NOT NULL,
  `description_unit` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `level_users`
--

CREATE TABLE `level_users` (
  `id_level` int(10) NOT NULL,
  `nama_level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level_users`
--

INSERT INTO `level_users` (`id_level`, `nama_level`) VALUES
(2, 'warehouse'),
(4, 'Manager'),
(5, 'admin'),
(6, 'sales');

-- --------------------------------------------------------

--
-- Table structure for table `modul`
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
-- Dumping data for table `modul`
--

INSERT INTO `modul` (`id_modul`, `nama_modul`, `username`, `link`, `static_content`, `gambar`, `publish`, `status`, `aktif`, `urutan`, `link_seo`) VALUES
(2, 'Manajemen User', 'admin', 'manajemenuser', '', '', 'Y', 'user', 'Y', 0, ''),
(82, 'barang', 'admin', 'listbarang', '', '', 'Y', 'user', 'Y', 0, ''),
(81, 'gudang', 'admin', 'listgudang', '', '', 'Y', 'user', 'Y', 0, ''),
(77, 'action edit', 'admin', 'action_edit', '', '', 'Y', 'user', 'Y', 0, ''),
(78, 'kategori', 'admin', 'kategoribrg', '', '', 'Y', 'user', 'Y', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `nama_lengkap`, `email`, `no_telp`, `foto`, `level`, `blokir`, `id_session`, `tgl_gabung`, `tgl_keluar`, `alamat`) VALUES
('admin', 'bff0cc42103de1b4721370e84dc24f635a7afeca41198c9b3e03946a1b6b7191d14356408a5e57ce6daf77e6e800c66fac7ab0482d57d48d23e6808e4b562daa', 'Ajie', 'adjiedwisandy@gmail.com', '081284857609', '14553255_1764512750456659_109914453692121088_n1.jpg', 'admin', 'N', 'q173s8hs1jl04st35169ccl8o7', '0000-00-00', '0000-00-00', 'jln bogem'),
('james', 'edbd881f1ee2f76ba0bd70fd184f87711be991a0401fd07ccd4b199665f00761afc91731d8d8ba6cbb188b2ed5bfb465b9f3d30231eb0430b9f90fe91d136648', 'james', 'james@hjyt.com', '123445678', '', 'admin', 'N', 'b4cc344d25a2efe540adbf2678e2304c-20190221092604', '0000-00-00', '0000-00-00', 'ciracas');

-- --------------------------------------------------------

--
-- Table structure for table `users_modul`
--

CREATE TABLE `users_modul` (
  `id_umod` int(11) NOT NULL,
  `id_session` varchar(255) NOT NULL,
  `id_modul` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_modul`
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
-- Table structure for table `wmu_conf_perusahaan`
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
-- Dumping data for table `wmu_conf_perusahaan`
--

INSERT INTO `wmu_conf_perusahaan` (`id_perusahaan`, `nama_perusahaan`, `npwp_perusahaan`, `alamat_perusahaan`, `telepon`, `email`, `fax`, `website`, `kode_pos`, `logo`) VALUES
(1, 'Indonesia Raya', '', 'Jalan Cilangkap, Jakarta Timur', '021-xxxxxxxx', '', '0751461691', '', 13740, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cam_company_plant`
--
ALTER TABLE `cam_company_plant`
  ADD PRIMARY KEY (`account_cp`);

--
-- Indexes for table `cam_department`
--
ALTER TABLE `cam_department`
  ADD PRIMARY KEY (`account_department`);

--
-- Indexes for table `cam_employee`
--
ALTER TABLE `cam_employee`
  ADD PRIMARY KEY (`account_employee`);

--
-- Indexes for table `cam_material_category`
--
ALTER TABLE `cam_material_category`
  ADD PRIMARY KEY (`account_mc`);

--
-- Indexes for table `cam_material_product`
--
ALTER TABLE `cam_material_product`
  ADD PRIMARY KEY (`account_mp`);

--
-- Indexes for table `cam_purchase_order`
--
ALTER TABLE `cam_purchase_order`
  ADD PRIMARY KEY (`account_po`);

--
-- Indexes for table `cam_purchase_order_down_payment`
--
ALTER TABLE `cam_purchase_order_down_payment`
  ADD PRIMARY KEY (`account_payment`);

--
-- Indexes for table `cam_purchase_order_freight`
--
ALTER TABLE `cam_purchase_order_freight`
  ADD PRIMARY KEY (`account_freight`);

--
-- Indexes for table `cam_purchase_order_items`
--
ALTER TABLE `cam_purchase_order_items`
  ADD PRIMARY KEY (`account_po_items`);

--
-- Indexes for table `cam_purchase_order_vendor`
--
ALTER TABLE `cam_purchase_order_vendor`
  ADD PRIMARY KEY (`account_vendor`);

--
-- Indexes for table `cam_purchase_requisition`
--
ALTER TABLE `cam_purchase_requisition`
  ADD PRIMARY KEY (`account_pr`);

--
-- Indexes for table `cam_purchase_requisition_items`
--
ALTER TABLE `cam_purchase_requisition_items`
  ADD PRIMARY KEY (`account_pr_items`);

--
-- Indexes for table `cam_status`
--
ALTER TABLE `cam_status`
  ADD PRIMARY KEY (`account_status`);

--
-- Indexes for table `cam_unit`
--
ALTER TABLE `cam_unit`
  ADD PRIMARY KEY (`unit_code`);

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
-- AUTO_INCREMENT for table `cam_purchase_requisition`
--
ALTER TABLE `cam_purchase_requisition`
  MODIFY `account_pr` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cam_purchase_requisition_items`
--
ALTER TABLE `cam_purchase_requisition_items`
  MODIFY `account_pr_items` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT for table `users_modul`
--
ALTER TABLE `users_modul`
  MODIFY `id_umod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `wmu_conf_perusahaan`
--
ALTER TABLE `wmu_conf_perusahaan`
  MODIFY `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
