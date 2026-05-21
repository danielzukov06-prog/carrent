-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Loomise aeg: Mai 19, 2026 kell 11:09 EL
-- Serveri versioon: 10.4.32-MariaDB
-- PHP versioon: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Andmebaas: `autorent2`
--

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `mark` varchar(100) DEFAULT NULL,
  `model` varchar(100) DEFAULT NULL,
  `engine` varchar(50) DEFAULT NULL,
  `fuel` varchar(50) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `transmission` varchar(50) DEFAULT NULL,
  `seats` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Andmete tõmmistamine tabelile `cars`
--

INSERT INTO `cars` (`id`, `mark`, `model`, `engine`, `fuel`, `price`, `image`, `year`, `transmission`, `seats`, `description`, `status`) VALUES
(1, 'BMW', '320d', '2.0', 'Diesel', 55.00, 'https://loremflickr.com/400/250/bmw', 2020, 'Manual', 5, NULL, 'vaba'),
(2, 'Audi', 'A4', '2.0', 'Petrol', 60.00, 'https://loremflickr.com/400/250/audi', 2020, 'Manual', 5, NULL, 'vaba'),
(3, 'VW', 'Golf', '1.6', 'Diesel', 45.00, 'https://loremflickr.com/400/250/vw', 2020, 'Manual', 5, NULL, 'vaba'),
(4, 'add', 'audi', 'v6', 'diesel', 21312.00, NULL, 1223, 'nah', 4, 'ref', 'ewr');

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Andmete tõmmistamine tabelile `reservations`
--

INSERT INTO `reservations` (`id`, `user_id`, `car_id`, `start_date`, `end_date`, `total_price`, `created_at`, `status`) VALUES
(3, 2, 1, '2026-05-06', '2026-05-22', 880.00, '2026-05-12 12:06:29', 'pending');

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Andmete tõmmistamine tabelile `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(2, 'admin', '1234'),
(3, 'dad', '$2y$10$BNklNDfuDSdqNRuUQ3hlj.QotCaVvr1TNxg60EdYw5dP452aFgFRm'),
(5, 'dad', '$2y$10$5mwAD92BDWX/.xRU0EK5BeLOItNODZwHTpHsQSnHPLuOERCKevIdi'),
(6, 'dad', '$2y$10$SgWgQhyErEwSenE5dQmfmujRBlyW4ORlBeqSIuZebTa4uUPRVTb5y');

--
-- Indeksid tõmmistatud tabelitele
--

--
-- Indeksid tabelile `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indeksid tabelile `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `car_id` (`car_id`);

--
-- Indeksid tabelile `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT tõmmistatud tabelitele
--

--
-- AUTO_INCREMENT tabelile `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT tabelile `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT tabelile `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tõmmistatud tabelite piirangud
--

--
-- Piirangud tabelile `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
