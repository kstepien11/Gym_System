SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `phouse_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE phouse_db;

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `address` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `zip_code` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `address` (`id`, `address`, `city`, `zip_code`) VALUES
(1, '118 Victoria Road', 'Edinburgh', 'FK2 7AX'),
(2, '7096 Randy Circle', 'Faisalābād', '48101'),
(3, '13 Blackbird Way', 'Lages', '88500-000'),
(4, '520 Lighthouse Bay Hill', 'Ithari', '123441'),
(5, '6 Tennyson Park', 'Batsari', '124122'),
(6, '88304 Columbus Junction', 'Brejo Santo', '63260-000'),
(7, '3666 Morning Pass', 'Alaminos', '4001'),
(8, '677 Muir Parkway', 'Kiikala', '25390'),
(9, '510 Johnson Way', 'Heřmanova Huť', '330 24'),
(10, '65 Carpenter Drive', '‘Afrīn', '443322'),
(11, '1806 Orin Drive', 'Montpellier', '34186 CEDEX 4'),
(12, '7096 Randy Circle', 'Faisalābād', '48101'),
(13, '13 Blackbird Way', 'Lages', '88500-000'),
(14, '520 Lighthouse Bay Hill', 'Ithari', '123441'),
(15, '48265 Wood Alley', 'Chicago', '12332'),
(17, '118 Falkirk', 'Edinburgh', 'fk2 7ax'),
(18, '118 Falkirk', 'Falkirk', 'FK2 7AZ');

CREATE TABLE `addresspt` (
  `id` int(11) NOT NULL,
  `address` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `zip_code` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `addresspt` (`id`, `address`, `city`, `zip_code`) VALUES
(1, '20730 Dakota Plaza', 'Santa Maria da Vitória', '47640-000'),
(2, '118', 'Edinburgh', 'FK2 7AX'),
(3, '3457 Stuart Center', 'Lívingston', '18002'),
(4, '87 Transport Road', 'San Juan', '00928'),
(5, '080 Eagle Crest Point', 'Shchukino', '452034'),
(6, '6474 Nova Way', 'Benito Juarez', '41800'),
(7, '1600 Michigan Parkway', 'Arujá', '07400-000'),
(8, 'Hobbiton', 'Shire', '0038'),
(9, '118', 'falkirk', 'fk2 7ax'),
(11, '118', 'stirling', 'fk2 7ax'),
(15, '118', 'Edinburgh', 'EH51 9AF');

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `type` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `class` (`id`, `type`) VALUES
(1, 'Strongman'),
(2, 'Bodybuilding'),
(3, 'Powerlifting');

CREATE TABLE `class_timetable` (
  `id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `day` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `start_time` time NOT NULL,
  `end_date` date NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `class_timetable` (`id`, `start_date`, `day`, `start_time`, `end_date`, `class_id`) VALUES
