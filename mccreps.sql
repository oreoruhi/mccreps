-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2017 at 09:30 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mccreps`
--

-- --------------------------------------------------------

--
-- Table structure for table `counsel_details`
--

CREATE TABLE `counsel_details` (
  `id` int(10) NOT NULL,
  `counsel_id` int(10) NOT NULL,
  `faculty_id` int(10) NOT NULL,
  `submission_date` date NOT NULL,
  `report_file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `counsel_list`
--

CREATE TABLE `counsel_list` (
  `id` int(10) NOT NULL,
  `sched_id` int(10) NOT NULL,
  `counsel_title` text NOT NULL,
  `counsel_institute` int(10) NOT NULL,
  `counsel_author` int(10) NOT NULL,
  `counsel_approver` int(10) DEFAULT NULL,
  `dean_fa_submitted` date NOT NULL,
  `dean_remarks` enum('Approved','Pending','Revision') NOT NULL,
  `dean_comments` text,
  `vpaa_fa_submitted` date DEFAULT NULL,
  `vpaa_remarks` enum('Approved','Pending','Revision') DEFAULT NULL,
  `vpaa_comments` text,
  `system_remarks` enum('OK','LATE') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(10) NOT NULL,
  `ins_id` int(10) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) NOT NULL,
  `extension` varchar(10) NOT NULL,
  `status` enum('Permanent','Casual') NOT NULL,
  `position` varchar(255) NOT NULL,
  `sys_status` enum('Active','Archived') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `ins_id`, `firstname`, `middlename`, `lastname`, `extension`, `status`, `position`, `sys_status`) VALUES
