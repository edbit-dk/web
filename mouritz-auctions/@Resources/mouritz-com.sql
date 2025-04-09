-- phpMyAdmin SQL Dump
-- version 4.2.12
-- http://www.phpmyadmin.net
--
-- Vært: localhost
-- Genereringstid: 19. 01 2015 kl. 22:59:07
-- Serverversion: 5.5.40
-- PHP-version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `thom855j_MouritzAuktioner`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `Auctions`
--

CREATE TABLE IF NOT EXISTS `Auctions` (
`id` int(11) NOT NULL COMMENT 'PK',
  `title` varchar(255) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `description` text NOT NULL,
  `start_price` varchar(100) NOT NULL,
  `buy_price` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL COMMENT 'FK',
  `image` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'FK'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Data dump for tabellen `Auctions`
--

INSERT INTO `Auctions` (`id`, `title`, `start_date`, `end_date`, `description`, `start_price`, `buy_price`, `category_id`, `image`, `user_id`) VALUES
(1, 'Big Sofa', '2015-01-19 08:13:26', '2015-01-23 10:32:33', 'Sofa', '1.000.000', '500.000', 1, 'sofa.jpg', 2);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `Bids`
--

CREATE TABLE IF NOT EXISTS `Bids` (
`id` int(11) NOT NULL COMMENT 'PK',
  `auction_id` int(11) NOT NULL COMMENT 'FK',
  `user_id` int(11) NOT NULL COMMENT 'FK',
  `amount` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Data dump for tabellen `Bids`
--

INSERT INTO `Bids` (`id`, `auction_id`, `user_id`, `amount`) VALUES
(1, 3, 2, '200.000');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `Categories`
--

CREATE TABLE IF NOT EXISTS `Categories` (
`id` int(11) NOT NULL COMMENT 'PK',
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Data dump for tabellen `Categories`
--

INSERT INTO `Categories` (`id`, `name`) VALUES
(1, 'paintings');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `Comments`
--

CREATE TABLE IF NOT EXISTS `Comments` (
`id` int(11) NOT NULL COMMENT 'PK',
  `comment` varchar(500) NOT NULL,
  `user_id` int(11) NOT NULL,
  `auction_id` int(11) NOT NULL COMMENT 'FK'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Data dump for tabellen `Comments`
--

INSERT INTO `Comments` (`id`, `comment`, `user_id`, `auction_id`) VALUES
(1, 'This is a test', 3, 1);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `Roles`
--

CREATE TABLE IF NOT EXISTS `Roles` (
`id` int(11) NOT NULL COMMENT 'PK',
  `name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Data dump for tabellen `Roles`
--

INSERT INTO `Roles` (`id`, `name`, `role`) VALUES
(0, 'Standard', ''),
(1, 'Admin', '{"Admin": 1}');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `Sessions`
--

CREATE TABLE IF NOT EXISTS `Sessions` (
`id` int(11) NOT NULL,
  `hash` varchar(64) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
`id` int(11) NOT NULL COMMENT 'PK',
  `username` varchar(30) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zipcode` varchar(50) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL COMMENT 'FK'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Data dump for tabellen `Users`
--

INSERT INTO `Users` (`id`, `username`, `password`, `email`, `firstname`, `lastname`, `address`, `zipcode`, `phone`, `role_id`) VALUES
(3, 'demo', '$2y$07$aCZZ4e2uOm7OrEpv8ZHDTuOukSa2N2kXzzatlenZUo7dOr8VAABI2', '', '', '', '', '', '', 1),
(4, 'admin', '$2y$07$ibBflHRaS11FAcTaW5oKHe7BZdpXqKAURkS9bXnM2fYc03U/PYzlC', '', '', '', '', '', '', 0);

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `Auctions`
--
ALTER TABLE `Auctions`
 ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `Bids`
--
ALTER TABLE `Bids`
 ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `Categories`
--
ALTER TABLE `Categories`
 ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `Comments`
--
ALTER TABLE `Comments`
 ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `Roles`
--
ALTER TABLE `Roles`
 ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `Sessions`
--
ALTER TABLE `Sessions`
 ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `Users`
--
ALTER TABLE `Users`
 ADD PRIMARY KEY (`id`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `Auctions`
--
ALTER TABLE `Auctions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK',AUTO_INCREMENT=2;
--
-- Tilføj AUTO_INCREMENT i tabel `Bids`
--
ALTER TABLE `Bids`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK',AUTO_INCREMENT=2;
--
-- Tilføj AUTO_INCREMENT i tabel `Categories`
--
ALTER TABLE `Categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK',AUTO_INCREMENT=2;
--
-- Tilføj AUTO_INCREMENT i tabel `Comments`
--
ALTER TABLE `Comments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK',AUTO_INCREMENT=2;
--
-- Tilføj AUTO_INCREMENT i tabel `Roles`
--
ALTER TABLE `Roles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK',AUTO_INCREMENT=3;
--
-- Tilføj AUTO_INCREMENT i tabel `Sessions`
--
ALTER TABLE `Sessions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Tilføj AUTO_INCREMENT i tabel `Users`
--
ALTER TABLE `Users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK',AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
