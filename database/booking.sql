-- phpMyAdmin SQL Dump
-- version 6.0.0-dev+20230729.a55a4cba2b
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2023 at 10:28 AM
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
-- Database: `booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_t`
--

CREATE TABLE `booking_t` (
  `BookingId` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `service_type` varchar(30) NOT NULL,
  `Participants` int(20) NOT NULL,
  `VenueId` int(11) NOT NULL,
  `requament` varchar(70) NOT NULL,
  `Date` date NOT NULL,
  `S_time` time NOT NULL,
  `E_time` time NOT NULL,
  `letter` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_t`
--

INSERT INTO `booking_t` (`BookingId`, `customerId`, `name`, `service_type`, `Participants`, `VenueId`, `requament`, `Date`, `S_time`, `E_time`, `letter`, `status`) VALUES
(35, 17, 'Wizara ya Afya', 'Meeting', 30, 7, 'none', '2023-07-05', '23:04:00', '04:05:00', 'default', 1),
(36, 14, 'Hashim Abdallah', 'Wedding', 270, 5, 'Chair and Table', '2023-07-30', '23:04:00', '23:45:00', 'default', 0),
(37, 14, 'Shuwar', 'Cinference', 23, 8, 'thanks', '2023-07-06', '21:03:00', '08:09:00', 'file_hashimabdallah@gmail.com_1690758541.pdf', 1),
(38, 14, 'Darkmind org', 'Meeting', 16, 8, 'nothing', '2023-07-13', '14:42:00', '03:53:00', 'default', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `commentId` int(11) NOT NULL,
  `comPhone` int(15) NOT NULL,
  `comName` varchar(50) NOT NULL,
  `comEmail` varchar(50) NOT NULL,
  `comMessage` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`commentId`, `comPhone`, `comName`, `comEmail`, `comMessage`) VALUES
(1, 773035777, 'Hashim abdallah', 'hashimabdallah72@gmail.com', 'I love your services, but you need more venue'),
(2, 657774684, 'Abdul Malik', 'Malik069@gmail.com', 'Good Work'),
(3, 67235521, 'Burhan', 'burahan@gmail.com', 'i like your services'),
(4, 3859032, 'mimi', 'mimi@gmil.com', 'good web');

-- --------------------------------------------------------

--
-- Table structure for table `cutomers`
--

CREATE TABLE `cutomers` (
  `customerId` int(11) NOT NULL,
  `fullName` varchar(50) NOT NULL,
  `Phone` int(20) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cutomers`
--

INSERT INTO `cutomers` (`customerId`, `fullName`, `Phone`, `userId`) VALUES
(13, 'Hashim Abdallah', 773035777, 15),
(14, 'Hashim Abdalla seif', 655783777, 16),
(15, 'Said Suleiman', 773035779, 17),
(16, 'darkmind', 655783777, 18),
(17, 'Farida Abdalla', 678342132, 19);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentId` int(11) NOT NULL,
  `BookingId` int(11) NOT NULL,
  `reference_no` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentId`, `BookingId`, `reference_no`) VALUES
(2, 35, 2147483647),
(4, 36, 8789698),
(6, 37, 2147483647),
(7, 38, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `roleID` int(11) NOT NULL,
  `roleName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roleID`, `roleName`) VALUES
(1, 'admin'),
(2, 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `roleID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `Email`, `Password`, `roleID`) VALUES
(1, 'admin007@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 1),
(15, 'hashimabdallah72@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', 1),
(16, 'hashimabdallah@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', 2),
(17, 'Said74@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', 2),
(18, 'darkmind@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', 1),
(19, 'Farida34@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', 2);

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `venueId` int(11) NOT NULL,
  `v_Name` varchar(20) NOT NULL,
  `phone` int(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `capacity` int(100) NOT NULL,
  `location` varchar(20) NOT NULL,
  `Service` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL,
  `Price` int(30) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`venueId`, `v_Name`, `phone`, `email`, `capacity`, `location`, `Service`, `description`, `Price`, `image`) VALUES
(5, 'Main Hall', 773035777, 'hashimabdallah@gmail.com', 400, 'Maruhubi', 'Chairs, projector, table ', 'This venue you suitable for wengings, ceremony and other pop', 1000000, 'img__1687259083.JPG'),
(7, 'Theater', 773035777, 'MaruhubiSuza2023@gmail.com', 80, 'Maruhubi,Suza Campus', 'Projection, Audio, Seating, Event Management, Technical Support', 'Welcome to our state-of-the-art theater venue where every moment becomes an unforgettable experience.Here\'s what sets us apart:\r\nAdvanced Technology, Luxurious Seating, Intimate Atmosphere and Accessibility for All.', 500000, 'img_admin007@gmail.com_1688541424.JPG'),
(8, 'Conference', 773035777, 'MaruhubiSuza2023@gmail.com', 45, 'Suza,Maruhubi campus', 'Good Facilities, Customizable Spaces, Convinient Location', 'Our conference venue boast a contemporary and stylish design, creating a professional and inspiring atmosphere for your event. The venue features modern architecture, ample natural light, and high technology to enhance your conference experience.', 400000, 'img_admin007@gmail.com_1688755836.JPG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_t`
--
ALTER TABLE `booking_t`
  ADD PRIMARY KEY (`BookingId`),
  ADD KEY `customer_FK` (`customerId`),
  ADD KEY `venue_FK` (`VenueId`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`commentId`);

--
-- Indexes for table `cutomers`
--
ALTER TABLE `cutomers`
  ADD PRIMARY KEY (`customerId`),
  ADD KEY `user_FK` (`userId`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentId`),
  ADD KEY `booking_FK` (`BookingId`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roleID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `roleID_fk` (`roleID`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`venueId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_t`
--
ALTER TABLE `booking_t`
  MODIFY `BookingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `commentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cutomers`
--
ALTER TABLE `cutomers`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `roleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `venueId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_t`
--
ALTER TABLE `booking_t`
  ADD CONSTRAINT `customer_FK` FOREIGN KEY (`customerId`) REFERENCES `cutomers` (`customerId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `venue_FK` FOREIGN KEY (`VenueId`) REFERENCES `venue` (`venueId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cutomers`
--
ALTER TABLE `cutomers`
  ADD CONSTRAINT `user_FK` FOREIGN KEY (`userId`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `booking_FK` FOREIGN KEY (`BookingId`) REFERENCES `booking_t` (`BookingId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `roleID_fk` FOREIGN KEY (`roleID`) REFERENCES `roles` (`roleID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
