-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 09, 2015 at 04:07 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Hospital Management`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE IF NOT EXISTS `billing` (
  `patient_id` varchar(10) NOT NULL,
  `pharma_cost` decimal(10,0) NOT NULL,
  `lab_cost` decimal(10,0) NOT NULL,
  `consultation_fee` decimal(10,0) NOT NULL,
  `operation_cost` decimal(10,0) NOT NULL,
  `canteen` decimal(10,0) NOT NULL,
  `room_charge` decimal(10,0) NOT NULL,
  `total_cost` decimal(10,0) NOT NULL,
  `tax` decimal(10,0) NOT NULL,
  `billing_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `consultation`
--

CREATE TABLE IF NOT EXISTS `consultation` (
  `doctor_id` varchar(10) NOT NULL,
  `patient_id` varchar(10) NOT NULL,
  `appointment_time` datetime NOT NULL,
  `remarks` varchar(100) NOT NULL COMMENT 'if patient has to go for further tests',
  `prescription_id` varchar(10) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `prescription` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consultation`
--

INSERT INTO `consultation` (`doctor_id`, `patient_id`, `appointment_time`, `remarks`, `prescription_id`, `amount`, `prescription`) VALUES
('D1', 'P1', '2015-03-04 05:12:08', 'Fever of unknown cause', 'Pr1', '650', ''),
('D1', 'P1', '2015-03-11 00:00:00', 'Swine Flu', 'Pr2', '1000', ''),
('D1', 'P1', '2015-03-17 04:12:17', 'Swine Flu', 'Pr3', '450', ''),
('D2', 'P2', '2015-03-18 00:00:00', 'Viral infection', 'Pr4', '650', ''),
('D2', 'P2', '2015-03-25 05:08:12', 'Viral infection', 'Pr5', '450', '');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(25) NOT NULL,
  `HOD` varchar(25) NOT NULL,
  `number` int(11) NOT NULL COMMENT 'No.of employees'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`, `HOD`, `number`) VALUES
(1, 'cardiology', 'Srinivas M', 30),
(2, 'dermatology', 'Nagaraj K', 25),
(3, 'orthopaedic', 'Shankar K S', 30),
(4, 'neurology', 'Kavitha S', 25),
(5, 'pediatrics', 'Gnanamurthy', 25),
(6, 'nephrology', 'Dinesh L', 30),
(7, 'ENT', 'Vinay', 25),
(8, 'gyanacology', 'Suhasini', 15),
(9, 'dentistry', 'Mohan R', 35),
(10, 'anesthesia', 'Kiran K', 30);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE IF NOT EXISTS `doctor` (
  `name` varchar(25) NOT NULL,
  `age` int(11) NOT NULL,
  `V_type` varchar(30) NOT NULL,
  `department_id` int(11) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phno` bigint(20) NOT NULL,
  `salary` double NOT NULL,
  `doj` date NOT NULL,
  `doctor_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`name`, `age`, `V_type`, `department_id`, `qualification`, `address`, `phno`, `salary`, `doj`, `doctor_id`) VALUES
('Srinivas M', 45, 'FT', 1, '', '#25, 3rd main ,2nd stage banashankari,bangalore-75', 9845632541, 100000, '2003-05-10', 'D1'),
('Nagaraj K', 47, 'PT', 2, '', '#546, 2nd cross rajajinagar, bangalore-10', 7752345617, 109000, '2000-01-24', 'D2'),
('Shankar K S', 45, 'FT', 3, '', '#45,11th cross,vijayanagar, bangalore-28', 8965425812, 108000, '2005-07-10', 'D3'),
('Kavitha S', 52, 'PT', 4, '', '#129,2 B main, HSR layout, bangalore-81', 9663254125, 120000, '2004-11-22', 'D4'),
('Gnanamurthy', 57, 'FT', 5, '', '#129,2 B main, nandini layout, bangalore-87', 8565236412, 110000, '2002-05-20', 'D5');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_work`
--

CREATE TABLE IF NOT EXISTS `doctor_work` (
  `doctor_id` varchar(10) NOT NULL,
  `patient_id` varchar(10) NOT NULL,
  `prescription_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_work`
--

INSERT INTO `doctor_work` (`doctor_id`, `patient_id`, `prescription_id`) VALUES
('D1', 'P1', 'Pr1'),
('D1', 'P1', 'Pr2'),
('D1', 'P1', 'Pr3'),
('D2', 'P2', 'Pr4'),
('D2', 'P2', 'Pr5');

-- --------------------------------------------------------

--
-- Table structure for table `laboratory`
--

CREATE TABLE IF NOT EXISTS `laboratory` (
  `lab_id` varchar(10) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `lab_name` varchar(25) NOT NULL,
  `head` varchar(25) NOT NULL,
  `cost` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laboratory`
--

