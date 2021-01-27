-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 27 Sty 2021, 16:35
-- Wersja serwera: 10.4.17-MariaDB
-- Wersja PHP: 7.3.26

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
-- Struktura tabeli dla tabeli `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `owner` text COLLATE utf8_polish_ci NOT NULL,
  `data` date NOT NULL,
  `type` text COLLATE utf8_polish_ci NOT NULL,
  `survey` text COLLATE utf8_polish_ci NOT NULL,
  `photo` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `posts`
--

INSERT INTO `posts` (`id`, `owner`, `data`, `type`, `survey`, `photo`) VALUES
(31, 'adam', '2021-01-25', 'Płytkarz', 'test test test', 'uploads/15.jpg'),
(32, 'adam', '2021-01-25', 'Cieśla', 'test test test test test test', 'uploads/1.jpg'),
(33, 'adam', '2021-01-25', 'Murarz', 'test test testtest test testtest test testtest test test', 'uploads/8.jpg'),
(34, 'adam', '2021-01-25', 'Tynkarz', 'test test test test test test test test test test test test', 'uploads/18.jpg'),
(35, 'eryk', '2021-01-27', 'Tynkarz', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vitae urna sit amet purus vestibulum cursus. Nulla semper, neque eget pulvinar lacinia, libero magna condimentum est, in aliquam diam diam ac risus. Donec sodales id enim eu commodo. Donec egestas purus at viverra scelerisque. Aliquam sit amet consectetur metus. Etiam ante ex, hendrerit ut tristique vitae, aliquet vel sapien. Ut sed velit eu dolor posuere gravida. Aenean ut egestas eros. Sed interdum non tortor vel pulvinar. Aenean eleifend est quis purus mollis congue. Aenean a accumsan ante.', 'uploads/17.jpg'),
(36, 'eryk', '2021-01-27', 'Płytkarz', 'Duis ullamcorper scelerisque sagittis. Curabitur risus lorem, luctus volutpat ullamcorper vel, porta at dolor. Phasellus ultricies sagittis eros, sit amet eleifend nibh rutrum a. Nulla finibus tellus a quam dignissim, at tincidunt mauris ultrices. Fusce varius aliquam erat nec viverra. Donec sit amet mi urna. Fusce et neque tempor, tincidunt nibh et, euismod erat. Morbi scelerisque ante vitae odio egestas finibus. Sed commodo blandit dui, ut mollis massa accumsan quis. Etiam consectetur euismod risus id iaculis. Fusce ex purus, facilisis et dignissim finibus, hendrerit non orci.', 'uploads/16.jpg');

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
(2, 'adam', 'adamadam', 'siema@gmail.com', 'adamadam'),
(4, 'maciekmaciek', 'maciek123', 'maciek@gmail.com', 'maciekmaciek');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT dla tabeli `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
