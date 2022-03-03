-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2022 at 05:46 PM
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
CREATE DATABASE IF NOT EXISTS `cs005` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cs005`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
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
(60, 'Bob', 'Smith', 'bobsmith002@gmail.com', 'bobby001', '$2y$10$e92.ci4Hxbf6Dszr.CsOEeBn.b4gGy19KXFee./JaiuBxW1dBP0S.', '2022-03-03');

--
-- Triggers `users`
--
DROP TRIGGER IF EXISTS `trigger_new_child`;
DELIMITER $$
CREATE TRIGGER `trigger_new_child` AFTER INSERT ON `users` FOR EACH ROW INSERT INTO user_history (pwdUserId, pwdPassword, pwdUpdateDt) 
SELECT usersId, usersPassword, usersPwdDate 
FROM users WHERE usersId = (SELECT MAX(usersId) FROM users)
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `trigger_new_child_education`;
DELIMITER $$
CREATE TRIGGER `trigger_new_child_education` AFTER INSERT ON `users` FOR EACH ROW INSERT INTO users_education(userid) 
SELECT usersId
FROM users WHERE usersId = (SELECT MAX(usersId) FROM users)
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `trigger_new_child_experience`;
DELIMITER $$
CREATE TRIGGER `trigger_new_child_experience` AFTER INSERT ON `users` FOR EACH ROW INSERT INTO users_experience(userid) 
SELECT usersId
FROM users WHERE usersId = (SELECT MAX(usersId) FROM users)
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `trigger_new_child_info`;
DELIMITER $$
CREATE TRIGGER `trigger_new_child_info` AFTER INSERT ON `users` FOR EACH ROW INSERT INTO users_info(userid) 
SELECT usersId
FROM users WHERE usersId = (SELECT MAX(usersId) FROM users)
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `trigger_new_child_message`;
DELIMITER $$
CREATE TRIGGER `trigger_new_child_message` AFTER INSERT ON `users` FOR EACH ROW INSERT INTO users_message(userid) 
SELECT usersId
FROM users WHERE usersId = (SELECT MAX(usersId) FROM users)
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `trigger_new_child_service`;
DELIMITER $$
CREATE TRIGGER `trigger_new_child_service` AFTER INSERT ON `users` FOR EACH ROW INSERT INTO users_service(userid) 
SELECT usersId
FROM users WHERE usersId = (SELECT MAX(usersId) FROM users)
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `trigger_new_child_skill`;
DELIMITER $$
CREATE TRIGGER `trigger_new_child_skill` AFTER INSERT ON `users` FOR EACH ROW INSERT INTO users_skill(userid, skill, percentage) 
SELECT usersId, 'Skill', '100'
FROM users WHERE usersId = (SELECT MAX(usersId) FROM users)
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `trigger_new_child_work`;
DELIMITER $$
CREATE TRIGGER `trigger_new_child_work` AFTER INSERT ON `users` FOR EACH ROW INSERT INTO users_work(userid) 
SELECT usersId
FROM users WHERE usersId = (SELECT MAX(usersId) FROM users)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users_education`
--

DROP TABLE IF EXISTS `users_education`;
CREATE TABLE `users_education` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `degree` varchar(250) NOT NULL,
  `description` varchar(500) NOT NULL,
  `year` varchar(50) NOT NULL,
  `location` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_education`
--

INSERT INTO `users_education` (`id`, `userid`, `degree`, `description`, `year`, `location`) VALUES
(11, 60, 'Bachelor of Graphics Design', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.', '2020-2022', 'Far Eastern University'),
(14, 60, 'Bachelor of Science in Computer Science', 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet', '2015-2019', 'T.I.P');

-- --------------------------------------------------------

--
-- Table structure for table `users_experience`
--

DROP TABLE IF EXISTS `users_experience`;
CREATE TABLE `users_experience` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `job` varchar(250) NOT NULL,
  `year` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `location` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_experience`
--

