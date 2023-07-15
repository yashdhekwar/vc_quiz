-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2023 at 08:42 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `question_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `cid` int(40) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` int(20) NOT NULL,
  `password` int(10) NOT NULL,
  `regDate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `moduleid` int(30) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`moduleid`, `description`) VALUES
(1, 'HTML'),
(2, 'CSS');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `qid` int(30) NOT NULL,
  `questions` varchar(500) NOT NULL,
  `opt1` varchar(200) NOT NULL,
  `opt2` varchar(200) NOT NULL,
  `opt3` varchar(200) NOT NULL,
  `opt4` varchar(200) NOT NULL,
  `ans` varchar(250) NOT NULL,
  `moduleid` int(30) NOT NULL,
  `explaination` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`qid`, `questions`, `opt1`, `opt2`, `opt3`, `opt4`, `ans`, `moduleid`, `explaination`) VALUES
(1, 'RAM is referred to as ------', 'Primary\nStorage', 'Secondary\nStorage', 'All of these', 'None of these', 'Primary\nStorage', 1, 'aa'),
(2, 'Storage devices are hardware that reads data and programs from storage media.', 'TRUE', 'FALSE', '', '', 'TRUE', 0, ''),
(3, 'Following are the file compression programs, EXCEPT', 'Win Zip', 'RAID', 'Win RAR', 'PKZIP', 'RAID', 0, ''),
(4, '  How can we change the background color of an ele', 'background-color', 'color', 'both A and B', 'none of the above', 'a', 2, ''),
(5, 'A CD-ROM means CD-RW.', 'True', 'False', '', '', 'False', 0, ''),
(6, 'A CD-R stands for CD-Recordable.', 'True', 'False', '', '', 'True', 0, ''),
(7, 'what is the full form of css? ', 'Cascading Style Sheet ', 'Color style sheet ', 'Cascading style store', 'Canvas style store', '1', 2, ''),
(8, 'What is the full form of HTML ?', 'Hyper Text Markup Language', 'High Text Language', 'Hyper Text Makeup Language', 'High Text Makeup Language', '1', 1, 'afad'),
(9, 'A CD-RW stands for CD-Regional.', 'TRUE', 'FALSE', '', '', 'FALSE', 0, ''),
(10, 'RAM is also known as Primary Storage.', 'TRUE', 'FALSE', '', '', 'TRUE', 0, ''),
(11, 'RAM is also known as ROM', 'TRUE', 'FALSE', '', '', 'FALSE', 0, ''),
(12, 'Following are the high capacity disks, EXCEPT', 'Zip Disk', 'HiFD Disks', 'Super Disk', 'Drivers', 'Drivers', 0, ''),
(13, 'Internal Hard Disk or Fixed Disk is located inside the system unit.', 'TRUE', 'FALSE', '', '', 'TRUE', 0, ''),
(14, 'Optical Disks use laser technology to provide high capacity storage.', 'TRUE', 'FALSE', '', '', 'TRUE', 0, ''),
(15, 'Floppy Disks use laser technology to provide high capacity storage.', 'TRUE', 'FALSE', '', '', 'FALSE', 0, ''),
(16, 'DVD stands for Digital Versatile Disc.', 'TRUE', 'FALSE', '', '', 'TRUE', 0, ''),
(17, 'Flash Memory Cards are credit card sized solid-state storage devices, which are\nwidely used in notebook computers.', 'TRUE', 'FALSE', '', '', 'TRUE', 0, ''),
(18, '?????????????is the process of saving information to the secondary storage device.', 'Reading', 'Listening', 'Writing', 'None of these', 'Writing', 0, ''),
(19, 'Writing is the process of saving information to the secondary storage device.', 'TRUE', 'FALSE', '', '', 'TRUE', 0, ''),
(20, '?????????is the process of accessing information from a secondary storage device.', 'Reading', 'Listening', 'Writing', 'None of these', 'Reading', 0, ''),
(21, 'Reading is the process of accessing information from a secondary storage\ndevice.', 'TRUE', 'FALSE', '', '', 'TRUE', 0, ''),
(22, 'Which of the following is not a portable storage devices', 'Floppy disk', 'Pen drive', 'Hard disk', 'Optical disk', 'Hard disk', 0, ''),
(23, 'There are three basic types of DVDs, EXCEPT', 'Read Only', 'Write Once', 'Blu-Ray', 'Rewriteable', 'Blu-Ray', 0, ''),
(24, 'The actual physical material that holds the data and programs in a storage\ndevice is called as?.', 'media.', 'sequential\nstorage.', 'direct storage.', 'storage\ndevices.', 'media.', 0, ''),
(25, 'An internal hard disk is a Mylar platter covered with magnetic media and\nencased in either a hard or soft plastic cover.', 'TRUE', 'FALSE', '', '', 'FALSE', 0, ''),
(26, 'Optical disc storage devices have no moving parts.', 'TRUE', 'FALSE', '', '', 'FALSE', 0, ''),
(27, 'Floppy disks are removable storage media.', 'TRUE', 'FALSE', '', '', 'TRUE', 0, ''),
(28, 'A CD-ROM stands for', 'Compact Disc Read Only Memory', 'Compact Disc Read Once Memory', 'CD-RW', 'None of these', 'Compact Disc Read Only Memory', 0, ''),
(29, 'A CD-R stands for', 'CD-\nRecordable', 'CD- Runner', 'CD-Receiver', 'None of these', 'CD-\nRecordable', 0, ''),
(30, 'A CD-RW disk', 'CD-\nRewriteable', 'CD-\nRecordable', 'CD-ROM', 'None of these', 'CD-\nRewriteable', 0, ''),
(31, 'Primary Storage is volatile.', 'TRUE', 'FALSE', '', '', 'TRUE', 0, ''),
(32, 'Secondary storage is nonvolatile.', 'TRUE', 'FALSE', '', '', 'TRUE', 0, ''),
(33, 'A         is a concentric ring.', 'Track', 'Sectors', 'Round', 'None of these', 'Track', 0, ''),
(34, 'Each track is divided into wedge-shaped sections called -----', 'Track', 'Sectors', 'Round', 'None of these', 'Sectors', 0, ''),
(35, 'Each track is divided into wedge-shaped sections called Sectors.', 'TRUE', 'FALSE', '', '', 'TRUE', 0, ''),
(36, '3 1/2 floppy disc capacity is-', '1.44 MB', '1 MB', '1.66 MB', '1.55 MB', '1.44 MB', 0, ''),
(37, '?????????are removable storage devices used to store massive amounts of\ninformation.', 'Hard-disk\npacks', 'Floppy Disk', 'CD', 'None of these', 'Hard-disk\npacks', 0, ''),
(38, 'Hard Disk Packs are removable storage devices used to store massive amounts\nof information.', 'TRUE', 'FALSE', '', '', 'TRUE', 0, ''),
(39, 'Which of these is not a file compression program ?', 'Win Zip', 'PKZip', 'Win RAR', 'RAID', 'RAID', 0, ''),
(40, 'Following are the file compression programs, EXCEPT', 'Win Zip', 'RAID', 'Win RAR', 'None of these', 'RAID', 0, ''),
(41, 'A track on a disk is the one of the many circular ring shaped areas where data is\nwritten magnetically.', 'TRUE', 'FALSE', '', '', 'TRUE', 0, ''),
(42, 'A             on a disk is the one of the many circular ring shaped areas where data\nis written magnetically', 'Oval', 'Rectangle', 'Track', 'None of these', 'Track', 0, ''),
(43, 'What is the name given to a part of circle on which data is written in a storage\nmedia ?', 'Track', 'Sector', 'Cylinder', 'Spiral', 'Sector', 0, ''),
(44, 'Floppy disks are removable storage media', 'TRUE', 'FALSE', '', '', 'TRUE', 0, ''),
(45, '???????????????????disks have a 120 MB storage capacity and the drives are also able to\nread and store data on a standard 3', 'Super Disks', 'HiFD Disks', 'Zip Disks', 'None of these', 'Super Disks', 0, ''),
(46, 'A CD-ROM means CD-RW', 'TRUE', 'FALSE', '', '', 'FALSE', 0, ''),
(47, 'A CD-R stands for CD-Recordable', 'TRUE', 'FALSE', '', '', 'TRUE', 0, ''),
(48, 'A CD-R stands for CD-Regional', 'TRUE', 'FALSE', '', '', 'FALSE', 0, ''),
(49, 'A CD-RW stands for CD-Regional', 'TRUE', 'FALSE', '', '', 'FALSE', 0, ''),
(50, 'RAM is sometimes referred to as ------', 'Primary\nStorage', 'Secondary\nStorage', 'All of these', 'None of these', 'Primary\nStorage', 0, ''),
(51, 'RAM is sometimes referred to as Primary Storage', 'TRUE', 'FALSE', '', '', 'TRUE', 0, ''),
(52, 'RAM is sometimes referred to as ROM', 'TRUE', 'FALSE', '', '', 'TRUE', 0, ''),
(53, 'The traditional floppy disk is the 1', 'TRUE', 'FALSE', '', '', 'TRUE', 0, ''),
(54, 'The traditional floppy disk is the 640 MB 5', 'TRUE', 'FALSE', '', '', 'FALSE', 0, ''),
(55, 'The 2HD on a disk label means', 'Two Side, Low Density', 'Two Side, High Density', 'One Side, High Density', 'None of these', 'Two Side, High Density', 0, ''),
(56, 'The 2HD on a disk label means Two Side, High Density', 'TRUE', 'FALSE', '', '', 'TRUE', 0, ''),
(57, 'A         is a concentric ring', 'Track', 'Sectors', 'Round', 'None of these', 'Track', 0, ''),
(58, 'High capacity disks also known as floppy disk cartridges are rapidly replacing the\ntraditional floppy disk.', 'TRUE', 'FALSE', '', '', 'TRUE', 0, ''),
(59, '?????????are removable storage devices used to store massive amounts of\ninformation', 'Hard-disk\npacks', 'Floppy Disk', 'CD', 'None of these', 'Hard-disk\npacks', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `cid` int(15) NOT NULL,
  `datetime` date NOT NULL,
  `moduleid` int(15) NOT NULL,
  `score` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `loginId` varchar(30) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `role` varchar(10) NOT NULL,
  `Pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`loginId`, `uname`, `role`, `Pass`) VALUES
('laxman', 'Laxman Raghuwanshi', 'A', 'pass'),
('ram', 'Ram Raje', 'A', 'pass');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`moduleid`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`loginId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `cid` int(40) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `moduleid` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `qid` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `cid` int(15) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
