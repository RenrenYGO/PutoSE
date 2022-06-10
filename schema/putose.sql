-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2022 at 09:44 AM
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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `content`, `created_at`) VALUES
(1, 16, 'title test', 'test', '2022-06-08 11:44:04'),
(2, 4, 'test 2', 'tessssst', '2022-06-08 12:20:37'),
(3, 16, 'create post test', 'teadawdwadawdwa', '2022-06-08 12:57:05'),
(4, 16, 'create post test', 'teadawdwadawdwa', '2022-06-08 12:57:28'),
(5, 16, 'final test', 'test', '2022-06-08 14:13:47'),
(6, 14, 'MARKMARKMARKMARKMARK', 'MARKMARKMARKMARKMARK', '2022-06-10 06:23:08');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(255) NOT NULL,
  `post_id` int(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `post_id`, `content`, `created_at`, `user_id`) VALUES
(87, 6, 'Gavs', '2022-06-10 15:32:41', 14),
(88, 6, 'ATest', '2022-06-10 15:42:41', 14),
(89, 5, 'REPLY TEST 1', '2022-06-10 15:44:10', 14);

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
  `code` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `bio`, `profile_picture`, `code`) VALUES
(1, 'asdasd', 'asdasd@gmail.com', '$2y$10$npHij/5R/zJCU0jUmRmwUe2zoVTR3gkziMgwL8I0RJsTAvNNhQS.K', 'Insert your bio here', 'noimage.jpg', ''),
(2, 'das', 'ads@gmail.com', '$2y$10$npHij/5R/zJCU0jUmRmwUe2zoVTR3gkziMgwL8I0RJsTAvNNhQS.K', '<p>MINECRAFT</p>\r\n', '2__okishock.png', ''),
(3, 'user0', 'user0@gmail.com', '$2y$10$npHij/5R/zJCU0jUmRmwUe2zoVTR3gkziMgwL8I0RJsTAvNNhQS.K', 'Insert your bio here', 'noimage.jpg', ''),
(4, 'test1', 'test@gmail.com', '$2y$10$npHij/5R/zJCU0jUmRmwUe2zoVTR3gkziMgwL8I0RJsTAvNNhQS.K', 'Insert your bio here', 'noimage.jpg', ''),
(5, 'asdasdasd', 'asdasdasd@gmail.com', '$2y$10$npHij/5R/zJCU0jUmRmwUe2zoVTR3gkziMgwL8I0RJsTAvNNhQS.K', 'Insert your bio here', 'noimage.jpg', ''),
(9, 'Renren', 'renren@mail.com', '$2y$10$npHij/5R/zJCU0jUmRmwUe2zoVTR3gkziMgwL8I0RJsTAvNNhQS.K', 'Insert your bio here', 'noimage.jpg', ''),
(10, 'PasswordCheck0', 'pass0@gmail.com', '$2y$10$npHij/5R/zJCU0jUmRmwUe2zoVTR3gkziMgwL8I0RJsTAvNNhQS.K', 'Insert your bio here', 'noimage.jpg', ''),
(11, 'PasswordCheck1', 'pass1@gmail.com', '$2y$10$TrxUiBfGZ9D458bMKYvniOGaJMzMm3Lx2T9zOmTrQXnQYf8Qm6AR6', '<p>Insert your bio here</p>\r\n', '11_6bbf245fe28be27c17d084df2f194d17-20200817155820.png', ''),
(12, 'JOSE', 'uniportal02@gmail.com', '$2y$10$JlOdiJ/JMEFlAmckrc/KEetAGsndcx.NpaN2GqhgDCxNUeind.zci', 'Insert your bio here', 'noimage.jpg', ''),
(13, 'User1', 'asdd@gmail.com', '$2y$10$kOHo9XjbGQnUCidrZNi18e8PT0wq6w8.HAkUuLrndbhX/tOEb9PSa', 'Insert your bio here', 'noimage.jpg', ''),
(14, 'RICHARD', 'richard@gmai.com', '$2y$10$rgdD9CSgW5apNjtofP9rSegkei7mz7PLCGC9odMVo624h3z/g04Ry', 'Insert your bio here', 'noimage.jpg', ''),
(15, 'asd', 'richardandrei.sunga@tup.edu.ph', '$2y$10$mVeWN856kzPtYJUHlV9sEuhvRZsMpqwHknlK8/vZawIMxqTpPnaea', 'Insert your bio here', 'noimage.jpg', '006828'),
(16, 't', 't@gmail.com', '$2y$10$Ba28VjnPbS79WKfyBTSBH.mvSiCtfWg33xeCqRm/iFLb01yOAsqTS', 'Insert your bio here', 'noimage.jpg', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `post_id` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
