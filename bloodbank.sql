-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2018 at 12:09 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloodbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood`
--

CREATE TABLE `blood` (
  `b_ID` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blood`
--

INSERT INTO `blood` (`b_ID`, `type`) VALUES
(1, 'A+'),
(5, 'A-'),
(4, 'AB+'),
(8, 'AB-'),
(3, 'B+'),
(7, 'B-'),
(2, 'O+'),
(6, 'O-');

-- --------------------------------------------------------

--
-- Table structure for table `blood_test`
--

CREATE TABLE `blood_test` (
  `bt_ID` int(11) NOT NULL,
  `d_ID` int(11) NOT NULL,
  `time` date NOT NULL,
  `description` text,
  `file_Upload` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blood_test`
--

INSERT INTO `blood_test` (`bt_ID`, `d_ID`, `time`, `description`, `file_Upload`) VALUES
(4, 18, '2018-04-02', 'this is a good thing to donate your blood for other people', NULL),
(7, 9, '2018-04-03', 'good thing to donate by blood for the institutions', NULL),
(8, 10, '2018-04-04', 'we must to get all over the world \r\ngood thing', NULL),
(9, 18, '2018-04-04', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_ID`, `name`) VALUES
(5, 'cairo'),
(6, 'giza'),
(7, 'alexandria');

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `d_ID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `creation` date NOT NULL,
  `gender` char(2) DEFAULT NULL,
  `age` int(2) DEFAULT NULL,
  `phone` varchar(11) NOT NULL,
  `telephone` varchar(11) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city_ID` int(11) NOT NULL,
  `blood_ID` int(11) NOT NULL,
  `reg_Type` int(11) NOT NULL DEFAULT '0',
  `group_ID` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`d_ID`, `username`, `password`, `fullname`, `email`, `creation`, `gender`, `age`, `phone`, `telephone`, `address`, `city_ID`, `blood_ID`, `reg_Type`, `group_ID`) VALUES
