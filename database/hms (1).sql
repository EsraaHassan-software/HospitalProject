-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2020 at 02:47 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `updationDate`) VALUES
(1, 'admin', 'Test@12345', '28-12-2016 11:42:05 AM');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `doctorName` varchar(255) NOT NULL,
  `patientName` varchar(255) DEFAULT NULL,
  `patientAddress` varchar(255) DEFAULT NULL,
  `patientEmail` varchar(255) DEFAULT NULL,
  `patientNumber` int(11) NOT NULL,
  `patientGender` tinyint(1) NOT NULL,
  `patientAge` int(11) NOT NULL,
  `consultancyFees` int(11) DEFAULT NULL,
  `appointmentDate` date DEFAULT NULL,
  `appointmentTime` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `doctorName`, `patientName`, `patientAddress`, `patientEmail`, `patientNumber`, `patientGender`, `patientAge`, `consultancyFees`, `appointmentDate`, `appointmentTime`) VALUES
(3, 'c@hotmail.com', 'Demo test', '7', '6', 0, 0, 0, 600, '2019-06-29', '09:15:00'),
(4, 'c@hotmail.com', 'Ayurveda', '5', '5', 0, 0, 0, 8050, '2019-11-08', '01:00:00'),
(5, 'c@hotmail.com', 'Dermatologist', '9', '7', 0, 0, 0, 500, '2019-11-30', '05:30:00'),
(6, 't@hotmail.com', 'testtttt', NULL, 'asas@asa.com', 1234, 0, 12, 200, '2020-05-19', '09:30:00'),
(7, 't@hotmail.com', 'Ahmed', NULL, 'ahmed_a1@hotma.com', 12, 0, 123, 123, '2020-05-28', '10:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `doctorName` varchar(255) DEFAULT NULL,
  `address` longtext,
  `docFees` varchar(255) DEFAULT NULL,
  `contactno` bigint(11) DEFAULT NULL,
  `docGender` tinyint(1) NOT NULL,
  `docEmail` varchar(255) DEFAULT NULL,
  `password` varchar(8) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `doctorName`, `address`, `docFees`, `contactno`, `docGender`, `docEmail`, `password`, `creationDate`, `updationDate`) VALUES
