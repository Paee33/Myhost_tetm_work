-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2024 at 09:50 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `work_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `line_token`
--

CREATE TABLE `line_token` (
  `id` int(6) NOT NULL,
  `line_token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `line_token`
--

INSERT INTO `line_token` (`id`, `line_token`) VALUES
(1, 'vjSSYVrro2AiNHwEtozKD7f0iSNY5NLwAQz1nDod7vb');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pdf`
--

CREATE TABLE `tbl_pdf` (
  `id` int(11) NOT NULL,
  `doc_name` varchar(200) NOT NULL COMMENT 'ชื่อเอกสาร',
  `doc_file` varchar(100) NOT NULL COMMENT 'ชื่อไฟล์เอกสาร',
  `dateCreate` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'วันที่เพิ่มเอกสาร'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_pdf`
--

INSERT INTO `tbl_pdf` (`id`, `doc_name`, `doc_file`, `dateCreate`) VALUES
(39, 'ธุรการ / Assistant Clerical Officer', 'รายละเอียดสมัครงานธุรการ.pdf', '2024-01-17 17:24:20'),
(40, 'ไอทีซัพพอร์ต / IT Support ', 'รายละเอียดสมัครงาน-ITsupport.pdf', '2024-01-17 17:25:33'),
(41, 'การตลาด / Marketing', 'รายละเอียดสมัครงานMarketing1.pdf', '2024-01-17 17:25:41'),
(42, 'โปรแกรมเมอร์ / Programmer', 'รายละเอียดงานProgrammer.pdf', '2024-01-17 17:25:54');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_ad` int(6) NOT NULL COMMENT 'ไอดี',
  `ad_titlename` varchar(255) NOT NULL COMMENT 'คำนำหน้า',
  `ad_name` varchar(255) NOT NULL COMMENT 'ชื่อ',
  `ad_surname` varchar(255) NOT NULL COMMENT 'นามสกุล',
  `ad_position` varchar(255) NOT NULL COMMENT 'ตำแหน่ง',
  `ad_phone` varchar(10) NOT NULL COMMENT 'เบอร์โทรติดต่อ',
  `username` varchar(255) NOT NULL COMMENT 'Username',
  `password` int(128) NOT NULL COMMENT 'Password'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_ad`, `ad_titlename`, `ad_name`, `ad_surname`, `ad_position`, `ad_phone`, `username`, `password`) VALUES
(1, 'นาย', 'ฟายซอล', 'วามะ', 'นศ.ฝึกงาน', '0988845123', 'sun12@gmail.com', 12345),
(3, 'นาย', 'อาดือนันท์', 'สาเม๊าะ', 'ธุรการ', '0887887799', 'nan_9@gmail.com', 7777);

-- --------------------------------------------------------

--
-- Table structure for table `tb_apply`
--

