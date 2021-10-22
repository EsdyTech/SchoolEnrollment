-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2021 at 01:09 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentreg`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `Id` int(10) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`Id`, `firstName`, `lastName`, `email`, `password`) VALUES
(1, 'Adekunle', 'Olayiwola', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tblclasses`
--

CREATE TABLE `tblclasses` (
  `Id` int(10) NOT NULL,
  `className` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblclasses`
--

INSERT INTO `tblclasses` (`Id`, `className`) VALUES
(2, 'Nursery Two'),
(3, 'Primary One'),
(4, 'Primary Four'),
(5, 'Nursery One');

-- --------------------------------------------------------

--
-- Table structure for table `tbldepartment`
--

CREATE TABLE `tbldepartment` (
  `Id` int(10) NOT NULL,
  `facultyId` varchar(10) NOT NULL,
  `departmentName` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldepartment`
--

INSERT INTO `tbldepartment` (`Id`, `facultyId`, `departmentName`) VALUES
(1, '1', 'Computer Science'),
(2, '1', 'Science and Laboratory Technology'),
(3, '2', 'Public Administration'),
(7, '2', 'Business Administration'),
(6, '1', 'Statistics');

-- --------------------------------------------------------

--
-- Table structure for table `tbldocuments`
--

CREATE TABLE `tbldocuments` (
  `Id` int(10) NOT NULL,
  `regNo` varchar(255) NOT NULL,
  `originCert` varchar(255) NOT NULL,
  `birthCert` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldocuments`
--

INSERT INTO `tbldocuments` (`Id`, `regNo`, `originCert`, `birthCert`) VALUES
(5, 'LNDPOLY/2019/2020/000001', '29ea77d2009a5d54a0fff47a6d996507.jpg', '2aa8f5a08b848564bd37551dbcaeecc8.jpg'),
(6, 'LNDPOLY/2019/2020/000002', 'a8887cbcfb0ee78d8351afcaaf31dcd3.jpg', '2f5c92fc67f6ab05b0fb8f8a6e2d581f.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbleducation`
--

CREATE TABLE `tbleducation` (
  `Id` int(10) NOT NULL,
  `regNo` varchar(255) NOT NULL,
  `classRequired` varchar(50) NOT NULL,
  `formerSchool` varchar(255) NOT NULL,
  `formerClass` varchar(50) NOT NULL,
  `formerSchoolAddress` varchar(255) NOT NULL,
  `reasonForLeaving` varchar(255) NOT NULL,
  `transferCertNo` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbleducation`
--

INSERT INTO `tbleducation` (`Id`, `regNo`, `classRequired`, `formerSchool`, `formerClass`, `formerSchoolAddress`, `reasonForLeaving`, `transferCertNo`) VALUES
(13, '61210fc9bc09e', 'Primary One', 'S-Triumph Intl School', 'Primary One', '21, Banana Island', 'None', 'AKFA93003');

-- --------------------------------------------------------

--
-- Table structure for table `tblfaculty`
--

CREATE TABLE `tblfaculty` (
  `Id` int(10) NOT NULL,
  `facultyName` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblfaculty`
--

INSERT INTO `tblfaculty` (`Id`, `facultyName`) VALUES
(1, 'Pure and Applied Science'),
(2, 'Business and Management Studies'),
(4, 'Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `tblguardian`
--

CREATE TABLE `tblguardian` (
  `Id` int(10) NOT NULL,
  `regNo` varchar(255) NOT NULL,
  `guardianName` varchar(255) NOT NULL,
  `guardianAddress` varchar(255) NOT NULL,
  `guardianPhoneNo` varchar(50) NOT NULL,
  `officeAddress` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblguardian`
--

INSERT INTO `tblguardian` (`Id`, `regNo`, `guardianName`, `guardianAddress`, `guardianPhoneNo`, `officeAddress`, `occupation`) VALUES
(1, 'LNDPOLY/2019/2020/000001', 'Sadiq', 'Address', '090890009', '', ''),
(2, 'LNDPOLY/2019/2020/000002', 'Adeyemo', 'Adeyemo Street', '09087765544', '', ''),
(3, '61210fc9bc09e', 'Ahmed Sodiq Ola', '21, Ajagun Street', '09089009988', '23, Victoria Island', 'Teacher');

-- --------------------------------------------------------

--
-- Table structure for table `tblinitialreg`
--

CREATE TABLE `tblinitialreg` (
  `Id` int(10) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `otherName` varchar(255) NOT NULL,
  `emailAddress` varchar(255) NOT NULL,
  `phoneNo` varchar(50) NOT NULL,
  `regNo` varchar(255) NOT NULL,
  `admissionNo` varchar(50) NOT NULL,
  `isRegComplete` varchar(5) NOT NULL,
  `isApproved` varchar(10) NOT NULL,
  `dateApproved` varchar(50) NOT NULL,
  `dateCreated` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblinitialreg`
--

INSERT INTO `tblinitialreg` (`Id`, `firstName`, `lastName`, `otherName`, `emailAddress`, `phoneNo`, `regNo`, `admissionNo`, `isRegComplete`, `isApproved`, `dateApproved`, `dateCreated`) VALUES
(6, 'Sadiq', 'Ahmed', 'Ola', 'Ahmedsodiq7@gmail.com', '0708988889999', '61210fc9bc09e', '', '1', '2', '', '2021-08-21'),
(7, 'Samuel', 'Bamidele', 'Kunle', 'Ahmedsodiq7@gmail.com', '09087778899', '612251f22c22d', '', '0', '0', '', '2021-08-22');

-- --------------------------------------------------------

--
-- Table structure for table `tblnextofkin`
--

CREATE TABLE `tblnextofkin` (
  `Id` int(10) NOT NULL,
  `regNo` varchar(255) NOT NULL,
  `nextofkinName` varchar(255) NOT NULL,
  `nextofkinAddress` varchar(255) NOT NULL,
  `nextofkinPhoneNo` varchar(50) NOT NULL,
  `nextofkinRelationship` varchar(255) NOT NULL,
  `officeAddress` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblnextofkin`
--

INSERT INTO `tblnextofkin` (`Id`, `regNo`, `nextofkinName`, `nextofkinAddress`, `nextofkinPhoneNo`, `nextofkinRelationship`, `officeAddress`, `occupation`) VALUES
(3, '61210fc9bc09e', 'Kayode', '21, Cele Ijesha', '09087763628', 'Brother', '6, Adekunle Crescent', 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `tblpassports`
--

CREATE TABLE `tblpassports` (
  `Id` int(10) NOT NULL,
  `regNo` varchar(255) NOT NULL,
  `studentPassport` varchar(10000) NOT NULL,
  `parentPassport` varchar(10000) NOT NULL,
  `dateCreated` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpassports`
--

INSERT INTO `tblpassports` (`Id`, `regNo`, `studentPassport`, `parentPassport`, `dateCreated`) VALUES
(8, 'LNDPOLY/2019/2020/000001', '9fffca456ab68c999d228add9fd9094c.jpg', '', '2020-10-25'),
(9, 'LNDPOLY/2019/2020/000002', '1f5c01e0cb39bd7c5598c3b29bcdec5c.jpg', '', '2020-10-28'),
(10, '61210fc9bc09e', 'e90335f9c4f3ba2bc98ddb297c809a4e.jpg', 'd028ae199d42a73c695a7d5e5884cd6d.jpg', '2021-08-22');

-- --------------------------------------------------------

--
-- Table structure for table `tblpayments`
--

CREATE TABLE `tblpayments` (
  `Id` int(10) NOT NULL,
  `regNo` varchar(255) NOT NULL,
  `transactionId` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `dateCreated` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpayments`
--

INSERT INTO `tblpayments` (`Id`, `regNo`, `transactionId`, `amount`, `dateCreated`) VALUES
(1, 'LNDPOLY/2019/2020/000001', 'T197522404079738', '15000', '2020-10-27'),
(7, 'LNDPOLY/2019/2020/000002', 'T403297824656617', '25000', '2020-10-28'),
(8, '61210fc9bc09e', 'T797613220292018', '5000', '2021-08-22');

-- --------------------------------------------------------

--
-- Table structure for table `tblpersonaldata`
--

CREATE TABLE `tblpersonaldata` (
  `Id` int(10) NOT NULL,
  `regNo` varchar(255) NOT NULL,
  `surName` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `middleName` varchar(255) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `phoneNo` varchar(20) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `lga` varchar(255) NOT NULL,
  `weight` varchar(10) NOT NULL,
  `height` varchar(10) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `placeOfBirth` varchar(255) NOT NULL,
  `dateCreated` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpersonaldata`
--

INSERT INTO `tblpersonaldata` (`Id`, `regNo`, `surName`, `firstName`, `middleName`, `sex`, `phoneNo`, `dob`, `address`, `nationality`, `state`, `lga`, `weight`, `height`, `religion`, `placeOfBirth`, `dateCreated`) VALUES
(4, '61210fc9bc09e', 'Ahmed', 'Sadiq', 'Ola', 'Male', '0708988889999', '15-03-1993', '23,Agunlejika', 'Nigerian', 'Ogun', 'Abeokuta', '12', '23', 'Islam', 'Lagos Ikotun', '2021-08-21');

-- --------------------------------------------------------

--
-- Table structure for table `tblprogramme`
--

CREATE TABLE `tblprogramme` (
  `Id` int(10) NOT NULL,
  `regNo` varchar(255) NOT NULL,
  `programmeTypeId` varchar(10) NOT NULL,
  `programmeModeId` varchar(10) NOT NULL,
  `facultyId` varchar(10) NOT NULL,
  `departmentId` varchar(10) NOT NULL,
  `sessionId` varchar(10) NOT NULL,
  `passport` varchar(255) NOT NULL,
  `dateCreated` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblprogramme`
--

INSERT INTO `tblprogramme` (`Id`, `regNo`, `programmeTypeId`, `programmeModeId`, `facultyId`, `departmentId`, `sessionId`, `passport`, `dateCreated`) VALUES
(8, 'LNDPOLY/2019/2020/000001', '2', '2', '2', '7', '1', '9fffca456ab68c999d228add9fd9094c.jpg', '2020-10-25'),
(9, 'LNDPOLY/2019/2020/000002', '2', '1', '2', '3', '1', '1f5c01e0cb39bd7c5598c3b29bcdec5c.jpg', '2020-10-28');

-- --------------------------------------------------------

--
-- Table structure for table `tblprogrammefees`
--

CREATE TABLE `tblprogrammefees` (
  `Id` int(10) NOT NULL,
  `programmeTypeId` varchar(255) NOT NULL,
  `programmeModeId` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblprogrammefees`
--

INSERT INTO `tblprogrammefees` (`Id`, `programmeTypeId`, `programmeModeId`, `amount`) VALUES
(1, '2', '2', '15000'),
(2, '2', '1', '25000'),
(3, '1', '2', '16000'),
(5, '1', '1', '12000');

-- --------------------------------------------------------

--
-- Table structure for table `tblprogrammemode`
--

CREATE TABLE `tblprogrammemode` (
  `Id` int(10) NOT NULL,
  `modeName` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblprogrammemode`
--

INSERT INTO `tblprogrammemode` (`Id`, `modeName`) VALUES
(1, 'Full-Time'),
(2, 'Part-Time');

-- --------------------------------------------------------

--
-- Table structure for table `tblprogrammetype`
--

CREATE TABLE `tblprogrammetype` (
  `Id` int(10) NOT NULL,
  `typeName` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblprogrammetype`
--

INSERT INTO `tblprogrammetype` (`Id`, `typeName`) VALUES
(1, 'National Diploma'),
(2, 'Higher National Diploma');

-- --------------------------------------------------------

--
-- Table structure for table `tblregistrationfee`
--

CREATE TABLE `tblregistrationfee` (
  `Id` int(10) NOT NULL,
  `fee` varchar(50) NOT NULL,
  `dateCreated` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblregistrationfee`
--

INSERT INTO `tblregistrationfee` (`Id`, `fee`, `dateCreated`) VALUES
(3, '4000', '2021-08-22');

-- --------------------------------------------------------

--
-- Table structure for table `tblresult`
--

CREATE TABLE `tblresult` (
  `Id` int(10) NOT NULL,
  `regNo` varchar(255) NOT NULL,
  `candidateExamName` varchar(255) NOT NULL,
  `examNo` varchar(255) NOT NULL,
  `examDate` varchar(50) NOT NULL,
  `examType` varchar(255) NOT NULL,
  `sitting` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblresult`
--

INSERT INTO `tblresult` (`Id`, `regNo`, `candidateExamName`, `examNo`, `examDate`, `examType`, `sitting`) VALUES
(3, 'LNDPOLY/2019/2020/000001', 'Ahmed Sodiq', 'ADHABDK0901', '10-11-2012', 'WAEC', 'First'),
(4, 'LNDPOLY/2019/2020/000001', 'Ahmed Sodiq', 'GFDH9930NNF', '10-21-2012', 'NECO', 'Second'),
(5, 'LNDPOLY/2019/2020/000002', 'Samuel Adeyemi', 'ASHJLL90D99', '10-11-2012', 'WAEC', 'First'),
(6, 'LNDPOLY/2019/2020/000002', 'Adeyemi Samuel', 'GFDH9930NNF', '10-21-2012', 'GCE', 'Second');

-- --------------------------------------------------------

--
-- Table structure for table `tblresultdetails`
--

CREATE TABLE `tblresultdetails` (
  `Id` int(10) NOT NULL,
  `regNo` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `sitting` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblresultdetails`
--

INSERT INTO `tblresultdetails` (`Id`, `regNo`, `subject`, `grade`, `sitting`) VALUES
(29, 'LNDPOLY/2019/2020/000001', 'Home Economics', 'B2', 'Second'),
(27, 'LNDPOLY/2019/2020/000001', 'Chemistry', 'C5', 'First'),
(28, 'LNDPOLY/2019/2020/000001', 'Mathematics', 'A1', 'Second'),
(26, 'LNDPOLY/2019/2020/000001', 'Home Economics', 'B3', 'First'),
(24, 'LNDPOLY/2019/2020/000001', 'Home Economics', 'B2', 'First'),
(25, 'LNDPOLY/2019/2020/000001', 'Biology', 'C5', 'First'),
(23, 'LNDPOLY/2019/2020/000001', 'Government', 'B3', 'First'),
(22, 'LNDPOLY/2019/2020/000001', 'Chemistry', 'F9', 'First'),
(21, 'LNDPOLY/2019/2020/000001', 'Physics', 'C4', 'First'),
(19, 'LNDPOLY/2019/2020/000001', 'Mathematics', 'A1', 'First'),
(20, 'LNDPOLY/2019/2020/000001', 'English', 'B2', 'First'),
(30, 'LNDPOLY/2019/2020/000001', 'Biology', 'C4', 'Second'),
(31, 'LNDPOLY/2019/2020/000001', 'English', 'B2', 'Second'),
(32, 'LNDPOLY/2019/2020/000001', 'Chemistry', 'B3', 'Second'),
(33, 'LNDPOLY/2019/2020/000001', 'Physics', 'B3', 'Second'),
(34, 'LNDPOLY/2019/2020/000001', 'Home Economics', 'C4', 'Second'),
(35, 'LNDPOLY/2019/2020/000001', 'Government', 'B2', 'Second'),
(36, 'LNDPOLY/2019/2020/000001', 'Chemistry', 'C6', 'Second'),
(37, 'LNDPOLY/2019/2020/000002', 'Mathematics', 'B2', 'First'),
(38, 'LNDPOLY/2019/2020/000002', 'English', 'C5', 'First'),
(39, 'LNDPOLY/2019/2020/000002', 'Chemistry', 'C4', 'First'),
(40, 'LNDPOLY/2019/2020/000002', 'Physics', 'C4', 'First'),
(41, 'LNDPOLY/2019/2020/000002', 'Government', 'B3', 'First'),
(42, 'LNDPOLY/2019/2020/000002', 'Home Economics', 'C5', 'First'),
(43, 'LNDPOLY/2019/2020/000002', 'Biology', 'B2', 'First'),
(44, 'LNDPOLY/2019/2020/000002', 'Yoruba Language', 'F9', 'First'),
(45, 'LNDPOLY/2019/2020/000002', 'Yoruba Language', 'F9', 'First'),
(46, 'LNDPOLY/2019/2020/000002', 'Mathematics', 'C4', 'Second'),
(47, 'LNDPOLY/2019/2020/000002', 'English', 'B2', 'Second'),
(48, 'LNDPOLY/2019/2020/000002', 'Chemistry', 'C4', 'Second'),
(49, 'LNDPOLY/2019/2020/000002', 'Physics', 'C4', 'Second'),
(50, 'LNDPOLY/2019/2020/000002', 'Government', 'C4', 'Second'),
(51, 'LNDPOLY/2019/2020/000002', 'Home Economics', 'B2', 'Second'),
(52, 'LNDPOLY/2019/2020/000002', 'Biology', 'B2', 'Second'),
(53, 'LNDPOLY/2019/2020/000002', 'Yoruba Language', 'C6', 'Second'),
(54, 'LNDPOLY/2019/2020/000002', 'Yoruba Language', 'C6', 'Second');

-- --------------------------------------------------------

--
-- Table structure for table `tblsession`
--

CREATE TABLE `tblsession` (
  `Id` int(10) NOT NULL,
  `sessionName` varchar(50) NOT NULL,
  `isActive` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsession`
--

INSERT INTO `tblsession` (`Id`, `sessionName`, `isActive`) VALUES
(1, '2019/2020', '1'),
(3, '2020/2021', '0'),
(5, '2021/2022', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubjects`
--

CREATE TABLE `tblsubjects` (
  `Id` int(10) NOT NULL,
  `subjectName` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubjects`
--

INSERT INTO `tblsubjects` (`Id`, `subjectName`) VALUES
(1, 'Mathematics'),
(2, 'English'),
(3, 'Chemistry'),
(4, 'Physics'),
(5, 'Government'),
(6, 'Home Economics'),
(7, 'Biology'),
(9, 'Yoruba Language');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblclasses`
--
ALTER TABLE `tblclasses`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbldepartment`
--
ALTER TABLE `tbldepartment`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbldocuments`
--
ALTER TABLE `tbldocuments`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbleducation`
--
ALTER TABLE `tbleducation`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblfaculty`
--
ALTER TABLE `tblfaculty`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblguardian`
--
ALTER TABLE `tblguardian`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblinitialreg`
--
ALTER TABLE `tblinitialreg`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblnextofkin`
--
ALTER TABLE `tblnextofkin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblpassports`
--
ALTER TABLE `tblpassports`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblpayments`
--
ALTER TABLE `tblpayments`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblpersonaldata`
--
ALTER TABLE `tblpersonaldata`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblprogramme`
--
ALTER TABLE `tblprogramme`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblprogrammefees`
--
ALTER TABLE `tblprogrammefees`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblprogrammemode`
--
ALTER TABLE `tblprogrammemode`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblprogrammetype`
--
ALTER TABLE `tblprogrammetype`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblregistrationfee`
--
ALTER TABLE `tblregistrationfee`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblresult`
--
ALTER TABLE `tblresult`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblresultdetails`
--
ALTER TABLE `tblresultdetails`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblsession`
--
ALTER TABLE `tblsession`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblsubjects`
--
ALTER TABLE `tblsubjects`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblclasses`
--
ALTER TABLE `tblclasses`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbldepartment`
--
ALTER TABLE `tbldepartment`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbldocuments`
--
ALTER TABLE `tbldocuments`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbleducation`
--
ALTER TABLE `tbleducation`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblfaculty`
--
ALTER TABLE `tblfaculty`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblguardian`
--
ALTER TABLE `tblguardian`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblinitialreg`
--
ALTER TABLE `tblinitialreg`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblnextofkin`
--
ALTER TABLE `tblnextofkin`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblpassports`
--
ALTER TABLE `tblpassports`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblpayments`
--
ALTER TABLE `tblpayments`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblpersonaldata`
--
ALTER TABLE `tblpersonaldata`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblprogramme`
--
ALTER TABLE `tblprogramme`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblprogrammefees`
--
ALTER TABLE `tblprogrammefees`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblprogrammemode`
--
ALTER TABLE `tblprogrammemode`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblprogrammetype`
--
ALTER TABLE `tblprogrammetype`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblregistrationfee`
--
ALTER TABLE `tblregistrationfee`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblresult`
--
ALTER TABLE `tblresult`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblresultdetails`
--
ALTER TABLE `tblresultdetails`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tblsession`
--
ALTER TABLE `tblsession`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblsubjects`
--
ALTER TABLE `tblsubjects`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
