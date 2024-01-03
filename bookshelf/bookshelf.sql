-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2024 at 11:16 AM
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
-- Database: `bookshelf`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(10) NOT NULL,
  `cover` blob NOT NULL,
  `judul` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `sinopsis` varchar(255) NOT NULL,
  `upload` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `cover`, `judul`, `kategori`, `sinopsis`, `upload`) VALUES
(101, 0x74657374696e672e6a7067, 'UWU', 'UWU', 'UWU', 0x746573742e706466),
(1234567, 0x636f7665722d6f7269672d323330362e6a7067, 'The Sign of the Four', 'Mystery', 'What could be more hopelessly prosaic and material? What is the use of having powers, doctor, when one has no field upon which to exert them? Crime is commonplace, existence is commonplace, and no qualities save those which are commonplace have any functi', 0x5468652d5369676e2d6f662d7468652d466f75722e706466),
(12345678, 0x383171516358386a686c532e5f534c313530305f2e6a7067, 'Lady Tangle wood', 'Fantasy', 'Nari knows the rumors about Arrowood. Forbidden magic. Illegal crossbreeding. Strange howls in the night. Should she go through with the wedding anyway?\r\n\r\nAs Nari rides toward Arrowood and her new home, her head is elsewhere. Soon, she will be marrying t', 0x4c6164792d54616e676c65776f6f642e706466),
(87654321, 0x636f7665722d6f7269672d31353433312e6a7067, 'Beauty and The beast', 'Romance', '&quot;Good-evening, old man. Good-evening, Beauty.&quot; The merchant was too terrified to reply, but Beauty answered sweetly: &quot;Good-evening, Beast.&quot; &quot;Have you come willingly?&quot; asked the Beast. &quot;Will you be content to sta', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`) VALUES
(2, 'Leonhard Dominikus Adiarsa Fernandez', '50421746@gmail.com', '$2y$10$yN9LrxAi86uowyTjmYMpH.p7sLbLyCdXmTJ1PAqzZ2LxV7VCpbMxu'),
(3, 'Leonhard Dominikus Adiarsa Fernandez', 'leonhard.d.a.f1010@gmail.com', '$2y$10$UmcOW2JJ8Kpa06K7.ZG1NujB1fzC2tHUUoUgQ8ulOp7sxnUR8ZnNG'),
(4, 'UWU', 'leonhard.gunadarma@gmail.com', '$2y$10$YiNT3UT83oUnNDrS2CCrjuXCzm129eh9mUSENG/qE9Pj5UKQIsiMy'),
(5, 'Leonhard Dominikus Adiarsa Fernandez', 'test@example.com', '$2y$10$3Ft3xGw8f5EYbDIVDOVj9OffmNhcEAC4GGmBqREpjKcCcD1NfxncO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
