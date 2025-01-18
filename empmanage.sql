-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2023 at 10:37 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `empmanage`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_details`
--

CREATE TABLE `bank_details` (
  `emp_id` smallint(6) NOT NULL,
  `account_no` varchar(20) NOT NULL,
  `bank_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bank_details`
--

INSERT INTO `bank_details` (`emp_id`, `account_no`, `bank_name`) VALUES
(1, '12345678', 'BOC'),
(2, '23346670', 'Peoples'),
(3, '23525645', 'BOC'),
(4, '09585679', 'NBC'),
(5, '56782222', 'BOC');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branch_id` smallint(6) NOT NULL,
  `branch_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `branch_name`) VALUES
(1, 'Sri Lanka'),
(2, 'Bangladesh'),
(3, 'Pakistan');

-- --------------------------------------------------------

--
-- Table structure for table `default_leaves`
--

CREATE TABLE `default_leaves` (
  `pay_grade_id` smallint(6) NOT NULL,
  `leave_type` varchar(10) NOT NULL,
  `no_of_leaves` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `default_leaves`
--

INSERT INTO `default_leaves` (`pay_grade_id`, `leave_type`, `no_of_leaves`) VALUES
(1, 'annual', 30),
(1, 'casual', 20),
(1, 'maternity', 60),
(1, 'no-pay', 50),
(2, 'annual', 30),
(2, 'casual', 20),
(2, 'maternity', 60),
(2, 'no-pay', 50),
(3, 'annual', 30),
(3, 'casual', 20),
(3, 'maternity', 60),
(3, 'no-pay', 50),
(4, 'annual', 30),
(4, 'casual', 20),
(4, 'maternity', 60),
(4, 'no-pay', 50);

-- --------------------------------------------------------

--
-- Table structure for table `emergency_contact`
--

CREATE TABLE `emergency_contact` (
  `emp_id` smallint(6) NOT NULL,
  `emg_con_no` varchar(20) NOT NULL,
  `emg_con_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emergency_contact`
--

INSERT INTO `emergency_contact` (`emp_id`, `emg_con_no`, `emg_con_name`) VALUES
(1, '0766543211', 'U.C'),
(2, '0773030311', 'Chandana'),
(3, '0911234569', 'Dayananda'),
(4, '0771235678', 'J.A'),
(5, '0741245780', 'P.P');

-- --------------------------------------------------------

--
-- Table structure for table `employee_details`
--

CREATE TABLE `employee_details` (
  `emp_id` smallint(6) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) DEFAULT NULL,
  `gender` varchar(6) NOT NULL,
  `contact_number` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `birthday` date NOT NULL,
  `marital_status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_details`
--

INSERT INTO `employee_details` (`emp_id`, `first_name`, `last_name`, `gender`, `contact_number`, `email`, `city`, `birthday`, `marital_status`) VALUES
(0, 'admin', NULL, 'other', '', 'companybpnl@gmail.com', NULL, '2023-01-01', NULL),
(1, 'Benul', 'Jayasekara', 'male', '0771234567', 'benujith@gmail.com', 'Ambalangoda', '2000-01-01', 'single'),
(2, 'Pawan', 'Pasindu', 'male', '0765432123', 'malshanapi159@gmail.com', 'Ambalangoda', '1998-01-01', 'single'),
(3, 'Bhashitha', 'Viduranga', 'male', '0721234563', 'bhashithavidurangalap@gmail.com', 'Ambalangoda', '1998-02-04', 'single'),
(4, 'Lakshitha', 'Kumuduranga', 'male', '0768391021', 'lakshithakumuduranga102@gmail.com', 'Uragasmanhandiya', '1998-12-03', 'single'),
(5, 'Nilupul', 'Sandarusiru', 'male', '0768322222', 'sandarusiru@gmail.com', 'Kalutara', '2000-12-03', 'single');

-- --------------------------------------------------------

--
-- Table structure for table `employment`
--

CREATE TABLE `employment` (
  `emp_id` smallint(6) NOT NULL,
  `job_id` smallint(6) NOT NULL,
  `status_id` smallint(6) NOT NULL,
  `branch_id` smallint(6) NOT NULL,
  `pay_grade_id` smallint(6) NOT NULL,
  `dept_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employment`
--

INSERT INTO `employment` (`emp_id`, `job_id`, `status_id`, `branch_id`, `pay_grade_id`, `dept_name`) VALUES
(0, 0, 5, 1, 1, 'admin'),
(1, 1, 2, 1, 1, 'HR Department'),
(2, 3, 1, 1, 1, 'Business Department'),
(3, 3, 3, 1, 2, 'Marketing Department'),
(4, 2, 2, 1, 4, 'Marketing Department'),
(5, 4, 4, 1, 3, 'Business Department');

-- --------------------------------------------------------

--
-- Table structure for table `employment_status`
--

CREATE TABLE `employment_status` (
  `status_id` smallint(6) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employment_status`
