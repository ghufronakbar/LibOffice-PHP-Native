-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2024 at 01:38 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `namadatabase_2111`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bookId` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `synopsis` text NOT NULL,
  `picture` text DEFAULT NULL,
  `sectionId` int(11) NOT NULL,
  `createdAt` datetime DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bookId`, `title`, `synopsis`, `picture`, `sectionId`, `createdAt`, `updatedAt`) VALUES
(1, 'The Great Adventure', 'An epic journey of courage and discovery.', NULL, 5, '2024-02-12 18:35:43', '2024-11-05 18:01:10'),
(2, 'Mystery of the Lost City', 'A thrilling mystery set in ancient ruins.', NULL, 5, '2024-02-19 01:36:35', '2024-11-05 18:01:10'),
(3, 'Tales of the Enchanted Forest', 'A magical adventure in a mystical forest.', NULL, 5, '2024-02-10 10:12:18', '2024-11-05 18:01:10'),
(4, 'Chronicles of the Forgotten Realm', 'A battle between good and evil in a forgotten land.', NULL, 5, '2024-08-30 16:34:40', '2024-11-05 18:01:10'),
(5, 'Legends of the Ancient Empire', 'Stories of heroism from an ancient empire.', NULL, 5, '2024-01-12 06:51:07', '2024-11-05 18:01:10'),
(6, 'Becoming', 'The memoir of former First Lady of the United States Michelle Obama.', NULL, 3, '2024-01-29 21:56:39', '2024-11-05 18:01:10'),
(7, 'The Diary of a Young Girl', 'A young girl’s diary about her life during the Holocaust.', NULL, 3, '2024-07-15 00:29:07', '2024-11-05 18:01:10'),
(8, 'Long Walk to Freedom', 'The autobiography of Nelson Mandela detailing his life and struggles.', NULL, 3, '2024-08-06 01:50:10', '2024-11-05 18:01:10'),
(9, 'I Am Malala', 'The story of Malala Yousafzai, who fought for her right to education.', NULL, 3, '2023-11-15 13:06:25', '2024-11-05 18:01:10'),
(10, 'Steve Jobs', 'A biography of Steve Jobs, co-founder of Apple Inc.', NULL, 3, '2024-01-09 18:29:07', '2024-11-05 18:01:10'),
(11, 'Sapiens: A Brief History of Humankind', 'An exploration of humankind from the Stone Age to the modern age.', NULL, 2, '2024-06-01 20:24:16', '2024-11-05 18:01:10'),
(12, 'Educated', 'A memoir about a woman who grows up in a strict and abusive household in rural Idaho.', NULL, 2, '2023-11-21 16:31:33', '2024-11-05 18:01:10'),
(13, 'Becoming', 'The memoir of former First Lady of the United States Michelle Obama.', NULL, 2, '2023-11-14 16:25:27', '2024-11-05 18:01:10'),
(14, 'The Immortal Life of Henrietta Lacks', 'The story of Henrietta Lacks, whose cells were taken without her knowledge.', NULL, 2, '2024-06-25 23:09:03', '2024-11-05 18:01:10'),
(15, 'The Wright Brothers', 'The story of the brothers who pioneered human flight.', NULL, 2, '2024-01-16 13:22:28', '2024-11-05 18:01:10'),
(16, 'The Power of Habit', 'An examination of the science behind habit formation in our lives.', NULL, 2, '2024-10-16 06:00:29', '2024-11-05 18:01:10'),
(17, 'Thinking, Fast and Slow', 'A look at the dual systems that drive the way we think.', NULL, 2, '2024-02-15 09:04:18', '2024-11-05 18:01:10'),
(18, 'A Brief History of Time', 'An overview of the universe, black holes, and time by Stephen Hawking.', NULL, 4, '2024-10-05 06:31:57', '2024-11-05 18:01:10'),
(19, 'The Selfish Gene', 'A gene-centered view of evolution and natural selection by Richard Dawkins.', NULL, 4, '2024-06-17 08:10:54', '2024-11-05 18:01:10'),
(20, 'The Origin of Species', 'Charles Darwin’s foundational work in evolutionary biology.', NULL, 4, '2024-07-26 08:31:28', '2024-11-05 18:01:10'),
(21, 'Cosmos', 'A journey through space and time by Carl Sagan, exploring the universe and humanity’s place in it.', NULL, 4, '2024-01-11 02:03:40', '2024-11-05 18:01:10'),
(22, 'The Innovators', 'How a group of hackers, geniuses, and geeks created the digital revolution.', NULL, 5, '2024-05-21 17:55:01', '2024-11-05 18:01:10'),
(23, 'The Second Machine Age', 'How the digital revolution is transforming our lives and economy.', NULL, 5, '2024-07-28 04:12:02', '2024-11-05 18:01:10'),
(24, 'Clean Code', 'A Handbook of Agile Software Craftsmanship.', 'clean_code.jpg', 5, '2024-11-04 22:26:23', '2024-11-09 17:55:19'),
(25, 'Artificial Intelligence: A Guide to Intelligent Systems', 'An introduction to AI and its applications.', NULL, 5, '2024-02-05 07:01:38', '2024-11-05 18:01:10'),
(26, 'The Pragmatic Programmer', 'From Journeyman to Master, practical advice for software developers.', NULL, 5, '2024-10-10 21:44:50', '2024-11-05 18:01:10'),
(27, 'Code Complete', 'A practical handbook of software construction.', NULL, 5, '2024-08-27 11:21:48', '2024-11-05 18:01:10'),
(28, 'The Phoenix Project', 'A novel about IT, DevOps, and helping your business win.', NULL, 5, '2024-10-14 08:14:59', '2024-11-05 18:01:10'),
(29, 'Introduction to the Theory of Computation', 'A comprehensive introduction to computation theory.', NULL, 5, '2024-04-02 11:05:57', '2024-11-05 18:01:10'),
(30, 'Blockchain Basics', 'A non-technical introduction in 25 steps.', NULL, 5, '2024-05-06 18:44:42', '2024-11-05 18:01:10');

