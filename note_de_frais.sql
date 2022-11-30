-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 30 nov. 2022 à 12:42
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
  `statut` int(11) NOT NULL DEFAULT '0',
  `id_note` int(11) NOT NULL,
  PRIMARY KEY (`id_fc`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ligne_fc`
--

INSERT INTO `ligne_fc` (`id_fc`, `libelle`, `montant_fc`, `statut`, `id_note`) VALUES
(1, 'Restaurant', '50', 0, 1),
(2, 'Essence', '20', 0, 1),
(3, 'Hotel', '100', 0, 1),
(4, 'Péage', '15', 0, 2),
(5, 'Parking', '40', 0, 2);

-- --------------------------------------------------------

--
-- Structure de la table `ligne_fkm`
--

DROP TABLE IF EXISTS `ligne_fkm`;
CREATE TABLE IF NOT EXISTS `ligne_fkm` (
  `id_fkm` int(11) NOT NULL AUTO_INCREMENT,
  `montant` int(11) NOT NULL,
  `kilometre` int(11) NOT NULL,
  `statut` int(11) NOT NULL DEFAULT '0',
  `id_note` int(11) NOT NULL,
  PRIMARY KEY (`id_fkm`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ligne_fkm`
--

INSERT INTO `ligne_fkm` (`id_fkm`, `montant`, `kilometre`, `statut`, `id_note`) VALUES
(1, 75, 150, 0, 1),
(2, 12, 23, 0, 2);

-- --------------------------------------------------------

--
-- Structure de la table `note_de_frais`
--

DROP TABLE IF EXISTS `note_de_frais`;
CREATE TABLE IF NOT EXISTS `note_de_frais` (
  `id_note` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `mission` varchar(255) NOT NULL,
  `montant` decimal(10,0) NOT NULL,
  `statut` int(11) NOT NULL DEFAULT '0',
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id_note`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `note_de_frais`
--

INSERT INTO `note_de_frais` (`id_note`, `date`, `mission`, `montant`, `statut`, `id_utilisateur`) VALUES
(1, '2022-11-24 15:02:20', 'Déplacement', '245', 0, 2),
(2, '2022-11-24 15:19:41', 'Test', '67', 0, 2);

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
  `droit` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `prenom`, `nom`, `email`, `mot_de_passe`, `login`, `droit`) VALUES
(1, 'Jason', 'Segor', 'jasonestmoche@gmail.com', '1d48ebf10dcfd200c60179428c078cae5d57467bc', 'jason91', 0),
(2, 'Lilian', 'Heno', 'lilianestbeau@gmail.com', '140bd001563085fc35165329ea1ff5c5ecbdbbeef', 'lilianll', 0),
(3, 'admin', 'admin', 'admin@admin', '1d033e22ae348aeb5660fc2140aec35850c4da997', 'admin', 1);

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

DROP TABLE IF EXISTS `vehicule`;
CREATE TABLE IF NOT EXISTS `vehicule` (
  `id_vehicule` int(11) NOT NULL AUTO_INCREMENT,
  `marque` varchar(255) NOT NULL,
  `carburant` varchar(255) NOT NULL,
  `nb_places` int(11) NOT NULL,
  `puissance_fiscale` int(11) NOT NULL,
  `utilisateur` text NOT NULL,
  PRIMARY KEY (`id_vehicule`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vehicule`
--

INSERT INTO `vehicule` (`id_vehicule`, `marque`, `carburant`, `nb_places`, `puissance_fiscale`, `utilisateur`) VALUES
(1, 'Lamborghini', 'essence', 2, 5, 'jasonestmoche@gmail.com'),
(2, 'peugeot', 'essence', 5, 2, 'lilianestbeau@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