(6, 'Amrita', 'New Delhi India', '2500', 45497964, 0, 'amrita@test.com', 'f925916e', '2017-01-07 07:52:50', '0000-00-00 00:00:00'),
(7, 'abc ', 'New Delhi India', '200', 852888888, 0, 'test@demo.com', 'f925916e', '2017-01-07 08:08:58', '2019-06-23 18:17:25'),
(8, 'Test Doctor', 'Xyz Abc New Delhi', '600', 1234567890, 0, 'test@test.com', '202cb962', '2019-06-23 17:57:43', '2019-06-23 18:06:06'),
(9, 'Anuj kumar', 'New Delhi India 110001', '500', 1234567890, 0, 'anujk@test.com', 'f925916e', '2019-11-10 18:37:47', '2019-11-10 18:38:10'),
(10, 'esraa', 'jhk', '200', 5020, 0, 'esraa@hotmail.com', '5f4dcc3b', '2020-04-01 14:08:46', NULL),
(11, 'habiba', 'bhkbkh', '200', 0, 0, 'habiba@hotmail.com', '4c3bc7a0', '2020-04-01 15:52:22', NULL),
(12, 'ahmed el gamal', 'vghvsjcs', '200', 672725, 0, 'ahmed@hotmail.com', '32aa2fd8', '2020-04-02 12:50:55', NULL),
(13, 'Hanaa Hassan', 'nasr city', '200', 115865135, 0, 'hanaa@hotmail.com', '0f64c5a0', '2020-04-14 01:01:54', NULL),
(14, 'Dina Mubarak', 'nasr city', '1000', 6515165, 0, 'dina@hotmail.com', '9b37a3ea', '2020-04-14 01:10:28', NULL),
(15, 'mohamed ayman', 'njkdenjln', '200', 151533325, 0, 'ayman@hotmail.com', '8b9a866c', '2020-04-28 16:03:41', NULL),
(16, 'mohamed ayman', 'njkdenjln', '200', 151533325, 0, 'ayman@hotmail.com', '8b9a866c', '2020-04-28 16:06:40', NULL),
(17, 'mohamed ayman', 'njkdenjln', '200', 151533325, 0, 'ayman@hotmail.com', '8b9a866c', '2020-04-28 16:08:50', NULL),
(18, 'esraaa', 'bkcjsbkjbjka', '200', 26503213, 0, 'soso@hotmail.com', '151a6c01', '2020-04-28 16:09:46', NULL),
(19, 'esraaa', 'bkcjsbkjbjka', '200', 26503213, 0, 'soso@hotmail.com', '151a6c01', '2020-04-28 16:12:23', NULL),
(20, 'esraaa', 'bkcjsbkjbjka', '200', 26503213, 0, 'soso@hotmail.com', '151a6c01', '2020-04-28 16:15:39', NULL),
(21, 'esso', 'bchsba', '200', 5615103516, 0, 'esso@hotmail.com', 'e74aac87', '2020-04-28 16:17:18', NULL),
(22, 'haitham', 'gvgjv', '200', 512, 0, 'haitham@hotmail.com', 'f2f702b3', '2020-04-29 15:05:14', NULL),
(23, 'ncjs', 'hvjk', '200', 352, 0, 'h@hotmail.com', '533107c2', '2020-04-29 15:34:17', NULL),
(24, 'jbkb', 'hvj', '200', 3656, 0, 'r@hotmai.com', '7b7d211a', '2020-04-29 15:36:43', NULL),
(25, 'bhbk', 'njl', '200', 11351, 0, 'c@hotmail.com', 'c123', '2020-04-29 15:44:18', NULL),
(26, 'ddv', 'jbk', '200', 30, 0, 'g@hotmail.com', 'g123', '2020-04-29 15:46:31', NULL),
(27, 'nn', 'bkkj', '200', 1531, 0, 'k@hotmail.com', 'k123', '2020-04-29 15:58:56', NULL),
(28, 'de', 'njn', '200', 1561, 0, 't@hotmail.com', 't1234', '2020-04-29 19:01:06', NULL),
(29, 'bhb', 'hjvh', '200', 1565, 0, 'u@hotmail.com', 'u123', '2020-04-29 19:06:57', NULL),
(30, 'jn', 'bjkb', '200', 354, 0, 'y@hotmail.com', 'y123', '2020-04-29 19:14:16', NULL),
(31, 'vgjv', 'bjkb', '200', 5131, 0, 'b@hotmail.com', 'b123', '2020-04-29 19:18:01', NULL),
(32, 'bjkb', 'vhk', '200', 5113, 0, 'o@hotmail.com', 'o123', '2020-04-29 19:25:41', NULL),
(33, 'hb', 'hbh', '200', 5153, 0, 'v@hotmail.com', 'v123', '2020-04-29 19:44:18', NULL),
(35, 'bdjkbs', 'vhkv', '200', 23, 0, 'dks@hotmail.com', '1234', '2020-05-07 21:10:12', NULL),
(36, 'sbjska', 'jkbk', '15', 1561, 0, 'esraaa@hotmail.com', 'esraaaaa', '2020-05-09 02:18:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `receptionists`
--

CREATE TABLE `receptionists` (
  `id` int(255) NOT NULL,
  `recname` varchar(255) NOT NULL,
  `address` varchar(25520) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `contact_no` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receptionists`
--

INSERT INTO `receptionists` (`id`, `recname`, `address`, `gender`, `contact_no`, `email`, `password`) VALUES
(2, 'esraa', 'vgjvj', 0, 200, 'ess@hotmail.com', 'db11f535a21e24f3cec2025619d56e0d'),
(3, 'esraa', 'bkcdbwk', 0, 20051, 'esraa@gmail.com', '2e4ad08ce8698cbb00ff2bda974d1c4e'),
(4, 'mai', 'vjvjj', 0, 20, 'mai@hotmail.com', '6db4ef0c498f805460d4db55d103c4de'),
(5, 'shaza', 'maadi', 0, 10000, 'shaza@gmail.com', '6639235fc9a3c7587102150be47ab1be'),
(6, 'hjj ', '  nhjbhj', 0, 200, 'hj@hotmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(7, 'sfafs', 'hb j', 0, 2035, 'f@hotmail.com', '6c1cae8d3d715d2e1759d64b2e91fe83'),
(8, 'bksjb', 'jwbek', 0, 200, 'p@hotmail.com', '46bf36a7193438f81fccc9c4bcc8343e'),
(10, 'hhh', 'jvh', 0, 2050, 'shizo@hotmail.com', 'd5f685ab325832a4c382e977698f05fa'),
(11, 'bjbl', 'bljbl', 0, 1516, 'bshkbak@hotmail.com', '73a6bf63c58f7732c94823db3b7d6d26'),
(12, 'esraa', 'bbkjb', 0, 51321, 'esraaaa@hotmail.com', 'af1967db784ca5fbe1b45f87a7abfa9c');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contactNO` int(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `address` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `medicalHistory` varchar(255) NOT NULL,
  `bloodPressure` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `bloodSugar` int(11) NOT NULL,
  `bodyTemp` int(11) NOT NULL,
  `prescription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `name`, `contactNO`, `email`, `gender`, `address`, `age`, `medicalHistory`, `bloodPressure`, `weight`, `bloodSugar`, `bodyTemp`, `prescription`) VALUES
(1, 'hcksj', 2535, 'esraa@hotmail.com', 0, 'vhsvkah', 21, 'cgjvjmvjg', 20, 55, 25, 30, 'nvdjlnldnvl'),
(2, 'vvaj', 60, 't@hotmail.com', 0, ' h nj', 20, ' vjbjh', 20, 20, 20, 20, 'jmnl'),
(5, '', 2535, 'esraa@hotmail.com', 0, 'vhsvkah', 21, 'cgjvjmvjg', 20, 55, 25, 30, 'mn'),
(6, '', 20, 'esraa@hotmail.com', 0, 'vhsvkah', 21, 'cgjvjmvjg', 20, 55, 25, 30, 'nvdjlnldnvl'),
(7, '', 20, 'esraa@hotmail.com', 0, 'vhsvkah', 21, 'cgjvjmvjg', 20, 55, 25, 30, 'nvdjlnldnvl'),
(8, 'Ahmed', 6206065, 'cc@hotmail.com', 0, 'bkhb', 20, 'knl', 20, 20, 20, 37, 'gjvkv');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactus`
--

CREATE TABLE `tblcontactus` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` bigint(12) DEFAULT NULL,
  `message` mediumtext,
  `PostingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `AdminRemark` mediumtext,
  `LastupdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `IsRead` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcontactus`
--

INSERT INTO `tblcontactus` (`id`, `fullname`, `email`, `contactno`, `message`, `PostingDate`, `AdminRemark`, `LastupdationDate`, `IsRead`) VALUES
(1, 'test user', 'test@gmail.com', 2523523522523523, ' This is sample text for the test.', '2019-06-29 19:03:08', 'Test Admin Remark', '2019-06-30 12:55:23', 1),
(2, 'Anuj kumar', 'phpgurukulofficial@gmail.com', 1111111111111111, ' This is sample text for testing.  This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing.', '2019-06-30 13:06:50', NULL, NULL, NULL),
(3, 'fdsfsdf', 'fsdfsd@ghashhgs.com', 3264826346, 'sample text   sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  ', '2019-11-10 18:53:48', 'vfdsfgfd', '2019-11-10 18:54:04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblmedicalhistory`
--

CREATE TABLE `tblmedicalhistory` (
  `ID` int(10) NOT NULL,
  `PatientID` int(10) DEFAULT NULL,
  `BloodPressure` varchar(200) DEFAULT NULL,
  `BloodSugar` varchar(200) NOT NULL,
  `Weight` varchar(100) DEFAULT NULL,
  `Temperature` varchar(200) DEFAULT NULL,
  `MedicalPres` mediumtext,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmedicalhistory`
--

INSERT INTO `tblmedicalhistory` (`ID`, `PatientID`, `BloodPressure`, `BloodSugar`, `Weight`, `Temperature`, `MedicalPres`, `CreationDate`) VALUES
(2, 3, '120/185', '80/120', '85 Kg', '101 degree', '#Fever, #BP high\r\n1.Paracetamol\r\n2.jocib tab\r\n', '2019-11-06 04:20:07'),
(3, 2, '90/120', '92/190', '86 kg', '99 deg', '#Sugar High\r\n1.Petz 30', '2019-11-06 04:31:24'),
(4, 1, '125/200', '86/120', '56 kg', '98 deg', '# blood pressure is high\r\n1.koil cipla', '2019-11-06 04:52:42'),
(5, 1, '96/120', '98/120', '57 kg', '102 deg', '#Viral\r\n1.gjgjh-1Ml\r\n2.kjhuiy-2M', '2019-11-06 04:56:55'),
(6, 4, '90/120', '120', '56', '98 F', '#blood sugar high\r\n#Asthma problem', '2019-11-06 14:38:33'),
(7, 5, '80/120', '120', '85', '98.6', 'Rx\r\n\r\nAbc tab\r\nxyz Syrup', '2019-11-10 18:50:23');

-- --------------------------------------------------------

--
-- Table structure for table `tblpatient`
--

CREATE TABLE `tblpatient` (
  `ID` int(10) NOT NULL,
  `Docid` int(10) DEFAULT NULL,
  `PatientName` varchar(200) DEFAULT NULL,
  `PatientContno` bigint(10) DEFAULT NULL,
  `PatientEmail` varchar(200) DEFAULT NULL,
  `PatientGender` varchar(50) DEFAULT NULL,
  `PatientAdd` mediumtext,
  `PatientAge` int(10) DEFAULT NULL,
  `PatientMedhis` mediumtext,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpatient`
--

INSERT INTO `tblpatient` (`ID`, `Docid`, `PatientName`, `PatientContno`, `PatientEmail`, `PatientGender`, `PatientAdd`, `PatientAge`, `PatientMedhis`, `CreationDate`, `UpdationDate`) VALUES
(1, 1, 'Manisha Jha', 4558968789, 'test@gmail.com', 'Female', '\"\"J&K Block J-127, Laxmi Nagar New Delhi', 26, 'She is diabetic patient', '2019-11-04 21:38:06', '2019-11-06 06:48:05'),
(2, 5, 'Raghu Yadav', 9797977979, 'raghu@gmail.com', 'Male', 'ABC Apartment Mayur Vihar Ph-1 New Delhi', 39, 'No', '2019-11-05 10:40:13', '2019-11-05 11:53:45'),
(3, 7, 'Mansi', 9878978798, 'jk@gmail.com', 'Female', '\"fdghyj', 46, 'No', '2019-11-05 10:49:41', '2019-11-05 11:58:59'),
(4, 7, 'Manav Sharma', 9888988989, 'sharma@gmail.com', 'Male', 'L-56,Ashok Nagar New Delhi-110096', 45, 'He is long suffered by asthma', '2019-11-06 14:33:54', '2019-11-06 14:34:31'),
(5, 9, 'John', 1234567890, 'john@test.com', 'male', 'Test ', 25, 'THis is sample text for testing.', '2019-11-10 18:49:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `address` longtext,
  `city` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `regDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullName`, `address`, `city`, `gender`, `email`, `password`, `regDate`, `updationDate`) VALUES
(2, 'Sarita pandey', 'New Delhi India', 'Delhi', 'female', 'test@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2016-12-30 05:34:39', '0000-00-00 00:00:00'),
(3, 'Amit', 'New Delhi', 'New delhi', 'male', 'amit@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2017-01-07 06:36:53', '0000-00-00 00:00:00'),
(4, 'Rahul Singh', 'New Delhi', 'New delhi', 'male', 'rahul@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2017-01-07 07:41:14', '0000-00-00 00:00:00'),
(5, 'Amit kumar', 'New Delhi India', 'Delhi', 'male', 'amit12@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2017-01-07 08:00:26', '0000-00-00 00:00:00'),
(6, 'Test user', 'New Delhi', 'Delhi', 'male', 'tetuser@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2019-06-23 18:24:53', '2019-06-23 18:36:09'),
(7, 'John', 'USA', 'Newyork', 'male', 'john@test.com', 'f925916e2754e5e03f75dd58a5733251', '2019-11-10 18:40:21', '2019-11-10 18:40:51'),
(8, 'esraa hassan', 'feveve', 'cedvr', 'female', 'esraa@hotmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2020-04-01 13:42:54', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receptionists`
--
ALTER TABLE `receptionists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcontactus`
--
ALTER TABLE `tblcontactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblmedicalhistory`
--
ALTER TABLE `tblmedicalhistory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpatient`
--
ALTER TABLE `tblpatient`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `receptionists`
--
ALTER TABLE `receptionists`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblcontactus`
--
ALTER TABLE `tblcontactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblmedicalhistory`
--
ALTER TABLE `tblmedicalhistory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblpatient`
--
ALTER TABLE `tblpatient`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
