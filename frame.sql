-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 09 2023 г., 15:52
-- Версия сервера: 5.7.39
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `frame`
--

-- --------------------------------------------------------

--
-- Структура таблицы `calculation_results`
--

CREATE TABLE `calculation_results` (
  `result_id` int(11) NOT NULL,
  `shipment_id` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `error_message` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `calculation_results`
--

INSERT INTO `calculation_results` (`result_id`, `shipment_id`, `price`, `delivery_date`, `error_message`) VALUES
(1, 1, 60, '2023-09-14', NULL),
(2, 2, 270, '2023-09-11', NULL),
(3, 3, 60, '2023-09-14', NULL),
(4, 4, 270, '2023-09-11', NULL),
(5, 5, 60, '2023-09-14', NULL),
(6, 6, 270, '2023-09-11', NULL),
(7, 7, 60, '2023-09-14', NULL),
(8, 8, 270, '2023-09-11', NULL),
(9, 9, 60, '2023-09-14', NULL),
(10, 10, 270, '2023-09-11', NULL),
(11, 11, 60, '2023-09-14', NULL),
(12, 12, 270, '2023-09-11', NULL),
(13, 13, 60, '2023-09-14', NULL),
(14, 14, 270, '2023-09-11', NULL),
(15, 15, 60, '2023-09-14', NULL),
(16, 16, 270, '2023-09-11', NULL),
(17, 17, 60, '2023-09-14', NULL),
(18, 18, 270, '2023-09-11', NULL),
(19, 19, 60, '2023-09-14', NULL),
(20, 20, 270, '2023-09-11', NULL),
(21, 21, 60, '2023-09-14', NULL),
(22, 22, 270, '2023-09-11', NULL),
(23, 23, 60, '2023-09-14', NULL),
(24, 24, 270, '2023-09-11', NULL),
(25, 25, 60, '2023-09-14', NULL),
(26, 26, 270, '2023-09-11', NULL),
(27, 27, 60, '2023-09-14', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `base_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `period_fast` int(11) NOT NULL,
  `period_slow` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fast_base_price` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slow_base_price` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fast_per_kg_price` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `companies`
--

INSERT INTO `companies` (`id`, `name`, `base_url`, `period_fast`, `period_slow`, `fast_base_price`, `slow_base_price`, `fast_per_kg_price`) VALUES
(1, 'Mosk', 'test test', 2, '5', '150', '50', '10'),
(2, 'Test Copmany 2', 'test test', 2, '5', '140', '55', '15');

-- --------------------------------------------------------

--
-- Структура таблицы `shipments`
--

CREATE TABLE `shipments` (
  `shipment_id` int(11) NOT NULL,
  `source_kladr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target_kladr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `service_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `shipments`
--

INSERT INTO `shipments` (`shipment_id`, `source_kladr`, `target_kladr`, `weight`, `service_type`, `company_id`) VALUES
(1, 'Piter', 'Maskva', 12, 'slow', 1),
(2, 'Piter', 'Maskva', 12, 'fast', 1),
(3, 'Piter', 'Maskva', 12, 'slow', 1),
(4, 'Piter', 'Maskva', 12, 'fast', 1),
(5, 'Piter', 'Maskva', 12, 'slow', 1),
(6, 'Piter', 'Maskva', 12, 'fast', 1),
(7, 'Piter', 'Maskva', 12, 'slow', 1),
(8, 'Piter', 'Maskva', 12, 'fast', 1),
(9, 'Piter', 'Maskva', 12, 'slow', 1),
(10, 'Piter', 'Maskva', 12, 'fast', 1),
(11, 'Piter', 'Maskva', 12, 'slow', 1),
(12, 'Piter', 'Maskva', 12, 'fast', 1),
(13, 'Piter', 'Maskva', 12, 'slow', 1),
(14, 'Piter', 'Maskva', 12, 'fast', 1),
(15, 'Piter', 'Maskva', 12, 'slow', 1),
(16, 'Piter', 'Maskva', 12, 'fast', 1),
(17, 'Piter', 'Maskva', 12, 'slow', 1),
(18, 'Piter', 'Maskva', 12, 'fast', 1),
(19, 'Piter', 'Maskva', 12, 'slow', 1),
(20, 'Piter', 'Maskva', 12, 'fast', 1),
(21, 'Piter', 'Maskva', 12, 'slow', 1),
(22, 'Piter', 'Maskva', 12, 'fast', 1),
(23, 'Piter', 'Maskva', 12, 'slow', 1),
(24, 'Piter', 'Maskva', 12, 'fast', 1),
(25, 'Piter', 'Maskva', 12, 'slow', 1),
(26, 'Piter', 'Maskva', 12, 'fast', 1),
(27, 'Piter', 'Maskva', 12, 'slow', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `calculation_results`
--
ALTER TABLE `calculation_results`
  ADD PRIMARY KEY (`result_id`),
  ADD KEY `shipment_id` (`shipment_id`);

--
-- Индексы таблицы `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `shipments`
--
ALTER TABLE `shipments`
  ADD PRIMARY KEY (`shipment_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `calculation_results`
--
ALTER TABLE `calculation_results`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `shipments`
--
ALTER TABLE `shipments`
  MODIFY `shipment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `calculation_results`
--
ALTER TABLE `calculation_results`
  ADD CONSTRAINT `calculation_results_ibfk_1` FOREIGN KEY (`shipment_id`) REFERENCES `shipments` (`shipment_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
