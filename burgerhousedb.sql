-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 10, 2018 at 07:17 PM
-- Server version: 10.0.33-MariaDB-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `burgerhousedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `prname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `prname`, `price`, `user`) VALUES
(2, 'The Perfect Burger', 11, 's.stevenidis@gmail.com'),
(4, 'Coca-cola', 2.5, '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `order`) VALUES
(15, 'appetizer', 1),
(16, 'salad', 2),
(17, 'burgers', 3),
(18, 'drinks', 4);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `comment`, `date`) VALUES
(4, 'ads', 'asd', NULL),
(5, 'stef', 'hey there', NULL),
(8, 'stef', 'i think i did it', '2016-07-30 20:32:10'),
(9, 'zess', 'this is a comment', '2016-07-30 21:36:16'),
(10, 'zess', 'this is a comment', '2016-07-30 21:36:19'),
(11, 'superman', 'it is working', '2016-07-30 21:52:39'),
(12, 'superman', 'it is working autoload?', '2016-07-30 22:02:51'),
(13, 'superman', 'it is working autoload?!?', '2016-07-30 22:04:13'),
(15, 'now ', 'it does?', '2016-07-30 22:06:03'),
(16, 'asd', 'ads', '2016-07-31 01:45:36'),
(17, 'asd', 'ads!!', '2016-07-31 01:46:38'),
(18, 'HEY', 'THERE', '2016-07-31 01:47:18'),
(19, 'zess', 'ads!!', '2016-07-31 01:50:47'),
(20, 'stef', 'my comment', '2016-07-31 01:54:25'),
(21, 'steve', 'a comment', '2016-07-31 01:55:18'),
(22, 'steve', 'a comment', '2016-07-31 01:58:04'),
(23, 'steve', 'a comment', '2016-07-31 01:59:53'),
(24, 'aaaa', 'aaa', '2016-07-31 02:04:26'),
(25, 'aaaa', 'aaa', '2016-07-31 02:05:50'),
(26, 'aaaa!!', 'aaa', '2016-07-31 02:06:32'),
(27, 'zess', 'sssss', '2016-07-31 02:07:33'),
(28, 'xaxa', 'xaxaxa', '2016-07-31 02:24:48'),
(29, 'xaxa', 'xaxaxa', '2016-07-31 02:25:59'),
(30, 'xaxa!!', 'xaxaxa', '2016-07-31 02:27:52'),
(31, 'stef', 'hey', '2016-07-31 13:38:47'),
(32, 'stef', 'hey there', '2016-07-31 13:39:25'),
(33, 'stef', 'hey there2#1', '2016-07-31 13:41:48'),
(34, 'stef', 'hey there2#1', '2016-07-31 13:58:39'),
(35, 'xexe', 'xexe', '2016-07-31 22:15:52'),
(36, 'xexe!!', 'xexe', '2016-07-31 22:16:13'),
(37, 'sssss', 'ssssss', '2016-07-31 22:16:22'),
(38, 'aaaa', 'aaaaa', '2016-07-31 22:17:46'),
(39, '112', '123', '2016-07-31 22:18:21'),
(40, 'faill', 'faill2\n', '2016-07-31 22:20:10'),
(41, 'faill2', 'fail2', '2016-07-31 22:20:54'),
(42, 'faill2!!', 'fail2', '2016-07-31 22:21:19'),
(43, 'faill2!!21', 'fail2', '2016-07-31 22:21:58'),
(44, 'xaxa', 'xaxa', '2016-07-31 22:23:28'),
(45, 'xaxa!!', 'xaxa', '2016-07-31 22:24:12'),
(46, 'xaxa!!222', 'xaxa', '2016-07-31 22:24:36'),
(47, 'xaxa!!22211', 'xaxa', '2016-07-31 22:24:40'),
(48, '111xaxa!!22211', 'xaxa', '2016-07-31 22:24:46'),
(49, '22111xaxa!!22211', 'xaxa', '2016-07-31 22:25:11'),
(50, 'sss11xaxa!!22211', 'xaxa', '2016-07-31 22:25:34'),
(51, 'hey', 'there', '2016-07-31 22:25:48'),
(53, '11!!hey', 'there', '2016-07-31 22:27:36'),
(54, 'nop', 'plz nop', '2016-07-31 22:28:36'),
(55, 'yes', 'it isyes', '2016-07-31 22:28:51'),
(56, '111yes', 'it isyes', '2016-07-31 22:29:19'),
(57, '222yes', 'it isyes', '2016-07-31 22:30:01'),
(58, '3333yes', 'it isyes', '2016-07-31 22:30:44'),
(59, '444333yes', 'it isyes', '2016-07-31 22:34:40'),
(60, '5554333yes', 'it isyes', '2016-07-31 22:35:35'),
(61, 'asda', 'adsasd', '2016-07-31 22:36:30'),
(62, 'asda', 'adsasd', '2016-07-31 22:37:11'),
(63, '111asda', 'adsasd', '2016-07-31 22:37:38'),
(64, 'ss', 'sss', '2016-07-31 22:58:44'),
(65, '11111', '111111', '2016-08-01 22:52:51'),
(66, 'asd', 'ads', '2016-08-01 23:34:45'),
(67, 'asd', 'ads', '2016-08-01 23:35:18'),
(68, 'asdasd', 'sadasd', '2016-08-04 20:23:20'),
(71, 'latest', 'coment this is a comment i am commenting for some other reason to tell u that this is inapropriareates', '2016-08-16 00:43:27'),
(72, 'aaa', 'aaa', '2016-08-27 17:22:32'),
(73, 'aaa', 'aaa', '2016-08-27 17:25:43'),
(74, 'aaa', 'aaa', '2016-08-27 17:25:45'),
(75, 'aaa', 'aaa', '2016-08-27 17:25:51'),
(76, 'aaa', 'aaa', '2016-08-27 17:26:14'),
(77, 'test', 'test1', '2016-08-27 17:28:56'),
(78, 'test', 'test1', '2016-08-27 17:28:57'),
(79, 'test', 'test1', '2016-08-27 17:28:58'),
(80, 'test1', 'test1', '2016-08-27 17:33:00'),
(81, 'test2', 'tste1', '2016-08-27 17:33:56'),
(82, 'test22', 'tste1', '2016-08-27 17:37:59'),
(83, 'test2222', 'tste1', '2016-08-27 17:38:33'),
(84, 'test00', 'tste1', '2016-08-27 17:39:20'),
(85, 'test4', '123e4', '2016-08-27 17:46:25'),
(86, 'test4', '123e4', '2016-08-27 17:47:52'),
(87, 'coment test', 'this is test', '2016-08-27 17:48:27'),
(90, 'still', 'testing', '2016-08-27 17:56:37'),
(91, 'ssd', 'ddv', '2016-08-27 18:20:34'),
(92, '', 'sdas', '2016-08-27 18:35:15'),
(93, 'a', 'asdas', '2016-08-27 18:47:47'),
(94, 'a1', 'asdas', '2016-08-27 18:48:05'),
(95, 'a1', 'asdas', '2016-08-27 18:48:15'),
(96, 'a1', 'asdas', '2016-08-27 18:48:15'),
(98, 'aaa', 'sda', '2017-01-02 20:32:33'),
(99, 'test', '124', '2017-01-02 21:09:30'),
(100, 's.stevenidis@gmail.com', 'sdasdas', '2017-01-09 22:03:19'),
(101, 's.stevenidis@gmail.com', 'ssss', '2017-01-09 22:04:13'),
(102, 's.stevenidis@gmail.com', 'asdw3sd', '2017-01-09 22:05:04'),
(103, 's.stevenidis@gmail.com', 'asdw3sdasdasdassd', '2017-01-09 22:05:42'),
(104, 's.stevenidis@gmail.com', 'asdasd', '2017-01-21 18:18:57'),
(105, 's.stevenidis@gmail.com', 'aaaaaaa', '2017-01-21 18:19:21'),
(106, 's.stevenidis@gmail.com', 'sdasdasdqqqq', '2017-01-21 18:20:14'),
(107, 'stef', 'hiiiiiii', '2017-05-15 23:07:03'),
(108, 's.stevenidis@gmail.com', 'whattt', '2017-05-15 23:08:07'),
(109, 'stefanos', 'hiii', '2017-06-05 16:58:23'),
(110, 'stefanos', 'autoload\r\n', '2017-06-05 17:47:25');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `mail`, `date`) VALUES
(36, 'ασδασδ@ασδσ,.', '2016-07-23'),
(37, 'asdasdasd@asdas.asd', '2016-07-26'),
(38, 'asdasd', '2016-07-26'),
(39, 'test', '2016-07-26'),
(41, 'asdadsas', '2016-07-26'),
(42, 'axaxa@.sdads', '2016-07-26'),
(43, 'asdas@sdads.dw', '2016-07-31'),
(44, 'asdasd@.adsd', '2016-07-31'),
(45, 'hey@ther.gr', '2016-08-08'),
(46, 'whatever@gms.gc', '2016-08-08'),
(47, 'maunname@jhey.hr', '2016-08-13'),
(48, 'xaxa@sads.sds', '2016-12-24'),
(49, 'adasd@asd.gd', '2017-01-02'),
(50, 'sasd2@asd.fs', '2017-01-21'),
(51, 'asds@asdsa.fe', '2017-01-21'),
(52, 'asd@sdas.tgf', '2017-01-21'),
(53, 'sad@aesd.rr', '2017-01-21'),
(54, 's.stevenidis@gmail.com', '2017-06-05'),
(55, 'lord_tourin@yahoo.com', '2017-09-08');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `products` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` bigint(20) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `products`, `price`, `description`, `date`, `name`, `lastname`, `address`, `phone`, `email`) VALUES
(101, 'Offer 3', 24.4, '', '2017-06-05 16:16:47', 'stefanos', 'stefanidis', 'korinthou 10', 6978032970, 's.stevenidis@gmail.com'),
(102, 'Coca-cola', 2.5, '', '2017-06-13 13:15:25', '', '', '', 0, ''),
(103, 'Coca-cola', 2.5, '', '2017-06-13 13:15:40', 'Ruzuroshiv!', 'asdas', 'asdasd', 0, 'asdasd'),
(104, 'Coca-cola', 2.5, '', '2017-06-13 13:15:55', 'Ruzuroshiv!', 'asdas', 'asdasd', 0, 'asdasd'),
(105, 'Coca-cola', 2.5, '', '2017-06-13 13:18:18', 'Ruzuroshiv!', 'asd', 'asdas', 0, 'asdad'),
(106, 'Buffalo Chicken Wings', 3, '', '2017-06-13 13:19:10', 'stefanos', 'stefanidis', 'korinthou 10', 6978032970, 's.stevenidis@gmail.com'),
(107, 'Double Tomato Bruschetta', 3.5, '', '2017-12-26 15:19:59', '', '', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(11) NOT NULL,
  `product` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `times` double NOT NULL,
  `offer` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `product`, `times`, `offer`) VALUES
(176, '  Wild rice salad', 4.5, '1'),
(177, '  King Crab Appetizers', 3, '1'),
(178, '  Orange-juice', 3, '1'),
(179, '  Moorish crunch salad', 5, '2'),
(180, '  Southwest Burger', 10, '2'),
(181, '  Coca-cola', 2.5, '2'),
(182, '  Coca-cola', 2.5, '2'),
(183, '  Buffalo Chicken Wings', 3, '2'),
(184, '  Hearts of palm and chicken chopped salad', 5.5, '3'),
(185, '  The Perfect Burger', 11, '3'),
(186, '  Bacon Wrapped Dates', 5, '3'),
(187, '  Buffalo Chicken Wings', 3, '3'),
(188, '  Amstel', 3, '3'),
(190, '  Orange-juice', 3, '3');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tags` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `category`, `description`, `tags`, `image`) VALUES
(16, 'Bacon Wrapped Dates', 5, 'appetizer', 'Dates are stuffed with blue cheese, wrapped in bacon and baked until crisp. These are delicious and very easy to make for a party. You can serve them at room temperature, so it is okay to make a few hours in advance!', 'bacon,blue Cheese', 'bacon.jpg'),
(17, 'Buffalo Chicken Wings', 3, 'appetizer', 'This is similar to the hot wings recipe served at a popular restaurant chain. If you have ever had them, you have to love them.', 'chicken', 'buffalo.jpg'),
(18, 'Double Tomato Bruschetta', 3.5, 'appetizer', 'A delicious and easy appetizer. The balsamic vinegar gives it a little bite. Dried basil can be substituted but it is best with fresh.', 'tomato,mozzarella', 'tomato.jpg'),
(19, 'Moorish crunch salad', 5, 'salad', 'The bonus of using three lovely oranges here means that this beautifully bright salad provides us with our daily recommended intake of vitamin C, helping to keep our immune systems strong.', 'super food,vegetarian', 'moorish.jpg'),
(20, 'Hearts of palm and chicken chopped salad', 5, 'salad', 'This lovely summer salad layers up honey-glazed chicken breast with beautiful textures, such as crunchy toasted seeds, juicy mango and crisp hearts of palm. ', 'gluten-free,chicken', 'palmsalad.jpg'),
(21, 'Wild rice salad', 4.5, 'salad', 'Combine with the rice, season with sea salt and black pepper, then drizzle with oil. Serve with grilled meat or fish.', 'rice', 'rise.jpg'),
(22, 'Amstel', 3, 'drinks', '', '', 'Amstel.jpg'),
(23, 'Coca-cola', 2.5, 'drinks', '', '', 'cola.jpg'),
(24, 'Orange-juice', 3, 'drinks', '', '', 'orangejuice.png'),
(25, 'Southwest Burger', 10, 'burgers', 'This burger is posted for the Zaar World Tour Burger Challenge 2007. In honor of my teammates, the awesome and outstanding Devilishly Devious Diners, I would dedicate this recipe to the friends I have made!', 'buffalo', 'southwest.jpg'),
(26, 'White Castle Hamburgers', 9, 'burgers', 'These are really close to the real thing. My family was in heaven! They\'re great for dinner, football parties, or kid\'s birthday parties.', 'chuck', 'white-castle-burgers.jpg'),
(27, 'The Perfect Burger', 11, 'burgers', 'Here are the ingredients & the instructions to make the perfect burger! Although it may not be the healthiest, use medium ground beef for moistness & flavour.', 'ground beef', 'perfect-burger.jpg'),
(28, 'King Crab Appetizers', 3, 'appetizer', 'These crab tartlets have long since been a family favorite and are requested often at holiday get togethers.', 'crab', 'crabs.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `id` int(11) NOT NULL,
  `prid` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `user` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`id`, `prid`, `rate`, `user`) VALUES
