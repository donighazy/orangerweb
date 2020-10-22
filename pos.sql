-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2020 at 03:58 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `approval`
--

CREATE TABLE `approval` (
  `pegawai_id` int(11) NOT NULL,
  `jenis_approval` varchar(20) NOT NULL,
  `kode_verifikasi` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `tgl_req` date NOT NULL,
  `tgl_approve` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `approval`
--

INSERT INTO `approval` (`pegawai_id`, `jenis_approval`, `kode_verifikasi`, `status`, `tgl_req`, `tgl_approve`) VALUES
(111239, 'Lupa PIN', '699131', 'Finish', '2020-06-07', '2020-06-08 08:20:00'),
(111241, 'Lupa PIN', '448460', 'Finish', '2020-06-07', '2020-06-07 11:03:16'),
(111243, 'Lupa PIN', '988803', 'Finish', '2020-06-25', '2020-06-25 10:54:20'),
(111245, 'Lupa PIN', '038742', 'Finish', '2020-06-25', '2020-06-25 11:24:05');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `jenis_id` int(11) NOT NULL,
  `jenis_nama` varchar(20) NOT NULL,
  `kategori_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`jenis_id`, `jenis_nama`, `kategori_id`) VALUES
(5, 'Pulsa HP', 3),
(6, 'Paket Data', 3),
(10, 'Dalam Negeri', 1),
(11, 'Luar Negeri', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori`) VALUES
(1, 'Kurir'),
(3, 'Pospay');

-- --------------------------------------------------------

--
-- Table structure for table `kurir`
--

