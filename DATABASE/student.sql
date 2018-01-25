-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: shareddb-f.hosting.stackcp.net
-- Generation Time: Jan 25, 2018 at 08:49 AM
-- Server version: 10.1.14-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `frankhartpoem-3236f558`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `sname` text NOT NULL,
  `reg` varchar(16) NOT NULL,
  `tid` int(11) NOT NULL,
  `batch` int(11) NOT NULL,
  `slot` text NOT NULL,
  `subcode` text NOT NULL,
  `otp` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `sname`, `reg`, `tid`, `batch`, `slot`, `subcode`, `otp`, `time`) VALUES
(1, 'Siddhartha Dhar Choudhury', 'RA1611003010876', 100342, 2, 'D', '15LE201E', '', '2017-11-22 13:10:55'),
(2, 'Shashank Pandey', 'RA1611003010984', 100440, 1, 'A', '15MA207', '', '2017-11-11 13:55:28'),
(3, 'Rushil Gupta', 'RA1611003010884', 101357, 2, 'C', '15CS203', '', '2017-11-16 10:59:16'),
(4, 'Some Person', 'RA1611003010760', 100342, 2, 'D', '15LE201', '', '2017-11-22 08:51:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
