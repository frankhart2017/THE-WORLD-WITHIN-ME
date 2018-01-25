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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `file`) VALUES
(1, 'THE GRIEF WITHIN', 'grief.txt'),
(2, 'THE DAY SHE LEFT', 'left.txt'),
(3, 'THE LOST ME', 'lost.txt'),
(4, 'WHEN I CAN\'T WRITE', 'write.txt'),
(5, 'ONE PLEASANT EVENING IN A PARK', 'park.txt'),
(6, 'WHAT IS DEATH?', 'death.txt'),
(7, 'LIVING DEAD', 'dead.txt'),
(8, 'LONELY', 'lonely.txt'),
(9, 'LOVE NEVER DIES', 'love.txt'),
(10, 'A FRAGILE TREE', 'fragile.txt'),
(11, 'PULCHRITUDE OF THE SEPULCHRE', 'sepulchre.txt'),
(12, 'THE VALIANT ONE', 'valiant.txt'),
(13, 'YOU', 'you.txt'),
(14, 'HER', 'her.txt'),
(15, 'ESCAPE INTO THE WOODS', 'escape.txt'),
(16, 'HOPE', 'HOPE.txt');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
