-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2024 at 06:50 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `v_11`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `p1` ()   BEGIN
    	DECLARE gt integer DEFAULT 44; 
        SET gt=gt+10;
        SELECT concat( "FROM P_",gt);

    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `p1_v2` (`inn` INT)   BEGIN 
DECLARE note  int;
set note=inn;
IF(note >= 10) THEN 
SELECT "Braveau";
end IF;
if(note < 10) THEN 
SELECT "Redouble";
end if ;
 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `p2` ()   BEGIN
DECLARE ch varchar(100) DEFAULT "Test";
 
SET ch="Mom 2";
SELECT ch;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `p2_v2` (`inn` INT)   BEGIN 
DECLARE note  int;
set note=inn;
IF(note < 10) THEN 
SELECT "Roudouble";
ELSEIF(  note < 19) THEN 
SELECT "Bom";
ELSE  SELECT "20/20"  ;
END if;
 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `POne3` ()   BEGIN  
    SELECT "IS N ";  
 END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Proc1` ()   BEGIN

SELECT "This is sql proc";

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `t1`
--

CREATE TABLE `t1` (
  `newCol` tinyint(1) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `nm1` int(11) DEFAULT NULL,
  `tt98` int(11) DEFAULT NULL,
  `nm3` char(20) DEFAULT NULL,
  `nm10` int(11) DEFAULT NULL,
  `nm8` varchar(50) NOT NULL,
  `gg` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `t1`
--

INSERT INTO `t1` (`newCol`, `name`, `nm1`, `tt98`, `nm3`, `nm10`, `nm8`, `gg`) VALUES
(10, '10', 10, 10, '10', 10, '10', ''),
(12, '12', 12, 12, '12', 12, '12', ''),
(4, '4', 4, 4, '4', 4, '4', ''),
(8, '8', 8, 8, '8', 8, 'null', '');

-- --------------------------------------------------------

--
-- Table structure for table `v_15`
--

CREATE TABLE `v_15` (
  `id` int(11) NOT NULL,
  `nom` varchar(10) NOT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `v_16_clint`
--

CREATE TABLE `v_16_clint` (
  `id_c` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `v_16_clint`
--

INSERT INTO `v_16_clint` (`id_c`, `name`) VALUES
(1, 'Nom 1');

-- --------------------------------------------------------

--
-- Table structure for table `v_16_prdc`
--

CREATE TABLE `v_16_prdc` (
  `id_p` int(11) NOT NULL,
  `price` float NOT NULL,
  `id_cc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `v_16_prdc`
--

