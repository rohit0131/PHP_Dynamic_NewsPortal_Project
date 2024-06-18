-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2024 at 10:55 AM
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
-- Database: `news`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `User_ID` int(11) NOT NULL,
  `User_Name` varchar(255) DEFAULT NULL,
  `User_Password` varchar(255) DEFAULT NULL,
  `User_Email` varchar(255) DEFAULT NULL,
  `userType` int(11) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`User_ID`, `User_Name`, `User_Password`, `User_Email`, `userType`, `CreationDate`, `UpdationDate`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 'rohitpatil020002@gmail.com', 1, '2021-05-26 18:30:00', '2023-10-25 04:45:03'),
(3, 'subadmin', 'f925916e2754e5e03f75dd58a5733251', 'sudamin@gmail.in', 0, '2021-11-10 18:28:11', NULL),
(4, 'suadmin2', 'f925916e2754e5e03f75dd58a5733251', 'sbadmin@test.com', 0, '2021-11-10 18:28:32', NULL),
(5, 'omkar', '81dc9bdb52d04dc20036dbd8313ed055', 'omkar1234@gmail.com', 0, '2023-10-26 18:00:10', '2023-10-26 18:00:40');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `Cat_ID` int(11) NOT NULL,
  `Cat_Name` varchar(200) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `Is_Active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`Cat_ID`, `Cat_Name`, `Description`, `PostingDate`, `UpdationDate`, `Is_Active`) VALUES
(3, 'Seeds', 'Related to sports news', '2021-06-05 18:30:00', '2024-02-03 07:20:55', 1),
(5, 'Fertilizers', 'Entertainment related  News', '2021-06-13 18:30:00', '2024-02-03 07:21:19', 1),
(6, 'Equipments', 'Related to Business', '2023-10-23 07:41:20', '2024-02-03 07:21:45', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblcomments`
--

