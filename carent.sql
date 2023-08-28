-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 15, 2023 at 09:30 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carent`
--

-- --------------------------------------------------------

--
-- Table structure for table `car_details`
--

CREATE TABLE `car_details` (
  `id` int(255) NOT NULL,
  `M_name` varchar(255) NOT NULL,
  `V_number` varchar(255) NOT NULL,
  `Seat` int(255) NOT NULL,
  `Rent` int(255) NOT NULL,
  `Images` varchar(400) DEFAULT NULL,
  `Days` int(255) NOT NULL DEFAULT 0,
  `st_date` date DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `F_name` text DEFAULT NULL,
  `L_name` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car_details`
--

INSERT INTO `car_details` (`id`, `M_name`, `V_number`, `Seat`, `Rent`, `Images`, `Days`, `st_date`, `username`, `F_name`, `L_name`) VALUES
(46, 'Model3', 'MH07GH8', 4, 12789, 'IMG-1676408653.jpg', 3, '2023-02-15', 'ganesh@gmail.com', 'Ganesh', 'Margi'),
(47, 'Model4', 'MH07GH9', 4, 9000, 'IMG-1676408695.jpg', 0, NULL, NULL, NULL, NULL),
(48, 'Model5', 'MH07GH10', 4, 7890, 'IMG-1676408741.jpg', 15, '2023-02-14', 'mayuresh@gmail.com', 'Mayuresh', 'Gawade'),
(49, 'Model1', 'MH07GH6', 4, 12000, 'IMG-1676408567.jpg', 0, NULL, NULL, NULL, NULL),
(50, 'Model2', 'MH07GH1', 8, 2000, 'IMG-1676491239.jpg', 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(20) NOT NULL,
  `First_name` text DEFAULT NULL,
  `Last_name` text DEFAULT NULL,
  `Agency_name` text DEFAULT NULL,
  `Agent_name` text DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `First_name`, `Last_name`, `Agency_name`, `Agent_name`, `email`, `password`, `role`) VALUES
(35, 'Mayuresh', 'Gawade', NULL, NULL, 'mayuresh@gmail.com', '$2y$10$3kHYOmZffpZHX8FrVnlAFO4Ai03g3AA.eHB/o1B7ncyofST.fSxt2', 'customer'),
(36, NULL, NULL, 'TrueDriver', 'Harsh', 'harsh@gmail.com', '$2y$10$R1Zt/Vq9nBU2Eu7N1OAfqeb1VxiKufZg0.vRSzITLJU626WDGGpKS', 'agent'),
(37, 'Ganesh', 'Margi', NULL, NULL, 'ganesh@gmail.com', '$2y$10$eeq8Xa03zWSaE5Sq8bH9B.L38TrfKWnK2K9KjeaiRzgWd.SSwsB2a', 'customer'),
(38, NULL, NULL, 'TrustMe', 'Anurag', 'anurag@gmail.com', '$2y$10$bDFkCa3JgDplWPU9I4LrUeSKhpGY8W2I2kMVCU0AnfNCjmryNuw.a', 'agent');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car_details`
--
ALTER TABLE `car_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car_details`
--
ALTER TABLE `car_details`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
