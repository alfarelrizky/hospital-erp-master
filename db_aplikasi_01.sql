-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 02, 2020 at 12:59 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_aplikasi_01`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dokter`
--

CREATE TABLE `tbl_dokter` (
  `id_dokter` int(15) NOT NULL,
  `nama_dokter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_tlp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spesialis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `join_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_izin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_dokter`
--

INSERT INTO `tbl_dokter` (`id_dokter`, `nama_dokter`, `jenis_kelamin`, `alamat`, `no_tlp`, `email`, `spesialis`, `status`, `join_date`, `nomor_izin`) VALUES
(1233819, 'Muhammad Aushafy Setyawan', 'laki-laki', 'Jepara, Jawa Tengah, Indonesia', '082221777014', 'aushafy@gmail.com', 'OBG1', 'tetap', '2019-09-02', 'SK02193013121'),
(1236507, 'Djanggo', 'laki-laki', 'Pasar Senen, Jakarta Pusat, DKI Jakarta', '089998756555', 'djanggo_rusher@gmail.com', 'PUL1', 'tetap', '2019-01-01', 'SK02193013111');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pasien`
--

CREATE TABLE `tbl_pasien` (
  `id_pasien` int(15) NOT NULL,
  `nama_pasien` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tgl_lahir` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8_unicode_ci,
  `no_tlp` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `no_rekam_medis` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_pasien`
--

INSERT INTO `tbl_pasien` (`id_pasien`, `nama_pasien`, `tgl_lahir`, `jenis_kelamin`, `alamat`, `no_tlp`, `no_rekam_medis`) VALUES
(1, 'Maman Durahman', '21-07-1978', 'laki-laki', 'Tebet dalam, Jakarta Selatan', '082789989990', 'RM202004230012'),
(2, 'Salman Farisi', '09-02-1998', 'laki-laki', 'Karet Tengsin, Jakarta Selatan', '081788239912', 'RM202004230022'),
(3, 'Syahida Muslimah', '12-05-1992', 'perempuan', 'Kuningan, Jakarta Selatan', '0890989990', 'RM202004230033'),
(4, 'Chandra Hutama', '14-02-1988', 'laki-laki', 'Duren Sawit, Jakarta Timur', '082788723221', 'RM202004230212'),
(5, 'Rizki andina', '09-07-1996', 'perempuan', 'Kelapa Gading, Jakarta', '08674567881', 'RM2020042300789'),
(6, 'Sarah Munimas', '12-03-1989', 'Perempuan', 'Pondok kopi, Jakarta timur', '08278891200923', 'RM2020042200729'),
(7, 'Syarifa hanifia', '22-07-1998', 'perempuan', 'Jakarta Selatan', '082789989990', 'RM2020041200012'),
(8, 'Juminah', '21-07-1968', 'perempuan', 'Jakarta Timur', '08228998290', 'RM2020041200112'),
(9, 'Hasan Ali Usein', '21-07-1988', 'laki-laki', 'Duren Sawit, Jakarta Timue', '08788999022', 'RM2020041201122'),
(10, 'Ali Ubaidah', '30-04-1998', 'laki-laki', 'Jakarta Timur', '08788999022', 'RM2020041201022'),
(11, 'Humaira Nisa', '12-06-2002', 'perempuan', 'Bekasi Timur', '081779992123', 'RM2020021201024'),
(12, 'Anisa Zakhrana', '22-03-1998', 'perempuan', 'Bekasi Timur', '081213331232', 'RM202002111234');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_spesialis`
--

CREATE TABLE `tbl_spesialis` (
  `spesialis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bidang_spesialis` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_spesialis`
--

INSERT INTO `tbl_spesialis` (`spesialis`, `bidang_spesialis`, `keterangan`) VALUES
('BDH1', 'Bedah', 'Sp.B , Bedah Umum'),
('BDH2', 'Bedah Urologi', 'Sp.U, Urologist'),
('DU1', 'Dokter Umum', 'Dokter umum'),
('DU2', 'Dokter Umum Siaga', 'Dokter umum IGD'),
('MTA1', 'Mata', 'Sp.M, Spesialis Mata'),
('OBG1', 'Kandungan', 'Sp.OG, Spesialis kebidanan dan kandungan'),
('PPD1', 'Penyakit Dalam', 'Sp.PD, Spesialis penyakit dalam umum'),
('PPD2', 'Penyakit dalam – Hematologi', 'Spesialis penyakit dalam, sub spesialis Kelainan darah'),
('PUL1', 'Paru', 'Sp.P, Spesialis Kesehatan Paru'),
('THT1', 'THT', 'Sp.THT, Spesialis Telinga Hidung Tenggorokan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_aplikasi`
--

CREATE TABLE `tbl_user_aplikasi` (
  `id_user` int(11) NOT NULL,
  `username` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_tlp` int(255) NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_user` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_user_aplikasi`
--

INSERT INTO `tbl_user_aplikasi` (`id_user`, `username`, `nama`, `no_tlp`, `email`, `password`, `status_user`, `role_user`) VALUES
(1, 'ADMUSR1', 'Sarah Nur Laila', 0, 'sarah@email.com', '32250170a0dca92d53ec9624f336ca24', 'aktif', '1'),
(2, 'ADMMR1', 'Luthfi Abdillah', 0, 'lutfhi@email.com', '32250170a0dca92d53ec9624f336ca24', 'aktif', '2'),
(3, 'ADMMR2', 'Jaka Nurmanto', 0, 'janur@email.com', '32250170a0dca92d53ec9624f336ca24', 'aktif', '2'),
(4, 'DR-012', 'dr. Wijaya, Sp.PD', 0, 'wijaaydr@rmail.com', '32250170a0dca92d53ec9624f336ca24', 'aktif', '3'),
(5, 'DR-345', 'dr. Sisca sari', 0, 'siscasari@rmail.com', '32250170a0dca92d53ec9624f336ca24', 'aktif', '3'),
(6, 'DR-245', 'dr. Maulani, Sp.OG', 0, 'dr_nay@gmail.com', '32250170a0dca92d53ec9624f336ca24', 'aktif', '3'),
(7, 'DR-215', 'dr. Yasmin, Sp.B', 0, 'dr_yasmin@gmail.com', '32250170a0dca92d53ec9624f336ca24', 'aktif', '3'),
(8, 'PD-10', 'Yudho Agustian', 0, 'yudo@mail.com', '32250170a0dca92d53ec9624f336ca24', 'aktif', '4'),
(9, 'PD-07', 'Riani Nurwidhi', 0, 'nurwidi@mail.com', '32250170a0dca92d53ec9624f336ca24', 'aktif', '4'),
(10, 'admin', 'admin', 2147483647, 'administrator@rsss.com', '0192023a7bbd73250516f069df18b500', 'aktif', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_dokter`
--
ALTER TABLE `tbl_dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `tbl_spesialis`
--
ALTER TABLE `tbl_spesialis`
  ADD PRIMARY KEY (`spesialis`);

--
-- Indexes for table `tbl_user_aplikasi`
--
ALTER TABLE `tbl_user_aplikasi`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  MODIFY `id_pasien` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_user_aplikasi`
--
ALTER TABLE `tbl_user_aplikasi`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
