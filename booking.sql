-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time:  7 юли 2019 в 18:48
-- Версия на сървъра: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `softuni_booking`
--
CREATE DATABASE IF NOT EXISTS `softuni_booking` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `softuni_booking`;

-- --------------------------------------------------------

--
-- Структура на таблица `offers`
--

CREATE TABLE IF NOT EXISTS `offers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `price` decimal(10,2) DEFAULT NULL,
  `days` int(11) DEFAULT NULL,
  `description` varchar(10000) DEFAULT NULL,
  `picture_url` varchar(10000) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `town_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `is_occupied` tinyint(1) DEFAULT 0,
  `added_on` timestamp NULL DEFAULT current_timestamp(),
  `rented_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_offers_rooms` (`room_id`),
  KEY `fk_offers_towns` (`town_id`),
  KEY `fk_offers_users` (`user_id`),
  KEY `fk_offersRents_users` (`rented_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура на таблица `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Схема на данните от таблица `rooms`
--

INSERT INTO `rooms` (`id`, `type`) VALUES
(1, 'Single Room'),
(2, 'Double Room'),
(3, 'Maisonette');

-- --------------------------------------------------------

--
-- Структура на таблица `towns`
--

CREATE TABLE IF NOT EXISTS `towns` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Схема на данните от таблица `towns`
--

INSERT INTO `towns` (`id`, `name`) VALUES
(1, 'Sofia'),
(2, 'Varna'),
(3, 'Plovdiv'),
(4, 'Burgas'),
(5, 'Pleven'),
(6, 'Other');

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `money_spent` decimal(10,2) DEFAULT 0.00,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_uindex` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
--
-- Ограничения за дъмпнати таблици
--

--
-- Ограничения за таблица `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `fk_offersRents_users` FOREIGN KEY (`rented_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_offers_rooms` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`),
  ADD CONSTRAINT `fk_offers_towns` FOREIGN KEY (`town_id`) REFERENCES `towns` (`id`),
  ADD CONSTRAINT `fk_offers_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
