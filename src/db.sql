-- phpMyAdmin SQL Dump
-- Время создания: Ноя 11 2024 г., 20:30
-- Версия сервера: 8.2.0
-- Версия PHP: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `event` (
     `id` int UNSIGNED NOT NULL,
     `space` int UNSIGNED NOT NULL DEFAULT '0',
     `start` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
     `duration` int UNSIGNED DEFAULT '0',
     `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
     `created_at` datetime NOT NULL,
     `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `space` (
     `id` int UNSIGNED NOT NULL,
     `venue` int UNSIGNED DEFAULT '0',
     `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
     `created_at` datetime NOT NULL,
     `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `venue` (
     `id` int UNSIGNED NOT NULL,
     `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
     `created_at` datetime NOT NULL,
     `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Индексы сохранённых таблиц
--

ALTER TABLE `event`
    ADD PRIMARY KEY (`id`);

ALTER TABLE `space`
    ADD PRIMARY KEY (`id`);

ALTER TABLE `venue`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

ALTER TABLE `event`
    MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `space`
    MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `venue`
    MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
