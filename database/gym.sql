-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 21, 2022 at 12:33 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `coaches`
--

CREATE TABLE `coaches` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile` int(50) NOT NULL,
  `E_mail` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coaches`
--

INSERT INTO `coaches` (`id`, `name`, `mobile`, `E_mail`, `gender`, `date`) VALUES
(1, 'moamed maher', 114982654, 'moamen@gmail.com', 'male', '2022-08-01'),
(1, 'moamen maher', 114982654, 'moamen@gmail.com', 'male', '2022-08-01'),
(1245562, 'informa', 5489999, 'informa@gmail.com', 'male', '2022-08-02'),
(200, 'mido power', 124563245, 'midopower@gmail.com', 'male', '2022-08-04'),
(252356, 'coach', 1245678896, 'coach@gmail.com', 'male', '2022-07-02');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `Email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Email`, `pass`) VALUES
('admin@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile` int(50) NOT NULL,
  `e_mail` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `mobile`, `e_mail`, `gender`, `price`, `date`) VALUES
(500, 'Khaled A Mohsen', 1023981687, 'khaled.amohsen0@gmail.com', 'male', 500, '2022-07-01'),
(501, 'hassan ', 114982654, 'hassan@gmail.com', 'male', 550, '2020-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(50) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `name`, `email`, `phone`, `message`) VALUES
(1, 'Khaled A Mohsen', 'khaled.amohsen0@gmail.com', 1023981687, 'hey, there'),
(15, 'Khaled Abd Elmohsen ', 'khaledmohsen@gmail.com', 545555555, 'hi'),
(16, 'khalid walid', 'admin@gmail.com', 152475869, 'can i speak to a coach?'),
(19, 'khalid walid', 'khalid_walid@gmail.com', 2147483647, 'hello..!'),
(20, 'khalid walid', 'khalid_walid@gmail.com', 2147483647, 'hello!'),
(21, 'mohsen', 'mohsen@gmail.com', 1023981687, 'i need a coach!'),
(23, 'ahmed', 'ahmed@gmail.com', 12456845, 'jl;dvadjk;vn'),
(24, 'ahmed', 'mohamed@gmail.com', 1245634455, 'cjklbkjcklbcbjkd'),
(25, 'user', 'user@gmail.com', 123698547, 'i need a coach');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
