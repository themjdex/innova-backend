-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 09 2022 г., 14:46
-- Версия сервера: 5.7.33
-- Версия PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `innova`
--

-- --------------------------------------------------------

--
-- Структура таблицы `valutes`
--

CREATE TABLE `valutes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `valute` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `char_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `valutes`
--

INSERT INTO `valutes` (`id`, `valute`, `char_code`, `num_code`, `nominal`) VALUES
(1, 'Австралийский доллар', 'AUD', '036', 1),
(2, 'Азербайджанский манат', 'AZN', '944', 1),
(3, 'Фунт стерлингов Соединенного королевства', 'GBP', '826', 1),
(4, 'Армянских драмов', 'AMD', '051', 100),
(5, 'Белорусский рубль', 'BYN', '933', 1),
(6, 'Болгарский лев', 'BGN', '975', 1),
(7, 'Бразильский реал', 'BRL', '986', 1),
(8, 'Венгерских форинтов', 'HUF', '348', 100),
(9, 'Гонконгских долларов', 'HKD', '344', 10),
(10, 'Датских крон', 'DKK', '208', 10),
(11, 'Доллар США', 'USD', '840', 1),
(12, 'Евро', 'EUR', '978', 1),
(13, 'Индийских рупий', 'INR', '356', 100),
(14, 'Казахстанских тенге', 'KZT', '398', 100),
(15, 'Канадский доллар', 'CAD', '124', 1),
(16, 'Киргизских сомов', 'KGS', '417', 100),
(17, 'Китайских юаней', 'CNY', '156', 10),
(18, 'Молдавских леев', 'MDL', '498', 10),
(19, 'Норвежских крон', 'NOK', '578', 10),
(20, 'Польский злотый', 'PLN', '985', 1),
(21, 'Румынский лей', 'RON', '946', 1),
(22, 'СДР (специальные права заимствования)', 'XDR', '960', 1),
(23, 'Сингапурский доллар', 'SGD', '702', 1),
(24, 'Таджикских сомони', 'TJS', '972', 10),
(25, 'Турецких лир', 'TRY', '949', 10),
(26, 'Новый туркменский манат', 'TMT', '934', 1),
(27, 'Узбекских сумов', 'UZS', '860', 10000),
(28, 'Украинских гривен', 'UAH', '980', 10),
(29, 'Чешских крон', 'CZK', '203', 10),
(30, 'Шведских крон', 'SEK', '752', 10),
(31, 'Швейцарский франк', 'CHF', '756', 1),
(32, 'Южноафриканских рэндов', 'ZAR', '710', 10),
(33, 'Вон Республики Корея', 'KRW', '410', 1000),
(34, 'Японских иен', 'JPY', '392', 100);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `valutes`
--
ALTER TABLE `valutes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `valutes_valute_unique` (`valute`),
  ADD UNIQUE KEY `valutes_char_code_unique` (`char_code`),
  ADD UNIQUE KEY `valutes_num_code_unique` (`num_code`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `valutes`
--
ALTER TABLE `valutes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
