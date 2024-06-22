<?php
// MySQL  Elzero Web School   51 videos
echo "MySQL <br>";  // 
echo "V 22  ----------------------------<br>";
//----------- Constraint   Foreign Key Many To Many ;
// Client 1_n  --------------- 1_n Product
// SELECT nom as "Le Nom", LEFT(nom,2) FROM `v_22_stringf`;  ma | ca (deux letters)
// SELECT nom as "Le Nom", LEFT(nom,2) FROM `v_22_stringf`;  ..co | ..da (deux letters derniere)
//SELECT nom as "Le Nom", MID(nom,2, 4) FROM `v_22_stringf`;//Moroco ==> oroc 
//   MID(nom,-3, 2)   ======>   Marrakech 	ec
// MID(String , posiStart, lenght)  


/*
echo "V 21  ----------------------------<br>";
//----------- Constraint   Foreign Key Many To Many ;
// Client 1_n  --------------- 1_n Product
/*
create table v_21_ShopMember (
     id_p int , id_c int, date_sp date, 
PRIMARY KEY(id_c , id_p), 
CONSTRAINT Fk_Shp_Cli FOREIGN KEY(id_c) REFERENCES v_17_client(id_c)
 on DELETE CASCADE on UPDATE CASCADE, 
 CONSTRAINT Fk_Prod FOREIGN KEY(id_p) REFERENCES v_16_prdc(id_p)
  On DELETE CASCADE On UPDATE CASCADE 
); 
*/


