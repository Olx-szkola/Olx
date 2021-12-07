-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 07 Gru 2021, 16:37
-- Wersja serwera: 10.4.17-MariaDB
-- Wersja PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `olx`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `comments`
--

CREATE TABLE `comments` (
  `id_comments` int(11) NOT NULL,
  `email` text NOT NULL,
  `text` text NOT NULL,
  `id_post` int(11) NOT NULL,
  `data` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `comments`
--

INSERT INTO `comments` (`id_comments`, `email`, `text`, `id_post`, `data`) VALUES
(1, 'romet2157@gmail.com', 'hgfhgfhgfghfh', 51, '2021-12-06 00:00:00'),
(2, 'jhgjhg@hhh.com', 'hgjhg', 51, '2021-12-06 00:00:00'),
(3, 'romet2157@gmail.com', 'jkhkjhjk', 51, '2021-12-06 16:12:29'),
(4, 'aagraham99@gmail.com', 'dddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', 51, '2021-12-06 16:29:05'),
(5, 'aagraham69@gmail.com', 'fggfgfh', 51, '2021-12-06 17:07:59'),
(6, 'aagraham99@gmail.com', 'hgfhgfhg', 51, '2021-12-06 17:08:27'),
(7, 'przemek.jasinsky@gmail.com', 'fgdfdgfd', 51, '2021-12-06 17:13:25'),
(8, 'przemek.jasinsky@gmail.com', 'fgdfdgfd', 51, '2021-12-06 17:14:15'),
(9, 'przemek.jasinsky@gmail.com', 'fgdfdgfd', 51, '2021-12-06 17:24:45'),
(10, 'przemek.jasinsky@gmail.com', 'fgdfdgfd', 51, '2021-12-06 17:26:26'),
(11, 'przemek.jasinsky@gmail.com', 'fgdfdgfd', 51, '2021-12-06 17:27:30'),
(12, 'aagraham69@gmail.com', 'fdgfd', 51, '2021-12-06 17:39:19'),
(13, 'aagraham69@gmail.com', 'fdgfd', 51, '2021-12-06 17:40:13'),
(14, 'aagraham1@gmail.com', 'fdgfd', 51, '2021-12-06 17:43:53'),
(15, 'romet2157@gmail.com', 'jhkjkj', 51, '2021-12-06 17:44:06');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `owner` text COLLATE utf8_polish_ci NOT NULL,
  `data` date NOT NULL,
  `type` text COLLATE utf8_polish_ci NOT NULL,
  `survey` text COLLATE utf8_polish_ci NOT NULL,
  `photo` text COLLATE utf8_polish_ci NOT NULL,
  `title` text COLLATE utf8_polish_ci NOT NULL,
  `od` int(11) NOT NULL,
  `do` int(11) NOT NULL,
  `url` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `posts`
--

INSERT INTO `posts` (`id`, `owner`, `data`, `type`, `survey`, `photo`, `title`, `od`, `do`, `url`) VALUES
(18, 'adam', '2020-12-08', 'Murarz', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborumLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborumLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborumLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborumLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'uploads/7.jpg', 'Tytuł', 0, 0, ''),
(19, 'eryk', '2020-12-08', 'Murarz', 'Lorem', 'uploads/6.jpg', 'Tytuł', 0, 0, ''),
(20, 'adam', '2021-01-14', 'Tynkarz', 'dfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfdfsfdsfdssfdsdfsfdsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfddfsfdsfdssdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfddfsfdsfdssdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfdfsfdsfdssfdsdfsfdsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfddfsfdsfdssdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfddfsfdsfdssdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfdfsfdsfdssfdsdfsfdsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfddfsfdsfdssdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfddfsfdsfdssdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfdfsfdsfdssfdsdfsfdsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfddfsfdsfdssdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfddfsfdsfdssdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfdfsfdsfdssfdsdfsfdsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfddfsfdsfdssdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfddfsfdsfdssdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfdfsfdsfdssfdsdfsfdsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfddfsfdsfdssdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfddfsfdsfdssdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfdfsfdsfdssfdsdfsfdsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfddfsfdsfdssdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfddfsfdsfdssdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfdfsfdsfdssfdsdfsfdsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfddfsfdsfdssdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfddfsfdsfdssdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfdfsfdsfdssfdsdfsfdsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfddfsfdsfdssdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfddfsfdsfdssdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfdfsfdsfdssfdsdfsfdsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfddfsfdsfdssdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfddfsfdsfdssdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfdfsfdsfdssfdsdfsfdsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfddfsfdsfdssdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfddfsfdsfdssdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfdfsfdsfdssfdsdfsfdsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfddfsfdsfdssdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfddfsfdsfdssdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfds', 'uploads/00092WX3VIVX087A-C122-F4.jpg', 'Tytuł', 0, 0, ''),
(21, 'adam', '2021-01-21', 'Murarz', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'uploads/2.jpg', 'Tytuł', 0, 0, ''),
(22, 'adam', '2021-04-14', 'Murarz', 'kjhgjhgjhghjgjh', 'uploads/173168250_787987258812337_9087306658767515305_n.jpg', 'Tytuł', 0, 0, ''),
(23, 'adam', '2021-04-14', 'Murarz', 'hjgjhgjhgjhgjhgjhg', 'uploads/173168250_787987258812337_9087306658767515305_n.jpg', 'Tytuł', 0, 0, ''),
(24, 'adam', '2021-04-14', 'Murarz', 'uytuytuytuytuyt', 'uploads/173168250_787987258812337_9087306658767515305_n.jpg', 'Tytuł', 0, 0, ''),
(25, 'adam', '2021-04-14', 'Murarz', 'uytutuytuytuyt', 'uploads/173168250_787987258812337_9087306658767515305_n.jpg', 'Tytuł', 0, 0, ''),
(26, 'adam', '2021-04-14', 'Murarz', 'uytuytuytuytuytyut', 'uploads/173168250_787987258812337_9087306658767515305_n.jpg', 'Tytuł', 0, 0, ''),
(27, 'adam', '2021-04-14', 'Murarz', 'uytttttttttttttttttyyyyyytuytuytuytuyt', 'uploads/173168250_787987258812337_9087306658767515305_n.jpg', 'Tytuł', 0, 0, ''),
(28, 'adam', '2021-04-14', 'Tynkarz', 'uytuytyutuytuy', 'uploads/', 'Tytuł', 0, 0, ''),
(29, 'adam', '2021-04-14', 'Murarz', 'uytuytuyt', 'uploads/173168250_787987258812337_9087306658767515305_n.jpg', 'Tytuł', 0, 0, ''),
(30, 'adam', '2021-04-14', 'Murarz', 'uytuytuytuytuy', 'uploads/173168250_787987258812337_9087306658767515305_n.jpg', 'Tytuł', 0, 0, ''),
(31, 'adam', '2021-04-14', 'Cieśla', 'gfdgdgdgfdgfdg', 'uploads/173168250_787987258812337_9087306658767515305_n.jpg', 'Tytuł', 0, 0, ''),
(32, 'adam', '2021-04-14', 'Tynkarz', 'rtdrtdrtdrtd', 'uploads/173168250_787987258812337_9087306658767515305_n.jpg', 'Tytuł', 0, 0, ''),
(34, 'adam', '2021-06-09', 'Murarz', 'gfhhgf', 'uploads/180525362_369751317750045_5171649917825867610_n.jpg', 'P4men', 40, 50, ''),
(51, 'adam', '2021-06-11', 'Płytkarz', 'jgfhgfhgfhgfghfhgfhgfhfhfhgfhgf', 'uploads/193306919_1949323875216703_2009371246656594439_n.jpg', 'Piękny tytuł sam zobacz', 55, 55555, ''),
(52, 'adam', '2021-06-11', 'Murarz', 'gfhgfhgfhgfgh', 'uploads/193306919_1949323875216703_2009371246656594439_n.jpg', 'gfhgfhgfhgf', 66, 6666, 'siema-kurde-mnol');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rating_info`
--

CREATE TABLE `rating_info` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating_action` varchar(20) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` text COLLATE utf8_polish_ci NOT NULL,
  `haslo` text COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL,
  `admin` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `login`, `haslo`, `email`, `admin`) VALUES
(1, 'eryk', 'erykeryk', 'eryk@gmail.com', 'erykeryk'),
(2, 'adam', 'adamadam', 'adam@gmail.com', 'adamadam'),
(4, 'Krzysiek', 'yesyesyes123', 'aagraham1@gmail.com665', 'yesyesyes123'),
(5, 'adamadam', 'adamadam', 'adam@a2dam.com', 'adamadam');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comments`),
  ADD KEY `id_post` (`id_post`);

--
-- Indeksy dla tabeli `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `rating_info`
--
ALTER TABLE `rating_info`
  ADD UNIQUE KEY `post_id` (`post_id`,`user_id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comments` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT dla tabeli `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_post`) REFERENCES `posts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
