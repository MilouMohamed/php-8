-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 03 sep. 2024 à 18:59
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecom_1_2eme_f`
--

-- --------------------------------------------------------

--
-- Structure de la table `ec_categorie`
--

CREATE TABLE `ec_categorie` (
  `id` int(11) NOT NULL,
  `libelle` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `date_c` datetime DEFAULT NULL,
  `icon_c` varchar(250) DEFAULT '<i class="fa-solid fa-layer-group"></i>'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ec_categorie`
--

INSERT INTO `ec_categorie` (`id`, `libelle`, `description`, `date_c`, `icon_c`) VALUES
(1, 'fawakih', ' Pas de Descrip', '2024-08-23 11:11:31', 'fa-solid fa-layer-group'),
(3, 'ajban', 'Pas de Descrip 3', '2024-08-23 11:11:31', 'fa-solid fa-layer-group'),
(4, 'Tour maroc', 'Chamal 8 aut', '2024-08-23 11:11:31', 'fa-solid fa-layer-group'),
(10, 'Home 552', ' Best Home 15522', '2024-08-30 18:10:39', 'fa-solid fa-bowl-food'),
(11, 'tv 55', 'best tvvv 555 ', '2024-08-31 11:58:02', 'fa-solid fa-tv');

-- --------------------------------------------------------

--
-- Structure de la table `ec_produit`
--

CREATE TABLE `ec_produit` (
  `id` int(11) NOT NULL,
  `libelle` varchar(100) DEFAULT NULL,
  `prix` decimal(10,0) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `id_categorie` int(11) DEFAULT NULL,
  `date_c` datetime DEFAULT NULL,
  `img` varchar(254) DEFAULT NULL,
  `discrip_p` varchar(250) DEFAULT 'Pas de Descritopn ici pour ce produit il faut ajouter Une description pour detaille les caracterestiques Merci '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ec_produit`
--

INSERT INTO `ec_produit` (`id`, `libelle`, `prix`, `discount`, `id_categorie`, `date_c`, `img`, `discrip_p`) VALUES
(6, 'danone 20', 1013, 20, 1, '2024-08-23 12:31:07', 'img-6.JPG', 'Pas de Descritopn ici pour ce produit il faut ajouter Une description pour detaille les caracterestiques Merci '),
(7, 'banan', 11, 15, 1, '2024-08-23 12:31:07', 'img-12.JPG', 'Pas de Descritopn ici pour ce produit il faut ajouter Une description pour detaille les caracterestiques Merci '),
(8, 'Tomat', 3, 2, 1, '2024-08-23 12:31:07', 'img-15.JPG', 'Pas de Descritopn ici pour ce produit il faut ajouter Une description pour detaille les caracterestiques Merci '),
(9, 'voiture', 12000, 10, 3, '2024-08-23 12:31:07', 'img-10.JPG', 'Pas de Descritopn ici pour ce produit il faut ajouter Une description pour detaille les caracterestiques Merci '),
(11, 'Non Prod 112', 10102, 55, 10, '2000-09-01 09:54:17', 'uuseer.JPG', 'Pas de Descritopn ici pour ce produit il faut ajouter Une description pour detaille les caracterestiques Merci '),
(12, 'tv 5-5', 100000, 52, 11, '1990-05-06 00:00:00', 'img-3.JPG', 'Pas de Descritopn ici pour ce produit il faut ajouter Une description pour detaille les caracterestiques Merci ');

-- --------------------------------------------------------

--
-- Structure de la table `ec_user`
--

CREATE TABLE `ec_user` (
  `id` int(11) NOT NULL,
  `login` varchar(100) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `date_c` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ec_user`
--

INSERT INTO `ec_user` (`id`, `login`, `pass`, `date_c`) VALUES
(1, '111', '0000', '2020-08-23 11:21:13'),
(2, '000', '0000', '2011-02-13 11:21:13'),
(3, '222', '0000', '2024-08-23 11:21:13'),
(4, 'n1', 'pas', '2024-08-23 16:26:46'),
(5, '3', '3', '2024-08-23 18:38:12'),
(6, '44', '44', '2024-08-23 18:39:59'),
(7, 't1', 't123', '2024-08-23 18:52:12'),
(8, '1', '1', '2024-08-24 11:00:34'),
(9, '1', '1', '2024-08-24 12:55:46');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ec_categorie`
--
ALTER TABLE `ec_categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ec_produit`
--
ALTER TABLE `ec_produit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Cat` (`id_categorie`);

--
-- Index pour la table `ec_user`
--
ALTER TABLE `ec_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ec_categorie`
--
ALTER TABLE `ec_categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `ec_produit`
--
ALTER TABLE `ec_produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `ec_user`
--
ALTER TABLE `ec_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ec_produit`
--
ALTER TABLE `ec_produit`
  ADD CONSTRAINT `ec_produit_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `ec_categorie` (`id`),
  ADD CONSTRAINT `fk_Cat` FOREIGN KEY (`id_categorie`) REFERENCES `ec_categorie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