-- --------------------------------------------------------

--
-- Table structure for table `detailbook`
--

CREATE TABLE `detailbook` (
  `detailBookId` int(11) NOT NULL,
  `bookId` int(11) NOT NULL,
  `author` varchar(255) DEFAULT NULL,
  `publishedAt` date DEFAULT NULL,
  `createdAt` datetime DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detailbook`
--

INSERT INTO `detailbook` (`detailBookId`, `bookId`, `author`, `publishedAt`, `createdAt`, `updatedAt`) VALUES
(1, 1, 'John Doe', '2020-01-15', '2023-11-01 10:05:00', '2023-11-01 10:35:00'),
(2, 2, 'Jane Smith', '2019-06-20', '2023-11-02 11:05:00', '2023-11-02 11:35:00'),
(3, 3, 'Michael Green', '2018-03-10', '2023-11-03 12:05:00', '2023-11-03 12:35:00'),
(4, 4, 'Alice Brown', '2021-09-12', '2023-11-04 13:05:00', '2023-11-04 13:35:00'),
(5, 5, 'Robert Black', '2022-07-25', '2023-11-05 14:05:00', '2023-11-05 14:35:00'),
(6, 6, 'Michelle Obama', '2018-11-13', '2023-11-01 09:05:00', '2023-11-01 09:35:00'),
(7, 7, 'Anne Frank', '1947-06-25', '2023-11-02 10:05:00', '2023-11-02 10:35:00'),
(8, 8, 'Nelson Mandela', '1994-11-01', '2023-11-03 11:05:00', '2023-11-03 11:35:00'),
(9, 9, 'Malala Yousafzai', '2013-10-08', '2023-11-04 12:05:00', '2023-11-04 12:35:00'),
(10, 10, 'Walter Isaacson', '2011-10-24', '2023-11-05 13:05:00', '2023-11-05 13:35:00'),
(11, 11, 'Yuval Noah Harari', '2011-01-01', '2023-11-01 14:05:00', '2023-11-01 14:35:00'),
(12, 12, 'Tara Westover', '2018-02-20', '2023-11-02 15:05:00', '2023-11-02 15:35:00'),
(13, 13, 'Michelle Obama', '2018-11-13', '2023-11-03 16:05:00', '2023-11-03 16:35:00'),
(14, 14, 'Rebecca Skloot', '2010-02-02', '2023-11-04 17:05:00', '2023-11-04 17:35:00'),
(15, 15, 'David McCullough', '2015-05-05', '2023-11-05 18:05:00', '2023-11-05 18:35:00'),
(16, 16, 'Charles Duhigg', '2012-02-28', '2023-11-06 19:05:00', '2023-11-06 19:35:00'),
(17, 17, 'Daniel Kahneman', '2011-10-25', '2023-11-07 20:05:00', '2023-11-07 20:35:00'),
(18, 18, 'Stephen Hawking', '1988-04-01', '2023-11-01 14:05:00', '2023-11-01 14:35:00'),
(19, 19, 'Richard Dawkins', '1976-01-01', '2023-11-02 15:05:00', '2023-11-02 15:35:00'),
(20, 20, 'Charles Darwin', '1859-11-24', '2023-11-03 16:05:00', '2023-11-03 16:35:00'),
(21, 21, 'Carl Sagan', '1980-11-12', '2023-11-04 17:05:00', '2023-11-04 17:35:00'),
(22, 22, 'Walter Isaacson', '2014-10-07', '2023-11-01 10:05:00', '2023-11-01 10:35:00'),
(23, 23, 'Erik Brynjolfsson and Andrew McAfee', '2014-01-30', '2023-11-02 11:05:00', '2023-11-02 11:35:00'),
(24, 24, 'Robert C. Martin', '2008-08-01', '2023-11-03 12:05:00', '2024-11-09 17:53:15'),
(25, 25, 'Michael Negnevitsky', '2005-10-01', '2023-11-04 13:05:00', '2023-11-04 13:35:00'),
(26, 26, 'Andrew Hunt and David Thomas', '1999-10-20', '2023-11-05 14:05:00', '2023-11-05 14:35:00'),
(27, 27, 'Steve McConnell', '2004-06-01', '2023-11-06 15:05:00', '2023-11-06 15:35:00'),
(28, 28, 'Gene Kim, Kevin Behr, and George Spafford', '2013-01-15', '2023-11-07 16:05:00', '2023-11-07 16:35:00'),
(29, 29, 'Michael Sipser', '2012-06-01', '2023-11-08 17:05:00', '2023-11-08 17:35:00'),
(30, 30, 'Daniel Drescher', '2017-08-01', '2023-11-09 18:05:00', '2023-11-09 18:35:00');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `sectionId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `createdAt` datetime DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`sectionId`, `name`, `createdAt`, `updatedAt`) VALUES
(1, 'Fiksi', '2024-11-05 17:25:08', '2024-11-05 17:25:08'),
(2, 'Non-Fiksi', '2024-11-05 17:25:08', '2024-11-05 17:25:08'),
(3, 'Biografi', '2024-11-05 17:25:08', '2024-11-05 17:25:08'),
(4, 'Sains', '2024-11-05 17:25:08', '2024-11-05 17:25:08'),
(5, 'Teknologi', '2024-11-05 17:25:08', '2024-11-05 17:25:08');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `createdAt` datetime DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `username`, `password`, `createdAt`, `updatedAt`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2024-11-05 11:22:27', '2024-11-05 11:22:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bookId`),
  ADD KEY `fk_sectionId` (`sectionId`);

--
-- Indexes for table `detailbook`
--
ALTER TABLE `detailbook`
  ADD PRIMARY KEY (`detailBookId`),
  ADD KEY `fk_bookId` (`bookId`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`sectionId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `bookId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `detailbook`
--
ALTER TABLE `detailbook`
  MODIFY `detailBookId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `sectionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `fk_sectionId` FOREIGN KEY (`sectionId`) REFERENCES `section` (`sectionId`) ON DELETE CASCADE;

--
-- Constraints for table `detailbook`
--
ALTER TABLE `detailbook`
  ADD CONSTRAINT `fk_bookId` FOREIGN KEY (`bookId`) REFERENCES `book` (`bookId`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
