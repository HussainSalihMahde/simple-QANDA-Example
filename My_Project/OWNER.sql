-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 08, 2019 at 10:48 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `OWNER`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `email`, `comment`) VALUES
(1, 'hussain@gmail.com', 'this is good thank you'),
(2, 'ali@gmail.com', 'thanks for you');

-- --------------------------------------------------------

--
-- Table structure for table `infos`
--

CREATE TABLE `infos` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `infos`
--

INSERT INTO `infos` (`id`, `name`, `email`, `password`) VALUES
(1, 'ali mohammed', 'ali@gmail.com', '19988991'),
(2, 'salem', 'salem1989@gmail.com', '12266881'),
(3, 'Hussain faris', 'hussain2000.faris@gmail.com', '2000hussain2000'),
(4, 'zaid tariq', 'zaid11982hdf@gmail.com', '569345293aZ'),
(5, 'fared mohe', 'faredfred@gmail.com', '33224455');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `infos_id` int(11) NOT NULL,
  `quest` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `infos_id`, `quest`, `answer`, `score`) VALUES
(1, 3, 'read array from text file in php', '<?php\r\n$arr = array(\'name\',\'rollno\',\'address\');\r\nfile_put_contents(\'array.txt\', print_r($arr, true));\r\n?>\r\n', 3),
(2, 1, 'read text file in python', 'with open(\"r1.txt\") as file:\r\n   lines = file.read()', 6),
(4, 2, 'convert string to int', 'var a = parseInt(\"10\") + \"<br>\";', 3),
(5, 1, 'convert int to float', 'var fval = 4;\r\n\r\nconsole.log(fval.toFixed(2)); ', 2),
(6, 2, 'read text file in python', 'with open(\"r1.txt\") as fp:\r\n    lines = [line for line in fp]\r\n    keys = [s.strip() for s in lines[0].split(\'|\')]  # key line\r\n    vals = [s.strip() for s in lines[2].split(\'|\')]  # value line\r\n    f = dict(zip(keys, vals))\r\n    print(f)', 2),
(7, 4, 'read array from text file in php', '$strarray = file_get_contents(\'array.txt\');', 3),
(8, 5, 'download mysql driver manually', '$ mkdir $GOPATH/src/github.com/go-sql-driver/mysql\r\n$ pushd $GOPATH/src/github.com/go-sql-driver\r\n$ git clone https://github.com/go-sql-driver/mysql.git\r\n$ popd', 4),
(9, 3, 'download pygame in python', 'in terminal : python -m pip install pygame', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `infos`
--
ALTER TABLE `infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `infos`
--
ALTER TABLE `infos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
