-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 07, 2022 at 12:39 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_kgb`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admins`
--

CREATE TABLE `Admins` (
  `id_admin` int(11) NOT NULL,
  `name_admin` varchar(50) NOT NULL,
  `firstname_admin` varchar(50) NOT NULL,
  `email_admin` varchar(100) NOT NULL,
  `password_admin` varchar(100) NOT NULL,
  `creation_admin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `secret_admin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Admins`
--

INSERT INTO `Admins` (`id_admin`, `name_admin`, `firstname_admin`, `email_admin`, `password_admin`, `creation_admin`, `secret_admin`) VALUES
(1, 'Abramov', 'Nicolai', 'nicolai@gmail.com', '1bfbdf35b1359fc6b6f93893874cf23a50293de5', '2022-09-30 14:33:31', '1bfbdf35b1359fc6b6f93893874cf23a50293de5'),
(2, 'Schmidt', 'Hans', 'hans@gmail.com', '78c9a53e2f28b543ea62c8266acfdf36d5c63e61', '2022-10-03 14:01:23', '78c9a53e2f28b543ea62c8266acfdf36d5c63e61');

-- --------------------------------------------------------

--
-- Table structure for table `Agents`
--

CREATE TABLE `Agents` (
  `id_agent` int(11) NOT NULL,
  `name_agent` varchar(50) NOT NULL,
  `firstname_agent` varchar(50) NOT NULL,
  `datebirthday_agent` date NOT NULL,
  `nationality_agent` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Agents`
--

INSERT INTO `Agents` (`id_agent`, `name_agent`, `firstname_agent`, `datebirthday_agent`, `nationality_agent`) VALUES
(0, 'Palmer', 'Harry', '1996-07-20', 'Etats-Unis'),
(1, 'Almeida', 'Tony', '1990-04-03', 'Etats-Unis'),
(2, 'Amasova', 'Anya', '1994-03-11', 'Russie'),
(3, 'Wolf', 'Markus', '1978-08-23', 'Allemagne'),
(4, 'Rondot', 'Philippe', '1978-08-17', 'France'),
(5, 'Denaud', 'Patrick', '1990-06-02', 'France'),
(6, 'Smith', 'John', '1998-09-11', 'Etats-Unis');

-- --------------------------------------------------------

--
-- Table structure for table `Agents_missions`
--

CREATE TABLE `Agents_missions` (
  `id_agent` int(11) NOT NULL,
  `code_mission` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Agents_missions`
--

INSERT INTO `Agents_missions` (`id_agent`, `code_mission`) VALUES
(4, 'Arès'),
(0, 'Ariane'),
(4, 'Ariane'),
(5, 'Ariane'),
(0, 'Ariane4'),
(1, 'Ariane4'),
(0, 'Ariane6'),
(0, 'Ariane8'),
(5, 'Athéna'),
(2, 'Hadès'),
(2, 'Héra'),
(2, 'Jupiter'),
(3, 'Jupiter'),
(4, 'Jupiter'),
(4, 'Minotaure '),
(3, 'Pluton'),
(6, 'Pluton'),
(6, 'Poséidon');

-- --------------------------------------------------------

--
-- Table structure for table `Contacts`
--

CREATE TABLE `Contacts` (
  `code_contact` varchar(50) NOT NULL,
  `name_contact` varchar(50) NOT NULL,
  `firstname_contact` varchar(50) NOT NULL,
  `datebirthday_contact` date NOT NULL,
  `nationality_contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Contacts`
--

INSERT INTO `Contacts` (`code_contact`, `name_contact`, `firstname_contact`, `datebirthday_contact`, `nationality_contact`) VALUES
('Abandinus ', 'Williams', 'Bruce', '1980-05-19', 'Etats-Unis'),
('Abellio', 'Drouot', 'Jean', '1976-01-22', 'France'),
('Belenus', 'Petrova', 'Igor', '2000-09-17', 'Russie'),
('Epona', 'Droski', 'Dimitri', '1998-04-22', 'Russie'),
('Thoth', 'Smith', 'John', '1983-11-04', 'Etats-Unis');

-- --------------------------------------------------------

--
-- Table structure for table `Contacts_missions`
--

CREATE TABLE `Contacts_missions` (
  `code_contact` varchar(50) NOT NULL,
  `code_mission` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Contacts_missions`
--

INSERT INTO `Contacts_missions` (`code_contact`, `code_mission`) VALUES
('Abandinus ', 'Arès'),
('Thoth', 'Arès'),
('Abellio', 'Ariane'),
('Abellio', 'Athéna'),
('Abandinus ', 'Hadès'),
('Belenus', 'Héra'),
('Abellio', 'Jupiter'),
('Epona', 'Jupiter'),
('Abandinus ', 'Minotaure '),
('Thoth', 'Minotaure '),
('Abandinus ', 'Pluton'),
('Abellio', 'Poséidon');

-- --------------------------------------------------------

--
-- Table structure for table `Durations`
--

CREATE TABLE `Durations` (
  `id_duration` int(11) NOT NULL,
  `start_duration` date NOT NULL,
  `end_duration` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Durations`
--

INSERT INTO `Durations` (`id_duration`, `start_duration`, `end_duration`) VALUES
(1, '2022-09-26', '2022-12-31'),
(2, '2022-08-16', '2022-09-16'),
(3, '2022-08-15', '2022-11-30'),
(4, '2022-09-03', '2022-12-03'),
(5, '2022-10-27', '2023-01-29'),
(7, '2022-10-02', '2022-10-15'),
(8, '2022-09-27', '2022-12-31'),
(11, '2022-09-08', '2022-11-25');

-- --------------------------------------------------------

--
-- Table structure for table `Hideouts`
--

CREATE TABLE `Hideouts` (
  `id_hideout` int(11) NOT NULL,
  `address_hideout` text NOT NULL,
  `country_hideout` varchar(50) NOT NULL,
  `type_hideout` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Hideouts`
--

INSERT INTO `Hideouts` (`id_hideout`, `address_hideout`, `country_hideout`, `type_hideout`) VALUES
(11, '13 rue de la Chaussée d\'Antin 75009 Paris ', 'France', 'appartement'),
(22, '45 Bolchaïa Lakimanta, 115127 Moscou', 'Russie', 'appartement'),
(33, '33 rue du Port 17000 La Rochelle', 'France', 'maritime'),
(44, '	 17 Beak St, Soho, W1F 9RW, London', 'Angleterre', 'aérienne'),
(112, '1033 Santa Monica Boulevard, Washington D.C. 20559-6000', 'Etats-Unis', 'souterraine');

-- --------------------------------------------------------

--
-- Table structure for table `Hideouts_missions`
--

CREATE TABLE `Hideouts_missions` (
  `id_hideout` int(11) NOT NULL,
  `code_mission` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Hideouts_missions`
--

INSERT INTO `Hideouts_missions` (`id_hideout`, `code_mission`) VALUES
(112, 'Arès'),
(33, 'Ariane'),
(33, 'Athéna'),
(112, 'Hadès'),
(22, 'Héra'),
(22, 'Jupiter'),
(33, 'Jupiter'),
(112, 'Minotaure '),
(112, 'Pluton'),
(33, 'Poséidon');

-- --------------------------------------------------------

--
-- Table structure for table `Missions`
--

CREATE TABLE `Missions` (
  `code_mission` varchar(50) NOT NULL,
  `title_mission` varchar(100) NOT NULL,
  `description_mission` text,
  `country_mission` varchar(50) NOT NULL,
  `id_duration` int(11) NOT NULL,
  `code_status` varchar(20) NOT NULL,
  `name_type` varchar(30) NOT NULL,
  `name_speciality` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Missions`
--

INSERT INTO `Missions` (`code_mission`, `title_mission`, `description_mission`, `country_mission`, `id_duration`, `code_status`, `name_type`, `name_speciality`) VALUES
('Arès', 'Trafic d\'opium', 'Mission consistant à identifier les trafiquants', 'Etats-Unis', 2, 'en cours', 'Infiltration', 'montagne'),
('Ariane', 'Retrouver statuettes', 'Mission consistant à retrouver les 3 statuettes antiques issues du musée Dupré disparues             ', 'France', 3, 'en préparation', 'Surveillance', 'ville'),
('Athéna', 'Trafic de voitures volées', 'Mission consistant à retrouver des voleurs de voitures ', 'France', 3, 'en cours', 'Infiltration', 'ville'),
('Hadès', 'Prisons secrètes', 'Mission consistant à retrouver des prisons secrètes ', 'Etats-Unis', 4, 'échec', 'Surveillance', 'montagne'),
('Héra', 'Rechercher un espion', 'Mission consistant à désamorcer une bombe', 'Russie', 11, 'échec', 'Surveillance', 'montagne'),
('Jupiter', 'Trouver un espion', ' Mission consistant à trouver un pirate informatique  ', 'Russie', 4, 'en cours', 'Infiltration', 'ville'),
('Minotaure ', 'Fausse campagne de vaccination', 'Mission consistant à stopper des médecins frauduleux ', 'Etats-Unis', 4, 'en cours', 'Infiltration', 'montagne'),
('Pluton', 'Espionnage', 'Mission consistant à espionner des opposants politiques', 'Etats-Unis', 4, 'en cours', 'Infiltration', 'mer'),
('Poséidon', 'Trafic d\'armes', 'Mission consistant à identifier des trafiquants d\'armes ', 'France', 11, 'en préparation', 'Infiltration', 'ville');

-- --------------------------------------------------------

--
-- Table structure for table `Specialities`
--

CREATE TABLE `Specialities` (
  `name_speciality` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Specialities`
--

INSERT INTO `Specialities` (`name_speciality`) VALUES
('campagne'),
('étranger'),
('mer'),
('montagne'),
('ville');

-- --------------------------------------------------------

--
-- Table structure for table `Specialities_agents`
--

CREATE TABLE `Specialities_agents` (
  `name_speciality` varchar(50) NOT NULL,
  `id_agent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Specialities_agents`
--

INSERT INTO `Specialities_agents` (`name_speciality`, `id_agent`) VALUES
('mer', 0),
('montagne', 0),
('montagne', 1),
('ville', 1),
('mer', 2),
('montagne', 2),
('mer', 3),
('ville', 3),
('mer', 4),
('montagne', 4),
('ville', 4),
('ville', 5),
('mer', 6),
('ville', 6);

-- --------------------------------------------------------

--
-- Table structure for table `Status`
--

CREATE TABLE `Status` (
  `code_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Status`
--

INSERT INTO `Status` (`code_status`) VALUES
('échec'),
('en cours'),
('en préparation');

-- --------------------------------------------------------

--
-- Table structure for table `Targets`
--

CREATE TABLE `Targets` (
  `code_target` varchar(50) NOT NULL,
  `name_target` varchar(50) NOT NULL,
  `firstname_target` varchar(50) NOT NULL,
  `datebirthday_target` date NOT NULL,
  `nationality_target` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Targets`
--

INSERT INTO `Targets` (`code_target`, `name_target`, `firstname_target`, `datebirthday_target`, `nationality_target`) VALUES
('Anubis', 'Lewis', 'Oliver', '1983-11-04', 'Etats-Unis'),
('Bastet', 'Rossi', 'Bruna', '1997-02-13', 'Italie'),
('Geb', 'Dubois', 'Thomas', '2001-06-19', 'France'),
('Horus', 'Vasseur', 'Alexandre', '1980-12-20', 'France'),
('Isis', 'Petrov', 'Anna', '2001-04-23', 'Russie'),
('Thot', 'Schneider', 'Klaus', '1982-09-22', 'Allemagne');

-- --------------------------------------------------------

--
-- Table structure for table `Targets_missions`
--

CREATE TABLE `Targets_missions` (
  `code_target` varchar(50) NOT NULL,
  `code_mission` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Targets_missions`
--

INSERT INTO `Targets_missions` (`code_target`, `code_mission`) VALUES
('Anubis', 'Arès'),
('Anubis', 'Ariane'),
('Anubis', 'Athéna'),
('Geb', 'Athéna'),
('Anubis', 'Hadès'),
('Anubis', 'Héra'),
('Geb', 'Héra'),
('Anubis', 'Jupiter'),
('Anubis', 'Minotaure '),
('Thot', 'Pluton'),
('Geb', 'Poséidon');

-- --------------------------------------------------------

--
-- Table structure for table `Types`
--

CREATE TABLE `Types` (
  `name_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Types`
--

INSERT INTO `Types` (`name_type`) VALUES
('Assassinat'),
('Conflits d\'intérêts'),
('Cybersécurité'),
('Escroquerie'),
('Infiltration'),
('Surveillance'),
('Terrorisme');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admins`
--
ALTER TABLE `Admins`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `Agents`
--
ALTER TABLE `Agents`
  ADD PRIMARY KEY (`id_agent`);

--
-- Indexes for table `Agents_missions`
--
ALTER TABLE `Agents_missions`
  ADD PRIMARY KEY (`id_agent`,`code_mission`),
  ADD KEY `code_mission` (`code_mission`);

--
-- Indexes for table `Contacts`
--
ALTER TABLE `Contacts`
  ADD PRIMARY KEY (`code_contact`),
  ADD UNIQUE KEY `code_contact` (`code_contact`);

--
-- Indexes for table `Contacts_missions`
--
ALTER TABLE `Contacts_missions`
  ADD PRIMARY KEY (`code_contact`,`code_mission`),
  ADD KEY `code_mission` (`code_mission`);

--
-- Indexes for table `Durations`
--
ALTER TABLE `Durations`
  ADD PRIMARY KEY (`id_duration`),
  ADD UNIQUE KEY `id_duration` (`id_duration`);

--
-- Indexes for table `Hideouts`
--
ALTER TABLE `Hideouts`
  ADD PRIMARY KEY (`id_hideout`),
  ADD UNIQUE KEY `id_hideout` (`id_hideout`);

--
-- Indexes for table `Hideouts_missions`
--
ALTER TABLE `Hideouts_missions`
  ADD PRIMARY KEY (`id_hideout`,`code_mission`),
  ADD KEY `code_mission` (`code_mission`);

--
-- Indexes for table `Missions`
--
ALTER TABLE `Missions`
  ADD PRIMARY KEY (`code_mission`),
  ADD UNIQUE KEY `code_mission` (`code_mission`),
  ADD KEY `fk_id_duration` (`id_duration`),
  ADD KEY `fk_code_status` (`code_status`),
  ADD KEY `fk_name_type` (`name_type`),
  ADD KEY `name_speciality` (`name_speciality`);

--
-- Indexes for table `Specialities`
--
ALTER TABLE `Specialities`
  ADD PRIMARY KEY (`name_speciality`),
  ADD UNIQUE KEY `name_speciality` (`name_speciality`);

--
-- Indexes for table `Specialities_agents`
--
ALTER TABLE `Specialities_agents`
  ADD PRIMARY KEY (`name_speciality`,`id_agent`),
  ADD KEY `id_agent` (`id_agent`);

--
-- Indexes for table `Status`
--
ALTER TABLE `Status`
  ADD PRIMARY KEY (`code_status`),
  ADD UNIQUE KEY `code_status` (`code_status`);

--
-- Indexes for table `Targets`
--
ALTER TABLE `Targets`
  ADD PRIMARY KEY (`code_target`),
  ADD UNIQUE KEY `code_target` (`code_target`);

--
-- Indexes for table `Targets_missions`
--
ALTER TABLE `Targets_missions`
  ADD PRIMARY KEY (`code_target`,`code_mission`),
  ADD KEY `fk_code_mission` (`code_mission`);

--
-- Indexes for table `Types`
--
ALTER TABLE `Types`
  ADD PRIMARY KEY (`name_type`),
  ADD UNIQUE KEY `name_type` (`name_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Admins`
--
ALTER TABLE `Admins`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Agents`
--
ALTER TABLE `Agents`
  MODIFY `id_agent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Agents_missions`
--
ALTER TABLE `Agents_missions`
  ADD CONSTRAINT `fk_id_agent` FOREIGN KEY (`id_agent`) REFERENCES `Agents` (`id_agent`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Contacts_missions`
--
ALTER TABLE `Contacts_missions`
  ADD CONSTRAINT `fk_code_contact` FOREIGN KEY (`code_contact`) REFERENCES `Contacts` (`code_contact`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Hideouts_missions`
--
ALTER TABLE `Hideouts_missions`
  ADD CONSTRAINT `fk_id_hideout` FOREIGN KEY (`id_hideout`) REFERENCES `Hideouts` (`id_hideout`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Missions`
--
ALTER TABLE `Missions`
  ADD CONSTRAINT `fk_code_status` FOREIGN KEY (`code_status`) REFERENCES `Status` (`code_status`),
  ADD CONSTRAINT `fk_id_duration` FOREIGN KEY (`id_duration`) REFERENCES `Durations` (`id_duration`),
  ADD CONSTRAINT `fk_name_type` FOREIGN KEY (`name_type`) REFERENCES `Types` (`name_type`);

--
-- Constraints for table `Specialities_agents`
--
ALTER TABLE `Specialities_agents`
  ADD CONSTRAINT `fk_name_speciality` FOREIGN KEY (`name_speciality`) REFERENCES `Specialities` (`name_speciality`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Targets_missions`
--
ALTER TABLE `Targets_missions`
  ADD CONSTRAINT `fk_code_mission` FOREIGN KEY (`code_mission`) REFERENCES `Missions` (`code_mission`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_code_target` FOREIGN KEY (`code_target`) REFERENCES `Targets` (`code_target`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
