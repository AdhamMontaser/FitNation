-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2024 at 12:04 AM
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
-- Table structure for table `favorite posts`
--

CREATE TABLE `favorite posts` (
  `Id` int(11) NOT NULL,
  `UserPosted` varchar(30) NOT NULL,
  `PostId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
('AliHesham01', 1),
('AliHesham01', 3),
('AliHesham01', 6),
('Mozaky11', 6);

-- --------------------------------------------------------

--
-- Table structure for table `gym`
--

CREATE TABLE `gym` (
  `Gym_Name` varchar(30) NOT NULL,
  `Address` varchar(30) NOT NULL,
  `Phone_Number` varchar(30) NOT NULL,
  `ID` int(11) NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL,
  `picname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gym`
--

INSERT INTO `gym` (`Gym_Name`, `Address`, `Phone_Number`, `ID`, `latitude`, `longitude`, `picname`) VALUES
('Morph Gym', 'nasr city', '0224050035', 9, 30.07063000, 31.43871400, 'morphgym.png'),
('Golds Gym', 'nasr city', '01270089775', 12, 30.04922400, 31.34756200, 'goldsgym.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `Id` int(11) NOT NULL,
  `UserPosted` varchar(30) NOT NULL,
  `Likes` int(11) NOT NULL,
  `Time` varchar(15) NOT NULL,
  `Text` varchar(140) NOT NULL,
  `Image` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`Id`, `UserPosted`, `Likes`, `Time`, `Text`, `Image`) VALUES
(35, 'Mozaky11', 5, '01-01-2024', 'New year, new gym goals.\r\nKeep the grind fellas', ''),
(36, 'AliHesham01', 7, '01-01-2024', 'Wow, what a feature', ''),
(37, 'Mozaky11', 0, '01-01-2024', 'Helloo\r\n', ''),
(38, 'Mozaky11', 0, '01-01-2024', 'Welcome to the blog', ''),
(39, 'Mozaky11', 0, '01-01-2024', 'Ziad Mahmoud', '');

-- --------------------------------------------------------

--
-- Table structure for table `score_board`
--

CREATE TABLE `score_board` (
  `Username` varchar(30) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(12, 'Mohamed', 'Emad', 'Mozaky11', '2yY.2UcrCJEAE', 'mohamedzaky970@gmail.com', 1015118963),
(15, 'adham', 'adham', 'adham', '2yOBG.zch./yw', 'adhamdod2003@gmail.com', 1015118954),
(17, 'Ali', 'Hisham', 'ali', '2yf3FGLvoJBHE', 'alihisham26m@gmail.com', 2147483647),
(19, 'Ali', 'Hesham', 'AliHesham01', '2yMJyD0vkovog', 'alidod@gmail.com', 1016878952);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `score_board`
--
ALTER TABLE `score_board`
  ADD PRIMARY KEY (`Username`,`score`);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
