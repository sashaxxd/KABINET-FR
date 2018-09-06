-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 23 2018 г., 12:15
-- Версия сервера: 5.7.20
-- Версия PHP: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `freelancer-new.loc`
--

-- --------------------------------------------------------

--
-- Структура таблицы `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('ADMIN', '24', 1512154897),
('adminAccess', '3', 1505683800),
('BRAND', '17', 1505732773),
('BRAND', '18', 1505750211),
('BRAND', '19', 1505893001),
('BRAND', '20', 1505893890),
('BRAND', '21', 1505896129),
('BRAND', '22', 1505896686),
('BRAND', '23', 1511947542),
('BRAND', '25', 1513159413),
('BRAND', '40', 1514551330),
('BRAND', '41', 1514564792),
('BRAND', '42', 1514564830),
('BRAND', '43', 1514566293),
('BRAND', '44', 1514566722),
('BRAND', '45', 1514567025),
('BRAND', '46', 1514569281),
('BRAND', '47', 1514571171),
('BRAND', '48', 1514572222),
('BRAND', '49', 1514635484),
('BRAND', '50', 1517407372),
('BRAND', '51', 1517408254),
('BRAND', '52', 1517412164),
('BRAND', '53', 1517412511),
('BRAND', '54', 1517412680),
('BRAND', '55', 1517412850),
('BRAND', '56', 1517420921),
('BRAND', '57', 1517463820),
('BRAND', '58', 1519374859),
('BRAND', '59', 1519375104),
('BRAND', '60', 1519377121),
('cabinetAccess', '3', 1505684020),
('profileAccess', '3', 1505723339);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/admin/*', 2, NULL, NULL, NULL, 1505683260, 1505683260),
('/cabinet/*', 2, NULL, NULL, NULL, 1505683931, 1505683931),
('/employers/create', 2, NULL, NULL, NULL, 1514564967, 1514564967),
('/employers/profile', 2, NULL, NULL, NULL, 1514565291, 1514565291),
('/freelancers/create', 2, NULL, NULL, NULL, 1505750001, 1505750001),
('/freelancers/message', 2, NULL, NULL, NULL, 1505915473, 1505915473),
('/freelancers/message-delete', 2, NULL, NULL, NULL, 1512155376, 1512155376),
('/freelancers/profile', 2, NULL, NULL, NULL, 1505723751, 1505723751),
('/rbac/*', 2, NULL, NULL, NULL, 1505683297, 1505683297),
('ADMIN', 1, NULL, NULL, NULL, 1512154691, 1512154691),
('adminAccess', 2, 'Доступ в админ панель', NULL, NULL, 1505683537, 1505683537),
('BRAND', 1, NULL, NULL, NULL, 1505730812, 1514565420),
('cabinetAccess', 2, 'Доступ к кабинету', NULL, NULL, 1505683994, 1505683994),
('createAccess', 2, 'Создание профиля', NULL, NULL, 1505750141, 1505750141),
('createEmployersAccess', 2, NULL, NULL, NULL, 1514565010, 1514565037),
('deletemessageAccess', 2, 'Удаление личных сообщений', NULL, NULL, 1512155538, 1512155538),
('messageAccess', 2, 'Доступ к личным сообщениям', NULL, NULL, 1505915512, 1512155470),
('profileAccess', 2, 'Доступ к профилю фрилансера', NULL, NULL, 1505721714, 1514565397),
('profileEmployersAccess', 2, 'Доступ к профилю работодателя', NULL, NULL, 1514565346, 1514565346);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('ADMIN', '/admin/*'),
('adminAccess', '/admin/*'),
('cabinetAccess', '/cabinet/*'),
('createEmployersAccess', '/employers/create'),
('profileEmployersAccess', '/employers/profile'),
('createAccess', '/freelancers/create'),
('messageAccess', '/freelancers/message'),
('deletemessageAccess', '/freelancers/message-delete'),
('profileAccess', '/freelancers/profile'),
('ADMIN', '/rbac/*'),
('ADMIN', 'BRAND'),
('BRAND', 'cabinetAccess'),
('BRAND', 'createAccess'),
('BRAND', 'createEmployersAccess'),
('BRAND', 'deletemessageAccess'),
('BRAND', 'messageAccess'),
('BRAND', 'profileAccess'),
('BRAND', 'profileEmployersAccess');

-- --------------------------------------------------------

--
-- Структура таблицы `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `employer`
--