INSERT INTO `users_experience` (`id`, `userid`, `job`, `year`, `description`, `location`) VALUES
(8, 60, 'Software Engineer', '2020-2022', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. ', 'Google'),
(9, 60, 'Security Analyst', '2019-2020', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.', 'Technological Institute of the Philippines');

-- --------------------------------------------------------

--
-- Table structure for table `users_info`
--

DROP TABLE IF EXISTS `users_info`;
CREATE TABLE `users_info` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `degree` varchar(250) NOT NULL,
  `experience` int(11) NOT NULL,
  `website` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `freelance` varchar(250) NOT NULL,
  `profession` varchar(250) NOT NULL,
  `description1` varchar(350) NOT NULL,
  `description2` varchar(550) NOT NULL,
  `image1` varchar(250) NOT NULL,
  `image2` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_info`
--

INSERT INTO `users_info` (`id`, `userid`, `age`, `phone`, `city`, `degree`, `experience`, `website`, `email`, `freelance`, `profession`, `description1`, `description2`, `image1`, `image2`) VALUES
(9, 60, 27, '09984368854', 'Caloocan City', 'Bachelor\'s Degree', 6, 'https://www.google.com', 'rose@gmail.com', 'Not Available', 'Software Engineer', 'Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules.', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', 'https://cdn.dribbble.com/uploads/599/original/86d75f5ebf6abc13a630dda33b292727.png?1544829141', 'https://trendland.com/wp-content/uploads/2019/03/editorial-illustration-by-spiros-halaris-3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users_message`
--

DROP TABLE IF EXISTS `users_message`;
CREATE TABLE `users_message` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `msgr_name` varchar(250) NOT NULL,
  `msgr_email` varchar(250) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_message`
--

INSERT INTO `users_message` (`id`, `userid`, `subject`, `msgr_name`, `msgr_email`, `message`) VALUES
(7, 60, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_service`
--

DROP TABLE IF EXISTS `users_service`;
CREATE TABLE `users_service` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `service` varchar(250) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_service`
--

INSERT INTO `users_service` (`id`, `userid`, `service`, `description`) VALUES
(7, 60, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_skill`
--

DROP TABLE IF EXISTS `users_skill`;
CREATE TABLE `users_skill` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `skill` varchar(250) NOT NULL,
  `percentage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_skill`
--

INSERT INTO `users_skill` (`id`, `userid`, `skill`, `percentage`) VALUES
(21, 60, 'java', 99),
(23, 60, 'Python', 92),
(25, 60, 'C#', 88),
(27, 60, 'MySql', 90),
(28, 60, 'C++', 70),
(29, 60, 'Jupyter', 89);

-- --------------------------------------------------------

--
-- Table structure for table `users_work`
--

DROP TABLE IF EXISTS `users_work`;
CREATE TABLE `users_work` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `client` varchar(250) NOT NULL,
  `project_date` date NOT NULL,
  `project_url` varchar(250) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_work`
--

INSERT INTO `users_work` (`id`, `userid`, `category`, `client`, `project_date`, `project_url`, `description`) VALUES
(7, 60, '', '', '0000-00-00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_history`
--

DROP TABLE IF EXISTS `user_history`;
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
(73, 60, '$2y$10$e92.ci4Hxbf6Dszr.CsOEeBn.b4gGy19KXFee./JaiuBxW1dBP0S.', '2022-03-03');

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
-- Indexes for table `users_education`
--
ALTER TABLE `users_education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid_education` (`userid`);

--
-- Indexes for table `users_experience`
--
ALTER TABLE `users_experience`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid_experience` (`userid`);

--
-- Indexes for table `users_info`
--
ALTER TABLE `users_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid_info` (`userid`);

--
-- Indexes for table `users_message`
--
ALTER TABLE `users_message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid_message` (`userid`);

--
-- Indexes for table `users_service`
--
ALTER TABLE `users_service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid_servicec` (`userid`);

--
-- Indexes for table `users_skill`
--
ALTER TABLE `users_skill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid_skill` (`userid`);

--
-- Indexes for table `users_work`
--
ALTER TABLE `users_work`
  ADD PRIMARY KEY (`id`),
  ADD KEY `workid_information` (`userid`);

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
  MODIFY `usersId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `users_education`
--
ALTER TABLE `users_education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users_experience`
--
ALTER TABLE `users_experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users_info`
--
ALTER TABLE `users_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users_message`
--
ALTER TABLE `users_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users_service`
--
ALTER TABLE `users_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users_skill`
--
ALTER TABLE `users_skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users_work`
--
ALTER TABLE `users_work`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_history`
--
ALTER TABLE `user_history`
  MODIFY `pwdId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_education`
--
ALTER TABLE `users_education`
  ADD CONSTRAINT `userid_education` FOREIGN KEY (`userid`) REFERENCES `users` (`usersId`) ON DELETE CASCADE;

--
-- Constraints for table `users_experience`
--
ALTER TABLE `users_experience`
  ADD CONSTRAINT `userid_experience` FOREIGN KEY (`userid`) REFERENCES `users` (`usersId`) ON DELETE CASCADE;

--
-- Constraints for table `users_info`
--
ALTER TABLE `users_info`
  ADD CONSTRAINT `userid_info` FOREIGN KEY (`userid`) REFERENCES `users` (`usersId`) ON DELETE CASCADE;

--
-- Constraints for table `users_message`
--
ALTER TABLE `users_message`
  ADD CONSTRAINT `userid_message` FOREIGN KEY (`userid`) REFERENCES `users` (`usersId`) ON DELETE CASCADE;

--
-- Constraints for table `users_service`
--
ALTER TABLE `users_service`
  ADD CONSTRAINT `userid_servicec` FOREIGN KEY (`userid`) REFERENCES `users` (`usersId`) ON DELETE CASCADE;

--
-- Constraints for table `users_skill`
--
ALTER TABLE `users_skill`
  ADD CONSTRAINT `userid_skill` FOREIGN KEY (`userid`) REFERENCES `users` (`usersId`) ON DELETE CASCADE;

--
-- Constraints for table `users_work`
--
ALTER TABLE `users_work`
  ADD CONSTRAINT `userid_work` FOREIGN KEY (`userid`) REFERENCES `users` (`usersId`) ON DELETE CASCADE;

--
-- Constraints for table `user_history`
--
ALTER TABLE `user_history`
  ADD CONSTRAINT `userid_history_fk` FOREIGN KEY (`pwdUserId`) REFERENCES `users` (`usersId`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
