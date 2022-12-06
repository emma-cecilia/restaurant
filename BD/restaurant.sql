-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 12 Janvier 2017 à 15:03
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `restaurant`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `idClient` smallint(6) NOT NULL,
  `nomClient` varchar(50) DEFAULT NULL,
  `prenomClient` varchar(50) DEFAULT NULL,
  `dateNaissance` date DEFAULT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `codePostal` varchar(10) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `motDePasse` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`idClient`, `nomClient`, `prenomClient`, `dateNaissance`, `adresse`, `ville`, `codePostal`, `telephone`, `email`, `motDePasse`) VALUES
(1, 'GAMBECKET', 'Loïg', '2000-01-01', 'cité des 17', 'Brazzaville', '3232', '629', 'gambecket@hotmail.fr', 'belou'),
(2, 'TSIBA', 'Marthely', '2017-01-01', 'OMS', 'Brazzaville', '3020', '066010101', 'Marthely@genc.cg', 'marthely'),
(3, 'ANGANDEH', 'Bienvenue', '2010-10-10', 'mpila', 'brazzaville', '069527162', '069527162', 'natachabienvenue@yahoo.fr', '1234'),
(4, 'SALOU-BATI', 'Nicole', '2010-10-10', 'poto-poto', 'brazzaville', '514564156', '166552', 'nicolebati@yahoo.fr', '1234');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `idCommande` smallint(6) NOT NULL,
  `dateCommande` date DEFAULT NULL,
  `client_idclient` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`idCommande`, `dateCommande`, `client_idclient`) VALUES
(1, '2017-01-11', 1),
(2, '2017-01-11', 1),
(3, '2017-01-11', 1),
(4, '2017-01-11', 1),
(5, '2017-01-11', 1),
(6, '2017-01-11', 1),
(7, '2017-01-11', 1),
(8, '2017-01-11', 1),
(9, '2017-01-11', 1),
(10, '2017-01-11', 1),
(11, '2017-01-11', 1),
(12, '2017-01-11', 1),
(13, '2017-01-11', 1),
(14, '2017-01-11', 1),
(15, '2017-01-11', 1),
(16, '2017-01-11', 1),
(17, '2017-01-12', 1);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `idProduit` smallint(6) NOT NULL,
  `nomProduit` varchar(50) DEFAULT NULL,
  `descriptionProduit` text,
  `prixProduit` float DEFAULT NULL,
  `imageProduit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`idProduit`, `nomProduit`, `descriptionProduit`, `prixProduit`, `imageProduit`) VALUES
(1, 'Poulet', 'soso', 1200, 'poulet.jpg'),
(2, 'riz', 'losso', 150, 'riz.jpg'),
(3, 'jus', 'boisson', 500, 'jus.jpg'),
(4, 'angande', 'chemille', 1000, 'angande.jpg'),
(5, 'mosseka_braissé', 'bilia ya mboka', 1000, 'mosseka_braissé.jpg'),
(6, 'tubercule_a_vapeur', 'NKABA', 500, 'tubercule_a_vapeur.jpg'),
(7, 'safou', 'fruit', 200, 'safou.jpg'),
(8, 'viande_pâte_arachide', 'deux pièces', 1000, 'viande_pâte_arachide.jpg'),
(9, 'saboussa', 'plat colombien', 1200, 'saboussa.jpg'),
(10, 'sakassaka', 'mpondou', 500, 'sakassaka.jpg'),
(11, 'poulet_yassa', 'plât sénégalais', 1500, 'poulet_yassa.jpg'),
(12, 'sauce_poisson_salé', '', 1000, 'sauce_poisson_salé.jpg'),
(13, 'tiépe_djieme', 'plât sénégalais', 1000, 'tiépe_djieme.jpg'),
(14, 'milkshake', 'sicré', 500, 'milkshake.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `produitcommande`
--

CREATE TABLE `produitcommande` (
  `idProduitCommande` smallint(6) NOT NULL,
  `idCommande` smallint(6) NOT NULL,
  `idProduit` smallint(6) NOT NULL,
  `quantite` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `produitcommande`
--

INSERT INTO `produitcommande` (`idProduitCommande`, `idCommande`, `idProduit`, `quantite`) VALUES
(1, 1, 1, 1),
(2, 1, 1, 1),
(3, 1, 4, 4),
(4, 1, 4, 2),
(5, 1, 4, 2),
(6, 1, 3, 3),
(7, 1, 4, 5);

-- --------------------------------------------------------

--
-- Structure de la table `reserver`
--

CREATE TABLE `reserver` (
  `idReserver` smallint(6) NOT NULL,
  `idClient` smallint(6) NOT NULL,
  `idTableRestaurant` smallint(6) NOT NULL,
  `dateReservation` date DEFAULT NULL,
  `nombreCouvert` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `reserver`
--

INSERT INTO `reserver` (`idReserver`, `idClient`, `idTableRestaurant`, `dateReservation`, `nombreCouvert`) VALUES
(1, 1, 1, '2016-01-01', 2),
(2, 1, 1, '2017-01-15', 2),
(3, 1, 1, '2017-01-15', 2),
(4, 1, 1, '2017-01-18', 3),
(5, 4, 1, '2017-01-19', 2),
(6, 1, 1, '2017-01-19', 4);

-- --------------------------------------------------------

--
-- Structure de la table `tablerestaurant`
--

CREATE TABLE `tablerestaurant` (
  `idTableRestaurant` smallint(6) NOT NULL,
  `maxCouvert` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tablerestaurant`
--

INSERT INTO `tablerestaurant` (`idTableRestaurant`, `maxCouvert`) VALUES
(1, 8),
(2, 4),
(3, 10),
(4, 10);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`idClient`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`idCommande`),
  ADD KEY `FK_Commande_client_idclient` (`client_idclient`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`idProduit`);

--
-- Index pour la table `produitcommande`
--
ALTER TABLE `produitcommande`
  ADD PRIMARY KEY (`idProduitCommande`),
  ADD KEY `FK_produitCommande_idCommande` (`idCommande`);

--
-- Index pour la table `reserver`
--
ALTER TABLE `reserver`
  ADD PRIMARY KEY (`idReserver`);

--
-- Index pour la table `tablerestaurant`
--
ALTER TABLE `tablerestaurant`
  ADD PRIMARY KEY (`idTableRestaurant`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `idClient` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `idCommande` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `idProduit` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `produitcommande`
--
ALTER TABLE `produitcommande`
  MODIFY `idProduitCommande` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `reserver`
--
ALTER TABLE `reserver`
  MODIFY `idReserver` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `tablerestaurant`
--
ALTER TABLE `tablerestaurant`
  MODIFY `idTableRestaurant` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `FK_Commande_client_idclient` FOREIGN KEY (`client_idclient`) REFERENCES `client` (`idClient`);

--
-- Contraintes pour la table `produitcommande`
--
ALTER TABLE `produitcommande`
  ADD CONSTRAINT `FK_produitCommande_idCommande` FOREIGN KEY (`idCommande`) REFERENCES `commande` (`idCommande`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
