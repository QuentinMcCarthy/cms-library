-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 22, 2018 at 07:37 PM
-- Server version: 5.7.23-0ubuntu0.16.04.1
-- PHP Version: 7.2.3-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` tinyint(6) UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`) VALUES
(1, 'J. K. Rowling'),
(2, 'Erin Hunter'),
(3, 'Joseph Delaney');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` tinyint(6) UNSIGNED NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `author_id` tinyint(6) UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `image_name` varchar(20) NOT NULL DEFAULT 'bookDefault.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_name`, `author_id`, `description`, `image_name`) VALUES
(1, 'Harry Potter and the Philosopher\'s Stone', 1, 'Harry Potter has been living an ordinary life, constantly abused by his surly and cold aunt and uncle, Vernon and Petunia Dursley and bullied by their spoiled son Dudley since the death of his parents ten years prior. His life changes on the day of his eleventh birthday when he receives a letter of acceptance into a Hogwarts School of Witchcraft and Wizardry.', '5bc8fc3a947dc.jpg'),
(2, 'Warrior Cats: Into the Wild', 2, 'Fire alone can save our Clan...\r\n\r\nFor generations, four Clans of wild cats have shared the forest according to the laws laid down by the powerful ancestors. But the warrior code is threatened, and the ThunderClan cats are in grave danger. The sinister ShadowClan grows stronger every day. Noble warriors are dying - and some deaths are more mysterious than others.\r\n\r\nIn the midst of this turmoil appears an ordinary housecat named Rusty . . . Who may yet turn out to be the bravest warrior of them all.', '5bc8fcb67c44d.jpg'),
(3, 'The Spook\'s Apprentice', 3, '\'Someone has to stand against the dark. And you\'re the only one who can\'\r\nFor years, the local Spook has been keeping the County safe from evil. Now his time is coming to an end, but who will take over? Many apprentices have tried. Some floundered, some fled, some failed to stay alive. Just one boy is left. Thomas Ward. He is the last hope. But does he stand a chance against Mother Malkin, the most dangerous witch in the County?', '5bc8fce438bc7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` tinyint(6) UNSIGNED NOT NULL,
  `email` varchar(254) CHARACTER SET utf8mb4 NOT NULL,
  `username` varchar(25) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`) VALUES
(1, 'qmccarthy97@gmail.com', 'root', '$2y$10$lBtoMfnJwgEnK8GBdnVxmuGrvo.vaVHa7iCWbcCNTegoxl4qna3Q6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `image_name` (`image_name`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` tinyint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` tinyint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` tinyint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
