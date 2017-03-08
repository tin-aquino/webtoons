-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2017 at 08:17 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `capstone`
--

-- --------------------------------------------------------

--
-- Table structure for table `wt_accounts`
--

CREATE TABLE IF NOT EXISTS `wt_accounts` (
`accountID` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `accountType` enum('admin','user','employee') NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `setQ` tinyint(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `wt_accounts`
--

INSERT INTO `wt_accounts` (`accountID`, `username`, `password`, `accountType`, `status`, `setQ`) VALUES
(1, '2013012345', '827ccb0eea8a706c4c34a16891f84e7b', 'admin', 'active', 1),
(2, '2014012345', '827ccb0eea8a706c4c34a16891f84e7b', 'admin', 'active', 1),
(3, 'user', '827ccb0eea8a706c4c34a16891f84e7b', 'user', 'active', 1),
(4, 'user2', '827ccb0eea8a706c4c34a16891f84e7b', 'user', 'active', 1),
(5, '2015012345', '827ccb0eea8a706c4c34a16891f84e7b', 'employee', 'active', 1),
(6, '2016012345', '827ccb0eea8a706c4c34a16891f84e7b', 'employee', 'active', 1),
(7, '2011011111', '901f998392c0193b7f64a5a812a9ab7a', 'admin', 'active', 1),
(8, '2017012345', '827ccb0eea8a706c4c34a16891f84e7b', 'admin', 'inactive', 1),
(9, '2009012345', 'f4a48caf86c655c4e290ff82582473cf', 'employee', 'inactive', 1),
(10, '2002022222', '05b0b7c4d59d59d7733903b9af20fa93', 'employee', 'active', 1),
(11, 'rheaC', '827ccb0eea8a706c4c34a16891f84e7b', 'user', 'active', 1),
(12, 'jec_amb', '827ccb0eea8a706c4c34a16891f84e7b', 'user', 'active', 0),
(13, 'joshalba', '827ccb0eea8a706c4c34a16891f84e7b', 'user', 'active', 0),
(14, 'greggory', '827ccb0eea8a706c4c34a16891f84e7b', 'user', 'active', 1),
(15, 'poleenomial', '827ccb0eea8a706c4c34a16891f84e7b', 'user', 'active', 0),
(16, '2008012345', '48f3722a4d62cb13743270388601ba0a', 'admin', 'inactive', 0),
(17, 'ralppp', '827ccb0eea8a706c4c34a16891f84e7b', 'user', 'active', 0),
(18, '2013057014', 'a720302c7700bded3ae1f351981e16bd', 'admin', 'active', 0),
(19, '2001012345', '5f01c3eab5ac5e524da9972dc97cbea1', 'employee', 'active', 0),
(20, 'rapper', '827ccb0eea8a706c4c34a16891f84e7b', 'user', 'active', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wt_admin`
--

CREATE TABLE IF NOT EXISTS `wt_admin` (
`adminID` int(11) NOT NULL,
  `accountID` int(11) NOT NULL,
  `idnum` varchar(20) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `wt_admin`
--

INSERT INTO `wt_admin` (`adminID`, `accountID`, `idnum`, `lname`, `fname`, `mname`, `email`) VALUES
(1, 1, '2013012345', 'Urie', 'Brendon', 'Boyd', 'patd@gmail.com'),
(2, 2, '2014012345', 'Stumph', 'Patrick', 'Martin', 'fob@gmail.com'),
(3, 7, '2011011111', 'Cruz', 'Kamilo Aldous', 'Cruz', 'milo@gmail.com'),
(4, 8, '2017012345', 'Guevarra', 'Erin Janela', 'Lantican', 'ernz@gmail.com'),
(5, 16, '2008012345', 'Ciceron', 'Randell Christopher', 'Almanzor', 'rc@gmail.com'),
(6, 18, '2013057014', 'Aquino', 'Kristine', 'Ancheta', 'tin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `wt_choices`
--

CREATE TABLE IF NOT EXISTS `wt_choices` (
`choiceID` int(11) NOT NULL,
  `webtoonID` int(11) NOT NULL,
  `choice` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wt_employee`
--

CREATE TABLE IF NOT EXISTS `wt_employee` (
`employeeID` int(11) NOT NULL,
  `accountID` int(11) NOT NULL,
  `idnum` varchar(20) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `wt_employee`
--

INSERT INTO `wt_employee` (`employeeID`, `accountID`, `idnum`, `lname`, `fname`, `mname`, `email`) VALUES
(1, 5, '2015012345', 'Agudo', 'Rommel Rian', 'Baricanosa', 'rommel@gmail.com'),
(2, 6, '2016012345', 'Elazegui', 'Benjamin', 'Adan', 'micoy@gmail.com'),
(3, 9, '2009012345', 'Roxas', 'Patrixia Dawn', 'Rollon', 'dawn@gmail.com'),
(4, 10, '2002022222', 'Sibal', 'Naomi Joy', 'Soriano', 'mahonie@gmail.com'),
(5, 19, '2001012345', 'dela Cruz', 'Juan', 'Manuel', 'jdc@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `wt_likes`
--

CREATE TABLE IF NOT EXISTS `wt_likes` (
`likeID` int(11) NOT NULL,
  `webtoonID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `likes` tinyint(1) NOT NULL,
  `dateLiked` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `wt_likes`
--

INSERT INTO `wt_likes` (`likeID`, `webtoonID`, `userID`, `likes`, `dateLiked`) VALUES
(1, 1, 1, 1, '2017-03-07 00:00:00'),
(2, 8, 1, 1, '2017-03-07 12:04:59'),
(3, 1, 2, 1, '2017-03-07 12:08:35'),
(4, 8, 2, 1, '2017-03-07 12:16:16'),
(5, 7, 2, 1, '2017-03-07 12:16:50'),
(6, 9, 2, 1, '2017-03-07 12:20:17');

-- --------------------------------------------------------

--
-- Table structure for table `wt_responses`
--

CREATE TABLE IF NOT EXISTS `wt_responses` (
`responseID` int(11) NOT NULL,
  `webtoonID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `response` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `dateAnswered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `wt_responses`
--

INSERT INTO `wt_responses` (`responseID`, `webtoonID`, `userID`, `response`, `age`, `dateAnswered`) VALUES
(1, 7, 2, 'yes', 21, '2017-03-06 12:35:15'),
(2, 2, 2, 'red', 21, '2017-03-06 12:36:09'),
(3, 7, 1, 'yes', 21, '2017-03-07 03:35:50');

-- --------------------------------------------------------

--
-- Table structure for table `wt_secqa`
--

CREATE TABLE IF NOT EXISTS `wt_secqa` (
`secID` int(11) NOT NULL,
  `accountID` int(11) NOT NULL,
  `q1` int(11) NOT NULL,
  `a1` varchar(50) NOT NULL,
  `q2` int(11) NOT NULL,
  `a2` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `wt_secqa`
--

INSERT INTO `wt_secqa` (`secID`, `accountID`, `q1`, `a1`, `q2`, `a2`) VALUES
(1, 1, 2, 'Patrick', 7, 'Jeep'),
(2, 2, 2, 'Tin', 8, 'Sampaloc'),
(3, 3, 1, 'Molina', 6, 'Tita maye'),
(4, 4, 3, '2009', 10, 'Tennis'),
(5, 5, 1, 'Elipse2', 9, '1956'),
(6, 6, 4, '10', 7, 'BMW'),
(7, 7, 2, 'Randell', 8, 'Pritil'),
(8, 9, 4, '24', 6, 'Tita Tess'),
(9, 11, 3, '2003', 9, '1950'),
(10, 8, 2, 'Marie', 6, 'Anita'),
(11, 10, 3, '2010', 8, 'Batangas'),
(12, 14, 4, '10', 7, 'Mazda'),
(13, 20, 3, '2003', 10, 'Badminton');

-- --------------------------------------------------------

--
-- Table structure for table `wt_sqlist`
--

CREATE TABLE IF NOT EXISTS `wt_sqlist` (
`questionID` int(11) NOT NULL,
  `question` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `wt_sqlist`
--

INSERT INTO `wt_sqlist` (`questionID`, `question`) VALUES
(1, 'What is the last name of the professor that gave you your first failing grade?'),
(2, 'What is the first name of your best friend in elementary?'),
(3, 'When was the year you graduated from high school?'),
(4, 'What age did you have your first kiss?'),
(5, 'What was the name of your elementary school?'),
(6, 'Who is your favorite aunt?'),
(7, 'What is your dream car?'),
(8, 'What city did you first get lost?'),
(9, 'What year was your father born?'),
(10, 'What is your favorite sport');

-- --------------------------------------------------------

--
-- Table structure for table `wt_user`
--

CREATE TABLE IF NOT EXISTS `wt_user` (
`userID` int(11) NOT NULL,
  `accountID` int(11) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `sex` enum('M','F') NOT NULL,
  `city` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `token` int(11) NOT NULL DEFAULT '10'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `wt_user`
--

INSERT INTO `wt_user` (`userID`, `accountID`, `lname`, `fname`, `mname`, `birthday`, `sex`, `city`, `province`, `email`, `token`) VALUES
(1, 3, 'Cruz', 'Ella May', 'Mailom111', '1996-05-21', 'M', 'Bogo', 'Bulacan', 'mamaw@gmail.com', 29),
(2, 4, 'Tudio', 'Zara Mikaela', 'de Luna', '1996-04-05', 'F', 'calamba', 'laguna', 'zawa@gmail.com', 3),
(3, 11, 'Cortez', 'Rhealyn', 'Awanin', '1996-11-11', 'F', 'Tanauan', 'Cortez', 'weya@gmail.com', 10),
(4, 12, 'Ambrocio', 'Jessee Clarence', 'Balleras', '2014-05-14', 'M', 'Calamba', 'Ambrocio', 'jec@gmail.com', 10),
(5, 13, 'Alba', 'Charles Joshua', 'Mendoza', '1997-08-30', 'M', 'Batangas City', 'Alba', 'josh@gmail.com', 10),
(6, 14, 'Aseoche', 'Krej', 'Ewan', '1998-01-20', 'M', 'Victorias', 'Aseoche', 'greg@gmail.com', 10),
(7, 15, 'Conde', 'Pauline', 'Aseoche', '1996-12-23', 'F', 'BiÃ±an', 'Laguna', 'poleenomial@gmail.com', 10),
(8, 17, 'Canencia', 'Ralph Joshua', 'Estrella', '1990-10-10', 'M', 'BiÃ±an', 'Laguna', 'ralphy@gmail.com', 10),
(9, 20, 'Sevilla', 'John Robert Raphael', 'Tiongson', '1995-06-10', 'M', 'Sorsogon City', 'Sarangani', 'rapper@gmail.com', 10);

-- --------------------------------------------------------

--
-- Table structure for table `wt_webtoon`
--

CREATE TABLE IF NOT EXISTS `wt_webtoon` (
`webtoonID` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `caption` varchar(150) NOT NULL,
  `fileName` varchar(100) NOT NULL,
  `fileContent` varchar(100) NOT NULL,
  `fileSize` int(11) NOT NULL,
  `fileType` varchar(100) NOT NULL,
  `illustrator` varchar(100) NOT NULL,
  `question` varchar(250) NOT NULL,
  `choices` varchar(250) NOT NULL,
  `datetimeUpload` datetime NOT NULL,
  `tags` varchar(150) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `wt_webtoon`
--

INSERT INTO `wt_webtoon` (`webtoonID`, `title`, `caption`, `fileName`, `fileContent`, `fileSize`, `fileType`, `illustrator`, `question`, `choices`, `datetimeUpload`, `tags`, `status`) VALUES
(1, 'Kitkat', 'To be interested solely in technique would be a very superficial thing to me.', '1.jpg', '4468-1.jpg', 35859, 'image/jpeg', 'Andrew Wyeth', 'Did you experience being cyber bullied online?', 'yes, no', '2017-02-26 21:57:26', 'cute, orange, cat', 1),
(2, 'Meow', 'For the mind disturbed, the still beauty of dawn is nature''s finest balm.', '2.jpg', '16230-2.jpg', 24875, 'image/jpeg', 'Edwin Way Teal', 'What''s your favorite color?', 'red, blue, green, black', '2017-02-26 22:15:37', 'cat, cute, dark', 1),
(3, 'Kitty', 'Monday afternoons call for something sweet, moist and dense like #CostaCoffeePH new treats.', '3.jpg', '84785-3.jpg', 72049, 'image/jpeg', 'Costa', 'How old are you?', 'less than 5, 5-10, 10-18, greater than 18', '2017-02-27 09:31:01', 'white, cute, cat', 1),
(4, 'Saranghaea', 'Home can be trouble to non-cubicle dwellers so coffee shops became a sanctuary for those determined to hustle. a', '1LhVIDQ.png', '11012-1lhvidq.png', 58251, 'image/png', 'Esquirea', '', '', '2017-02-27 09:32:49', 'clipart, heart', 0),
(5, 'Meme', 'When youâ€™re not having one of their famous Ghana chocolate-spiked Mochas, try a sip of their Chai Tea LattÃ© with a slice of Bruce Bogtrotter cake.', '893281ed2704064eba587677ecb85767.jpg', '67310-893281ed2704064eba587677ecb85767.jpg', 21747, 'image/jpeg', 'Tobys Estate', '', '', '2017-02-27 10:38:38', 'meme, dog, cute', 0),
(6, 'Tiredzzzz', 'Wear our new and improved Official ICS Shirt with pride! Guaranteed quality products for this academic year.', '10406555_933418663379864_324285588679038312_n.jpg', '93626-10406555_933418663379864_324285588679038312_n.jpg', 38419, 'image/jpeg', 'ICS', '', '', '2017-03-02 06:05:30', 'meme, school', 0),
(7, 'Caaaaaaat', 'What is called genius is the abundance of life and health.', '4468-1.jpg', '75682-4468-1.jpg', 35859, 'image/jpeg', 'Henry David Thoreau', 'Do you have webcam at home?', 'yes, no', '2017-03-03 04:19:45', 'cat, orange, cute', 1),
(8, 'Hello Kitty', 'Knowing others is wisdom, knowing yourself is Enlightenment.', '16230-2.jpg', '74126-16230-2.jpg', 24875, 'image/jpeg', 'Lao Tzu', 'Do you have internet?', 'yes, no', '2017-03-03 04:36:13', 'black, cat', 1),
(9, 'Kit', 'Work like you don''t need the money. Love like you''ve never been hurt. Dance like nobody''s watching.', '84785-3.jpg', '20979-84785-3.jpg', 72049, 'image/jpeg', 'Satchel Paige', 'Do you own a personal computer?', 'yes, no', '2017-03-03 04:52:55', 'cat, white, cute', 1),
(10, 'lsdkfk', 'lkjdflk', 'IMG_0396.JPG', '12130-img_0396.jpg', 4858337, 'image/jpeg', '`lfkxjgslk', 'kslgdjglk', 'kslgdjglk', '2017-03-08 20:05:18', 'lksjfl', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wt_accounts`
--
ALTER TABLE `wt_accounts`
 ADD PRIMARY KEY (`accountID`);

--
-- Indexes for table `wt_admin`
--
ALTER TABLE `wt_admin`
 ADD PRIMARY KEY (`adminID`), ADD KEY `accountID` (`accountID`);

--
-- Indexes for table `wt_choices`
--
ALTER TABLE `wt_choices`
 ADD PRIMARY KEY (`choiceID`), ADD KEY `questionID` (`webtoonID`);

--
-- Indexes for table `wt_employee`
--
ALTER TABLE `wt_employee`
 ADD PRIMARY KEY (`employeeID`), ADD KEY `accountID` (`accountID`);

--
-- Indexes for table `wt_likes`
--
ALTER TABLE `wt_likes`
 ADD PRIMARY KEY (`likeID`), ADD KEY `webtoonID` (`webtoonID`), ADD KEY `userID` (`userID`);

--
-- Indexes for table `wt_responses`
--
ALTER TABLE `wt_responses`
 ADD PRIMARY KEY (`responseID`), ADD KEY `questionID` (`webtoonID`), ADD KEY `webtoonID` (`webtoonID`), ADD KEY `webtoonID_2` (`webtoonID`), ADD KEY `userID` (`userID`);

--
-- Indexes for table `wt_secqa`
--
ALTER TABLE `wt_secqa`
 ADD PRIMARY KEY (`secID`), ADD KEY `accountID` (`accountID`);

--
-- Indexes for table `wt_sqlist`
--
ALTER TABLE `wt_sqlist`
 ADD PRIMARY KEY (`questionID`);

--
-- Indexes for table `wt_user`
--
ALTER TABLE `wt_user`
 ADD PRIMARY KEY (`userID`), ADD KEY `accountID` (`accountID`);

--
-- Indexes for table `wt_webtoon`
--
ALTER TABLE `wt_webtoon`
 ADD PRIMARY KEY (`webtoonID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wt_accounts`
--
ALTER TABLE `wt_accounts`
MODIFY `accountID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `wt_admin`
--
ALTER TABLE `wt_admin`
MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `wt_choices`
--
ALTER TABLE `wt_choices`
MODIFY `choiceID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wt_employee`
--
ALTER TABLE `wt_employee`
MODIFY `employeeID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `wt_likes`
--
ALTER TABLE `wt_likes`
MODIFY `likeID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `wt_responses`
--
ALTER TABLE `wt_responses`
MODIFY `responseID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `wt_secqa`
--
ALTER TABLE `wt_secqa`
MODIFY `secID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `wt_sqlist`
--
ALTER TABLE `wt_sqlist`
MODIFY `questionID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `wt_user`
--
ALTER TABLE `wt_user`
MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `wt_webtoon`
--
ALTER TABLE `wt_webtoon`
MODIFY `webtoonID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `wt_admin`
--
ALTER TABLE `wt_admin`
ADD CONSTRAINT `wt_admin_ibfk_1` FOREIGN KEY (`accountID`) REFERENCES `wt_accounts` (`accountID`) ON UPDATE CASCADE;

--
-- Constraints for table `wt_choices`
--
ALTER TABLE `wt_choices`
ADD CONSTRAINT `wt_choices_ibfk_1` FOREIGN KEY (`webtoonID`) REFERENCES `wt_webtoon` (`webtoonID`);

--
-- Constraints for table `wt_employee`
--
ALTER TABLE `wt_employee`
ADD CONSTRAINT `wt_employee_ibfk_1` FOREIGN KEY (`accountID`) REFERENCES `wt_accounts` (`accountID`);

--
-- Constraints for table `wt_likes`
--
ALTER TABLE `wt_likes`
ADD CONSTRAINT `wt_likes_ibfk_1` FOREIGN KEY (`webtoonID`) REFERENCES `wt_webtoon` (`webtoonID`);

--
-- Constraints for table `wt_responses`
--
ALTER TABLE `wt_responses`
ADD CONSTRAINT `wt_responses_ibfk_1` FOREIGN KEY (`webtoonID`) REFERENCES `wt_webtoon` (`webtoonID`),
ADD CONSTRAINT `wt_responses_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `wt_user` (`userID`);

--
-- Constraints for table `wt_secqa`
--
ALTER TABLE `wt_secqa`
ADD CONSTRAINT `wt_secqa_ibfk_1` FOREIGN KEY (`accountID`) REFERENCES `wt_accounts` (`accountID`) ON UPDATE CASCADE;

--
-- Constraints for table `wt_user`
--
ALTER TABLE `wt_user`
ADD CONSTRAINT `wt_user_ibfk_1` FOREIGN KEY (`accountID`) REFERENCES `wt_accounts` (`accountID`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
