-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  mer. 05 mai 2021 à 09:54
-- Version du serveur :  5.7.28
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `biblio`
--

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

DROP TABLE IF EXISTS `auteur`;
CREATE TABLE IF NOT EXISTS `auteur` (
  `numAut` int(11) NOT NULL AUTO_INCREMENT,
  `nomAut` varchar(255) NOT NULL,
  `prenomAut` varchar(40) NOT NULL,
  `statut` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`numAut`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `auteur`
--

INSERT INTO `auteur` (`numAut`, `nomAut`, `prenomAut`, `statut`) VALUES
(1, 'KAFFO', 'Loula', 1),
(2, 'Thierry-Bany', 'Moussa', 1),
(3, 'Youssrath-ADOU', 'Nanzif', 1),
(4, 'amanda', 'Razim', 1),
(5, 'Tayar-Dudar', 'Aja', 1),
(6, 'duchesse', 'Rougna', 1),
(7, 'lili', 'lola', 1),
(17, 'DOSSOU', 'Israel', 1),
(18, 'DOSSOU', 'Israel', 1),
(19, 'DOSSOU', 'Israel', 1),
(20, 'DOSSOU', 'Israel', 1),
(21, 'Stanislas', 'Israel', 1),
(22, 'zertyu', 'Israel', 1),
(23, 'DOSSOU', 'Israel', 1),
(24, 'DOSSOU', 'Israel', 1),
(25, 'zertyu', 'Israel', 1),
(26, '145', 'Israel', 1),
(27, 'azerty', 'sdfgh', 1),
(28, 'azerty', 'sdfgh', 1),
(29, 'azerty', 'sdfgh', 1),
(30, 'DOSSOU', 'sdfgh', 1);

-- --------------------------------------------------------

--
-- Structure de la table `auteurs`
--

DROP TABLE IF EXISTS `auteurs`;
CREATE TABLE IF NOT EXISTS `auteurs` (
  `codOuv` int(11) NOT NULL,
  `numAut` int(11) NOT NULL,
  `numAutS` int(11) NOT NULL,
  PRIMARY KEY (`codOuv`,`numAut`),
  KEY `numAut` (`numAut`),
  KEY `codOuv` (`codOuv`,`numAut`,`numAutS`),
  KEY `tyui` (`numAutS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `domaine`
--

DROP TABLE IF EXISTS `domaine`;
CREATE TABLE IF NOT EXISTS `domaine` (
  `codDom` int(11) NOT NULL AUTO_INCREMENT,
  `libDom` varchar(255) NOT NULL,
  PRIMARY KEY (`codDom`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `domaine`
--

INSERT INTO `domaine` (`codDom`, `libDom`) VALUES
(1, 'fantastique'),
(2, 'comédie'),
(3, 'romance'),
(4, 'disney');

-- --------------------------------------------------------

--
-- Structure de la table `emprunter`
--

DROP TABLE IF EXISTS `emprunter`;
CREATE TABLE IF NOT EXISTS `emprunter` (
  `datEmp` date NOT NULL,
  `datRet` date NOT NULL,
  `codOuv` int(11) NOT NULL,
  `numMemb` int(11) NOT NULL,
  `numEmp` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`codOuv`,`numMemb`,`numEmp`),
  KEY `codOuvr` (`codOuv`),
  KEY `numMemb` (`numMemb`),
  KEY `numEmp` (`numEmp`),
  KEY `codOuv` (`codOuv`),
  KEY `numMemb_2` (`numMemb`,`numEmp`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `emprunter`
--

INSERT INTO `emprunter` (`datEmp`, `datRet`, `codOuv`, `numMemb`, `numEmp`) VALUES
('2021-04-19', '2021-04-20', 2, 4, 1),
('2021-01-01', '2021-04-07', 5, 2, 2),
('2021-04-06', '2021-04-16', 6, 2, 3),
('2021-04-19', '2021-04-22', 7, 4, 4),
('2020-12-14', '2020-11-18', 8, 5, 5),
('2021-05-26', '2021-05-30', 9, 1, 6),
('2021-06-09', '2021-06-29', 11, 3, 7);

-- --------------------------------------------------------

--
-- Structure de la table `langue`
--

DROP TABLE IF EXISTS `langue`;
CREATE TABLE IF NOT EXISTS `langue` (
  `codLang` int(11) NOT NULL AUTO_INCREMENT,
  `libLang` varchar(255) NOT NULL,
  PRIMARY KEY (`codLang`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `langue`
--

INSERT INTO `langue` (`codLang`, `libLang`) VALUES
(1, 'francais'),
(2, 'anglais'),
(3, 'espagnol'),
(4, 'allemand');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

DROP TABLE IF EXISTS `membre`;
CREATE TABLE IF NOT EXISTS `membre` (
  `numMemb` int(11) NOT NULL AUTO_INCREMENT,
  `nomMemb` varchar(255) NOT NULL,
  `adrMemb` varchar(255) NOT NULL,
  PRIMARY KEY (`numMemb`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`numMemb`, `nomMemb`, `adrMemb`) VALUES
(1, 'maryam k', 'mary@gmail.com'),
(2, 'Lydia D', 'lydia@gmail.com'),
(3, 'Loloa', 'lolo@gmail.com'),
(4, 'zaangbo', 'zangbo@gmail.com'),
(5, 'dora', 'dora@gmail.com'),
(6, 'poolat', 'poolat@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `ouvrage`
--

DROP TABLE IF EXISTS `ouvrage`;
CREATE TABLE IF NOT EXISTS `ouvrage` (
  `codOuv` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `nbEx` int(11) NOT NULL,
  `numAut` int(11) NOT NULL,
  PRIMARY KEY (`codOuv`),
  KEY `numAut` (`numAut`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ouvrage`
--

INSERT INTO `ouvrage` (`codOuv`, `titre`, `nbEx`, `numAut`) VALUES
(1, 'La vie et ses contrainte', 2, 4),
(2, 'les fantomes du brésil', 10, 2),
(3, 'rires et pleures', 8, 4),
(4, 'il était une fois', 44, 5),
(5, 'le petit chaperon rouge', 7, 6),
(6, 'cendrillon', 9, 3),
(7, 'mamou', 2, 2),
(8, 'Soleil de minuit', 10, 3),
(9, 'La girafle et le loin', 2, 2),
(10, 'toto et lala', 2, 6),
(11, 'biblou', 54, 1);

-- --------------------------------------------------------

--
-- Structure de la table `parution`
--

DROP TABLE IF EXISTS `parution`;
CREATE TABLE IF NOT EXISTS `parution` (
  `codDom` int(11) NOT NULL,
  `codOuv` int(11) NOT NULL,
  `codLang` int(11) NOT NULL,
  `datPar` date NOT NULL,
  PRIMARY KEY (`codDom`,`codOuv`,`codLang`),
  KEY `mdr` (`codLang`),
  KEY `xd` (`codOuv`),
  KEY `codDom` (`codDom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `parution`
--

INSERT INTO `parution` (`codDom`, `codOuv`, `codLang`, `datPar`) VALUES
(1, 2, 1, '2021-04-16'),
(2, 3, 1, '2021-04-08'),
(2, 11, 2, '2021-04-05'),
(3, 7, 3, '2021-11-17'),
(3, 9, 3, '2021-02-02'),
(4, 6, 1, '2021-04-26');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `contact` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mdp` varchar(40) NOT NULL,
  `etat` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `contact`, `email`, `mdp`, `etat`) VALUES
(1, 'Kaffo', 'Maryam', '61897909', 'marykaffo14@gmail.com', 'd434df0cd7fe98e1d06ac81adc184e47519ebc6b', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime DEFAULT NULL,
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `login` varchar(40) NOT NULL,
  `motDePasse` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `date`, `nom`, `prenom`, `login`, `motDePasse`) VALUES
(1, NULL, 'Kouavi', 'candide', 'candide01', 'cdaa6716746fb685734abde87f1b08ad'),
(2, NULL, 'Kouavi', 'candide', 'candide01', 'eb62f6b9306db575c2d596b1279627a4'),
(3, NULL, 'Kaffo', 'candide', 'candide01', 'eb62f6b9306db575c2d596b1279627a4'),
(4, NULL, 'Kaffo', 'candide', 'candide01', 'cdaa6716746fb685734abde87f1b08ad'),
(5, NULL, 'KAFFO', 'kamal', 'kmaryam', '7682fe272099ea26efe39c890b33675b'),
(6, NULL, 'Kouavi', 'candide', 'candide01', 'cdaa6716746fb685734abde87f1b08ad'),
(7, NULL, 'Kouavi', 'candide', 'candide01', 'cdaa6716746fb685734abde87f1b08ad'),
(8, NULL, 'Kouavi', 'candide', 'candide01', 'cdaa6716746fb685734abde87f1b08ad'),
(9, NULL, 'Kouavi', 'candide', 'candide01', 'cdaa6716746fb685734abde87f1b08ad'),
(10, NULL, 'Kouavi', 'candide', 'candide01', 'cdaa6716746fb685734abde87f1b08ad');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `auteurs`
--
ALTER TABLE `auteurs`
  ADD CONSTRAINT `oiuy` FOREIGN KEY (`codOuv`) REFERENCES `ouvrage` (`codOuv`),
  ADD CONSTRAINT `tyui` FOREIGN KEY (`numAutS`) REFERENCES `auteur` (`numAut`),
  ADD CONSTRAINT `ui` FOREIGN KEY (`numAut`) REFERENCES `auteur` (`numAut`);

--
-- Contraintes pour la table `emprunter`
--
ALTER TABLE `emprunter`
  ADD CONSTRAINT `dji` FOREIGN KEY (`codOuv`) REFERENCES `ouvrage` (`codOuv`),
  ADD CONSTRAINT `emprunter_ibfk_2` FOREIGN KEY (`numMemb`) REFERENCES `membre` (`numMemb`);

--
-- Contraintes pour la table `ouvrage`
--
ALTER TABLE `ouvrage`
  ADD CONSTRAINT `ouvrage_ibfk_1` FOREIGN KEY (`numAut`) REFERENCES `auteur` (`numAut`);

--
-- Contraintes pour la table `parution`
--
ALTER TABLE `parution`
  ADD CONSTRAINT `mdr` FOREIGN KEY (`codLang`) REFERENCES `langue` (`codLang`),
  ADD CONSTRAINT `xd` FOREIGN KEY (`codOuv`) REFERENCES `ouvrage` (`codOuv`),
  ADD CONSTRAINT `zert` FOREIGN KEY (`codDom`) REFERENCES `domaine` (`codDom`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
