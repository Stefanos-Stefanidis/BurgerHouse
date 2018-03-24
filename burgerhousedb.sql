-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 24, 2018 at 06:29 PM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.28-0ubuntu0.16.04.1

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
(2, 'The Perfect Burger', 11, '127.0.0.1'),
(5, 'King Crab Appetizers', 3, '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hierarchy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `hierarchy`) VALUES
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
  `comment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `rate` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `comment`, `date`, `rate`) VALUES
(58, '3333yes', 'it isyes', '2016-07-31 22:30:44', 0),
(59, '444333yes', 'it isyes', '2016-07-31 22:34:40', 0),
(60, '5554333yes', 'it isyes', '2016-07-31 22:35:35', 0),
(61, 'asda', 'adsasd', '2016-07-31 22:36:30', 0),
(62, 'asda', 'adsasd', '2016-07-31 22:37:11', 0),
(63, '111asda', 'adsasd', '2016-07-31 22:37:38', 0),
(64, 'ss', 'sss', '2016-07-31 22:58:44', 0),
(65, '11111', '111111', '2016-08-01 22:52:51', 0),
(66, 'asd', 'ads', '2016-08-01 23:34:45', 0),
(67, 'asd', 'ads', '2016-08-01 23:35:18', 0),
(68, 'asdasd', 'sadasd', '2016-08-04 20:23:20', 0),
(71, 'latest', 'coment this is a comment i am commenting for some other reason to tell u that this is inapropriareates', '2016-08-16 00:43:27', 0),
(72, 'aaa', 'aaa', '2016-08-27 17:22:32', 0),
(73, 'aaa', 'aaa', '2016-08-27 17:25:43', 0),
(74, 'aaa', 'aaa', '2016-08-27 17:25:45', 0),
(75, 'aaa', 'aaa', '2016-08-27 17:25:51', 0),
(76, 'aaa', 'aaa', '2016-08-27 17:26:14', 0),
(77, 'test', 'test1', '2016-08-27 17:28:56', 0),
(78, 'test', 'test1', '2016-08-27 17:28:57', 0),
(79, 'test', 'test1', '2016-08-27 17:28:58', 0),
(80, 'test1', 'test1', '2016-08-27 17:33:00', 0),
(81, 'test2', 'tste1', '2016-08-27 17:33:56', 0),
(82, 'test22', 'tste1', '2016-08-27 17:37:59', 0),
(83, 'test2222', 'tste1', '2016-08-27 17:38:33', 0),
(84, 'test00', 'tste1', '2016-08-27 17:39:20', 0),
(85, 'test4', '123e4', '2016-08-27 17:46:25', 0),
(86, 'test4', '123e4', '2016-08-27 17:47:52', 0),
(87, 'coment test', 'this is test', '2016-08-27 17:48:27', 0),
(90, 'still', 'testing', '2016-08-27 17:56:37', 0),
(91, 'ssd', 'ddv', '2016-08-27 18:20:34', 0),
(92, '', 'sdas', '2016-08-27 18:35:15', 0),
(93, 'a', 'asdas', '2016-08-27 18:47:47', 0),
(94, 'a1', 'asdas', '2016-08-27 18:48:05', 0),
(95, 'a1', 'asdas', '2016-08-27 18:48:15', 0),
(96, 'a1', 'asdas', '2016-08-27 18:48:15', 0),
(98, 'aaa', 'sda', '2017-01-02 20:32:33', 0),
(99, 'test', '124', '2017-01-02 21:09:30', 0),
(100, 's.stevenidis@gmail.com', 'sdasdas', '2017-01-09 22:03:19', 0),
(101, 's.stevenidis@gmail.com', 'ssss', '2017-01-09 22:04:13', 0),
(102, 's.stevenidis@gmail.com', 'asdw3sd', '2017-01-09 22:05:04', 0),
(103, 's.stevenidis@gmail.com', 'asdw3sdasdasdassd', '2017-01-09 22:05:42', 0),
(104, 's.stevenidis@gmail.com', 'asdasd', '2017-01-21 18:18:57', 0),
(105, 's.stevenidis@gmail.com', 'aaaaaaa', '2017-01-21 18:19:21', 0),
(106, 's.stevenidis@gmail.com', 'sdasdasdqqqq', '2017-01-21 18:20:14', 0),
(107, 'stef', 'hiiiiiii', '2017-05-15 23:07:03', 0),
(108, 's.stevenidis@gmail.com', 'whattt', '2017-05-15 23:08:07', 0),
(109, 'stefanos', 'hiii', '2017-06-05 16:58:23', 0),
(110, 'stefanos', 'autoload\r\n', '2017-06-05 17:47:25', 0),
(111, 'stefanaras', 'hey there', '2018-03-03 11:45:36', 0),
(112, 'stefanaras', 'hey there\r\ndudes', '2018-03-03 11:46:01', 0),
(113, 'stef', 'comment with rate', '2018-03-10 16:01:40', NULL),
(114, 'stef', 'another comment with rate', '2018-03-10 16:02:40', 5),
(115, 'stef', '', '2018-03-10 16:03:00', 4),
(116, 'stef', 'more comments with rate', '2018-03-10 16:04:19', 3.5);

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
(48, 'xaxa@sads.sds', '2016-12-24'),
(49, 'adasd@asd.gd', '2017-01-02'),
(50, 'sasd2@asd.fs', '2017-01-21'),
(51, 'asds@asdsa.fe', '2017-01-21'),
(52, 'asd@sdas.tgf', '2017-01-21'),
(53, 'sad@aesd.rr', '2017-01-21'),
(54, 's.stevenidis@gmail.com', '2017-06-05'),
(55, 'lord_tourin@yahoo.com', '2017-09-08'),
(56, 'testmail@gmail.com ', '2018-03-02'),
(57, 'testmail231@gmail.com', '2018-03-02');

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
(106, 'Buffalo Chicken Wings', 3, '', '2017-06-13 13:19:10', 'stefanos', 'stefanidis', 'korinthou 10', 6978032970, '127.0.0.1'),
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
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `price`, `description`, `image`) VALUES
(16, 15, 'Bacon Wrapped Dates', 5, 'Dates are stuffed with blue cheese, wrapped in bacon and baked until crisp. These are delicious and very easy to make for a party. You can serve them at room temperature, so it is okay to make a few hours in advance!', 'bacon.jpg'),
(17, 15, 'Buffalo Chicken Wings', 3, 'This is similar to the hot wings recipe served at a popular restaurant chain. If you have ever had them, you have to love them.', 'buffalo.jpg'),
(18, 16, 'Double Tomato Bruschetta', 3.5, 'A delicious and easy appetizer. The balsamic vinegar gives it a little bite. Dried basil can be substituted but it is best with fresh.', 'tomato.jpg'),
(19, 16, 'Moorish crunch salad', 5, 'The bonus of using three lovely oranges here means that this beautifully bright salad provides us with our daily recommended intake of vitamin C, helping to keep our immune systems strong.', 'moorish.jpg'),
(20, 16, 'Hearts of palm and chicken chopped salad', 5, 'This lovely summer salad layers up honey-glazed chicken breast with beautiful textures, such as crunchy toasted seeds, juicy mango and crisp hearts of palm. ', 'palmsalad.jpg'),
(21, 16, 'Wild rice salad', 4.5, 'Combine with the rice, season with sea salt and black pepper, then drizzle with oil. Serve with grilled meat or fish.', 'rise.jpg'),
(22, 18, 'Amstel', 3, '', 'Amstel.jpg'),
(23, 18, 'Coca-cola', 2.5, '', 'cola.jpg'),
(24, 18, 'Orange-juice', 3, '', 'orangejuice.png'),
(25, 17, 'Southwest Burger', 10, 'This burger is posted for the Zaar World Tour Burger Challenge 2007. In honor of my teammates, the awesome and outstanding Devilishly Devious Diners, I would dedicate this recipe to the friends I have made!', 'southwest.jpg'),
(26, 17, 'White Castle Hamburgers', 9, 'These are really close to the real thing. My family was in heaven! They\'re great for dinner, football parties, or kid\'s birthday parties.', 'white-castle-burgers.jpg'),
(27, 17, 'The Perfect Burger', 11, 'Here are the ingredients & the instructions to make the perfect burger! Although it may not be the healthiest, use medium ground beef for moistness & flavour.', 'perfect-burger.jpg'),
(28, 15, 'King Crab Appetizers', 3, 'These crab tartlets have long since been a family favorite and are requested often at holiday get togethers.', 'crabs.jpg');

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
(12, 19, 4, 's.stevenidis@gmail.com'),
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
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `product_id`, `name`) VALUES
(1, 16, 'chicken'),
(3, 17, 'chicken');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `date` datetime DEFAULT NULL,
  `phone` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`, `date`, `phone`, `lastname`, `address`) VALUES
