-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2023 at 08:50 PM
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
(1, 'Greenary \'23', 'Urban greenery refers to the presence of trees, plants, and other green spaces in cities and towns. Studies have shown that urban greenery provides a range of benefits to both people and the environment. Trees and plants can help to absorb pollutants and reduce the heat island effect, making urban areas more livable and sustainable. Additionally, green spaces can improve mental health by providing a calming environment and encouraging physical activity. Urban greenery can also contribute to local biodiversity by providing habitats for birds, insects, and other wildlife. By prioritizing and investing in urban greenery, cities and towns can promote healthier, more livable communities and contribute to a more sustainable future for all.Sustainable Management with Tech Giants'),
(2, 'The Eco Garden', ' -   Gathering of leaders and experts from various fields who come together to discuss ways to address environmental issues and promote sustainability. These summits often focus on developing policies, technologies, and initiatives that can reduce carbon emissions, protect biodiversity, and mitigate the impacts of climate change. A green summit is a gathering of leaders and experts from various fields who come together to discuss ways to address environmental issues and promote sustainability. These summits often focus on developing policies, technologies, and initiatives that can reduce carbon emissions, protect biodiversity, and mitigate the impacts of climate change. Participants may include government officials, scientists, environmental activists, business leaders, and representatives from non-profit organizations. Through collaboration and knowledge-sharing, a green summit aims to inspire positive change and drive action towards a more sustainable future for the planet. ');

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
(53, 'inorganic', 'https://goo.gl/maps/oNGJJxbm7zf48ZjHA', 'polythene waste', 'plastic-trash-hero-compass-winter-2019.jpg', '3:08pm ,\n Wednesday 10th May 2023', 'Pending', 'testuser@test.test', 'LOW'),
(54, 'Inorganic,Toxic/Hazardous,', 'https://goo.gl/maps/M3SpwmqXP96YX7Bd7', 'plastic bottles', '160708145809-gettyimages-52264478.jpg', '3:09pm ,\n Wednesday 10th May 2023', 'Pending', 'testuser@test.test', 'LOW'),
(55, 'Toxic/Hazardous,', 'https://goo.gl/maps/Ge6TSfNYJh4UPTuZ6', 'There is a bag full of paint cans dumped in this location. It\'s covered with chemicals and it has a toxic chemical smell. This is impacting health of humans and animals around this location.', 'download (1).jpg', '5:25pm ,\n Wednesday 10th May 2023', 'Approved', 'testuser@test.test', 'HIGH');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `waste_detection`
--
ALTER TABLE `waste_detection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
