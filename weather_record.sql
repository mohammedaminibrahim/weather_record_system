-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220616.7a6bd9eb57
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2022 at 02:30 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `weather_record`
--

-- --------------------------------------------------------

--
-- Table structure for table `daily_records`
--

CREATE TABLE `daily_records` (
  `id` int(11) NOT NULL,
  `stationid` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `rainfall_mm` float NOT NULL,
  `tempmax` float NOT NULL,
  `tempmin` float NOT NULL,
  `winrun` int(11) NOT NULL,
  `direction` varchar(11) NOT NULL,
  `speed` float NOT NULL,
  `rel_humudity_0600` int(11) NOT NULL,
  `rel_humudity_0200` int(11) NOT NULL,
  `rel_humudity_1200` int(11) NOT NULL,
  `rel_humudity_1500` int(11) NOT NULL,
  `sunshine` double NOT NULL,
  `remark` varchar(255) NOT NULL,
  `createdat` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daily_records`
--

INSERT INTO `daily_records` (`id`, `stationid`, `date`, `rainfall_mm`, `tempmax`, `tempmin`, `winrun`, `direction`, `speed`, `rel_humudity_0600`, `rel_humudity_0200`, `rel_humudity_1200`, `rel_humudity_1500`, `sunshine`, `remark`, `createdat`) VALUES
(1, 'MUVGYPINJO', '2022-10-14 00:00:00', 89, 93, 4, 93, 'NE', 34, 34, 34, 54, 32, 44, 'gh', '2022-10-15 00:01:42'),
(2, 'stationid', '0000-00-00 00:00:00', 0, 0, 0, 0, 'direction', 0, 0, 0, 0, 0, 0, 'remark', '2022-10-15 16:36:59'),
(3, 'MUVGYPINJO', '0000-00-00 00:00:00', 89, 43, 21, 34, 'NE', 34, 46, 45, 0, 45, 56, 'Hello', '2022-10-15 16:37:01'),
(4, '', '0000-00-00 00:00:00', 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, '', '2022-10-15 16:37:01'),
(5, '', '0000-00-00 00:00:00', 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, '', '2022-10-15 16:37:02'),
(6, 'stationid', '0000-00-00 00:00:00', 0, 0, 0, 0, 'direction', 0, 0, 0, 0, 0, 0, 'remark', '2022-10-15 16:37:01'),
(7, '', '0000-00-00 00:00:00', 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, '', '2022-10-15 16:37:02'),
(8, 'MUVGYPINJO', '0000-00-00 00:00:00', 89, 43, 21, 34, 'NE', 34, 46, 45, 0, 45, 56, 'Hello', '2022-10-15 16:37:02'),
(9, '', '0000-00-00 00:00:00', 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, '', '2022-10-15 16:37:03'),
(10, '', '0000-00-00 00:00:00', 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, '', '2022-10-15 16:37:03'),
(11, '', '0000-00-00 00:00:00', 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, '', '2022-10-15 16:37:03'),
(12, 'stationid', '0000-00-00 00:00:00', 0, 0, 0, 0, 'direction', 0, 0, 0, 0, 0, 0, 'remark', '2022-10-18 14:15:22'),
(13, 'MUVGYPINJO', '0000-00-00 00:00:00', 89, 43, 21, 34, 'NE', 34, 46, 45, 0, 45, 56, 'Hello', '2022-10-18 14:15:22'),
(14, '', '0000-00-00 00:00:00', 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, '', '2022-10-18 14:15:22'),
(15, '', '0000-00-00 00:00:00', 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, '', '2022-10-18 14:15:22'),
(16, '', '0000-00-00 00:00:00', 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, '', '2022-10-18 14:15:22');

-- --------------------------------------------------------

--
-- Table structure for table `stations`
--

CREATE TABLE `stations` (
  `id` int(11) NOT NULL,
  `stationid` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `stationname` varchar(255) NOT NULL,
  `stationdistrict` varchar(255) NOT NULL,
  `stationregion` varchar(255) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stations`
--

INSERT INTO `stations` (`id`, `stationid`, `password`, `stationname`, `stationdistrict`, `stationregion`, `createdat`) VALUES
(4, 'MUVGYPINJO', '12345678', 'Navrongo', 'Kasena Nanka', 'UPPER EAST', '2022-10-14 19:40:03'),
(5, 'BCXADQIEMF', '12345678', 'Navrongo1', 'Manhyia', 'ASHANTI', '2022-10-15 01:01:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `joinedat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `joinedat`) VALUES
(1, 'Mansah Musah', 'mansahmusah@gmail.com', '$2y$10$U2MKZkqLGlbrcRpqadB4Fu6bJGRuUGA9mhkF/TYZagjnesGfyAEuC', '2022-10-03 01:11:49'),
(2, 'Mohammed Amin Ibrahim', 'mohammedaminibrahim10@gmail.com', '$2y$10$zahmT86O9H/GE.Tqsr9E1uSF3Udri98haG3KiiTBO7x05Jp4/H8ai', '2022-10-03 01:37:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daily_records`
--
ALTER TABLE `daily_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stations`
--
ALTER TABLE `stations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daily_records`
--
ALTER TABLE `daily_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `stations`
--
ALTER TABLE `stations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



