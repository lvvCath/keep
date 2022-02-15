-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2022 at 02:13 PM
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
(33, 'Rosalyn', 'Quenca', 'rose@gmail.com', 'Rosal_08', '$2y$10$Yqgb3n8TfndiftCh34ZN5ewwE4M0sjiwJVw/0lmviI6FW5DqqmocG', '2021-02-03'),
(34, 'Bob', 'Smith', 'bobsmith002@gmail.com', 'bobby001', '$2y$10$90UQIYjfior/wslcjeAe3OlWzBK.KCHEoCDGyU3WTx18rVB1umyBG', '2022-01-21'),
(35, 'Anne', 'Watson', 'appleanne@gmail.com', 'anne008', '$2y$10$Lvp0PSvl7DnVk8uG7C8jYeu9AjN0399CjZEskWPYebfLIEiCIQoo2', '2022-02-14'),
(36, 'new', 'sample', 'sample@gmail.com', 'newuser', '$2y$10$TdxMN.hOuqK0yqxvnqnZaON0utXILlXj89dgsR1xFWrKpb294UIWK', '2022-02-14'),
(37, 'justine', 'zuniga', 'justinezuniga@gmail.com', 'justine_i0', '$2y$10$HASeb6srOv3YoRWttBU1DOBd1yXtiMPu.McOZ3s3EZGI6QqO94HC.', '2021-12-01');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `trigger_new_child` AFTER INSERT ON `users` FOR EACH ROW INSERT INTO user_history (pwdUserId, pwdPassword, pwdUpdateDt) 
SELECT usersId, usersPassword, usersPwdDate 
FROM users WHERE usersId = (SELECT MAX(usersId) FROM users)
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
(8, 33, '$2y$10$xAFILPIlOi5YSiEppSoCFu8044G7fV3ta0OwSV8Hwb41CDD8t2z1S', '2022-02-12'),
(9, 34, '$2y$10$Fjqw/nZgf8SRE1xqwHlaOOXnKBEzC0gecxdhR9ZZ2ufYTH5274nki', '2022-02-12'),
(10, 35, '$2y$10$djZeUN1h3umdG3aF/misbOi8VSeV4zLTOFaqerpHZ7TBrTLpdjAje', '2022-02-12'),
(23, 33, '$2y$10$Yqgb3n8TfndiftCh34ZN5ewwE4M0sjiwJVw/0lmviI6FW5DqqmocG', '2022-02-12'),
(24, 34, '$2y$10$90UQIYjfior/wslcjeAe3OlWzBK.KCHEoCDGyU3WTx18rVB1umyBG', '2022-02-12'),
(25, 36, '$2y$10$TdxMN.hOuqK0yqxvnqnZaON0utXILlXj89dgsR1xFWrKpb294UIWK', '2022-02-14'),
(26, 35, '$2y$10$Lvp0PSvl7DnVk8uG7C8jYeu9AjN0399CjZEskWPYebfLIEiCIQoo2', '2022-02-14'),
(27, 37, '$2y$10$/DRr9Fe3pkorZkZPbGWraeVAhSXy/bkeOLU1TVvmFCp9MZnl/tYxa', '2022-02-14'),
(28, 37, '$2y$10$Mg5iP8/Zkk7gehD09oMkA./Ez1kiODZDNrW7qal9m3/unZJYFZIYG', '2022-02-14'),
(29, 37, '$2y$10$ui4MK6k5bNImT5HcmRUKVuv66yjYFIR3nLZfyp8ymGc5uMd.KRaOS', '2022-02-14'),
(30, 37, '$2y$10$T36TTVGasOk5r8EN5Jgmnep7X9P6aaloIwruK359IZErVfyQzMQcG', '2022-02-14'),
(31, 37, '$2y$10$HASeb6srOv3YoRWttBU1DOBd1yXtiMPu.McOZ3s3EZGI6QqO94HC.', '2022-02-14');

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
  MODIFY `usersId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user_history`
--
ALTER TABLE `user_history`
  MODIFY `pwdId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_history`
--
ALTER TABLE `user_history`
  ADD CONSTRAINT `userid_history_fk` FOREIGN KEY (`pwdUserId`) REFERENCES `users` (`usersId`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
