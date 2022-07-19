-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2022 at 01:15 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `databasephp`
--

-- --------------------------------------------------------

--
-- Table structure for table `costumers`
--

CREATE TABLE `costumers` (
  `id_costumer` int(5) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `ovo` varchar(12) NOT NULL,
  `level` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `costumers`
--

INSERT INTO `costumers` (`id_costumer`, `username`, `password`, `email`, `ovo`, `level`) VALUES
(1, 'diwandanu', 'admin123', 'tr@gmail.com', '123', 'admin'),
(2, 'trian', '123', 't@gmail.com', '123', 'admin'),
(5, 'ahoy', '123', 'ahoy@gmail.com', '01234', 'user'),
(6, 'akutan', '123', 'akutan@gmail.com', '012345', 'user'),
(7, 'peko', '123', 'pekora@gmail.com', '0321', 'user'),
(8, 'korone', '123', 'korone@gmail.com', '0813', 'user'),
(9, 'aja', '123', 'aja@gmail.com', '081212344321', 'user'),
(10, 'Muhamad Trian Diwandanu', '123', 'triankpam@gmail.com', '081288527785', 'user'),
(15, 'Test', '123456', 'test@gmail.com', '123', 'user'),
(16, 'gans', '123456', 'gans@gmail.com', '123456', 'user'),
(18, 'aryawnd', 'bambang12', 'aryawnd17@gmail.com', '082165378212', 'user'),
(19, 'User', '123456', 'user@gmail.com', '1234', 'user'),
(20, 'rehan', '123456', 'rehan60@gmail.com', '0812354721', 'user'),
(21, 'Muhamad Trian Diwandanu', '123456', 'triandiwandanu17@gmail.com', '08123456789', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `transaction_id` bigint(21) NOT NULL,
  `image` varchar(50) NOT NULL,
  `product` varchar(20) NOT NULL,
  `cost_price` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `ovo` varchar(12) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(15) NOT NULL,
  `payment` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`transaction_id`, `image`, `product`, `cost_price`, `username`, `email`, `ovo`, `date`, `status`, `payment`) VALUES
(1009122110, '5fbdb8152c094.jpg ', 'Jason 13th', 100000, 'Muhamad Trian Diwandanu', 'triankpam@gmail.com', '081288527785', '2021-12-09 13:15:26', 'Berhasil', '61b19f0d87674.jpg'),
(1009122130, '5fbdb848ac9c7.jpg ', 'Samurai', 150000, 'Muhamad Trian Diwandanu', 'triankpam@gmail.com', '081288527785', '2021-12-09 13:19:11', 'Berhasil', '61b19ff4f190d.png'),
(1026072130, '5fbdb848ac9c7.jpg', 'Samurai', 100000, 'muhamad trian diwandanu', 'triankpam@gmail.com', '081288527785', '2021-07-26 19:28:23', 'Berhasil', '60feac96ef536.png'),
(7300721350, '610157dab1945.jpg', 'Aye Capt', 150000, 'peko', 'pekora@gmail.com', '0321', '2021-07-30 04:05:01', 'Pending', '-'),
(10090622330, '61013fef6e1c5.jpg', 'Aloha', 100000, 'Muhamad Trian Diwandanu', 'triankpam@gmail.com', '081288527785', '2022-06-09 17:34:23', 'Pending', '-'),
(10261221310, '61013e3963a0d.jpg', 'Hokusai Wave', 75000, 'Muhamad Trian Diwandanu', 'triankpam@gmail.com', '081288527785', '2021-12-26 19:31:32', 'Telah Dibayar', '61c860b0e527d.png'),
(10270821310, '61013e3963a0d.jpg', 'Hokusai Wave', 75000, 'Muhamad Trian Diwandanu', 'triankpam@gmail.com', '081288527785', '2021-08-27 16:43:42', 'Telah Dibayar', '619b822dd8339.png'),
(10300721340, '61015422163cf.jpg', 'Geisha', 100000, 'muhamad trian diwandanu', 'triankpam@gmail.com', '081288527785', '2021-07-30 03:13:31', 'Berhasil', '6103fb747e57e.jpg'),
(10310721310, '61013e3963a0d.jpg', 'Hokusai Wave', 75000, 'muhamad trian diwandanu', 'triankpam@gmail.com', '081288527785', '2021-07-31 19:08:33', 'Telah Dibayar', '61053e312ed30.jpg'),
(10310721350, '610157dab1945.jpg', 'Aye Capt', 150000, 'muhamad trian diwandanu', 'triankpam@gmail.com', '081288527785', '2021-07-31 19:24:03', 'Berhasil', '61054177327a0.jpg'),
(18300721160, '5fbdd2e1b2044.jpg ', 'Kreator', 50000, 'aryawnd', 'aryawnd17@gmail.com', '082165378212', '2021-07-30 21:30:44', 'Pending', '-'),
(18300721161, '5fbdd2e1b2044.jpg ', 'Kreator', 50000, 'aryawnd', 'aryawnd17@gmail.com', '082165378212', '2021-07-30 21:35:53', 'Pending', '-');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` int(5) NOT NULL,
  `title` varchar(20) NOT NULL,
  `price` int(10) NOT NULL,
  `description` text NOT NULL,
  `preview` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `title`, `price`, `description`, `preview`, `image`) VALUES
(1, 'Jason 13th', 100000, 'Jason Voorhees, the main character from the Friday the 13th series. \r\nHe first appeared in Friday the 13th (1980) as the young son of camp cook-turned-killer Mrs. Voorhees, in which he was portrayed by Ari Lehman', '5fbdb8152c094.jpg ', '5fbdb8152c34c.jpg '),
(3, 'Samurai', 150000, 'A Lonely Samurai After The War', '5fbdb848ac9c7.jpg ', '5fbdb848acc5d.jpg '),
(15, 'Ignite The Sea', 100000, 'A spirit drowned in the deep ocean who wanted to blow up the ships that passed by', '5fbdd1d1b03c0.jpg', '5fbdd1d1b05af.jpg'),
(16, 'Kreator', 50000, 'One of the spirits that makes humans make heresies', '5fbdd2e1b2044.jpg ', '5fbdd2e1b23c5.jpg '),
(17, 'Smith Grind', 150000, 'The gatekeeper of hell who is down to earth to skateboarding', '5fbdd429d0beb.jpg ', '5fbdd429d0e0a.jpg '),
(19, 'Holiday', 150000, 'A day to remember with holiday', '5fbdde0689192.jpg', '5fbdde06893aa.jpg'),
(31, 'Hokusai Wave', 75000, 'The Great Wave off Kanagawa, also known as The Great Wave or simply The Wave.\r\nThe image depicts an enormous wave threatening three boats off the coast in the Sagami Bay (Kanagawa Prefecture) while Mount Fuji rises in the background.', '61013e3963a0d.jpg', '61013e3963b1a.jpg'),
(32, 'Oni Samurai', 100000, 'Oni are powerful, evil, and terrifying creatures who are believed to have supernatural powers in Japanese belief.\r\nHe is a samurai who came from another world bringing disaster to anyone who fought him.', '61013f638dbdf.jpg', '61013f638dc85.jpg'),
(33, 'Aloha', 100000, 'Someone who is not satisfied with enjoying his holidays during his life.', '61013fef6e1c5.jpg', '61013fef6e275.jpg'),
(34, 'Geisha', 100000, 'A class of female Japanese performance artists and entertainers trained in traditional Japanese performing arts styles, such as dance, music and singing, as well as being proficient conversationalists and hosts.', '61015422163cf.jpg', '6101542216482.jpg'),
(35, 'Aye Capt', 150000, 'Work hard like a captain.', '610157dab1945.jpg', '610157dab3710.jpg'),
(36, 'The Vacation', 100000, 'A death does not prevent him from going on a mystery vacation.', '61015d49c9035.jpg', '61015d49ca089.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `costumers`
--
ALTER TABLE `costumers`
  ADD PRIMARY KEY (`id_costumer`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `costumers`
--
ALTER TABLE `costumers`
  MODIFY `id_costumer` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `transaction_id` bigint(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18300721162;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
