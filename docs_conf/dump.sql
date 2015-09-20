-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Ven 30 Septembre 2011 à 23:34
-- Version du serveur: 5.5.9
-- Version de PHP: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Base de données: `alice`
--

-- --------------------------------------------------------

--
-- Structure de la table `attendance`
--

CREATE TABLE `attendance` (
  `id_attend` int(11) NOT NULL AUTO_INCREMENT,
  `id_emp` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  PRIMARY KEY (`id_attend`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='recencement des inscriptions aux evenements' AUTO_INCREMENT=3 ;

--
-- Contenu de la table `attendance`
--

INSERT INTO `attendance` VALUES(2, 2, 10);

-- --------------------------------------------------------

--
-- Structure de la table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_nom` varchar(50) NOT NULL,
  `emp_username` varchar(10) NOT NULL,
  `emp_mdp` varchar(50) NOT NULL,
  `emp_succursale` set('romambob_qg','romanbob_succursale_1','romanbob_succursale_2','romanbob_succursale_3','romanbob_succursale_4','romanbob_succursale_5','romanbob_succursale_6','romanbob_succursale_7','romanbob_succursale_8','romanbob_succursale_9','romanbob_succursale_10','romanbob_succursale_11','romanbob_succursale_12','romanbob_succursale_13') NOT NULL,
  `emp_rang` enum('standard','delegate','alice') NOT NULL,
  PRIMARY KEY (`emp_id`),
  UNIQUE KEY `PSEUDO` (`emp_username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='table des personnes' AUTO_INCREMENT=24 ;

--
-- Contenu de la table `employee`
--

INSERT INTO `employee` VALUES(1, 'Alice Nevers', 'anevers', 'ab4f63f9ac65152575886860dde480a1', 'romambob_qg', 'alice');
INSERT INTO `employee` VALUES(2, 'Florence Pernel', 'fpernel', 'ab4f63f9ac65152575886860dde480a1', 'romanbob_succursale_1', 'delegate');
INSERT INTO `employee` VALUES(3, 'Frederique Diefenthal', 'fdiefentha', 'ab4f63f9ac65152575886860dde480a1', 'romanbob_succursale_2', 'delegate');
INSERT INTO `employee` VALUES(4, 'Florence Larrieu', 'flarrieu', 'ab4f63f9ac65152575886860dde480a1', 'romanbob_succursale_3', 'delegate');
INSERT INTO `employee` VALUES(5, 'Marine Delterme', 'mdelterme', 'ab4f63f9ac65152575886860dde480a1', 'romanbob_succursale_4', 'delegate');
INSERT INTO `employee` VALUES(6, 'Colette Colas', 'ccolas', 'ab4f63f9ac65152575886860dde480a1', 'romanbob_succursale_5', 'delegate');
INSERT INTO `employee` VALUES(7, 'Fred Marquand', 'fmarquand', 'ab4f63f9ac65152575886860dde480a1', 'romanbob_succursale_6', 'delegate');
INSERT INTO `employee` VALUES(8, 'Ludovic Baquet', 'lbaquet', 'ab4f63f9ac65152575886860dde480a1', 'romanbob_succursale_7', 'delegate');
INSERT INTO `employee` VALUES(9, 'Richaud Valls', 'rvalls', 'ab4f63f9ac65152575886860dde480a1', 'romanbob_succursale_8', 'delegate');
INSERT INTO `employee` VALUES(10, 'Alexandra Brasseuse', 'abrasseuse', 'ab4f63f9ac65152575886860dde480a1', 'romanbob_succursale_9', 'delegate');
INSERT INTO `employee` VALUES(11, 'Catherine Alcover', 'calcover', 'ab4f63f9ac65152575886860dde480a1', 'romanbob_succursale_10', 'delegate');
INSERT INTO `employee` VALUES(12, 'Anne-Marie Philipe', 'amphilipe', 'ab4f63f9ac65152575886860dde480a1', 'romanbob_succursale_11', 'delegate');
INSERT INTO `employee` VALUES(13, 'Jean Dell', 'jdell', 'ab4f63f9ac65152575886860dde480a1', 'romanbob_succursale_12', 'delegate');
INSERT INTO `employee` VALUES(14, 'Noam Morgensztern', 'nmorgenszt', 'ab4f63f9ac65152575886860dde480a1', 'romanbob_succursale_13', 'delegate');
INSERT INTO `employee` VALUES(15, 'Arnaud Binard', 'abinard', 'ab4f63f9ac65152575886860dde480a1', 'romanbob_succursale_1', 'standard');
INSERT INTO `employee` VALUES(16, 'Pierre Santini', 'psantini', 'ab4f63f9ac65152575886860dde480a1', 'romanbob_succursale_5', 'standard');
INSERT INTO `employee` VALUES(17, 'Alex Varga', 'avarga', 'ab4f63f9ac65152575886860dde480a1', 'romanbob_succursale_8', 'standard');
INSERT INTO `employee` VALUES(18, 'Aurelien Wiik', 'awiik', 'ab4f63f9ac65152575886860dde480a1', 'romanbob_succursale_9', 'standard');
INSERT INTO `employee` VALUES(19, 'Mathieu Bremont', 'mbremont', 'ab4f63f9ac65152575886860dde480a1', 'romanbob_succursale_10', 'standard');
INSERT INTO `employee` VALUES(20, 'Patricia Tribunal', 'ptribunal', 'ab4f63f9ac65152575886860dde480a1', 'romanbob_succursale_11', 'standard');
INSERT INTO `employee` VALUES(21, 'Layla Juje', 'ljuge', 'ab4f63f9ac65152575886860dde480a1', 'romanbob_succursale_12', 'standard');
INSERT INTO `employee` VALUES(22, 'Gregori Forette', 'gforette', 'ab4f63f9ac65152575886860dde480a1', 'romanbob_succursale_13', 'standard');
INSERT INTO `employee` VALUES(23, 'Elizabeth Ounfham', 'eounfham', 'ab4f63f9ac65152575886860dde480a1', 'romanbob_succursale_5', 'standard');

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_ajoutpar` int(11) NOT NULL COMMENT 'id de alice ou de delegate',
  `event_date` int(11) NOT NULL,
  `event_datefin` int(11) NOT NULL,
  `event_lieu` varchar(100) NOT NULL,
  `event_theme` varchar(100) NOT NULL DEFAULT 'Événement' COMMENT 'def evenemnt si ni rencontre cadre, ni salon, ni webex...',
  `event_presentepar` varchar(255) NOT NULL,
  `event_description` text NOT NULL,
  `event_capacitemax` int(11) NOT NULL,
  `event_remplissage` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='table des evenements' AUTO_INCREMENT=18 ;

--
-- Contenu de la table `event`
--

INSERT INTO `event` VALUES(1, 1, 1314858600, 1314863800, 'Laboratoires Romambob', 'Lancement du site', 'Noëlle Loriot', 'Site tout neuf !', 42, 0);
INSERT INTO `event` VALUES(2, 1, 1315823112, 1315828312, 'paris', 'inauguration', 'N Loriot', '.', 42, 0);
INSERT INTO `event` VALUES(4, 1, 1315827258, 1315832458, 'paris', 'test', 'G', '.', 42, 0);
INSERT INTO `event` VALUES(5, 0, 587023680, 587028880, 'gonesse', 'test', 'C', '.', 42, 0);
INSERT INTO `event` VALUES(6, 0, 1322723280, 1322728480, 'gonesse', 'test', 'C', '.', 42, 0);
INSERT INTO `event` VALUES(7, 1, 1315717620, 1315722820, 'Grece', 'Remplissage', 'Socrate', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec quam vitae mi eleifend imperdiet in nec libero. Donec tellus urna, sagittis id lobortis sed, pretium vel elit. Aliquam id massa in dolor fermentum varius id sed lectus. Nulla consequat commodo tempus. Duis quam nisi, feugiat id pretium non, lacinia a massa. Aenean ut egestas urna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac ultrices mi. Donec lacus lectus, pharetra sit amet consequat id, adipiscing sit amet turpis. Sed aliquam nibh eget massa ultrices imperdiet quis sit amet justo. Nam luctus pellentesque nisi, at euismod dolor placerat a. Curabitur vel nunc erat. Nullam adipiscing fermentum euismod. Nullam nulla urna, dignissim sit amet pulvinar vel, adipiscing sed augue. Quisque sit amet turpis non sem bibendum luctus at et lorem. Nulla quis nisl enim, eu dictum sem.', 1, 0);
INSERT INTO `event` VALUES(8, 0, 1319170020, 1319175220, 'Grece', 'Remplissage2', 'Platon', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec quam vitae mi eleifend imperdiet in nec libero. Donec tellus urna, sagittis id lobortis sed, pretium vel elit. Aliquam id massa in dolor fermentum varius id sed lectus. Nulla consequat commodo tempus. Duis quam nisi, feugiat id pretium non, lacinia a massa. Aenean ut egestas urna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac ultrices mi. Donec lacus lectus, pharetra sit amet consequat id, adipiscing sit amet turpis. Sed aliquam nibh eget massa ultrices imperdiet quis sit amet justo.', 3, 0);
INSERT INTO `event` VALUES(9, 1, 1321050600, 1321055800, 'Pouette', 'Bientôt les vacances !', 'Zorro...', 'test et Lorem.', 9, 0);
INSERT INTO `event` VALUES(10, 2, 1322039640, 1322044840, 'Suite', 'Événement lambda', 'Mwa', 'test avec delegate succursale 1', 2, 1);
INSERT INTO `event` VALUES(11, 6, 1322935200, 1322940400, 'Pôle Nord', 'Événement gamma', 'Renne de noël', 'essai succursale 5\r\n', 5, 0);
INSERT INTO `event` VALUES(12, 1, 1321059720, 1321064920, 'chez vous !', 'webex de présentation', 'Anne Honyme', 'Venez nombreuses et nombreux !', 3, 0);
INSERT INTO `event` VALUES(13, 2, 1324930380, 1324935580, 'Salon d\\''Ampion', 'Anniversaire de Tarte', 'Ampion', 'Venez nombreuses et nombreux !\r\nEt apportez des cadeaux !\r\nVous pouvez rester jusqu\\''au lendemain...', 45, 0);
INSERT INTO `event` VALUES(14, 1, 1301792520, 1301797720, 'ici', 'retour vers le futur', 'Doloréan', 'Venez nombreuses et nombreux !\r\nOn va swinguer comme des ancêtres !!\r\nC\\''est bon les brocolis !\r\nLes barres au chocolat aussi...\r\nUn petit LOREM...\r\nLLLLLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 12, 0);
INSERT INTO `event` VALUES(15, 1, 1317549780, 0, 'Everywhere...', 'Ajouter dates en fonction des continents', 'l\\''Horloge', 'Venez nombreuses et nombreux !\r\nSurtout de tous les continents.\r\nEt apportez des biscuits au beurre.', 8, 0);
INSERT INTO `event` VALUES(16, 6, 1322724600, 1322727300, 'Pise', 'Mon joli CHACHA', 'Yaourt', 'que pour moi !!', 1, 0);
INSERT INTO `event` VALUES(17, 2, 1354347000, 1354349700, 'Pise', 'Mon joli CHACHA le retour', 'Yaourt', 'Venez nombreuses et nombreux !', 42, 0);
