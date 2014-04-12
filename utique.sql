-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Värd: localhost
-- Skapad: 11 apr 2014 kl 17:23
-- Serverversion: 5.6.12-log
-- PHP-version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databas: `utique`
--
CREATE DATABASE IF NOT EXISTS `utique` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `utique`;

-- --------------------------------------------------------

--
-- Tabellstruktur `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) CHARACTER SET latin1 NOT NULL,
  `email` varchar(60) CHARACTER SET latin1 NOT NULL,
  `address` varchar(60) CHARACTER SET latin1 NOT NULL,
  `zipcode` mediumint(9) NOT NULL,
  `city` varchar(60) CHARACTER SET latin1 NOT NULL,
  `country` varchar(20) CHARACTER SET latin1 NOT NULL DEFAULT 'Sverige',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellstruktur `inventory_items`
--

CREATE TABLE IF NOT EXISTS `inventory_items` (
  `amount` int(11) NOT NULL,
  `tee_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `size` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=183 ;

--
-- Dumpning av Data i tabell `inventory_items`
--

INSERT INTO `inventory_items` (`amount`, `tee_id`, `id`, `size`) VALUES
(0, 1, 1, 'XS'),
(12, 1, 2, 'S'),
(15, 1, 3, 'M'),
(9, 1, 4, 'L'),
(15, 1, 5, 'XL'),
(13, 1, 6, 'XXL'),
(15, 1, 7, 'XXXL'),
(15, 2, 8, 'XS'),
(15, 2, 9, 'S'),
(15, 2, 10, 'M'),
(15, 2, 11, 'L'),
(15, 2, 12, 'XL'),
(15, 2, 13, 'XXL'),
(15, 2, 14, 'XXXL'),
(15, 3, 15, 'XS'),
(15, 3, 16, 'S'),
(15, 3, 17, 'M'),
(15, 3, 18, 'L'),
(15, 3, 19, 'XL'),
(15, 3, 20, 'XXL'),
(15, 3, 21, 'XXXL'),
(0, 4, 22, 'XS'),
(15, 4, 23, 'S'),
(15, 4, 24, 'M'),
(15, 4, 25, 'L'),
(5, 4, 26, 'XL'),
(15, 4, 27, 'XXL'),
(15, 4, 28, 'XXXL'),
(15, 5, 29, 'XS'),
(15, 5, 30, 'S'),
(15, 5, 31, 'M'),
(15, 5, 32, 'L'),
(15, 5, 33, 'XL'),
(15, 5, 34, 'XXL'),
(15, 5, 35, 'XXXL'),
(15, 6, 36, 'XS'),
(15, 6, 37, 'S'),
(15, 6, 38, 'M'),
(15, 6, 39, 'L'),
(15, 6, 40, 'XL'),
(15, 6, 41, 'XXL'),
(15, 6, 42, 'XXXL'),
(15, 7, 43, 'XS'),
(15, 7, 44, 'S'),
(15, 7, 45, 'M'),
(15, 7, 46, 'L'),
(15, 7, 47, 'XL'),
(15, 7, 48, 'XXL'),
(15, 7, 49, 'XXXL'),
(15, 8, 50, 'XS'),
(15, 8, 51, 'S'),
(15, 8, 52, 'M'),
(15, 8, 53, 'L'),
(15, 8, 54, 'XL'),
(15, 8, 55, 'XXL'),
(15, 8, 56, 'XXXL'),
(15, 9, 57, 'XS'),
(15, 9, 58, 'S'),
(15, 9, 59, 'M'),
(15, 9, 60, 'L'),
(15, 9, 61, 'XL'),
(15, 9, 62, 'XXL'),
(15, 9, 63, 'XXXL'),
(15, 10, 64, 'XS'),
(15, 10, 65, 'S'),
(15, 10, 66, 'M'),
(15, 10, 67, 'L'),
(15, 10, 68, 'XL'),
(15, 10, 69, 'XXL'),
(15, 10, 70, 'XXXL'),
(15, 11, 71, 'XS'),
(15, 11, 72, 'S'),
(15, 11, 73, 'M'),
(15, 11, 74, 'L'),
(15, 11, 75, 'XL'),
(15, 11, 76, 'XXL'),
(15, 11, 77, 'XXXL'),
(15, 12, 78, 'XS'),
(15, 12, 79, 'S'),
(15, 12, 80, 'M'),
(15, 12, 81, 'L'),
(15, 12, 82, 'XL'),
(15, 12, 83, 'XXL'),
(15, 12, 84, 'XXXL'),
(15, 13, 85, 'XS'),
(15, 13, 86, 'S'),
(15, 13, 87, 'M'),
(15, 13, 88, 'L'),
(15, 13, 89, 'XL'),
(15, 13, 90, 'XXL'),
(15, 13, 91, 'XXXL'),
(15, 14, 92, 'XS'),
(15, 14, 93, 'S'),
(15, 14, 94, 'M'),
(15, 14, 95, 'L'),
(15, 14, 96, 'XL'),
(15, 14, 97, 'XXL'),
(15, 14, 98, 'XXXL'),
(15, 15, 99, 'XS'),
(15, 15, 100, 'S'),
(15, 15, 101, 'M'),
(15, 15, 102, 'L'),
(15, 15, 103, 'XL'),
(15, 15, 104, 'XXL'),
(15, 15, 105, 'XXXL'),
(15, 16, 106, 'XS'),
(15, 16, 107, 'S'),
(15, 16, 108, 'M'),
(15, 16, 109, 'L'),
(15, 16, 110, 'XL'),
(15, 16, 111, 'XXL'),
(15, 16, 112, 'XXXL'),
(15, 17, 113, 'XS'),
(15, 17, 114, 'S'),
(15, 17, 115, 'M'),
(15, 17, 116, 'L'),
(15, 17, 117, 'XL'),
(15, 17, 118, 'XXL'),
(15, 17, 119, 'XXXL'),
(15, 18, 120, 'XS'),
(15, 18, 121, 'S'),
(15, 18, 122, 'M'),
(15, 18, 123, 'L'),
(15, 18, 124, 'XL'),
(15, 18, 125, 'XXL'),
(15, 18, 126, 'XXXL'),
(15, 19, 127, 'XS'),
(15, 19, 128, 'S'),
(15, 19, 129, 'M'),
(15, 19, 130, 'L'),
(15, 19, 131, 'XL'),
(15, 19, 132, 'XXL'),
(15, 19, 133, 'XXXL'),
(15, 20, 134, 'XS'),
(15, 20, 135, 'S'),
(15, 20, 136, 'M'),
(15, 20, 137, 'L'),
(15, 20, 138, 'XL'),
(15, 20, 139, 'XXL'),
(15, 20, 140, 'XXXL'),
(15, 21, 141, 'XS'),
(15, 21, 142, 'S'),
(15, 21, 143, 'M'),
(15, 21, 144, 'L'),
(15, 21, 145, 'XL'),
(15, 21, 146, 'XXL'),
(15, 21, 147, 'XXXL'),
(15, 22, 148, 'XS'),
(15, 22, 149, 'S'),
(15, 22, 150, 'M'),
(15, 22, 151, 'L'),
(15, 22, 152, 'XL'),
(15, 22, 153, 'XXL'),
(15, 22, 154, 'XXXL'),
(15, 23, 155, 'XS'),
(15, 23, 156, 'S'),
(15, 23, 157, 'M'),
(15, 23, 158, 'L'),
(15, 23, 159, 'XL'),
(15, 23, 160, 'XXL'),
(15, 23, 161, 'XXXL'),
(15, 24, 162, 'XS'),
(15, 24, 163, 'S'),
(15, 24, 164, 'M'),
(15, 24, 165, 'L'),
(15, 24, 166, 'XL'),
(15, 24, 167, 'XXL'),
(15, 24, 168, 'XXXL'),
(15, 25, 169, 'XS'),
(15, 25, 170, 'S'),
(15, 25, 171, 'M'),
(15, 25, 172, 'L'),
(15, 25, 173, 'XL'),
(15, 25, 174, 'XXL'),
(15, 25, 175, 'XXXL'),
(15, 26, 176, 'XS'),
(15, 26, 177, 'S'),
(15, 26, 178, 'M'),
(15, 26, 179, 'L'),
(15, 26, 180, 'XL'),
(15, 26, 181, 'XXL'),
(15, 26, 182, 'XXXL');

