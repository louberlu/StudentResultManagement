-- phpMyAdmin SQL Dump
-- version 4.1.11
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 12 Juin 2015 à 16:48
-- Version du serveur :  5.5.41-0+wheezy1
-- Version de PHP :  5.4.36-0+deb7u3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `knkiliob`
--

-- --------------------------------------------------------

--
-- Structure de la table `sta_annees`
--

DROP TABLE IF EXISTS `sta_annees`;
CREATE TABLE IF NOT EXISTS `sta_annees` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `semestre_id` int(10) NOT NULL,
  `annee1` year(4) NOT NULL,
  `annee2` year(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `semestres_id` (`semestre_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `sta_annees_etudiants`
--

DROP TABLE IF EXISTS `sta_annees_etudiants`;
CREATE TABLE IF NOT EXISTS `sta_annees_etudiants` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `moyAn` float NOT NULL,
  `admis` tinyint(1) NOT NULL,
  `compensable` tinyint(1) NOT NULL,
  `etudiant_id` int(10) NOT NULL,
  `annee_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `etudiants_id` (`etudiant_id`),
  KEY `annees_id` (`annee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `sta_diplomes`
--

DROP TABLE IF EXISTS `sta_diplomes`;
CREATE TABLE IF NOT EXISTS `sta_diplomes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `diplome` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `sta_enseignants`
--

DROP TABLE IF EXISTS `sta_enseignants`;
CREATE TABLE IF NOT EXISTS `sta_enseignants` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `sta_enseignants_ues`
--

DROP TABLE IF EXISTS `sta_enseignants_ues`;
CREATE TABLE IF NOT EXISTS `sta_enseignants_ues` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `enseignant_id` int(10) NOT NULL,
  `ue_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `enseignants_id` (`enseignant_id`),
  KEY `ues_id` (`ue_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `sta_etudiants`
--

DROP TABLE IF EXISTS `sta_etudiants`;
CREATE TABLE IF NOT EXISTS `sta_etudiants` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `numero` varchar(50) NOT NULL,
  `remarque` longtext NOT NULL,
  `dateNaissance` date NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `numero` (`numero`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `sta_etudiants_semestres`
--

DROP TABLE IF EXISTS `sta_etudiants_semestres`;
CREATE TABLE IF NOT EXISTS `sta_etudiants_semestres` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `moySem` float NOT NULL,
  `valide` tinyint(1) NOT NULL,
  `compensable` tinyint(1) NOT NULL,
  `etudiant_id` int(10) NOT NULL,
  `semestre_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `etudiants_id` (`etudiant_id`),
  KEY `semestres_id` (`semestre_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `sta_etudiants_types_notes_ues`
--

DROP TABLE IF EXISTS `sta_etudiants_types_notes_ues`;
CREATE TABLE IF NOT EXISTS `sta_etudiants_types_notes_ues` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `absence` tinyint(1) NOT NULL,
  `session1` tinyint(1) NOT NULL,
  `note` float DEFAULT NULL,
  `ue_id` int(10) NOT NULL,
  `types_note_id` int(10) NOT NULL,
  `etudiant_id` int(10) NOT NULL,
  `typeAbsence` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ues_id` (`ue_id`),
  KEY `types_notes_id` (`types_note_id`),
  KEY `etudiants_id` (`etudiant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `sta_etudiants_ues`
--

DROP TABLE IF EXISTS `sta_etudiants_ues`;
CREATE TABLE IF NOT EXISTS `sta_etudiants_ues` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `dispense` tinyint(1) NOT NULL,
  `ue_id` int(10) NOT NULL,
  `etudiant_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ues_id` (`ue_id`),
  KEY `etudiants_id` (`etudiant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `sta_responsables`
--

DROP TABLE IF EXISTS `sta_responsables`;
CREATE TABLE IF NOT EXISTS `sta_responsables` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `enseignant_id` int(10) NOT NULL,
  `ue_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `enseignants_id` (`enseignant_id`),
  KEY `ues_id` (`ue_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `sta_semestres`
--

DROP TABLE IF EXISTS `sta_semestres`;
CREATE TABLE IF NOT EXISTS `sta_semestres` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `numSem` int(10) NOT NULL,
  `diplome_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `annees_id` (`diplome_id`),
  KEY `diplomes_id` (`diplome_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `sta_types_notes`
--

DROP TABLE IF EXISTS `sta_types_notes`;
CREATE TABLE IF NOT EXISTS `sta_types_notes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `sigle` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `sta_types_notes_ues`
--

DROP TABLE IF EXISTS `sta_types_notes_ues`;
CREATE TABLE IF NOT EXISTS `sta_types_notes_ues` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `types_note_id` int(10) NOT NULL,
  `ue_id` int(10) NOT NULL,
  `coefNo` int(10) NOT NULL,
  `session1` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `types_notes_id` (`types_note_id`),
  KEY `ues_id` (`ue_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `sta_ues`
--

DROP TABLE IF EXISTS `sta_ues`;
CREATE TABLE IF NOT EXISTS `sta_ues` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
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

DROP TABLE IF EXISTS `sta_users`;
CREATE TABLE IF NOT EXISTS `sta_users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `username_2` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `sta_annees`
--
ALTER TABLE `sta_annees`
  ADD CONSTRAINT `sta_annees_ibfk_1` FOREIGN KEY (`semestre_id`) REFERENCES `sta_semestres` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `sta_annees_etudiants`
--
ALTER TABLE `sta_annees_etudiants`
  ADD CONSTRAINT `sta_annees_etudiants_ibfk_3` FOREIGN KEY (`etudiant_id`) REFERENCES `sta_etudiants` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `sta_annees_etudiants_ibfk_2` FOREIGN KEY (`annee_id`) REFERENCES `sta_annees` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `sta_enseignants`
--
ALTER TABLE `sta_enseignants`
  ADD CONSTRAINT `sta_enseignants_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `sta_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `sta_enseignants_ues`
--
ALTER TABLE `sta_enseignants_ues`
  ADD CONSTRAINT `sta_enseignants_ues_ibfk_2` FOREIGN KEY (`ue_id`) REFERENCES `sta_ues` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `sta_enseignants_ues_ibfk_1` FOREIGN KEY (`enseignant_id`) REFERENCES `sta_enseignants` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `sta_etudiants`
--
ALTER TABLE `sta_etudiants`
  ADD CONSTRAINT `sta_etudiants_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `sta_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `sta_etudiants_semestres`
--
ALTER TABLE `sta_etudiants_semestres`
  ADD CONSTRAINT `sta_etudiants_semestres_ibfk_2` FOREIGN KEY (`semestre_id`) REFERENCES `sta_semestres` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `sta_etudiants_semestres_ibfk_1` FOREIGN KEY (`etudiant_id`) REFERENCES `sta_etudiants` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `sta_etudiants_types_notes_ues`
--
ALTER TABLE `sta_etudiants_types_notes_ues`
  ADD CONSTRAINT `sta_etudiants_types_notes_ues_ibfk_3` FOREIGN KEY (`etudiant_id`) REFERENCES `sta_etudiants` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `sta_etudiants_types_notes_ues_ibfk_1` FOREIGN KEY (`ue_id`) REFERENCES `sta_ues` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `sta_etudiants_types_notes_ues_ibfk_2` FOREIGN KEY (`types_note_id`) REFERENCES `sta_types_notes` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `sta_etudiants_ues`
--
ALTER TABLE `sta_etudiants_ues`
  ADD CONSTRAINT `sta_etudiants_ues_ibfk_2` FOREIGN KEY (`etudiant_id`) REFERENCES `sta_etudiants` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `sta_etudiants_ues_ibfk_1` FOREIGN KEY (`ue_id`) REFERENCES `sta_ues` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `sta_responsables`
--
ALTER TABLE `sta_responsables`
  ADD CONSTRAINT `sta_responsables_ibfk_2` FOREIGN KEY (`ue_id`) REFERENCES `sta_ues` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `sta_responsables_ibfk_1` FOREIGN KEY (`enseignant_id`) REFERENCES `sta_enseignants` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `sta_semestres`
--
ALTER TABLE `sta_semestres`
  ADD CONSTRAINT `sta_semestres_ibfk_1` FOREIGN KEY (`diplome_id`) REFERENCES `sta_diplomes` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `sta_types_notes_ues`
--
ALTER TABLE `sta_types_notes_ues`
  ADD CONSTRAINT `sta_types_notes_ues_ibfk_2` FOREIGN KEY (`ue_id`) REFERENCES `sta_ues` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `sta_types_notes_ues_ibfk_1` FOREIGN KEY (`types_note_id`) REFERENCES `sta_types_notes` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `sta_ues`
--
ALTER TABLE `sta_ues`
  ADD CONSTRAINT `sta_ues_ibfk_1` FOREIGN KEY (`semestres_id`) REFERENCES `sta_semestres` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