INSERT INTO `v_16_prdc` (`id_p`, `price`, `id_cc`) VALUES
(1, 1.5, 1),
(5, 1.66, 1),
(22, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `v_17_client`
--

CREATE TABLE `v_17_client` (
  `id_c` int(11) NOT NULL,
  `nom` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `v_17_client`
--

INSERT INTO `v_17_client` (`id_c`, `nom`) VALUES
(22, 'Nom 2'),
(55, 'Nom 55'),
(66, 'Nom 6');

-- --------------------------------------------------------

--
-- Table structure for table `v_17_prod`
--

CREATE TABLE `v_17_prod` (
  `id_p` int(11) NOT NULL,
  `price` float DEFAULT NULL,
  `id_c` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `v_17_prod`
--

INSERT INTO `v_17_prod` (`id_p`, `price`, `id_c`) VALUES
(1, 1000.5, 22),
(2, 2000.3, 22),
(3, 33, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `v_21_shopmember`
--

CREATE TABLE `v_21_shopmember` (
  `id_p` int(11) NOT NULL,
  `id_c` int(11) NOT NULL,
  `date_sp` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `v_21_shopmember`
--

INSERT INTO `v_21_shopmember` (`id_p`, `id_c`, `date_sp`) VALUES
(1, 22, '2024-06-20'),
(5, 55, '2024-06-03'),
(5, 66, '2024-06-05');

-- --------------------------------------------------------

--
-- Table structure for table `v_22_stringf`
--

CREATE TABLE `v_22_stringf` (
  `id_s` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `v_22_stringf`
--

INSERT INTO `v_22_stringf` (`id_s`, `nom`) VALUES
(1, 'pc*ess* de *es*'),
(2, 'pcMoroco'),
(3, 'pcMarrakech'),
(4, 'pcarabic saodia'),
(5, 'pc#'),
(6, 'pc$'),
(7, 'pc£'),
(8, 'pc€'),
(9, 'pcqwertyu'),
(44, 'NOM99'),
(45, '      Nom          ');

-- --------------------------------------------------------

--
-- Table structure for table `v_30`
--

CREATE TABLE `v_30` (
  `idV` int(11) NOT NULL,
  `priceV` double DEFAULT NULL,
  `nbrV` int(10) DEFAULT NULL,
  `dateV` datetime DEFAULT NULL,
  `NAME` varchar(20) DEFAULT 'Nom 1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `v_30`
--

INSERT INTO `v_30` (`idV`, `priceV`, `nbrV`, `dateV`, `NAME`) VALUES
(1, 30, 1, '2024-06-20 12:32:10', 'Mdm1'),
(2, 80, 3, '2024-06-20 12:32:10', 'Mdm3'),
(3, 80, 5, '2024-03-20 12:32:10', 'Mdm5'),
(4, 10.894, 7, '2024-06-20 12:32:10', 'Mdm7'),
(85, 10.25, 45, '2024-06-26 10:12:10', 'Mr45'),
(500, 30, 25, '2024-06-11 17:37:35', 'Mr25'),
(700, 45.663, 52, '2024-04-11 17:37:35', 'Mr52'),
(701, 60, 12, '2026-06-18 17:27:12', 'Nom 16'),
(702, 60, 30, '2024-06-27 17:27:12', 'Nom 166'),
(703, 30, 300, '2024-06-13 17:28:31', 'Nom 130'),
(704, 60, 666, '2027-06-09 17:28:31', 'Nom 1666');

-- --------------------------------------------------------

--
-- Table structure for table `v_47_lang`
--

CREATE TABLE `v_47_lang` (
  `id_lng` int(11) NOT NULL,
  `label_lng` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `v_47_lang`
--

INSERT INTO `v_47_lang` (`id_lng`, `label_lng`) VALUES
(1, 'PHP'),
(2, 'JS'),
(3, 'MySQL'),
(6, 'React-js'),
(7, 'Phyton');

-- --------------------------------------------------------

--
-- Table structure for table `v_47_user`
--

CREATE TABLE `v_47_user` (
  `id_usr` int(11) NOT NULL,
  `name_usr` varchar(20) DEFAULT NULL,
  `date_usr` date DEFAULT curdate(),
  `id_lng` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `v_47_user`
--

INSERT INTO `v_47_user` (`id_usr`, `name_usr`, `date_usr`, `id_lng`) VALUES
(2, 'RACHID', '2024-06-27', 2),
(3, 'TAYAB', '2024-06-27', 1),
(4, 'Khalid', '2024-06-15', 1),
(5, 'RABI3', '2024-06-27', 3),
(6, 'IBRAHIM', '2024-06-27', 1),
(10, 'Hafssa', '0000-00-00', NULL),
(11, 'Nassim', '0000-00-00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t1`
--
ALTER TABLE `t1`
  ADD UNIQUE KEY `nm1` (`nm1`),
  ADD UNIQUE KEY `nm3` (`nm3`),
  ADD UNIQUE KEY `nm1_2` (`nm1`);

--
-- Indexes for table `v_15`
--
ALTER TABLE `v_15`
  ADD PRIMARY KEY (`nom`);

--
-- Indexes for table `v_16_clint`
--
ALTER TABLE `v_16_clint`
  ADD PRIMARY KEY (`id_c`);

--
-- Indexes for table `v_16_prdc`
--
ALTER TABLE `v_16_prdc`
  ADD PRIMARY KEY (`id_p`),
  ADD KEY `id_cc` (`id_cc`);

--
-- Indexes for table `v_17_client`
--
ALTER TABLE `v_17_client`
  ADD PRIMARY KEY (`id_c`);

--
-- Indexes for table `v_17_prod`
--
ALTER TABLE `v_17_prod`
  ADD PRIMARY KEY (`id_p`),
  ADD KEY `fr_KY` (`id_c`);

--
-- Indexes for table `v_21_shopmember`
--
ALTER TABLE `v_21_shopmember`
  ADD PRIMARY KEY (`id_c`,`id_p`),
  ADD KEY `Fk_Prod` (`id_p`);

--
-- Indexes for table `v_22_stringf`
--
ALTER TABLE `v_22_stringf`
  ADD PRIMARY KEY (`id_s`);

--
-- Indexes for table `v_30`
--
ALTER TABLE `v_30`
  ADD PRIMARY KEY (`idV`);

--
-- Indexes for table `v_47_lang`
--
ALTER TABLE `v_47_lang`
  ADD PRIMARY KEY (`id_lng`);

--
-- Indexes for table `v_47_user`
--
ALTER TABLE `v_47_user`
  ADD PRIMARY KEY (`id_usr`),
  ADD KEY `fk_lang` (`id_lng`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `v_22_stringf`
--
ALTER TABLE `v_22_stringf`
  MODIFY `id_s` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `v_30`
--
ALTER TABLE `v_30`
  MODIFY `idV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=705;

--
-- AUTO_INCREMENT for table `v_47_lang`
--
ALTER TABLE `v_47_lang`
  MODIFY `id_lng` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `v_47_user`
--
ALTER TABLE `v_47_user`
  MODIFY `id_usr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `v_16_prdc`
--
ALTER TABLE `v_16_prdc`
  ADD CONSTRAINT `v_16_prdc_ibfk_1` FOREIGN KEY (`id_cc`) REFERENCES `v_16_clint` (`id_c`);

--
-- Constraints for table `v_17_prod`
--
ALTER TABLE `v_17_prod`
  ADD CONSTRAINT `fr_KY` FOREIGN KEY (`id_c`) REFERENCES `v_17_client` (`id_c`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `v_21_shopmember`
--
ALTER TABLE `v_21_shopmember`
  ADD CONSTRAINT `Fk_Prod` FOREIGN KEY (`id_p`) REFERENCES `v_16_prdc` (`id_p`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Fk_Shp_Cli` FOREIGN KEY (`id_c`) REFERENCES `v_17_client` (`id_c`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `v_47_user`
--
ALTER TABLE `v_47_user`
  ADD CONSTRAINT `fk_lang` FOREIGN KEY (`id_lng`) REFERENCES `v_47_lang` (`id_lng`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
