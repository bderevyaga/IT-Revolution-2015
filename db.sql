-- phpMyAdmin SQL Dump
-- version 4.2.7
-- http://www.phpmyadmin.net
--
-- Хост: localhost:3306
-- Время создания: Ноя 14 2015 г., 22:47
-- Версия сервера: 5.5.41-log
-- Версия PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `event`
--

CREATE TABLE IF NOT EXISTS `event` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `start` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `event`
--

INSERT INTO `event` (`id`, `user_id`, `title`, `start`) VALUES
(1, 14, 'Спалення людей', 1447463324),
(2, 14, 'Шабаш з вурдалаками', 1448068180),
(3, 23, 'sdfsdfsdf', 1448968180),
(4, 16, 'Чистка бінтів', 1448968180),
(5, 16, 'Сушка кісток', 1448668180),
(6, 16, 'Туса :-)', 1447968180),
(7, 16, 'Поїдання людей', 1446968180);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `status` int(255) NOT NULL,
  `auth_key` varchar(255) NOT NULL,
  `created_at` int(255) NOT NULL,
  `updated_at` int(255) NOT NULL,
  `secret_key` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `password_hash`, `status`, `auth_key`, `created_at`, `updated_at`, `secret_key`, `email`) VALUES
(8, '1111', '$2y$13$th0JoRzbb4Fht0y2fuQyJuuQsdKf2DxcRq.9chTVuG3.7sTD94PqG', 10, '5ELVe3n0vrFmRwsYXxMpFmy_pixgyhTH', 1447437560, 1447437560, '', ''),
(9, 'Donet', '$2y$13$5IHXaaalTGu.Cr0SVujPaOz2f8nTP0PKLmnIhzb35S3cp5eR5w5vK', 1, 'fO32GmM8r35sqMfwAigfpwyLZyRAMgwC', 1447438542, 1447438542, '0GL1xQvQiPgMXd6mkxUGpkUhjm4_3LZ5_1447438542', 'bogdan.derevyaga@gmail.com'),
(10, 'Doni', '$2y$13$eQ02vHT18/SRpodX6jvGoO76HgOvyagjhXNf8jSMcT.tTkaR9Czn6', 1, 'MMsgILbS6yyb0R8w_3HwgrQ1h_9oRDMG', 1447439374, 1447439374, 'OLvThd_1E3jlz3YCBipQ1qCv0ABAPGEg_1447439374', '1ogdan.derevyaga@gmail.com'),
(11, 'Donisd', '$2y$13$XxkJmoTgVFHZgjR4NwkS/eCW82EinaTHKWBwhFCQYGvVQHBSMzkF6', 1, 'JFWcKAe717S-C1H0bjYbmlza7_HKX799', 1447439564, 1447439564, 'R41d8MdqW95KJRsPtBOY73PIHVSSENPs_1447439564', '2ogdan.derevyaga@gmail.com'),
(12, 'Donisdsd', '$2y$13$3/v7jtfdQRhf0HmlFsvZ.OEbkFRCy5tsDhNs6bBglFeVbKHluzAKi', 1, 'D4nlcR98emE3C9XEA4-UKVdIBDUmp6O9', 1447439692, 1447439692, 'nGHsc6jFjPt6oiQUph02CfmqYSZDm7CV_1447439692', '3ogdan.derevyaga@gmail.com'),
(13, 'Donbas', '$2y$13$Q2KY0En7doSUogQVe0hXjekA7aCriGLTWwGq6cxHC/IkakP8/ZbZG', 10, 'Lj1qFfxGZvKhewl1nCGf_0SEMhy2saP2', 1447440371, 1447440371, '', 'donbas.derevyaga@gmail.com'),
(14, 'admin', '$2y$13$VJ7FmJe22aAucwIfffSqt.yeXibBFepm74r6ihgNVXNwwwYOTk1bC', 10, 'jU_tQQCPKFevIkBgF2C4slXGs7WHnc1A', 1447444904, 1447444904, '', 'admin@gmail.com'),
(15, 'lolo', '$2y$13$xM2BRwyEL/ccz5dQJ7oBausm0TOBasx/0lt0WtS6oAHt6OQR.NMoe', 10, 'D17w0JTio2gSVDL3p-D41Dr9RfoF3QwI', 1447481726, 1447481726, '', 'lolo@gmail.com'),
(16, 'admin2', '$2y$13$tl68oz7XYrDrNLkGpKovdOJjdEgVlNe7UOvNyrduEZZXnjslyZo2a', 10, 'iPWShtuGf8WGhJ25vyTObXugKr--XhNe', 1447509205, 1447509205, '', 'admin2@gmail.com');

-- --------------------------------------------------------

--
-- Структура таблицы `userinfo`
--

CREATE TABLE IF NOT EXISTS `userinfo` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_birth` int(11) NOT NULL,
  `address` text CHARACTER SET utf8 NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8 NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8 NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `userinfo`
--

INSERT INTO `userinfo` (`id`, `user_id`, `date_birth`, `address`, `phone`, `avatar`, `name`) VALUES
(1, 14, 1234, 'qqqqqqqqqqqqqqqqq', 'qqqqqqqqqqqqqqqqqqqq', '/data/img/108312367.jpg', 'Лола'),
(4, 15, 234567, 'asdgfhbjklm', 'zdxcfgvybhujikl,;', '/data/img/108312367.jpg', '1234567890-'),
(5, 16, 1023, 'Келицька 98', '+380631030778', 'https://pp.vk.me/c627317/v627317003/1f192/GRwiIAHuy5w.jpg', 'Убивашка');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
