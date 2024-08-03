-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2024 at 07:37 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kangpha`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(5) NOT NULL COMMENT 'คีย์หลักผู้ดูเเละระบบ',
  `a_name` varchar(50) NOT NULL COMMENT 'ชื่อสกุลผู้ดูเเลระบบ',
  `a_positsion` varchar(100) NOT NULL COMMENT 'ตำเเหน่ง',
  `a_adr` text NOT NULL COMMENT 'ที่อยู่',
  `a_tell` varchar(10) NOT NULL COMMENT 'เบอร์โทร',
  `a_username` varchar(10) NOT NULL COMMENT 'ชื่อเข้าระบบ',
  `a_password` varchar(32) NOT NULL COMMENT 'รหัสผ่าน',
  `c_id` int(5) NOT NULL COMMENT 'คีย์นอกตารางคลาสรูม',
  `a_level` varchar(1) NOT NULL COMMENT 'ระดับผู้ใช้งาน',
  `a_name_en` varchar(50) NOT NULL COMMENT 'ชื่อสกุลอังกฤษ',
  `a_upload` varchar(25) NOT NULL COMMENT 'รูปภาพ',
  `a_title` varchar(10) NOT NULL COMMENT 'คำนำหน้าชื่อ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_name`, `a_positsion`, `a_adr`, `a_tell`, `a_username`, `a_password`, `c_id`, `a_level`, `a_name_en`, `a_upload`, `a_title`) VALUES
(2, 'นางสาวกัญญาภัค ผิวทอง', 'ครู', 'จังหวัด นครพนม', '01145687', 'spy', '81dc9bdb52d04dc20036dbd8313ed055', 6, 't', 'Kanyaphak Phiwthong', '20240722298258488.jpg', 'นางสาว'),
(18, 'นายกวินภพ นามวงษ์', 'ชำนาญการคอม', '         เลย หนองคาย', '0886301641', 'kim', '81dc9bdb52d04dc20036dbd8313ed055', 6, 'a', 'Kawinpop Namwong', '202407221001552360.jpg', 'นาย'),
(20, 'นางสาววนิดา ชัยศรี', 'ครูชำนาญการไอที', '   เลย 42000', '0869458633', 'pair', '81dc9bdb52d04dc20036dbd8313ed055', 11, 't', 'Wanida chaisri', '20240722335673290.jpg', 'นางสาว'),
(24, 'นางสาวจุฑามณี บุตรโคตร', 'ครูชำนาญการพิเศษ', '   135/8 บ้านมีชัย ตำบลมีชัย อำเภอเมืองหนองคาย จังหวัดหนองคาย', '0956325677', 'copter', '81dc9bdb52d04dc20036dbd8313ed055', 6, 't', 'Jutamanee Butkhot', '202407221537222338.jpg', 'นางสาว'),
(26, 'นายก้องภพ คงใจดี', 'ครูชำนาญการสังคม', 'ffff', '0887695522', 'kong', '827ccb0eea8a706c4c34a16891f84e7b', 3, 't', 'kongpob khongjaidee', '202407261698239368.png', 'นาย');

-- --------------------------------------------------------

--
-- Table structure for table `classroom`
--

