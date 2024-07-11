-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 09 juil. 2024 à 18:48
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
-- Base de données : `ecom_1`
--

-- --------------------------------------------------------

--
-- Structure de la table `ec_catg`
--

CREATE TABLE `ec_catg` (
  `id_cg` int(11) NOT NULL,
  `libelle` varchar(255) DEFAULT NULL,
  `descrip` varchar(255) DEFAULT NULL,
  `date_crate_c` datetime DEFAULT NULL,
  `econ_c` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ec_catg`
--

INSERT INTO `ec_catg` (`id_cg`, `libelle`, `descrip`, `date_crate_c`, `econ_c`) VALUES
(1, 'Phone 02', '     Carot Modifer ph 1', '2024-08-01 11:22:00', 'fa-solid fa-mobile-screen-button'),
(3, 'Banan', 'bien etat', '2024-07-02 11:33:25', 'fa-solid fa-carrot'),
(4, 'bar9o9 01', ' mzyan 12 45 Nom et test de desc', '2024-07-24 11:34:00', 'fa-solid fa-lemon'),
(6, 'legumes', 'Liste des Legumes ', '2024-07-11 10:20:00', 'fa-solid fa-table-list'),
(12, 'spootrrr', 'cat Of Sport', '2024-07-03 14:07:10', 'fa-solid fa-table-list'),
(23, 'asd', 'description two', '2024-07-05 16:07:23', 'fa-solid fa-table-list'),
(24, 'Limonada', 'Limonada Pour Les Soifs', '2024-07-05 18:07:25', 'fa-solid fa-table-list'),
(25, 'Fer', 'fer de Khalid', '2024-07-05 18:07:17', 'fa-solid fa-table-list'),
(26, 'phone', 'description de test ', '2024-07-05 18:07:00', 'fa-solid fa-table-list'),
(27, 'bisiclette', 'Bisiclite', '2024-07-08 12:07:15', 'fa-solid fa-person-biking'),
(28, 'consmitic', 'descpition de Cosmitic', '2024-07-08 16:07:45', 'fa-solid fa-couch');

-- --------------------------------------------------------

--
-- Structure de la table `ec_prod`
--

CREATE TABLE `ec_prod` (
  `id_p` int(11) NOT NULL,
  `libelle` varchar(255) DEFAULT NULL,
  `prix` double DEFAULT NULL,
  `discont` int(11) DEFAULT NULL,
  `id_cg` int(11) DEFAULT NULL,
  `date_crate_p` datetime DEFAULT NULL,
  `econ_c` varchar(200) DEFAULT NULL,
  `image_p` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ec_prod`
--

INSERT INTO `ec_prod` (`id_p`, `libelle`, `prix`, `discont`, `id_cg`, `date_crate_p`, `econ_c`, `image_p`) VALUES
(1, 'Danon ', 50.5, 33, 3, '2024-07-17 11:38:43', 'fa-brands fa-studiovinari', 'upload/img-15.JPG'),
(4, 'files 01', 77.5, 7, 1, '2024-07-18 01:38:43', 'fa-solid fa-file', 'upload/img-15.JPG'),
(33, 'Limonada', 6, 13, 3, '2024-07-05 18:01:46', 'fa-solid fa-bottle-water', 'upload/img-14.JPG'),
(34, 'cars', 400, 24, 3, '2024-07-05 18:10:38', ' fa-solid fa-car-side', 'upload/img-14.JPG'),
(37, 'description  ', 50.5, 40, 3, NULL, 'fa-solid fa-money-check', 'upload/img-14.JPG'),
(38, 'Villa', 2000000, 30, 25, NULL, 'fa-solid fa-archway', 'upload/img-14.JPG'),
(39, ' Prod ', 100.5, 15, 4, NULL, 'fa-solid fa-money-check', 'upload/img-14.JPG'),
(40, 'test IR 22', 12, 15, 6, NULL, 'fa-solid fa-money-check', 'upload/668c14d356e58img-5.JPG'),
(43, 'home', 2000000, 19, 25, '2024-07-08 12:48:07', ' fa-solid fa-house ', 'upload/img-14.JPG'),
(44, 'sansung tv 70\" de type Japon module 00125 5 8 5 hgf hhgg chv b jnkj bkjgv jgr fhgv c vhg hjb 2 ', 2, 40, 6, '2024-07-08 14:20:45', 'fa-solid fa-cannabis', 'upload/img-14.JPG'),
(46, 'Modifie', 2, 40, 12, '2024-07-08 14:33:30', 'fa-solid fa-cannabis', 'upload/img-14.JPG'),
(47, 'Modifie  arbre', 24747, 73, 25, '2024-07-08 14:50:13', 'fa-solid fa-cannabis', 'upload/668c1c21318bfimg-7.JPG'),
(48, 'Modifie', 2, 40, 12, '2024-07-08 14:51:00', 'fa-solid fa-cannabis', 'upload/img-14.JPG'),
(49, 'Modifie b aoson', 2, 40, 12, '2024-07-08 14:53:35', 'fa-solid fa-cannabis', 'upload/668c1bcc9bb36img-4.JPG'),
(50, 'maison no disc', 250000, 0, 25, '2024-07-08 14:54:34', 'fa-solid fa-cannabis', 'upload/668c16d066f87activity 05 stor.png'),
(51, 'SPA', 2000, 7, 28, '2024-07-08 17:01:00', 'fa-solid fa-couch', 'Upload/668bff2c03a12uuseer.JPG');

-- --------------------------------------------------------

--
-- Structure de la table `ec_user`
--

CREATE TABLE `ec_user` (
  `id_u` int(11) NOT NULL,
  `login_u` varchar(255) DEFAULT NULL,
  `password_u` varchar(255) DEFAULT NULL,
  `date_crate_u` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ec_user`
--

INSERT INTO `ec_user` (`id_u`, `login_u`, `password_u`, `date_crate_u`) VALUES
(1, '0000', '0000', '2024-07-02 00:00:00'),
(2, '', '', '2024-07-02 11:30:18'),
(6, 'nom1', '0000', '2024-07-02 17:00:00'),
(7, 'User2', '0000', '2024-07-02 17:00:00'),
(8, 'nom8', '0000', '2024-07-02 17:07:51'),
(9, 'nom4', '0000', '2024-07-02 17:07:36'),
(10, 'nom5', '0000', '2024-07-02 17:07:56'),
(11, 'nom2555', '0000', '2024-07-02 17:07:26'),
(12, 'nom2', '0000', '2024-07-02 18:07:11'),
(13, 'nom2', '0000', '2024-07-02 18:07:42'),
(14, 'nom2', '0000', '2024-07-02 18:07:00'),
(15, 'nom2', '0000', '2024-07-02 18:07:49'),
(16, 'nom2', '0000', '2024-07-03 11:07:33'),
(17, 'nom2', '0000', '2024-07-03 11:07:56'),
(18, 'nom2', '0000', '2024-07-03 14:07:01'),
(19, 'nom2', '0000', '2024-07-08 10:07:47'),
(20, 'nom2', '0000', '2024-07-08 17:07:04');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ec_catg`
--
ALTER TABLE `ec_catg`
  ADD PRIMARY KEY (`id_cg`);

--
-- Index pour la table `ec_prod`
--
ALTER TABLE `ec_prod`
  ADD PRIMARY KEY (`id_p`),
  ADD KEY `fk_cag` (`id_cg`);

--
-- Index pour la table `ec_user`
--
ALTER TABLE `ec_user`
  ADD PRIMARY KEY (`id_u`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ec_catg`
--
ALTER TABLE `ec_catg`
  MODIFY `id_cg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `ec_prod`
--
ALTER TABLE `ec_prod`
  MODIFY `id_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT pour la table `ec_user`
--
ALTER TABLE `ec_user`
  MODIFY `id_u` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ec_prod`
--
ALTER TABLE `ec_prod`
  ADD CONSTRAINT `fk_cag` FOREIGN KEY (`id_cg`) REFERENCES `ec_catg` (`id_cg`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
