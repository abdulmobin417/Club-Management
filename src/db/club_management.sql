-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2023 at 10:05 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `club_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `clubevent`
--

CREATE TABLE `clubevent` (
  `eventId` int(11) NOT NULL,
  `clubId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `eventName` varchar(200) DEFAULT NULL,
  `eventTitle` varchar(200) DEFAULT NULL,
  `eventDate` varchar(200) DEFAULT NULL,
  `eventIamge` varchar(200) DEFAULT NULL,
  `eventDescription` varchar(1000) DEFAULT NULL,
  `participant` int(11) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clubevent`
--

INSERT INTO `clubevent` (`eventId`, `clubId`, `userId`, `eventName`, `eventTitle`, `eventDate`, `eventIamge`, `eventDescription`, `participant`, `status`) VALUES
(1, 2, 2, 'Tournament', 'Cricket', '2023-07-30', '../../images/sc.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Turpis egestas pretium aenean pharetra magna ac. Nulla porttitor massa id neque. Amet consectetur adipiscing elit ut aliquam purus sit. Diam maecenas sed enim ut sem. Tempor commodo ullamcorper a lacus vestibulum sed arcu non. Rhoncus est pellentesque elit ullamcorper dignissim cras tincidunt lobortis feugiat. Facilisis sed odio morbi quis commodo odio aenean sed. Gravida arcu ac tortor dignissim convallis aenean. At elementum eu facilisis sed odio morbi quis. Adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus urna. Commodo quis imperdiet massa tincidunt nunc pulvinar. Feugiat in ante metus dictum at tempor commodo ullamcorper a. Lectus mauris ultrices eros in cursus turpis massa tincidunt. Ut porttitor leo a diam sollicitudin tempor id eu.', 0, 'approved'),
(2, 2, 3, 'Tournament', 'Football', '2023-08-06', '../../images/sc.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Turpis egestas pretium aenean pharetra magna ac. Nulla porttitor massa id neque. Amet consectetur adipiscing elit ut aliquam purus sit. Diam maecenas sed enim ut sem. Tempor commodo ullamcorper a lacus vestibulum sed arcu non. Rhoncus est pellentesque elit ullamcorper dignissim cras tincidunt lobortis feugiat. Facilisis sed odio morbi quis commodo odio aenean sed. Gravida arcu ac tortor dignissim convallis aenean. At elementum eu facilisis sed odio morbi quis. Adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus urna. Commodo quis imperdiet massa tincidunt nunc pulvinar. Feugiat in ante metus dictum at tempor commodo ullamcorper a. Lectus mauris ultrices eros in cursus turpis massa tincidunt. Ut porttitor leo a diam sollicitudin tempor id eu.', 0, 'approved'),
(3, 2, 2, 'Tournament', 'Indoor Games', '2023-08-02', '../../images/sc.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Turpis egestas pretium aenean pharetra magna ac. Nulla porttitor massa id neque. Amet consectetur adipiscing elit ut aliquam purus sit. Diam maecenas sed enim ut sem. Tempor commodo ullamcorper a lacus vestibulum sed arcu non. Rhoncus est pellentesque elit ullamcorper dignissim cras tincidunt lobortis feugiat. Facilisis sed odio morbi quis commodo odio aenean sed. Gravida arcu ac tortor dignissim convallis aenean. At elementum eu facilisis sed odio morbi quis. Adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus urna. Commodo quis imperdiet massa tincidunt nunc pulvinar. Feugiat in ante metus dictum at tempor commodo ullamcorper a. Lectus mauris ultrices eros in cursus turpis massa tincidunt. Ut porttitor leo a diam sollicitudin tempor id eu.', 0, 'approved'),
(4, 1, 1, 'Championship', 'Debate Compitition', '2023-08-26', '../../images/dc.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Turpis egestas pretium aenean pharetra magna ac. Nulla porttitor massa id neque. Amet consectetur adipiscing elit ut aliquam purus sit. Diam maecenas sed enim ut sem. Tempor commodo ullamcorper a lacus vestibulum sed arcu non. Rhoncus est pellentesque elit ullamcorper dignissim cras tincidunt lobortis feugiat. Facilisis sed odio morbi quis commodo odio aenean sed. Gravida arcu ac tortor dignissim convallis aenean. At elementum eu facilisis sed odio morbi quis. Adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus urna. Commodo quis imperdiet massa tincidunt nunc pulvinar. Feugiat in ante metus dictum at tempor commodo ullamcorper a. Lectus mauris ultrices eros in cursus turpis massa tincidunt. Ut porttitor leo a diam sollicitudin tempor id eu.      ', 0, 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `clubmember`
--

CREATE TABLE `clubmember` (
  `memberId` int(11) NOT NULL,
  `clubId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `clubRole` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clubmember`
--

INSERT INTO `clubmember` (`memberId`, `clubId`, `userId`, `clubRole`, `status`) VALUES
(1, 2, 3, 'member', 'approved'),
(2, 1, 2, 'member', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE `clubs` (
  `clubId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `clubName` varchar(200) DEFAULT NULL,
  `clubWork` varchar(200) DEFAULT NULL,
  `clubGoal` varchar(200) DEFAULT NULL,
  `clubDescription` varchar(1000) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`clubId`, `userId`, `clubName`, `clubWork`, `clubGoal`, `clubDescription`, `image`) VALUES
(1, 1, 'Debate Club', 'Debate', 'Debate Championship', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'dc.png'),
(2, 2, 'Sports Club', 'Sports', 'Win Champion Cup', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'sc.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `FirstName` varchar(200) DEFAULT NULL,
  `LastName` varchar(200) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `FirstName`, `LastName`, `phone`, `email`, `password`, `image`) VALUES
(1, 'Arnisha', 'Akhter', '01712475893', 'arnisha@gmail.com', '1234', '../images/arnisha.jpg'),
(2, 'Abdul', 'Mobin', '01759425951', 'abdulmobin417@gmail.com', '1234', '../images/sc.jpg'),
(3, 'Dipto', 'Pal', '01759425952', 'diptopal@gmail.com', '1234', '../images/'),
(4, 'Rifat', 'Hasan', '01759425952', 'rifatr729@gmail.com', '1234', '../images/events-logo.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clubevent`
--
ALTER TABLE `clubevent`
  ADD PRIMARY KEY (`eventId`,`clubId`,`userId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `clubId` (`clubId`);

--
-- Indexes for table `clubmember`
--
ALTER TABLE `clubmember`
  ADD PRIMARY KEY (`memberId`,`clubId`,`userId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `clubId` (`clubId`);

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`clubId`,`userId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clubevent`
--
ALTER TABLE `clubevent`
  MODIFY `eventId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clubmember`
--
ALTER TABLE `clubmember`
  MODIFY `memberId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `clubId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clubevent`
--
ALTER TABLE `clubevent`
  ADD CONSTRAINT `clubevent_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clubevent_ibfk_2` FOREIGN KEY (`clubId`) REFERENCES `clubs` (`clubId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `clubmember`
--
ALTER TABLE `clubmember`
  ADD CONSTRAINT `clubmember_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clubmember_ibfk_2` FOREIGN KEY (`clubId`) REFERENCES `clubs` (`clubId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `clubs`
--
ALTER TABLE `clubs`
  ADD CONSTRAINT `clubs_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
