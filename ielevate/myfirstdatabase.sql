-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 10, 2025 at 07:55 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `users_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `username`, `comment_text`, `created_at`, `users_id`) VALUES
(42, 'Susu', '\"Bra jobbat Adam! Det syns verkligen att du har lagt ner mycket arbete på detta. Fortsätt kämpa, du är på rätt väg!\"', '2025-05-10 15:54:44', NULL),
(43, 'Susu', '\"Starkt fokus på att hålla dig motiverad, Adam! Du gör verkligen framsteg, och det här ger resultat. Håll i gång och fortsätt utvecklas!\"', '2025-05-10 15:55:00', NULL),
(44, 'Daniel', '\"Bra jobbat Susu! Du gör verkligen framsteg och det är fantastiskt att se hur du hela tiden utvecklas. Fortsätt hålla uppe den goda energin!\"', '2025-05-10 15:59:26', NULL),
(45, 'Daniel', 'Wow Susu, det känns som du verkligen har tagit din motivation till en helt ny nivå. Hoppas du fortsätter att sätta nya mål och utmana dig själv!', '2025-05-10 15:59:37', NULL),
(46, 'Adam', 'Imponerande Daniel, du har verkligen tagit tag i dina mål! Ser fram emot att följa dina framsteg och hur du fortsätter att utmana dig själv.', '2025-05-10 16:00:55', NULL),
(47, 'Adam', 'Bra jobbat med din senaste prestation, Daniel! Ditt engagemang och hårda arbete gör verkligen skillnad. Fortsätt så här, du är på väg mot stora framgångar!', '2025-05-10 16:01:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `goals`
--

CREATE TABLE `goals` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `username` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `goals`
--

INSERT INTO `goals` (`id`, `content`, `created_at`, `username`) VALUES
(17, '\"Mitt mål den här veckan är att fokusera på att skapa en bättre balans mellan mina studier och min fritid. Jag ska hitta sätt att både ha kul och vara produktiv samtidigt.\"', '2025-05-10 15:55:11', 'Susu'),
(18, '\"Långsiktigt vill jag bli bättre på att hantera min tid och prioritera mina mål. Jag har bestämt mig för att vara mer medveten om mina val och skapa hållbara vanor.\"', '2025-05-10 15:55:19', 'Susu'),
(19, '\"Mål för denna månad: Att lära mig en ny färdighet varje vecka. Jag ska fokusera på att utveckla mina tekniska kunskaper och hålla mig uppdaterad med de senaste trenderna.\"', '2025-05-10 15:59:04', 'Daniel'),
(20, '\"Jag ska också bli mer konsekvent med träningen och sätta upp tydliga delmål för att förbättra min fysiska hälsa. För att komma dit måste jag vara disciplinerad varje vecka.\"', '2025-05-10 15:59:11', 'Daniel');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT curtime(),
  `description` text DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `header_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `pwd`, `email`, `created_at`, `description`, `profile_image`, `header_image`) VALUES
(12, 'Sara', '$2y$12$Ri5IJFGWrfo5iEn4JU2YXe.WezEIX3nsdTqO9KZTnNABG9DynHymy', 'exmplsara@gmail.com', '2025-05-05 10:14:22', NULL, NULL, NULL),
(13, 'Adam', '$2y$12$TyZHqD6ymZlR0oZP.QwnMe8m8ogh3dWzI2RZesghTKbrKRve6EEFW', 'exampleadam@gmail.com', '2025-05-05 10:42:13', 'Hello', '681e9c6f60e017.97439690.jpg', NULL),
(16, 'Susu', '$2y$12$Ypb4i.qE1Ve1yuJwJvgyTusQS5uKAl0P3HOud938klvTOBOMtp9a6', 'examplesusu@gmail.com', '2025-05-05 22:37:27', 'Jag heter Susu. Min vän är Tennu.', '681f4d9237cb85.98257051.jpg', NULL),
(19, 'Assale', '$2y$12$JfMvhzgAVOui9BLh8Nq87.eZ/ZKMXIXPVSH5LXqyyc4dEXMW9c35a', 'assale@gmail.com', '2025-05-07 11:36:53', NULL, NULL, NULL),
(20, 'Tina', '$2y$12$5WpEKVIEdC7teuO7HSDvI.NncIyyn84TGl2Iud0lIp8k8XQaS3FXe', 'tina@gmail.com', '2025-05-07 12:37:10', NULL, NULL, NULL),
(21, 'Basse1', '$2y$12$YpQnCgbbvKb.GVsPaQnwLOet2QjBHpVMPFCsCax/phd1f9UgvqmQC', 'basse@gmail.com', '2025-05-08 00:19:56', NULL, NULL, NULL),
(22, 'Olivia', '$2y$12$P5qBIfpJTdYNRKyMBkS54.yrpZ7KkIN3DhgICBFnsPsZJKgrn8tK.', 'olivia@gmail.com', '2025-05-08 00:36:18', NULL, NULL, NULL),
(23, 'Malin', '$2y$12$w70JccSOZahqpp8RKSJWXeYw8a8GpoAqwVCJ9G73c4DOSAYOc8GlO', 'malin@example.se', '2025-05-09 15:03:52', NULL, NULL, NULL),
(24, 'Safa', '$2y$12$aZKdLKxOAlB1VZ5GHRnSaOs1AzFR1YCjc17XXh6gpprHUVUpmpRyW', 'safa@example.de', '2025-05-09 20:50:16', NULL, NULL, NULL),
(25, 'Daniel', '$2y$12$r7CsOEMmH6MN4sHoAqakCuTWxmDVBYRMBYZPw1ScHRFH1hR9nl8Yi', 'daniel@example.se', '2025-05-10 15:02:24', 'Hej, Jag är Daniel', '681f58cd20f555.63688190.jpg', NULL),
(26, 'Malin1', '$2y$12$eGxac1U8vP5iM7ND5qt07.iCwxSrIOA2a8CsPh4Pph.IXcGNnu/Pm', 'malin123@gmail.com', '2025-05-10 16:08:27', NULL, NULL, NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `goals`
--
ALTER TABLE `goals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
