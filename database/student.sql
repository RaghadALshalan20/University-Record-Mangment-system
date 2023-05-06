-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12 فبراير 2023 الساعة 03:27
-- إصدار الخادم: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student`
--

-- --------------------------------------------------------

--
-- بنية الجدول `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `department` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `phone`, `password`, `department`) VALUES
(1, 'user', 'user@gmail.com', '0555', '123', 1);

-- --------------------------------------------------------

--
-- بنية الجدول `calendar`
--

CREATE TABLE `calendar` (
  `cal_id` int(11) NOT NULL,
  `starts` date NOT NULL,
  `ends` date NOT NULL,
  `description` text DEFAULT NULL,
  `semester_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `calendar`
--

INSERT INTO `calendar` (`cal_id`, `starts`, `ends`, `description`, `semester_ID`) VALUES
(1, '2023-02-11', '2023-02-11', 'sk', 1);

-- --------------------------------------------------------

--
-- بنية الجدول `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course` varchar(11) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `credit` int(11) NOT NULL,
  `department_id` int(100) NOT NULL,
  `level` varchar(11) DEFAULT NULL,
  `tutor_code` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `courses`
--

INSERT INTO `courses` (`id`, `course`, `course_name`, `credit`, `department_id`, `level`, `tutor_code`) VALUES
(1, 'csc100', 'intro 3', 3, 1, '100', NULL),
(2, 'csc200', 'intro 7', 2, 1, '100', NULL),
(3, 'csc109', 'intro9', 2, 1, '100', NULL),
(4, '3dd', 'gg', 333, 1, '100', NULL);

-- --------------------------------------------------------

--
-- بنية الجدول `course_reg`
--

CREATE TABLE `course_reg` (
  `ID` int(11) NOT NULL,
  `course_code` varchar(11) NOT NULL,
  `test` int(100) DEFAULT NULL,
  `exams` int(100) DEFAULT NULL,
  `course_ID` int(11) DEFAULT NULL,
  `C_reg_stud_id` int(11) DEFAULT NULL,
  `cal_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `course_reg`
--

INSERT INTO `course_reg` (`ID`, `course_code`, `test`, `exams`, `course_ID`, `C_reg_stud_id`, `cal_ID`) VALUES
(25, 'csc200', 0, 0, 2, 1, NULL),
(26, 'csc200', 0, 0, 2, 1, NULL),
(27, 'csc200', 0, 0, 2, 1, NULL),
(28, 'csc200', 0, 0, 2, 1, NULL),
(29, 'csc200', 0, 0, 2, 1, NULL),
(30, 'csc200', 0, 0, 2, 1, NULL);

-- --------------------------------------------------------

--
-- بنية الجدول `department`
--

CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `department`
--

INSERT INTO `department` (`dept_id`, `name`) VALUES
(1, 'computer science'),
(4, 'i dont know'),
(3, 'idiat'),
(2, 'mass communcation');

-- --------------------------------------------------------

--
-- بنية الجدول `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `teller_no` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `madeby` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `approved` int(2) DEFAULT NULL,
  `bank` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `payments`
--

INSERT INTO `payments` (`id`, `name`, `teller_no`, `date`, `madeby`, `amount`, `approved`, `bank`) VALUES
(1, 'registration charge', '090909090', '2018-07-09', 'th@gmail.com', 10000, 1, NULL),
(2, 'registration charge', '97787789', '0000-00-00', 'gjghgkjgkjg', 88008, 0, 'gtb'),
(3, 'registration charge', '090909', '0000-00-00', 'th@naij.com', 78909, 1, 'gtb'),
(4, '', '0999', '2023-02-12', '', 0, 0, 'kkk'),
(5, '', '0999', '2023-02-12', '', 20, 0, 'kkk'),
(6, 'registration charge', '0999', '2023-02-12', '', 20, 0, 'kkk'),
(7, 'registration charge', '0999', '2023-02-12', 'salem@gmail.com', 20, 0, 'kkk'),
(8, 'registration charge', '0999', '2023-02-12', 'salem@gmail.com', 20, 1, 'kkk'),
(9, 'registration charge', '0999', '2023-02-12', 'salem@gmail.com', 20, 0, 'kkk'),
(10, 'registration charge', '0999', '2023-02-12', 'salem@gmail.com', 20, 1, 'kkk'),
(11, 'registration charge', '0999', '2023-02-11', 'th@naij.com', 20, 0, 'kkk'),
(12, 'registration charge', '0999', '2023-02-11', 'th@naij.com', 20, 0, 'kkk'),
(13, 'registration charge', '0999', '2023-02-11', 'th@naij.com', 20, 1, 'kkk');

-- --------------------------------------------------------

--
-- بنية الجدول `register_student`
--

CREATE TABLE `register_student` (
  `Register_id` int(11) NOT NULL,
  `R_Student_id` bigint(20) NOT NULL,
  `R_cal_id` int(11) NOT NULL,
  `R_pay_id` int(11) NOT NULL,
  `Register_Date` date NOT NULL,
  `matric_no` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `register_student`
--

INSERT INTO `register_student` (`Register_id`, `R_Student_id`, `R_cal_id`, `R_pay_id`, `Register_Date`, `matric_no`) VALUES
(1, 3, 1, 13, '2023-02-12', '');

-- --------------------------------------------------------

--
-- بنية الجدول `semester_session`
--

CREATE TABLE `semester_session` (
  `id` int(11) NOT NULL,
  `semester_Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `semester_session`
--

INSERT INTO `semester_session` (`id`, `semester_Name`) VALUES
(1, 'First semester'),
(2, 'Second semester'),
(3, 'Third semester'),
(4, 'Fourth  semester'),
(5, 'Fifth semester'),
(6, 'sixth semester'),
(7, 'Seventh semester'),
(8, 'Eighth semester');

-- --------------------------------------------------------

--
-- بنية الجدول `students_info`
--

CREATE TABLE `students_info` (
  `id` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(60) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `department__id` int(11) DEFAULT NULL,
  `mobile` bigint(20) NOT NULL,
  `home_address` text DEFAULT NULL,
  `payment_verified` int(2) DEFAULT 1,
  `blocked` int(2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `approved` int(2) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `students_info`
--

INSERT INTO `students_info` (`id`, `email`, `password`, `name`, `gender`, `department__id`, `mobile`, `home_address`, `payment_verified`, `blocked`, `image`, `approved`, `timestamp`) VALUES
(3, '9087', '123', 'MLLL M', 'male', 1, 0, 'sas', 1, 1, '    ', 0, '2023-02-12 02:23:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`cal_id`) USING BTREE,
  ADD KEY `semester_ID_fk` (`semester_ID`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_id_fk` (`department_id`);

--
-- Indexes for table `course_reg`
--
ALTER TABLE `course_reg`
  ADD PRIMARY KEY (`ID`) USING BTREE,
  ADD KEY `course_id_fk` (`course_ID`),
  ADD KEY `C_Student_id_fk` (`C_reg_stud_id`),
  ADD KEY `cal_id_fk` (`cal_ID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teller_no` (`teller_no`);

--
-- Indexes for table `register_student`
--
ALTER TABLE `register_student`
  ADD PRIMARY KEY (`Register_id`),
  ADD KEY `R_Student_id_fk` (`R_Student_id`),
  ADD KEY `R_cal_id_fk` (`R_cal_id`),
  ADD KEY `R_pay_id_fk` (`R_pay_id`);

--
-- Indexes for table `semester_session`
--
ALTER TABLE `semester_session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students_info`
--
ALTER TABLE `students_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `department__id_fk` (`department__id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `cal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `course_reg`
--
ALTER TABLE `course_reg`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `register_student`
--
ALTER TABLE `register_student`
  MODIFY `Register_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `semester_session`
--
ALTER TABLE `semester_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `students_info`
--
ALTER TABLE `students_info`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- قيود الجداول المحفوظة
--

--
-- القيود للجدول `calendar`
--
ALTER TABLE `calendar`
  ADD CONSTRAINT `semester_ID_fk` FOREIGN KEY (`semester_ID`) REFERENCES `semester_session` (`id`);

--
-- القيود للجدول `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `department_id_fk` FOREIGN KEY (`department_id`) REFERENCES `department` (`dept_id`);

--
-- القيود للجدول `course_reg`
--
ALTER TABLE `course_reg`
  ADD CONSTRAINT `C_Student_id_fk` FOREIGN KEY (`C_reg_stud_id`) REFERENCES `register_student` (`Register_id`),
  ADD CONSTRAINT `cal_id_fk` FOREIGN KEY (`cal_ID`) REFERENCES `calendar` (`cal_id`),
  ADD CONSTRAINT `course_id_fk` FOREIGN KEY (`course_ID`) REFERENCES `courses` (`id`);

--
-- القيود للجدول `register_student`
--
ALTER TABLE `register_student`
  ADD CONSTRAINT `R_Student_id_fk` FOREIGN KEY (`R_Student_id`) REFERENCES `students_info` (`id`),
  ADD CONSTRAINT `R_cal_id_fk` FOREIGN KEY (`R_cal_id`) REFERENCES `calendar` (`cal_id`),
  ADD CONSTRAINT `R_pay_id_fk` FOREIGN KEY (`R_pay_id`) REFERENCES `payments` (`id`);

--
-- القيود للجدول `students_info`
--
ALTER TABLE `students_info`
  ADD CONSTRAINT `department__id_fk` FOREIGN KEY (`department__id`) REFERENCES `department` (`dept_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
