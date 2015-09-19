-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 19 2015 г., 19:56
-- Версия сервера: 5.5.41-log
-- Версия PHP: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `fit_shop`
--
CREATE DATABASE IF NOT EXISTS `fit_shop` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `fit_shop`;

-- --------------------------------------------------------

--
-- Структура таблицы `attributes`
--

CREATE TABLE IF NOT EXISTS `attributes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `attribute_name` varchar(255) NOT NULL,
  `attribute_key` varchar(255) NOT NULL,
  `attribute_type` varchar(30) NOT NULL,
  `required` tinyint(4) NOT NULL,
  `special` tinyint(4) NOT NULL,
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `attribute_datetime_values`
--

CREATE TABLE IF NOT EXISTS `attribute_datetime_values` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `attribute_id` bigint(20) unsigned NOT NULL,
  `attribute_value` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `attribute_decimal_values`
--

CREATE TABLE IF NOT EXISTS `attribute_decimal_values` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `attribute_id` bigint(20) unsigned NOT NULL,
  `attribute_value` decimal(11,4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `attribute_groups`
--

CREATE TABLE IF NOT EXISTS `attribute_groups` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `group_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `attribute_int_values`
--

CREATE TABLE IF NOT EXISTS `attribute_int_values` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `attribute_id` bigint(20) unsigned NOT NULL,
  `attribute_value` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `attribute_sets`
--

CREATE TABLE IF NOT EXISTS `attribute_sets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `attribute_set_name` varchar(255) NOT NULL,
  `attribute_set_key` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `attribute_sets_attributes_relations`
--

CREATE TABLE IF NOT EXISTS `attribute_sets_attributes_relations` (
  `attribute_id` bigint(20) unsigned NOT NULL,
  `attribute_set_id` bigint(20) unsigned NOT NULL,
  `attribute_group_id` bigint(20) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `attribute_text_values`
--

CREATE TABLE IF NOT EXISTS `attribute_text_values` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `attribute_id` bigint(20) unsigned NOT NULL,
  `attribute_value` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `attribute_varchar_values`
--

CREATE TABLE IF NOT EXISTS `attribute_varchar_values` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `attribute_id` bigint(20) unsigned NOT NULL,
  `attribute_value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `backend_users`
--

CREATE TABLE IF NOT EXISTS `backend_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_group_id` bigint(20) unsigned NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_surname` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `backend_users`
--

INSERT INTO `backend_users` (`id`, `user_group_id`, `email`, `user_password`, `phone`, `user_name`, `user_surname`, `hash`, `create_date`) VALUES
(1, 1, 'admin', '297ff4a97fcda4bc0ecf0bb18168034a', '', 'Евгений', 'Новичков', '', '2015-08-07 11:04:00');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_key` varchar(255) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `parent` bigint(20) unsigned NOT NULL,
  `position` int(10) unsigned NOT NULL,
  `category_description` text NOT NULL,
  `meta_keywords` text NOT NULL,
  `meta_description` text NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `hidden` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `category_key`, `category_name`, `parent`, `position`, `category_description`, `meta_keywords`, `meta_description`, `page_title`, `active`, `hidden`) VALUES