CREATE TABLE `classroom` (
  `c_id` int(5) NOT NULL COMMENT 'คีย์หลักชั้นเรียน',
  `c_name` varchar(20) NOT NULL COMMENT 'ชื่อชั้นเรียน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `classroom`
--

INSERT INTO `classroom` (`c_id`, `c_name`) VALUES
(3, 'ป.1/3'),
(4, 'ป. 2/1'),
(5, 'ป. 6/2'),
(6, 'ป.6/11'),
(10, 'ป.2/5'),
(11, 'ป.6/7'),
(12, 'ป.3/5'),
(13, 'ป.1/9');

-- --------------------------------------------------------

--
-- Table structure for table `graduate`
--

CREATE TABLE `graduate` (
  `grad_id` int(5) NOT NULL COMMENT 'คีย์หลักนักเรียนที่จบการศึกษา',
  `grad_title` varchar(10) NOT NULL COMMENT 'คำนำหน้า',
  `grad_name` varchar(50) NOT NULL COMMENT 'ชื่อสกุลนักเรียนที่จบ',
  `grad_name_en` varchar(50) NOT NULL COMMENT 'ชื่อสกุลภาษาอังกฤษ',
  `grad_end` varchar(10) NOT NULL COMMENT 'นักเรียนที่จบการศึกษาเเละไม่ศึกษาต่อ',
  `grad_gender` varchar(10) NOT NULL COMMENT 'เพศ',
  `grad_card` varchar(13) NOT NULL COMMENT 'รหัสประจำตัวประชาชน',
  `grad_number` varchar(10) NOT NULL COMMENT 'รหัสประจำตัวนักเรียน',
  `grad_year` varchar(5) NOT NULL COMMENT 'ปีการศึกษาที่จบ',
  `grad_birthday` varchar(10) NOT NULL COMMENT 'วันเดือนปีเกิด',
  `grad_adr` text NOT NULL COMMENT 'ที่อยู่ปัจจุบัน',
  `grad_parents` varchar(50) NOT NULL COMMENT 'ชื่อบิดามารดา',
  `grad_upload` varchar(25) NOT NULL COMMENT 'อัพโหลดรูปภาพ',
  `a_id` int(5) NOT NULL COMMENT 'คีย์นอกผู้ดูเเลระบบ',
  `c_id` int(5) NOT NULL COMMENT 'คีย์นอกตารางคลาสรูม',
  `std_id` int(5) NOT NULL COMMENT 'คีย์นอกนักเรียน',
  `grad_username` varchar(10) NOT NULL COMMENT 'ชื่อเข้าระบบ',
  `grad_password` varchar(32) NOT NULL COMMENT 'รหัสผ่าน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `std_id` int(5) NOT NULL COMMENT 'คีย์หลักนักเรียน',
  `std_name` varchar(50) NOT NULL COMMENT 'ชื่อสกุลนักเรียน',
  `std_name_en` varchar(50) NOT NULL COMMENT 'ชื่อสกุลภาษาอังกฤษ',
  `std_number` varchar(10) NOT NULL COMMENT 'รหัสประจำตัวนักเรียน',
  `std_card` varchar(13) NOT NULL COMMENT 'รหัสประจำตัวประชาชน',
  `std_adr` text NOT NULL COMMENT 'ที่อยู่',
  `std_parents` varchar(50) NOT NULL COMMENT 'ชื่อบิดามารดา',
  `std_gender` varchar(10) NOT NULL COMMENT 'เพศ',
  `std_birthday` varchar(10) NOT NULL COMMENT 'วันเดือนปีเกิด',
  `std_username` varchar(10) NOT NULL COMMENT 'ชื่อเข้าระบบ',
  `std_password` varchar(32) NOT NULL COMMENT 'รหัสผ่าน',
  `a_id` int(5) NOT NULL COMMENT 'คีย์นอกผู้ดูเเลระบบ\r\n',
  `c_id` int(5) NOT NULL COMMENT 'คีย์นอกตารรางคลาสรูม',
  `std_title` varchar(10) NOT NULL COMMENT 'คำนำหน้าชื่อ',
  `std_upload` varchar(25) NOT NULL COMMENT 'อัพโหลดรูปภาพ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='student';

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`std_id`, `std_name`, `std_name_en`, `std_number`, `std_card`, `std_adr`, `std_parents`, `std_gender`, `std_birthday`, `std_username`, `std_password`, `a_id`, `c_id`, `std_title`, `std_upload`) VALUES
(17, 'อรรถพล กะวิวังสกุล', 'Autthapul Kaewpipop', '23655', '1439900425668', '512/2 หมู่ 13 เทศบาลเมืองเลย 42000', 'จตุพงษ์ กะวิวังสกุล', 'm', '2021-02-14', 'somkid', '81dc9bdb52d04dc20036dbd8313ed055', 2, 3, 'เด็กชาย', '202407221465557912.jpg'),
(21, 'อรรถพล สอนสุภาพ', 'Attaphon Sonsuphap', '23644', '1469982366', '25/6 บ้านธาตุพนม อำเภอเรณู จังหวัดนครพนม', 'นางบุ๊ค ใจภัคดี', 'm', '2013-01-06', 'wisa', '81dc9bdb52d04dc20036dbd8313ed055', 2, 11, 'เด็กชาย', '202407221837135359.jpg'),
(22, 'ยศวริต พิตีด', 'yotwarit Phiteed', '23655', '1436699562', 'บ้านพัฒนา ตำบลพัฒนา จังหวัดบึงกาฬ', 'นางท้องฟ้า พิตีด', 'm', '2000-10-24', 'bird', '81dc9bdb52d04dc20036dbd8313ed055', 24, 4, 'เด็กชาย', '202407221320163759.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `classroom`
--
ALTER TABLE `classroom`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `graduate`
--
ALTER TABLE `graduate`
  ADD PRIMARY KEY (`grad_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`std_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'คีย์หลักผู้ดูเเละระบบ', AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `classroom`
--
ALTER TABLE `classroom`
  MODIFY `c_id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'คีย์หลักชั้นเรียน', AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `graduate`
--
ALTER TABLE `graduate`
  MODIFY `grad_id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'คีย์หลักนักเรียนที่จบการศึกษา';

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `std_id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'คีย์หลักนักเรียน', AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
