-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2021 at 04:59 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `polltest1`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `candidates_id` int(100) NOT NULL,
  `fullname` varchar(10) NOT NULL,
  `about` varchar(255) NOT NULL,
  `votecount` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`candidates_id`, `fullname`, `about`, `votecount`) VALUES
(1, 'Joe Walsh', 'Joe Walsh is', 6),
(2, 'Bill Weld', 'Bill Weld is', 9),
(3, 'Donald Tr', 'Donald Tr is', 22),
(4, 'Andrew Yan', 'Andrew Yan is', 18);

-- --------------------------------------------------------

--
-- Table structure for table `loginusers`
--

CREATE TABLE `loginusers` (
  `id` int(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `rank` varchar(80) NOT NULL DEFAULT 'voter',
  `status` varchar(10) NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loginusers`
--

INSERT INTO `loginusers` (`id`, `username`, `password`, `rank`, `status`) VALUES
(1, 'Nour', '81b073de9370ea873f548e31b8adc081', 'voter', 'ACTIVE'),
(2, 'Kholoud', '81b073de9370ea873f548e31b8adc081', 'voter', 'ACTIVE'),
(3, 'Ali', 'd79c8788088c2193f0244d8f1f36d2db', 'voter', 'ACTIVE'),
(4, 'Sami', 'c5fe25896e49ddfe996db7508cf00534', 'voter', 'ACTIVE'),
(5, 'Siraj', '2be9bd7a3434f7038ca27d1918de58bd', 'voter', 'ACTIVE'),
(6, 'Hala', 'b59c67bf196a4758191e42f76670ceba', 'voter', 'ACTIVE'),
(7, 'Patrick', 'd79c8788088c2193f0244d8f1f36d2db', 'voter', 'ACTIVE'),
(8, 'George ', 'fa246d0262c3925617b0c72bb20eeb1d', 'voter', 'ACTIVE'),
(9, 'Sara', 'cf79ae6addba60ad018347359bd144d2', 'voter', 'ACTIVE'),
(10, 'Kamal', '934b535800b1cba8f96a5d72f72f1611', 'voter', 'ACTIVE'),
(11, 'Mira', '81dc9bdb52d04dc20036dbd8313ed055', 'voter', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `upload_image`
--

CREATE TABLE `upload_image` (
  `img_id` int(11) NOT NULL,
  `img_name` varchar(255) NOT NULL,
  `img_path` varchar(255) NOT NULL,
  `img_type` varchar(255) NOT NULL,
  `img_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'NOTVOTED',
  `voted` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`firstname`, `lastname`, `username`, `status`, `voted`) VALUES
('Ali', 'Ahmad', 'Ali', 'VOTED', 'Donald John Trump'),
('George ', 'Salloum', 'George ', 'VOTED', 'Joe Walsh'),
('Hala', 'salem', 'Hala', 'VOTED', 'Donald John Trump'),
('Kamal', 'nasrallah', 'Kamal', 'VOTED', 'Bill Weld'),
('Kholoud', 'Nasrallah', 'Kholoud', 'VOTED', 'Andrew Yang'),
('Mira', 'Shhade', 'Mira', 'VOTED', 'Donald John Trump'),
('Nour', 'Issa', 'Nour', 'VOTED', 'Joe Walsh'),
('Patrick', 'Hanna', 'Patrick', 'VOTED', 'Bill Weld'),
('Sami', 'Jawhar', 'Sami', 'VOTED', 'Bill Weld'),
('Sara', 'Semhat', 'Sara', 'VOTED', 'Andrew Yang'),
('Siraj', 'Ahwaaji', 'Siraj', 'VOTED', 'Andrew Yang');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`candidates_id`);

--
-- Indexes for table `loginusers`
--
ALTER TABLE `loginusers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `upload_image`
--
ALTER TABLE `upload_image`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `voters`
--
ALTER TABLE `voters`
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `candidates_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `loginusers`
--
ALTER TABLE `loginusers`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `upload_image`
--
ALTER TABLE `upload_image`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