(2, '', 'Жиросжигатели', 0, 1, '', '', '', '', 1, 0),
(5, '', 'Гейнеры', 0, 1, '', '', '', '', 0, 0),
(7, '', 'Протеины', 0, 0, '', '', '', '', 0, 0),
(8, '', 'Гейнеры', 0, 0, '', '', '', '', 0, 0),
(9, '', 'Сывороточные', 2, 0, '', '', '', '', 1, 0),
(14, '', 'Казеиновые', 19, 0, '', '', '', '', 1, 0),
(21, '', 'Название', 14, 0, '', '', '', '', 1, 0),
(17, '', 'Аминокислоты', 14, 1, '', '', '', '', 1, 0),
(19, '', 'Сывороточные', 0, 0, '', '', '', '', 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `categories_products_relations`
--

CREATE TABLE IF NOT EXISTS `categories_products_relations` (
  `category_id` bigint(20) unsigned NOT NULL,
  `product_id` bigint(20) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `finance_streams`
--

CREATE TABLE IF NOT EXISTS `finance_streams` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `stream_type` tinyint(4) NOT NULL,
  `type_id` bigint(20) unsigned NOT NULL,
  `stream_sum` decimal(11,2) NOT NULL,
  `custom_comment` text,
  `creator` bigint(20) NOT NULL,
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `finance_streams`
--

INSERT INTO `finance_streams` (`id`, `stream_type`, `type_id`, `stream_sum`, `custom_comment`, `creator`, `create_date`) VALUES
(6, 2, 7, '100.00', 'Домен fitstaff.ru', 1, '2015-09-04 16:02:55'),
(5, 1, 6, '100.00', 'Кравчук заложил первый камень', 1, '2015-09-04 16:01:44');

-- --------------------------------------------------------

--
-- Структура таблицы `finance_stream_types`
--

CREATE TABLE IF NOT EXISTS `finance_stream_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `stream_type` tinyint(4) NOT NULL,
  `type_name` varchar(255) NOT NULL,
  `type_comment` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `finance_stream_types`
--

INSERT INTO `finance_stream_types` (`id`, `stream_type`, `type_name`, `type_comment`) VALUES
(7, 2, 'Обслуживание сайта', 'Сервера, домены и т.д.'),
(6, 1, 'Капитал', 'Внешние Капиталовложения');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_key` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `active` tinyint(4) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keywords` text NOT NULL,
  `meta_description` text NOT NULL,
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `system_routes`
--

CREATE TABLE IF NOT EXISTS `system_routes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `project` varchar(255) NOT NULL,
  `route` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `position` int(11) NOT NULL,
  `hidden` tinyint(4) NOT NULL,
  `permitted` tinyint(4) NOT NULL,
  `extenal` tinyint(4) NOT NULL,
  `parent` bigint(20) unsigned NOT NULL,
  `icon` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Дамп данных таблицы `system_routes`
--

INSERT INTO `system_routes` (`id`, `project`, `route`, `title`, `position`, `hidden`, `permitted`, `extenal`, `parent`, `icon`) VALUES
(1, '', '', 'Главная', 1, 0, 0, 0, 0, 'fa fa-dashboard'),
(2, '', '', 'Сотрудники', 2, 0, 0, 0, 0, 'fa fa-user'),
(3, '', 'users', 'Сотрудники', 3, 0, 0, 0, 2, ''),
(4, '', 'users/add', 'Добавить Сотрудника', 4, 0, 0, 0, 2, ''),
(5, '', 'users/groups', 'Группы Пользователей', 5, 0, 0, 0, 2, ''),
(6, '', 'users/add_group', 'Добавить Группу', 6, 0, 0, 0, 2, ''),
(7, '', 'users/permissions', 'Доступы', 7, 0, 0, 0, 2, ''),
(11, '', '', 'Товары', 8, 0, 0, 0, 0, 'fa fa-shopping-cart'),
(12, '', 'products', 'Товары', 9, 0, 0, 0, 11, 'fa fa-shopping-cart'),
(13, '', 'products/add', 'Добавить Товаров', 10, 0, 0, 0, 11, 'fa fa-cart-plus'),
(14, '', 'products/categories', 'Категории Товаров', 11, 0, 0, 0, 11, 'fa fa-list-ul'),
(15, '', 'products/attributes', 'Аттрибуты', 12, 0, 0, 0, 11, 'fa fa-object'),
(16, '', 'settings', 'Settings', 13, 1, 0, 0, 0, ''),
(17, '', '', 'Финансы', 14, 0, 0, 0, 0, 'fa fa-usd'),
(18, '', 'finance/streams', 'Приход/Расход', 15, 0, 0, 0, 17, '');

-- --------------------------------------------------------

--
-- Структура таблицы `system_routes_user_groups_relations`
--

CREATE TABLE IF NOT EXISTS `system_routes_user_groups_relations` (
  `system_route_id` bigint(20) unsigned NOT NULL,
  `user_group_id` bigint(20) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `system_routes_user_groups_relations`
--

INSERT INTO `system_routes_user_groups_relations` (`system_route_id`, `user_group_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `user_groups`
--

CREATE TABLE IF NOT EXISTS `user_groups` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `group_name` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `user_groups`
--

INSERT INTO `user_groups` (`id`, `group_name`, `create_date`) VALUES
(1, 'Super Admin', '2015-08-07 11:04:00'),
(4, 'Покупатель', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