(1, 'stef', 'stef', 's.stevenidis@gmail.com', 's.stevenidis@gmail.com', 1, NULL, '$2y$13$FDBI.RxeX9hJR/6wvPlzzuTVg3m.O.EUZDblKv1dlGF7nJeL3VCC2', '2018-03-10 17:17:16', NULL, NULL, 'a:0:{}', NULL, '0', '', ''),
(2, 'admin', 'admin', 'ruzuroshiv@gmail.com', 'ruzuroshiv@gmail.com', 1, NULL, '$2y$13$6AwYlifFijpFs1qIWVpfpOd5gl601eAqPekJV5BxNalnKDpUyHXwS', '2018-03-20 22:53:52', NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', NULL, '0', '', ''),
(3, 'test', 'test', 'test@gmail.com', 'test@gmail.com', 1, NULL, '$2y$13$7hoNFBzcf5QpdjgGYcGdq./MPm3SKr8J6EHRhkPzmjeP3S2mkqFHi', '2018-03-04 20:16:00', NULL, NULL, 'a:0:{}', NULL, '0', '', ''),
(4, 'stefanos', 'stefanos', 'XAXAXA@GMAIL.COM', 'xaxaxa@gmail.com', 1, NULL, '$2y$13$84svv/JAz6SYcerevAer5OKPerqxSb8H5C.qXODanBoGqBLnJBS5S', '2018-03-04 20:29:20', NULL, NULL, 'a:0:{}', NULL, '0', '', ''),
(5, 'stef1', 'stef1', 'test1@gmail.com', 'test1@gmail.com', 1, NULL, '$2y$13$PGHER.vZH7d8yPAhr0NR/ecwpP7LN4DzR1/eU6yjmFttotLRJLsoa', '2018-03-04 20:41:02', NULL, NULL, 'a:0:{}', NULL, '0', '', ''),
(6, 'ste', 'ste', 'xaxax1a@gmail.com', 'xaxax1a@gmail.com', 1, NULL, '$2y$13$PsRmfzQG/xm5Oxcuzm1sXOZhLapQ..YFVP/wtNwBasbi2jr311ubK', '2018-03-04 20:56:36', NULL, NULL, 'a:0:{}', NULL, '0', '', ''),
(7, 'stef25', 'stef25', 'test25@gmail.com', 'test25@gmail.com', 1, NULL, '$2y$13$9ePTmRVNHP.FaL8Uf.uTTO6efSg0/aiFc8lVCwTDW3yrB2xhrFttC', '2018-03-04 21:41:03', NULL, NULL, 'a:0:{}', NULL, '0', '', ''),
(8, 'test253', 'test253', 'test253@gmail.com', 'test253@gmail.com', 1, NULL, '$2y$13$2/ukIrELKJthRMvYlV3ok./5QSMr8hcFbNVfxN6RQXSxGG3/P81WC', '2018-03-04 21:44:15', NULL, NULL, 'a:0:{}', '2018-03-04 21:44:15', '0', '', ''),
(9, 'stefanakos', 'stefanakos', 'test12345@gmail.com', 'test12345@gmail.com', 1, NULL, '$2y$13$NpquVSqdnpnQhzdy9gzPUeVIMKgL/1GXxV963MSWam8x/fpli8CAq', '2018-03-08 21:17:21', NULL, NULL, 'a:0:{}', '2018-03-08 21:16:42', '6978032970', 'stefanakos', '');

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
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_D34A04AD5E237E06` (`name`),
  ADD KEY `IDX_D34A04AD12469DE2` (`category_id`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_389B7834584665A` (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D64992FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_8D93D649A0D96FBF` (`email_canonical`),
  ADD UNIQUE KEY `UNIQ_8D93D649C05FB297` (`confirmation_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;
--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
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
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_D34A04AD12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `tag`
--
ALTER TABLE `tag`
  ADD CONSTRAINT `FK_389B7834584665A` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
