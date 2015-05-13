--jbrach02
-- phpMyAdmin SQL Dump
-- version 4.1.11
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 13 Mai 2015 à 16:09
-- Version du serveur :  5.5.41-0+wheezy1
-- Version de PHP :  5.4.36-0+deb7u3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `jbrach02`
--

-- --------------------------------------------------------

--
-- Structure de la table `sta_annees`
--

CREATE TABLE IF NOT EXISTS `sta_annees` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `diplome` varchar(50) CHARACTER SET latin1 NOT NULL,
  `description` varchar(100) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `sta_annees_etudiants`
--

CREATE TABLE IF NOT EXISTS `sta_annees_etudiants` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `moyAn` float NOT NULL,
  `admis` tinyint(1) NOT NULL,
  `compensable` tinyint(1) NOT NULL,
  `etudiants_id` int(10) NOT NULL,
  `annees_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `etudiants_id` (`etudiants_id`),
  KEY `annees_id` (`annees_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `sta_enseignants`
--

CREATE TABLE IF NOT EXISTS `sta_enseignants` (
  `users_id` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`users_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `sta_enseignants_ues`
--

CREATE TABLE IF NOT EXISTS `sta_enseignants_ues` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `enseignants_id` int(10) NOT NULL,
  `ues_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `enseignants_id` (`enseignants_id`),
  KEY `ues_id` (`ues_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `sta_etudiants`
--

CREATE TABLE IF NOT EXISTS `sta_etudiants` (
  `users_id` int(10) NOT NULL AUTO_INCREMENT,
  `numero` varchar(50) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`users_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `sta_etudiants_semestres`
--

CREATE TABLE IF NOT EXISTS `sta_etudiants_semestres` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `moySem` float NOT NULL,
  `valide` tinyint(1) NOT NULL,
  `compensable` tinyint(1) NOT NULL,
  `etudiants_id` int(10) NOT NULL,
  `semestres_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `etudiants_id` (`etudiants_id`),
  KEY `semestres_id` (`semestres_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `sta_etudiants_types_notes_ues`
--

CREATE TABLE IF NOT EXISTS `sta_etudiants_types_notes_ues` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `absence` tinyint(1) NOT NULL,
  `session1` tinyint(1) NOT NULL,
  `note` float DEFAULT NULL,
  `ues_id` int(10) NOT NULL,
  `types_notes_id` int(10) NOT NULL,
  `etudiants_id` int(10) NOT NULL,
  `typeAbsence` varchar(5) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ues_id` (`ues_id`),
  KEY `types_notes_id` (`types_notes_id`),
  KEY `etudiants_id` (`etudiants_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `sta_etudiants_ues`
--

CREATE TABLE IF NOT EXISTS `sta_etudiants_ues` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `dispense` tinyint(1) NOT NULL,
  `ues_id` int(10) NOT NULL,
  `etudiants_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ues_id` (`ues_id`),
  KEY `etudiants_id` (`etudiants_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `sta_responsables`
--

CREATE TABLE IF NOT EXISTS `sta_responsables` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `enseignants_id` int(10) NOT NULL,
  `ues_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `enseignants_id` (`enseignants_id`),
  KEY `ues_id` (`ues_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `sta_semestres`
--

CREATE TABLE IF NOT EXISTS `sta_semestres` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `numSem` int(10) NOT NULL,
  `annees_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `annees_id` (`annees_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `sta_types_notes`
--

CREATE TABLE IF NOT EXISTS `sta_types_notes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) CHARACTER SET latin1 NOT NULL,
  `sigle` varchar(5) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `sta_types_notes_ues`
--

CREATE TABLE IF NOT EXISTS `sta_types_notes_ues` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `types_notes_id` int(10) NOT NULL,
  `ues_id` int(10) NOT NULL,
  `coefNo` int(10) NOT NULL,
  `session1` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `types_notes_id` (`types_notes_id`),
  KEY `ues_id` (`ues_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `sta_ues`
--

CREATE TABLE IF NOT EXISTS `sta_ues` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `sup1` tinyint(1) NOT NULL,
  `sup2` tinyint(1) NOT NULL,
  `obligatoire` tinyint(1) NOT NULL,
  `coefUE` int(10) NOT NULL,
  `semestres_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `semestres_id` (`semestres_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `sta_users`
--

CREATE TABLE IF NOT EXISTS `sta_users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) CHARACTER SET latin1 NOT NULL,
  `lastname` varchar(50) CHARACTER SET latin1 NOT NULL,
  `username` varchar(32) CHARACTER SET latin1 NOT NULL,
  `password` varchar(32) CHARACTER SET latin1 NOT NULL,
  `role` varchar(30) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `sta_annees_etudiants`
--
ALTER TABLE `sta_annees_etudiants`
  ADD CONSTRAINT `sta_annees_etudiants_ibfk_2` FOREIGN KEY (`annees_id`) REFERENCES `sta_annees` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `sta_annees_etudiants_ibfk_1` FOREIGN KEY (`etudiants_id`) REFERENCES `sta_etudiants` (`users_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `sta_enseignants`
--
ALTER TABLE `sta_enseignants`
  ADD CONSTRAINT `sta_enseignants_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `sta_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `sta_enseignants_ues`
--
ALTER TABLE `sta_enseignants_ues`
  ADD CONSTRAINT `sta_enseignants_ues_ibfk_2` FOREIGN KEY (`ues_id`) REFERENCES `sta_ues` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `sta_enseignants_ues_ibfk_1` FOREIGN KEY (`enseignants_id`) REFERENCES `sta_enseignants` (`users_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `sta_etudiants`
--
ALTER TABLE `sta_etudiants`
  ADD CONSTRAINT `sta_etudiants_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `sta_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `sta_etudiants_semestres`
--
ALTER TABLE `sta_etudiants_semestres`
  ADD CONSTRAINT `sta_etudiants_semestres_ibfk_2` FOREIGN KEY (`semestres_id`) REFERENCES `sta_semestres` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `sta_etudiants_semestres_ibfk_1` FOREIGN KEY (`etudiants_id`) REFERENCES `sta_etudiants` (`users_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `sta_etudiants_types_notes_ues`
--
ALTER TABLE `sta_etudiants_types_notes_ues`
  ADD CONSTRAINT `sta_etudiants_types_notes_ues_ibfk_3` FOREIGN KEY (`etudiants_id`) REFERENCES `sta_etudiants` (`users_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `sta_etudiants_types_notes_ues_ibfk_1` FOREIGN KEY (`ues_id`) REFERENCES `sta_ues` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `sta_etudiants_types_notes_ues_ibfk_2` FOREIGN KEY (`types_notes_id`) REFERENCES `sta_types_notes` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `sta_etudiants_ues`
--
ALTER TABLE `sta_etudiants_ues`
  ADD CONSTRAINT `sta_etudiants_ues_ibfk_2` FOREIGN KEY (`etudiants_id`) REFERENCES `sta_etudiants` (`users_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `sta_etudiants_ues_ibfk_1` FOREIGN KEY (`ues_id`) REFERENCES `sta_ues` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `sta_responsables`
--
ALTER TABLE `sta_responsables`
  ADD CONSTRAINT `sta_responsables_ibfk_2` FOREIGN KEY (`ues_id`) REFERENCES `sta_ues` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `sta_responsables_ibfk_1` FOREIGN KEY (`enseignants_id`) REFERENCES `sta_enseignants` (`users_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `sta_semestres`
--
ALTER TABLE `sta_semestres`
  ADD CONSTRAINT `sta_semestres_ibfk_1` FOREIGN KEY (`annees_id`) REFERENCES `sta_annees` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `sta_types_notes_ues`
--
ALTER TABLE `sta_types_notes_ues`
  ADD CONSTRAINT `sta_types_notes_ues_ibfk_2` FOREIGN KEY (`ues_id`) REFERENCES `sta_ues` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `sta_types_notes_ues_ibfk_1` FOREIGN KEY (`types_notes_id`) REFERENCES `sta_types_notes` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `sta_ues`
--
ALTER TABLE `sta_ues`
  ADD CONSTRAINT `sta_ues_ibfk_1` FOREIGN KEY (`semestres_id`) REFERENCES `sta_semestres` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