(1, '2018-11-11', 'Monday', '09:00:00', '2020-11-11', 1),
(2, '2018-11-12', 'Tuesday', '11:00:00', '2020-11-11', 2),
(3, '2018-11-13', 'Wednesday', '11:00:00', '2020-11-11', 3);

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `second_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `class_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `customer` (`id`, `first_name`, `second_name`, `phone_number`, `email`, `class_id`) VALUES
(1, 'Donald', 'Barszcz', '55012934', 'db@gmail.com', 1),
(2, 'Cory', 'Woollcott', '1568492738', 'cwoollcott1@jigsy.com', 1),
(3, 'Rowan', 'Scorey', '3618670300', 'rscorey2@elegantthemes.com', 2),
(4, 'Jeffry', 'Colbert', '8378918700', 'jcolbert3@nationalgeographic.com', 2),
(5, 'Griffin', 'Regan', '1316068658', 'gregan4@reverbnation.com', 2),
(6, 'Costa', 'Faldo', '4884803736', 'cfaldo5@google.com.br', 2),
(7, 'Harlene', 'Leal', '5703206139', 'hleal6@toplist.cz', 2),
(8, 'Cymbre', 'Rizon', '8997113078', 'crizon7@comsenz.com', 1),
(9, 'Manuel', 'Hamberston', '9557384716', 'mhamberston8@huffingtonpost.com', 1),
(10, 'Sampson', 'Halms', '9778816358', 'shalms9@bizjournals.com', 1),
(11, 'Kare', 'Escritt', '4274346952', 'kescritta@rambler.ru', 1),
(12, 'Trescha', 'Hawke', '1274537959', 'thawkeb@ovh.net', 3),
(13, 'Dari', 'Beelby', '6347896160', 'dbeelbyc@scribd.com', 3),
(14, 'Penn', 'Janssen', '9248347523', 'pjanssend@xrea.com', 3),
(15, 'Dell', 'Crimin', '2755138733', 'dcrimine@admin.ch', 3),
(17, 'Bobi', 'Bobberson', '099421522', 'bb@gmail.com', 3),
(18, 'Abdu', 'Abe', '099421522', 'bb@gmail.com', 2);

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(2) NOT NULL DEFAULT '2',
  `emp_class_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `employee` (`id`, `email`, `first_name`, `last_name`, `phone_number`, `password`, `type`, `emp_class_id`) VALUES
(1, 'admin@admin.gov', 'krzysztof', 'Stepien', '099421522', '$2y$10$lqHm7YPKdIrFy3tWpwjG1eRzPANCm3xJw6vvF5ylJhAzBVinJRZBy', 1, 1),
(2, 'pt@pt.com', 'Personal', 'Trainer', '099421522', '$2y$10$70ZBKmesqQYWRmrxwI8ZJ.w7YfFXyBzJrBzk1W42OtafygdbZSlbK', 2, 1),
(3, 'bingre1@businesswire.com', 'Basil', 'Ingre', '5701443536', '$2y$10$70ZBKmesqQYWRmrxwI8ZJ.w7YfFXyBzJrBzk1W42OtafygdbZSlbK', 2, 2),
(4, 'crolance2@flickr.com', 'Clemente', 'Rolance', '3788613981', '$2y$10$70ZBKmesqQYWRmrxwI8ZJ.w7YfFXyBzJrBzk1W42OtafygdbZSlbK', 2, 2),
(5, 'awomersley3@vinaora.com', 'Adriaens', 'Womersley', '8649496398', '$2y$10$70ZBKmesqQYWRmrxwI8ZJ.w7YfFXyBzJrBzk1W42OtafygdbZSlbK', 2, 3),
(6, 'thandyside4@facebook.com', 'Tomasina', 'Handyside', '9862225356', '$2y$10$70ZBKmesqQYWRmrxwI8ZJ.w7YfFXyBzJrBzk1W42OtafygdbZSlbK', 2, 3),
(7, 'jchesshyre5@homestead.com', 'Jennifer', 'Chesshyre', '4988640580', '$2y$10$70ZBKmesqQYWRmrxwI8ZJ.w7YfFXyBzJrBzk1W42OtafygdbZSlbK', 2, 2),
(8, 'fb@gmail.com', 'Frodo', 'Baggins', '0993882', '$2y$10$70ZBKmesqQYWRmrxwI8ZJ.w7YfFXyBzJrBzk1W42OtafygdbZSlbK', 2, 1),
(9, '90kstepien@gmail.com', 'krzysztof', 'Stepien', '099421522', '$2y$10$70ZBKmesqQYWRmrxwI8ZJ.w7YfFXyBzJrBzk1W42OtafygdbZSlbK', 2, 1),
(11, 'dd@gmail.com', 'Donald', 'Duck', '099421522', '$2y$10$lH.E5Dh6Gi85G5VNW8PllO0.YipRPyMclVps2Oua22haQLUl.5HEa', 2, 1),
(15, 'bb@gmail.com', 'Bugs', 'Bunny', '03314882', '$2y$10$qexUXb1tJ70lsUgxEjo96OxeOE6.fiYVOL5oSdZ4krunxsBt2wdYy', 2, 3);

CREATE TABLE `emp_type` (
  `id` int(11) NOT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `emp_type` (`id`, `type`) VALUES
(1, 'admin'),
(2, 'personal trainer');

CREATE TABLE `exercise` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `exercise` (`id`, `name`, `class_id`) VALUES
(1, 'squat', 3),
(2, 'deadlift', 3),
(3, 'bench press', 3),
(4, 'dips', 2),
(5, 'bent over rows', 2),
(6, 'pull ups', 2),
(7, 'sled push and pull', 1),
(8, 'atlas stone lift', 1),
(9, 'overhead dumbell press', 1),
(10, 'curls', 2),
(11, 'cable pulldown', 2),
(12, 'calves training', 2),
(13, 'posing', 2);

CREATE TABLE `measurement_type` (
  `id` int(11) NOT NULL,
  `type` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `cus_id` int(11) NOT NULL,
  `value_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `measurement_value` (
  `id` int(11) NOT NULL,
  `value` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `other_result` (
  `id` int(11) NOT NULL,
  `description` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `result_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `exer_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `time_results` (
  `id` int(20) NOT NULL,
  `result` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `result_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `weightlifts` (
  `id` int(11) NOT NULL,
  `wieght` int(11) NOT NULL,
  `result_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `addresspt`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `class_timetable`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`);

ALTER TABLE `emp_type`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `exercise`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `measurement_type`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `measurement_value`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `other_result`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `time_results`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `weightlifts`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
ALTER TABLE `addresspt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
ALTER TABLE `exercise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
ALTER TABLE `measurement_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `measurement_value`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `other_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `time_results`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
