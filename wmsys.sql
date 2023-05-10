-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2023 at 11:45 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wmsys`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `pass` varchar(300) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `name`, `pass`, `role`) VALUES
(1, 'testuser2@test.test', 'admin', '$2y$10$x4CWIjpNQBNaTCW7LIfmoOpU/kXbQlkdNFMrzspQOOluRyTJ848A.', 'admin'),
(4, 'cpt@test.test', 'Green captain', '$2y$10$J9P1Mn44loOiQZ5sCIgEh.HKhdTWra.rtJ.6taqc2mzAk6Ahki7KC', 'cpt');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(60) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `title`, `description`) VALUES
(1, 'test', 'add article 111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111'),
(2, 'test', 'add article 111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111'),
(3, 'test', 'add article 111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111'),
(4, 'test', 'add article 111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111'),
(5, 'test', 'add article 111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `pass`, `role`) VALUES
(6, 'test', 'testuser@test.test', '$2y$10$x4CWIjpNQBNaTCW7LIfmoOpU/kXbQlkdNFMrzspQOOluRyTJ848A.', 'gtf'),
(8, 'collector account', 'collector@test.test', '$2y$10$tiRscBYEkngEXKVpZOdGb.YpFx.RJAvK8TQs0/Gf0Kb.X7kCITXFW', 'userc'),
(9, 'test user', 'testuser1@test.test', '$2y$10$sTALELXinlpXSB1SPLHyhen.xCdOd/q/teY07jF65XYKvdokwPCDu', '');

-- --------------------------------------------------------

--
-- Table structure for table `waste_detection`
--

CREATE TABLE `waste_detection` (
  `id` int(11) NOT NULL,
  `waste_type` varchar(50) NOT NULL,
  `location` varchar(500) NOT NULL,
  `description` varchar(200) NOT NULL,
  `image` varchar(100) NOT NULL,
  `date_time` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `priority` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `waste_detection`
--

INSERT INTO `waste_detection` (`id`, `waste_type`, `location`, `description`, `image`, `date_time`, `status`, `user_email`, `priority`) VALUES
(5, 'organic,mixed,', 'https://goo.gl/maps/CyPaoXtHknCiEi3F9', 'test', 'note-19-1-figure-02-en.jpg', '1:19am ,\n Tuesday 9th May 2023', 'Completed', 'testuser@test.test', 'LOW'),
(6, 'organic,mixed,', 'https://goo.gl/maps/CyPaoXtHknCiEi3F9', 'test', 'note-19-1-figure-02-en.jpg', '1:23am ,\n Tuesday 9th May 2023', 'Completed', 'testuser@test.test', 'LOW'),
(7, 'organic,inorganic,mixed,', 'https://goo.gl/maps/CyPaoXtHknCiEi3F9', 'test', 'note-19-1-figure-02-en.jpg', '1:24am ,\n Tuesday 9th May 2023', 'Approved', 'testuser@test.test', 'HIGH'),
(9, 'inorganic,mixed,', 'https://goo.gl/maps/CyPaoXtHknCiEi3F9', 'tes', 'the-dark-knight-rises-batman-poster.jpg', '1:28am ,\n Tuesday 9th May 2023', 'Pending', 'testuser@test.test', 'LOW'),
(10, 'organic,mixed,', 'https://goo.gl/maps/CyPaoXtHknCiEi3F9', 'test', 'note-19-1-figure-02-en.jpg', '1:28am ,\n Tuesday 9th May 2023', 'Pending', 'testuser@test.test', 'LOW'),
(11, 'organic,mixed,', 'https://goo.gl/maps/CyPaoXtHknCiEi3F9', 'test', 'note-19-1-figure-02-en.jpg', '1:30am ,\n Tuesday 9th May 2023', 'Pending', 'testuser@test.test', 'LOW'),
(12, 'organic,mixed,', 'https://goo.gl/maps/CyPaoXtHknCiEi3F9', 'test', 'note-19-1-figure-02-en.jpg', '1:30am ,\n Tuesday 9th May 2023', 'Pending', 'testuser@test.test', 'LOW'),
(13, 'organic,mixed,', 'https://goo.gl/maps/CyPaoXtHknCiEi3F9', 'test', 'note-19-1-figure-02-en.jpg', '1:37am ,\n Tuesday 9th May 2023', 'Pending', 'testuser@test.test', 'LOW'),
(14, 'organic,mixed,', 'https://goo.gl/maps/CyPaoXtHknCiEi3F9', 'test', 'note-19-1-figure-02-en.jpg', '1:37am ,\n Tuesday 9th May 2023', 'Pending', 'testuser@test.test', 'LOW'),
(15, 'inorganic,mixed,', 'https://goo.gl/maps/CyPaoXtHknCiEi3F9', 'test', 'note-19-1-figure-02-en.jpg', '8:18am ,\n Tuesday 9th May 2023', 'Pending', 'testuser@test.test', 'LOW'),
(16, 'organic,mixed,', 'https://goo.gl/maps/CyPaoXtHknCiEi3F9', 'test', 'note-19-1-figure-02-en.jpg', '8:19am ,\n Tuesday 9th May 2023', 'Pending', 'testuser@test.test', 'LOW'),
(17, 'organic,mixed,', 'https://goo.gl/maps/CyPaoXtHknCiEi3F9', 'test', 'note-19-1-figure-02-en.jpg', '8:20am ,\n Tuesday 9th May 2023', 'Pending', 'testuser@test.test', 'LOW'),
(18, 'inorganic,mixed,', 'https://goo.gl/maps/CyPaoXtHknCiEi3F9', 'test', 'note-19-1-figure-02-en.jpg', '8:20am ,\n Tuesday 9th May 2023', 'Pending', 'testuser@test.test', 'LOW'),
(19, 'inorganic,mixed,', 'https://goo.gl/maps/CyPaoXtHknCiEi3F9', 'test', 'note-19-1-figure-02-en.jpg', '8:23am ,\n Tuesday 9th May 2023', 'Pending', 'testuser@test.test', 'LOW'),
(20, 'organic,mixed,', 'https://goo.gl/maps/CyPaoXtHknCiEi3F9', 'test', 'note-19-1-figure-02-en.jpg', '8:23am ,\n Tuesday 9th May 2023', 'Pending', 'testuser@test.test', 'LOW'),
(21, 'organic,mixed,', 'https://goo.gl/maps/CyPaoXtHknCiEi3F9', 'test', 'note-19-1-figure-02-en.jpg', '8:25am ,\n Tuesday 9th May 2023', 'Pending', 'testuser@test.test', 'LOW'),
(22, 'organic,mixed,', 'https://goo.gl/maps/CyPaoXtHknCiEi3F9', 'test', 'note-19-1-figure-02-en.jpg', '8:25am ,\n Tuesday 9th May 2023', 'Pending', 'testuser@test.test', 'LOW'),
(23, 'organic,mixed,', 'https://goo.gl/maps/CyPaoXtHknCiEi3F9', 'test', 'note-19-1-figure-02-en.jpg', '8:27am ,\n Tuesday 9th May 2023', 'Pending', 'testuser@test.test', 'LOW'),
(25, 'organic,mixed,', 'https://goo.gl/maps/CyPaoXtHknCiEi3F9', 'test', 'note-19-1-figure-02-en.jpg', '8:28am ,\n Tuesday 9th May 2023', 'Pending', 'testuser@test.test', 'LOW'),
(26, 'organic,mixed,', 'https://goo.gl/maps/CyPaoXtHknCiEi3F9', 'test', 'note-19-1-figure-02-en.jpg', '8:28am ,\n Tuesday 9th May 2023', 'Pending', 'testuser@test.test', 'LOW'),
(27, 'organic,mixed,', 'https://goo.gl/maps/CyPaoXtHknCiEi3F9', 'test', 'note-19-1-figure-02-en.jpg', '8:28am ,\n Tuesday 9th May 2023', 'Pending', 'testuser@test.test', 'LOW'),
(28, 'organic,mixed,', 'https://goo.gl/maps/CyPaoXtHknCiEi3F9', 'test', 'note-19-1-figure-02-en.jpg', '8:28am ,\n Tuesday 9th May 2023', 'Pending', 'testuser@test.test', 'LOW'),
(29, 'organic,mixed,', 'https://goo.gl/maps/CyPaoXtHknCiEi3F9', 'test', 'note-19-1-figure-02-en.jpg', '8:28am ,\n Tuesday 9th May 2023', 'Approved', 'testuser@test.test', 'MEDIUM'),
(30, 'organic,mixed,', 'https://goo.gl/maps/CyPaoXtHknCiEi3F9', 'test', 'note-19-1-figure-02-en.jpg', '8:28am ,\n Tuesday 9th May 2023', 'Pending', 'testuser@test.test', 'LOW'),
(45, 'Organic,', 'https://goo.gl/maps/CyPaoXtHknCiEi3F9', 'central park', 'download.jpg', '3:42pm ,\n Tuesday 9th May 2023', 'Pending', 'testuser@test.test', 'LOW'),
(46, 'Toxic/Hazardous,mixed,', 'https://goo.gl/maps/CyPaoXtHknCiEi3F9', 'test', 'download.jpg', '5:54pm ,\n Tuesday 9th May 2023', 'Approved', 'testuser@test.test', 'HIGH'),
(47, 'mixed,', 'test', 'test', 'download.jpg', '2:54pm ,\n Wednesday 10th May 2023', 'Pending', 'testuser@test.test', 'LOW'),
(48, '', 'test', 'test', 'download.jpg', '2:59pm ,\n Wednesday 10th May 2023', 'Pending', 'testuser@test.test', 'LOW'),
(49, 'mixed,', 'test', 'test', 'download.jpg', '3:00pm ,\n Wednesday 10th May 2023', 'Pending', 'testuser@test.test', 'LOW'),
(50, 'mixed,', 'test', 'test', 'download.jpg', '3:07pm ,\n Wednesday 10th May 2023', 'Pending', 'testuser@test.test', 'LOW'),
(51, 'mixed,', 'test', 'test', 'download.jpg', '3:07pm ,\n Wednesday 10th May 2023', 'Pending', 'testuser@test.test', 'LOW'),
(52, 'mixed', 'test', 'test2', 'download.jpg', '3:08pm ,\n Wednesday 10th May 2023', 'Pending', 'testuser@test.test', 'LOW'),
(53, 'Organic,Toxic/Hazardous,mixed,', 'test', 'test5', 'download.jpg', '3:08pm ,\n Wednesday 10th May 2023', 'Pending', 'testuser@test.test', 'LOW'),
(54, 'Inorganic,Toxic/Hazardous,', 'test', 'test8', 'download.jpg', '3:09pm ,\n Wednesday 10th May 2023', 'Pending', 'testuser@test.test', 'LOW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `waste_detection`
--
ALTER TABLE `waste_detection`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `waste_detection`
--
ALTER TABLE `waste_detection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
