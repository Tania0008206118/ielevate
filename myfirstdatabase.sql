-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 13, 2025 at 09:43 AM
-- Server version: 5.7.23-0ubuntu0.16.04.1
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myfirstdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `comment_text` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `users_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `username`, `comment_text`, `created_at`, `users_id`) VALUES
(42, 'Susu', 'Bra jobbat Adam!', '2025-05-10 15:54:44', NULL),
(43, 'Susu', 'Starkt fokus på att hålla dig motiverad, Adam!', '2025-05-10 15:55:00', NULL),
(44, 'Daniel', 'Bra jobbat Susu! Du gör verkligen framsteg och det är fantastiskt att se hur du hela tiden utvecklas.', '2025-05-10 15:59:26', NULL),
(45, 'Daniel', 'Wow Susu, det känns som du verkligen har tagit din motivation till en helt ny nivå.', '2025-05-10 15:59:37', NULL),
(46, 'Adam', 'Imponerande Daniel, du har verkligen tagit tag i dina mål!', '2025-05-10 16:00:55', NULL),
(47, 'Adam', 'Bra jobbat med din senaste prestation, Daniel!', '2025-05-10 16:01:15', NULL),
(48, 'Susu', 'Hej, hur mÃ¥r ni?', '2025-05-11 18:33:53', NULL),
(49, 'Daniel', 'det Ã¤r bra tack!', '2025-05-13 08:32:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `goals`
--

CREATE TABLE `goals` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `username` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `goals`
--

INSERT INTO `goals` (`id`, `content`, `created_at`, `username`) VALUES
(17, 'Mitt mål den här veckan är att fokusera på att skapa en bättre balans mellan mina studier och min fritid.', '2025-05-10 15:55:11', 'Susu'),
(18, 'Långsiktigt vill jag bli bättre på att hantera min tid och prioritera mina mål.', '2025-05-10 15:55:19', 'Susu'),
(21, 'Det hÃ¤r Ã¤r mitt fÃ¶rsta mÃ¥l. Jag vill gÃ¤rna kÃ¶pa en fitness-smartwatch!', '2025-05-11 18:33:33', 'Susu'),
(22, 'mitt fÃ¶rsta mÃ¥l', '2025-05-11 18:36:24', 'Susu'),
(23, 'hej', '2025-05-11 18:42:04', 'Susu'),
(24, 'hej', '2025-05-11 18:42:04', 'Susu'),
(25, 'hej', '2025-05-12 02:37:07', 'Daniel'),
(28, '123', '2025-05-12 02:44:08', 'Daniel'),
(30, 'hello', '2025-05-12 02:59:33', 'Daniel'),
(31, 'Hello', '2025-05-13 08:31:50', 'Daniel'),
(32, 'Hello', '2025-05-13 08:31:50', 'Daniel'),
(33, 'mitt fÃ¶rsta mÃ¥l', '2025-05-13 09:02:25', 'Maja'),
(34, 'mitt fÃ¶rsta mÃ¥l', '2025-05-13 09:02:25', 'Maja'),
(35, '1', '2025-05-13 09:09:01', 'Maja'),
(36, 'Hej!', '2025-05-13 09:14:25', 'David');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` text,
  `profile_image` varchar(255) DEFAULT NULL,
  `header_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `pwd`, `email`, `created_at`, `description`, `profile_image`, `header_image`) VALUES
(12, 'Sara', '$2y$12$Ri5IJFGWrfo5iEn4JU2YXe.WezEIX3nsdTqO9KZTnNABG9DynHymy', 'exmplsara@gmail.com', '2025-05-05 10:14:22', NULL, NULL, NULL),
(13, 'Adam', '$2y$12$TyZHqD6ymZlR0oZP.QwnMe8m8ogh3dWzI2RZesghTKbrKRve6EEFW', 'exampleadam@gmail.com', '2025-05-05 10:42:13', 'Hello', '681e9c6f60e017.97439690.jpg', NULL),
(16, 'Susu', '$2y$12$Ypb4i.qE1Ve1yuJwJvgyTusQS5uKAl0P3HOud938klvTOBOMtp9a6', 'examplesusu@gmail.com', '2025-05-05 22:37:27', 'Jag heter Susu', '6821189f321840.69503776.png', NULL),
(19, 'Assale', '$2y$12$JfMvhzgAVOui9BLh8Nq87.eZ/ZKMXIXPVSH5LXqyyc4dEXMW9c35a', 'assale@gmail.com', '2025-05-07 11:36:53', NULL, NULL, NULL),
(20, 'Tina', '$2y$12$5WpEKVIEdC7teuO7HSDvI.NncIyyn84TGl2Iud0lIp8k8XQaS3FXe', 'tina@gmail.com', '2025-05-07 12:37:10', NULL, NULL, NULL),
(21, 'Basse1', '$2y$12$YpQnCgbbvKb.GVsPaQnwLOet2QjBHpVMPFCsCax/phd1f9UgvqmQC', 'basse@gmail.com', '2025-05-08 00:19:56', NULL, NULL, NULL),
(22, 'Olivia', '$2y$12$P5qBIfpJTdYNRKyMBkS54.yrpZ7KkIN3DhgICBFnsPsZJKgrn8tK.', 'olivia@gmail.com', '2025-05-08 00:36:18', NULL, NULL, NULL),
(23, 'Malin', '$2y$12$w70JccSOZahqpp8RKSJWXeYw8a8GpoAqwVCJ9G73c4DOSAYOc8GlO', 'malin@example.se', '2025-05-09 15:03:52', NULL, NULL, NULL),
(24, 'Safa', '$2y$12$aZKdLKxOAlB1VZ5GHRnSaOs1AzFR1YCjc17XXh6gpprHUVUpmpRyW', 'safa@example.de', '2025-05-09 20:50:16', NULL, NULL, NULL),
(25, 'Daniel', '$2y$12$r7CsOEMmH6MN4sHoAqakCuTWxmDVBYRMBYZPw1ScHRFH1hR9nl8Yi', 'daniel@example.se', '2025-05-10 15:02:24', 'Hej, jag heter Daniel', '68211a0871b6e3.65925810.jpg', NULL),
(26, 'Malin1', '$2y$12$eGxac1U8vP5iM7ND5qt07.iCwxSrIOA2a8CsPh4Pph.IXcGNnu/Pm', 'malin123@gmail.com', '2025-05-10 16:08:27', NULL, NULL, NULL),
(27, 'luzie', '$2y$12$O.xAifZfBzd2G1XbL.zmi.AGrfNL2g55q/1o.25mVCVaGiIX8fER6', '123@gmail.com', '2025-05-10 15:41:24', NULL, NULL, NULL),
(28, 'malinski', '$2y$12$KbUjZH15sHnmzDv7U9PNTeHU1h6z5DaTRuHiWmCq8ivy3U7llzrhG', 'malinhoijer@hotmail.com', '2025-05-11 07:26:12', NULL, NULL, NULL),
(29, 'malinh', '$2y$12$a9OZMrHUIzb.ahsHysCL3u9nLybrUjoSXCgHSIBHRPwKh7y7AwVc6', 'rushevents.malin.hoijer@gmail.com', '2025-05-11 13:39:21', NULL, NULL, NULL),
(30, 'Alex', '$2y$12$fvq9RoUJAG.ofdciYwdpt.KZDmhPuANWsn9mckC5QWlBmLEatf2Zm', 'alex@gmail.com', '2025-05-11 14:31:45', NULL, NULL, NULL),
(31, 'rex', '$2y$12$2IYglE4M7A6Mo1ps2ygzU.3ZqQQsOrID53rklQ33jKWrPr7Emi3PS', 'rex@gmail.com', '2025-05-11 16:14:53', NULL, NULL, NULL),
(32, 'Schian', '$2y$12$wyYOKL57s6GvaSs6B38C6OipkDzkcZmBU5WRgyWH6566MVE7.BnvK', 'lals@gmail.com', '2025-05-12 03:38:06', NULL, NULL, NULL),
(34, 'Ahmed', '$2y$12$46jp94PJu2E.iVukRRSwP.bVOIgZHu2iK0wYia90.AgvjVXncTggG', 'safakhalil06101993@gmail.com', '2025-05-12 03:46:51', NULL, NULL, NULL),
(35, 'Dalia', '$2y$12$EzkPzgv/LBOLNHGdyoBnGulI5YNNW3/F8c2X6clMqGMiDDaSAJ9Bm', 'dalia@gmail.com', '2025-05-13 08:27:31', NULL, NULL, NULL),
(36, 'Daya', '$2y$12$kRRVVGraKAjG9etj5HisxeVHySfguKvMoQ.rfMmdQs7T3njhHk7XK', 'daya@gmail.com', '2025-05-13 08:31:18', NULL, NULL, NULL),
(37, 'malinlinnea', '$2y$12$lKGSMSD6kk5g0lqNGWc6GOztLud9pL57/5U9yYLRswlLmlIsMxCxO', 'HOEIJER_MALIN_LINNEA@STUDENT.SMC.EDU', '2025-05-13 08:33:40', NULL, NULL, NULL),
(38, 'Maja', '$2y$12$gISpmNeLoY76IAGi1bUTOejubG3vFAt4dqwlaj38j5yp9fqFI8g7S', 'maja@gmail.com', '2025-05-13 08:59:44', 'Jag heter Maja', '6823430c613a00.86551133.png', NULL),
(39, 'David', '$2y$12$NETrO2IQp4/k2zs3nZ7y8uk54qCDXTx1l/vxVIPKErouQJ0L0dune', 'david@gmail.com', '2025-05-13 09:12:25', 'Hej!', NULL, NULL),
(40, 'Tom', '$2y$12$RQgdR.XT86SQ4OHUYm2FC.ve7l.Zbu4aVC5wxlWUghvSkFuNTlp4i', 'tom@gmail.com', '2025-05-13 09:16:03', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `goals`
--
ALTER TABLE `goals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `goals`
--
ALTER TABLE `goals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
