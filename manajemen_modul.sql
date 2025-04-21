-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Apr 2025 pada 15.12
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manajemen_modul`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `instructors`
--

CREATE TABLE `instructors` (
  `id` int(11) NOT NULL,
  `majors_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `address` text NOT NULL,
  `phone` varchar(13) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `learning_moduls`
--

CREATE TABLE `learning_moduls` (
  `id` int(11) NOT NULL,
  `instructor_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `learning_modul_details`
--

CREATE TABLE `learning_modul_details` (
  `id` int(11) NOT NULL,
  `learning_modul_id` int(11) NOT NULL,
  `file_name` varchar(50) NOT NULL,
  `file` varchar(100) NOT NULL,
  `reference_link` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `majors`
--

CREATE TABLE `majors` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `majors`
--

INSERT INTO `majors` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'TEKNIK INFORMATIKA', 1, '2025-04-21 12:17:23', NULL),
(2, 'TEKNIK MESIN', 1, '2025-04-21 12:17:41', NULL),
(3, 'EKONOMI', 1, '2025-04-21 12:17:51', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `majors_detail`
--

CREATE TABLE `majors_detail` (
  `id` int(11) NOT NULL,
  `majors_id` int(11) NOT NULL,
  `instructor_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 1, '2025-04-21 09:47:54', '2025-04-21 09:59:27'),
(3, 'PIC', 1, '2025-04-21 09:59:38', '0000-00-00 00:00:00'),
(4, 'Instruktur', 1, '2025-04-21 09:59:50', '0000-00-00 00:00:00'),
(5, 'Siswa', 1, '2025-04-21 09:59:55', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `majors_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `date_of_birth` date NOT NULL,
  `place_of_birth` varchar(50) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'ADMIN PPKD', '  admin@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, '2025-04-21 10:17:04', NULL),
(2, 'PIC PPKD', '  pic@gmail.com', '95c732d9dbf4789ca20ad584b185f7e1266811b8', 1, '2025-04-21 10:18:29', '2025-04-21 11:20:46'),
(3, 'INSTRUKTUR', '  instruktur@gmail.com', '795a6fe8e1aef6a7f07786156a150e2be1553e5c', 1, '2025-04-21 10:18:53', '2025-04-21 11:20:48'),
(4, 'SISWA PPKD', '  siswa@gmail.com', '7a24156a1971d85acf2ae64d9dbdf5322566636f', 1, '2025-04-21 10:19:08', '2025-04-21 11:20:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2025-04-21 12:06:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `majors_id` (`majors_id`);

--
-- Indeks untuk tabel `learning_moduls`
--
ALTER TABLE `learning_moduls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `instructur_id` (`instructor_id`);

--
-- Indeks untuk tabel `learning_modul_details`
--
ALTER TABLE `learning_modul_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `learning_modul_id` (`learning_modul_id`);

--
-- Indeks untuk tabel `majors`
--
ALTER TABLE `majors`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `majors_detail`
--
ALTER TABLE `majors_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `instructor_id` (`instructor_id`),
  ADD KEY `majors_id` (`majors_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `students`
--
ALTER TABLE `students`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `majors_id` (`majors_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `instructors`
--
ALTER TABLE `instructors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `learning_moduls`
--
ALTER TABLE `learning_moduls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `learning_modul_details`
--
ALTER TABLE `learning_modul_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `majors`
--
ALTER TABLE `majors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `majors_detail`
--
ALTER TABLE `majors_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `instructors`
--
ALTER TABLE `instructors`
  ADD CONSTRAINT `instructors_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `instructors_ibfk_2` FOREIGN KEY (`majors_id`) REFERENCES `majors` (`id`);

--
-- Ketidakleluasaan untuk tabel `learning_moduls`
--
ALTER TABLE `learning_moduls`
  ADD CONSTRAINT `learning_moduls_ibfk_1` FOREIGN KEY (`instructor_id`) REFERENCES `instructors` (`id`);

--
-- Ketidakleluasaan untuk tabel `learning_modul_details`
--
ALTER TABLE `learning_modul_details`
  ADD CONSTRAINT `learning_modul_details_ibfk_1` FOREIGN KEY (`learning_modul_id`) REFERENCES `learning_moduls` (`id`);

--
-- Ketidakleluasaan untuk tabel `majors_detail`
--
ALTER TABLE `majors_detail`
  ADD CONSTRAINT `majors_detail_ibfk_1` FOREIGN KEY (`instructor_id`) REFERENCES `instructors` (`id`),
  ADD CONSTRAINT `majors_detail_ibfk_2` FOREIGN KEY (`majors_id`) REFERENCES `majors` (`id`);

--
-- Ketidakleluasaan untuk tabel `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`majors_id`) REFERENCES `majors` (`id`);

--
-- Ketidakleluasaan untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `user_role_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_role_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