(9, 'mohamed', 'mohamed', 'mohamed gamal', 'mohamedahmed@yahoo.com', '2018-03-31', 'm', 0, '01007820852', '', 'maadi - alnasr street', 5, 5, 1, 1),
(10, 'ahmed99', 'ahmedmohamed', 'ahmed mohamed ibrahim', 'ahmedmohamed@yahoo.com', '2018-03-31', 'm', 45, '01114097203', '', 'elma3mora', 7, 3, 1, 1),
(13, 'mostafa36', 'mostafa36ssss', 'mostafa ahmed kmal', 'mostafaahmedss@yahoo.com', '2018-03-31', 'm', 30, '01226741392', '', 'alharm street', 5, 3, 1, 0),
(14, 'elsayed129', 'elsayedmmss129', 'elsayed ibrahim ahmed', 'elsayedibrahim129@yahoo.com', '2018-03-31', 'm', 35, '01114917253', '', 'nasr city', 5, 5, 1, 0),
(15, 'moazter22', 'moazahmedterika22', 'moaz ahmed atta', 'moazahmed@yahoo.com', '2018-03-12', 'm', 20, '01143092001', '', NULL, 7, 4, 0, 0),
(17, 'shady_ahly', 'shadyahlawyaltras', '', 'shadywael17@yahoo.com', '2018-03-31', 'm', 26, '01273604892', '', '', 6, 3, 1, 0),
(18, 'shady', 'shady', 'shady mohamed ahmed', 'shady_mohamed22@yahoo.com', '2018-04-02', 'm', 33, '01247039810', '24088307', '', 6, 4, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `medical_institution`
--

CREATE TABLE `medical_institution` (
  `m_ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `hotline` varchar(255) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `account_pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `creation` date NOT NULL,
  `city_ID` int(11) NOT NULL,
  `reg_Type` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medical_institution`
--

INSERT INTO `medical_institution` (`m_ID`, `name`, `address`, `hotline`, `account_name`, `account_pass`, `email`, `creation`, `city_ID`, `reg_Type`) VALUES
(1, '57357', '', '1502', '57357', '57357', '57357cancer@yahoo.com', '2018-03-31', 5, 1),
(3, 'bahia', '', '1234', 'bahiawoman', 'bahiawoman1234', 'bahia1234@yahoo.com', '2018-03-31', 5, 1),
(4, 'alnasr', NULL, '1687', 'alnasr1687', 'alnasr1687forall', 'alnasr1687@yahoo.com', '2018-03-25', 6, 0),
(5, 'alaml', '18-elkornesh', '8090', 'alaml8090', 'alaml8090alaml', 'alaml8090@yahoo.com', '2018-03-31', 7, 0),
(6, 'altyran army', 'alabasia street ', '1333', 'altyaran', 'altyaranarmy', 'altyranarmy505@yahoo.com', '2018-03-31', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `message` text NOT NULL,
  `creation` date NOT NULL,
  `reg_type` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`ID`, `name`, `email`, `phone`, `message`, `creation`, `reg_type`) VALUES
(6, 'mohamed ahmed', 'mohamed_ahmed@yahoo.com', '01007820851', 'i need to get an improvement to activate on the website', '2018-04-01', 0),
(8, 'ahmed kamal aboraya', 'ahmed kamal', '01125419730', 'the interaction between the two sides is very easy', '2018-03-31', 0),
(9, 'ahmed kamal aboraya', 'ahmed kamal', '01125419730', 'the interaction between the two sides is very easy', '2018-03-31', 0),
(10, 'ahmed zenhom', 'ahmed_zen@yahoo.com', '01024703956', 'you are good site', '2018-04-02', 0),
(11, 'ahmed zenhom', 'ahmed_zen@yahoo.com', '01024703956', 'you are good site', '2018-04-02', 0),
(12, 'ahmed zenhom', 'ahmed_zen@yahoo.com', '01024703956', 'you are good site', '2018-04-02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `take`
--

CREATE TABLE `take` (
  `t_ID` int(11) NOT NULL,
  `bt_ID` int(11) NOT NULL,
  `m_ID` int(11) NOT NULL,
  `creation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood`
--
ALTER TABLE `blood`
  ADD PRIMARY KEY (`b_ID`),
  ADD UNIQUE KEY `type` (`type`);

--
-- Indexes for table `blood_test`
--
ALTER TABLE `blood_test`
  ADD PRIMARY KEY (`bt_ID`),
  ADD KEY `donor_test` (`d_ID`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_ID`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`d_ID`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `donorblood` (`blood_ID`),
  ADD KEY `donorcity` (`city_ID`);

--
-- Indexes for table `medical_institution`
--
ALTER TABLE `medical_institution`
  ADD PRIMARY KEY (`m_ID`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `account_name` (`account_name`),
  ADD UNIQUE KEY `hotline` (`hotline`),
  ADD KEY `institcity` (`city_ID`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `take`
--
ALTER TABLE `take`
  ADD PRIMARY KEY (`t_ID`),
  ADD KEY `medical_take` (`m_ID`),
  ADD KEY `take_test` (`bt_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blood`
--
ALTER TABLE `blood`
  MODIFY `b_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `blood_test`
--
ALTER TABLE `blood_test`
  MODIFY `bt_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `d_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `medical_institution`
--
ALTER TABLE `medical_institution`
  MODIFY `m_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `blood_test`
--
ALTER TABLE `blood_test`
  ADD CONSTRAINT `donor_test` FOREIGN KEY (`d_ID`) REFERENCES `donor` (`d_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `donor`
--
ALTER TABLE `donor`
  ADD CONSTRAINT `donorblood` FOREIGN KEY (`blood_ID`) REFERENCES `blood` (`b_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `donorcity` FOREIGN KEY (`city_ID`) REFERENCES `city` (`city_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `medical_institution`
--
ALTER TABLE `medical_institution`
  ADD CONSTRAINT `institcity` FOREIGN KEY (`city_ID`) REFERENCES `city` (`city_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `take`
--
ALTER TABLE `take`
  ADD CONSTRAINT `medical_take` FOREIGN KEY (`m_ID`) REFERENCES `medical_institution` (`m_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `take_test` FOREIGN KEY (`bt_ID`) REFERENCES `blood_test` (`bt_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
