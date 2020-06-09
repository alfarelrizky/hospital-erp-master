-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2020 at 04:18 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

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
-- Table structure for table `perawatan`
--

CREATE TABLE `perawatan` (
  `id_perawatan` int(11) NOT NULL,
  `id_rawat_inap` int(11) NOT NULL,
  `nama_dokter` varchar(50) NOT NULL,
  `tanggal_periksa` date NOT NULL,
  `tindakan` varchar(255) NOT NULL,
  `obat` varchar(255) NOT NULL,
  `anamase` varchar(255) NOT NULL,
  `diagnosis` varchar(255) NOT NULL,
  `status_pasien` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perawatan`
--

INSERT INTO `perawatan` (`id_perawatan`, `id_rawat_inap`, `nama_dokter`, `tanggal_periksa`, `tindakan`, `obat`, `anamase`, `diagnosis`, `status_pasien`) VALUES
(2, 10, 'Fa', '2020-06-03', 'suntik', 'bius', 'meninggal', 'stroke', 'PROSES PERAWATAN'),
(5, 11, 'asd', '2019-12-30', 'asd', 'asd', 'dsf', 'afas', 'SEMBUH'),
(6, 10, 'asd', '2019-11-30', 'asd', 'asdo', 'o', 'ks', 'SEMBUH'),
(7, 10, 'Alfarel', '2020-06-10', 'pok', 'pok', 'pok', 'opk', 'PROSES PERAWATAN');

-- --------------------------------------------------------

--
-- Table structure for table `rawat_inap`
--

CREATE TABLE `rawat_inap` (
  `id_rawat_inap` int(11) NOT NULL,
  `id_rekam_medis` int(11) NOT NULL,
  `dokter_penanggungjawab` varchar(50) NOT NULL,
  `kelas_rawat_inap` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rawat_inap`
--

INSERT INTO `rawat_inap` (`id_rawat_inap`, `id_rekam_medis`, `dokter_penanggungjawab`, `kelas_rawat_inap`) VALUES
(10, 1233819, 'Alfarel Rizqi', 'Kelas 2'),
(11, 1236507, 'Sapi', 'Kelas 3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dokter`
--

CREATE TABLE `tbl_dokter` (
  `id_dokter` int(15) NOT NULL,
  `nama_dokter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1233819, 'Alfarel Rizqi', 'laki-laki', 'Tangerang, Banten, Indonesia', '082221777014', 'alfarelrizky99@gmail.com', 'OBG1', 'tetap', '2019-09-02', 'SK02193013121'),
(1236507, 'Sapi', 'laki-laki', 'Pasar Senen, Jakarta Pusat, DKI Jakarta', '089998756555', 'cow@gmail.com', 'PUL1', 'tetap', '2019-01-01', 'SK02193013111');

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
  `spesialis` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, 'ADMUSR1', 'Sarah Nur Laila', 0, 'sarah@email.com', '21232f297a57a5a743894a0e4a801fc3', 'aktif', '1'),
(2, 'ADMMR1', 'Luthfi Abdillah', 0, 'lutfhi@email.com', '21232f297a57a5a743894a0e4a801fc3', 'aktif', '2'),
(3, 'ADMMR2', 'Jaka Nurmanto', 0, 'janur@email.com', '21232f297a57a5a743894a0e4a801fc3', 'aktif', '2'),
(4, 'DR-012', 'dr. Wijaya, Sp.PD', 0, 'wijaaydr@rmail.com', '21232f297a57a5a743894a0e4a801fc3', 'aktif', '3'),
(5, 'DR-345', 'dr. Sisca sari', 0, 'siscasari@rmail.com', '21232f297a57a5a743894a0e4a801fc3', 'aktif', '3'),
(6, 'DR-245', 'dr. Maulani, Sp.OG', 0, 'dr_nay@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'aktif', '3'),
(7, 'DR-215', 'dr. Yasmin, Sp.B', 0, 'dr_yasmin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'aktif', '3'),
(8, 'PD-10', 'Yudho Agustian', 0, 'yudo@mail.com', '21232f297a57a5a743894a0e4a801fc3', 'aktif', '4'),
(9, 'PD-07', 'Riani Nurwidhi', 0, 'nurwidi@mail.com', '21232f297a57a5a743894a0e4a801fc3', 'aktif', '4'),
(10, 'admin', 'admin', 2147483647, 'administrator@rsss.com', '21232f297a57a5a743894a0e4a801fc3', 'aktif', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `perawatan`
--
ALTER TABLE `perawatan`
  ADD PRIMARY KEY (`id_perawatan`);

--
-- Indexes for table `rawat_inap`
--
ALTER TABLE `rawat_inap`
  ADD PRIMARY KEY (`id_rawat_inap`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `perawatan`
--
ALTER TABLE `perawatan`
  MODIFY `id_perawatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rawat_inap`
--
ALTER TABLE `rawat_inap`
  MODIFY `id_rawat_inap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
