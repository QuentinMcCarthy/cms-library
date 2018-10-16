-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 16, 2018 at 08:07 PM
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
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` tinyint(6) UNSIGNED NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image_name` varchar(20) NOT NULL DEFAULT 'bookDefault.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_name`, `author`, `description`, `image_name`) VALUES
(1, 'Harry Potter and the Philosopher\'s Stone', 'J.K.Rowling', 'Harry Potter has been living an ordinary life, constantly abused by his surly and cold aunt and uncle, Vernon and Petunia Dursley and bullied by their spoiled son Dudley since the death of his parents ten years prior. His life changes on the day of his eleventh birthday when he receives a letter of acceptance into a Hogwarts School of Witchcraft and Wizardry.', '5bc640c6f0797.jpg'),
(2, 'Warrior Cats: Into the Wild', 'Erin Hunter', 'Fire alone can save our Clan...\r\n\r\nFor generations, four Clans of wild cats have shared the forest according to the laws laid down by the powerful ancestors. But the warrior code is threatened, and the ThunderClan cats are in grave danger. The sinister ShadowClan grows stronger every day. Noble warriors are dying - and some deaths are more mysterious than others.\r\n\r\nIn the midst of this turmoil appears an ordinary housecat named Rusty . . . Who may yet turn out to be the bravest warrior of them all.', '5bc640eb5639d.jpg'),
(3, 'The Spook\'s Apprentice', 'Joseph Delaney', '\'Someone has to stand against the dark. And you\'re the only one who can\'\r\nFor years, the local Spook has been keeping the County safe from evil. Now his time is coming to an end, but who will take over? Many apprentices have tried. Some floundered, some fled, some failed to stay alive. Just one boy is left. Thomas Ward. He is the last hope. But does he stand a chance against Mother Malkin, the most dangerous witch in the County?', '5bc641065b537.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `image_name` (`image_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` tinyint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
