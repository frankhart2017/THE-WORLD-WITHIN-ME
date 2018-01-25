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
-- Table structure for table `studentreg`
--

CREATE TABLE `studentreg` (
  `id` int(11) NOT NULL,
  `regno` varchar(16) NOT NULL,
  `sname` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `registered` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentreg`
--

INSERT INTO `studentreg` (`id`, `regno`, `sname`, `email`, `password`, `registered`) VALUES
(1, 'RA1611003010876', 'Siddhartha Dhar Choudhury', 'sdharchou@gmail.com', '2414aa57cd59e1db4c5b5fbdb8a0bd2e3ed0a2dc39f34ce11aa03cd6bf3642e43c95560750def5e5a20efab3c1d472cc641ed03911cd8518f6cca369ed6c5473', 1),
(2, 'RA1611003010884', 'Rushil Gupta', 'rgupta@gmail.com', 'c27a73429100722c2afe9a545fb203592e046dbf384498297cf1b3496947eb035435e7175d9335cca01bad4ecd26dde7fc0f53919272e3e8ea7495ac049335c5', 1),
(3, 'RA1611003010760', 'Random Person', 'rgupta@gmail.com', 'c27a73429100722c2afe9a545fb203592e046dbf384498297cf1b3496947eb035435e7175d9335cca01bad4ecd26dde7fc0f53919272e3e8ea7495ac049335c5', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `studentreg`
--
ALTER TABLE `studentreg`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `studentreg`
--
ALTER TABLE `studentreg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