/*
echo "V 20  ----------------------------<br>";
//----------- Constraint   Foreign Key One To One ;
// Clinet 1  --------------- 1 Serial


/*
echo "V 19  ----------------------------<br>";
//----------- Constraint   Foreign Key One To Many ;
// Clinet 1  --------------- 0_n Comments


 


/*
echo "V 18  ----------------------------<br>";
//----------- Constraint   Foreign Key Test Relation ;
// alter table v_17_prod add CONSTRAINT fk_clt FOREIGN key(id_c) REFERENCES v_17_client(id_c) 
// ON DELETE setnull  on UPDATE CASCADE
// [ ON UPDATE { NO ACTION | CASCADE | SET NULL | SET DEFAULT } ]
// RESTRIC  erro dans delete et update  
// ALTER TABLE v_17_prod DROP INDEX fk_clt; 


 


/*
echo "V 17  ----------------------------<br>";
//----------- Constraint   Foreign Key Test Relation ;
// table  v_17_client
// alter table v_17_prod add CONSTRAINT fk_clt FOREIGN key(id_c) REFERENCES v_17_client(id_c) 
// ON DELETE CASCADE  on UPDATE CASCADE
// --------------------- JOINT
// SELECT * FROM v_17_prod JOIN v_17_client on v_17_client.id_c = v_17_prod.id_c; 
// update v_17_client set id_c=44 WHERE id_c=33; // poue modifier id pk in t1 (foreign key in t2)
// delete from v_17_client WHERE id_c = 11; 




/*
echo "V 16  ----------------------------<br>";
//----------- Constraint   Foreign Key ;
// v_11 
// Foreign key (id_c) references t1(id)
// ) ENGINE = InnoDB
// attention la suprission de t2 ne peut pas etre si le t1 n est pas supprime

/*
echo "V 15  ----------------------------<br>";
//----------- Constraint   PRIMARY KEY (Not acccepte NULL);
// alter table v_15 add primary KEY(id); 
// alter table v_15 DROP PRIMARY KEY; 
// 
/*
echo "V 14  ----------------------------<br>";
//----------- Constraint   NOT NULL and UNIQUE;
// UNIQUE ===> ne pas  repate (ne pas repete commme nom etilisateur) 
// ALTER TABLE t1 add UNIQUE(nm1);    
// alter table t1 ADD CONSTRAINT UNIQUE KEY(nm1); 

// show INDEX from t1;   // show les constraint d un table
// alter table t1 drop INDEX nm1; (dans index )

// 

/*
echo "V 13  ----------------------------<br>";
//----------- Constraint;
//alter TABLE t1 MODIFY nm8 varchar(50) NOT NULL; 
// TRUNCATE TABLE t1   ===> pour vide la table


echo "V 12  ----------------------------<br>";
//----------- Tables Advanced;
// alter table t1 MODIFY tt98 int(11), DROP nm; //2 instruction 
// change to utf8_general_ci all colunms de tyoe char Varchar
//alter TABLE t1 CONVERT TO CHARACTER SET utf8;
//alter TABLE t1 CONVERT TO CHARACTER SET LATIN1; 

/*
echo "V 11  ----------------------------<br>";
//----------- Tables Rename Change Type;
// -----------  ADD 
// alter table t1 add nc blob after id; 
// alter table t1 add ncBB blob FIRST;  

// -----------  DROP 
// alter table t1 drop ncbb; 

// -----------  CHANGE   (name column and Type )
// alter TABLE t1 CHANGE nm nm BINARY FIRST;// emplacement
//alter table t1 change nm98 tt98 varchar(20) AFTER nm1;

// -----------  MODIFY  ( Type )
// alter TABLE t1 MODIFY nm3 char(20); // change type

/*
echo "V 10  ----------------------------<br>";
//----------- Tables Rename Change Type;
// Alter table t1 rename tab1
// rename TABLE tone_ to t1 , tt to t22; 
// alter table t11 engine =myisam ; change type of data


/*
echo "V 9  ----------------------------<br>";
//----------- Tables Create Drop Show Status;
echo " data Base V 9";
// DESCRIBE TONE_;              voir Table
// Show columns From Tone_;     voir Table
// Show  fields From Tone_;     voir Table

//show table status; All Info
// show Create Table TOne_;  afficher le code de la creation

/*
echo "V 8  ----------------------------<br>";
//----------- Deal With DataBases
echo " data Base V 8" ;
// Drop database if exists NomBD;
// show databases like "NonBD"



/*
echo "V 7  ----------------------------<br>";
//----------- Data Type : Striing
// base v_5 table String 
// Text            => Store String Like ma9al
// BLOB            => Store  Binary Large Object (Image , file ....)


// Char             0-255       fast(dynam RAM) exemle Mot fix 
// VarChar          0-65 556    slow(Static RAM)        

// ENUM    (Radio Button)          => Choix N1 Ou N2 Ou N3  
// Set     (CheckBox )             => Choix N1 et N2 et  N3 (Multiple Choix)  
require_once("V4_pdo.php");

/*
echo "V 6  ----------------------------<br>";
//----------- Data Type : Date & Time
// V_5 table V_6 dat  
// Date                 =>YYYYMMDD OU YYYY-MM-DD
// DateTime             =>YYYY-MM-DD  HH:mm:ss
// TimeStamp            =>YYYYMMDD => like now insert .. VALUES (current_timestamp())
// Time                 =>  HH:mm:ss OU HHmmss  
// Year                 =>  YYYY OU YY   de 1970 to 2 069 



/*
echo "V 5  ----------------------------<br>";
//----------- Data Type : Numeric
// Tiny     Integer             Max Char(4)
// Small    Integer             Max Char(6)
// Medimum  Integer             Max Char(9)
// Int      Integer             Max Char(11)
// Big      Integer             Max Char(20)
require_once("V4_pdo.php");

// Bit de 0 a 64   
// Booleen  0 et 1


/*
echo "V 4  ----------------------------<br>";
require_once("V4_pdo.php");




/*
echo "V 3  ----------------------------<br>";
// use  nomDB ;  insert into tone (Id,Nom) values (NULL,"Nom15");
// CMD    de preferance syntax nom des comande sql en MAJUSCULE
// ------ create database if not exists Nombase;
// ------ drop database if exists Nombase;
// create database with utf8_general_ci   

/*
echo "V 1 et 2 ----------------------------<br>";
// Pour la creation d une Base de donnes  il y a trois Methodes

// ---------------- M1 line cmd -------------
// dans CMD (racourcie )  mysql -u root
// add to path M:\Programmation\PHP 8\mysql\bin;
// rechercher path dans windows => modifi path => add ..
// show databases  ; ||  mysql -u(user) root -p(pass word) || create database toto;
// use nomDataBase;  

// ---------------- M2 PHP MyAdmin -------------
//   url du navigateur http://localhost/phpmyadmin/
// create base Nom Base et ulf8_general_ci

// ---------------- M3  MySql Workbench  -------------
//  Programme like phpMyAdmin
*/
?>