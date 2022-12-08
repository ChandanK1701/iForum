-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2020 at 04:39 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iforum`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(20) NOT NULL,
  `category_name` text NOT NULL,
  `category_description` text NOT NULL,
  `create_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_description`, `create_time`) VALUES
(1, 'Python', 'Python is the most popular programming language.', '2020-11-09 21:53:49'),
(2, 'PHP', 'PHP is a server-side programming language.', '2020-11-09 21:56:02'),
(3, 'Java', 'Java is a class-based, object-oriented programming language that is designed to have as few implementation dependencies as possible.', '2020-11-10 21:04:11'),
(4, 'JavaScript', 'JavaScript is most popular programming language. It is a web development language.', '2020-11-14 21:03:32'),
(5, 'C', 'C is a procedural programming language. It was initially developed by Dennis Ritchie in the year 1972. It was mainly developed as a system programming language to write an operating system. The main features of C language include low-level access to memory, a simple set of keywords, and clean style, these features make C language suitable for system programmings like an operating system or compiler development.', '2020-11-18 22:29:44'),
(6, 'C++', 'C++ is a cross-platform language that can be used to create high-performance applications. C++ was developed by Bjarne Stroustrup, as an extension to the C language. C++ gives programmers a high level of control over system resources and memory.\r\n', '2020-11-18 22:29:44'),
(7, 'Django', 'Django is a web application framework written in Python programming language. It is based on MVT (Model View Template) design pattern.', '2020-11-18 22:31:37');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(10) NOT NULL,
  `comment_content` text NOT NULL,
  `thread_id` int(10) NOT NULL,
  `comment_by` int(10) NOT NULL,
  `comment_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES
(1, 'this a testing comment.', 2, 5, '2020-11-13 18:11:57'),
(2, 'testing ', 1, 8, '2020-11-13 18:37:23'),
(3, 'Another comment', 2, 9, '2020-11-13 19:03:01'),
(4, 'Go to official PyCharm website.', 1, 1, '2020-11-13 19:08:05'),
(5, 'Java is one of the most popular and widely used programming language.\r\n\r\nJava has been one of the most popular programming language for many years.\r\nJava is Object Oriented. However it is not considered as pure object oriented as it provides support for primitive data types (like int, char, etc)\r\nThe Java codes are first compiled into byte code (machine independent code). Then the byte code is run on Java Virtual Machine (JVM) regardless of the underlying architecture.', 6, 5, '2020-11-13 19:15:41'),
(6, 'Java is one of the most popular and widely used programming language. Java has been one of the most popular programming language for many years.', 6, 7, '2020-11-13 19:16:05'),
(7, 'Helllo', 1, 1, '2020-11-15 17:57:33'),
(8, 'php is a server side programming language.', 7, 5, '2020-11-15 18:24:13'),
(9, 'java is a programming language.', 10, 8, '2020-11-15 18:42:31'),
(10, 'yes this is testing', 11, 8, '2020-11-15 18:56:23'),
(11, 'Another test', 2, 5, '2020-11-15 23:12:39'),
(12, 'Another test', 2, 6, '2020-11-15 23:13:28'),
(13, 'Another test', 2, 7, '2020-11-15 23:13:56'),
(14, 'hello world again', 12, 6, '2020-11-16 00:03:05'),
(15, 'hello, the coder here', 12, 5, '2020-11-16 00:09:41'),
(16, 'Hello comment', 14, 6, '2020-11-16 20:22:48'),
(17, 'CEO here. ', 15, 10, '2020-11-18 21:57:08');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_no` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `message` text NOT NULL,
  `msg_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_no`, `name`, `email`, `phone`, `message`, `msg_time`) VALUES
(1, 'Chandan', 'chandan12@gmail.com', '1234567890', 'Hello, How can i call you?', '2020-11-18 21:04:58'),
(2, 'Chandan Kumar', 'thecoder@code.com', '', 'hello ji', '2020-11-18 21:49:06'),
(3, 'CEO', 'chandan@ceo.com', '', 'I am CEO of my company. ', '2020-11-18 21:57:42'),
(4, 'The Coder', 'thecoder@code.com', '', 'hello test', '2020-11-18 22:02:23'),
(5, 'John', 'john@john.com', '', '<script>alert(\"Hello\");</script>', '2020-11-18 22:04:21'),
(6, 'Chandan Kumar', 'chandan12@gmail.com', '', 'hello', '2020-11-18 22:05:38');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(10) NOT NULL,
  `thread_title` text NOT NULL,
  `thread_description` text NOT NULL,
  `thread_cat_id` int(10) NOT NULL,
  `thread_user_id` int(10) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_description`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES
(1, 'Unable to install PyCharm IDE.', 'I am unable to install PyCharm IDE. How can i install it?', 1, 5, '2020-11-10 18:32:39'),
(2, 'What is password_hash() in php?', 'Can anyone explain it?', 2, 1, '2020-11-10 20:42:20'),
(6, 'What is java?', 'explain', 1, 8, '2020-11-13 17:36:26'),
(7, 'What is php?', 'Please someone explain it for me.', 2, 6, '2020-11-15 16:10:05'),
(8, 'Unable to use python', 'solve it please', 1, 7, '2020-11-15 17:56:13'),
(9, 'date function', 'explain ', 2, 8, '2020-11-15 18:23:41'),
(10, 'What is java?', 'Please explain someone.', 3, 5, '2020-11-15 18:42:07'),
(11, 'test', 'this is testing', 3, 1, '2020-11-15 18:55:49'),
(12, 'hello', 'hello world', 2, 6, '2020-11-16 00:02:40'),
(13, '&lt;script&gt;alert(\"Hello\");&lt;/script&gt;', '&lt;script&gt;alert(\"Hello Description\");&lt;/script&gt;', 2, 6, '2020-11-16 18:10:37'),
(14, 'Hello ', 'Hello description', 1, 6, '2020-11-16 20:22:06'),
(15, 'Hello', 'Hello, I am CEO of iForum.', 1, 10, '2020-11-18 21:56:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `serial_no` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`serial_no`, `name`, `email`, `password`, `timestamp`) VALUES
(1, 'Chandan', 'chandan17@xyz.com', '1234', '2020-11-10 22:33:45'),
(5, 'The Coder', 'thecoder@code.com', 'thecoder', '2020-11-13 23:25:31'),
(6, 'Chandan Kumar', 'chandan12@gmail.com', '1234', '2020-11-13 23:48:42'),
(7, 'John', 'john@john.com', 'jonh', '2020-11-13 23:54:45'),
(8, 'Chandan', 'chandan@gmail.com', 'gmail', '2020-11-14 00:15:34'),
(9, 'Hello World', 'helloworld@universe.com', 'universe', '2020-11-14 00:21:31'),
(10, 'CEO', 'chandan@ceo.com', 'ceo', '2020-11-18 21:50:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_no`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`serial_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `serial_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
