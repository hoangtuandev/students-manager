-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2021 at 04:17 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ct237`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `all_students` ()  NO SQL
SELECT SV.mssv, SV.hoten, SV.sodienthoai, SV.ngaysinh, SV.gioitinh, SV.diachi, SV.makhoa, D.Diem
FROM SinhVien SV 
JOIN Diem D ON SV.mssv = D.mssv
ORDER BY mssv ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `college_student` (IN `maKhoa` VARCHAR(10))  NO SQL
SELECT SV.mssv, SV.hoten, SV.sodienthoai, SV.ngaysinh, SV.gioitinh, SV.diachi, SV.makhoa, D.Diem
FROM SinhVien SV 
JOIN Diem D ON SV.mssv = D.mssv
    WHERE SV.makhoa REGEXP maKhoa or SV.makhoa LIKE maKhoa 
    ORDER BY mssv ASC$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `count_student` () RETURNS INT(11) NO SQL
RETURN (SELECT Count(SV.mssv) AS TongSV FROM sinhvien SV)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `diem`
--

CREATE TABLE `diem` (
  `mssv` varchar(8) NOT NULL,
  `Diem` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diem`
--

INSERT INTO `diem` (`mssv`, `Diem`) VALUES
('B1708361', 3.6),
('B1801234', 2.9),
('B1805743', 1.58),
('B1809205', 3.23),
('B1809876', 1.54),
('B1814794', 1.58),
('B1904567', 2.19),
('B1907891', 3.19),
('B1913579', 3.55),
('B1914681', 3.8),
('B2006782', 1.12),
('B2016321', 2.56);

-- --------------------------------------------------------

--
-- Table structure for table `khoa`
--

CREATE TABLE `khoa` (
  `makhoa` varchar(10) NOT NULL,
  `tenkhoa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khoa`
--

INSERT INTO `khoa` (`makhoa`, `tenkhoa`) VALUES
('cntt&tt', 'C??ng ngh??? th??ng tin v?? Truy???n Th??ng'),
('kl', 'Lu???t'),
('kt', 'Kinh t???'),
('xhnv', 'X?? h???i nh??n v??n');

-- --------------------------------------------------------

--
-- Table structure for table `sinhvien`
--

CREATE TABLE `sinhvien` (
  `mssv` varchar(8) NOT NULL,
  `hoten` varchar(50) NOT NULL,
  `sodienthoai` varchar(10) DEFAULT NULL,
  `ngaysinh` date DEFAULT NULL,
  `gioitinh` varchar(5) DEFAULT NULL,
  `diachi` varchar(100) DEFAULT NULL,
  `makhoa` varchar(10) NOT NULL
) ;

--
-- Dumping data for table `sinhvien`
--

INSERT INTO `sinhvien` (`mssv`, `hoten`, `sodienthoai`, `ngaysinh`, `gioitinh`, `diachi`, `makhoa`) VALUES
('B1708361', 'L??m Th??? Ki???u Di???m', '0501234567', '1999-03-26', 'N???', 'A2 KTXA ?????i h???c C???n Th??', 'kt'),
('B1801234', 'Nguy???n Th??? Th??y Trinh', '0901234567', '2000-12-26', 'N???', '234A Tr???n H??ng ?????o Ninh Ki???u C???n Th??', 'cntt&tt'),
('B1805743', 'Nguy???n Thanh Thi???n', '0881234567', '2000-02-01', 'Nam', 'A857/A3 L?? Lai Ninh Ki???u C???n Th??', 'kl'),
('B1809205', 'Ph???m Ho??ng Tu???n', '0707730850', '2000-07-28', 'Nam', 'C166D Tr???n V??n Ho??i Ninh Ki???u C???n Th??', 'cntt&tt'),
('B1809876', 'Tr????ng Minh T??m', '0301234567', '2000-06-06', 'Nam', 'C3 KTXA ?????i h???c C???n Th??', 'kt'),
('B1904567', 'Cao  M??? H????ng', '0123498650', '2001-07-06', 'N???', 'B45A B??nh Minh V??nh Long', 'kt'),
('B1907891', 'Ph???m Th??? M??? Linh', '0223498650', '2001-06-12', 'N???', 'KTXA ?????i h???c C???n Th??', 'cntt&tt'),
('B1913579', 'Nguy???n Ph?????c Nh??n', '0801234567', '2001-05-25', 'Nam', 'A456B Nguy???n V??n Linh C??i R??ng C???n Th??', 'xhnv'),
('B1914681', 'D????ng Th??? C???m Ti??n', '0601234567', '2000-07-04', 'N???', 'A123 Nguy???n V??n Linh C??i R??ng C???n Th??', 'xhnv'),
('B2006782', 'Nguy???n B???i Sang', '0408631537', '2002-03-07', 'N???', 'E567 M???c Thi??n T??ch Ninh Ki???u C???n Th??', 'cntt&tt'),
('B2016321', 'Nguy???n H???u Minh Thy', '0702143657', '2002-09-19', 'N???', 'A123 H??a B??nh Ninh Ki???u C???n Th??', 'xhnv');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `ID` int(11) NOT NULL,
  `tendangnhap` varchar(30) NOT NULL,
  `matkhau` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`ID`, `tendangnhap`, `matkhau`) VALUES
(1, 'B1809205', 'tuan'),
(2, 'Nhi', 'nhi123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diem`
--
ALTER TABLE `diem`
  ADD PRIMARY KEY (`mssv`,`Diem`);

--
-- Indexes for table `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`makhoa`);

--
-- Indexes for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`mssv`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
