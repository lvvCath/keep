-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2022 at 05:50 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cs005`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usersId` int(11) NOT NULL,
  `usersFirstName` varchar(128) NOT NULL,
  `usersLastName` varchar(128) NOT NULL,
  `usersEmail` varchar(128) NOT NULL,
  `usersUid` varchar(20) NOT NULL,
  `usersPassword` varchar(128) NOT NULL,
  `usersPwdDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usersId`, `usersFirstName`, `usersLastName`, `usersEmail`, `usersUid`, `usersPassword`, `usersPwdDate`) VALUES
(24, 'Rosalyn', 'Quenca', 'rose@gmail.com', 'Rosal_08', '$2y$10$Dv/ctmml5WksWfzLSbxbKeLUC/RkLMcKzqU2N6LBj2XDlRPwbe66O', '2022-01-11'),
(25, 'Bob', 'Smith', 'bobsmith002@gmail.com', 'bobby001', '$2y$10$vkfGhHea.lKVHGiz54gRQ.4MwaJUjXF/xz1tAniIRpGSp.7V.wJUe', '2022-02-10'),
(30, 'Anne', 'Watson', 'appleanne@gmail.com', 'anne008', '$2y$10$sx6r8wLzzvP.NhVi1b/fD.cFnbRzD4ZUFqugJ2Zfr9bLLk.g7nLZm', '2022-02-12');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `trigger_new_child` AFTER INSERT ON `users` FOR EACH ROW INSERT INTO user_history (pwdUserId) SELECT MAX(usersId) FROM users
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user_history`
--

CREATE TABLE `user_history` (
  `pwdId` int(11) NOT NULL,
  `pwdUserId` int(11) NOT NULL,
  `pwdPassword` varchar(128) NOT NULL,
  `pwdUpdateDt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_history`
--

INSERT INTO `user_history` (`pwdId`, `pwdUserId`, `pwdPassword`, `pwdUpdateDt`) VALUES
(4, 30, '', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersId`),
  ADD UNIQUE KEY `username` (`usersUid`),
  ADD UNIQUE KEY `email` (`usersEmail`);

--
-- Indexes for table `user_history`
--
ALTER TABLE `user_history`
  ADD PRIMARY KEY (`pwdId`),
  ADD KEY `userid_history_fk` (`pwdUserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usersId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user_history`
--
ALTER TABLE `user_history`
  MODIFY `pwdId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_history`
--
ALTER TABLE `user_history`
  ADD CONSTRAINT `userid_history_fk` FOREIGN KEY (`pwdUserId`) REFERENCES `users` (`usersId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
