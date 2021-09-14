-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2020 at 06:31 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `r3db`
--

-- --------------------------------------------------------

--
-- Table structure for table `r3_areas`
--

CREATE TABLE `r3_areas` (
  `area_id` int(11) NOT NULL,
  `area_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `r3_areas`
--

INSERT INTO `r3_areas` (`area_id`, `area_name`) VALUES
(1, 'Chicken'),
(2, 'Burger'),
(3, 'Beverage'),
(4, 'Test area');

-- --------------------------------------------------------

--
-- Table structure for table `r3_categories`
--

CREATE TABLE `r3_categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `r3_categories`
--

INSERT INTO `r3_categories` (`category_id`, `category_name`) VALUES
(1, 'Taste'),
(2, 'Smell'),
(3, 'Feeling'),
(4, 'Action');

-- --------------------------------------------------------

--
-- Table structure for table `r3_roles`
--

CREATE TABLE `r3_roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(20) NOT NULL,
  `role_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `r3_roles`
--

INSERT INTO `r3_roles` (`role_id`, `role_name`, `role_desc`) VALUES
(1, 'Admin', 'Super admin of R3 system'),
(2, 'Creator', 'Creates Rule'),
(6, 'Proofer', 'Validates or proofs rules.');

-- --------------------------------------------------------

--
-- Table structure for table `r3_rules`
--

CREATE TABLE `r3_rules` (
  `rule_id` int(11) NOT NULL,
  `rule_name` varchar(20) NOT NULL,
  `rule_graphic` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `sub_topic_id` int(11) NOT NULL,
  `rule_type` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `r3_rules_testing`
--

CREATE TABLE `r3_rules_testing` (
  `rule_id` int(11) NOT NULL,
  `rule_name` varchar(50) NOT NULL,
  `rule_graphic` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `sub_topic_id` int(11) NOT NULL,
  `rule_type` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `r3_rules_testing`
--

INSERT INTO `r3_rules_testing` (`rule_id`, `rule_name`, `rule_graphic`, `category_id`, `area_id`, `subject_id`, `topic_id`, `sub_topic_id`, `rule_type`, `created_at`) VALUES
(1, 'Making Tea', '', 1, 3, 3, 1, 0, 1, '2020-03-24 09:56:41'),
(2, 'To boost your confidence', '', 3, 4, 3, 1, 0, 2, '2020-03-24 10:09:47');

-- --------------------------------------------------------

--
-- Table structure for table `r3_rule_graphics`
--

CREATE TABLE `r3_rule_graphics` (
  `graphic_id` int(11) NOT NULL,
  `rule_id` int(11) NOT NULL,
  `graphic_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `r3_rule_graphics`
--

INSERT INTO `r3_rule_graphics` (`graphic_id`, `rule_id`, `graphic_name`) VALUES
(1, 1, 'eec697946206e2aa57515a11091cbe44.jpg'),
(2, 2, 'b32e0e17fc6cb09002bed3ce72863c58.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `r3_subjects`
--

CREATE TABLE `r3_subjects` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `r3_subjects`
--

INSERT INTO `r3_subjects` (`subject_id`, `subject_name`) VALUES
(1, 'Spice'),
(2, 'Grilling'),
(3, 'Test Subject');

-- --------------------------------------------------------

--
-- Table structure for table `r3_sub_topics`
--

CREATE TABLE `r3_sub_topics` (
  `sub_topic_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `sub_topic_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `r3_topics`
--

CREATE TABLE `r3_topics` (
  `topic_id` int(11) NOT NULL,
  `topic_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `r3_topics`
--

INSERT INTO `r3_topics` (`topic_id`, `topic_name`) VALUES
(1, 'Charcoal');

-- --------------------------------------------------------

--
-- Table structure for table `r3_users`
--

CREATE TABLE `r3_users` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `userfname` varchar(20) NOT NULL,
  `userlname` varchar(20) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_pwd` varchar(250) NOT NULL,
  `user_gender` varchar(1) NOT NULL,
  `user_dob` varchar(20) NOT NULL,
  `user_country` varchar(50) NOT NULL,
  `email_token` varchar(20) NOT NULL,
  `is_email_verify` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `r3_users`
--

INSERT INTO `r3_users` (`user_id`, `role_id`, `userfname`, `userlname`, `user_email`, `user_pwd`, `user_gender`, `user_dob`, `user_country`, `email_token`, `is_email_verify`, `created_at`) VALUES
(1, 1, 'Peter', 'Jones', 'admin@r3.com', '$2y$10$9jqmvadh8fOCRg6vonQU.OZg8gTxLBKe6E/u.PuoGmFInHFtAxj1q', '', '', '', '0', 1, '2020-03-03 14:39:10'),
(3, 2, 'Peter', 'Rocks', 'peterrocks@mailinator.com', '$2y$10$W/XKcvFSn6ffQgUdmHxtAuXjIwwglaWoslWx0hjMbigmWnX4BouTm', 'M', 'Mar 11, 2020', 'AQ', '0', 1, '2020-03-20 07:32:31'),
(5, 2, 'Kamiya', 'Test', 'kamiya5282@mplusmail.com', '$2y$10$V2PCiD3KREMGznNZ4cGayOktvVWVD1m6IQY/.n60HuXgdN1kr4xp6', 'F', 'Mar 25, 2020', 'DZ', '', 1, '2020-03-25 13:38:38');

-- --------------------------------------------------------

--
-- Table structure for table `r3_user_satchel`
--

CREATE TABLE `r3_user_satchel` (
  `user_id` int(11) NOT NULL,
  `rule_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `r3_areas`
--
ALTER TABLE `r3_areas`
  ADD PRIMARY KEY (`area_id`);

--
-- Indexes for table `r3_categories`
--
ALTER TABLE `r3_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `r3_roles`
--
ALTER TABLE `r3_roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `r3_rules`
--
ALTER TABLE `r3_rules`
  ADD PRIMARY KEY (`rule_id`),
  ADD KEY `FK_subject_id` (`subject_id`),
  ADD KEY `FK_area_id` (`area_id`),
  ADD KEY `FK_category_id` (`category_id`),
  ADD KEY `FK_topic_id` (`topic_id`);

--
-- Indexes for table `r3_rules_testing`
--
ALTER TABLE `r3_rules_testing`
  ADD PRIMARY KEY (`rule_id`);

--
-- Indexes for table `r3_rule_graphics`
--
ALTER TABLE `r3_rule_graphics`
  ADD PRIMARY KEY (`graphic_id`);

--
-- Indexes for table `r3_subjects`
--
ALTER TABLE `r3_subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `r3_sub_topics`
--
ALTER TABLE `r3_sub_topics`
  ADD PRIMARY KEY (`sub_topic_id`);

--
-- Indexes for table `r3_topics`
--
ALTER TABLE `r3_topics`
  ADD PRIMARY KEY (`topic_id`);

--
-- Indexes for table `r3_users`
--
ALTER TABLE `r3_users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `FK_role_id` (`role_id`);

--
-- Indexes for table `r3_user_satchel`
--
ALTER TABLE `r3_user_satchel`
  ADD PRIMARY KEY (`user_id`,`rule_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `r3_areas`
--
ALTER TABLE `r3_areas`
  MODIFY `area_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `r3_categories`
--
ALTER TABLE `r3_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `r3_roles`
--
ALTER TABLE `r3_roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `r3_rules`
--
ALTER TABLE `r3_rules`
  MODIFY `rule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `r3_rules_testing`
--
ALTER TABLE `r3_rules_testing`
  MODIFY `rule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `r3_rule_graphics`
--
ALTER TABLE `r3_rule_graphics`
  MODIFY `graphic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `r3_subjects`
--
ALTER TABLE `r3_subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `r3_sub_topics`
--
ALTER TABLE `r3_sub_topics`
  MODIFY `sub_topic_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `r3_topics`
--
ALTER TABLE `r3_topics`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `r3_users`
--
ALTER TABLE `r3_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `r3_rules`
--
ALTER TABLE `r3_rules`
  ADD CONSTRAINT `FK_area_id` FOREIGN KEY (`area_id`) REFERENCES `r3_areas` (`area_id`),
  ADD CONSTRAINT `FK_category_id` FOREIGN KEY (`category_id`) REFERENCES `r3_categories` (`category_id`),
  ADD CONSTRAINT `FK_subject_id` FOREIGN KEY (`subject_id`) REFERENCES `r3_subjects` (`subject_id`),
  ADD CONSTRAINT `FK_topic_id` FOREIGN KEY (`topic_id`) REFERENCES `r3_topics` (`topic_id`);

--
-- Constraints for table `r3_users`
--
ALTER TABLE `r3_users`
  ADD CONSTRAINT `FK_role_id` FOREIGN KEY (`role_id`) REFERENCES `r3_roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
