-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Хост: MySQL-8.4:3306
-- Время создания: Сен 10 2026 г., 21:40
-- Версия сервера: 8.4.8
-- Версия PHP: 8.5.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `work_demo`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `text` text NOT NULL,
  `event` int NOT NULL,
  `user` int NOT NULL,
  `order_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='comments for ivents';

-- --------------------------------------------------------

--
-- Структура таблицы `events`
--

CREATE TABLE `events` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `place` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `place`, `date`) VALUES
(1, 'IT-конференция 2026', 'Конференция для разработчиков, дизайнеров и IT-специалистов. Доклады, мастер-классы и общение с экспертами.', 'Москва, Экспоцентр', '2026-09-25 10:00:00'),
(2, 'Молодёжный форум 2026', 'Образовательное мероприятие для молодых специалистов. Лекции, практические занятия и командная работа.', 'Санкт-Петербург, Ленэкспо', '2026-10-03 09:30:00'),
(3, 'Основы проектного управления', 'Практический семинар по планированию, организации и контролю проектов.', 'Екатеринбург, Конгресс-центр', '2026-10-12 11:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `event_id` int NOT NULL,
  `user_id` int NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pay_type` int NOT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `event_id`, `user_id`, `date`, `pay_type`, `status`) VALUES
(1, 2, 2, '2026-09-10 21:15:16', 1, 1),
(5, 3, 2, '2026-09-10 21:20:28', 3, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `order_status`
--

CREATE TABLE `order_status` (
  `id` int NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='status list for bid status';

--
-- Дамп данных таблицы `order_status`
--

INSERT INTO `order_status` (`id`, `status`) VALUES
(1, 'Новая'),
(2, 'На рассмотрении'),
(3, 'Одобрена'),
(4, 'Отклонена'),
(5, 'Отменена');

-- --------------------------------------------------------

--
-- Структура таблицы `pay_type`
--

CREATE TABLE `pay_type` (
  `id` int NOT NULL,
  `pay_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='pay types for bid';

--
-- Дамп данных таблицы `pay_type`
--

INSERT INTO `pay_type` (`id`, `pay_type`) VALUES
(1, 'Бесплатно'),
(2, 'Оплата картой'),
(3, 'Оплата на месте');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fio` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Table for user data';

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `fio`, `phone`, `email`, `role`) VALUES
(2, '1-Stg', '$2y$12$6BsSmHPISkFItAqlpI3pru3BwaL/6JLm848y54zZTHX3yF5kME68y', 'Кабаков Глеб Романович', '79045816855', 'g.kabakow@gmail.com', 1),
(3, 'gleb', '$2y$12$FCEl11OrFSER2kRYQhXR5.OEkXZ9Meo2J/bcbj/lmLMWdHX7nrcn6', 'Кабаков Глеб Романович', '71232312312', 'kabakov_glebochka@mail.ru', 2),
(4, 'Ivan228', '$2y$12$YlnFUglg1b4vyQxRLbyAxOyj.7NAk5vria.ChCVsEQGL6l9xG0ZTy', 'Иванов И', '73213123412', 'ivan@mail.ru', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `user_role`
--

CREATE TABLE `user_role` (
  `id` int NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='roles for users';

--
-- Дамп данных таблицы `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'user'),
(2, 'admin');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event` (`event`),
  ADD KEY `comments_ibfk_2` (`user`),
  ADD KEY `comments_ibfk_3` (`order_id`);

--
-- Индексы таблицы `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event` (`event_id`),
  ADD KEY `pay_type` (`pay_type`),
  ADD KEY `status` (`status`),
  ADD KEY `orders_ibfk_4` (`user_id`);

--
-- Индексы таблицы `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pay_type`
--
ALTER TABLE `pay_type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`);

--
-- Индексы таблицы `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `events`
--
ALTER TABLE `events`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `pay_type`
--
ALTER TABLE `pay_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`event`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`pay_type`) REFERENCES `pay_type` (`id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`status`) REFERENCES `order_status` (`id`),
  ADD CONSTRAINT `orders_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `user_role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
