-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 14 déc. 2024 à 12:38
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
-- Base de données : `ecom_php_2`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `CatID` int(11) NOT NULL,
  `NameCat` varchar(255) NOT NULL,
  `DescripCat` varchar(255) NOT NULL,
  `ParentCat` int(11) NOT NULL DEFAULT 0,
  `OrderCat` int(11) DEFAULT NULL,
  `VisibiltyCat` tinyint(1) NOT NULL DEFAULT 0,
  `AllowCmntCat` tinyint(1) NOT NULL DEFAULT 0,
  `AllowAdsCAt` tinyint(1) NOT NULL DEFAULT 0,
  `Create_At` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='Table Des Categories ';

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`CatID`, `NameCat`, `DescripCat`, `ParentCat`, `OrderCat`, `VisibiltyCat`, `AllowCmntCat`, `AllowAdsCAt`, `Create_At`) VALUES
(1, 'Hand Made', 'description of Veucule description of Veucule description of Veucule description of Veucule description of Veucule description of Veucule description of Veucule description of Veucule description of Veucule description of Veucule description of Veucule de', 0, 10, 1, 0, 0, '2024-11-29 10:14:08'),
(2, 'Computers', 'description of mainson description of mainson description of mainson description of mainson description of mainson description of mainson description of mainson description of mainson description of mainson description of mainson ', 0, 100, 0, 1, 0, '2024-11-29 10:14:08'),
(9, 'Cell Phones', 'description of Veucule description of Veucule description of Veucule description of Veucule description of Veucule description of Veucule description of Veucule description of Veucule description of Veucule  ', 0, 1, 1, 0, 0, '2024-11-29 10:16:21'),
(10, 'Tools', 'description of mainson description of mainson description of mainson description of mainson description of mainson description ', 0, 5, 0, 1, 0, '2024-11-29 10:16:21'),
(11, 'Nokia  500', 'Decsription 1 Nokia Decsription 1 Nokia Decsription 1 Nokia Decsription 1 Nokia Decsription 1 Nokia  update', 9, 550, 1, 0, 0, '2024-12-11 16:42:38'),
(13, 'casrol v', 'Decsription 1 carsol vDecsription 1 carsol vDecsription 1 carsol vDecsription 1 carsol vDecsription 1 carsol vDecsription 1 carsol vDecsription 1 carsol vDecsription 1 carsol vDecsription 1 carsol vDecsription 1 carsol vDecsription 1 carsol vDecsription 1', 1, 63, 1, 1, 1, '2024-12-12 11:50:20'),
(14, 'LG V1', 'Decsription 1 lg dec Decsription 1 lg dec Decsription 1 lg dec Decsription 1 lg dec Decsription 1 lg dec Decsription 1 lg dec Decsription 1 lg dec Decsription 1 lg dec Decsription 1 lg dec Decsription 1 lg dec Decsription 1 lg dec Decsription 1 lg dec Dec', 9, 7, 1, 1, 0, '2024-12-12 13:29:21');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `Cmnt_ID` int(11) NOT NULL,
  `Cmnt_Txt` text NOT NULL DEFAULT 'No Comment....',
  `Cmnt_Stat` tinyint(2) NOT NULL DEFAULT 0,
  `Cmnt_Date` datetime NOT NULL DEFAULT current_timestamp(),
  `Item_id_cmnt` int(11) NOT NULL,
  `User_id_cmnt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`Cmnt_ID`, `Cmnt_Txt`, `Cmnt_Stat`, `Cmnt_Date`, `Item_id_cmnt`, `User_id_cmnt`) VALUES
(1, 'No Comment.... 1 0No Comment.... 1 0No Comment.... 1 0No Comment.... 1 0No Comment.... 1 0No Comment.... 1 0No Comment.... 1 0No Comment.... 1 0No Comment.... 1 0No Comment.... 1 0No Comment.... 1 0No Comment.... 1 0', 0, '2024-12-02 11:58:47', 14, 14),
(3, 'No Comment.... 33No Comment.... 33No Comment.... 33No Comment.... 33No Comment.... 33No Comment.... 33No Comment.... 33No Comment.... 33No Comment.... 33No Comment.... 33No Comment.... 33No Comment.... 33No Comment.... 33No Comment.... 33', 1, '2024-12-02 11:59:25', 10, 27),
(4, 'No Comment.... 3 0No Comment.... 1 0No Comment.... 1 0No Comment.... 1 0No Comment.... 1 0No Comment.... 1 0No Comment.... 1 0No Comment.... 1 0No Comment.... 1 0No Comment.... 1 0No Comment.... 1 0No Comment.... 1 0', 0, '2024-12-03 11:19:55', 10, 27),
(5, 'No Comment....55 No Comment....55 No Comment....55 No Comment....55 No Comment....55 No Comment....55 No Comment....55 No Comment....55 No Comment....55 No Comment....55 No Comment....55 No Comment....55 No Comment....55 No Comment....55 No Comment..', 1, '2024-12-03 11:19:55', 8, 27),
(6, 'No Comment.... 8 No Comment.... 8 No Comment.... 8 No Comment.... 8 No Comment.... 8 No Comment.... 8 No Comment.... 8 No Comment.... 8 No Comment.... 8 No Comment.... 8 No Comment.... 8 No Comment.... 8 No Comment.... 8 No Comment.... 8 No Comment..', 1, '2024-12-25 11:20:33', 16, 18),
(7, 'mon pc et bien', 1, '2024-12-09 15:30:34', 16, 26),
(10, 'NeW Comment Is here ', 1, '2024-12-09 15:53:52', 16, 27),
(11, 'Not Yet Not Yet Not Yet Not Yet Not Yet Not Yet Not Yet Not Yet Not Yet Not Yet Not Yet Not Yet Not Yet Not Yet Not Yet Not Yet Not Yet Not Yet Not Yet Not Yet Not Yet Not Yet Not Yet Not Yet Not Yet Not Yet Not Yet Not Yet Not Yet Not Yet Not Yet NoNot Yet Not Yet Not Yet Not Yet Not Yet Not Yet Not Yet Not Yet Not Yet Not Yet Not Yet Not Yet Not Yet Not Yet Not Yet Not Yet Not Yet Not Yet Not Yet Not Yet Not Yet Not Yet Not Yet Not Yet Not Yet Not Yet Not Yet Not Yet Not Yet Not Yet Not Yet No', 1, '2024-12-09 16:27:59', 16, 27),
(12, 'gooooooooood Pianeau', 0, '2024-12-11 11:24:25', 18, 27);

-- --------------------------------------------------------

--
-- Structure de la table `items`
--

CREATE TABLE `items` (
  `ItemID` int(11) NOT NULL,
  `Name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Description` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Price` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Add_Date` date NOT NULL DEFAULT current_timestamp(),
  `Country_Made` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'Made In Moroci',
  `Image` varchar(250) NOT NULL DEFAULT 'no-img.jpg',
  `tagsItem` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Status` varchar(200) NOT NULL DEFAULT 'New Product',
  `ApproveItm` tinyint(4) NOT NULL DEFAULT 0,
  `Rating` smallint(11) NOT NULL,
  `Cat_ID` int(11) NOT NULL,
  `Member_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `items`
--

INSERT INTO `items` (`ItemID`, `Name`, `Description`, `Price`, `Add_Date`, `Country_Made`, `Image`, `tagsItem`, `Status`, `ApproveItm`, `Rating`, `Cat_ID`, `Member_ID`) VALUES
(7, 'danon 1 save ', 'Bon Prodiot Of the Year 1 save', '$100', '2024-11-29', 'China save', 'no-img.jpg', 'tag1,tag10', '4', 1, 0, 9, 12),
(8, 'pc Bureau gamer', 'Bon Prodiot Of the Year  ||| 55  nom 2  amison 1', '$100', '2024-11-29', 'italy', 'no-img.jpg', 'tag1 ', '4', 1, 0, 2, 27),
(10, 'aprove ', 'Bon Prodiot Of the Year 1Bon Prodiot Of the Year 1Bon Prodiot Of the Year 1Bon Prodiot Of the Year 1Bon Prodiot Of the Year 1Bon Prodiot Of the Year 1Bon Prodiot Of the Year 1Bon Prodiot Of the Year 1', '$650', '2024-11-29', 'China', 'no-img.jpg', 'tag1,tag8', '3', 0, 0, 9, 27),
(14, 'Imprimamante', 'Bon Prodiot Of the Year 1', '$1000000', '2024-11-30', 'China', 'no-img.jpg', '', '4', 1, 0, 9, 18),
(16, 'Pc', 'pc Portanble ', '$1000', '2024-12-05', 'Made In Moroci', 'no-img.jpg', 'tag10', 'New Product', 1, 0, 2, 27),
(17, 'Pc Mac', 'pc Portanble  mac', '$1000', '2024-12-05', 'Made In Moroci', 'no-img.jpg', '', 'New Product', 0, 0, 2, 27),
(18, 'Paineau', 'Descp paineDescp paineDescp paineDescp paineDescp paineDescp paineDescp paineDescp paineDescp paineDescp paineDescp paineDescp paineDescp paineDescp paineDescp paineDescp paineDescp paineDescp paineDescp paineDescp paineDescp paine paineDescp paineDescp paineDescp paineDescp paineDescp paineDescp paineDescp paineDescp paine', '$100', '2024-12-05', 'Made In Moroci', 'no-img.jpg', '', 'New Product', 1, 0, 10, 27),
(19, 'Battre', 'descriptnio  Battre descriptnio  Battre descriptnio  Battre descriptnio  Battre descriptnio  Battre descriptnio  Battre descriptnio  Battre descriptnio  Battre descriptnio  Battre descriptnio  Battre descriptnio  Battre descriptnio  Battre descriptnio  Battre descriptnio  Battre descriptnio  Battre descriptnio  Battre descriptnio  Battre descriptnio  Battre descriptnio  Battre descriptnio  Battre descriptnio  Battre descriptnio  Battre descriptnio  Battre descriptnio  Battre ', '$555550', '2024-12-05', 'Made In Moroci', 'no-img.jpg', '', 'New Product', 0, 0, 1, 27),
(20, 'new Ad', 'decsript of new Ad decsript of new Ad decsript of new Ad decsript of new Ad ', '$123', '2024-12-07', 'fes', 'no-img.jpg', '', '1', 0, 0, 2, 27),
(21, 'fekir', 'descript fekir descript fekir descript fekir descript fekir ', '$20000', '2024-12-07', 'jbal', 'no-img.jpg', '', '1', 0, 0, 10, 27),
(22, 'BMW CAR', 'Bon Prodiot Of the Year 1 BMW Bon Prodiot Of the Year 1 BMW Bon Prodiot Of the Year 1 BMW Bon Prodiot Of the Year 1 BMW Bon Prodiot Of the Year 1 BMW Bon Prodiot Of the Year 1 BMW Bon Prodiot Of the Year 1 BMW ', '$188888', '2024-12-11', 'China', 'no-img.jpg', '', '2', 0, 0, 1, 27),
(24, 'New Item of Tag', 'Bon Prodiot Of the Year 1 tags Bon Prodiot Of the Year 1 tags Bon Prodiot Of the Year 1 tags Bon Prodiot Of the Year 1 tags Bon Prodiot Of the Year 1 tags Bon Prodiot Of the Year 1 tags Bon Prodiot Of the Year 1 tags Bon Prodiot Of the Year 1 tags Bon Prodiot Of the Year 1 tags ', '$100', '2024-12-12', 'China', 'no-img.jpg', 'Phone,info,HeadPhone', '1', 0, 0, 9, 26),
(25, 'supp rime tag', 'Bon Prodiot Of the Year 1 supprimer tagBon Prodiot Of the Year 1 supprimer tagBon Prodiot Of the Year 1 supprimer tagBon Prodiot Of the Year 1 supprimer tagBon Prodiot Of the Year 1 supprimer tagBon Prodiot Of the Year 1 supprimer tagBon Prodiot Of the Year 1 supprimer tagBon Prodiot Of the Year 1 supprimer tag', '$1007565', '2024-12-12', 'Algeria ', 'no-img.jpg', 'Phone,info,HeadPhone,Omo', '3', 0, 0, 9, 27),
(26, 'danon 1sssssssssss', 'Bon Prodiot Of the Year sssssssssss', '$100', '2024-12-12', 'China', 'no-img.jpg', 'Phone,info,HeadPhone', '4', 0, 0, 14, 26),
(27, 'new tag le 13 12 2024', 'Tags Bon Prodiot Of the Year 1sdTags Bon Prodiot Of the Year 1sdTags Bon Prodiot Of the Year 1sdTags Bon Prodiot Of the Year 1sdTags Bon Prodiot Of the Year 1sdTags Bon Prodiot Of the Year 1sdTags Bon Prodiot Of the Year 1sdTags Bon Prodiot Of the Year 1sdTags Bon Prodiot Of the Year 1sdTags Bon Prodiot Of the Year 1sdTags Bon Prodiot Of the Year 1sdTags Bon Prodiot Of the Year 1sd', '$100555', '2024-12-13', 'Chinaasd', 'no-img.jpg', 'tag1 ,tag2,Medox', '1', 1, 0, 9, 27),
(28, 'SYM MOTO', 'MOTO Bon Prodiot Of the Year 1MOTO Bon Prodiot Of the Year 1MOTO Bon Prodiot Of the Year 1MOTO Bon Prodiot Of the Year 1MOTO Bon Prodiot Of the Year 1MOTO Bon Prodiot Of the Year 1MOTO Bon Prodiot Of the Year 1MOTO Bon Prodiot Of the Year 1MOTO Bon Prodiot Of the Year 1MOTO Bon Prodiot Of the Year 1MOTO Bon Prodiot Of the Year 1MOTO Bon Prodiot Of the Year 1', '$1000000', '2024-12-13', 'Thaylaand', 'no-img.jpg', 'Phone,Moto,Tag1', '4', 1, 0, 9, 26);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `UserName` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Email` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `FullName` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Password` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `GroupID` int(11) NOT NULL DEFAULT 0,
  `TrustStatus` int(11) NOT NULL DEFAULT 0,
  `RegStatus` int(11) NOT NULL DEFAULT 0,
  `CreateAt` datetime DEFAULT current_timestamp(),
  `Avatar` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`UserID`, `UserName`, `Email`, `FullName`, `Password`, `GroupID`, `TrustStatus`, `RegStatus`, `CreateAt`, `Avatar`) VALUES
(12, 'med2', 'med@gmail.com255', 'medox2 med', '011c945f30ce2cbafc452f39840f025693339c42', 1, 0, 0, '2024-11-19 10:40:01', ''),
(14, 'aimine', '123@gmail.com22', 'fuul name 2asd asd', '011c945f30ce2cbafc452f39840f025693339c42', 0, 0, 1, '2024-11-21 17:06:27', ''),
(18, 'rachid', 'asdas@gmaol.cf', 'asdash yes', 'd5644e8105ad77c3c3324ba693e83d8fffd54950', 0, 0, 0, '2024-11-22 12:03:24', ''),
(26, '3issam', 'nom10@gmail.col', 'nam10 test pending', '2915b2d27a44bb48ee185df2ef5cbd8583417380', 0, 0, 1, '2024-11-25 10:40:19', ''),
(27, 'Yasssin', 'Yassin@gmaoil.com', 'zero zero 4', '39dfa55283318d31afe5a3ff4a0e3253e2045e43', 0, 0, 1, '2024-12-04 17:32:26', 'Profile.jpg'),
(28, 'foad', '123456@example.com', 'No Full Name Now', '39dfa55283318d31afe5a3ff4a0e3253e2045e43', 0, 0, 0, '2024-12-06 11:27:42', ''),
(41, 'abdlatif', 'Update@gmail.com', 'full name Update', 'fb91e24fa52d8d2b32937bf04d843f730319a902', 0, 0, 1, '2024-12-06 12:25:39', ''),
(43, 'osama', '123456@example.com', '', '39dfa55283318d31afe5a3ff4a0e3253e2045e43', 0, 0, 0, '2024-12-06 12:29:16', ''),
(45, 'asdasd', 'dsdsd', 'dsdsfsd', '163cc62e57efd43c052b48bf154e5d2f5d2ccfc2', 0, 0, 1, '2024-12-13 18:06:19', 'test.jpg'),
(46, 'supprime r', 'hjghgv', 'hjgvjhgvj', '62314a13a61eb9e10586387febd482aefce0a24f', 0, 0, 1, '2024-12-14 10:15:52', 'med.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CatID`),
  ADD UNIQUE KEY `Unique Categorie` (`NameCat`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`Cmnt_ID`),
  ADD KEY `fr_Cmnt_Item` (`Item_id_cmnt`),
  ADD KEY `fk_User_comnt` (`User_id_cmnt`);

--
-- Index pour la table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`ItemID`),
  ADD UNIQUE KEY `unique name` (`Name`),
  ADD KEY `fk_Id_Cat` (`Cat_ID`),
  ADD KEY `Member_ID` (`Member_ID`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `uniq` (`UserName`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `CatID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `Cmnt_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `items`
--
ALTER TABLE `items`
  MODIFY `ItemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`Item_id_cmnt`) REFERENCES `items` (`ItemID`),
  ADD CONSTRAINT `fk_User_comnt` FOREIGN KEY (`User_id_cmnt`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fr_Cmnt_Item` FOREIGN KEY (`Item_id_cmnt`) REFERENCES `items` (`ItemID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `fk_Id_Cat` FOREIGN KEY (`Cat_ID`) REFERENCES `categories` (`CatID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`Member_ID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
