-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2024 at 05:21 AM
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
-- Database: `stemreach_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookmark`
--

CREATE TABLE `bookmark` (
  `user_id` varchar(20) NOT NULL,
  `playlist_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` varchar(20) NOT NULL,
  `content_id` varchar(20) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `mentor_id` varchar(20) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `content_id`, `user_id`, `mentor_id`, `comment`, `date`) VALUES
('sKESrjG6DGu8VEYqd8dH', 'G8QNq49dKF7phSJuJzXn', '0', 'VkQ25OY1V8nC0mGzJKUl', 'This was helpful, thank you ❤️', '2024-04-09');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` int(10) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` varchar(20) NOT NULL,
  `mentor_id` varchar(20) NOT NULL,
  `playlist_id` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `video` varchar(100) NOT NULL,
  `thumb` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) DEFAULT 'deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `mentor_id`, `playlist_id`, `title`, `description`, `video`, `thumb`, `date`, `status`) VALUES
('G8QNq49dKF7phSJuJzXn', 'VkQ25OY1V8nC0mGzJKUl', '0', 'HTML Bascis - Udemy web developer bootcamp', 'This HTML course provides an introduction to Hypertext Markup Language (HTML), the foundation of web development. Students will learn the basics of HTML syntax, tags, and elements to create structured web pages. Topics covered include text formatting, links, images, tables, forms, and basic web page layout. By the end of the course, students will have the skills to create static web pages and understand the fundamental building blocks of the web.', 'NmXNxIJ1U9AA6qsviAnz.mp4', 'kXqJXmgy7s1hNH0dkRlq.png', '2024-04-09', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `user_id` varchar(20) NOT NULL,
  `mentor_id` varchar(20) NOT NULL,
  `content_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mentor`
--

CREATE TABLE `mentor` (
  `id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `field of expertise` varchar(1000) NOT NULL,
  `interests` varchar(1000) NOT NULL,
  `availability` varchar(1000) NOT NULL,
  `profession` varchar(100) NOT NULL,
  `approach` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mentors`
--

CREATE TABLE `mentors` (
  `id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `profession` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `field_of_expertise` varchar(1000) NOT NULL,
  `interests` varchar(1000) NOT NULL,
  `availability` varchar(1000) NOT NULL,
  `approach` varchar(1000) NOT NULL,
  `location` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mentors`
--

INSERT INTO `mentors` (`id`, `name`, `email`, `profession`, `password`, `image`, `field_of_expertise`, `interests`, `availability`, `approach`, `location`) VALUES
('VkQ25OY1V8nC0mGzJKUl', 'Caroline Gyireh', 'c.gyireh@alustudent.com', 'journalist', '6b6bb28a5ff034ab42bdb700d745cc865451db50', 'OMlGDyUn5JyoECC6mG0F.jpg', 'Tech, STEM, Maths ', 'c.gyireh@alustudent.com', 'Machine Learning', 'inperson', ''),
('AcJPrv7dxyXpn23Y35xq', 'MentorMer', 'azaamaale12@gmail.com', 'lawyer', '6b6bb28a5ff034ab42bdb700d745cc865451db50', '2uH825XLAGWGd8tTaR0K.jpg', 'Maths', 'sat, mon, wed', 'Statistics and Probability', 'flexible', '');

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `id` int(20) NOT NULL,
  `mentor_id` int(20) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `thumb` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`id`, `mentor_id`, `title`, `description`, `thumb`, `date`, `status`) VALUES
(0, 0, 'Science Courses', 'Science encompasses studying the natural world, seeking to understand how it works and why things behave the way they do. From biology to physics and everything in between, science provides the foundation for exploring and explaining the wonders of our universe.', 'jIm7QAGMGcW9M0WBOUWE.png', '2024-04-07', 'active'),
(0, 0, 'Tech Courses', 'Technology is the application of scientific knowledge to create tools, systems, and solutions that enhance our lives. From computers and software to electronics and telecommunications, technology drives innovation and shapes the way we live, work, and interact with the world.', 'OdMgexZJahnZ3vFuAZuB.jpg', '2024-04-09', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `profession` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `profession`, `email`, `password`, `image`) VALUES
(6, 'Caroline', '', 'carolinegyireh@gmail', '5048661d95e1b3a3d222f5f64bb91eb142baef47', 'I5PvEATKlNNqsmEEM64H.jpg'),
(0, 'axaa', '', 'c.gyireh@alustudent.com', '6b6bb28a5ff034ab42bdb700d745cc865451db50', 'wibBnUUCPkXStzwblcLn.jpg'),
(0, 'cagyireh', '', 'azaamaalekaroline@gmail.com', '6b6bb28a5ff034ab42bdb700d745cc865451db50', 'wibBnUUCPkXStzwblcLn.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
