-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2018 at 09:32 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_uid` varchar(256) COLLATE utf8_bin NOT NULL,
  `user_email` varchar(256) COLLATE utf8_bin NOT NULL,
  `user_pwd` varchar(256) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_uid`, `user_email`, `user_pwd`) VALUES
(5, 'Igor', 'ramoneiggy@gmail.com', '$2y$10$5YgaHrEBCmf87eJRUhj91eAe4DHUEciv.tJ370LWN5TnLQ3axtGBq'),
(6, 'marko', 'marko@gmail.com', '$2y$10$ZOfhK4l1gfn4WOtz2EoL9OJh42a.Jx.AE5hXkiUIUd6E7JQwflUmq'),
(7, 'Vjeverica', 'ramoneiggy@gmail.com', '$2y$10$AxkARLL/qGzpcMHAcCZ34.dWiAjGhDf9JtsOZVsxclgKcY/H6oIs.'),
(8, 'Ivo', 'ramoneiggy@gmail.com', '$2y$10$DxI80EO7DEdvWeS2KAu4leDh2MkwPi6muOOT8BKK91kfEMdpbpthy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
