-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2017 at 09:20 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plmar`
--

-- --------------------------------------------------------

--
-- Table structure for table `pl_account_tbl`
--

CREATE TABLE `pl_account_tbl` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pl_account_tbl`
--

INSERT INTO `pl_account_tbl` (`id`, `image`, `student_id`, `name`, `email`, `gender`, `branch`, `year`, `section`, `username`, `password`, `role`, `date`) VALUES
(22, 'uploads/administrator.png', 'Administrator', 'Administrator', 'admin@noreply.com', 'Male', '', '', '', 'Administrator', '$2y$10$QbfpMyQ18GHPCXyEQWoko.oCTqaJ4y2w.MNduu2YQzZNSW6HvmDuW', '0', '2017-04-26 07:41:33'),
(32, 'uploads/male.jpg', 'A111G0001', 'demo', 'demo@yahoo.com', 'Male', 'Camarin', '4th Year', 'A81', 'A111G0001', '$2y$10$HO01iUPECyhLqPXWCL2GBulK6JvrFMdQYOtXdYAaVNnIuX5TWrIdm', '1', '2017-05-21 19:19:46');

-- --------------------------------------------------------

--
-- Table structure for table `pl_books_category_tbl`
--

CREATE TABLE `pl_books_category_tbl` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pl_books_category_tbl`
--

INSERT INTO `pl_books_category_tbl` (`id`, `category`) VALUES
(4, 'Emblem booksâ€Ž '),
(5, 'Poetry Books'),
(6, 'Fictional books'),
(8, 'sample category'),
(9, '');

-- --------------------------------------------------------

--
-- Table structure for table `pl_books_tbl`
--

CREATE TABLE `pl_books_tbl` (
  `id` int(11) NOT NULL,
  `isbn` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `status` varchar(255) NOT NULL,
  `copies` int(11) NOT NULL,
  `requesting` int(11) NOT NULL,
  `published_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pl_books_tbl`
--

INSERT INTO `pl_books_tbl` (`id`, `isbn`, `title`, `category`, `author`, `publisher`, `description`, `status`, `copies`, `requesting`, `published_date`) VALUES
(7, '978-1-86197-876-9', 'Refugee Boy', 'Fictional books', 'Benjamin Zephaniah', 'Bloomsbury Publishing', 'Refugee Boy is a teen novel written by Benjamin Zephaniah. It is a book about Alem Kelo, a 14-year-old refugee from Ethiopia and Eritrea. It was first published by Bloomsbury on 28 August 2001 . The novel was the recipient of the 2002 Portsmouth Book Award in the Longer Novel category.\r\n\r\n', 'Available', 2, 0, '08/21/2001');

-- --------------------------------------------------------

--
-- Table structure for table `pl_request_tbl`
--

CREATE TABLE `pl_request_tbl` (
  `id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `book_title` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `book_return` varchar(255) NOT NULL,
  `request_date` varchar(255) NOT NULL,
  `approved_date` varchar(255) NOT NULL,
  `returned_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pl_return_books_tbl`
--

CREATE TABLE `pl_return_books_tbl` (
  `id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `book_title` varchar(255) NOT NULL,
  `returned_date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pl_school_branch_tbl`
--

CREATE TABLE `pl_school_branch_tbl` (
  `id` int(11) NOT NULL,
  `branch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pl_school_branch_tbl`
--

INSERT INTO `pl_school_branch_tbl` (`id`, `branch`) VALUES
(2, 'Camarin'),
(3, 'Zabarte'),
(4, 'Lagro');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pl_account_tbl`
--
ALTER TABLE `pl_account_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pl_books_category_tbl`
--
ALTER TABLE `pl_books_category_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pl_books_tbl`
--
ALTER TABLE `pl_books_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pl_request_tbl`
--
ALTER TABLE `pl_request_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pl_return_books_tbl`
--
ALTER TABLE `pl_return_books_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pl_school_branch_tbl`
--
ALTER TABLE `pl_school_branch_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pl_account_tbl`
--
ALTER TABLE `pl_account_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `pl_books_category_tbl`
--
ALTER TABLE `pl_books_category_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `pl_books_tbl`
--
ALTER TABLE `pl_books_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `pl_request_tbl`
--
ALTER TABLE `pl_request_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pl_return_books_tbl`
--
ALTER TABLE `pl_return_books_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pl_school_branch_tbl`
--
ALTER TABLE `pl_school_branch_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
