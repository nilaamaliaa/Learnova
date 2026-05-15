-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2026 at 11:51 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learnnova`
--

-- --------------------------------------------------------

--
-- Table structure for table `hasil_quiz`
--

CREATE TABLE `hasil_quiz` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `kelas` varchar(10) DEFAULT NULL,
  `mapel` varchar(50) DEFAULT NULL,
  `bab_id` int(11) DEFAULT NULL,
  `skor` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `tugas` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `tanggal` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `task_name` varchar(255) DEFAULT NULL,
  `is_done` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `username`, `tugas`, `status`, `tanggal`, `user_id`, `task_name`, `is_done`) VALUES
(1, NULL, NULL, 0, NULL, 2, 'Baca materi Eksponen', 1),
(2, NULL, NULL, 0, NULL, 2, 'Kerjakan quiz Matematika', 1),
(3, NULL, NULL, 0, NULL, 2, 'Tonton video Gerak Lurus', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `score` int(11) DEFAULT 0,
  `last_login` date DEFAULT NULL,
  `streak` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `score`, `last_login`, `streak`) VALUES
(1, '', '$2y$10$v5ANBME5pzGqDMEQqOYB3uTj7RsOdvo.W8iALU2sJ.7g8UXWISYMm', 0, '2026-05-14', 1),
(2, 'n', '$2y$10$2e8x/u1K2lG9tXrvkxFnPer0eUFEGzkoRp5nntbSyj3cqMsBJUizq', 110, '2026-05-14', 1),
(3, 'cyloo', '$2y$10$IMLvpM0cjQYdLS/N9acY8.8NR9AhErLzi85E3FIH83KVhqPEOvCtC', 30, '2026-05-07', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hasil_quiz`
--
ALTER TABLE `hasil_quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
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
-- AUTO_INCREMENT for table `hasil_quiz`
--
ALTER TABLE `hasil_quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
