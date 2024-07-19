-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2024 at 07:24 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users0123`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ADMIN_ID` varchar(255) NOT NULL,
  `ADMIN_PASSWORD` varchar(255) NOT NULL,
  `agencyName` varchar(255) DEFAULT NULL,
  `contactPerson` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ADMIN_ID`, `ADMIN_PASSWORD`, `agencyName`, `contactPerson`, `email`) VALUES
('admin', '12345', 'AGENCY_1', 'HARISH', 'abc@gmail.com'),
('admin1', '12345', 'Intern', 'KISHAN', 'xyz@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `BOOK_ID` int(11) NOT NULL,
  `CAR_ID` int(11) NOT NULL,
  `car_name` varchar(50) NOT NULL,
  `BOOK_PLACE` varchar(255) NOT NULL,
  `BOOK_DATE` date NOT NULL,
  `DURATION` int(11) NOT NULL,
  `PHONE_NUMBER` bigint(20) NOT NULL,
  `DESTINATION` varchar(255) NOT NULL,
  `RETURN_DATE` date NOT NULL,
  `PRICE` int(11) NOT NULL,
  `BOOK_STATUS` varchar(255) NOT NULL DEFAULT 'UNDER PROCESSING'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`BOOK_ID`, `CAR_ID`, `car_name`, `BOOK_PLACE`, `BOOK_DATE`, `DURATION`, `PHONE_NUMBER`, `DESTINATION`, `RETURN_DATE`, `PRICE`, `BOOK_STATUS`) VALUES
(0, 8, 'Landcruiser', 'Greater Noida', '2024-04-21', 2, 7097654566, 'Noida', '2024-04-23', 200, 'UNDER PROCESSING'),
(0, 13, 'Lamborghini Urus', 'vellore', '2024-04-29', 4, 4444444444, 'noida', '2024-05-01', 480, 'UNDER PROCESSING'),
(0, 17, 'Fortuner', 'Delhi', '2024-04-30', 7, 9898989898, 'Mumbai', '2024-05-06', 700, 'UNDER PROCESSING');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `CAR_ID` int(11) NOT NULL,
  `CAR_NAME` varchar(255) NOT NULL,
  `FUEL_TYPE` varchar(255) NOT NULL,
  `CAPACITY` int(11) NOT NULL,
  `PRICE` int(11) NOT NULL,
  `CAR_IMG` varchar(255) NOT NULL,
  `AVAILABLE` varchar(255) NOT NULL,
  `admin_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`CAR_ID`, `CAR_NAME`, `FUEL_TYPE`, `CAPACITY`, `PRICE`, `CAR_IMG`, `AVAILABLE`, `admin_id`) VALUES
(7, 'Alto', 'Petrol', 5, 25, 'images/car10.png', 'Yes', 'admin'),
(8, 'Landcruiser', 'Petrol', 7, 100, 'images/car11.png', 'Yes', 'admin'),
(9, 'Nissan Altima', 'Petrol', 5, 56, 'images/car4.png', 'Yes', 'admin'),
(10, 'Toyota Camry', 'Petrol', 5, 65, 'images/car1.png', 'Yes', 'admin'),
(11, 'Ford Mustang', 'Petrol', 2, 80, 'images/car3.png', 'Yes', 'admin1'),
(12, 'Honda Civic', 'Petrol', 5, 55, 'images/car2.png', 'Yes', 'admin1'),
(13, 'Lamborghini Urus', 'Petrol', 4, 120, 'images/car6.png', 'Yes', 'admin'),
(14, 'Porche 911', 'Petrol', 2, 111, 'images/car5.png', 'Yes', 'admin'),
(15, 'Maruti Grand Vitara', 'Petrol', 5, 40, 'images/car7.png', 'Yes', 'admin1'),
(17, 'Fortuner', 'diesel', 7, 100, 'images/car20.png', 'Yes', 'admin1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sn` int(11) NOT NULL,
  `username` varchar(11) NOT NULL,
  `password` varchar(23) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sn`, `username`, `password`, `date`) VALUES
(7, 'haha', '123', '2024-04-20 02:29:23'),
(8, 'tyagi', '123', '2024-04-20 14:09:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ADMIN_ID`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD UNIQUE KEY `CAR_ID` (`CAR_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `CAR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
