-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 21, 2021 at 10:40 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_archives`
--

DROP TABLE IF EXISTS `account_archives`;
CREATE TABLE IF NOT EXISTS `account_archives` (
  `archive_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `number` varchar(50) DEFAULT NULL,
  `paid` int(11) DEFAULT NULL,
  `sem` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`archive_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_archives`
--

INSERT INTO `account_archives` (`archive_id`, `name`, `number`, `paid`, `sem`, `date`) VALUES
(1, 'Mahala M. Mkwepu', 'CEN/01/45/17', 200000, 1, '2021-07-28');

-- --------------------------------------------------------

--
-- Table structure for table `account_details`
--

DROP TABLE IF EXISTS `account_details`;
CREATE TABLE IF NOT EXISTS `account_details` (
  `account_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_name` varchar(50) DEFAULT NULL,
  `reg_number` varchar(25) DEFAULT NULL,
  `amount_paid` int(12) DEFAULT NULL,
  `balance` int(12) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_details`
--

INSERT INTO `account_details` (`account_id`, `student_name`, `reg_number`, `amount_paid`, `balance`, `semester`, `date`) VALUES
(16, 'Mahala M. Mkwepu', 'CEN/01/45/17', 500000, 0, 1, '2021-07-28'),
(18, 'Mahala M. Mkwepu', 'CEN/01/45/17', 500000, 0, 3, NULL),
(19, 'Mahala M. Mkwepu', 'CEN/01/45/17', 500000, 0, 4, NULL),
(20, 'Mahala M. Mkwepu', 'CEN/01/45/17', 500000, 0, 5, '2021-07-28');

-- --------------------------------------------------------

--
-- Table structure for table `allocations`
--

DROP TABLE IF EXISTS `allocations`;
CREATE TABLE IF NOT EXISTS `allocations` (
  `allocation_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `reg_number` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `hostel_id` int(11) DEFAULT NULL,
  `room_no` int(11) DEFAULT NULL,
  `bed_no` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`allocation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allocations`
--

INSERT INTO `allocations` (`allocation_id`, `user_id`, `reg_number`, `hostel_id`, `room_no`, `bed_no`, `date`, `status`) VALUES
(47, 19, 'CEN/01/64/17', 12, 1, 1, '2021-07-17', 'inactive'),
(48, 19, 'CEN/01/94/17', 12, 1, 2, '2021-07-17', 'inactive'),
(49, 19, 'CEN/01/44/17', NULL, NULL, NULL, '2021-07-17', 'inactive'),
(50, 18, 'CEN/01/94/17', 13, 1, 1, '2021-07-17', 'inactive'),
(51, 15, 'CEN/01/64/17', NULL, NULL, NULL, '2021-07-17', 'inactive'),
(52, 19, 'CEN/01/44/17', NULL, NULL, NULL, '2021-07-17', 'inactive'),
(53, 19, 'CEN/01/44/17', 13, 1, 1, '2021-07-17', 'inactive'),
(54, 18, 'CEN/01/94/17', NULL, NULL, NULL, '2021-07-17', 'inactive'),
(55, 18, 'CEN/01/94/17', 13, 1, 1, '2021-07-17', 'inactive'),
(56, 19, 'CEN/01/44/17', NULL, NULL, NULL, '2021-07-17', 'inactive'),
(57, 18, 'CEN/01/94/17', 13, 1, 1, '2021-07-17', 'inactive'),
(58, 19, 'CEN/01/44/17', NULL, NULL, NULL, '2021-07-17', 'inactive'),
(59, 18, 'CEN/01/94/17', 13, 1, 1, '2021-07-17', 'inactive'),
(60, 19, 'CEN/01/44/17', NULL, NULL, NULL, '2021-07-17', 'inactive'),
(61, 19, 'CEN/01/64/17', 13, 1, 1, '2021-07-17', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

DROP TABLE IF EXISTS `applications`;
CREATE TABLE IF NOT EXISTS `applications` (
  `application_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `reg_number` varchar(50) DEFAULT NULL,
  `hostel_id` int(11) DEFAULT NULL,
  `room_no` int(11) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`application_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`application_id`, `user_id`, `reg_number`, `hostel_id`, `room_no`, `gender`, `date`, `status`) VALUES
(10, 19, 'CEN/01/64/17', 13, 1, 'male', '2021-07-17', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `beds`
--

DROP TABLE IF EXISTS `beds`;
CREATE TABLE IF NOT EXISTS `beds` (
  `bed_id` int(11) NOT NULL AUTO_INCREMENT,
  `hostel_id` int(11) DEFAULT NULL,
  `hostel_name` varchar(50) DEFAULT NULL,
  `room_no` int(11) DEFAULT NULL,
  `bed_no` int(11) DEFAULT NULL,
  `is_taken` int(11) DEFAULT NULL,
  PRIMARY KEY (`bed_id`)
) ENGINE=InnoDB AUTO_INCREMENT=340 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beds`
--

INSERT INTO `beds` (`bed_id`, `hostel_id`, `hostel_name`, `room_no`, `bed_no`, `is_taken`) VALUES
(334, 13, 'chiswankhata', 1, 1, 1),
(335, 14, 'Mabutu', 1, 1, 0),
(336, 14, 'Mabutu', 2, 1, 0),
(337, 14, 'Mabutu', 3, 1, 0),
(338, 14, 'Mabutu', 4, 1, 0),
(339, 14, 'Mabutu', 5, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `course_details`
--

DROP TABLE IF EXISTS `course_details`;
CREATE TABLE IF NOT EXISTS `course_details` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_code` varchar(15) DEFAULT NULL,
  `course_name` varchar(25) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `program` varchar(25) DEFAULT NULL,
  `user_id` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_details`
--

INSERT INTO `course_details` (`course_id`, `course_code`, `course_name`, `semester`, `program`, `user_id`) VALUES
(1, 'CEN 1101', 'Algebra', 1, 'CEN', '27'),
(2, 'CEN 1102', 'Marriage and Family', 1, 'CEN', NULL),
(3, 'CEN 1103', 'Christian Leadership', 1, 'CEN', '21'),
(4, 'CEN 1104', 'Academic writing', 1, 'CEN', '27'),
(5, 'CEN 1105', 'Networking', 2, 'CEN', NULL),
(6, 'CEN 1106', 'C programming', 2, 'CEN', '21'),
(7, 'CEN 2101', 'C++ programming', 2, 'CEN', '27'),
(9, 'CEN 2103', 'Data Structure and Algori', 3, 'CEN', NULL),
(10, 'CEN 2104', 'Electronics 1', 3, 'CEN', '3'),
(11, 'CEN 2105', 'Artificial Intelligence', 3, 'CEN', '21'),
(12, 'CEN 2106', 'Calculus 2', 3, 'CEN', NULL),
(13, 'CEN 2107', 'Web development', 4, 'CEN', NULL),
(14, 'CEN 1102', 'Marriage and Family', 4, 'CEN', NULL),
(15, 'CEN 1103', 'Christian Leadership', 4, 'CEN', NULL),
(16, 'CEN 1104', 'Academic writing', 5, 'CEN', '21'),
(17, 'CEN 1105', 'Networking', 5, 'CEN', NULL),
(19, 'CEN 2101', 'C++ programming', 5, 'CEN', '21'),
(20, 'CEN 2102', 'Calculus 1', 6, 'CEN', '27'),
(21, 'CEN 2103', 'Data Structure and Algori', 6, 'CEN', NULL),
(23, 'CEN 2105', 'Artificial Intelligence', 6, 'CEN', '21'),
(25, 'CEN 2107', 'Web development', 7, 'CEN', NULL),
(26, 'CEN3601', 'Web development', 8, 'CEN', '21'),
(27, 'CEN4408', 'Entreprenuership', 8, 'CEN', NULL),
(28, 'FSN1101', 'Food Management', 2, 'FSN', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

DROP TABLE IF EXISTS `faculties`;
CREATE TABLE IF NOT EXISTS `faculties` (
  `faculty_id` int(11) NOT NULL AUTO_INCREMENT,
  `faculty_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`faculty_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`faculty_id`, `faculty_name`) VALUES
(1, 'Faculty of applied Sciences'),
(3, 'Faculty of Education');

-- --------------------------------------------------------

--
-- Table structure for table `grading`
--

DROP TABLE IF EXISTS `grading`;
CREATE TABLE IF NOT EXISTS `grading` (
  `grading_id` int(11) NOT NULL AUTO_INCREMENT,
  `distinction` int(11) NOT NULL,
  `credit` int(11) NOT NULL,
  `pass` int(11) NOT NULL,
  `supplementary` int(11) NOT NULL,
  `repeat_course` int(11) NOT NULL,
  `program` varchar(11) NOT NULL,
  PRIMARY KEY (`grading_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grading`
--

INSERT INTO `grading` (`grading_id`, `distinction`, `credit`, `pass`, `supplementary`, `repeat_course`, `program`) VALUES
(1, 75, 65, 45, 40, 0, 'CEN');

-- --------------------------------------------------------

--
-- Table structure for table `hostels`
--

DROP TABLE IF EXISTS `hostels`;
CREATE TABLE IF NOT EXISTS `hostels` (
  `hostel_id` int(11) NOT NULL AUTO_INCREMENT,
  `hostel_name` varchar(50) DEFAULT NULL,
  `hostel_type` varchar(10) DEFAULT NULL,
  `no_of_rooms` int(11) DEFAULT NULL,
  `no_of_beds` int(11) DEFAULT NULL,
  `current_no_of_rooms` int(11) DEFAULT NULL,
  `no_of_students` int(11) DEFAULT NULL,
  `is_full` int(11) DEFAULT NULL,
  `date_added` date DEFAULT NULL,
  PRIMARY KEY (`hostel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hostels`
--

INSERT INTO `hostels` (`hostel_id`, `hostel_name`, `hostel_type`, `no_of_rooms`, `no_of_beds`, `current_no_of_rooms`, `no_of_students`, `is_full`, `date_added`) VALUES
(13, 'chiswankhata', 'male', 1, 1, NULL, NULL, 1, '2021-07-17'),
(14, 'Mabutu', 'female', 5, 1, NULL, NULL, 0, '2021-07-24');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

DROP TABLE IF EXISTS `programs`;
CREATE TABLE IF NOT EXISTS `programs` (
  `program_id` int(11) NOT NULL AUTO_INCREMENT,
  `faculty_id` int(11) DEFAULT NULL,
  `program_name` varchar(100) DEFAULT NULL,
  `program_code` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`program_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`program_id`, `faculty_id`, `program_name`, `program_code`) VALUES
(5, 1, 'Public Health', 'BPH'),
(7, 1, 'BSc Computer Engineering', 'CEN'),
(8, 1, 'Food Security and Nutrition', 'FSN'),
(9, 1, 'Environment Management', 'ENV'),
(10, 3, 'BSc Education in Humanities', 'EDU'),
(12, 3, 'BSc Education in ICT', 'ICT');

-- --------------------------------------------------------

--
-- Table structure for table `result_archives`
--

DROP TABLE IF EXISTS `result_archives`;
CREATE TABLE IF NOT EXISTS `result_archives` (
  `arch_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `reg_number` varchar(50) DEFAULT NULL,
  `course_code` varchar(25) DEFAULT NULL,
  `exam_type` varchar(25) DEFAULT NULL,
  `grade` int(11) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  PRIMARY KEY (`arch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result_archives`
--

INSERT INTO `result_archives` (`arch_id`, `user_id`, `course_id`, `reg_number`, `course_code`, `exam_type`, `grade`, `semester`, `year`) VALUES
(72, 27, 1, 'CEN/01/45/17', 'CEN 1101', 'mid', 35, 1, 2021),
(73, 27, 1, 'CEN/01/45/17', 'CEN 1101', 'end', 35, 1, 2021),
(74, 27, 2, 'CEN/01/45/17', 'CEN 1102', 'end', 85, 1, 2021),
(75, 27, 1, 'CEN/01/64/17', 'CEN 1101', 'end', 70, 1, 2021);

-- --------------------------------------------------------

--
-- Table structure for table `result_details`
--

DROP TABLE IF EXISTS `result_details`;
CREATE TABLE IF NOT EXISTS `result_details` (
  `result_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `reg_number` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `course_code` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `exam_type` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `grade` int(11) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`result_id`)
) ENGINE=InnoDB AUTO_INCREMENT=175 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result_details`
--

INSERT INTO `result_details` (`result_id`, `user_id`, `course_id`, `reg_number`, `course_code`, `exam_type`, `grade`, `semester`, `year`, `status`) VALUES
(172, 27, 1, 'CEN/01/45/17', 'CEN 1101', 'end', 70, 1, 2021, 0),
(173, 27, 2, 'CEN/01/45/17', 'CEN 1102', 'end', 85, 1, 2021, 1),
(174, 27, 1, 'CEN/01/64/17', 'CEN 1101', 'end', 70, 1, 2021, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `room_id` int(11) NOT NULL AUTO_INCREMENT,
  `hostel_id` int(11) DEFAULT NULL,
  `hostel_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `room_no` int(11) DEFAULT NULL,
  `is_full` int(11) DEFAULT NULL,
  PRIMARY KEY (`room_id`)
) ENGINE=InnoDB AUTO_INCREMENT=225 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `hostel_id`, `hostel_name`, `room_no`, `is_full`) VALUES
(219, 13, 'chiswankhata', 1, 1),
(220, 14, 'Mabutu', 1, 0),
(221, 14, 'Mabutu', 2, 0),
(222, 14, 'Mabutu', 3, 0),
(223, 14, 'Mabutu', 4, 0),
(224, 14, 'Mabutu', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `standards`
--

DROP TABLE IF EXISTS `standards`;
CREATE TABLE IF NOT EXISTS `standards` (
  `standard_id` int(11) NOT NULL AUTO_INCREMENT,
  `distinction` int(11) NOT NULL,
  `credit` int(11) NOT NULL,
  `pass` int(11) NOT NULL,
  `supplementary` int(11) NOT NULL,
  `repeat_course` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `program` varchar(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`standard_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `standards`
--

INSERT INTO `standards` (`standard_id`, `distinction`, `credit`, `pass`, `supplementary`, `repeat_course`, `course_id`, `semester`, `year`, `program`, `status`) VALUES
(11, 48, 44, 38, 36, -5, 1, 3, 2021, 'CEN', 1);

-- --------------------------------------------------------

--
-- Table structure for table `std_requests`
--

DROP TABLE IF EXISTS `std_requests`;
CREATE TABLE IF NOT EXISTS `std_requests` (
  `request_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) DEFAULT NULL,
  `program_code` varchar(20) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`request_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

DROP TABLE IF EXISTS `student_details`;
CREATE TABLE IF NOT EXISTS `student_details` (
  `student_id` int(12) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `first_name` varchar(25) DEFAULT NULL,
  `last_name` varchar(25) DEFAULT NULL,
  `reg_number` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `semester` int(12) DEFAULT NULL,
  `campus` varchar(25) DEFAULT NULL,
  `nationalid` varchar(25) DEFAULT NULL,
  `nationality` varchar(25) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `mailing_address` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `village` varchar(25) DEFAULT NULL,
  `traditional_authority` varchar(25) DEFAULT NULL,
  `district` varchar(25) DEFAULT NULL,
  `marital` varchar(10) DEFAULT NULL,
  `spouse_name` varchar(25) DEFAULT NULL,
  `spouse_address` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `spouse_phone` varchar(12) DEFAULT NULL,
  `spouse_email` varchar(25) DEFAULT NULL,
  `spouse_district` varchar(25) DEFAULT NULL,
  `straditional_authority` varchar(25) DEFAULT NULL,
  `guardian_name` varchar(25) DEFAULT NULL,
  `guardian_occupation` varchar(25) DEFAULT NULL,
  `guardian_email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `guardian_mobile` varchar(12) DEFAULT NULL,
  `guardian_mailing` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `highest_qualification` varchar(50) DEFAULT NULL,
  `year_obtained` year(4) DEFAULT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`student_id`, `user_id`, `first_name`, `last_name`, `reg_number`, `semester`, `campus`, `nationalid`, `nationality`, `gender`, `date_of_birth`, `mailing_address`, `village`, `traditional_authority`, `district`, `marital`, `spouse_name`, `spouse_address`, `spouse_phone`, `spouse_email`, `spouse_district`, `straditional_authority`, `guardian_name`, `guardian_occupation`, `guardian_email`, `guardian_mobile`, `guardian_mailing`, `highest_qualification`, `year_obtained`) VALUES
(5, 18, 'Mahala', 'M. Mkwepu', 'CEN/01/45/17', 4, 'offcampus', 'CENSDA122321AD', 'Malawian', 'male', '2001-06-24', 'Ms. Ndindase Kumwenda\r\nUniversity of Livingstonia, P.O. Box 37, Rumphi', 'Chinupule', 'T.A. Kapeni', 'Blantyre', 'single', '', '', '', '', NULL, '', 'Ms. Ndindase Kumwenda', 'secretary', 'kumwendandindase@gmail.com', '0888355104', 'Ms. Ndindase Kumwenda\r\nUniversity of Livingstonia,', 'MSCE', 2017),
(6, 19, 'Richard', 'Siyeni', 'CEN/01/64/17', 4, 'oncampus', 'CENSDA122', 'Malawian', 'male', '1998-03-15', 'Ricky Tech Systems\r\nP.o. Box 15\r\nMzuzu', 'Misuku', 'T.A. Chikulamayembe', 'Chitipa', 'single', '', '', '', '', NULL, '', 'Bwana siyeni', 'Agrifarmer', 'bwanasiyeni@gmail.com', '0887045755', 'Bwana Siyeni Systems\r\nP.o. Box 45\r\nMzuzu', 'MSCE', 2015);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

DROP TABLE IF EXISTS `user_details`;
CREATE TABLE IF NOT EXISTS `user_details` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `program` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `email` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `real_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `username` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `reg_date` date DEFAULT NULL,
  `status` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `user_type`, `program`, `email`, `real_name`, `username`, `password`, `reg_date`, `status`) VALUES
(5, 'admin', NULL, 'mahalamkwepu@gmail.com', 'Harry Kummenda', 'Administrator', '$2y$10$vLQPIcjrjgrpf5Bv2Wrow.IMph0v4nQJeEBZ3zU35uKPHyYAdzZxa', NULL, 'active'),
(16, 'hod', 'CEN', 'mahalamkwepu@gmail.com', 'Kaunda Gondwe', 'CEN1111', '$2y$10$XpJJBlBmNgNPDqPWtmlbBu98yg4/0Q2QmE2tBnwKEsz.xbdVZZw7e', '2021-06-19', 'active'),
(18, 'student', 'CEN', 'mahalamkwepu@gmail.com', 'Mahala M. Mkwepu', 'CEN/01/45/17', '$2y$10$PG2EJZ7LdTFZsO/RoM77IODB/V6RQvwMkA4.gx5aIbscYCCK3RmRS', '2021-06-22', 'active'),
(19, 'student', 'CEN', 'projectmahala@gmail.com', 'Richard Siyeni', 'CEN/01/64/17', '$2y$10$5s3OZYipMU6TA40tZbY1u.amrVZtgOlq6nAbCmpsddpFJ7aV/fOI6', '2021-06-22', 'active'),
(21, 'lecturer', 'CEN', 'mahalamkwepu@gmail.com', 'John Memory Banda', 'CEN2424', '$2y$10$0o99Tgx15a6e3qcJhI6At.UBOG.5MdqV4R44DDR63q1P1vJJ113Ya', '2021-06-24', 'active'),
(22, 'accounts', 'none', 'mahalamkwepu@gmail.com', 'Mphaso Kumwenda', 'Accounts', '$2y$10$kVkK1Iw724bKX6B7jQb04uc7RU8KetCm9ZjUlnV2LnBi0WVVPhdJC', '2021-07-02', 'active'),
(23, 'dos', 'none', 'mahalamkwepu@gmail.com', 'Rev. Kadogana', 'Dean of students', '$2y$10$0draiyvQczHRL2y1Gowpw.UK/Fc4pSoKmts6J2WwUg8SYvrYwMSCy', '2021-07-02', 'active'),
(24, 'registrar', 'none', 'mahalamkwepu@gmail.com', 'Wayera Kumwenda', 'registrar', '$2y$10$N5ouO6kIXMk4qG8hZcB5x.UX0U9aEOzb/T4S5.YaPjyOg93L4QpZq', '2021-07-09', 'active'),
(25, 'senate', 'none', 'mahalamkwepu@gmail.com', NULL, 'senate', '$2y$10$H/DWfhfH9wqEE5irgb/aBORS8ak2QuQu40AfQdb.E4wdzov3lgy92', '2021-07-09', 'active'),
(27, 'lecturer', 'CEN', 'mahalamkwepu@gmail.com', 'Ivy Scott', 'CEN2222', '$2y$10$FCoe5DssG/ZFsON2PxifzegQnAaNh6FSp81tlCwm04LvLpkLc4K8C', '2021-08-02', 'active'),
(28, 'hod', 'FSN', 'mahalamkwepu@gmail.com', 'Wakisa Mnthali', 'CEN3333', '$2y$10$I/sWs1U3UL4YjkHrZbggFu1gNZz6A5ps9lN60JsOddGgXexDGwyGi', '2021-08-02', 'active');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
