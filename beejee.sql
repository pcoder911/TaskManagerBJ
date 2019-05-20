-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Трв 18 2019 р., 19:11
-- Версія сервера: 5.6.38
-- Версія PHP: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `beejee`
--

-- --------------------------------------------------------

--
-- Структура таблиці `task`
--

CREATE TABLE `task` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `task` text NOT NULL,
  `image` text NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `task`
--

INSERT INTO `task` (`id`, `status`, `task`, `image`, `name`, `email`) VALUES
(31, 0, 'Монстрики стерли некоторые числа в магическом квадрате.\r\nНужно заполнить пустые ячейки так, чтобы квадрат снова стал магическим.', '5ce026a24949c.jpg', 'Задача №1', 'wqwe@r.com'),
(32, 1, 'Профессор придумал магический квадрат, но из-за своей рассеянности не заполнил несколько клеток. Осталось заполнить всего 4 пропуска.', '5ce028a3a6e1f.jpg', 'Задача №2', 'phggh@r.com'),
(33, 1, 'Помоги Клапану узнать, какой из 2 квадратов магический.', '5ce028fe76971.jpg', 'Задача №2', 'www@r.com'),
(34, 0, 'Стань волшебником. Вставь в пустые клетки числа 5, 8, 9, 12, 13, 15 и сделай квадрат магическим.', '5ce0294e94848.jpg', 'Задача №4', 'fdhf@t.com'),
(35, 0, 'В пустые клетки квадрата вставь числа 2, 3, 4 и сделай квадрат магическим', '5ce02a02c183a.jpg', 'Задача №5', 'eretf@r.com');

-- --------------------------------------------------------

--
-- Структура таблиці `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `login` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `user`
--

INSERT INTO `user` (`id`, `login`, `password`) VALUES
(1, 'admin', '$2y$10$hyqEcZA0qdNHymQpVgokLej3NzaCXv1wcVsKs/Hw.wVF21Uei1J7S');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `task`
--
ALTER TABLE `task`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT для таблиці `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
