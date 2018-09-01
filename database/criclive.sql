-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2018 at 12:29 PM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`, `email`) VALUES
('admin', 'admin', '1111', 'adf@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `batting`
--

CREATE TABLE `batting` (
  `id` varchar(100) NOT NULL,
  `player1` varchar(10) NOT NULL,
  `player2` varchar(10) NOT NULL,
  `player3` varchar(10) NOT NULL,
  `player4` varchar(10) NOT NULL,
  `player5` varchar(10) NOT NULL,
  `player6` varchar(10) NOT NULL,
  `player7` varchar(10) NOT NULL,
  `player8` varchar(10) NOT NULL,
  `player9` varchar(10) NOT NULL,
  `player10` varchar(10) NOT NULL,
  `player11` varchar(10) NOT NULL,
  `score` int(100) NOT NULL,
  `wicket` int(10) NOT NULL,
  `extra` int(10) NOT NULL,
  `over` varchar(10) NOT NULL,
  `batsman1` varchar(10) NOT NULL,
  `batsman2` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batting`
--

INSERT INTO `batting` (`id`, `player1`, `player2`, `player3`, `player4`, `player5`, `player6`, `player7`, `player8`, `player9`, `player10`, `player11`, `score`, `wicket`, `extra`, `over`, `batsman1`, `batsman2`) VALUES
('banvsaus_1', '18/10', '3/3', '6/3', '', '', '', '', '', '', '', '', 29, 1, 2, '2.4', 'player1', 'player3'),
('banvsaus_2', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, '0.0', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `bowling`
--

CREATE TABLE `bowling` (
  `id` varchar(100) NOT NULL,
  `player1` varchar(100) NOT NULL,
  `player2` varchar(100) NOT NULL,
  `player3` varchar(100) NOT NULL,
  `player4` varchar(100) NOT NULL,
  `player5` varchar(100) NOT NULL,
  `player6` varchar(100) NOT NULL,
  `player7` varchar(100) NOT NULL,
  `player8` varchar(100) NOT NULL,
  `player9` varchar(100) NOT NULL,
  `player10` varchar(100) NOT NULL,
  `player11` varchar(100) NOT NULL,
  `bowler1` varchar(10) NOT NULL,
  `bowler2` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bowling`
--

INSERT INTO `bowling` (`id`, `player1`, `player2`, `player3`, `player4`, `player5`, `player6`, `player7`, `player8`, `player9`, `player10`, `player11`, `bowler1`, `bowler2`) VALUES
('banvsaus_2', '', '', '', '', '', '', '1.4-20-0', '1.0-9-1', '', '', '', 'player7', 'player8');

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
(2, 2, 'xx', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2018-08-08', '4:00 PM'),
(4, 1, 'aa', 'Hello there :)', '2018-08-15', '11:29:35am');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `team_id` varchar(100) NOT NULL,
  `name` varchar(10) NOT NULL,
  `player1` varchar(10) NOT NULL,
  `player2` varchar(10) NOT NULL,
  `player3` varchar(10) NOT NULL,
  `player4` varchar(10) NOT NULL,
  `player5` varchar(10) NOT NULL,
  `player6` varchar(10) NOT NULL,
  `player7` varchar(10) NOT NULL,
  `player8` varchar(10) NOT NULL,
  `player9` varchar(10) NOT NULL,
  `player10` varchar(10) NOT NULL,
  `player11` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`team_id`, `name`, `player1`, `player2`, `player3`, `player4`, `player5`, `player6`, `player7`, `player8`, `player9`, `player10`, `player11`) VALUES
('AUS', 'Australia', 'Marsh', 'Warner', 'Khawaja', 'Maxwell', 'Smith', 'Finch', 'Paine', 'Wade', 'Cummins', 'Lyon', 'Starc'),
('BAN', 'Bangladesh', 'Tamim', 'Liton', 'Shakib', 'Ashraful', 'Mahmud', 'Mushfiq', 'Soumya', 'Mashrafee', 'Rubel', 'Mustafiz', 'Roni'),
('IND', 'India', 'Pujara', 'Rohit', 'Kohli', 'Rahul', 'Yuvraj', 'Dhoni', 'Pandya', 'Jadeja', 'Ashwin', 'Shami', 'Bumrah'),
('PAK\r\n', 'Pakistan', 'Fakhar', 'Malik', 'Shehzad', 'Mishbah', 'Afridi', 'Hafeez', 'Sarfaraz', 'Amir', 'Wahab', 'Irfan', 'Yasir');

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
('admin', '1111', 'admin'),
('bb', '1234', 'user'),
('xx', '2222', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `play`
--

CREATE TABLE `play` (
  `match_id` varchar(100) NOT NULL,
  `team1` varchar(10) NOT NULL,
  `team2` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `innings` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `play`
--

INSERT INTO `play` (`match_id`, `team1`, `team2`, `status`, `innings`) VALUES
('banvsaus', 'BAN', 'AUS', 'live', 1);

-- --------------------------------------------------------

--
-- Table structure for table `player info`
--

CREATE TABLE `player info` (
  `player_id` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `country` varchar(20) NOT NULL,
  `category` varchar(15) NOT NULL,
  `rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `player info`
--

INSERT INTO `player info` (`player_id`, `name`, `country`, `category`, `rating`) VALUES
('1', 'Virat Kohli', 'India', 'Batsman', 9),
('10', 'Joe Root', 'England', 'Batsman', 9),
('11', 'Azhar Ali', 'Pakistan', 'Batsman', 8),
('12', 'Wahab Riaz', 'Pakistan', 'Bowler', 8),
('13', 'Chris Gayle', 'Windies', 'Batsman', 8),
('14', 'Thisara Perera', 'Srilanka', 'All-Rounder', 8),
('15', 'kusal Perera', 'Srilanka', 'Batsman', 8),
('16', 'Rubel Hossain', 'Bangladesh', 'Bowler', 8),
('17', 'Mushfiqur Rahman', 'Bangladesh', 'WicketKeeper', 8),
('18', 'Mahmud Ullah', 'Bangladesh', 'Batsman', 8),
('19', 'Liton Das', 'Bangladesh', 'WicketKeeper', 8),
('2', 'Tamim Iqbal', 'Bangladesh', 'Batsman', 9),
('20', 'Rashid Khan', 'Afganistan', 'Bowler', 9),
('3', 'kane Williamson', 'New Zeland', 'Batsman', 9),
('4', 'MS Dhoni', 'India', 'WicketKeeper ', 8),
('5', 'Shakib al Hasan', 'Bangladesh', 'All-rounder', 9),
('6', 'Andre Russell', 'Windies', 'All-Rounder', 9),
('7', 'Mashrafee Mortaza', 'Bangladesh', 'Bowler', 8),
('8', 'Mustafizur Rahman', 'Bangladesh', 'Bowler', 9),
('9', 'Mohammad Amir', 'Pakistan', 'Bowler', 9);

-- --------------------------------------------------------

--
-- Table structure for table `poll`
--

CREATE TABLE `poll` (
  `poll_id` int(255) NOT NULL,
  `heading` varchar(1000) NOT NULL,
  `op1` varchar(100) NOT NULL,
  `op2` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poll`
--

INSERT INTO `poll` (`poll_id`, `heading`, `op1`, `op2`) VALUES
(1, 'Who will win today\'s match?', 'Bangladesh', 'Australia'),
(2, 'Who will win today\'s match?', 'India', 'Pakistan');

-- --------------------------------------------------------

--
-- Table structure for table `polls`
--

CREATE TABLE `polls` (
  `id` int(255) NOT NULL,
  `poll_id` varchar(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `response` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `polls`
--

INSERT INTO `polls` (`id`, `poll_id`, `user_id`, `response`) VALUES
(1, '1', 'aa', 'Bangladesh'),
(7, '2', 'aa', 'Pakistan'),
(9, '1', 'xx', 'Australia'),
(30, '1', '28412', 'Bangladesh'),
(32, '2', '28412', 'India'),
(33, '1', 'bb', 'Bangladesh'),
(34, '2', 'bb', 'Pakistan'),
(35, '1', '15578', 'Bangladesh'),
(36, '1', '935', 'Australia');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(255) NOT NULL,
  `user_id` varchar(1000) NOT NULL,
  `headline` varchar(1000) NOT NULL,
  `text` varchar(10000) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `user_id`, `headline`, `text`, `date`, `time`, `image`) VALUES
(1, 'adam', 'Shakib\'s retirement', 'Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.', '2018-08-10', '2:30 PM', ''),
(2, 'charlie', 'Mashrafi the hero', 'Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.', '2018-08-08', '12:00 AM', '');

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

CREATE TABLE `rank` (
  `user_id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `points` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rank`
--

INSERT INTO `rank` (`user_id`, `name`, `country`, `points`) VALUES
('aa', 'ABC', 'Bangladesh', 800),
('bb', 'Faysal', 'South Africa', 1000),
('xx', 'ABCD', 'England', 500);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `user_id` varchar(100) NOT NULL,
  `player1` varchar(100) NOT NULL,
  `player2` varchar(100) NOT NULL,
  `player3` varchar(100) NOT NULL,
  `player4` varchar(100) NOT NULL,
  `player5` varchar(100) NOT NULL,
  `player6` varchar(100) NOT NULL,
  `player7` varchar(100) NOT NULL,
  `player8` varchar(100) NOT NULL,
  `player9` varchar(100) NOT NULL,
  `player10` varchar(100) NOT NULL,
  `player11` varchar(100) NOT NULL,
  `balance` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`user_id`, `player1`, `player2`, `player3`, `player4`, `player5`, `player6`, `player7`, `player8`, `player9`, `player10`, `player11`, `balance`) VALUES
('aa', '5', '8', '7', '9', '17', '18', '1', '3', '16', '13', '20', 10000),
('bb', '', '', '', '', '', '', '', '', '', '', '', 50000),
('xx', '', '', '', '', '', '', '', '', '', '', '', 50000);

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
('aa', '1234', 'ABC', 'abc@gmail.com', 'Bangladesh', '3/3/2000'),
('bb', '1234', 'Faysal', 'fa@gmail.com', 'South Africa', '1/1/2001'),
('xx', '2222', 'ABCD', 'abc@gmail.com', 'England', '1/1/2001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batting`
--
ALTER TABLE `batting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bowling`
--
ALTER TABLE `bowling`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`team_id`);

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
-- Indexes for table `play`
--
ALTER TABLE `play`
  ADD PRIMARY KEY (`match_id`);

--
-- Indexes for table `player info`
--
ALTER TABLE `player info`
  ADD PRIMARY KEY (`player_id`);

--
-- Indexes for table `poll`
--
ALTER TABLE `poll`
  ADD PRIMARY KEY (`poll_id`);

--
-- Indexes for table `polls`
--
ALTER TABLE `polls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `rank`
--
ALTER TABLE `rank`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`user_id`);

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
  MODIFY `com_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `poll`
--
ALTER TABLE `poll`
  MODIFY `poll_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `polls`
--
ALTER TABLE `polls`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