CREATE TABLE `kurir` (
  `id_kurir` int(10) NOT NULL,
  `id_jenis` int(10) DEFAULT '0',
  `id_loket` int(10) DEFAULT '0',
  `tanggal` datetime DEFAULT NULL,
  `kiriman_jenis` varchar(50) DEFAULT NULL,
  `noref` varchar(50) DEFAULT '0',
  `kiriman_berat` varchar(50) DEFAULT NULL,
  `kiriman_isi` varchar(255) DEFAULT NULL,
  `tujuan_kodepos` varchar(50) DEFAULT NULL,
  `tujuan_prov` varchar(50) DEFAULT NULL,
  `tujuan_kota` varchar(50) DEFAULT NULL,
  `tujuan_kec` varchar(50) DEFAULT NULL,
  `tujuan_kel` varchar(50) DEFAULT NULL,
  `tarif_jenis` varchar(50) DEFAULT NULL,
  `tarif_ongkir` float DEFAULT '0',
  `pengirim_nama` varchar(255) DEFAULT '0',
  `pengirim_alamat` varchar(255) DEFAULT '0',
  `pengirim_kel` varchar(255) DEFAULT '0',
  `pengirim_kec` varchar(255) DEFAULT '0',
  `pengirim_kota` varchar(255) DEFAULT '0',
  `pengirim_kodepos` varchar(255) DEFAULT '0',
  `pengirim_hp` varchar(255) DEFAULT '0',
  `penerima_nama` varchar(255) DEFAULT '0',
  `penerima_alamat` varchar(255) DEFAULT '0',
  `penerima_prov` varchar(255) DEFAULT '0',
  `penerima_kota` varchar(255) DEFAULT '0',
  `penerima_kec` varchar(255) DEFAULT '0',
  `penerima_kel` varchar(255) DEFAULT '0',
  `penerima_kodepos` varchar(255) DEFAULT '0',
  `penerima_hp` varchar(255) DEFAULT '0',
  `penerima_pesan` varchar(255) DEFAULT '0',
  `kiriman_negara` varchar(255) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `kurir`
--

INSERT INTO `kurir` (`id_kurir`, `id_jenis`, `id_loket`, `tanggal`, `kiriman_jenis`, `noref`, `kiriman_berat`, `kiriman_isi`, `tujuan_kodepos`, `tujuan_prov`, `tujuan_kota`, `tujuan_kec`, `tujuan_kel`, `tarif_jenis`, `tarif_ongkir`, `pengirim_nama`, `pengirim_alamat`, `pengirim_kel`, `pengirim_kec`, `pengirim_kota`, `pengirim_kodepos`, `pengirim_hp`, `penerima_nama`, `penerima_alamat`, `penerima_prov`, `penerima_kota`, `penerima_kec`, `penerima_kel`, `penerima_kodepos`, `penerima_hp`, `penerima_pesan`, `kiriman_negara`) VALUES
(1, 1, 111237, '2020-05-09 16:39:11', 'surat', '2020ORG38339933', '50 kg', 'Surat Kuliah', '20018', '1', '1', '3', '1', '1', 120000, 'Santuyy', 'Kebon jeruk no.58', '1', '3', '1', '13001', '0878904563', 'Hayukk', 'bali no. 901', '1', '1', '3', '1', '12001', '08216745901', 'Semoga sehat-sehat selalu', '0'),
(2, 2, 111239, '2020-06-04 10:24:18', 'surat', '2020ORG26644689', '50 kg', 'Surat Kuliah', NULL, NULL, NULL, NULL, NULL, '2', 80000, 'Santuyy', 'Kebon jeruk no.58', '1', '3', '1', '13001', '0878904563', 'puput', 'cimahi no. 100', '0', '0', '0', '0', '0', '08216745999', 'Semoga sehat-sehat selalu', '1');

-- --------------------------------------------------------

--
-- Table structure for table `loket`
--

CREATE TABLE `loket` (
  `id` int(10) NOT NULL,
  `pin` int(10) DEFAULT '0',
  `kprk` int(10) DEFAULT '0',
  `norek` varchar(20) DEFAULT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `nohp` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `npwp` varchar(200) DEFAULT NULL,
  `kelamin` char(1) DEFAULT NULL,
  `tgllahir` date DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `tglreg` datetime DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loket`
--

INSERT INTO `loket` (`id`, `pin`, `kprk`, `norek`, `nama`, `alamat`, `nohp`, `email`, `npwp`, `kelamin`, `tgllahir`, `agama`, `tglreg`, `status`) VALUES
(111237, 123456, 10000, '1863617014', 'Sugionoo', 'jl. kerapuh no.94', '08215567881', 'sugiono@gmail.com', '', 'L', '2017-01-03', 'Islam', '2020-05-03 17:30:54', 'Aktif'),
(111238, 55567, 29400, '845743259', 'Krisman', 'Jl. Durian No. 65 B', '08789001', 'Krisman@gmail.com', '12.56.788.441.12.911', 'L', '2018-07-02', 'Budha', '2020-05-09 16:48:20', 'Aktif'),
(111239, 666667, 29400, '1265854736', 'Martin', 'Jl. Periuk no.94 B', '089877431', 'martin@gmail.com', '14282148', 'L', '1996-02-05', 'Islam', '2020-06-04 10:04:26', 'Aktif'),
(111240, 334455, 10900, '617296439', 'Kevin', 'jl. banjarsari no.70 B', '0821904512', 'kevin@gmail.com', '12345678910', 'L', '1999-01-07', 'Islam', '2020-06-07 10:17:40', 'Aktif'),
(111241, 555555, 17000, '723653667', 'Afrizal', 'Jl.tebu', '0878654431', 'afrizal@gmail.com', '123456783', 'L', '1998-05-04', 'Islam', '2020-06-07 10:47:23', 'Aktif'),
(111243, 555556, 25000, '1826001436', 'aji', 'jl. mulawarman 12', '0844567812', 'aji@gmail.com', '12788449712', 'L', '2014-01-28', 'Kristen', '2020-06-25 05:11:07', 'Blokir'),
(111245, 242424, 10000, '1610157460', 'muzan', 'jl. periuk', '08645123', 'muzan@gmail.com', '2345789123', 'L', '2020-04-07', 'Islam', '2020-06-25 11:02:56', 'Aktif'),
(111246, 123455, 17000, '', 'haloo', 'jln. sipodang', '089845123', 'haloo@yahoo.com', '12345671', 'L', '2020-06-01', 'Hindu', '2020-06-25 11:52:05', 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `loket_saldo`
--

CREATE TABLE `loket_saldo` (
  `id` int(10) NOT NULL DEFAULT '0',
  `saldo` float DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loket_saldo`
--

INSERT INTO `loket_saldo` (`id`, `saldo`) VALUES
(111231, 3000000),
(111234, 972525),
(111235, 334000),
(111236, 448000),
(111237, 260000),
(111238, 69000),
(111239, 20000),
(111241, 365100),
(111245, 1474000);

-- --------------------------------------------------------

--
-- Table structure for table `pospay`
--

CREATE TABLE `pospay` (
  `id_pospay` int(10) NOT NULL,
  `id_jenis` int(10) DEFAULT '0',
  `id_loket` int(10) DEFAULT '0',
  `id_produk` int(10) DEFAULT '0',
  `tanggal` datetime DEFAULT NULL,
  `nohp` varchar(20) DEFAULT NULL,
  `nominal` float DEFAULT '0',
  `admin` float DEFAULT '0',
  `total` float DEFAULT '0',
  `noref` varchar(50) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pospay`
--

INSERT INTO `pospay` (`id_pospay`, `id_jenis`, `id_loket`, `id_produk`, `tanggal`, `nohp`, `nominal`, `admin`, `total`, `noref`) VALUES
(1, 1, 111231, 1, '2020-04-04 17:17:01', '081221104196', 25000, 2475, 27475, '2020ORG39783945'),
(2, 2, 111232, 4, '2020-04-04 17:24:04', '081221104196', 25000, 2475, 27475, '2020ORG69602959'),
(3, 1, 111234, 1, '2020-04-14 21:32:11', '081221104196', 25000, 2475, 27475, '2020ORG88663674'),
(4, 1, 111235, 3, '2020-04-14 17:24:23', '0878906543', 50000, 1000, 56000, '2020ORG12371663'),
(5, 2, 111235, 4, '2020-04-14 17:31:06', '087890012', 100000, 1000, 110000, '2020ORG00937217'),
(6, 1, 111236, 2, '2020-04-15 04:50:35', '08789065432', 50000, 1000, 51000, '2020ORG79054345'),
(7, 1, 111236, 1, '2020-05-03 17:22:26', '08789065421', 100000, 1000, 101000, '2020ORG52450875'),
(8, 2, 111237, 5, '2020-05-03 17:33:29', '08945612344', 25000, 1000, 26000, '2020ORG44075604'),
(9, 1, 111238, 1, '2020-06-04 09:56:25', '087889056', 50000, 1000, 51000, '2020ORG94527846'),
(10, 1, 111245, 2, '2020-06-25 12:15:39', '08789065', 25000, 1000, 26000, '2020ORG55005025'),
(11, 1, 111241, 1, '2020-07-09 08:57:48', '082250300084', 25000, 2475, 27475, '2020ORG46497852');

-- --------------------------------------------------------

--
-- Table structure for table `ref_kantor`
--

CREATE TABLE `ref_kantor` (
  `kodekantor` int(10) NOT NULL,
  `nama_kantor` varchar(20) NOT NULL,
  `regional_kode` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_kantor`
--

INSERT INTO `ref_kantor` (`kodekantor`, `nama_kantor`, `regional_kode`) VALUES
(10000, 'JAKARTAPUSAT', 10004),
(10900, 'SPP JAKARTA', 10004),
(11000, 'JAKARTABARAT', 10004),
(12000, 'JAKARTASELATAN', 10004),
(13000, 'JAKARTATIMUR', 10004),
(14000, 'JAKARTAUTARA', 10004),
(15000, 'TANGERANG', 10004),
(17000, 'BEKASI', 10004),
(25000, 'PADANG', 25004),
(25500, 'PARIAMAN', 25004),
(25600, 'PAINAN', 25004),
(26100, 'BUKITINGGI', 25004),
(26200, 'PAYAKUMBUH', 25004),
(26300, 'LUBUKSIKAPING', 25004),
(27100, 'PADANGPANJANG', 25004),
(27300, 'SOLOK', 25004),
(27400, 'SAWAHLUNTO', 25004),
(28000, 'PEKANBARU', 25004),
(28500, 'BANGKINANG', 25004),
(28800, 'DUMAI', 25004),
(29100, 'TANGJUNGPINANG', 25004),
(29200, 'TEMBILAHAN', 25004),
(29300, 'RENGAT', 25004),
(29400, 'BATAM', 25004);

-- --------------------------------------------------------

--
-- Table structure for table `ref_kecamatan`
--

CREATE TABLE `ref_kecamatan` (
  `id_kecamatan` int(10) NOT NULL,
  `id_kota` int(10) DEFAULT '0',
  `nama_kecamatan` varchar(100) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_kecamatan`
--

INSERT INTO `ref_kecamatan` (`id_kecamatan`, `id_kota`, `nama_kecamatan`) VALUES
(1, 1, 'CIMAHI UTARA'),
(2, 1, 'CIMAHI TENGAH'),
(3, 1, 'CIMAHI SELATAN');

-- --------------------------------------------------------

--
-- Table structure for table `ref_kelurahan`
--

CREATE TABLE `ref_kelurahan` (
  `id_kelurahan` int(10) NOT NULL,
  `id_kecamatan` int(10) DEFAULT '0',
  `nama_kelurahan` varchar(100) DEFAULT '0',
  `kodepos` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_kelurahan`
--

INSERT INTO `ref_kelurahan` (`id_kelurahan`, `id_kecamatan`, `nama_kelurahan`, `kodepos`) VALUES
(1, 1, 'CIBABAT', '40513'),
(2, 1, 'CIPAGERAN', '40511'),
(3, 1, 'CITEUREUP', '40512'),
(4, 1, 'PASIRKALIKI', '40514');

-- --------------------------------------------------------

--
-- Table structure for table `ref_kota`
--

CREATE TABLE `ref_kota` (
  `id_kota` int(10) NOT NULL,
  `id_provinsi` int(10) DEFAULT '0',
  `nama_kota` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_kota`
--

INSERT INTO `ref_kota` (`id_kota`, `id_provinsi`, `nama_kota`) VALUES
(1, 1, 'KOTA CIMAHI');

-- --------------------------------------------------------

--
-- Table structure for table `ref_negara`
--

CREATE TABLE `ref_negara` (
  `id_negara` int(10) NOT NULL,
  `nama_negara` varchar(100) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_negara`
--

INSERT INTO `ref_negara` (`id_negara`, `nama_negara`) VALUES
(1, 'Amerika Serikat'),
(2, 'Malaysia');

-- --------------------------------------------------------

--
-- Table structure for table `ref_produk_pospay`
--

CREATE TABLE `ref_produk_pospay` (
  `id_produk` int(10) NOT NULL,
  `nama_produk` varchar(50) DEFAULT '0',
  `admin` float DEFAULT '0',
  `jenis` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_produk_pospay`
--

INSERT INTO `ref_produk_pospay` (`id_produk`, `nama_produk`, `admin`, `jenis`) VALUES
(1, 'TELKOMSEL PRABAYAR', 2475, 1),
(2, 'INDOSAT  PRABAYAR', 2475, 1),
(3, 'XL PRABAYAR', 2475, 1),
(4, 'TELKOMSEL DATA', 2475, 2),
(5, 'XL PAKET DATA', 2475, 2),
(6, 'AXIS PAKET DATA', 2475, 2),
(7, 'TOKEN LISTRIK', 2475, 3);

-- --------------------------------------------------------

--
-- Table structure for table `ref_provinsi`
--

CREATE TABLE `ref_provinsi` (
  `id_provinsi` int(10) NOT NULL,
  `nama_provinsi` varchar(100) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_provinsi`
--

INSERT INTO `ref_provinsi` (`id_provinsi`, `nama_provinsi`) VALUES
(1, 'Jawa Barat');

-- --------------------------------------------------------

--
-- Table structure for table `ref_regional`
--

CREATE TABLE `ref_regional` (
  `regional_kode` int(20) NOT NULL,
  `regional_nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_regional`
--

INSERT INTO `ref_regional` (`regional_kode`, `regional_nama`) VALUES
(10004, 'Jakarta'),
(20004, 'Medan'),
(25004, 'Padang'),
(30004, 'Palembang'),
(40004, 'Bandung'),
(50004, 'Semarang'),
(60004, 'Surabaya'),
(70704, 'Banjarbaru'),
(80004, 'Denpasar'),
(90004, 'Makassar'),
(99004, 'Jayapura');

-- --------------------------------------------------------

--
-- Table structure for table `tarif_paket`
--

CREATE TABLE `tarif_paket` (
  `id_tarif` int(10) NOT NULL,
  `nama` varchar(50) DEFAULT '0',
  `tarif` float DEFAULT '0',
  `jenis` int(11) DEFAULT '0' COMMENT '1=dalam negeri, 2=luar negeri',
  `kode` int(11) DEFAULT '0' COMMENT '1=dalam negeri, 2=luar negeri'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tarif_paket`
--

INSERT INTO `tarif_paket` (`id_tarif`, `nama`, `tarif`, `jenis`, `kode`) VALUES
(1, 'PAKET KILAT KHUSUS (1 HARI)', 20000, 1, 240),
(2, 'PAKET KILAT KHUSUS (10 HARI)', 200000, 2, 299);

-- --------------------------------------------------------

--
-- Table structure for table `topup`
--

CREATE TABLE `topup` (
  `id` int(10) NOT NULL,
  `id_loket` int(10) DEFAULT '0',
  `tanggal` datetime DEFAULT NULL,
  `jumlah` float DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topup`
--

INSERT INTO `topup` (`id`, `id_loket`, `tanggal`, `jumlah`) VALUES
(1, 111231, '2020-04-04 15:31:00', 1000000),
(2, 111232, '2020-04-04 17:23:49', 1000000),
(3, 111232, '2020-04-04 17:29:20', 1000000),
(4, 25, '2020-04-04 17:29:53', 1000000),
(5, 25, '2020-04-04 17:30:00', 2000000),
(6, 25, '2020-04-04 17:30:15', 2000000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `transaksi_id` int(11) NOT NULL,
  `pegawai_id` int(20) NOT NULL,
  `ref_regional` int(11) NOT NULL,
  `transaksi_tanggal` date NOT NULL,
  `transaksi_jenis` varchar(20) NOT NULL,
  `jenis_id` int(20) NOT NULL,
  `billnumber` varchar(50) NOT NULL,
  `no_transaksi` varchar(50) NOT NULL,
  `jmlLembar` int(20) NOT NULL,
  `nominal_tagihan` int(200) NOT NULL,
  `payment_code` varchar(200) NOT NULL,
  `jmlTrx` int(20) NOT NULL,
  `no_resi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`transaksi_id`, `pegawai_id`, `ref_regional`, `transaksi_tanggal`, `transaksi_jenis`, `jenis_id`, `billnumber`, `no_transaksi`, `jmlLembar`, `nominal_tagihan`, `payment_code`, `jmlTrx`, `no_resi`) VALUES
(3, 111230, 10004, '2020-02-21', 'Dalam Negeri', 3, '201906219AI', '21ORG00000009', 2, 40000, '300621', 3, 'JS1320967817'),
(4, 111227, 25004, '2019-06-22', 'Paket Data', 3, '201906236AI', '22ORG00000006', 1, 50000, '270622', 2, 'JB0007993023'),
(7, 111223, 25004, '2020-01-21', 'Pulsa HP', 4, '202006232AI', '23ORG00000002', 1, 10000, '232306', 2, 'JL0007994901'),
(9, 111225, 10004, '2019-06-23', 'Luar Negeri', 3, '201906234AI', '23ORG00000004', 1, 80000, '250623', 2, 'JP7984934793'),
(11, 111222, 25004, '2020-02-20', 'Dalam Negeri', 3, '202001201AI', '20ORG00000001', 1, 20000, '220120', 1, 'JD0018951787'),
(14, 111228, 10004, '2020-02-14', 'Luar Negeri', 11, '202006142AI', '14ORG00005002\r\n', 3, 340000, '000056', 3, 'BB7984934790'),
(23, 111231, 10000, '2020-04-04', 'Pulsa HP', 5, '2020353032', '2020ORG39783945', 1, 27475, '556178', 1, 'PP0000983622'),
(24, 111232, 17000, '2020-04-04', 'Paket Data', 6, '2020207414', '2020ORG69602959', 1, 27475, '835052', 1, 'PP0000366189'),
(25, 111234, 27300, '2020-04-14', 'Pulsa HP', 5, '2020630377', '2020ORG88663674', 1, 27475, '923444', 1, 'PP0000138567'),
(26, 111235, 10000, '2020-04-14', 'Pulsa HP', 5, '2020069582', '2020ORG12371663', 1, 56000, '476549', 1, 'PP0000017320'),
(27, 111235, 10000, '2020-04-14', 'Paket Data', 6, '2020512888', '2020ORG00937217', 1, 110000, '473159', 1, 'PP0000394854'),
(28, 111236, 26200, '2020-04-15', 'Pulsa HP', 5, '2020161015', '2020ORG79054345', 1, 51000, '792537', 1, 'PP0000954878'),
(29, 111236, 26200, '2020-05-03', 'Pulsa HP', 5, '2020343298', '2020ORG52450875', 1, 101000, '887343', 1, 'PP0000478923'),
(30, 111237, 10000, '2020-05-03', 'Paket Data', 6, '2020174333', '2020ORG44075604', 1, 26000, '018010', 1, 'PP0000589538'),
(31, 111237, 10000, '2020-05-09', 'Dalam Negeri', 10, '2020804246', '2020ORG38339933', 1, 120000, '919355', 1, 'KR0000009564'),
(32, 111238, 29400, '2020-06-04', 'Pulsa HP', 5, '2020870027', '2020ORG94527846', 1, 51000, '519528', 1, 'PP0000550204'),
(33, 111239, 29400, '2020-06-04', 'Luar Negeri', 11, '2020715040', '2020ORG26644689', 1, 80000, '218726', 1, 'KR0000020878'),
(34, 111245, 10000, '2020-06-25', 'Pulsa HP', 5, '2020170613', '2020ORG55005025', 1, 26000, '055103', 1, 'PP0000460702'),
(35, 111241, 17000, '2020-07-09', 'Pulsa HP', 5, '2020963745', '2020ORG46497852', 1, 27475, '790871', 1, 'PP0000602214'),
(36, 111241, 17000, '2020-07-09', 'PLN', 3, '2020667003', '2020ORG81793714', 1, 27475, '733813', 1, 'PP0000339182'),
(37, 111241, 17000, '2020-07-09', 'PLN', 3, '2020134278', '2020ORG50987534', 1, 52475, '118740', 1, 'PP0000083141'),
(38, 111241, 17000, '2020-07-09', 'PLN', 3, '2020955853', '2020ORG43880222', 1, 27475, '022955', 1, 'PP0000031473');

-- --------------------------------------------------------

--
-- Table structure for table `t_pegawailoket`
--

CREATE TABLE `t_pegawailoket` (
  `pegawai_id` int(11) NOT NULL,
  `pegawai_nama` varchar(20) NOT NULL,
  `KPRK` int(11) NOT NULL,
  `pegawai_no_hp` varchar(20) NOT NULL,
  `pegawai_email` varchar(20) NOT NULL,
  `pegawai_pos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_pegawailoket`
--

INSERT INTO `t_pegawailoket` (`pegawai_id`, `pegawai_nama`, `KPRK`, `pegawai_no_hp`, `pegawai_email`, `pegawai_pos`) VALUES
(111222, 'Ahmad', 25600, '0822132132', 'dermawan@admin', 97810023),
(111223, 'Imanuel Septian', 25000, '082160921563', 'aweng@gmail.com', 89011346),
(111224, 'Muhammad Akbar', 26100, '085678960', 'golem@golem.com', 90778431),
(111225, 'doni', 10900, '089862315', 'doni@gmail.com', 76538904),
(111226, 'kevin', 27300, '0821437890', 'kevin@gmail.com', 98057869),
(111227, 'M. Ilham', 26200, '089765301', 'esnacor@specialone.c', 87015578),
(111228, 'Mas Hestu', 10000, '08224563', 'meliodas@gmail.com', 17028896),
(111229, 'Estarossa', 12000, '08659020', 'king@king.com', 57891045),
(111230, 'nadia', 13000, '089877641', 'nadia@nadia.com', 90238806),
(111237, 'Sugiono', 10000, '08215567881', 'sugiono@gmail.com', 64728010),
(111238, 'Krisman', 29400, '08789001', 'Krisman@gmail.com', 48345724),
(111239, 'Martin', 29400, '089877431', 'martin@gmail.com', 78463674),
(111241, 'Afrizal', 17000, '0878654431', 'afrizal@gmail.com', 79916647),
(111243, 'aji', 25000, '0844567812', 'aji@gmail.com', 52855922),
(111245, 'muzan', 10000, '08645123', 'muzan@gmail.com', 84844659),
(111246, 'haloo', 17000, '089845123', 'haloo@yahoo.com', 12802368);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_nama` varchar(100) NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_foto` varchar(100) DEFAULT NULL,
  `user_level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_nama`, `user_username`, `user_password`, `user_foto`, `user_level`) VALUES
(1, 'Admin', 'admin', '0192023a7bbd73250516f069df18b500', '1041934867_admin.png', 'administrator'),
(33, 'Azazel', 'admin2', 'c84258e9c39059a89ab77d846ddab909', '', 'administrator');

-- --------------------------------------------------------

--
-- Table structure for table `validasi`
--

CREATE TABLE `validasi` (
  `pegawai_id` int(11) NOT NULL,
  `no_rek_giro` varchar(20) NOT NULL,
  `pegawai_level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `validasi`
--

INSERT INTO `validasi` (`pegawai_id`, `no_rek_giro`, `pegawai_level`) VALUES
(111237, '1863617014', 'Aktif'),
(111238, '845743259', 'Aktif'),
(111239, '1265854736', 'Aktif'),
(111240, '617296439', 'Aktif'),
(111241, '723653667', 'Aktif'),
(111243, '1826001436', 'Aktif'),
(111245, '1610157460', 'Aktif'),
(111246, '', 'Tidak Aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approval`
--
ALTER TABLE `approval`
  ADD PRIMARY KEY (`pegawai_id`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`jenis_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`id_kurir`);

--
-- Indexes for table `loket`
--
ALTER TABLE `loket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loket_saldo`
--
ALTER TABLE `loket_saldo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pospay`
--
ALTER TABLE `pospay`
  ADD PRIMARY KEY (`id_pospay`);

--
-- Indexes for table `ref_kantor`
--
ALTER TABLE `ref_kantor`
  ADD PRIMARY KEY (`kodekantor`);

--
-- Indexes for table `ref_kecamatan`
--
ALTER TABLE `ref_kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `ref_kelurahan`
--
ALTER TABLE `ref_kelurahan`
  ADD PRIMARY KEY (`id_kelurahan`);

--
-- Indexes for table `ref_kota`
--
ALTER TABLE `ref_kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indexes for table `ref_negara`
--
ALTER TABLE `ref_negara`
  ADD PRIMARY KEY (`id_negara`);

--
-- Indexes for table `ref_produk_pospay`
--
ALTER TABLE `ref_produk_pospay`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `ref_provinsi`
--
ALTER TABLE `ref_provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indexes for table `ref_regional`
--
ALTER TABLE `ref_regional`
  ADD PRIMARY KEY (`regional_kode`);

--
-- Indexes for table `tarif_paket`
--
ALTER TABLE `tarif_paket`
  ADD PRIMARY KEY (`id_tarif`);

--
-- Indexes for table `topup`
--
ALTER TABLE `topup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transaksi_id`);

--
-- Indexes for table `t_pegawailoket`
--
ALTER TABLE `t_pegawailoket`
  ADD PRIMARY KEY (`pegawai_id`),
  ADD UNIQUE KEY `pegawai_nama` (`pegawai_nama`),
  ADD UNIQUE KEY `pegawai_nama_2` (`pegawai_nama`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `validasi`
--
ALTER TABLE `validasi`
  ADD PRIMARY KEY (`pegawai_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `approval`
--
ALTER TABLE `approval`
  MODIFY `pegawai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111246;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `jenis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kurir`
--
ALTER TABLE `kurir`
  MODIFY `id_kurir` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `loket`
--
ALTER TABLE `loket`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111247;

--
-- AUTO_INCREMENT for table `pospay`
--
ALTER TABLE `pospay`
  MODIFY `id_pospay` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ref_kantor`
--
ALTER TABLE `ref_kantor`
  MODIFY `kodekantor` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29401;

--
-- AUTO_INCREMENT for table `ref_kecamatan`
--
ALTER TABLE `ref_kecamatan`
  MODIFY `id_kecamatan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ref_kelurahan`
--
ALTER TABLE `ref_kelurahan`
  MODIFY `id_kelurahan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ref_kota`
--
ALTER TABLE `ref_kota`
  MODIFY `id_kota` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ref_negara`
--
ALTER TABLE `ref_negara`
  MODIFY `id_negara` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ref_produk_pospay`
--
ALTER TABLE `ref_produk_pospay`
  MODIFY `id_produk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ref_provinsi`
--
ALTER TABLE `ref_provinsi`
  MODIFY `id_provinsi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ref_regional`
--
ALTER TABLE `ref_regional`
  MODIFY `regional_kode` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99005;

--
-- AUTO_INCREMENT for table `tarif_paket`
--
ALTER TABLE `tarif_paket`
  MODIFY `id_tarif` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `transaksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `t_pegawailoket`
--
ALTER TABLE `t_pegawailoket`
  MODIFY `pegawai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111247;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `validasi`
--
ALTER TABLE `validasi`
  MODIFY `pegawai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111247;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
