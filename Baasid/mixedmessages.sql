-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2024 at 01:46 PM
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
-- Database: `mixedmessages`
--

-- --------------------------------------------------------

--
-- Table structure for table `adjectives`
--

CREATE TABLE `adjectives` (
  `id` int(11) NOT NULL,
  `col2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adjectives`
--

INSERT INTO `adjectives` (`id`, `col2`) VALUES
(1, 'red'),
(2, 'green'),
(3, 'violet'),
(4, 'blue'),
(5, 'yellow'),
(6, 'angry'),
(7, 'friendly'),
(8, 'heavy'),
(9, 'lightweight'),
(10, 'fat'),
(11, 'skinny'),
(12, 'shitty'),
(13, 'amazing'),
(14, 'sleepy'),
(15, 'sexy'),
(16, 'drunk'),
(17, 'sad'),
(18, 'happy'),
(19, 'fabulous'),
(20, 'unimaginative'),
(21, 'unbelievable'),
(22, 'unhappy'),
(23, 'normal'),
(24, 'crazy'),
(25, 'bipolar'),
(26, 'honest'),
(27, 'fearless'),
(28, 'fantastic'),
(29, 'smelly'),
(30, 'poor'),
(31, 'rich'),
(32, 'beautiful'),
(33, 'ugly'),
(34, 'smart');

-- --------------------------------------------------------

--
-- Table structure for table `nouns`
--

CREATE TABLE `nouns` (
  `id` int(11) NOT NULL,
  `col2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nouns`
--

INSERT INTO `nouns` (`id`, `col2`) VALUES
(1, 'car'),
(2, 'plane'),
(3, 'cat'),
(4, 'dog'),
(5, 'house'),
(6, 'bike'),
(7, 'road'),
(8, 'man'),
(9, 'woman'),
(10, 'child'),
(11, 'friend'),
(12, 'enemy'),
(13, 'student'),
(14, 'teacher'),
(15, 'politician'),
(16, 'gangsta'),
(17, 'doctor'),
(18, 'chemist'),
(19, 'developer'),
(20, 'wallet'),
(21, 'dancer'),
(22, 'pilot'),
(23, 'priest'),
(24, 'biker'),
(25, 'book'),
(26, 'monkey'),
(27, 'bird'),
(28, 'bullshitter'),
(29, 'variable'),
(30, 'yogi'),
(31, 'fan'),
(32, 'businessman'),
(33, 'soldier'),
(34, 'skunk'),
(35, 'businesswoman'),
(36, 'poor'),
(37, 'rich'),
(43, 'mother-in-law'),
(44, 'shit'),
(45, 'piss'),
(46, 'ipad'),
(47, 'horse'),
(49, 'chicken'),
(50, 'father-in-law'),
(51, 'holycow');

-- --------------------------------------------------------

--
-- Table structure for table `verbs`
--

CREATE TABLE `verbs` (
  `id` int(11) NOT NULL,
  `col2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `verbs`
--

INSERT INTO `verbs` (`id`, `col2`) VALUES
(1, 'driving'),
(2, 'talking to'),
(3, 'singing to'),
(4, 'running away from'),
(5, 'loving'),
(6, 'jumping on'),
(7, 'avoiding'),
(8, 'walking towards'),
(9, 'screaming at'),
(10, 'digging a hole to'),
(11, 'apologizing to'),
(12, 'crawling towards'),
(13, 'painting on'),
(14, 'trying to understand'),
(15, 'talking about'),
(16, 'singing about'),
(17, 'eyeballing'),
(18, 'eating with'),
(19, 'bullshitting'),
(20, 'defining'),
(21, 'drinking with'),
(22, 'meditating on'),
(23, 'meditating with'),
(24, 'smelling'),
(25, 'swimming with'),
(26, 'playing with'),
(27, 'flying over'),
(28, 'reading'),
(30, 'praying'),
(31, 'humming');

-- --------------------------------------------------------

--
-- Table structure for table `who`
--

CREATE TABLE `who` (
  `id` int(11) NOT NULL,
  `col2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `who`
--

INSERT INTO `who` (`id`, `col2`) VALUES
(1, 'Your'),
(2, 'His'),
(3, 'Her'),
(4, 'Their'),
(5, 'Our');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adjectives`
--
ALTER TABLE `adjectives`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `adjectives_id_uindex` (`id`),
  ADD UNIQUE KEY `adjectives_col2_uindex` (`col2`) USING HASH;

--
-- Indexes for table `nouns`
--
ALTER TABLE `nouns`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nouns_id_uindex` (`id`),
  ADD UNIQUE KEY `nouns_col1_uindex` (`col2`) USING HASH;

--
-- Indexes for table `verbs`
--
ALTER TABLE `verbs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `verbs_id_uindex` (`id`),
  ADD UNIQUE KEY `verbs_col2_uindex` (`col2`) USING HASH;

--
-- Indexes for table `who`
--
ALTER TABLE `who`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `who_id_uindex` (`id`),
  ADD UNIQUE KEY `who_col2_uindex` (`col2`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adjectives`
--
ALTER TABLE `adjectives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `nouns`
--
ALTER TABLE `nouns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `verbs`
--
ALTER TABLE `verbs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `who`
--
ALTER TABLE `who`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
