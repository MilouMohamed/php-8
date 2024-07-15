-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2024 at 06:48 PM
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
-- Database: `v_p_n_b_v13`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `curdemo` ()   BEGIN
  DECLARE done INT DEFAULT FALSE;
  DECLARE a int;
  DECLARE b varchar(255);
  DECLARE cur1 CURSOR FOR SELECT id_,Prix_  FROM table_1; 
  DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

  OPEN cur1; 

  read_loop: LOOP
    FETCH cur1 INTO a, b; 
    IF done THEN
      LEAVE read_loop;
    END IF;
    SELECT concat("Le Nom ",a," -------- Prix",b) ;
  END LOOP;

  CLOSE cur1; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `loop_1` ()   BEGIN 
DECLARE nbr int;
SET nbr=1;

lp1:LOOP
SELECT concat( "nice ",nbr);
IF(nbr >= 4) THEN 
LEAVE lp1;
ELSE  SET nbr=nbr+1;
END IF;
 
END LOOP lp1; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `p1` ()   BEGIN
DECLARE a int(11);
DECLARE b double;
DECLARE isEnd bool DEFAULT False;
DECLARE cur CURSOR for SELECT id_ , Prix_ from table_1;
DECLARE CONTINUE HANDLER FOR NOT  FOUND SET isEnd= true;
OPEN cur;
lp:LOOP
FETCH cur INTO a,b ;
if(isEnd) THEN LEAVE lp;
END if;

SELECT CONCAT("Id ",a,"  ||| Prix",b) as "Id AND Prix";
END LOOP lp;

CLOSE cur;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `p_between_date` (`d1` DATE, `d2` DATE)   BEGIN 
SELECT * from table_1 WHERE Date_ BETWEEN d1 AND d2;
 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `p_inout` (IN `nbr1` INT, INOUT `conter` INT)   BEGIN

SET conter=conter+nbr1;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `p_moyenne` (OUT `moyen` FLOAT)   BEGIN  
set moyen =  (SELECT AVG(Prix_) FROM table_1);
set moyen = ROUND(moyen,4);
 SELECT moyen ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `p_prix` (`id` INT)   BEGIN
	SELECT Prix_ FROM table_1 WHERE id_ = id;
	
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `p_sum_prix_par_nom` (IN `nom` VARCHAR(200))   BEGIN

SELECT SUM(Prix_) As  "Le Total pour "
FROM table_1 WHERE Nom_ LIKE nom;


END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `func_tab` () RETURNS INT(11) DETERMINISTIC BEGIN   
DECLARE rs INT DEFAULT 0 ;
INSERT INTO  temp1 (SELECT * FROM table_1);
SET rs=1;
RETURN rs;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `f_Max` () RETURNS INT(11) DETERMINISTIC BEGIN
DECLARE max int;
set max=(SELECT max(Prix_) FROM table_1 );
RETURN max;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `f_min_prix` () RETURNS TEXT CHARSET utf8mb4 COLLATE utf8mb4_general_ci DETERMINISTIC BEGIN

DECLARE mn double;
DECLARE  nom varchar(20) ;
DECLARE  txt varchar(200);
DECLARE id int;
SET mn= (SELECT MIN(Prix_) from table_1);

SET  id=(SELECT id_ FROM table_1 WHERE Prix_ = mn);
SET  nom=(SELECT Nom_ FROM table_1 WHERE Prix_ = mn);
 
set txt = concat("Id:",id,"  Nom:",nom," Prix:",mn); 
RETURN txt;

END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `nom_par_id` (`num` INT) RETURNS VARCHAR(200) CHARSET utf8mb4 COLLATE utf8mb4_general_ci DETERMINISTIC BEGIN
DECLARE  res varchar(200);
 set res= (select Nom_ FROM table_1 WHERE id_ = num  );

RETURN res;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `table_1`
--

CREATE TABLE `table_1` (
  `id_` int(11) NOT NULL,
  `Nom_` varchar(20) DEFAULT 'Nom1',
  `Prix_` double DEFAULT 10.5,
  `Date_` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_1`
--

INSERT INTO `table_1` (`id_`, `Nom_`, `Prix_`, `Date_`) VALUES
(1, 'Nom1', 10.5, '2024-06-20'),
(2, 'Nom2', 1005.33, '2024-06-20'),
(3, 'Nom2', 5.33, '2022-01-10'),
(4, 'Nom7', 805.33, '2026-08-10'),
(5, 'Nom5', 505.33, '2024-12-10'),
(6, 'Nom2', 1200, '2024-06-17');

-- --------------------------------------------------------

--
-- Table structure for table `temp1`
--

CREATE TABLE `temp1` (
  `id` int(11) DEFAULT NULL,
  `nom` varchar(200) DEFAULT NULL,
  `prix` double DEFAULT NULL,
  `date_` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `temp1`
--

INSERT INTO `temp1` (`id`, `nom`, `prix`, `date_`) VALUES
(1, 'Nom1', 10.5, '2024-06-20'),
(2, 'Nom2', 1005.33, '2024-06-20'),
(3, 'Nom2', 5.33, '2022-01-10'),
(4, 'Nom7', 805.33, '2026-08-10'),
(5, 'Nom5', 505.33, '2024-12-10'),
(6, 'Nom2', 1200, '2024-06-17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_1`
--
ALTER TABLE `table_1`
  ADD PRIMARY KEY (`id_`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_1`
--
ALTER TABLE `table_1`
  MODIFY `id_` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
