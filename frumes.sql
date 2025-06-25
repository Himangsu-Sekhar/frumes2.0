-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2025 at 06:00 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `frumes`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `a_id` int(12) NOT NULL,
  `a_name` varchar(100) NOT NULL,
  `a_email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`a_id`, `a_name`, `a_email`, `password`) VALUES
(1, 'FRUMES', 'frumes2024@gmail.com', 'be8676db2d75f30c6162d48179643b67');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `b_id` int(12) NOT NULL,
  `b_name` varchar(100) NOT NULL,
  `b_logo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`b_id`, `b_name`, `b_logo`) VALUES
(1, 'Facebook', 'https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg'),
(2, 'Microsoft', 'https://upload.wikimedia.org/wikipedia/commons/4/44/Microsoft_logo.svg'),
(3, 'Apple', 'https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg'),
(4, 'Google', 'https://upload.wikimedia.org/wikipedia/commons/2/2f/Google_2015_logo.svg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_id` int(12) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `Name` varchar(255) NOT NULL,
  `phone no.` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `service_id` int(12) NOT NULL,
  `description` varchar(500) NOT NULL,
  `Completed_By` varchar(255) NOT NULL DEFAULT 'NONE',
  `dat` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Order_id`, `status`, `Name`, `phone no.`, `email`, `service_id`, `description`, `Completed_By`, `dat`) VALUES
(14, 'Completed', 'Salman Khan', '09957725081', 'salmankhan99@gmail.com', 1, 'Need some Services', 'FRUMES', '2025-05-22 16:06:19'),
(17, 'Completed', 'Himangsu Dutta', '09957725081', 'himangsudutta278@gmail.com', 9, 'I need a website', 'FRUMES', '2025-05-22 16:36:36'),
(18, 'Completed', 'STEVE ROGERS', '09957725081', 'steverogers@gmail.com', 1, 'Hello!', 'FRUMES', '2025-05-27 12:18:20'),
(19, 'Completed', 'HIMANGSU DUTTA', '09957725081', 'himangsudutta278@gmail.com', 1, 'I need a video.', 'FRUMES', '2025-06-10 17:16:20'),
(20, 'Completed', 'HIMANGSU DUTTA', '09957725081', 'himangsudutta278@gmail.com', 9, 'i need a website', 'FRUMES', '2025-06-10 22:38:55'),
(21, 'Pending', 'Himangsu Dutta', '09957725081', 'himangsudutta278@gmail.com', 1, 'i need a video.', 'NONE', '2025-06-18 21:37:48'),
(22, 'Pending', 'HIMANGSU DUTTA', '09957725081', 'himangsudutta278@gmail.com', 1, '1', 'NONE', '2025-06-19 11:34:40');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `s_id` int(12) NOT NULL,
  `s_name` varchar(100) NOT NULL,
  `s_para` varchar(500) NOT NULL,
  `s_icon` text NOT NULL,
  `is_hidden` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`s_id`, `s_name`, `s_para`, `s_icon`, `is_hidden`) VALUES
(1, 'Video Prouction', 'We create stunning videos tailored to your brand story.', 'fas fa-film', 0),
(2, 'Digital PR', 'Boost your online reputation and visibility with PR outreach.', 'fas fa-bullhorn', 0),
(3, 'Content Writing', 'Craft compelling content that engages and converts.', 'fas fa-pen-nib', 0),
(5, 'Social Media Marketing', 'We Provide Social media marketing services!', 'fab fa-adversal', 0),
(9, 'Web Development', 'We provide web development services.', 'fab fa-dev', 0);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `t_id` int(12) NOT NULL,
  `t_name` varchar(100) NOT NULL,
  `feedback` varchar(255) NOT NULL,
  `t_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`t_id`, `t_name`, `feedback`, `t_img`) VALUES
(13, 'John Doe, CEO of Brandify', '\"Frumes helped elevate our brand beyond expectations. The video production quality was top-notch.\"', 'https://randomuser.me/api/portraits/men/32.jpg'),
(14, 'Jane Smith, Marketing Lead at Nova', '\"Amazing creative team. They delivered our campaign faster than expected and exceeded all goals.\"', 'https://randomuser.me/api/portraits/women/44.jpg'),
(15, 'Alex Johnson, Founder of SnapFit', '\"Their social media strategy helped us triple our engagement in just 2 weeks.\"', 'https://randomuser.me/api/portraits/men/76.jpg'),
(16, 'Salman Khan', 'Service as fast as my driving!', 'data:image/webp;base64,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');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_id`),
  ADD KEY `fk_orders_service_id` (`service_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `a_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `b_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `s_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `t_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_service_id` FOREIGN KEY (`service_id`) REFERENCES `services` (`s_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
