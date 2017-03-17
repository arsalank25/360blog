-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2017 at 06:44 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `360blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `bloguser`
--

CREATE TABLE `bloguser` (
  `userName` varchar(255) NOT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `userStatus` tinyint(4) DEFAULT '1',
  `userType` tinyint(4) DEFAULT NULL,
  `dp` longblob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bloguser`
--

INSERT INTO `bloguser` (`userName`, `pass`, `LastName`, `FirstName`, `email`, `bio`, `userStatus`, `userType`, `dp`) VALUES
('arsalan', '1a1dc91c907325c69271ddf0c944bc72', 'Khan', 'Arsalan', 'arsalank25@gmail.com', NULL, 1, NULL, NULL),
('jimmy', 'bf24ea1bbc01cb00b1603c3aa8b292ee', 'jim', 'jim', 'jim@hotmail.com', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `ID` int(11) NOT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `theText` varchar(3000) DEFAULT NULL,
  `postStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`ID`, `topic`, `theText`, `postStamp`, `userName`) VALUES
(6, 'this is a title ', 'asdf', '2017-03-16 00:56:46', NULL),
(7, 'Big white ', 'okanagan powder. okanagan powder.\r\nokanagan powder.\r\nokanagan powder.okanagan powder.', '2017-03-16 20:30:58', NULL),
(8, 'What to do when you do ', 'wearh;lksajdf;lasdkjf;asdlkfhas;ljfhas;lfnasc;poaewifn;awoifhnaw;oufh', '2017-03-16 20:34:27', NULL),
(9, 'We have to do it ', ';waifj;oaseifja;soidcmas;eoifjas;doifhas;doigthsf;dklasmdn;caosiehrf;asklj Enter Post here', '2017-03-16 20:35:14', NULL),
(10, 'Some random Stuff off the internet', '400 SweÂ­dish Krona for cauÂ­sing â€œactionâ€ in front of the camera. That offer was alleÂ­gedly given to a group of local youths in the StoÂ­ckÂ­holm suburb of RinÂ­keby. The offer came from a RusÂ­sian tv crew, two of the young men tell Danish media Radio24syv. 400 SweÂ­dish Krona for cauÂ­sing â€œactionâ€ in front of the camera. That offer was alleÂ­gedly given to a group of local youths in the StoÂ­ckÂ­holm suburb of RinÂ­keby. The offer came from a RusÂ­sian tv crew, two of the young men tell Danish media Radio24syv. 400 SweÂ­dish Krona for cauÂ­sing â€œactionâ€ in front of the camera. That offer was alleÂ­gedly given to a group of local youths in the StoÂ­ckÂ­holm suburb of RinÂ­keby. The offer came from a RusÂ­sian tv crew, two of the young men tell Danish media Radio24syv. 400 SweÂ­dish Krona for cauÂ­sing â€œactionâ€ in front of the camera. That offer was alleÂ­gedly given to a group of local youths in the StoÂ­ckÂ­holm suburb of RinÂ­keby. The offer came from a RusÂ­sian tv crew, two of the young men tell Danish media Radio24syv. 400 SweÂ­dish Krona for cauÂ­sing â€œactionâ€ in front of the camera. That offer was alleÂ­gedly given to a group of local youths in the StoÂ­ckÂ­holm suburb of RinÂ­keby. The offer came from a RusÂ­sian tv crew, two of the young men tell Danish media Radio24syv. 400 SweÂ­dish Krona for cauÂ­sing â€œactionâ€ in front of the camera. That offer was alleÂ­gedly given to a group of local youths in the StoÂ­ckÂ­holm suburb of RinÂ­keby. The offer came from a RusÂ­sian tv crew, two of the young men tell Danish media Radio24syv. 400 SweÂ­dish Krona for cauÂ­sing â€œactionâ€ in front of the camera. That offer was alleÂ­gedly given to a group of local youths in the StoÂ­ckÂ­holm suburb of RinÂ­keby. The offer came from a RusÂ­sian tv crew, two of the young men tell Danish media Radio24syv. 400 SweÂ­dish Krona for cauÂ­sing â€œactionâ€ in front of the camera. That offer was alleÂ­gedly given to a group of local youths in the StoÂ­ckÂ­holm suburb of RinÂ­keby. The offer came from a RusÂ­sian tv crew, two of the young men tell Danish media Radio24syv. 400 SweÂ­dish Krona for cauÂ­sing â€œactionâ€ in front of the camera. That offer was alleÂ­gedly given to a group of local youths in the StoÂ­ckÂ­holm suburb of RinÂ­keby. The offer came from a RusÂ­sian tv crew, two of the young men tell Danish media Radio24syv.', '2017-03-16 21:20:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `postcomment`
--

CREATE TABLE `postcomment` (
  `ID` int(11) NOT NULL,
  `postID` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `comment` varchar(500) DEFAULT NULL,
  `postStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `postcomment`
--

INSERT INTO `postcomment` (`ID`, `postID`, `userName`, `comment`, `postStamp`) VALUES
(19, 6, 'arsalan', 'sfaasfasfdads', '2017-03-16 23:41:11'),
(21, 7, 'arsalan', 'safasfdasfdasfdasf', '2017-03-16 23:42:51'),
(33, 10, 'arsalan', '  asdfasdf', '2017-03-16 23:50:32'),
(34, 6, 'arsalan', '  this is indeed a title ', '2017-03-16 23:50:48'),
(35, 6, 'arsalan', '  this is indeed a title sadfasdf', '2017-03-16 23:53:53'),
(36, 6, 'arsalan', '  this is indeed a title sadfasdf', '2017-03-16 23:54:02'),
(45, 6, 'arsalan', '  sadfasdf', '2017-03-17 00:07:10'),
(46, 6, 'arsalan', '  this is a new coment \r\n', '2017-03-17 00:07:17'),
(47, 6, 'arsalan', '  brand spanking new ', '2017-03-17 00:07:25'),
(48, 6, 'arsalan', '  brand spanking new ', '2017-03-17 00:07:26'),
(49, 7, 'arsalan', '  new comment yo', '2017-03-17 00:07:48'),
(50, 7, 'arsalan', '  SICKKK', '2017-03-17 00:19:44'),
(51, 7, 'arsalan', '  afkjhasdfsdfafasf', '2017-03-17 00:23:13'),
(52, 7, 'arsalan', 'new new new ', '2017-03-17 00:23:45'),
(53, 7, 'arsalan', '  hew comment ', '2017-03-17 02:36:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bloguser`
--
ALTER TABLE `bloguser`
  ADD PRIMARY KEY (`userName`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userName` (`userName`);

--
-- Indexes for table `postcomment`
--
ALTER TABLE `postcomment`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userName` (`userName`),
  ADD KEY `postID` (`postID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `postcomment`
--
ALTER TABLE `postcomment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`userName`) REFERENCES `bloguser` (`userName`) ON DELETE CASCADE;

--
-- Constraints for table `postcomment`
--
ALTER TABLE `postcomment`
  ADD CONSTRAINT `postcomment_ibfk_1` FOREIGN KEY (`userName`) REFERENCES `bloguser` (`userName`) ON DELETE CASCADE,
  ADD CONSTRAINT `postcomment_ibfk_2` FOREIGN KEY (`postID`) REFERENCES `post` (`ID`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