(7, 1, 'Dino Fabriccio', '', 'Arenillo', '', 'Permanent', 'Assistant Professor IV', 'Active'),
(8, 1, 'Arnel', '', 'Perez', '', 'Permanent', 'Instructor III', 'Active'),
(9, 1, 'Raymond John', '', 'Vergara', '', 'Permanent', 'Instructor I', 'Active'),
(10, 1, 'Angelo', '', 'Banares', '', 'Permanent', 'Instructor I', 'Active'),
(11, 1, 'Arcelyn', '', 'Adriano', '', 'Casual', 'Instructor I', 'Active'),
(12, 1, 'Fernando', '', 'Berras', '', 'Casual', 'Instructor I', 'Active'),
(13, 1, 'Gracia', '', 'Canlas', '', 'Casual', 'Instructor I', 'Active'),
(14, 1, 'Gedeon', '', 'Gamboa', '', 'Casual', 'Instructor I', 'Active'),
(15, 1, 'Edward', '', 'Inong', '', 'Casual', 'Instructor I', 'Active'),
(16, 1, 'Keith Aaron', '', 'Joven', '', 'Casual', 'Instructor I', 'Active'),
(17, 1, 'Ian Paolo', '', 'Punsalan', '', 'Casual', 'Instructor I', 'Active'),
(18, 1, 'Angelico', '', 'Reyes', '', 'Casual', 'Instructor I', 'Active'),
(19, 1, 'Lourdes Fatima', '', 'Sula', '', 'Casual', 'Instructor I', 'Active'),
(20, 1, 'Karlo', '', 'Tolentino', '', 'Casual', 'Instructor I', 'Active'),
(21, 7, 'Reynaldo', '', 'Laxamana', '', 'Permanent', 'Assistant Professor IV', 'Active'),
(22, 7, 'Josephine', '', 'Evangelista', '', 'Permanent', 'Instructor III', 'Active'),
(23, 7, 'Mitzie', '', 'Sagad', '', 'Permanent', 'Instructor III', 'Active'),
(24, 7, 'Geralyn', '', 'Quiambao', '', 'Permanent', 'Instructor I', 'Active'),
(25, 7, 'Carmelito', '', 'Marcelo', '', 'Casual', 'Instructor I', 'Active'),
(26, 7, 'Glenn', '', 'Remoquillo', '', 'Casual', 'Instructor I', 'Active'),
(27, 3, 'Renato Dan', '', 'Pablo', 'II', 'Permanent', 'Instructor III', 'Active'),
(28, 3, 'Mary Ann', '', 'Quioc', '', 'Permanent', 'Instructor III', 'Active'),
(29, 3, 'George', '', 'Granados', '', 'Permanent', 'Instructor III', 'Active'),
(30, 3, 'Jona', '', 'Tibay', '', 'Permanent', 'Instructor III', 'Active'),
(31, 3, 'Robhert', '', 'Bamba', '', 'Permanent', 'Instructor II', 'Active'),
(32, 3, 'Dennis', '', 'Tacadena', '', 'Permanent', 'Instructor I', 'Active'),
(33, 3, 'Jocelon', '', 'Sanguyu', '', 'Permanent', 'Instructor I', 'Active'),
(34, 3, 'Ronalyn', '', 'Domingo', '', 'Permanent', 'Instructor I', 'Active'),
(35, 3, 'Ralph', '', 'Cadalzo', '', 'Casual', 'Instructor I', 'Active'),
(36, 3, 'Mark Paolo', '', 'Cruz', '', 'Casual', 'Instructor I', 'Active'),
(37, 3, 'Lionel', '', 'De Lazo', '', 'Casual', 'Instructor I', 'Active'),
(38, 3, 'Darwin', '', 'Miranda', '', 'Casual', 'Instructor I', 'Active'),
(39, 3, 'Jaypee ', '', 'Patdu', '', 'Casual', 'Instructor I', 'Active'),
(40, 3, 'Ernie Lee', '', 'Pineda', '', 'Casual', 'Instructor I', 'Active'),
(41, 3, 'Ronilyn', '', 'Telan', '', 'Casual', 'Instructor I', 'Active'),
(42, 8, 'Darren', '', 'Molano', '', 'Permanent', 'Instructor II', 'Active'),
(43, 8, 'Maricar', '', 'Besa', '', 'Casual', 'Instructor I', 'Active'),
(44, 8, 'Elaine', '', 'Garcia', '', 'Casual', 'Instructor I', 'Active'),
(45, 8, 'Jennyfer', '', 'Merza', '', 'Casual', 'Instructor I', 'Active'),
(46, 8, 'Eros', '', 'Priniel', '', 'Casual', 'Instructor I', 'Active'),
(47, 8, 'Donald', '', 'Rivera', '', 'Casual', 'Instructor I', 'Active'),
(48, 8, 'Diana', '', 'Varona', '', 'Casual', 'Instructor I', 'Active'),
(49, 3, 'Ritchell', '', 'Yabut', '', 'Casual', 'Instructor I', 'Active'),
(50, 5, 'Marites', '', 'Due', '', 'Permanent', 'Associate Professor I', 'Active'),
(51, 5, 'Susan', '', 'Manuel', '', 'Permanent', 'Assistant Professor IV', 'Active'),
(52, 5, 'Irene Christy', '', 'Bacolod', '', 'Permanent', 'Instructor III', 'Active'),
(53, 5, 'Marilyn', '', 'Arcilla', '', 'Permanent', 'Instructor III', 'Active'),
(54, 5, 'Renalyn', '', 'Gacusan', '', 'Permanent', 'Instructor III', 'Active'),
(55, 5, 'Conrad', '', 'Buerkley', '', 'Permanent', 'Instructor III', 'Active'),
(56, 5, 'Genesis ', '', 'Dimalanta', '', 'Permanent', 'Instructor I', 'Active'),
(57, 5, 'Annette', '', 'Bagaoisan', '', 'Casual', 'Instructor I', 'Active'),
(58, 5, 'Christian', '', 'Dela Cruz', '', 'Casual', 'Instructor I', 'Active'),
(59, 5, 'Maria Blesila', '', 'Macapagal', '', 'Casual', 'Instructor I', 'Active'),
(60, 5, 'Maureen', '', 'Santos', '', 'Casual', 'Instructor I', 'Active'),
(61, 5, 'Ruby', '', 'Sicat', '', 'Casual', 'Instructor I', 'Active'),
(62, 8, 'Harold Van', '', 'Aquino', '', 'Casual', 'Instructor I', 'Active'),
(63, 6, 'Rebecca', '', 'Lising', '', 'Permanent', 'Assistant Professor IV', 'Active'),
(64, 6, 'Eduard', '', 'Ramos', '', 'Permanent', 'Assistant Professor I', 'Active'),
(65, 6, 'Janine', '', 'Abella', '', 'Casual', 'Instructor I', 'Active'),
(66, 6, 'Jessica', '', 'Aquino', '', 'Casual', 'Instructor I', 'Active'),
(67, 6, 'Maria-Leanne', '', 'Canlas', '', 'Casual', 'Instructor I', 'Active'),
(68, 6, 'Ronald', '', 'Cortez', '', 'Casual', 'Instructor I', 'Active'),
(69, 6, 'Angelito', '', 'David', '', 'Casual', 'Instructor I', 'Active'),
(70, 6, 'Edward Allen', '', 'Manaloto', '', 'Casual', 'Instructor I', 'Active'),
(71, 6, 'Milca', '', 'Miclat', '', 'Casual', 'Instructor I', 'Active'),
(72, 6, 'Imee', '', 'Salvador', '', 'Casual', 'Instructor I', 'Active'),
(73, 6, 'Jennifer', '', 'Villanueva', '', 'Casual', 'Instructor I', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `institutes`
--

CREATE TABLE `institutes` (
  `id` int(5) NOT NULL,
  `ins_id` varchar(10) NOT NULL,
  `ins_name` varchar(255) NOT NULL,
  `faculty_count` int(5) DEFAULT NULL,
  `logo` text NOT NULL,
  `status` enum('Active','Archived') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `institutes`
--

INSERT INTO `institutes` (`id`, `ins_id`, `ins_name`, `faculty_count`, `logo`, `status`) VALUES
(1, 'INSIAS113', 'Institute of Arts and Sciences ', 14, '2000px-Circle-icons-tools.svg.png', 'Active'),
(3, 'INSICS117', 'Institute of Computing Studies ', 17, 'ECU36YnBru6u.png', 'Active'),
(5, 'INSITE145', 'Institute of Teacher Education', 12, 'images.png', 'Active'),
(6, 'INSSHS391', 'Senior High School', 11, 'Weather.png', 'Active'),
(7, 'INSIBE416', 'Institute of Business Education', 6, 'Circle-icons-booklet.svg.png', 'Active'),
(8, 'INSIHM374', 'Institute of Hospitality and Management', 8, 'icon-solutions300.png', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(15) NOT NULL,
  `sched_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `notif_msg` text NOT NULL,
  `status` enum('Pending','Seen') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `obtl_details`
--

CREATE TABLE `obtl_details` (
  `id` int(10) NOT NULL,
  `obtl_id` int(10) NOT NULL,
  `faculty_id` int(10) NOT NULL,
  `course_desc` varchar(255) NOT NULL,
  `course_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obtl_details`
--

INSERT INTO `obtl_details` (`id`, `obtl_id`, `faculty_id`, `course_desc`, `course_code`) VALUES
(1, 1, 29, 'Software Engineering', 'SE'),
(2, 1, 28, 'Software Engineering', 'SE'),
(3, 1, 39, 'System Analysis and Design', 'SAD'),
(4, 1, 41, 'System Analysis and Design', 'SAD');

-- --------------------------------------------------------

--
-- Table structure for table `obtl_list`
--

CREATE TABLE `obtl_list` (
  `id` int(10) NOT NULL,
  `sched_id` int(10) NOT NULL,
  `obtl_title` text NOT NULL,
  `obtl_institute` int(10) NOT NULL,
  `obtl_author` int(10) NOT NULL,
  `obtl_approver` int(10) DEFAULT NULL,
  `dean_fa_submitted` date NOT NULL,
  `dean_remarks` enum('Approved','Pending','For Revision') NOT NULL,
  `dean_comments` text,
  `vpaa_fa_submitted` date DEFAULT NULL,
  `vpaa_remarks` enum('Approved','Pending','For Revision') DEFAULT NULL,
  `vpaa_comments` text,
  `system_remarks` enum('OK','LATE') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obtl_list`
--

INSERT INTO `obtl_list` (`id`, `sched_id`, `obtl_title`, `obtl_institute`, `obtl_author`, `obtl_approver`, `dean_fa_submitted`, `dean_remarks`, `dean_comments`, `vpaa_fa_submitted`, `vpaa_remarks`, `vpaa_comments`, `system_remarks`) VALUES
(1, 6, 'ICS OBTL Report', 3, 16, 15, '2017-08-30', 'Approved', '', '2017-08-30', 'Approved', '', 'OK');

-- --------------------------------------------------------

--
-- Table structure for table `report_schedule`
--

CREATE TABLE `report_schedule` (
  `id` int(10) NOT NULL,
  `report_type` varchar(100) NOT NULL,
  `semester` enum('1','2') NOT NULL,
  `academic_year` varchar(50) NOT NULL,
  `deadline` date NOT NULL,
  `deadline_extension` date NOT NULL,
  `status` enum('Ongoing','Closed','Archived') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report_schedule`
--

INSERT INTO `report_schedule` (`id`, `report_type`, `semester`, `academic_year`, `deadline`, `deadline_extension`, `status`) VALUES
(5, 'Counseling Report', '1', 'A.Y.: 2017 - 2018', '2017-08-31', '2017-09-05', 'Ongoing'),
(6, 'OBTL', '1', 'A.Y.: 2017 - 2018', '2017-08-31', '2017-09-05', 'Ongoing');

-- --------------------------------------------------------

--
-- Table structure for table `security`
--

CREATE TABLE `security` (
  `id` int(5) NOT NULL,
  `secq_id` varchar(10) NOT NULL,
  `secq_ans` text NOT NULL,
  `user_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `security`
--

INSERT INTO `security` (`id`, `secq_id`, `secq_ans`, `user_id`) VALUES
(1, 'SECQ1100', 'd8a0e1ea9110878bf10d0613fd090c1d', 1),
(12, 'SECQ1600', '928588b4e5661cd4bce65af9dda931a6', 15),
(13, 'SECQ1500', '3117ba116abc81b432a9f96d40a865c0', 16);

-- --------------------------------------------------------

--
-- Table structure for table `sys_position`
--

CREATE TABLE `sys_position` (
  `id` int(5) NOT NULL,
  `sys_id` varchar(10) NOT NULL,
  `sys_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys_position`
--

INSERT INTO `sys_position` (`id`, `sys_id`, `sys_name`) VALUES
(1, 'SPADMIN015', 'Super Admin'),
(2, 'VPAA024685', 'Vice President for Academic Affairs'),
(3, 'INSCLERK05', 'Institute Clerk'),
(4, 'INSDEAN548', 'Institute Dean'),
(5, 'INSPH12089', 'Institute Program Head');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `sys_id` int(5) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) NOT NULL,
  `ins_id` int(5) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `display_picture` text NOT NULL,
  `status` enum('Active','Inactive','Archived') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `sys_id`, `firstname`, `middlename`, `lastname`, `ins_id`, `username`, `password`, `display_picture`, `status`) VALUES
(1, 1, 'Rugie Ann', 'Narciso', 'Barrameda', 3, 'admin', '4297f44b13955235245b2497399d7a93', '18740660_1280125192086339_5363657698390268240_n.jpg', 'Active'),
(2, 2, 'Rowena', '', 'Macapagal', 5, 'rowenavpaa', '4297f44b13955235245b2497399d7a93', '13434703_292134357788398_1425024239948300588_n.jpg', 'Active'),
(15, 4, 'George', '', 'Granados', 3, 'george22', '4297f44b13955235245b2497399d7a93', 'user.png', 'Active'),
(16, 3, 'April Jane', '', 'Aguilar', 3, 'apriljane81', '4297f44b13955235245b2497399d7a93', 'user.png', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `counsel_details`
--
ALTER TABLE `counsel_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `counsel_id` (`counsel_id`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `counsel_list`
--
ALTER TABLE `counsel_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sched_id` (`sched_id`),
  ADD KEY `counsel_institute` (`counsel_institute`),
  ADD KEY `counsel_author` (`counsel_author`),
  ADD KEY `counsel_approver` (`counsel_approver`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ins_id` (`ins_id`);

--
-- Indexes for table `institutes`
--
ALTER TABLE `institutes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sched_id` (`sched_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `obtl_details`
--
ALTER TABLE `obtl_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `obtl_id` (`obtl_id`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `obtl_list`
--
ALTER TABLE `obtl_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sched_id` (`sched_id`),
  ADD KEY `obtl_institute` (`obtl_institute`),
  ADD KEY `obtl_author` (`obtl_author`),
  ADD KEY `obtl_approver` (`obtl_approver`);

--
-- Indexes for table `report_schedule`
--
ALTER TABLE `report_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `security`
--
ALTER TABLE `security`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sys_position`
--
ALTER TABLE `sys_position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sys_id` (`sys_id`),
  ADD KEY `ins_id` (`ins_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `counsel_details`
--
ALTER TABLE `counsel_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `counsel_list`
--
ALTER TABLE `counsel_list`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `institutes`
--
ALTER TABLE `institutes`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `obtl_details`
--
ALTER TABLE `obtl_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `obtl_list`
--
ALTER TABLE `obtl_list`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `report_schedule`
--
ALTER TABLE `report_schedule`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `security`
--
ALTER TABLE `security`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `sys_position`
--
ALTER TABLE `sys_position`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `counsel_details`
--
ALTER TABLE `counsel_details`
  ADD CONSTRAINT `counsel_details_ibfk_1` FOREIGN KEY (`counsel_id`) REFERENCES `counsel_list` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `counsel_details_ibfk_2` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `counsel_list`
--
ALTER TABLE `counsel_list`
  ADD CONSTRAINT `counsel_list_ibfk_1` FOREIGN KEY (`sched_id`) REFERENCES `report_schedule` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `counsel_list_ibfk_2` FOREIGN KEY (`counsel_institute`) REFERENCES `institutes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `counsel_list_ibfk_3` FOREIGN KEY (`counsel_author`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `counsel_list_ibfk_4` FOREIGN KEY (`counsel_approver`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_ibfk_1` FOREIGN KEY (`ins_id`) REFERENCES `institutes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`sched_id`) REFERENCES `report_schedule` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notifications_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `obtl_details`
--
ALTER TABLE `obtl_details`
  ADD CONSTRAINT `obtl_details_ibfk_1` FOREIGN KEY (`obtl_id`) REFERENCES `obtl_list` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `obtl_details_ibfk_2` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `obtl_list`
--
ALTER TABLE `obtl_list`
  ADD CONSTRAINT `obtl_list_ibfk_1` FOREIGN KEY (`sched_id`) REFERENCES `report_schedule` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `obtl_list_ibfk_2` FOREIGN KEY (`obtl_institute`) REFERENCES `institutes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `obtl_list_ibfk_3` FOREIGN KEY (`obtl_author`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `obtl_list_ibfk_4` FOREIGN KEY (`obtl_approver`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `security`
--
ALTER TABLE `security`
  ADD CONSTRAINT `security_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`sys_id`) REFERENCES `sys_position` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`ins_id`) REFERENCES `institutes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
