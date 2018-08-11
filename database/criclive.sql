-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2018 at 04:20 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `criclive`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `com_id` int(255) NOT NULL,
  `post_id` int(255) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `text` varchar(1000) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`com_id`, `post_id`, `user_id`, `text`, `date`, `time`) VALUES
(1, 1, 'bb', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2018-08-10', '5:30 PM'),
(2, 2, 'xx', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2018-08-08', '4:00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `editor`
--

CREATE TABLE `editor` (
  `id` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `editor`
--

INSERT INTO `editor` (`id`, `password`, `name`, `email`, `country`, `date`) VALUES
('adam', '1111', 'Adam Levine', 'adam@hotmail.com', 'Australia', '5/5/1980'),
('charlie', '3333', 'Charlie Puth', 'charlie@yahoo.com', 'India', '8/9/1995');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `password`, `type`) VALUES
('aa', '1234', 'user'),
('xx', '2222', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(255) NOT NULL,
  `user_id` varchar(1000) NOT NULL,
  `text` varchar(10000) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `user_id`, `text`, `date`, `time`, `image`) VALUES
(1, 'adam', 'Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.', '2018-08-10', '2:30 PM', ''),
(2, 'charlie', 'Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.', '2018-08-08', '12:00 AM', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `password`, `name`, `email`, `country`, `date`) VALUES
('12312', '1234', 'dss', 'sadfasf@as.com', 'Afghanistan', '2/2/2000'),
('aa', '1234', 'ABC', 'abc@gmail.com', 'Bangladesh', '3/3/2000'),
('abc', '1234', 'abc', 'faysal4777@gmail.com', 'Bangladesh', '2/3/2000'),
('bb', '1234', 'Faysal', 'fa@gmail.com', 'South Africa', '1/1/2001'),
('cc', '1234', 'Liomn', 'limon@gmail.com', 'Australia', '3/3/2003'),
('xx', '2222', 'ABCD', 'abc@gmail.com', 'England', '1/1/2001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `editor`
--
ALTER TABLE `editor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `com_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