CREATE TABLE `employer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `employer`
--

INSERT INTO `employer` (`id`, `name`, `lastname`, `login`, `date`, `status`) VALUES
(3, 'ыва', 'ыва', 'ыва', '2017-12-12', '1'),
(4, 'ываываввв', 'ввв', 'ыавыа', '2017-12-12', '1'),
(42, 'Работодатель', 'Дедов', 'qqq', '2017-12-29', '0'),
(46, 'Работник', 'Херодел', 'sss', '2017-12-29', '1'),
(49, 'Туко', 'Фалейчик', 'ttt', '2017-12-30', '0'),
(55, 'триста третий', 'лопух', '333', '2018-01-31', '1'),
(56, 'Куценко', 'Лысая башка', 'qwer', '2018-02-05', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `freelancers`
--

CREATE TABLE `freelancers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `who` enum('0','1') NOT NULL,
  `spec` varchar(255) DEFAULT NULL,
  `login` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `freelancers`
--

INSERT INTO `freelancers` (`id`, `name`, `lastname`, `who`, `spec`, `login`, `date`, `status`) VALUES
(21, 'Евгений', 'Петров', '0', '1', 'kot', NULL, 'выа'),
(22, '<a href=\"dsf\">sdffd</a>', 'Петров', '0', '23', 'pes', '2017-12-13', 'Конь'),
(23, 'Андрей', 'Котов2', '0', '2', 'kot2', '2017-12-13', 'веб'),
(25, 'Иван', 'Хуй', '0', '22', 'her', '2017-12-13', 'аыа'),
(40, 'Гоша', 'Куценко', '0', '14', 'qwer', '2017-12-29', 'Говно'),
(44, 'scsac', 'ascasc', '0', '14', 'pese', '2017-12-29', 'ascasc'),
(45, 'Андрей', 'Хуевич', '0', '10', 'www', '2017-12-29', NULL),
(47, 'Дурачок', 'хер', '0', '8', 'Хайзенберг', '2013-12-29', NULL),
(48, 'Пинкман', 'Джесси', '0', '23', 'pincman', '2017-12-29', NULL),
(56, 'Арни', 'Шварцев', '0', '6', 'хуесос', '2018-01-31', NULL),
(57, 'Евгений', 'Фалеев', '0', '8', 'пипец', '2018-02-01', NULL),
(58, 'Порно', 'Звезда', '0', '23', 'porn', '2018-02-23', NULL),
(60, 'TTT', 'WERT', '0', '9', 'SEX', '2018-02-23', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `gallery_image`
--

CREATE TABLE `gallery_image` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `ownerId` varchar(255) NOT NULL,
  `rank` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `gallery_image`
--

INSERT INTO `gallery_image` (`id`, `type`, `ownerId`, `rank`, `name`, `description`) VALUES
(3, '3', '3', 0, '3', '3'),
(5, 'gallery', '22', 5, 'Медведь', 'В очках'),
(8, 'portfolio', '22', 8, 'Заголовок', 'Описание\r\n'),
(9, 'portfolio', '22', 9, 'Медвед', ''),
(10, 'portfolio', '22', 10, 'Пейзаж', ''),
(13, 'portfolio', '25', 13, NULL, NULL),
(14, 'portfolio', '45', 14, NULL, NULL),
(15, 'portfolio', '47', 15, '', ''),
(16, 'portfolio', '47', 16, '', ''),
(17, 'portfolio', '47', 17, '', ''),
(18, 'portfolio', '47', 18, '', ''),
(19, 'portfolio', '22', 19, NULL, NULL),
(20, 'portfolio', '56', 20, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `filePath` varchar(400) NOT NULL,
  `itemId` int(11) DEFAULT NULL,
  `isMain` tinyint(1) DEFAULT NULL,
  `modelName` varchar(150) NOT NULL,
  `urlAlias` varchar(400) NOT NULL,
  `name` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `image`
--

INSERT INTO `image` (`id`, `filePath`, `itemId`, `isMain`, `modelName`, `urlAlias`, `name`) VALUES
(27, 'Freelancers/Freelancers23/6f069c.jpg', 23, 1, 'Freelancers', 'b7fb618781-1', ''),
(31, 'Freelancers/Freelancers22/efeb62.jpg', 22, 1, 'Freelancers', 'f72f6f9537-1', ''),
(32, 'Freelancers/Freelancers47/decf5b.jpg', 47, 1, 'Freelancers', 'b405aedcd0-1', ''),
(33, 'Freelancers/Freelancers48/c79366.jpg', 48, 1, 'Freelancers', 'af7c9600d4-1', ''),
(34, 'Employers/Employer49/2289cf.jpg', 49, 1, 'Employer', '9b4ea838fc-1', ''),
(35, 'Employers/Employer55/5b3949.jpg', 55, 1, 'Employer', '3da45d2260-1', ''),
(36, 'Freelancers/Freelancers56/641743.jpg', 56, 1, 'Freelancers', 'a2e6c609ad-1', ''),
(37, 'Freelancers/Freelancers57/956ce8.jpg', 57, 1, 'Freelancers', '8751f309e9-1', ''),
(38, 'Freelancers/Freelancers58/bd6ebd.jpg', 58, 1, 'Freelancers', '344cac6ab9-1', ''),
(39, 'Freelancers/Freelancers60/f2a34b.jpg', 60, 1, 'Freelancers', 'fb19f3095a-1', '');

-- --------------------------------------------------------

--
-- Структура таблицы `job`
--

CREATE TABLE `job` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `spec` int(11) NOT NULL,
  `text` text NOT NULL,
  `price` int(11) NOT NULL,
  `currency` enum('0','1') NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` int(11) NOT NULL,
  `employer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `job`
--

INSERT INTO `job` (`id`, `title`, `spec`, `text`, `price`, `currency`, `date`, `time`, `status`, `employer`) VALUES
(16, 'Фирменный стиль', 1, 'Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации \"Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст..\" Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам \"lorem ipsum\" сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты).', 3000, '0', '2018-02-05', '09:25:11', 0, 49),
(17, 'Разработка игр / графика', 2, 'Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации \"Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст..\" Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам \"lorem ipsum\" сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты).', 200, '1', '2018-02-05', '09:27:42', 1, 49),
(18, 'Переводы', 3, 'Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации \"Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст..\" Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам \"lorem ipsum\" сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты).', 234, '0', '2018-02-05', '09:29:37', 0, 49),
(19, 'Менеджмент', 4, 'Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации \"Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст..\" Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам \"lorem ipsum\" сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты).', 344, '1', '2018-02-05', '09:30:27', 0, 49),
(20, 'Инженерия', 5, 'Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации \"Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст..\" Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам \"lorem ipsum\" сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты).', 455, '0', '2018-02-05', '09:31:07', 0, 49),
(21, 'Веб-дизайн', 6, 'Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации \"Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст..\" Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам \"lorem ipsum\" сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты).', 122, '0', '2018-02-05', '09:32:11', 0, 49),
(22, 'Арт / иллюстрации', 7, 'Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации \"Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст..\" Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам \"lorem ipsum\" сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты).', 450, '0', '2018-02-05', '09:32:47', 0, 49),
(23, 'Фотография', 8, 'Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации \"Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст..\" Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам \"lorem ipsum\" сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты).', 333, '0', '2018-02-05', '09:33:45', 1, 49),
(24, 'Тексты', 9, 'Тексты', 300, '0', '2018-02-05', '09:34:24', 0, 49),
(26, 'Обучение / консультации', 11, '   $result = [];\r\n\r\n    foreach ($this->activeAttributes() as $key)\r\n        (array_key_exists($key,$this->attributes)) && $result[$key] = $this->attributes[$key];\r\n\r\n    return $result;\r\n', 234, '0', '2018-02-05', '13:45:40', 0, 49),
(27, 'Промышленный дизайн', 10, 'сообщение к администраторам:\r\nвот когда на этом форуме создаешь тему, то внизу слева есть блочок маленький, где написано что я могу делать/добавлять, а что не могу. Так вот, если я МОГУ делать какой-то пункт, то он нормально, по-русски пишет, что я \"можете\". А если я НЕ МОГУ создать тему, то он пишет, что я \"not можете\". Мне, конечно, по фигу, но не очень здорово смотрится этот \"not\".\r\n', 543, '1', '2018-02-05', '13:54:22', 0, 49),
(28, 'Я туко хочу фирменный стиль', 1, 'Если существуют данные из формы ($_POST) – то переменные $checkBrand, $checkCloth и $checkSize получают свои значения из $_POST (как это и сделано сейчас) + происходит запись этих значений в $_SESSION для последующих страниц.\r\nИначе – эти переменные получают свои значения из $_SESSION (если там есть соответствующие значения для этих переменных, само собой).', 455, '1', '2018-02-06', '13:00:57', 0, 49),
(34, 'Пиздец', 19, 'звуки му2', 244, '0', '2018-02-13', '18:16:56', 0, 55),
(45, 'ываыва', 2, 'ываыаыа', 3, '1', '2018-02-13', '18:31:49', 0, 55),
(46, 'sdfsfd', 6, '<a href=\"dsf\">sdffd</a>', 45, '1', '2018-02-13', '18:32:48', 0, 55),
(47, 'ssadd', 7, '<div id=\"er\" style=\"width: 400px; height: 300px; background: red;\">saf</div>', 555, '0', '2018-02-13', '18:36:41', 0, 55),
(48, 'fwf', 5, '<a href=\"sdf\">sdg</a>', 234, '1', '2018-02-13', '18:42:27', 0, 55),
(49, 'sdf', 3, '<a href=\"dsf\">sdffd</a>', 5, '1', '2018-02-13', '18:45:46', 0, 55);

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `message`
--

INSERT INTO `message` (`id`, `user`, `message`, `parent_id`, `status`) VALUES
(52, 'pes', 'Привет кот как дела?', 21, 1),
(185, 'pes', 'питушара', 21, 1),
(186, 'pes', 'Добрый день', 23, 1),
(187, 'sss', 'Привет петушара!', 42, 1),
(195, 'Хайзенберг', 'sdfsdfsdf', 21, 1),
(197, 'Хайзенберг', 'sdfsdfsdfsdfsdfsd', 21, 1),
(198, 'Хайзенберг', 'dsfdsfdsf', 21, 1),
(199, 'Хайзенберг', 'sdfsdfsf', 21, 1),
(200, 'Хайзенберг', 'dsfsdfdsf', 21, 1),
(201, 'Хайзенберг', 'sdfdsfsdf', 21, 1),
(202, 'Хайзенберг', 'dsfsdfsdf', 21, 1),
(203, 'Хайзенберг', 'sdfdsfdsf', 21, 1),
(204, 'Хайзенберг', 'dsfsdfsdf', 21, 1),
(205, 'Хайзенберг', 'sdfsdf', 21, 1),
(223, 'pes', 'sdfdsfsdf', 21, 1),
(240, 'pes', 'sddsds', 49, 1),
(251, 'ttt', 'werwrwr', 22, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1505673148),
('m140506_102106_rbac_init', 1505673235),
('m140602_111327_create_menu_table', 1505673154),
('m140622_111540_create_image_table', 1513173374),
('m140622_111545_add_name_to_image_table', 1513173375),
('m150318_154933_gallery_ext', 1513248833),
('m160312_050000_create_user', 1505673154);

-- --------------------------------------------------------

--
-- Структура таблицы `offers`
--

CREATE TABLE `offers` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL,
  `freelancer` int(11) NOT NULL,
  `terms` int(11) NOT NULL,
  `budget` int(11) NOT NULL,
  `currency` enum('0','1') NOT NULL DEFAULT '0',
  `offer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `offers`
--

INSERT INTO `offers` (`id`, `parent_id`, `freelancer`, `terms`, `budget`, `currency`, `offer`) VALUES
(7, 28, 57, 5, 55, '0', 'dfsafadsf'),
(8, 28, 57, 4, 4, '0', 'edasdwqd'),
(9, 28, 57, 5, 6667, '1', 'sdfsfd'),
(10, 28, 57, 6, 777, '0', 'sdfsf'),
(11, 28, 22, 6, 555, '1', 'Я пес сделаю заебись'),
(12, 20, 22, 32, 65, '1', 'Я ебаный пес инженер сделаю заебись'),
(13, 20, 58, 3, 23, '1', 'Я звезда сделаю'),
(14, 20, 58, 3, 43, '0', 'sdf'),
(15, 20, 58, 5, 555, '0', 'efsdf'),
(16, 20, 58, 4, 555, '0', 'sdfsdf'),
(17, 20, 58, 3, 3, '0', 'dsddss'),
(18, 20, 58, 4, 33, '0', 'sdaas'),
(19, 48, 58, 3, 3, '1', 'dssdf'),
(20, 20, 47, 2, 34, '0', 'Хуйзенберг сделает все'),
(21, 48, 47, 5, 44, '1', ' Уолт'),
(22, 28, 47, 6, 43, '0', 'ыва'),
(23, 20, 60, 4, 3, '0', 'ЙВАЫА');

-- --------------------------------------------------------

--
-- Структура таблицы `spec`
--

CREATE TABLE `spec` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `spec`
--

INSERT INTO `spec` (`id`, `parent_id`, `name`) VALUES
(1, 1, 'Фирменный стиль'),
(2, 2, 'Разработка игр / графика'),
(3, 3, 'Переводы'),
(4, 4, 'Менеджмент'),
(5, 5, 'Инженерия'),
(6, 6, 'Веб-дизайн'),
(7, 7, 'Арт / иллюстрации'),
(8, 8, 'Фотография'),
(9, 9, 'Тексты'),
(10, 10, 'Промышленный дизайн'),
(11, 11, 'Обучение / консультации'),
(12, 12, 'Медиадизайн / анимация'),
(13, 13, 'Графический дизайн'),
(14, 14, 'Аутсорсинг / консалтинг'),
(15, 15, '3D графика'),
(16, 16, 'Флеш'),
(17, 17, 'Реклама / презентации'),
(18, 18, 'Полиграфический дизайн'),
(19, 19, 'Музыка / звук'),
(20, 20, 'Маркетинг и реклама'),
(21, 21, 'Видео'),
(22, 22, 'Архитектура / интерьер'),
(23, 23, 'IT и Программирование');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `who` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isAdmin` int(11) NOT NULL DEFAULT '0',
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `who`, `auth_key`, `password_hash`, `isAdmin`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(21, 'kot', '0', 'TUKUtwoQHV6w0Haemk8aikoJZPNEG_K9', '$2y$13$LuroS8osy.lvaATCj1EDd./Bi80ew57q4KOozHWHi5qvtCyJr7dny', 0, NULL, 'kot@rr.iu', 10, 1505896129, 1505896129),
(22, 'pes', '0', 'bHz0L71NbD3o7G59hKx7XEqy2iveEHnd', '$2y$13$FT2yd4Qhyji9V3AOtCP.2OJvUJX6pHQm7uq.c/5ByXl.LLGTxRjVq', 0, NULL, 'pes@ee.ii', 10, 1505896686, 1505896686),
(23, 'kot2', '0', 'JTM39PC3pDPYs9Ctm5291XNxVNTs-YRh', '$2y$13$aZ0eZ9dNYjGjbitqOeB8T.FlO346b4xKADdg5jCVYzs9ZlclGxpV2', 0, NULL, 'wscs@re.lk', 10, 1511947542, 1511947542),
(24, 'admin', '0', 'zvL3HepstQxb7Rkoy_xs62fRjii5Ey0a', '$2y$13$V5uZEjVJ8BzDlnrsd9P/e.sDPdY2t06WsqzySpRwEnA05G/8ac24e', 1, NULL, 'webdizain@bk.ru', 10, 1512154322, 1512154322),
(25, 'her', '0', 'BipHNZtSTxAYfZYxsruEwbmEbNBlfr4l', '$2y$13$Qfo/F4bYaju0WBBCrDpkR.E17VyOklCRKKWBfqKRoFHOpgQOg/9wm', 0, NULL, 'pes@io.ty', 10, 1513159412, 1513159412),
(37, 'sdfsdfss', '1', '4nsbEi0BtALattxe5YIpwrIZ02ezkAl7', '$2y$13$YVrpgg88jagZkwxoaLVeSOGD3VriHf/UaW.XktjlVr/KxbywqiA82', 0, NULL, 'pes@ee.jjk', 10, 1514549311, 1514549311),
(38, 'vova', '1', '7Y-HSlhwKPsGMRbKzrmkfOJmEjtn5git', '$2y$13$7qhnVS3sWVd5ogcJpzma0uM7Ldnf7sMNrpSNfQKQLkT/xYRHwdkA6', 0, NULL, 'pes@rt.lk', 10, 1514549566, 1514549566),
(39, 'pop', '0', 'vD5EFp9rBM3p3JI-s3MMqPwYZn9bja68', '$2y$13$37Od2kWqqCNENCyoUXpNSOoQzfG7sEA0tvKiSgcVVwD6YtxQkpSzm', 0, NULL, 'pes@we.ddd', 10, 1514550576, 1514550576),
(40, 'qwer', '1', 'ATxeV5f8KWEZcEfN1Y5G7Nr9C8lW7HG-', '$2y$13$B0gZaXy3vcxH42Y6386Yj.M7LEpDSYmFu5ybt4R81dS00zTj.ufF2', 0, NULL, 'qwer@oi.lk', 10, 1514551330, 1514551330),
(41, 'sdfsdd4', '1', 'gtM3Owe2XMzxN8b4M5i0XaxEhRs_4-3y', '$2y$13$IAlJ0dp6smRdTltFtPs2x.nGbXrZeGY4/0.1X7XuJbgoKLc.nZrQG', 0, NULL, 'pes@qq.bb', 10, 1514564792, 1514564792),
(42, 'qqq', '1', '8lbBZgfiTkQspCtfazJkgEJD_vk55PCv', '$2y$13$Fv4/EQn9TJqEIWzZd0Pb/.qs/MRHULoJFJAhTD9NVjSefXoUgRinG', 0, NULL, 'qqq@we.lk', 10, 1514564830, 1514564830),
(43, 'eee', '1', 'BWi2pqavQbW2bx-hoB2kg8FMmv2nTQD_', '$2y$13$JOlxYlvZG6RArfFlXuycs.T32vkpLKxn9af7uA3p.PiqpgKyusIdW', 0, NULL, 'pes@we.mm', 10, 1514566293, 1514566293),
(44, 'pese', '0', 'URNd1vNveVabx1M0aLeiirGR7d1Y9IPU', '$2y$13$eBnYRxoWnkG6PG25bOug.OPpS8pSnBEgdOBfNU5DF/r2QsenxKfzW', 0, NULL, 'pes@qq.bbq', 10, 1514566722, 1514566722),
(45, 'www', '0', 'lK4VTvXqqbXIePI8EOfaQa_uXWbHdUM9', '$2y$13$im3L93w035QIBUjPcGzNbO/yx.b3trX/hwG0IRZ4GJ1.fG.pAYRj6', 0, NULL, 'pesq@pp.ll', 10, 1514567025, 1514567025),
(46, 'sss', '1', '1l0egFvl3AYh2LTjKqyLSvczcO_ogV19', '$2y$13$BLu5xpxFtZZczwD7oNsad.oe2fw9OMlTlr9tuM8F.aWGdG6ZleOyO', 0, NULL, 'sss@oi.lk', 10, 1514569281, 1514569281),
(47, 'Хайзенберг', '0', '5nQm6yvfodSHnXVlrkQJtQq2SrPa5qCw', '$2y$13$MOzPCznw3kE.dAgt9vQuF.CNkC9O21RjTr9/fv/tbtnqb1qGQMZo2', 0, NULL, 'hay@wq.ll', 10, 1514571171, 1514571171),
(48, 'pincman', '0', 'qnpciNceA-2-vvqwoaeSp_HgM-Ri-Vi-', '$2y$13$geX/u8E3DUGQKuYkYk.kSOWfSq6ukATNw/maMRKiviIxfMf3zgACS', 0, NULL, 'pes@io.tyss', 10, 1514572222, 1514572222),
(49, 'ttt', '1', 'Ui83Jred5-BJYHOelY6qSMCiAO-0rLqQ', '$2y$13$0Y9yHouF3Mx5BIVfSxaCgu3OvUKDZgb9vAvjU/Aq1BZvQb7EhisYK', 0, NULL, 'ttt@mail.ru', 10, 1514635484, 1514635484),
(50, 'fsdf@ret.ret', '0', 'XFP6axBbTBZr_oaQ_KbRvWer_QR8HIcP', '$2y$13$/V8gfRm7fhS6yQpb30vxy.TQNqL4ga/RZEo4DFTBri6.o6neZy8um', 0, NULL, 'wegfwe2@rt.kj', 10, 1517407372, 1517407372),
(51, 'wwwqqqaaa', '0', 'LFi9Dz64Ou1LYciHCVDCrLTFaz3fkSQI', '$2y$13$Z1ySmLBfHD82IaeeQ3Ghz.GQU937TFjWyUxsgcUtLGK1xVxoCVTUq', 0, NULL, 'wwwqqqaaa@er.kkk', 10, 1517408254, 1517408254),
(52, 'wefwf', '0', 'F6TaiUPKFjDEILRkaSZ0gtIe6IDEw0z4', '$2y$13$3JnK/Mkx16VdKgcDm93YUece2ZTvb3Iu7wR8KpCRnScBQS9E67kYe', 0, NULL, 'pes@qqqwww.kkk', 10, 1517412164, 1517412164),
(53, 'sdffsf44', '0', 'eZG1DmorOCSh23ZNmtuC3T9MgYfZpPBk', '$2y$13$i89YFfQPvYF/Lw9H.ZqWbOdfhoPkAwpdAilGv8mhn7T/OVYPEavBy', 0, NULL, 'pes@wweerr.llkkll', 10, 1517412511, 1517412511),
(54, 'weerfrr55', '0', '6WXq5y_KT1JBLXwFh1eDYn-GXiS2LIc9', '$2y$13$V6EDYJTXfNML3NsZ7tezpeHlKIYTk/mpa6/dHt7kGN3di2m36FO2S', 0, NULL, 'pesq@wq.nn', 10, 1517412680, 1517412680),
(55, '333', '1', 'cBA82R05ZJreU0EdsdnDcK0JAnl1Tr91', '$2y$13$KDGgY20tpKfcB80V6UCcquliWG8NAtYaX7hxw7e.wX7fZLnHCSlxu', 0, NULL, 'pes@qqqwww.kkk55', 10, 1517412850, 1517412850),
(56, 'хуесос', '0', 'v_tmDHbw9tnbqSRFv7RR2omjyyIKfOkW', '$2y$13$JDuaduVeM5ISm7B4DDwzXeBf3vTC53cWjlqc2Vprrf5fVrEETAh7K', 0, NULL, 'hui@oi.hgf', 10, 1517420921, 1517420921),
(57, 'пипец', '0', 'Rr1DDv-hhrzEsNkKxnOwyP5sZrLbc-TO', '$2y$13$Vv1K.OvZbM3zq..UySZmTenJVVRozeqYsY.m6AEHIgMuCfRLJ1ERy', 0, NULL, 'qwex@ppp.mmbb', 10, 1517463820, 1517463820),
(58, 'porn', '0', 'mgRvu_ZtavqMTl6ir7j0nd3iKEOTAfLx', '$2y$13$Dck.LMyGeAyqqYKnU3jv8ePotl4GBsjrmoHwmUZUn758H6rp1bxoS', 0, NULL, 'porn@info.ru', 10, 1519374859, 1519374859),
(59, 'ывмымм', '0', 'HZsdN4wGOuT6Dxug0NEQoYk27ZRD72_B', '$2y$13$AnCa1HEHUwGtfdaCuybXG.kUrLwwtmpecLeB1w0JHVtDzLoqH95C2', 0, NULL, 'sdf@rt.kj', 10, 1519375104, 1519375104),
(60, 'SEX', '0', 'qR58Z7CmsqR_g9JfnJJirbsHoDYZg6th', '$2y$13$geYAZkJTAUxeF//5PtNxgOeKa7yFpgDe65.LgyaCU7tcFcee343Pm', 0, NULL, 'QW@QW.JK', 10, 1519377121, 1519377121);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Индексы таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Индексы таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Индексы таблицы `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Индексы таблицы `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `freelancers`
--
ALTER TABLE `freelancers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `gallery_image`
--
ALTER TABLE `gallery_image`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`);

--
-- Индексы таблицы `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `spec`
--
ALTER TABLE `spec`
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
-- AUTO_INCREMENT для таблицы `employer`
--
ALTER TABLE `employer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT для таблицы `gallery_image`
--
ALTER TABLE `gallery_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT для таблицы `job`
--
ALTER TABLE `job`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;

--
-- AUTO_INCREMENT для таблицы `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `spec`
--
ALTER TABLE `spec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
