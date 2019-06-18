-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 12 2019 г., 19:54
-- Версия сервера: 8.0.15
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
-- База данных: `system_college`
--

-- --------------------------------------------------------

--
-- Структура таблицы `administrations`
--

CREATE TABLE `administrations` (
  `id_administration` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `birth` date NOT NULL,
  `number` varchar(12) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_classroom` int(11) NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `administrations`
--

INSERT INTO `administrations` (`id_administration`, `name`, `birth`, `number`, `id_role`, `id_user`, `id_classroom`, `email`) VALUES
(1, 'Зудилина Елена Александровна', '2019-05-14', '+70000000000', 1, 5, 1, 'example@mail.ru'),
(2, 'Комова Татьяна Ивановна', '2019-05-15', '+70000000000', 1, 6, 5, 'example@mail.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `classrooms`
--

CREATE TABLE `classrooms` (
  `id_classroom` int(11) NOT NULL,
  `name` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `classrooms`
--

INSERT INTO `classrooms` (`id_classroom`, `name`) VALUES
(1, '401'),
(2, '204'),
(3, '406'),
(4, '12'),
(5, '340');

-- --------------------------------------------------------

--
-- Структура таблицы `courses`
--

CREATE TABLE `courses` (
  `id_course` int(11) NOT NULL,
  `name` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `duration` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `price` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_teacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `courses`
--

INSERT INTO `courses` (`id_course`, `name`, `duration`, `price`, `id_teacher`) VALUES
(1, 'Сетевое администрирование', '72 часа', '9600 руб', 1),
(2, 'Электротехника', '1024 часов', '0 рублей', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `events`
--

CREATE TABLE `events` (
  `id_event` int(11) NOT NULL,
  `name` varchar(35) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `place` varchar(35) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date` date NOT NULL,
  `duration` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_teacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `events`
--

INSERT INTO `events` (`id_event`, `name`, `place`, `date`, `duration`, `id_teacher`) VALUES
(1, 'Субботник', 'Улицаё', '2019-05-15', '1 час', 2),
(2, 'Полёты на квадрокоптере', 'Воздух', '2029-05-16', '2 часа', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE `groups` (
  `id_group` int(11) NOT NULL,
  `name` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_speciality` int(11) NOT NULL,
  `enrollment` date NOT NULL,
  `formstudy` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_classroom` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `groups`
--

INSERT INTO `groups` (`id_group`, `name`, `id_speciality`, `enrollment`, `formstudy`, `id_classroom`) VALUES
(1, '3719', 1, '2019-05-14', 'Очная', 1),
(2, '3857', 2, '2019-12-27', 'Очная', 2),
(3, '3619', 1, '2016-09-01', 'Очная', 3),
(4, '3519', 1, '2015-09-01', 'Очная', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id_news` int(11) NOT NULL,
  `title` varchar(55) NOT NULL,
  `textmin` text NOT NULL,
  `textfull` text NOT NULL,
  `date` date NOT NULL,
  `imageurl` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id_news`, `title`, `textmin`, `textfull`, `date`, `imageurl`) VALUES
(1, 'Конкурсы поделок', '22 апреля СП № 3 предметно-цикловой комиссией экономических дисциплин были проведены два конкурса «Моя копилка» и «Мой рубль». ', 'В конкурсах поделок активно участвовали студенты 1 и 2 курса, а также школьники, обучающиеся банковскому делу.\r\n\r\nОбучающиеся удивили своими необычными идеями и умением их осуществить. Поделки получились очень креативные и красивые.\r\n\r\nИтоги конкурса «Моя копилка»:\r\n\r\n    1 место. Лемешев Данил, группа «Агент банка» (школьники);\r\n    2 место. Гулагина Екатерина, группа 3721в (Банковское дело);\r\n    3 место. Мардавина Гюльдете и Гертье Екатерина, группа «Агент банка» (школьники).\r\n\r\nИтоги конкурса «Мой рубль»:\r\n\r\n    1 место. Обухова Виктория, группа «Агент банка» (школьники);\r\n    2 место. Никанорова Екатерина и Исаева Ирина, группа 3718 (Земельно-имущественные отношения);\r\n    3 место. Алмаева Анастасия , группа 3821в (Банковское дело).\r\n\r\nСпасибо всем студентам и школьникам, которые участвовали конкурсах поделок в рамках недели финансовой грамотности и порадовали своими творческими способностями!\r\n', '2019-05-06', 'https://schelcol.ru/media/k2/items/cache/09b87d8495c8cf32b64735c816312dfe_L.jpg'),
(2, 'Выставка «Мир стекла» ', '2 апреля 2019 года преподаватель Юдина Т.А. и студенты группы № 6708 посетили 21-ю Международную выставку «Мир стекла».', 'На выставке были представлены стенды из 20-ти стран, рассказывающие о химическом производстве стекла, сырье, о технологиях варки стекла.\r\n\r\nСтуденты познакомились с системами загрузки и удаления шихты, увидели печи отжига, формование листового стекла, ламп накаливания и зеркал, производство художественного, декоративного стекла и витражи.\r\n', '2019-05-06', 'https://schelcol.ru/media/k2/items/cache/e1479c60fc7d7f4f708d42f869f837c8_L.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id_role` int(11) NOT NULL,
  `name` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id_role`, `name`) VALUES
(1, 'Администрация'),
(2, 'Преподаватель'),
(3, 'Студент');

-- --------------------------------------------------------

--
-- Структура таблицы `specialities`
--

CREATE TABLE `specialities` (
  `id_speciality` int(11) NOT NULL,
  `name` varchar(35) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `learnperiod` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `specialities`
--

INSERT INTO `specialities` (`id_speciality`, `name`, `learnperiod`) VALUES
(1, 'Информационные системы', '4 года'),
(2, 'Земельные отношения', '4 года');

-- --------------------------------------------------------

--
-- Структура таблицы `students`
--

CREATE TABLE `students` (
  `id_student` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_group` int(11) NOT NULL,
  `birth` date NOT NULL,
  `number` varchar(12) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `students`
--

INSERT INTO `students` (`id_student`, `name`, `id_group`, `birth`, `number`, `id_role`, `id_user`, `email`) VALUES
(1, 'Попов Александр Дмитриевич', 1, '2019-05-07', '+70000000000', 3, 1, 'mrreads@yandex.com'),
(2, 'Иван Иванов Иванович', 2, '2019-05-07', '+70000000000', 3, 2, 'petrov2001@mail.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `subjects`
--

CREATE TABLE `subjects` (
  `id_subject` int(11) NOT NULL,
  `name` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_speciality` int(11) NOT NULL,
  `id_teacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `subjects`
--

INSERT INTO `subjects` (`id_subject`, `name`, `id_speciality`, `id_teacher`) VALUES
(1, 'Программирование', 1, 1),
(2, 'Экономика', 2, 2),
(3, 'Архитектура компьютера', 1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `teachers`
--

CREATE TABLE `teachers` (
  `id_teacher` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `birth` date NOT NULL,
  `number` varchar(12) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_classroom` int(11) NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `teachers`
--

INSERT INTO `teachers` (`id_teacher`, `name`, `birth`, `number`, `id_role`, `id_user`, `id_classroom`, `email`) VALUES
(1, 'Овчинников Антон Викторович', '2019-05-16', '+70000000000', 2, 3, 1, 'example@mail.ru'),
(2, 'Гайдуков Игорь Михайлович', '2019-05-20', '+70000000000', 2, 4, 3, 'example@mail.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `tutorials`
--

CREATE TABLE `tutorials` (
  `id_tutorial` int(11) NOT NULL,
  `name` varchar(35) NOT NULL,
  `author` varchar(30) NOT NULL,
  `type` varchar(15) NOT NULL,
  `id_subject` int(11) NOT NULL,
  `fileurl` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tutorials`
--

INSERT INTO `tutorials` (`id_tutorial`, `name`, `author`, `type`, `id_subject`, `fileurl`) VALUES
(1, 'Современные операционные системы', 'Эндрю Таненбаум', 'Книга', 3, ''),
(2, 'Архитектура компьютера', 'Эндрю Таненбаум', 'Книга', 3, '');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `login` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `login`, `email`, `password`, `id_role`) VALUES
(1, 'student1', 'student1@mail.ru', '123', 3),
(2, 'student2', 'student2@mail.ru', '123', 3),
(3, 'teacher1', 'teacher1@mail.ru', '123', 2),
(4, 'teacher2', 'teacher2@mail.ru', '123', 2),
(5, 'admin1', 'admin1@mail.ru', '123', 1),
(6, 'admin2', 'admin2@mail.ru', '123', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `administrations`
--
ALTER TABLE `administrations`
  ADD PRIMARY KEY (`id_administration`),
  ADD KEY `id_classroom` (`id_classroom`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `classrooms`
--
ALTER TABLE `classrooms`
  ADD PRIMARY KEY (`id_classroom`);

--
-- Индексы таблицы `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id_course`),
  ADD KEY `id_teacher` (`id_teacher`);

--
-- Индексы таблицы `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id_event`),
  ADD KEY `id_teacher` (`id_teacher`);

--
-- Индексы таблицы `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id_group`),
  ADD KEY `id_speciality` (`id_speciality`),
  ADD KEY `id_classroom` (`id_classroom`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Индексы таблицы `specialities`
--
ALTER TABLE `specialities`
  ADD PRIMARY KEY (`id_speciality`);

--
-- Индексы таблицы `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id_student`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_group` (`id_group`);

--
-- Индексы таблицы `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id_subject`),
  ADD KEY `id_speciality` (`id_speciality`),
  ADD KEY `id_teacher` (`id_teacher`);

--
-- Индексы таблицы `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id_teacher`),
  ADD UNIQUE KEY `id_classroom_2` (`id_classroom`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `id_classroom` (`id_classroom`);

--
-- Индексы таблицы `tutorials`
--
ALTER TABLE `tutorials`
  ADD PRIMARY KEY (`id_tutorial`),
  ADD KEY `id_subject` (`id_subject`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `administrations`
--
ALTER TABLE `administrations`
  MODIFY `id_administration` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `classrooms`
--
ALTER TABLE `classrooms`
  MODIFY `id_classroom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `courses`
--
ALTER TABLE `courses`
  MODIFY `id_course` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `events`
--
ALTER TABLE `events`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `groups`
--
ALTER TABLE `groups`
  MODIFY `id_group` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `specialities`
--
ALTER TABLE `specialities`
  MODIFY `id_speciality` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `students`
--
ALTER TABLE `students`
  MODIFY `id_student` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id_subject` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id_teacher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `tutorials`
--
ALTER TABLE `tutorials`
  MODIFY `id_tutorial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `administrations`
--
ALTER TABLE `administrations`
  ADD CONSTRAINT `administrations_ibfk_1` FOREIGN KEY (`id_classroom`) REFERENCES `classrooms` (`id_classroom`),
  ADD CONSTRAINT `administrations_ibfk_2` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id_role`),
  ADD CONSTRAINT `administrations_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ограничения внешнего ключа таблицы `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`id_teacher`);

--
-- Ограничения внешнего ключа таблицы `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`id_teacher`);

--
-- Ограничения внешнего ключа таблицы `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_ibfk_1` FOREIGN KEY (`id_speciality`) REFERENCES `specialities` (`id_speciality`),
  ADD CONSTRAINT `groups_ibfk_2` FOREIGN KEY (`id_classroom`) REFERENCES `classrooms` (`id_classroom`);

--
-- Ограничения внешнего ключа таблицы `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id_role`),
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `students_ibfk_3` FOREIGN KEY (`id_group`) REFERENCES `groups` (`id_group`);

--
-- Ограничения внешнего ключа таблицы `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_ibfk_1` FOREIGN KEY (`id_speciality`) REFERENCES `specialities` (`id_speciality`),
  ADD CONSTRAINT `subjects_ibfk_2` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`id_teacher`);

--
-- Ограничения внешнего ключа таблицы `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `teachers_ibfk_3` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id_role`),
  ADD CONSTRAINT `teachers_ibfk_4` FOREIGN KEY (`id_classroom`) REFERENCES `classrooms` (`id_classroom`);

--
-- Ограничения внешнего ключа таблицы `tutorials`
--
ALTER TABLE `tutorials`
  ADD CONSTRAINT `tutorials_ibfk_1` FOREIGN KEY (`id_subject`) REFERENCES `subjects` (`id_subject`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
