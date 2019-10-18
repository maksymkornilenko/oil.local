-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 18 2019 г., 18:57
-- Версия сервера: 5.6.41
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `oil_maldive_dreams`
--

-- --------------------------------------------------------

--
-- Структура таблицы `callback`
--

CREATE TABLE `callback` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `formatted_phone` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `formatted_phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`id`, `name`, `email`, `phone`, `formatted_phone`) VALUES
(1, 'CEO FN LN', 'jupukah@topikt.com', '+38(000)000-00-00', '380000000000');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `sum` float NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `area` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `warehouse` varchar(255) NOT NULL,
  `pay` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `created_at`, `updated_at`, `count`, `sum`, `client_id`, `area`, `city`, `warehouse`, `pay`, `status`) VALUES
(1, 1571390703, 1571390703, 23, 6877, 1, '123', '321', '32435345', 'cash', 0),
(2, 1571390781, 1571390781, 14, 4186, 1, 'gdfhfghfgjhfg', 'Legal City', 'htfgyeryrtyurt', 'cash', 0),
(3, 1571390781, 1571390781, 14, 4186, 1, 'gdfhfghfgjhfg', 'Legal City', 'htfgyeryrtyurt', 'cash', 0),
(4, 1571390812, 1571390812, 15, 4485, 1, 'gdfhfghfgjhfg', 'Legal City', 'htfgyeryrtyurt', 'cash', 0),
(5, 1571390812, 1571390812, 15, 4485, 1, 'gdfhfghfgjhfg', 'Legal City', 'htfgyeryrtyurt', 'cash', 0),
(6, 1571390850, 1571390850, 1, 299, 1, 'gdfhfghfgjhfg', 'Legal City', 'htfgyeryrtyurt', 'cash', 0),
(7, 1571390850, 1571390850, 1, 299, 1, 'gdfhfghfgjhfg', 'Legal City', 'htfgyeryrtyurt', 'cash', 0),
(8, 1571398563, 1571398563, 2, 598, 1, 'gdfhfghfgjhfg', 'Legal City', 'htfgyeryrtyurt', 'cash', 0),
(9, 1571398563, 1571398563, 2, 598, 1, 'gdfhfghfgjhfg', 'Legal City', 'htfgyeryrtyurt', 'cash', 0),
(10, 1571403933, 1571403933, 4, 1196, 1, 'gdfhfghfgjhfg', 'Legal City', 'htfgyeryrtyurt', 'cash', 0),
(11, 1571403933, 1571403933, 4, 1196, 1, 'gdfhfghfgjhfg', 'Legal City', 'htfgyeryrtyurt', 'cash', 0),
(12, 1571411843, 1571411843, 8, 136, 1, 'Австрия', 'Legal City', 'Legal Address', 'cash', 0),
(13, 1571411843, 1571411843, 0, 0, 1, 'Австрия', 'Legal City', 'Legal Address', 'cash', 0),
(14, 1571412583, 1571412583, 11, 187, 1, 'Австрия', 'Legal City', 'Legal Address', 'cash', 0),
(15, 1571412583, 1571412583, 11, 187, 1, 'Австрия', 'Legal City', 'Legal Address', 'cash', 0),
(16, 1571412616, 1571412616, 4, 68, 1, 'Австрия', 'Legal City', 'Legal Address', 'cash', 0),
(17, 1571414001, 1571414001, 34, 578, 1, 'Австрия', 'Legal City', 'Legal Address', 'cash', 0),
(18, 1571414001, 1571414001, 34, 578, 1, 'Австрия', 'Legal City', 'Legal Address', 'cash', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `order_items`
--

CREATE TABLE `order_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `count_item` int(11) NOT NULL,
  `sum_item` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `name`, `price`, `count_item`, `sum_item`) VALUES
(1, 1, 1, 'Косметическое кокосовое масло Maldives Dreams', 100, 23, 6877),
(2, 2, 1, 'Косметическое кокосовое масло Maldives Dreams', 100, 14, 4186),
(3, 3, 1, 'Косметическое кокосовое масло Maldives Dreams', 100, 14, 4186),
(4, 4, 1, 'Косметическое кокосовое масло Maldives Dreams', 100, 15, 4485),
(5, 5, 1, 'Косметическое кокосовое масло Maldives Dreams', 100, 15, 4485),
(6, 6, 1, 'Косметическое кокосовое масло Maldives Dreams', 299, 1, 299),
(7, 7, 1, 'Косметическое кокосовое масло Maldives Dreams', 299, 1, 299),
(8, 14, 1, 'Косметическое кокосовое масло Maldives Dreams', 100, 11, 187),
(9, 15, 1, 'Косметическое кокосовое масло Maldives Dreams', 100, 11, 187),
(10, 17, 1, 'Косметическое кокосовое масло Maldives Dreams', 100, 34, 578),
(11, 18, 1, 'Косметическое кокосовое масло Maldives Dreams', 100, 34, 578);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `price`) VALUES
(1, 'Косметическое кокосовое масло Maldives Dreams', 299);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `callback`
--
ALTER TABLE `callback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `formatted_phone` (`formatted_phone`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`);

--
-- Индексы таблицы `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `callback`
--
ALTER TABLE `callback`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
