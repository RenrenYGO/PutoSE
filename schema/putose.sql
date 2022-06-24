-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2022 at 12:01 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `putose`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `date`) VALUES
(1, 'General', '2022-06-17 14:06:24'),
(2, 'Miscellaneous', '2022-06-17 14:06:24'),
(3, 'TUP', '2022-06-17 14:06:43');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `email`, `message`) VALUES
(1, 'cardo85@mail.com', 'aaaaa'),
(2, 'ads@gmail.com', 'hhhh'),
(3, 'tabo@gmail.com', 'albaz'),
(4, 'final@gmail.com', 'aUMUaz'),
(5, 'Thicc@gmail.com', '\r\n\r\n\r\npotatopotato'),
(6, 'ninjaskpasser@gmail.com', 'Ban yas'),
(8, 'Pogi@gmail.com', 'dd');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`) VALUES
(1, 'tabo@gmail.com'),
(2, 'woketh12@mail.com');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `cat_id` int(255) NOT NULL,
  `react_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '{"react_ids":[]}',
  `react2_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '{"react2_ids":[]}',
  `upvote` int(255) NOT NULL,
  `downvote` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `content`, `created_at`, `cat_id`, `react_ids`, `react2_ids`, `upvote`, `downvote`) VALUES
(13, 2, 'TEST', 'TEST', '2022-06-23 07:54:09', 2, '{\"react_ids\":[\"2\"]}', '{\"react2_ids\":[]}', 1, 0),
(14, 2, 'TEST1', 'TEST1', '2022-06-23 08:02:32', 1, '{\"react_ids\":[]}', '{\"react2_ids\":[]}', 0, 0),
(15, 2, 'Test2', 'Test2', '2022-06-23 08:05:04', 3, '{\"react_ids\":[\"2\"]}', '{\"react2_ids\":[]}', 1, 0),
(16, 2, 'TEST3', '3', '2022-06-23 08:05:31', 3, '{\"react_ids\":[\"2\"]}', '{\"react2_ids\":[]}', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(255) NOT NULL,
  `post_id` int(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(255) NOT NULL,
  `react_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '{"react_ids":[]}' CHECK (json_valid(`react_ids`)),
  `react2_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '{"react2_ids":[]}',
  `upvote` int(255) NOT NULL,
  `downvote` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `post_id`, `content`, `created_at`, `user_id`, `react_ids`, `react2_ids`, `upvote`, `downvote`) VALUES
(94, 16, 'reply0', '2022-06-23 17:29:59', 2, '{\"react_ids\":[\"2\"]}', '{\"react2_ids\":[]}', 1, 0),
(95, 16, 'reply1', '2022-06-23 17:39:57', 2, '{\"react_ids\":[\"2\"]}', '{\"react2_ids\":[\"2\"]}', 1, 1),
(96, 15, 'das', '2022-06-23 17:40:36', 2, '{\"react_ids\":[]}', '{\"react2_ids\":[\"2\"]}', 0, 1),
(97, 14, 'asd', '2022-06-23 17:41:03', 2, '{\"react_ids\":[\"2\"]}', '{\"react2_ids\":[]}', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `bio` varchar(255) NOT NULL DEFAULT 'Insert your bio here',
  `profile_picture` varchar(255) NOT NULL DEFAULT 'noimage.jpg',
  `code` varchar(6) NOT NULL,
  `cover_photo` varchar(255) NOT NULL DEFAULT 'noimage.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `bio`, `profile_picture`, `code`, `cover_photo`) VALUES
(1, 'asdasd', 'asdasd@gmail.com', '$2y$10$npHij/5R/zJCU0jUmRmwUe2zoVTR3gkziMgwL8I0RJsTAvNNhQS.K', 'Insert your bio here', 'noimage.jpg', '', 'noimage.jpg'),
(2, 'das', 'ads@gmail.com', '$2y$10$npHij/5R/zJCU0jUmRmwUe2zoVTR3gkziMgwL8I0RJsTAvNNhQS.K', '<p>MINECRAFT</p>\r\n', '2__okishock.png', '', 'noimage.jpg'),
(3, 'user0', 'user0@gmail.com', '$2y$10$npHij/5R/zJCU0jUmRmwUe2zoVTR3gkziMgwL8I0RJsTAvNNhQS.K', 'Insert your bio here', 'noimage.jpg', '', 'noimage.jpg'),
(4, 'test1', 'test@gmail.com', '$2y$10$npHij/5R/zJCU0jUmRmwUe2zoVTR3gkziMgwL8I0RJsTAvNNhQS.K', 'Insert your bio here', 'noimage.jpg', '', 'noimage.jpg'),
(5, 'asdasdasd', 'asdasdasd@gmail.com', '$2y$10$npHij/5R/zJCU0jUmRmwUe2zoVTR3gkziMgwL8I0RJsTAvNNhQS.K', 'Insert your bio here', 'noimage.jpg', '', 'noimage.jpg'),
(9, 'Renren', 'renren@mail.com', '$2y$10$npHij/5R/zJCU0jUmRmwUe2zoVTR3gkziMgwL8I0RJsTAvNNhQS.K', 'Insert your bio here', 'noimage.jpg', '', 'noimage.jpg'),
(10, 'PasswordCheck0', 'pass0@gmail.com', '$2y$10$npHij/5R/zJCU0jUmRmwUe2zoVTR3gkziMgwL8I0RJsTAvNNhQS.K', 'Insert your bio here', 'noimage.jpg', '', 'noimage.jpg'),
(11, 'PasswordCheck1', 'pass1@gmail.com', '$2y$10$TrxUiBfGZ9D458bMKYvniOGaJMzMm3Lx2T9zOmTrQXnQYf8Qm6AR6', '<p>Insert your bio here</p>\r\n', '11_6bbf245fe28be27c17d084df2f194d17-20200817155820.png', '', 'noimage.jpg'),
(12, 'JOSE', 'uniportal02@gmail.com', '$2y$10$JlOdiJ/JMEFlAmckrc/KEetAGsndcx.NpaN2GqhgDCxNUeind.zci', 'Insert your bio here', 'noimage.jpg', '', 'noimage.jpg'),
(13, 'User1', 'asdd@gmail.com', '$2y$10$kOHo9XjbGQnUCidrZNi18e8PT0wq6w8.HAkUuLrndbhX/tOEb9PSa', 'Insert your bio here', 'noimage.jpg', '', 'noimage.jpg'),
(14, 'RICHARD', 'richard@gmai.com', '$2y$10$rgdD9CSgW5apNjtofP9rSegkei7mz7PLCGC9odMVo624h3z/g04Ry', 'Insert your bio here', 'noimage.jpg', '', 'noimage.jpg'),
(15, 'asd', 'richardandrei.sunga@tup.edu.ph', '$2y$10$mVeWN856kzPtYJUHlV9sEuhvRZsMpqwHknlK8/vZawIMxqTpPnaea', 'Insert your bio here', 'noimage.jpg', '006828', 'noimage.jpg'),
(16, 't', 't@gmail.com', '$2y$10$Ba28VjnPbS79WKfyBTSBH.mvSiCtfWg33xeCqRm/iFLb01yOAsqTS', 'Insert your bio here', 'noimage.jpg', '', 'noimage.jpg'),
(18, 'sejo', 'sejo02toriel@gmail.com', '$2y$10$SazwmV79TA7UTqExxsCixOjm7uMSrmrrkFKz7GKk3uXuYSE2f.wgC', 'Insert your bio here', '18_101541143_2944142932289230_5102179466580268934_n.jpg', '', '18_119613878_2676931055954047_8602458832955978010_n.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `posts_cat_id` (`cat_id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `replies_by` (`user_id`),
  ADD KEY `replies_post_id` (`post_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `profile_picture` (`profile_picture`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_cat_id` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `post_id` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