(11, 18, 3, 's.stevenidis@gmail.com'),
(12, 19, 5, 's.stevenidis@gmail.com'),
(13, 16, 5, 's.stevenidis@gmail.com'),
(14, 17, 4, 's.stevenidis@gmail.com'),
(15, 28, 1, 's.stevenidis@gmail.com'),
(16, 23, 5, 's.stevenidis@gmail.com'),
(17, 26, 3, 's.stevenidis@gmail.com'),
(18, 16, 4, 'aaa@aaa.aa'),
(19, 26, 5, 'aaa@aaa.aa'),
(20, 23, 3, 'aaa@aaa.aa'),
(21, 24, 5, 'aaa@aaa.aa'),
(22, 22, 5, 'aaa@aaa.aa'),
(23, 17, 5, 'aaa@aaa.aa'),
(24, 16, 4, 'test@test.gr'),
(25, 16, 4, 'asdt5@test.gr'),
(26, 25, 5, 's.stevenidis@gmail.com'),
(27, 27, 4, 's.stevenidis@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `password_request_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `roles` tinytext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `address` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `phone` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `password`, `created_at`, `username`, `email`, `is_active`, `password_request_at`, `confirmation_token`, `roles`, `address`, `lastname`, `phone`) VALUES
(27, '$2y$13$tz5DHO/F6BnhXtl0I/x6ouEj0a4XSYj9lHE447a8YgpTxt0W2iPQ6', '2017-05-01 17:46:16', 'stefan', 'lord_tourin@yahoo.com', 1, NULL, NULL, 'a:1:{i:0;s:9:"ROLE_USER";}', '', '', 0),
(32, '$2y$13$MbuaEij.L.mU2WkV6nOsreH4K5MIKWgc2Y5EmP59keBEYoHI293O6', '2017-06-04 20:10:27', 'stefanos', 's.stevenidis@gmail.com', 1, NULL, NULL, 'a:1:{i:0;s:9:"ROLE_USER";}', 'korinthou 10', 'stefanidis', 6978032970),
(33, '$2y$13$itLkf7nEt0ZfN1x9C.PVquCyvB0ZBr6U0SMzu/CHqNq9iYXs7DDgm', '2017-12-09 16:31:24', 'admin', 'admin@gmail.com', 1, NULL, NULL, 'a:1:{i:0;s:9:"ROLE_USER";}', 'adress', 'admin', 2310314012);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_64C19C15E237E06` (`name`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_7E8585C85126AC48` (`mail`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_B3BA5A5A5E237E06` (`name`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_1483A5E9F85E0677` (`username`),
  ADD UNIQUE KEY `UNIQ_1483A5E9E7927C74` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
