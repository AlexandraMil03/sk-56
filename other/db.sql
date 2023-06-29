-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 15 2019 г., 18:54
-- Версия сервера: 5.6.38
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `localhost`
--

-- --------------------------------------------------------

--
-- Структура таблицы `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `time` text NOT NULL,
  `brouser` text NOT NULL,
  `ip` text NOT NULL,
  `url_open` text NOT NULL,
  `url_ref` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE `settings` (
  `developer` text NOT NULL,
  `site_online` varchar(60) NOT NULL,
  `registration` text NOT NULL,
  `site_name` text NOT NULL,
  `title_plus` text NOT NULL,
  `keywords_plus` text NOT NULL,
  `url` text NOT NULL,
  `meta` text NOT NULL,
  `api_smsaero_login` text NOT NULL,
  `api_smsaero_password` text NOT NULL,
  `api_smsaero_from` text NOT NULL,
  `counter` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`developer`, `site_online`, `registration`, `site_name`, `title_plus`, `keywords_plus`, `url`, `meta`, `api_smsaero_login`, `api_smsaero_password`, `api_smsaero_from`, `counter`) VALUES
('1', '1', '0', 'Название сайта', 'Дополнительный заголовок', 'дополнительные, ключевые, слова', 'localhost', '&lt;meta name=&quot;theme-color&quot; content=&quot;#FFFFFF&quot;&gt;', 'taxzomer@icloud.com', 'xgOuGYEHdMe22OntMDqF20Lv3Y', 'STAVTOP.RU', '&lt;!-- счётчик --&gt;');

-- --------------------------------------------------------

--
-- Структура таблицы `temp_registration`
--

CREATE TABLE `temp_registration` (
  `id` int(11) NOT NULL,
  `time` text NOT NULL,
  `user_login` text NOT NULL,
  `user_code` text NOT NULL,
  `user_name` text NOT NULL,
  `user_patronymic` text NOT NULL,
  `user_surname` text NOT NULL,
  `user_sex` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_time_registration` text NOT NULL,
  `user_time_online` text NOT NULL,
  `user_login` text NOT NULL,
  `user_password` text NOT NULL,
  `user_name` text NOT NULL,
  `user_patronymic` text NOT NULL,
  `user_surname` text NOT NULL,
  `user_sex` text NOT NULL,
  `user_level_user` text NOT NULL,
  `user_level_moderation` text NOT NULL,
  `user_level_admin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `user_time_registration`, `user_time_online`, `user_login`, `user_password`, `user_name`, `user_patronymic`, `user_surname`, `user_sex`, `user_level_user`, `user_level_moderation`, `user_level_admin`) VALUES
(1, '1542535520', '1552665170', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Админ', 'Админович', 'Админов', 'man', '1', '1', '1');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`site_online`);

--
-- Индексы таблицы `temp_registration`
--
ALTER TABLE `temp_registration`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `temp_registration`
--
ALTER TABLE `temp_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
