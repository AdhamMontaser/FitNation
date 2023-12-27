-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2023 at 08:23 PM
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
-- Database: `fitnation`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `First_Name` varchar(30) NOT NULL,
  `Second_Name` varchar(30) NOT NULL,
  `Phone_Number` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `Username`, `First_Name`, `Second_Name`, `Phone_Number`, `Email`, `Password`) VALUES
(123216, 'mozaky11', 'Mohamed', 'Emad', '212121212121', 'momomomomom@gmail.com', 'momo123'),
(123217, 'asad', 'dsada', 'dsad', '232131', 'dsad@mail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `favorite_exercises`
--

CREATE TABLE `favorite_exercises` (
  `username` varchar(30) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favorite_exercises`
--

INSERT INTO `favorite_exercises` (`username`, `id`) VALUES
('Mozaky11', 6),
('Mozaky11', 1512),
('Mozaky11', 3294);

-- --------------------------------------------------------

--
-- Table structure for table `gym`
--

CREATE TABLE `gym` (
  `Gym_Name` varchar(30) NOT NULL,
  `Address` varchar(30) NOT NULL,
  `Phone_Number` varchar(30) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gym`
--

INSERT INTO `gym` (`Gym_Name`, `Address`, `Phone_Number`, `ID`) VALUES
('Golds Gym', 'Obour City', '1014117623', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `First_Name` varchar(30) NOT NULL,
  `Last_Name` varchar(30) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Phone_Number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `First_Name`, `Last_Name`, `Username`, `Password`, `Email`, `Phone_Number`) VALUES
(12, 'Mohamed', 'Emad', 'Mozaky11', '2yBA4vS/6IPUo', 'mohamedzaky970@gmail.com', 1015118963),
(13, 'Ali', 'Hesham', 'AliHesham', '2yMJyD0vkovog', 'ali@rgola.com', 1015118954),
(14, 'dsad', 'dsad', 'Mozaky111', '2yG9q7O7s42BI', 'mohamedzaky970@gmail.com', 1015118965),
(15, 'adham', 'adham', 'adham', '2yOBG.zch./yw', 'adhamdod2003@gmail.com', 1015118954);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `favorite_exercises`
--
ALTER TABLE `favorite_exercises`
  ADD PRIMARY KEY (`username`,`id`);

--
-- Indexes for table `gym`
--
ALTER TABLE `gym`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123218;

--
-- AUTO_INCREMENT for table `gym`
--
ALTER TABLE `gym`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