--

INSERT INTO `employment_status` (`status_id`, `status`) VALUES
(1, 'Intern_part_time'),
(2, 'Intern_full_time'),
(3, 'Contract_part_time'),
(4, 'Contract_full_time'),
(5, 'Permanent'),
(6, 'Freelance');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `job_id` smallint(6) NOT NULL,
  `job_title` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`job_id`, `job_title`) VALUES
(0, 'Admin'),
(1, 'HR Manager'),
(2, 'Accountant'),
(3, 'Software Engineer'),
(4, 'QA Engineer');

-- --------------------------------------------------------

--
-- Table structure for table `leave_req`
--

CREATE TABLE `leave_req` (
  `leave_id` smallint(6) NOT NULL,
  `emp_id` smallint(6) NOT NULL,
  `leave_type` varchar(20) NOT NULL,
  `leave_date` varchar(20) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `leave_status` varchar(20) NOT NULL,
  `leave_count` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leave_req`
--

INSERT INTO `leave_req` (`leave_id`, `emp_id`, `leave_type`, `leave_date`, `reason`, `leave_status`, `leave_count`) VALUES
(1, 2, 'annual', '2023-01-10', 'sick', 'Rejected', 1),
(2, 2, 'maternity', '2023-01-10', 'sick', 'Rejected', 1),
(3, 2, 'annual', '2023-01-10', 'sick', 'Rejected', 1),
(4, 2, 'no-pay', '2023-01-10', 'sick', 'Rejected', 5),
(5, 2, 'maternity', '2023-01-10', 'funeral', 'Rejected', 2),
(6, 2, 'casual', '2023-01-10', 'funeral', 'Rejected', 5),
(7, 2, 'annual', '2023-01-10', 'funeral', 'Approved', 5),
(8, 2, 'casual', '2023-01-11', 'funeral', 'Approved', 2),
(9, 2, 'maternity', '2023-01-11', 'funeral', 'Approved', 5),
(10, 2, 'no-pay', '2023-01-11', 'sickma', 'Approved', 2),
(11, 4, 'annual', '2023-01-25', 'sick', 'Approved', 5),
(12, 4, 'no-pay', '2023-01-16', 'funeral', 'Approved', 5),
(13, 2, 'annual', '2023-01-19', 'funeral', 'Approved', 5),
(14, 2, 'casual', '2023-01-09', 'sickma', 'Approved', 5),
(17, 2, 'annual', '2023-01-12', 'sick', 'Approved', 2),
(18, 2, 'annual', '2023-01-12', 'funeral', 'Approved', 1),
(20, 2, 'maternity', '2023-01-12', 'funeral', 'Approved', 3),
(21, 2, 'maternity', '2023-01-11', 'funeral', 'Approved', 1),
(22, 2, 'maternity', '2023-01-12', 'funeral', 'Approved', 5),
(23, 2, 'maternity', '2023-01-11', 'funeral', 'Approved', 5),
(24, 2, 'casual', '', 'I love this job', 'Rejected', 1),
(25, 2, 'casual', '2023-01-12', 'sik', 'Approved', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `payment_id` smallint(6) NOT NULL,
  `emp_id` smallint(6) NOT NULL,
  `pay_date` date NOT NULL,
  `payment` decimal(10,2) DEFAULT NULL CHECK (`payment` > 0)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payroll`
--

INSERT INTO `payroll` (`payment_id`, `emp_id`, `pay_date`, `payment`) VALUES
(8, 1, '2022-01-25', '50000.00'),
(9, 1, '2022-02-25', '50000.00'),
(10, 1, '2022-03-25', '50000.00'),
(11, 1, '2022-04-25', '50000.00'),
(12, 1, '2022-05-25', '50000.00'),
(13, 1, '2022-06-25', '50000.00'),
(14, 1, '2022-07-25', '50000.00'),
(15, 1, '2022-08-25', '50000.00'),
(16, 1, '2022-09-25', '50000.00'),
(17, 1, '2022-10-25', '50000.00'),
(18, 1, '2022-11-25', '50000.00'),
(19, 2, '2022-01-25', '50000.00'),
(20, 2, '2022-02-25', '50000.00'),
(21, 2, '2022-03-25', '50000.00'),
(22, 2, '2022-04-25', '50000.00'),
(23, 2, '2022-05-25', '50000.00'),
(24, 2, '2022-06-25', '50000.00'),
(25, 2, '2022-07-25', '50000.00'),
(26, 2, '2022-08-25', '50000.00'),
(27, 2, '2022-09-25', '50000.00'),
(28, 2, '2022-10-25', '50000.00'),
(29, 2, '2022-11-25', '50000.00'),
(30, 3, '2022-01-25', '50000.00'),
(31, 3, '2022-02-25', '50000.00'),
(32, 3, '2022-03-25', '50000.00'),
(33, 3, '2022-04-25', '50000.00'),
(34, 3, '2022-05-25', '50000.00'),
(35, 3, '2022-06-25', '50000.00'),
(36, 3, '2022-07-25', '50000.00'),
(37, 3, '2022-08-25', '50000.00'),
(38, 3, '2022-09-25', '50000.00'),
(39, 3, '2022-10-25', '50000.00'),
(40, 3, '2022-11-25', '50000.00'),
(41, 4, '2022-01-25', '50000.00'),
(42, 4, '2022-02-25', '50000.00'),
(43, 4, '2022-03-25', '50000.00'),
(44, 4, '2022-04-25', '50000.00'),
(45, 4, '2022-05-25', '50000.00'),
(46, 4, '2022-06-25', '50000.00'),
(47, 4, '2022-07-25', '50000.00'),
(48, 4, '2022-08-25', '50000.00'),
(49, 4, '2022-09-25', '50000.00'),
(50, 4, '2022-10-25', '50000.00'),
(51, 4, '2022-11-25', '50000.00'),
(52, 5, '2022-01-25', '50000.00'),
(53, 5, '2022-02-25', '50000.00'),
(54, 5, '2022-03-25', '50000.00'),
(55, 5, '2022-04-25', '50000.00'),
(56, 5, '2022-05-25', '50000.00'),
(57, 5, '2022-06-25', '50000.00'),
(58, 5, '2022-07-25', '50000.00'),
(59, 5, '2022-08-25', '50000.00'),
(60, 5, '2022-09-25', '50000.00'),
(61, 5, '2022-10-25', '50000.00'),
(62, 5, '2022-11-25', '50000.00');

-- --------------------------------------------------------

--
-- Table structure for table `pay_grade`
--

CREATE TABLE `pay_grade` (
  `pay_grade_id` smallint(6) NOT NULL,
  `pay_grade` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pay_grade`
--

INSERT INTO `pay_grade` (`pay_grade_id`, `pay_grade`) VALUES
(1, 'Level 1'),
(2, 'Level 2'),
(3, 'Level 3'),
(4, 'Level 4');

-- --------------------------------------------------------

--
-- Table structure for table `remain_leaves`
--

CREATE TABLE `remain_leaves` (
  `emp_id` smallint(6) NOT NULL,
  `leave_type` varchar(10) NOT NULL,
  `remain_leaves` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `remain_leaves`
--

INSERT INTO `remain_leaves` (`emp_id`, `leave_type`, `remain_leaves`) VALUES
(1, 'annual', 20),
(1, 'casual', 10),
(1, 'maternity', 60),
(1, 'no-pay', 50),
(2, 'annual', 7),
(2, 'casual', 2),
(2, 'maternity', 41),
(2, 'no-pay', 48),
(3, 'annual', 20),
(3, 'casual', 10),
(3, 'maternity', 60),
(3, 'no-pay', 50),
(4, 'annual', 15),
(4, 'casual', 10),
(4, 'maternity', 60),
(4, 'no-pay', 45),
(5, 'annual', 20),
(5, 'casual', 10),
(5, 'maternity', 60),
(5, 'no-pay', 50);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `job_id` smallint(6) NOT NULL,
  `pay_grade_id` smallint(6) NOT NULL,
  `status_id` smallint(6) NOT NULL,
  `salary` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`job_id`, `pay_grade_id`, `status_id`, `salary`) VALUES
(1, 1, 2, '60000.00'),
(2, 4, 2, '65000.00'),
(3, 1, 1, '55000.00'),
(3, 2, 3, '45000.00'),
(4, 3, 4, '75000.00');

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE `supervisor` (
  `emp_id` smallint(6) NOT NULL,
  `sup_id` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supervisor`
--

INSERT INTO `supervisor` (`emp_id`, `sup_id`) VALUES
(1, 2),
(2, 4),
(3, 4),
(5, 4),
(4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_name` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `emp_id` smallint(6) NOT NULL,
  `acc_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_name`, `password`, `emp_id`, `acc_status`) VALUES
('Admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 0, 'active'),
('benul', '08061e84b525822c42aadcc248cb85fd14088046', 1, 'active'),
('Bhashitha', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684', 3, 'active'),
('lakshitha', '534d224fbce04415a954fc40288f16613726dca9', 4, 'active'),
('nilupul', '62916d51ba8f224afd12bf08bac44392a1c77fe4', 5, 'active'),
('pavan', '79c21071b25cec954b761d67849b5a84866bbecc', 2, 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank_details`
--
ALTER TABLE `bank_details`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `default_leaves`
--
ALTER TABLE `default_leaves`
  ADD PRIMARY KEY (`pay_grade_id`,`leave_type`);

--
-- Indexes for table `emergency_contact`
--
ALTER TABLE `emergency_contact`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `employee_details`
--
ALTER TABLE `employee_details`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `employment`
--
ALTER TABLE `employment`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `job_id` (`job_id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `branch_id` (`branch_id`),
  ADD KEY `pay_grade_id` (`pay_grade_id`);

--
-- Indexes for table `employment_status`
--
ALTER TABLE `employment_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `leave_req`
--
ALTER TABLE `leave_req`
  ADD PRIMARY KEY (`leave_id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `pay_grade`
--
ALTER TABLE `pay_grade`
  ADD PRIMARY KEY (`pay_grade_id`);

--
-- Indexes for table `remain_leaves`
--
ALTER TABLE `remain_leaves`
  ADD PRIMARY KEY (`emp_id`,`leave_type`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`job_id`,`pay_grade_id`,`status_id`),
  ADD KEY `pay_grade_id` (`pay_grade_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indexes for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `sup_id` (`sup_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_name`),
  ADD KEY `emp_id` (`emp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branch_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee_details`
--
ALTER TABLE `employee_details`
  MODIFY `emp_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employment_status`
--
ALTER TABLE `employment_status`
  MODIFY `status_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `job_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `leave_req`
--
ALTER TABLE `leave_req`
  MODIFY `leave_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
  MODIFY `payment_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bank_details`
--
ALTER TABLE `bank_details`
  ADD CONSTRAINT `bank_details_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee_details` (`emp_id`) ON DELETE CASCADE;

--
-- Constraints for table `default_leaves`
--
ALTER TABLE `default_leaves`
  ADD CONSTRAINT `default_leaves_ibfk_1` FOREIGN KEY (`pay_grade_id`) REFERENCES `pay_grade` (`pay_grade_id`);

--
-- Constraints for table `emergency_contact`
--
ALTER TABLE `emergency_contact`
  ADD CONSTRAINT `emergency_contact_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee_details` (`emp_id`);

--
-- Constraints for table `employment`
--
ALTER TABLE `employment`
  ADD CONSTRAINT `employment_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee_details` (`emp_id`),
  ADD CONSTRAINT `employment_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `job` (`job_id`),
  ADD CONSTRAINT `employment_ibfk_3` FOREIGN KEY (`status_id`) REFERENCES `employment_status` (`status_id`),
  ADD CONSTRAINT `employment_ibfk_4` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`branch_id`),
  ADD CONSTRAINT `employment_ibfk_5` FOREIGN KEY (`pay_grade_id`) REFERENCES `pay_grade` (`pay_grade_id`);

--
-- Constraints for table `leave_req`
--
ALTER TABLE `leave_req`
  ADD CONSTRAINT `leave_req_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee_details` (`emp_id`);

--
-- Constraints for table `payroll`
--
ALTER TABLE `payroll`
  ADD CONSTRAINT `payroll_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee_details` (`emp_id`);

--
-- Constraints for table `remain_leaves`
--
ALTER TABLE `remain_leaves`
  ADD CONSTRAINT `remain_leaves_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee_details` (`emp_id`);

--
-- Constraints for table `salary`
--
ALTER TABLE `salary`
  ADD CONSTRAINT `salary_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `job` (`job_id`),
  ADD CONSTRAINT `salary_ibfk_2` FOREIGN KEY (`pay_grade_id`) REFERENCES `pay_grade` (`pay_grade_id`),
  ADD CONSTRAINT `salary_ibfk_3` FOREIGN KEY (`status_id`) REFERENCES `employment_status` (`status_id`);

--
-- Constraints for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD CONSTRAINT `supervisor_ibfk_1` FOREIGN KEY (`sup_id`) REFERENCES `employee_details` (`emp_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `supervisor_ibfk_2` FOREIGN KEY (`emp_id`) REFERENCES `employee_details` (`emp_id`) ON DELETE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee_details` (`emp_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
