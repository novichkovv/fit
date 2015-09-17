CREATE DATABASE IF NOT EXISTS `fit_shop` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `fit_shop`;

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

INSERT INTO `system_routes` (`id`, `route`, `title`, `position`, `hidden`, `extenal`, `parent`, `icon`) VALUES
  (1, '', 'Главная', 1, 0, 0, 0, 'fa fa-dashboard'),
  (2, '', 'Сотрудники', 2, 0, 0, 0, 'fa fa-user'),
  (3, 'users', 'Сотрудники', 3, 0, 0, 2, ''),
  (4, 'users/add', 'Добавить Сотрудника', 4, 0, 0, 2, ''),
  (5, 'users/groups', 'Группы Пользователей', 5, 0, 0, 2, ''),
  (6, 'users/add_group', 'Добавить Группу', 6, 0, 0, 2, ''),
  (7, 'users/permissions', 'Доступы', 7, 0, 0, 2, '');

INSERT INTO `system_routes` (`route`, `title`, `position`, `hidden`) VALUES ('settings', 'Settings', '10', '1');

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
  (7, 1);

CREATE TABLE IF NOT EXISTS `user_groups` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `group_name` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `user_groups`
--

INSERT INTO `user_groups` (`id`, `group_name`, `create_date`) VALUES
  (1, 'Super Admin', '2015-08-07 11:04:00');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `user_group_id`, `email`, `user_password`, `phone`, `user_name`, `user_surname`, `hash`, `create_date`) VALUES
  (1, 1, 'admin', '4d32b723c8b58e1846a8e997c6ecdb63', '', 'Yevgeniy', 'Novichkov', '', '2015-08-07 11:04:00');

INSERT INTO `fit_shop`.`system_routes` (`route`, `title`, `position`, `icon`) VALUES ('', 'Товары', '8', 'fa fa-opencart');
INSERT INTO `fit_shop`.`system_routes` (`route`, `title`, `position`, `parent`, `icon`) VALUES ('products', 'Товары', '9', '8', 'fa fa-shopping-cart');
INSERT INTO `fit_shop`.`system_routes` (`route`, `title`, `parent`, `icon`) VALUES ('products/add', 'Добавить Товаров', '8', 'fa fa-cart-plus');
INSERT INTO `fit_shop`.`system_routes` (`route`, `title`, `parent`, `icon`) VALUES ('products/categories', 'Категории Товаров', '8', 'fa fa-list-ul');
INSERT INTO `fit_shop`.`system_routes` (`route`, `title`, `parent`, `icon`) VALUES ('products/attributes', 'Аттрибуты', '8', 'fa fa-object-group');

UPDATE `fit_shop`.`system_routes` SET `parent`='11' WHERE `id`='12';
UPDATE `fit_shop`.`system_routes` SET `parent`='11' WHERE `id`='13';
UPDATE `fit_shop`.`system_routes` SET `parent`='11' WHERE `id`='14';
UPDATE `fit_shop`.`system_routes` SET `parent`='11' WHERE `id`='15';
UPDATE `fit_shop`.`system_routes` SET `position`='10' WHERE `id`='13';
UPDATE `fit_shop`.`system_routes` SET `position`='11' WHERE `id`='14';
UPDATE `fit_shop`.`system_routes` SET `position`='12' WHERE `id`='15';

CREATE TABLE attributes (
  id SERIAL PRIMARY KEY,
  attribute_name VARCHAR (255) NOT NULL,
  attribute_key VARCHAR (255) NOT NULL,
  attribute_type TINYINT UNSIGNED NOT NULL,
  required TINYINT NOT NULL,
  special TINYINT NOT NULL,
  create_date DATETIME NOT NULL
)ENGINE=MyISAM;

CREATE TABLE attribute_sets (
  id SERIAL PRIMARY KEY,
  attribute_set_name VARCHAR (255) NOT NULL,
  attribute_set_key VARCHAR (255) NOT NULL,
  create_date DATETIME NOT NULL
)ENGINE=MyISAM;

CREATE TABLE attribute_sets_attributes_relations (
  attribute_id BIGINT UNSIGNED NOT NULL,
  attribute_set_id BIGINT UNSIGNED NOT NULL,
  attribute_group_id BIGINT UNSIGNED NOT NULL
)ENGINE=MyISAM;

