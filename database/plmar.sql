-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2017 at 03:23 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

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
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pl_account_tbl`
--

INSERT INTO `pl_account_tbl` (`id`, `image`, `student_id`, `name`, `email`, `gender`, `username`, `password`, `role`, `date`) VALUES
(1, 'uploads/administrator.png', 'Administrator', 'Administrator', 'admin@noreply.com', 'Male', 'Administrator', '$2y$10$hu26gnAywh8Kj/JqDZzZ3usV7U/PUZgC14ncIVFMobe.2HkYRtSvG', '0', '2017-04-26 00:52:04'),
(15, 'uploads/ako.jpg', 'A111G0001', 'John David Lozano', 'lozanojohndavid@gmail.com', 'Male', 'A111G0001', '$2y$10$GOiMLMnHW4La6VtQSRhyleAge/8Q6MQVyv50yzyKYww4xdcGAttga', '1', '2017-04-26 00:57:36'),
(16, 'uploads/female.jpg', 'A111G0002', 'Jeddahlyn Cabuga', 'cabugajeddahlyn@gmail.com', 'Female', 'A111G0002', '$2y$10$KMon3lA6Sd34BzDLXquEZuP2DrqoSZ5RCSAGU7MCWeeA8MEXoIOHC', '1', '2017-04-25 16:27:49'),
(17, 'uploads/male.jpg', 'A111G0003', 'Jade Batal', 'jadebatal@gmail.com', 'Male', 'A111G0003', '$2y$10$c9IbcTUlwIYEvRjwN.qfKenTQyZH9/WI9smUDUKJSaYVvS6mOPJ4.', '1', '2017-04-25 16:28:13'),
(18, 'uploads/male.jpg', 'A111G0004', 'Shinjie Calica', 'shinjiecalica@gmail.com', 'Male', 'A111G0004', '$2y$10$OHAkyROl7m4.ga5e7W0nqeCXvFfKaVElJu3RwWq4ahwsLsdWVI2Qm', '1', '2017-04-25 16:28:27'),
(19, 'uploads/male.jpg', 'A111G0005', 'Sajer Broncano', 'sajerbroncano@gmail.com', 'Male', 'A111G0005', '$2y$10$bwzpTx4wpkPB696xLFpNreHYMdOL9Y5WGMUvfPcbPINPpY8RwGV4a', '1', '2017-04-25 16:28:35'),
(20, 'uploads/male.jpg', 'A111G0006', 'John Paul Bobila', 'johnpaulbobila@gmail.com', 'Male', 'A111G0006', '$2y$10$n2SVO.LBPzWr9fgh1DacTOWsAQ.YQeWlCfFgw18D6iPPhu0O.mzwy', '1', '2017-04-25 16:28:44');

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
(6, 'Fictional books');

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
  `requesting` int(11) NOT NULL,
  `published_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pl_books_tbl`
--

INSERT INTO `pl_books_tbl` (`id`, `isbn`, `title`, `category`, `author`, `publisher`, `description`, `status`, `requesting`, `published_date`) VALUES
(6, '978-3-16-148410-0', 'Blaze Comics', 'Fictional books', 'Dan Jurgens', 'Dan Jurgens', 'Blaze Comics is a fictional American comic-book publisher in the DC Comics universe. The issues regularly featured Booster Gold as its main hero.', 'Unavailable', 1, '05/08/1986'),
(7, '978-1-86197-876-9', 'Refugee Boy', 'Fictional books', 'Benjamin Zephaniah', 'Bloomsbury Publishing', 'Refugee Boy is a teen novel written by Benjamin Zephaniah. It is a book about Alem Kelo, a 14-year-old refugee from Ethiopia and Eritrea. It was first published by Bloomsbury on 28 August 2001 . The novel was the recipient of the 2002 Portsmouth Book Award in the Longer Novel category.\r\n\r\n', 'Unavailable', 1, '08/21/2001');

-- --------------------------------------------------------

--
-- Table structure for table `pl_request_tbl`
--

CREATE TABLE `pl_request_tbl` (
  `id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `book_title` varchar(255) NOT NULL,
  `request_date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `approved_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pl_request_tbl`
--

INSERT INTO `pl_request_tbl` (`id`, `student_id`, `name`, `book_title`, `request_date`, `status`, `approved_date`) VALUES
(3, 'A111G0001', 'John David Lozano', 'Blaze Comics', 'April 26,  2017', 'Approved', 'April 26,  2017'),
(4, 'A111G0001', 'John David Lozano', 'Refugee Boy', 'April 26,  2017', 'Approved', 'April 26,  2017');

-- --------------------------------------------------------

--
-- Table structure for table `pl_return_books_tbl`
--

CREATE TABLE `pl_return_books_tbl` (
  `id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `book_title` varchar(255) NOT NULL,
  `returned_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pl_account_tbl`
--
ALTER TABLE `pl_account_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `pl_books_category_tbl`
--
ALTER TABLE `pl_books_category_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pl_books_tbl`
--
ALTER TABLE `pl_books_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pl_request_tbl`
--
ALTER TABLE `pl_request_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pl_return_books_tbl`
--
ALTER TABLE `pl_return_books_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
