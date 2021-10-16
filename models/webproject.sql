-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : mar. 11 mai 2021 à 07:37
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `webproject`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `id_idea` int(11) NOT NULL,
  `description` text NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`id_comment`),
  KEY `fk_member_id_comment` (`member_id`),
  KEY `fk_idea_id_comment` (`id_idea`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id_comment`, `member_id`, `id_idea`, `description`, `deleted`, `creation_date`) VALUES
(1, 2, 2, 'Je suis totalement d\'accord ! Je veux rencontrer des gens autour d\'un bon sandwich thon mayo et d\'un capri-sun', 0, '2021-04-02 00:00:00'),
(2, 1, 2, 'J\'approuve ton idée sublimement belle je ne peux qu\'être d\'accord avec toi !!! Merci du fond du coeur pour cette merveilleuse idée.', 0, '2021-04-02 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `ideas`
--

DROP TABLE IF EXISTS `ideas`;
CREATE TABLE IF NOT EXISTS `ideas` (
  `id_idea` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `title` varchar(50) NOT NULL,
  `status` varchar(9) NOT NULL,
  `submitted_date` datetime NOT NULL,
  `accepted_date` datetime DEFAULT NULL,
  `refused_date` datetime DEFAULT NULL,
  `closed_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id_idea`),
  KEY `fk_member_id_idea` (`member_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ideas`
--

INSERT INTO `ideas` (`id_idea`, `member_id`, `description`, `title`, `status`, `submitted_date`, `accepted_date`, `refused_date`, `closed_date`) VALUES
(1, 1, 'Je trouves qu\'il n\'y a pas assez de bancs aux alentours de l\'école et qu\'il faut souvent rester debout ou s\'assoir par terre dans l\'herbe ou pire, le sol ! Je trouves ça absurdes venant d\'un établissement aussi grand que notre belle institut.', 'Ajouter des bancs', 'refused', '2021-04-02 00:00:00', '2021-05-07 11:14:45', '2021-05-07 13:24:58', NULL),
(2, 2, 'Je penses qu\'il faut augmenter le nombre de cafétaria de l\'école car il n\'y en a vraiment pas beaucoup et lorsqu\'il ne fait pas beau dehors on est obligé de sortir dehors pour manger alors que s\'il y avait de la place on pourrait tous manger en intérieur et par la même occasion rencontrer de nouvelles personnes étant donné que l\'on sera tous les uns à côté des autres', 'Cafétaria', 'submitted', '2021-04-02 00:00:00', NULL, NULL, NULL),
(3, 1, 'Je trouves ça aberrant qu\'il n\'y ai pas encore de connexion wifi Haut débit partout sur le campus et pas seulement dans les établissements ! Je ne peux pas me permettre d\'utiliser mes données mobiles une fois sortie de l\'école durant toutes mes pauses ! Je veux une connexion wifi stable en dehors des locaux allant jusqu\'au snack pour déguster mes frittes devant ma série Netflix', 'Wifi haut débit sur tout le campus', 'submitted', '2021-04-02 00:00:00', NULL, NULL, NULL),
(4, 8, '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi aliquet id libero nec dictum. Etiam sollicitudin dui urna, vel egestas augue iaculis sit amet. Aenean elementum vitae elit quis elementum. Ut erat felis, consectetur non neque eleifend, dignissim semper orci. Suspendisse potenti posuere.\r\n\r\n', 'lorem ipsum', 'submitted', '2021-05-07 12:11:28', NULL, NULL, NULL),
(5, 8, '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi aliquet id libero nec dictum. Etiam sollicitudin dui urna, vel egestas augue iaculis sit amet. Aenean elementum vitae elit quis elementum. Ut erat felis, consectetur non neque eleifend, dignissim semper orci. Suspendisse potenti posuere.\r\n\r\n', 'lorem ipsum', 'submitted', '2021-05-07 12:11:28', NULL, NULL, NULL),
(6, 1, '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi aliquet id libero nec dictum. Etiam sollicitudin dui urna, vel egestas augue iaculis sit amet. Aenean elementum vitae elit quis elementum. Ut erat felis, consectetur non neque eleifend, dignissim semper orci. Suspendisse potenti posuere.\r\n\r\n', 'lorem ipsum', 'submitted', '2021-05-07 12:12:44', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` char(60) NOT NULL,
  `mail` varchar(250) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `disabled` tinyint(1) NOT NULL,
  PRIMARY KEY (`member_id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `mail` (`mail`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `members`
--

INSERT INTO `members` (`member_id`, `username`, `password`, `mail`, `admin`, `disabled`) VALUES
(1, 'soulaymane', '$2y$10$cJSDF9yTzsohn0LyzKQkIO8KSWA6b4kh9t84nEO9gEb2FszQ7cXlq', 'soulaymane.gharroudi@student.vinci.be', 1, 0),
(2, 'ayoub', '$2y$10$cJSDF9yTzsohn0LyzKQkIO8KSWA6b4kh9t84nEO9gEb2FszQ7cXlq', 'ayoub.lamkadam@student.vinci.be', 1, 0),
(8, 'd', '$2y$10$cJSDF9yTzsohn0LyzKQkIO8KSWA6b4kh9t84nEO9gEb2FszQ7cXlq', 'test2@gmail.com', 0, 0),
(9, 'souli', '$2y$10$CqpMzophgTQxgNvUV5vSZ.N2ZS.ehM4bU8A9GWGxhsT0weXesagzi', 'souli@gmail.com', 1, 0),
(10, 'nonadmin', '$2y$10$kiTP69H.7mSv6jCPNKxSxurNtWxuhYcSOtmNxA3uaMnQI3FqYmjJC', 'nonadmin@gmail.com', 0, 0),
(11, 'test', '$2y$10$xAsBTETCxs3H07eF9NJ/Be3mJ7tYvG.sjcwQ3DWYzJdKcusVVcGDu', 'teest@gmail.com', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `votes`
--

DROP TABLE IF EXISTS `votes`;
CREATE TABLE IF NOT EXISTS `votes` (
  `id_idea` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  PRIMARY KEY (`id_idea`,`member_id`),
  KEY `fk_member_id_vote` (`member_id`),
  KEY `fk_id_idea_vote` (`id_idea`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `votes`
--

INSERT INTO `votes` (`id_idea`, `member_id`) VALUES
(1, 1),
(2, 1),
(2, 2),
(3, 2);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_idea_id_comment` FOREIGN KEY (`id_idea`) REFERENCES `ideas` (`id_idea`),
  ADD CONSTRAINT `fk_member_id_comment` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`);

--
-- Contraintes pour la table `ideas`
--
ALTER TABLE `ideas`
  ADD CONSTRAINT `fk_member_id_idea` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`);

--
-- Contraintes pour la table `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `fk_idea_id_vote` FOREIGN KEY (`id_idea`) REFERENCES `ideas` (`id_idea`),
  ADD CONSTRAINT `fk_member_id_vote` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