CREATE TABLE attribute_groups (
  id SERIAL PRIMARY KEY,
  group_name VARCHAR (255) NOT NULL
)ENGINE=MyISAM;

CREATE TABLE attribute_types (
  id SERIAL PRIMARY KEY ,
  type VARCHAR(30) NOT NULL
)ENGINE=MyISAM;

CREATE TABLE finance_streams (
  id SERIAL PRIMARY KEY,
  stream_type TINYINT NOT NULL ,
  type_id BIGINT UNSIGNED NOT NULL ,
  stream_sum DECIMAL(11,2) NOT NULL,
  custom_comment TEXT NULL,
  creator BIGINT NOT NULL ,
  create_date DATETIME NOT NULL
)ENGINE=MyISAM;

CREATE TABLE finance_stream_types (
  id SERIAL PRIMARY KEY,
  stream_type TINYINT NOT NULL ,
  type_name VARCHAR (255) NOT NULL ,
  type_comment TEXT NULL
)ENGINE=MyISAM;

CREATE TABLE attributes_values (
  id SERIAL PRIMARY KEY ,
  attribute_id BIGINT UNSIGNED NOT NULL,
  attribute_type TINYINT UNSIGNED NOT NULL,
  int_value INT(11) NULL,
  varchar_value VARCHAR(255) NULL,
  text_value TEXT NULL,
  decimal_value DECIMAL (11,4) NULL,
  datetime_value DATETIME NULL
)ENGINE=MyISAM;

CREATE TABLE attribute_int_values (
  id SERIAL PRIMARY KEY,
  attribute_id BIGINT UNSIGNED NOT NULL,
  attribute_value INT(11) NOT NULL
)ENGINE=MyISAM;

CREATE TABLE attribute_decimal_values (
  id SERIAL PRIMARY KEY,
  attribute_id BIGINT UNSIGNED NOT NULL,
  attribute_value DECIMAL(11,4) NOT NULL
)ENGINE=MyISAM;

CREATE TABLE attribute_varchar_values (
  id SERIAL PRIMARY KEY,
  attribute_id BIGINT UNSIGNED NOT NULL,
  attribute_value VARCHAR(255) NOT NULL
)ENGINE=MyISAM;

CREATE TABLE attribute_text_values (
  id SERIAL PRIMARY KEY,
  attribute_id BIGINT UNSIGNED NOT NULL,
  attribute_value TEXT NOT NULL
)ENGINE=MyISAM;

CREATE TABLE attribute_datetime_values (
  id SERIAL PRIMARY KEY,
  attribute_id BIGINT UNSIGNED NOT NULL,
  attribute_value DATETIME NOT NULL
)ENGINE=MyISAM;

CREATE TABLE categories (
  id SERIAL PRIMARY KEY,
  category_key VARCHAR (255) NOT NULL,
  category_name VARCHAR (255) NOT NULL,
  parent BIGINT UNSIGNED NOT NULL,
  category_description TEXT NOT NULL,
  meta_keywords TEXT NOT NULL,
  meta_description TEXT NOT NULL,
  page_title VARCHAR(255) NOT NULL,
  active TINYINT NOT NULL,
  hidden TINYINT NOT NULL
)ENGINE=MyISAM;

CREATE TABLE products (
  id SERIAL PRIMARY KEY,
  product_key VARCHAR (255) NOT NULL,
  product_name VARCHAR (255) NOT NULL,
  short_description VARCHAR (255) NOT NULL,
  description TEXT NOT NULL,
  active TINYINT NOT NULL,
  meta_title VARCHAR (255) NOT NULL,
  meta_keywords TEXT NOT NULL,
  meta_description TEXT NOT NULL,
  create_date DATETIME NOT NULL
)ENGINE=MyISAM;

CREATE TABLE categories_products_relations (
  category_id BIGINT UNSIGNED NOT NULL,
  product_id BIGINT UNSIGNED NOT NULL
)ENGINE=MyISAM;

INSERT INTO `fit_shop`.`system_routes` (`route`, `title`, `position`, `icon`) VALUES ('', 'Финансы', '14', 'fa fa-usd');
UPDATE `fit_shop`.`system_routes` SET `position`='13' WHERE `id`='16';
INSERT INTO `fit_shop`.`system_routes` (`route`, `title`, `position`, `parent`) VALUES ('finance/streams', 'Приход/Расход', '15', '17');





