-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 22 2023 г., 11:47
-- Версия сервера: 8.0.24
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `help`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cakes`
--

CREATE TABLE `cakes` (
  `id_cake` int NOT NULL,
  `name_cake` varchar(100) NOT NULL,
  `topping` int NOT NULL,
  `size` int NOT NULL,
  `decoration` int NOT NULL,
  `price` decimal(18,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `decor`
--

CREATE TABLE `decor` (
  `id_dec` int NOT NULL,
  `name_dec` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `number_order`
--

CREATE TABLE `number_order` (
  `num_ord` int NOT NULL,
  `id` int NOT NULL,
  `id_cake` int NOT NULL,
  `summa` decimal(20,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `size`
--

CREATE TABLE `size` (
  `id_size` int NOT NULL,
  `size` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `topping`
--

CREATE TABLE `topping` (
  `id_top` int NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `phone` bigint NOT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cakes`
--
ALTER TABLE `cakes`
  ADD PRIMARY KEY (`id_cake`),
  ADD KEY `topping` (`topping`) USING BTREE,
  ADD KEY `size` (`size`),
  ADD KEY `decoration` (`decoration`);

--
-- Индексы таблицы `decor`
--
ALTER TABLE `decor`
  ADD PRIMARY KEY (`id_dec`);

--
-- Индексы таблицы `number_order`
--
ALTER TABLE `number_order`
  ADD PRIMARY KEY (`num_ord`),
  ADD KEY `id` (`id`),
  ADD KEY `fk.cake` (`id_cake`);

--
-- Индексы таблицы `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id_size`);

--
-- Индексы таблицы `topping`
--
ALTER TABLE `topping`
  ADD PRIMARY KEY (`id_top`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cakes`
--
ALTER TABLE `cakes`
  ADD CONSTRAINT `cakes_ibfk_1` FOREIGN KEY (`id_cake`) REFERENCES `number_order` (`id_cake`);

--
-- Ограничения внешнего ключа таблицы `decor`
--
ALTER TABLE `decor`
  ADD CONSTRAINT `decor_ibfk_1` FOREIGN KEY (`id_dec`) REFERENCES `cakes` (`decoration`);

--
-- Ограничения внешнего ключа таблицы `size`
--
ALTER TABLE `size`
  ADD CONSTRAINT `size_ibfk_1` FOREIGN KEY (`id_size`) REFERENCES `cakes` (`size`);

--
-- Ограничения внешнего ключа таблицы `topping`
--
ALTER TABLE `topping`
  ADD CONSTRAINT `topping_ibfk_1` FOREIGN KEY (`id_top`) REFERENCES `cakes` (`topping`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id`) REFERENCES `number_order` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
