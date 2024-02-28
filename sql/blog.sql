-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2023 at 03:25 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `catergory`
--

CREATE TABLE `catergory` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(225) NOT NULL,
  `description` text DEFAULT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` mediumtext DEFAULT NULL,
  `meta_keyword` mediumtext DEFAULT NULL,
  `navbar_status` tinyint(1) DEFAULT 0,
  `status` tinyint(1) DEFAULT 0 COMMENT '0=visible,1=hidden,2=deleted',
  `created_on` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `catergory`
--

INSERT INTO `catergory` (`id`, `name`, `slug`, `description`, `meta_title`, `meta_description`, `meta_keyword`, `navbar_status`, `status`, `created_on`) VALUES
(1, 'Html', 'html', 'html tutorials', 'html crash courses', 'html', 'html', 0, 0, '2023-12-04 00:03:48'),
(2, 'PHP tutorial', 'p-h-p', 'php crash courses', 'personal home page', 'php turtorials', 'php beginners', 0, 0, '2023-12-04 00:20:17'),
(3, 'JQUERY', 'sscript-javascript', 'javascript library', 'jquery-learning', 'query javascript', 'javascripts', 0, 0, '2023-12-04 16:27:05');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `catergory_id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `meta_title` varchar(225) NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `meta_keyword` mediumtext NOT NULL,
  `status` tinyint(1) DEFAULT 0 COMMENT '0=visible,1=hidden,2=delete',
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `catergory_id`, `name`, `slug`, `description`, `photo`, `meta_title`, `meta_description`, `meta_keyword`, `status`, `created_at`) VALUES
(1, 1, 'HTML FIRST TUTORIALS', 'H-T-M-L', 'HTML as a hyper - text makeup language .. it is also a cheat code for building static webpages, by the end of this turtor you will be able to understand what html is ', '1701648490.JPG', 'html crash courses', '   html tutorials   ', '   html', 0, '2023-12-04 00:08:10'),
(2, 2, 'PHP crash course', 'php', 'PHP :\r\nmeaning hyper text processor , it is a scripting language also a programming language . You may be wondering what this language is use for ? don\'t worry at the end of this tutorials you will be able know what php mean..\r\nThis language php is used for building interactive web page .. like the one you are currently going through , also facebook, wiki-pedia and many web application..\r\n', '1701649568.BMP', 'php turtorials', '   php lessons   ', '   php', 0, '2023-12-04 00:26:08'),
(3, 3, 'Jquery_Tutorials', 'j-query', 'Jquery ::\r\n  This is a javascript library that is used to make a webpage more interactive ,,\r\nimagine the like button on facebook . anytime a user clicks it ,, the page will not load , that is the jquery ', '1701707434.GIF', 'jquery-learning', 'jquery-libray for learning', 'jquery learning ', 0, '2023-12-04 16:30:34');

-- --------------------------------------------------------

--
-- Table structure for table `user_`
--

CREATE TABLE `user_` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rander` varchar(255) NOT NULL,
  `status` tinyint(1) DEFAULT 0,
  `role_as` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=user,1=admin,2superadmin',
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_`
--

INSERT INTO `user_` (`id`, `firstname`, `lastname`, `email`, `password`, `rander`, `status`, `role_as`, `date`) VALUES
(4, 'mishack', 'baddu', 'daddo@gmail.com', '$2y$10$n38ZY9./7va9A6Pn/.tbMekNaT6KtFZVsqJ6gE5QBhZHOIbvey.EG', './rander/profile/image1.jpg', 0, 1, '2023-11-27 14:32:00'),
(5, 'loreminy', 'marai', 'jjk@gmail.com', '$2y$10$gKxWlCFHkeCqXE7XaX2pT.jEIVwDvZuOiXxmd0.NnYEtcpYR0VsJK', './rander/profile/image.jpg', 0, 1, '2023-11-27 14:35:39'),
(6, 'nato', 'miana', 'email@gmail.com', '$2y$10$gKxWlCFHkeCqXE7XaX2pT.jEIVwDvZuOiXxmd0.NnYEtcpYR0VsJK', './rander/profile/image1.jpg', 0, 0, '2023-11-27 14:43:53'),
(7, 'anita', 'shoila', 'shoila@gmailcom', '$2y$10$gKxWlCFHkeCqXE7XaX2pT.jEIVwDvZuOiXxmd0.NnYEtcpYR0VsJK', './rander/profile/image.jpg', 0, 0, '2023-11-27 16:24:48'),
(9, 'bulla', 'panda', 'panda@gmail.com', '$2y$10$07Qx4i8dBCmSzp1thdkvf.Olhaw.Ld.cX10nI4U6TUNQmeJZGl7h2', './rander/profile/image.jpg', 0, 1, '2023-11-29 08:43:32'),
(10, 'polination', 'polination', 'polination@gmail.com', '$2y$10$gKxWlCFHkeCqXE7XaX2pT.jEIVwDvZuOiXxmd0.NnYEtcpYR0VsJK', './rander/profile/image.jpg', 0, 2, '2023-11-30 03:56:42'),
(11, 'mishack', 'mishack', 'mishack@gmail.com', '$2y$10$gKxWlCFHkeCqXE7XaX2pT.jEIVwDvZuOiXxmd0.NnYEtcpYR0VsJK', './rander/profile/image1.jpg', 0, 0, '2023-12-03 05:25:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catergory`
--
ALTER TABLE `catergory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_`
--
ALTER TABLE `user_`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catergory`
--
ALTER TABLE `catergory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_`
--
ALTER TABLE `user_`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
