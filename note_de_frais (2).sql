-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 14 oct. 2022 à 14:22
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `note_de_frais`
--

-- --------------------------------------------------------

--
-- Structure de la table `ligne_fc`
--

DROP TABLE IF EXISTS `ligne_fc`;
CREATE TABLE IF NOT EXISTS `ligne_fc` (
  `id_fc` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  `montant_fc` varchar(255) NOT NULL,
  PRIMARY KEY (`id_fc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ligne_fkm`
--

DROP TABLE IF EXISTS `ligne_fkm`;
CREATE TABLE IF NOT EXISTS `ligne_fkm` (
  `id_fkm` int(11) NOT NULL AUTO_INCREMENT,
  `lieu_de_depart` varchar(255) NOT NULL,
  `lieu_darriver` varchar(255) NOT NULL,
  `kilometre` int(11) NOT NULL,
  PRIMARY KEY (`id_fkm`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `note_de_frais`
--

DROP TABLE IF EXISTS `note_de_frais`;
CREATE TABLE IF NOT EXISTS `note_de_frais` (
  `id_note` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `mission` varchar(255) NOT NULL,
  `montant` decimal(10,0) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id_note`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

DROP TABLE IF EXISTS `vehicule`;
CREATE TABLE IF NOT EXISTS `vehicule` (
  `id_vehicule` int(11) NOT NULL AUTO_INCREMENT,
  `marque` varchar(255) NOT NULL,
  `carburant` varchar(255) NOT NULL,
  PRIMARY KEY (`id_vehicule`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