CREATE TABLE `tblcomments` (
  `id` int(11) NOT NULL,
  `Post_ID` int(11) DEFAULT NULL,
  `Name` varchar(120) DEFAULT NULL,
  `Email` varchar(150) DEFAULT NULL,
  `Comment` mediumtext DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcomments`
--

INSERT INTO `tblcomments` (`id`, `Post_ID`, `Name`, `Email`, `Comment`, `postingDate`, `status`) VALUES
(4, 18, 'Rohit patil', 'rohitpatil2023@gmail.com', 'This post is nice one.', '2023-10-23 11:45:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblpages`
--

CREATE TABLE `tblpages` (
  `id` int(11) NOT NULL,
  `Page_Name` varchar(200) DEFAULT NULL,
  `Page_Title` mediumtext DEFAULT NULL,
  `Description` longtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`id`, `Page_Name`, `Page_Title`, `Description`, `PostingDate`, `UpdationDate`) VALUES
(1, 'aboutus', 'About News Portal', '<font color=\"#7b8898\" face=\"Mercury SSm A, Mercury SSm B, Georgia, Times, Times New Roman, Microsoft YaHei New, Microsoft Yahei, å¾®è½¯é›…é»‘, å®‹ä½“, SimSun, STXihei, åŽæ–‡ç»†é»‘, serif\"><span style=\"font-size: 26px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></font><br>', '2021-06-29 18:30:00', '2021-11-06 18:30:00'),
(2, 'contactus', 'Contact Details', '<p><br></p><p><b>Address :&nbsp; </b>New Delhi India</p><p><b>Phone Number : </b>+91 -01234567890</p><p><b>Email -id : </b>phpgurukulofficial@gmail.com</p>', '2021-06-29 18:30:00', '2021-11-06 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblposts`
--

CREATE TABLE `tblposts` (
  `Post_ID` int(11) NOT NULL,
  `Post_Title` longtext DEFAULT NULL,
  `Category` int(11) DEFAULT NULL,
  `Sub_CatID` int(11) DEFAULT NULL,
  `Post_Description` longtext CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `Is_Active` int(1) DEFAULT NULL,
  `PostUrl` mediumtext DEFAULT NULL,
  `Post_Image` varchar(255) DEFAULT NULL,
  `viewCounter` int(11) DEFAULT NULL,
  `postedBy` varchar(255) DEFAULT NULL,
  `lastUpdatedBy` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblposts`
--

INSERT INTO `tblposts` (`Post_ID`, `Post_Title`, `Category`, `Sub_CatID`, `Post_Description`, `PostingDate`, `UpdationDate`, `Is_Active`, `PostUrl`, `Post_Image`, `viewCounter`, `postedBy`, `lastUpdatedBy`) VALUES
(14, 'Title 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptates facilis deserunt nobis, ', 3, NULL, '<p>Title 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptates facilis deserunt nobis, officiis praesentium ducimus quo sunt ipsam repudiandae.Title 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptates facilis deserunt nobis, officiis praesentium ducimus quo sunt ipsam repudiandae.Title 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptates facilis deserunt nobis, officiis praesentium ducimus quo sunt ipsam repudiandae.Title 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptates facilis deserunt nobis, officiis praesentium ducimus quo sunt ipsam repudiandae.Title 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptates facilis deserunt nobis, officiis praesentium ducimus quo sunt ipsam repudiandae.Title 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptates facilis deserunt nobis, officiis praesentium ducimus quo sunt ipsam repudiandae.Title 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptates facilis deserunt nobis, officiis praesentium ducimus quo sunt ipsam repudiandae.Title 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptates facilis deserunt nobis, officiis praesentium ducimus quo sunt ipsam repudiandae.<br></p>', '2023-10-23 07:07:47', '2023-10-25 09:05:46', 1, 'Title-1-Lorem-ipsum-dolor-sit-amet-consectetur-adipisicing-elit.-Quam-voluptates-facilis-deserunt-nobis,-', '7be1d38f02bff2e21dfaea9f65458b92.jpg', 5, 'admin', NULL),
(15, 'Title  Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptates facilis deserunt nobis, ', 3, NULL, '<p>&nbsp;Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptates facilis deserunt nobis, officiis praesentium ducimus quo sunt ipsam repudiandae.Title 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptates facilis deserunt nobis, officiis praesentium ducimus quo sunt ipsam repudiandae.Title 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptates facilis deserunt nobis, officiis praesentium ducimus quo sunt ipsam repudiandae.Title 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptates facilis deserunt nobis, officiis praesentium ducimus quo sunt ipsam repudiandae.Title 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptates facilis deserunt nobis, officiis praesentium ducimus quo sunt ipsam repudiandae.Title 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptates facilis deserunt nobis, officiis praesentium ducimus quo sunt ipsam repudiandae.Title 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptates facilis deserunt nobis, officiis praesentium ducimus quo sunt ipsam repudiandae.vTitle 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptates facilis deserunt nobis, officiis praesentium ducimus quo sunt ipsam repudiandae.Title 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptates facilis deserunt nobis, officiis praesentium ducimus quo sunt ipsam repudiandae.Title 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptates facilis deserunt nobis, officiis praesentium ducimus quo sunt ipsam repudiandae.<br></p>', '2023-10-23 07:14:12', '2023-10-25 06:17:03', 1, 'Title--Lorem-ipsum-dolor-sit-amet-consectetur-adipisicing-elit.-Quam-voluptates-facilis-deserunt-nobis,-', 'ada6b005c685380eeafe131548e1f75b.jpg', 4, 'admin', NULL),
(17, 'Title 2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptates facilis deserunt nobis, ', 3, NULL, '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptates facilis deserunt nobis, officiis praesentium ducimus quo sunt ipsam repudiandae.Title 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptates facilis deserunt nobis, officiis praesentium ducimus quo sunt ipsam repudiandae.Title 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptates facilis deserunt nobis, officiis praesentium ducimus quo sunt ipsam repudiandae.Title 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptates facilis deserunt nobis, officiis praesentium ducimus quo sunt ipsam repudiandae.Title 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptates facilis deserunt nobis, officiis praesentium ducimus quo sunt ipsam repudiandae.Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptates facilis deserunt nobis, officiis praesentium ducimus quo sunt ipsam repudiandae.Title 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptates facilis deserunt nobis, officiis praesentium ducimus quo sunt ipsam repudiandae.Title 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptates facilis deserunt nobis, officiis praesentium ducimus quo sunt ipsam repudiandae.Title 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptates facilis deserunt nobis, officiis praesentium ducimus quo sunt ipsam repudiandae.Title 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptates facilis deserunt nobis, officiis praesentium ducimus quo sunt ipsam repudiandae.<br></p>', '2023-10-23 07:17:30', '2024-03-21 06:58:22', 1, 'Title-2-Lorem-ipsum-dolor-sit-amet-consectetur-adipisicing-elit.-Quam-voluptates-facilis-deserunt-nobis,-', 'cd4d9c602d2bdb97e3d1ddd70d609cab.jpg', 2, 'admin', NULL),
(18, 'Title 3 Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptates facilis deserunt nobis, ', 5, NULL, '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptates facilis deserunt nobis, officiis praesentium ducimus quo sunt ipsam repudiandae.Title 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptates facilis deserunt nobis, officiis praesentium ducimus quo sunt ipsam repudiandae.Title 1 Lorem&nbsp;<br></p>', '2023-10-23 07:20:13', '2024-01-23 16:51:48', 1, 'Title-3-Lorem-ipsum-dolor-sit-amet-consectetur-adipisicing-elit.-Quam-voluptates-facilis-deserunt-nobis,-', '3aa40b3b52c2939e28aa60103493293e.jpg', 35, 'admin', NULL),
(19, 'Title 4 Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptates facilis deserunt nobis, ', 5, NULL, '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptates facilis deserunt nobis, officiis praesentium ducimus quo sunt ipsam repudiandae.Title 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptates facilis deserunt nobis, officiis praesentium ducimus quo sunt ipsam repudiandae.Title 1 Lorem&nbsp;<br></p>', '2023-10-23 07:20:46', '2024-01-23 16:53:14', 1, 'Title-4-Lorem-ipsum-dolor-sit-amet-consectetur-adipisicing-elit.-Quam-voluptates-facilis-deserunt-nobis,-', 'c8ff8520d0479c69a8d729dddcfa0384.jpg', 8, 'admin', 'admin'),
(22, 'Title 6 Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptates facilis deserunt nobis, ', 6, NULL, '<p>&nbsp;Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptates facilis deserunt nobis,&nbsp;&nbsp;Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptates facilis deserunt nobis,&nbsp;&nbsp;Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptates facilis deserunt nobis,&nbsp;&nbsp;Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptates facilis deserunt nobis,&nbsp;&nbsp;Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptates facilis deserunt nobis,&nbsp;&nbsp;Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptates facilis deserunt nobis,&nbsp;&nbsp;Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptates facilis deserunt nobis,&nbsp;&nbsp;Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptates facilis deserunt nobis,&nbsp;&nbsp;Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptates facilis deserunt nobis,&nbsp;<br></p>', '2023-10-23 07:43:15', '2024-03-21 07:01:34', 1, 'Title-6-Lorem-ipsum-dolor-sit-amet-consectetur-adipisicing-elit.-Quam-voluptates-facilis-deserunt-nobis,-', '0a2cb8eda0c51c2e0fd1e43952dff3a4.jpg', 6, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubcategory`
--

CREATE TABLE `tblsubcategory` (
  `Sub_CatID` int(11) NOT NULL,
  `Cat_ID` int(11) DEFAULT NULL,
  `Sub_Cat_Name` varchar(255) DEFAULT NULL,
  `Sub_Cat_Description` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `Is_Active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblsubcategory`
--

INSERT INTO `tblsubcategory` (`Sub_CatID`, `Cat_ID`, `Sub_Cat_Name`, `Sub_Cat_Description`, `PostingDate`, `UpdationDate`, `Is_Active`) VALUES
(3, 5, 'Bollywood ', 'Bollywood masala', '2021-06-21 18:30:00', '2021-11-07 17:59:57', 1),
(4, 3, 'Cricket', 'Cricket\r\n\r\n', '2021-06-29 18:30:00', '2021-11-07 17:59:57', 1),
(5, 3, 'Football', 'Football', '2021-06-29 18:30:00', '2021-11-07 17:59:57', 1),
(6, 5, 'Television', 'TeleVision', '2021-06-30 18:30:00', '2021-11-07 17:59:57', 1),
(11, 5, 'movies', ' ', '2023-10-30 07:35:57', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`User_ID`),
  ADD KEY `AdminUserName` (`User_Name`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`Cat_ID`);

--
-- Indexes for table `tblcomments`
--
ALTER TABLE `tblcomments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `postId` (`Post_ID`);

--
-- Indexes for table `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblposts`
--
ALTER TABLE `tblposts`
  ADD PRIMARY KEY (`Post_ID`),
  ADD KEY `id` (`Post_ID`),
  ADD KEY `postcatid` (`Category`),
  ADD KEY `postsucatid` (`Sub_CatID`),
  ADD KEY `subadmin` (`postedBy`);

--
-- Indexes for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  ADD PRIMARY KEY (`Sub_CatID`),
  ADD KEY `catid` (`Cat_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `Cat_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblcomments`
--
ALTER TABLE `tblcomments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblposts`
--
ALTER TABLE `tblposts`
  MODIFY `Post_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  MODIFY `Sub_CatID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblcomments`
--
ALTER TABLE `tblcomments`
  ADD CONSTRAINT `pid` FOREIGN KEY (`Post_ID`) REFERENCES `tblposts` (`Post_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblposts`
--
ALTER TABLE `tblposts`
  ADD CONSTRAINT `postsubcatid` FOREIGN KEY (`Sub_CatID`) REFERENCES `tblsubcategory` (`Sub_CatID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subadmin` FOREIGN KEY (`postedBy`) REFERENCES `tbladmin` (`User_Name`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  ADD CONSTRAINT `catid` FOREIGN KEY (`Cat_ID`) REFERENCES `tblcategory` (`Cat_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
