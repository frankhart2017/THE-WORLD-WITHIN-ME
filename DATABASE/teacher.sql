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
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `tname` text NOT NULL,
  `tid` varchar(6) NOT NULL,
  `batch` int(11) NOT NULL,
  `course` text NOT NULL,
  `subcode` text NOT NULL,
  `slot` text NOT NULL,
  `do` text NOT NULL,
  `hour` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `tname`, `tid`, `batch`, `course`, `subcode`, `slot`, `do`, `hour`) VALUES
(1, 'K Subramanyam', '100342', 2, 'German Language I', '15LE201E', 'D', '1 4', '10 1'),
(2, 'E Sujatha', '100440', 2, 'Probability and Queuing Theory', '15MA207', 'A', '1 2 5', '6-7 5  8'),
(3, 'D Vanusha', '101357', 2, 'Computer System Architechture', '15CS203', 'C', '3 4', '6-7 4'),
(4, 'D Vanusha', '101357', 2, 'Digital System Design', '15CS202', 'B', '1 4', '6-7 4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