CREATE TABLE `tb_apply` (
  `id_user` int(3) UNSIGNED ZEROFILL NOT NULL,
  `img` varchar(255) NOT NULL COMMENT 'รูป',
  `card_number` varchar(13) NOT NULL,
  `card_exp` varchar(255) NOT NULL,
  `title_name` varchar(255) NOT NULL COMMENT 'คำนำหน้า',
  `name` varchar(255) NOT NULL COMMENT 'ชื่อ',
  `surname` varchar(255) NOT NULL COMMENT 'นามสกุล',
  `gender` varchar(255) NOT NULL COMMENT 'เพศ',
  `age` int(10) NOT NULL COMMENT 'อายุ',
  `birth_day` varchar(255) NOT NULL,
  `race` varchar(255) NOT NULL COMMENT 'เชื้อชาติ',
  `nationality` varchar(255) NOT NULL COMMENT 'สัญชาติ',
  `religion` varchar(255) NOT NULL COMMENT 'ศาสนา',
  `phone` varchar(10) NOT NULL COMMENT 'เบอร์โทร',
  `person` varchar(255) NOT NULL COMMENT 'สถานภาพ',
  `license` varchar(255) NOT NULL COMMENT 'ใบอนุญาติขับขี่',
  `typecar` varchar(255) NOT NULL COMMENT 'ประเภทใบอนุญาติขับขี่',
  `soldier` varchar(255) NOT NULL COMMENT 'สถานะทางทหาร',
  `education` varchar(255) NOT NULL COMMENT 'การศึกษาสูงสุด',
  `branch` varchar(255) NOT NULL COMMENT 'สาขา',
  `board` varchar(255) NOT NULL COMMENT 'คณะ',
  `institute` varchar(255) NOT NULL COMMENT 'สถาบัน',
  `position` varchar(255) NOT NULL COMMENT 'ตำแหน่งที่สนใจ',
  `house_card` varchar(255) NOT NULL COMMENT 'บ้านเลขที่บัตรปชช',
  `swine_card` varchar(255) NOT NULL COMMENT 'หมู่ที่',
  `alley_card` varchar(255) NOT NULL,
  `road_card` varchar(255) NOT NULL,
  `district_card` varchar(255) NOT NULL,
  `prefecture_card` varchar(255) NOT NULL,
  `province_card` varchar(255) NOT NULL,
  `code_card` varchar(6) NOT NULL,
  `house_number` varchar(255) NOT NULL,
  `swine` varchar(255) NOT NULL COMMENT 'หมู่ที่',
  `alley` varchar(255) NOT NULL,
  `road` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `prefecture` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `code` varchar(6) NOT NULL COMMENT 'รหัสไปรษณีย์',
  `experience` varchar(255) NOT NULL COMMENT 'ประสบการณ์การทำงาน',
  `company` varchar(255) NOT NULL COMMENT 'บริษัท',
  `rank` varchar(255) NOT NULL COMMENT 'ตำแหน่ง',
  `st_work` varchar(255) NOT NULL COMMENT 'วันที่เริ่ม',
  `end_work` varchar(255) NOT NULL COMMENT 'สิ้นสุด',
  `web` varchar(255) NOT NULL COMMENT 'Web/Facebook',
  `detail` varchar(255) NOT NULL COMMENT 'รายละเอียดงาน',
  `company_2` varchar(255) NOT NULL,
  `rank_2` varchar(255) NOT NULL,
  `start_work2` varchar(20) NOT NULL,
  `end_work2` varchar(20) NOT NULL,
  `web_2` varchar(255) NOT NULL,
  `detail_2` varchar(255) NOT NULL,
  `reason_2` varchar(255) NOT NULL,
  `company_3` varchar(255) NOT NULL,
  `rank_3` varchar(255) NOT NULL,
  `start_work3` varchar(20) NOT NULL,
  `end_work3` varchar(20) NOT NULL,
  `web_3` varchar(255) NOT NULL,
  `detail_3` varchar(255) NOT NULL,
  `reason_3` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL COMMENT 'สาเหตุที่ลาออก',
  `status` varchar(1) NOT NULL COMMENT '1=รอสัมภาษณ์,2=รับเข้าทำงาน,3=รอตรวจสอบ',
  `apply_time` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_apply`
--

INSERT INTO `tb_apply` (`id_user`, `img`, `card_number`, `card_exp`, `title_name`, `name`, `surname`, `gender`, `age`, `birth_day`, `race`, `nationality`, `religion`, `phone`, `person`, `license`, `typecar`, `soldier`, `education`, `branch`, `board`, `institute`, `position`, `house_card`, `swine_card`, `alley_card`, `road_card`, `district_card`, `prefecture_card`, `province_card`, `code_card`, `house_number`, `swine`, `alley`, `road`, `district`, `prefecture`, `province`, `code`, `experience`, `company`, `rank`, `st_work`, `end_work`, `web`, `detail`, `company_2`, `rank_2`, `start_work2`, `end_work2`, `web_2`, `detail_2`, `reason_2`, `company_3`, `rank_3`, `start_work3`, `end_work3`, `web_3`, `detail_3`, `reason_3`, `reason`, `status`, `apply_time`) VALUES
(220, 'n.png', '1988445544444', '20 มกราคม 2570', 'นาย', 'อาดือนันท์', 'สาเม๊าะ', 'ชาย', 22, '3 มีนาคม 2544', 'ไทย', 'ไทย', 'อิสลาม', '0611234567', 'โสด', 'ไม่มี', '', 'ยังไม่เกณฑ์ทหาร', 'ปริญญาตรี', 'วิทยาการคอมพิวเตอร์', 'วิทยาศาสตร์และเทคโนโลยี', 'มหาวิทยาลัยราชภัฏยะลา', 'ไอทีซัพพอร์ต / IT Support ', '86/7', '7', '-', '-', 'มะรือโบ', 'ระแงะ', 'นราธิวาส', '96140', '86/7', '7', '-', '-', 'มะรือโบ', 'ระแงะ', 'นราธิวาส', '96140', 'นักศึกษาฝึกงาน', 'บริษัทเซเว่น', 'ไอทีซัพพอร์ต', '2023-11-16', '2024-02-12', 'www.seven.com', 'ทำเกี่ยวกับการซ่อมคอม', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'นักศึกษาฝึกงาน', '3', '2024-02-16 06:22:24'),
(223, 'sun.png', '1984556111554', '2 มีนาคม 2575', 'นางสาว', 'ฟายซอล', 'วามะ', 'หญิง', 27, '27 มีนาคม 2530', 'ไทย', 'ไทย', 'พุทธ', '0899998888', 'โสด', 'ไม่มี', '', '', 'ปริญญาตรี', 'การตลาด', 'การจัดการ', 'มหาวิทยาลัยราชภัฏยะลา', 'การตลาด / Marketing', '96', '7', 'แตงไทย', 'แตงกวา', 'ชิงชิง', 'สะเดา', 'ตรัง', '90022', '96', '7', 'แตงไทย', 'แตงกวา', 'ชิงชิง', 'สะเดา', 'ตรัง', '90022', 'มีประสบการณ์ทำงาน', 'บริษัทสมาย', 'ไอทีซัพพอร์ต', '2024-02-01', '2024-02-14', 'www.smaile.com', 'ทำงานซ่อมคอม', 'บริษัทโฮมโฮม', 'การตลาด', '2024-01-25', '2024-02-05', 'www.homehome.com', 'ทำงานซ่อมคอม', 'อยากมีประสบการณ์ใหม่ๆ', '', '', '', '', '', '', '', 'อยากมีประสบการณ์ใหม่ๆ', '3', '2024-02-16 08:29:52'),
(225, 'สุภาวดี.png', '1598447755554', '25 มกราคม 2570', 'นางสาว', 'ใบเฟิร์น', 'พิมพ์ชนก', 'หญิง', 26, '17 มีนาคม 2530', 'ไทย', 'ไทย', 'อิสลาม', '0888988888', 'โสด', 'ไม่มี', '', '', 'ปริญญาตรี', 'การตลาด', 'การจัดการ', 'วิทยาลัยพาณิชยการ', 'การตลาด / Marketing', '57', '7', 'คลองเรียน2', 'คลองเรียน2', 'เมือง', 'หาดใหญ่', 'สงขลา', '90000', '57', '7', 'คลองเรียน2', 'คลองเรียน2', 'เมือง', 'หาดใหญ่', 'สงขลา', '90000', 'มีประสบการณ์ทำงาน', 'บริษัทใบใบ', 'การตลาด', '2021-02-16', '2024-02-05', 'www.baibai.com', 'ทำเกี่ยวกับการตลาด', 'บริษัทดีดี', 'การตลาด', '2023-01-16', '2023-12-16', 'www.deedee.com', 'ทำเกี่ยวกับการตลาด', 'อยากหาประสบการณ์ใหม่ๆ', '', '', '', '', '', '', '', 'อยากหาประสบการณ์ใหม่ๆ', '3', '2024-02-16 08:44:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `line_token`
--
ALTER TABLE `line_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pdf`
--
ALTER TABLE `tbl_pdf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_ad`);

--
-- Indexes for table `tb_apply`
--
ALTER TABLE `tb_apply`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `line_token`
--
ALTER TABLE `line_token`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_pdf`
--
ALTER TABLE `tbl_pdf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_ad` int(6) NOT NULL AUTO_INCREMENT COMMENT 'ไอดี', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_apply`
--
ALTER TABLE `tb_apply`
  MODIFY `id_user` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