INSERT INTO `laboratory` (`lab_id`, `dept_id`, `lab_name`, `head`, `cost`) VALUES
('L1', 0, '', '', '0'),
('L2', 0, '', '', '0'),
('L3', 0, '', '', '0'),
('L4', 0, '', '', '0'),
('L5', 0, '', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `lab_patient`
--

CREATE TABLE IF NOT EXISTS `lab_patient` (
  `lab_id` varchar(10) NOT NULL,
  `patient_id` varchar(10) NOT NULL,
  `prescription_id` varchar(10) NOT NULL,
  `doctor_id` varchar(10) NOT NULL,
  `result` mediumblob NOT NULL,
  `cost` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab_patient`
--

INSERT INTO `lab_patient` (`lab_id`, `patient_id`, `prescription_id`, `doctor_id`, `result`, `cost`) VALUES
('L1', 'P1', 'Pr1', 'D1', '', '12000'),
('L1', 'P2', 'Pr4', 'D2', '', '780'),
('L2', 'P1', 'Pr2', 'D1', '', '1200'),
('L2', 'P2', 'Pr5', 'D2', '', '450'),
('L3', 'P1', 'Pr3', 'D1', '', '600');

-- --------------------------------------------------------

--
-- Table structure for table `login_table`
--

CREATE TABLE IF NOT EXISTS `login_table` (
  `role` varchar(25) NOT NULL,
  `name` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_table`
--

INSERT INTO `login_table` (`role`, `name`, `password`, `last_login`) VALUES
('Nurse', 'Asha P', 'asha', '2015-03-04 04:12:15'),
('Nurse', 'Usha R', 'usha', '2015-03-12 06:15:08'),
('Nurse', 'Archana A', 'archana', '2015-03-25 05:09:14'),
('Doctor', 'Srinivas M', 'srinivas', '2015-03-12 05:10:09'),
('Doctor', 'Nagaraj K', 'nagaraj', '2015-03-19 12:20:12');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_patient`
--

CREATE TABLE IF NOT EXISTS `medicine_patient` (
  `patient_id` varchar(10) NOT NULL,
  `medicine_id` varchar(10) NOT NULL,
  `prescription_id` varchar(10) NOT NULL,
  `cost` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nurse`
--

CREATE TABLE IF NOT EXISTS `nurse` (
  `nurse_id` varchar(10) NOT NULL,
  `n_name` varchar(25) NOT NULL,
  `n_age` int(11) NOT NULL,
  `n_qualification` varchar(30) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `doj` date NOT NULL,
  `salary` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nurse`
--

INSERT INTO `nurse` (`nurse_id`, `n_name`, `n_age`, `n_qualification`, `dept_id`, `doj`, `salary`) VALUES
('N1', 'Archana A', 25, 'BSc Nursing', 2, '2015-03-10', '15000'),
('N2', 'Ananya K', 23, 'BSc Nursing', 5, '2014-12-10', '15000'),
('N3', 'Usha R', 24, 'BSc Nursing', 2, '2014-12-17', '15000'),
('N4', 'Asha P', 24, 'BSc Nursing', 6, '2014-10-08', '15000'),
('N5', 'Anasuya T', 24, 'BSc Nursing', 6, '2014-10-08', '15000');

-- --------------------------------------------------------

--
-- Table structure for table `nurse_work`
--

CREATE TABLE IF NOT EXISTS `nurse_work` (
  `nurse_id` varchar(10) NOT NULL,
  `patient_id` varchar(10) NOT NULL,
  `shift_start` int(11) NOT NULL,
  `shift_end` int(11) NOT NULL,
  `room_no` varchar(5) NOT NULL,
  `medication` mediumblob NOT NULL,
  `food` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `patient_id` varchar(10) NOT NULL,
  `p_name` varchar(25) NOT NULL,
  `age` int(11) NOT NULL,
  `history` mediumblob NOT NULL,
  `phno` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `preference` varchar(20) NOT NULL DEFAULT 'NA',
  `type` varchar(10) NOT NULL,
  `room_no` varchar(5) NOT NULL DEFAULT 'NA'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `p_name`, `age`, `history`, `phno`, `address`, `preference`, `type`, `room_no`) VALUES
('P1', '', 0, '', 0, '', 'NA', '', 'P101'),
('P2', '', 0, '', 0, '', 'NA', '', 'SP101'),
('P3', '', 0, '', 0, '', 'NA', '', 'SP101'),
('P4', '', 0, '', 0, '', 'NA', '', 'SP101'),
('P5', '', 0, '', 0, '', 'NA', '', 'P101');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy`
--

CREATE TABLE IF NOT EXISTS `pharmacy` (
  `medicine_name` varchar(30) NOT NULL,
  `med_id` int(11) NOT NULL,
  `cost` decimal(10,0) NOT NULL,
  `date_manufacture` date NOT NULL,
  `date_expiry` date NOT NULL,
  `description` varchar(100) NOT NULL,
  `manufacturing_company` varchar(50) NOT NULL,
  `stock_available` int(11) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `room_type` varchar(20) NOT NULL,
  `room_cost` decimal(10,0) NOT NULL,
  `status` varchar(20) NOT NULL,
  `room_no` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_type`, `room_cost`, `status`, `room_no`) VALUES
('private', '3500', 'available', 'P101'),
('private', '3500', 'not available', 'P102'),
('private', '3500', 'not available', 'P103'),
('private', '3500', 'not available', 'P104'),
('private', '3500', 'available', 'P105'),
('standard', '1000', 'available', 'S101'),
('standard', '1000', 'not available', 'S102'),
('standard', '1000', 'available', 'S103'),
('standard', '1000', 'not available', 'S104'),
('standard', '1000', 'available', 'S105'),
('semiprivate', '2000', 'available', 'SP101'),
('semiprivate', '2000', 'available', 'SP102'),
('semiprivate', '2000', 'not available', 'SP103'),
('semiprivate', '2000', 'not available', 'SP104'),
('semiprivate', '2000', 'not available', 'SP105');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `s_id` varchar(10) NOT NULL,
  `s_name` varchar(25) NOT NULL,
  `age` int(11) NOT NULL,
  `s_salary` decimal(10,0) NOT NULL,
  `s_address` varchar(100) NOT NULL,
  `job` varchar(50) NOT NULL,
  `qualification` varchar(100) NOT NULL DEFAULT 'NA',
  `dept_id` int(11) NOT NULL,
  `doj` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
 ADD PRIMARY KEY (`billing_id`), ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `consultation`
--
ALTER TABLE `consultation`
 ADD PRIMARY KEY (`prescription_id`), ADD KEY `doctor_id` (`doctor_id`,`patient_id`), ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
 ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
 ADD PRIMARY KEY (`doctor_id`), ADD UNIQUE KEY `department_id` (`department_id`);

--
-- Indexes for table `doctor_work`
--
ALTER TABLE `doctor_work`
 ADD PRIMARY KEY (`doctor_id`,`patient_id`,`prescription_id`), ADD KEY `prescription_id` (`prescription_id`);

--
-- Indexes for table `laboratory`
--
ALTER TABLE `laboratory`
 ADD PRIMARY KEY (`lab_id`), ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `lab_patient`
--
ALTER TABLE `lab_patient`
 ADD PRIMARY KEY (`lab_id`,`patient_id`), ADD KEY `prescription_id` (`prescription_id`,`doctor_id`), ADD KEY `patient_id` (`patient_id`), ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `medicine_patient`
--
ALTER TABLE `medicine_patient`
 ADD PRIMARY KEY (`patient_id`,`medicine_id`), ADD KEY `prescription_id` (`prescription_id`);

--
-- Indexes for table `nurse`
--
ALTER TABLE `nurse`
 ADD PRIMARY KEY (`nurse_id`), ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `nurse_work`
--
ALTER TABLE `nurse_work`
 ADD PRIMARY KEY (`nurse_id`,`patient_id`), ADD KEY `patient_id` (`patient_id`), ADD KEY `room_no` (`room_no`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
 ADD PRIMARY KEY (`patient_id`), ADD KEY `room_no` (`room_no`), ADD KEY `room_no_2` (`room_no`);

--
-- Indexes for table `pharmacy`
--
ALTER TABLE `pharmacy`
 ADD PRIMARY KEY (`med_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
 ADD PRIMARY KEY (`room_no`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
 ADD PRIMARY KEY (`s_id`), ADD KEY `dept_id` (`dept_id`), ADD KEY `dept_id_2` (`dept_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `billing`
--
ALTER TABLE `billing`
ADD CONSTRAINT `billing_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `consultation`
--
ALTER TABLE `consultation`
ADD CONSTRAINT `consultation_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `consultation_ibfk_2` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctor_work`
--
ALTER TABLE `doctor_work`
ADD CONSTRAINT `doctor_work_ibfk_1` FOREIGN KEY (`prescription_id`) REFERENCES `consultation` (`prescription_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `doctor_work_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lab_patient`
--
ALTER TABLE `lab_patient`
ADD CONSTRAINT `lab_patient_ibfk_1` FOREIGN KEY (`lab_id`) REFERENCES `laboratory` (`lab_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `lab_patient_ibfk_2` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `lab_patient_ibfk_3` FOREIGN KEY (`prescription_id`) REFERENCES `consultation` (`prescription_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `lab_patient_ibfk_4` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `medicine_patient`
--
ALTER TABLE `medicine_patient`
ADD CONSTRAINT `medicine_patient_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `medicine_patient_ibfk_2` FOREIGN KEY (`prescription_id`) REFERENCES `consultation` (`prescription_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nurse`
--
ALTER TABLE `nurse`
ADD CONSTRAINT `nurse_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`department_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nurse_work`
--
ALTER TABLE `nurse_work`
ADD CONSTRAINT `nurse_work_ibfk_1` FOREIGN KEY (`nurse_id`) REFERENCES `nurse` (`nurse_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `nurse_work_ibfk_2` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `nurse_work_ibfk_3` FOREIGN KEY (`room_no`) REFERENCES `rooms` (`room_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`room_no`) REFERENCES `rooms` (`room_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`department_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
