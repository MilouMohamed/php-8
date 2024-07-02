<?php
/* 
Youtube : jamaoui  Mouad

-1 -- Ecommerce php 		(33)
-2 -- MVC 			        (7)
-3 -- php POO 			    (15)
-4 -- DAO 			        (15)
-5 -- Laravel			    (74)
*/

 
//-1 ---------- Ecommerce php 		(33) ----------------
// Database: ecom_1 Table: ec_catg 
//*******************************************************
//--------------    3 / 33
echo "Test ---- Test";





















//*******************************************************
//--------------    1 et 2 / 33  // Database: ecom_1 Table: ec_catg 
/* create DATABASE Ecom_1;
USE Ecom_1;
CREATE table Ec_User(
id_u int PRIMARY KEY AUTO_INCREMENT ,
    login_u varchar(255),
    password_u varchar(255),
    date_crate_u datetime
);

CREATE TABLE ec_catg(
id_cg int PRIMARY KEY AUTO_INCREMENT,
    libelle varchar(255),
    descrip varchar(255),
    date_crate_c datetime
);

CREATE TABLE ec_prod(
id_p int PRIMARY KEY AUTO_INCREMENT,
    libelle varchar(255),
    prix double,
    discont int,
    id_cg int,
    date_crate_p datetime ,
      FOREIGN KEY(id_cg) REFERENCES ec_catg(id_cg)    
)


alter TABLE ec_prod add CONSTRAINT fk_cag 
FOREIGN KEY(id_cg)  REFERENCES ec_catg(id_cg) on DELETE CASCADE on UPDATE CASCADE;
--------------------------------------------


INSERT INTO ec_user (`login_u`,`password_u`,`date_crate_u`) 
VALUES("0000","0000",curtime()),
VALUES("","",curtime());

SELECT *  FROM ec_user;
--------------------------------------------
INSERT INTO ec_catg (libelle,descrip,date_crate_c) VALUES
 ("Carot","bon etat",curtime()), 
 ("Pomme","bon",curtime()), 
 ("Banan","bien etat",curtime());

 INSERT INTO `ec_prod` 
( `libelle`, `prix`, `discont`, `id_cg`, `date_crate_p`) VALUES 
(  'Prod 1', '100.6', '2', 			'1', '2024-07-18 01:38:43'),
(  'Prod 8', '60.30', '4', 			'2', '2024-07-18 01:38:43'),
(  'Prod 6', '80.10', '10', 		'3', '2024-07-18 01:38:43'),
(  'Prod 3', '40.50', '12', 		'4', '2024-07-18 01:38:43'),
(  'Prod 6', '80.10', '15', 		'4', '2024-07-18 01:38:43'),
(  'Prod 40', '40.50', '20', 		'3', '2024-07-18 01:38:43')
;


*/



?>