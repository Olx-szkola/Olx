-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 04 Sty 2022, 17:06
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
  `data` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `like` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `comments`
--

INSERT INTO `comments` (`id_comments`, `email`, `text`, `id_post`, `data`, `like`) VALUES
(34, 'eryko@gmail.com', 'test', 52, '2021-12-22 13:37:22', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `images`
--

CREATE TABLE `images` (
  `id_images` int(11) NOT NULL,
  `image` text COLLATE utf8mb4_polish_ci NOT NULL,
  `id_posts` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

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
  `url` text COLLATE utf8_polish_ci NOT NULL,
  `photos1` text COLLATE utf8_polish_ci NOT NULL,
  `photos2` text COLLATE utf8_polish_ci NOT NULL,
  `photos3` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `posts`
--

INSERT INTO `posts` (`id`, `owner`, `data`, `type`, `survey`, `photo`, `title`, `od`, `do`, `url`, `photos1`, `photos2`, `photos3`) VALUES
(18, 'adam', '2020-12-08', 'Murarz', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborumLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborumLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborumLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborumLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'uploads/7.jpg', 'Tytuł', 0, 0, '', '', '', ''),
(19, 'eryk', '2020-12-08', 'Murarz', 'Lorem', 'uploads/6.jpg', 'Tytuł', 0, 0, '', '', '', ''),
(20, 'adam', '2021-01-14', 'Tynkarz', 'dfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfdfsfdsfdssfdsdfsfdsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfddfsfdsfdssdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfddfsfdsfdssdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfdfsfdsfdssfdsdfsfdsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfddfsfdsfdssdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfddfsfdsfdssdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfdfsfdsfdssfdsdfsfdsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfddfsfdsfdssdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfddfsfdsfdssdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfdfsfdsfdssfdsdfsfdsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfddfsfdsfdssdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfddfsfdsfdssdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfdfsfdsfdssfdsdfsfdsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfddfsfdsfdssdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfddfsfdsfdssdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfdfsfdsfdssfdsdfsfdsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfddfsfdsfdssdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfddfsfdsfdssdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfdfsfdsfdssfdsdfsfdsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfddfsfdsfdssdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfddfsfdsfdssdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfdfsfdsfdssfdsdfsfdsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfddfsfdsfdssdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfddfsfdsfdssdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfdfsfdsfdssfdsdfsfdsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfddfsfdsfdssdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfddfsfdsfdssdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfdfsfdsfdssfdsdfsfdsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfddfsfdsfdssdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfddfsfdsfdssdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfdfsfdsfdssfdsdfsfdsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfddfsfdsfdssdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfddfsfdsfdssdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfdfsfdsfdssfdsdfsfdsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfddfsfdsfdssdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfddfsfdsfdssdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfdsdfsfdsfds', 'uploads/00092WX3VIVX087A-C122-F4.jpg', 'Tytuł', 0, 0, '', '', '', ''),
(21, 'adam', '2021-01-21', 'Murarz', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'uploads/2.jpg', 'Tytuł', 0, 0, '', '', '', ''),
(22, 'adam', '2021-04-14', 'Murarz', 'kjhgjhgjhghjgjh', 'uploads/173168250_787987258812337_9087306658767515305_n.jpg', 'Tytuł', 0, 0, '', '', '', ''),
(23, 'adam', '2021-04-14', 'Murarz', 'hjgjhgjhgjhgjhgjhg', 'uploads/173168250_787987258812337_9087306658767515305_n.jpg', 'Tytuł', 0, 0, '', '', '', ''),
(24, 'adam', '2021-04-14', 'Murarz', 'uytuytuytuytuyt', 'uploads/173168250_787987258812337_9087306658767515305_n.jpg', 'Tytuł', 0, 0, '', '', '', ''),
(25, 'adam', '2021-04-14', 'Murarz', 'uytutuytuytuyt', 'uploads/173168250_787987258812337_9087306658767515305_n.jpg', 'Tytuł', 0, 0, '', '', '', ''),
(26, 'adam', '2021-04-14', 'Murarz', 'uytuytuytuytuytyut', 'uploads/173168250_787987258812337_9087306658767515305_n.jpg', 'Tytuł', 0, 0, '', '', '', ''),
(27, 'adam', '2021-04-14', 'Murarz', 'uytttttttttttttttttyyyyyytuytuytuytuyt', 'uploads/173168250_787987258812337_9087306658767515305_n.jpg', 'Tytuł', 0, 0, '', '', '', ''),
(28, 'adam', '2021-04-14', 'Tynkarz', 'uytuytyutuytuy', 'uploads/', 'Tytuł', 0, 0, '', '', '', ''),
(29, 'adam', '2021-04-14', 'Murarz', 'uytuytuyt', 'uploads/173168250_787987258812337_9087306658767515305_n.jpg', 'Tytuł', 0, 0, '', '', '', ''),
(30, 'adam', '2021-04-14', 'Murarz', 'uytuytuytuytuy', 'uploads/173168250_787987258812337_9087306658767515305_n.jpg', 'Tytuł', 0, 0, '', '', '', ''),
(31, 'adam', '2021-04-14', 'Cieśla', 'gfdgdgdgfdgfdg', 'uploads/173168250_787987258812337_9087306658767515305_n.jpg', 'Tytuł', 0, 0, '', '', '', ''),
(32, 'adam', '2021-04-14', 'Tynkarz', 'rtdrtdrtdrtd', 'uploads/173168250_787987258812337_9087306658767515305_n.jpg', 'Tytuł', 0, 0, '', '', '', ''),
(34, 'adam', '2021-06-09', 'Murarz', 'gfhhgf', 'uploads/180525362_369751317750045_5171649917825867610_n.jpg', 'P4men', 40, 50, '', '', '', ''),
(52, 'adam', '2021-06-11', 'Murarz', 'gfhgfhgfhgfgh', 'uploads/193306919_1949323875216703_2009371246656594439_n.jpg', 'gfhgfhgfhgf', 66, 6666, 'siema-kurde-mnol', '', '', ''),
(64, 'eryk', '2021-12-14', 'Murarz', 'Jesteśmy grupą budowlaną, prężnie działającą w branży od przeszło 30 lat. Naszym atutem jest sprawna organizacja, doświadczenie wykwalifikowanej kadry pracowników i wysoka jakość realizowanych zadań. Korzystamy z najlepszych materiałów budowlanych, a dzięki wieloletniej współpracy z hurtowniami i dostawcami posiadamy na nie duże zniżki.\r\n\r\nSpecjalizujemy sie w:\r\n- generalnych remontach mieszkań\r\n- budowie domów jednorodzinnych i wielorodzinnych\r\n- termomodernizacjach budynków', 'uploads/test4.jpg', 'Kompleksowe usługi remontowo-budowlane ABIREX, remonty, budowa', 1000, 15000, 'Kompleksowe-us-ugi-remontowo-budowlane-ABIREX-remonty-budowa', 'uploads/test1.jpg', 'uploads/test2.jpg', 'uploads/test3.jpg'),
(66, 'eryk', '2022-01-03', 'Murarz', 'jhgjhgjhgjhgjhgjhgjhgjhg', 'uploads/Flag_of_Palestine.svg.png', 'hjgjhghjghjgjhgj', 77, 777, 'hjgjhghjghjgjhgj', '', '', '');

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
-- Struktura tabeli dla tabeli `storage`
--

CREATE TABLE `storage` (
  `id` int(11) NOT NULL,
  `owner` text COLLATE utf8_polish_ci NOT NULL,
  `data` date NOT NULL,
  `type` text COLLATE utf8_polish_ci NOT NULL,
  `survey` text COLLATE utf8_polish_ci NOT NULL,
  `photo` text COLLATE utf8_polish_ci NOT NULL,
  `title` text COLLATE utf8_polish_ci NOT NULL,
  `od` int(11) NOT NULL,
  `do` int(11) NOT NULL,
  `url` text COLLATE utf8_polish_ci NOT NULL,
  `photos1` text COLLATE utf8_polish_ci NOT NULL,
  `photos2` text COLLATE utf8_polish_ci NOT NULL,
  `photos3` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `storage`
--

INSERT INTO `storage` (`id`, `owner`, `data`, `type`, `survey`, `photo`, `title`, `od`, `do`, `url`, `photos1`, `photos2`, `photos3`) VALUES
(21, 'eryk', '2022-01-04', 'Murarz', 'gfd', 'uploads/0ecdf353f5b8c5d7e8bb7252c158.jpeg', 'fgdhgfdhgfd', 56, 564654, 'fgdhgfdhgfd', '', '', ''),
(22, 'eryk', '2022-01-04', 'Murarz', 'fgdgfdgfdg', 'uploads/', 'gfdgfdgfd', 55, 5555, 'gfdgfdgfd', '', '', ''),
(23, 'eryk', '2022-01-04', 'Murarz', 'fgdgfdgfgfd', 'uploads/0ecdf353f5b8c5d7e8bb7252c158.jpeg', 'gfdgfd', 55, 5555, 'gfdgfd', '', '', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` text COLLATE utf8_polish_ci NOT NULL,
  `haslo` text COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `login`, `haslo`, `email`, `admin`) VALUES
(1, 'eryk', 'erykeryk', 'eryk@gmail.com', 0),
(2, 'adam', 'adamadam', 'adam@gmail.com', 1),
(4, 'Krzysiek', 'yesyesyes123', 'aagraham1@gmail.com665', 0),
(5, 'adamadam', 'adamadam', 'adam@a2dam.com', 0);

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
-- Indeksy dla tabeli `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id_images`),
  ADD KEY `id_posts` (`id_posts`);

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
-- Indeksy dla tabeli `storage`
--
ALTER TABLE `storage`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id_comments` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT dla tabeli `images`
--
ALTER TABLE `images`
  MODIFY `id_images` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT dla tabeli `storage`
--
ALTER TABLE `storage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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

--
-- Ograniczenia dla tabeli `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `id_posts` FOREIGN KEY (`id_posts`) REFERENCES `posts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