-- --------------------------------------------------------

--
-- Tabellstruktur `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `status` varchar(60) CHARACTER SET latin1 NOT NULL,
  `created` datetime NOT NULL,
  `customer_id` int(6) NOT NULL,
  `price` int(11) NOT NULL DEFAULT '0',
  `shipping` int(11) NOT NULL DEFAULT '49',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellstruktur `order_items`
--

CREATE TABLE IF NOT EXISTS `order_items` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `tee_id` int(11) NOT NULL,
  `size` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `order_id` smallint(6) NOT NULL,
  `amount` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellstruktur `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `order_id` smallint(6) NOT NULL,
  `card_number` bigint(16) NOT NULL,
  `expiry_date` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`,`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellstruktur `tees`
--

CREATE TABLE IF NOT EXISTS `tees` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `price` smallint(6) NOT NULL,
  `color` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `discount` smallint(6) NOT NULL DEFAULT '0',
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET latin1 NOT NULL,
  `sex` varchar(10) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=27 ;

--
-- Dumpning av Data i tabell `tees`
--

INSERT INTO `tees` (`id`, `price`, `color`, `discount`, `name`, `description`, `sex`) VALUES
(1, 349, 'Svart', 10, 'The Element of Surprise!', 'Topp från UTique. Figurnära modell med rundad halsringning samt brottarrygg.\r\nTillverkad av 95% Viskos och 5% Elastan.\r\n\r\nModellen är 177 cm lång och bär storlek Small.', 'Herr'),
(2, 159, 'Vit', 0, 'And God Said', 'Topp från UTique. Figurnära modell med rundad halsringning samt brottarrygg.\r\nTillverkad av 95% Viskos och 5% Elastan.\r\n\r\nModellen är 177 cm lång och bär storlek Small.', 'Herr'),
(3, 279, 'Vit', 0, 'Grammar Police', 'Topp från UTique. Figurnära modell med rundad halsringning samt brottarrygg.\r\nTillverkad av 95% Viskos och 5% Elastan.\r\n\r\nModellen är 177 cm lång och bär storlek Small.', 'Herr'),
(4, 129, 'Vit', 0, 'Staring Owl', 'Topp från UTique. Figurnära modell med rundad halsringning samt brottarrygg.\r\nTillverkad av 95% Viskos och 5% Elastan.\r\n\r\nModellen är 177 cm lång och bär storlek Small.', 'Dam'),
(5, 99, 'Svart', 0, '...and it was delicious!', 'Topp från UTique. Figurnära modell med rundad halsringning samt brottarrygg.\r\nTillverkad av 95% Viskos och 5% Elastan.\r\n\r\nModellen är 177 cm lång och bär storlek Small.', 'Herr'),
(6, 139, 'Svart', 0, 'Durian', 'Topp från UTique. Figurnära modell med rundad halsringning samt brottarrygg.\r\nTillverkad av 95% Viskos och 5% Elastan.\r\n\r\nModellen är 177 cm lång och bär storlek Small.', 'Dam'),
(7, 169, 'Blå', 0, 'Be Rational! - Get Real!', 'Topp från UTique. Figurnära modell med rundad halsringning samt brottarrygg.\r\nTillverkad av 95% Viskos och 5% Elastan.\r\n\r\nModellen är 177 cm lång och bär storlek Small.', 'Herr'),
(8, 179, 'Rosa', 0, 'Batgirl', 'Topp från UTique. Figurnära modell med rundad halsringning samt brottarrygg.\r\nTillverkad av 95% Viskos och 5% Elastan.\r\n\r\nModellen är 177 cm lång och bär storlek Small.', 'Dam'),
(9, 59, 'Svart', 0, 'Gamer Love', 'Topp från UTique. Figurnära modell med rundad halsringning samt brottarrygg.\r\nTillverkad av 95% Viskos och 5% Elastan.\r\n\r\nModellen är 177 cm lång och bär storlek Small.', 'Dam'),
(10, 119, 'Vit', 0, 'I love nerds', 'Topp från UTique. Figurnära modell med rundad halsringning samt brottarrygg.\r\nTillverkad av 95% Viskos och 5% Elastan.\r\n\r\nModellen är 177 cm lång och bär storlek Small.', 'Dam'),
(11, 189, 'Svart', 0, 'Pimp', 'Topp från UTique. Figurnära modell med rundad halsringning samt brottarrygg.\r\nTillverkad av 95% Viskos och 5% Elastan.\r\n\r\nModellen är 177 cm lång och bär storlek Small.', 'Herr'),
(12, 199, 'Svart', 0, 'We Can Do It!', 'Topp från UTique. Figurnära modell med rundad halsringning samt brottarrygg.\r\nTillverkad av 95% Viskos och 5% Elastan.\r\n\r\nModellen är 177 cm lång och bär storlek Small.', 'Dam'),
(13, 189, 'Blå', 0, 'If you''re happy and you know it...', 'Topp från UTique. Figurnära modell med rundad halsringning samt brottarrygg.\r\nTillverkad av 95% Viskos och 5% Elastan.\r\n\r\nModellen är 177 cm lång och bär storlek Small.', 'Dam'),
(14, 99, 'Blå', 0, 'I love my Swedish husband', 'Topp från UTique. Figurnära modell med rundad halsringning samt brottarrygg.\r\nTillverkad av 95% Viskos och 5% Elastan.\r\n\r\nModellen är 177 cm lång och bär storlek Small.', 'Dam'),
(15, 99, 'Vit', 0, '3% Neanderthal DNA', 'Topp från UTique. Figurnära modell med rundad halsringning samt brottarrygg. Tillverkad av 95% Viskos och 5% Elastan. Modellen är 177 cm lång och bär storlek Small.', 'Herr'),
(16, 199, 'Vit', 0, 'ADHD', 'Topp från UTique. Figurnära modell med rundad halsringning samt brottarrygg. Tillverkad av 95% Viskos och 5% Elastan. Modellen är 177 cm lång och bär storlek Small.', 'Herr'),
(17, 399, 'Vit', 0, 'I care about this Alot', 'Topp från UTique. Figurnära modell med rundad halsringning samt brottarrygg. Tillverkad av 95% Viskos och 5% Elastan. Modellen är 177 cm lång och bär storlek Small.', 'Herr'),
(18, 59, 'Svart', 0, '100% atheist', 'Topp från UTique. Figurnära modell med rundad halsringning samt brottarrygg. Tillverkad av 95% Viskos och 5% Elastan. Modellen är 177 cm lång och bär storlek Small.', 'Dam'),
(19, 99, 'Svart', 0, 'Bacon', 'Topp från UTique. Figurnära modell med rundad halsringning samt brottarrygg. Tillverkad av 95% Viskos och 5% Elastan. Modellen är 177 cm lång och bär storlek Small.', 'Herr'),
(20, 299, 'Svart', 0, 'Beer', 'Topp från UTique. Figurnära modell med rundad halsringning samt brottarrygg. Tillverkad av 95% Viskos och 5% Elastan. Modellen är 177 cm lång och bär storlek Small.', 'Herr'),
(21, 99, 'Svart', 0, 'But Calculus is fun', 'Topp från UTique. Figurnära modell med rundad halsringning samt brottarrygg. Tillverkad av 95% Viskos och 5% Elastan. Modellen är 177 cm lång och bär storlek Small.', 'Herr'),
(22, 99, 'Svart', 0, 'I can explain it to you...', 'Topp från UTique. Figurnära modell med rundad halsringning samt brottarrygg. Tillverkad av 95% Viskos och 5% Elastan. Modellen är 177 cm lång och bär storlek Small.', 'Herr'),
(23, 499, 'Lila', 0, 'Cupcake rainbow', 'Topp från UTique. Figurnära modell med rundad halsringning samt brottarrygg. Tillverkad av 95% Viskos och 5% Elastan. Modellen är 177 cm lång och bär storlek Small.', 'Dam'),
(24, 199, 'Rosa', 0, 'I am his MRS', 'Topp från UTique. Figurnära modell med rundad halsringning samt brottarrygg. Tillverkad av 95% Viskos och 5% Elastan. Modellen är 177 cm lång och bär storlek Small.', 'Dam'),
(25, 299, 'Vit', 0, 'I pooped today!', 'Topp från UTique. Figurnära modell med rundad halsringning samt brottarrygg. Tillverkad av 95% Viskos och 5% Elastan. Modellen är 177 cm lång och bär storlek Small.', 'Herr'),
(26, 79, 'Blå', 0, 'Lions', 'Topp från UTique. Figurnära modell med rundad halsringning samt brottarrygg. Tillverkad av 95% Viskos och 5% Elastan. Modellen är 177 cm lång och bär storlek Small.', 'Dam');

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
