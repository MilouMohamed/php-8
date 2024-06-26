<?php

/*
Proc
DELIMITER //
create PROCEDURE Proc1()
BEGIN

SELECT "This is sql proc";

END //
DELIMITER ;

CALL `Proc1`(); 
*/




// MySQL  Elzero Web School   51 videos
echo "MySQL <br>";  //  


echo "V 46  -----------------------------<br>";
//----------- Les  Functions
// SELECT * FROM `v_30` ORDER by priceV ASC     // ASC DESC
// SELECT * FROM `v_30` ORDER by priceV ASC , NAME DESC; 
// SELECT idV , priceV , COUNT(priceV) FROM `v_30` GROUP BY priceV; 

// SELECT idV , priceV , COUNT(priceV) FROM `v_30`
//  GROUP BY priceV 
//  ORDER BY COUNT(priceV); 


// SELECT idV, priceV , COUNT(priceV) as cc FROM `v_30`
//  GROUP BY priceV  
//  HAVING count(priceV) > 2  

/*
echo "V 45  -----------------------------<br>";
//----------- Les  Functions
//select USER(),  SESSION_USER(); ;  // root@localhost
// select version();  //10.4.32-MariaDB
// select CHARSET(USER());   // utf8
// select DATABASE();  v_11
// select CONNECTION_ID();  1831 change 1847 ...


/*
echo "V 44  -----------------------------<br>";
//----------- Les Arthmetric Operators
// select  10 / 2        // 5.000  ROUND(10/2) Ou TRUNCATE(10/3 , 0)
// select  10 div 2      // 5 



/*
echo "V 43  -----------------------------<br>";
//----------- Case  is SWITCH on PHP
// M1
// SELECT idV , CASE WHEN idV=1 THEN 'Is One' WHEN idV=2 THEN 'Is Two'
//  WHEN idV=4 THEN 'Is Four' WHEN idV>10 THEN 'Is > 10' 
// ELSE 'Nom ' END as resultat FROM `v_30`; 

// M2 
// SELECT idV, CASE idV WHEN 1 THEN "Is One" WHEN 2 THEN "Is Two" 
// WHEN 10 THEN " 10" ELSE "Not Found" END as Resulta FROM `v_30` 



/*
echo "V 42  -----------------------------<br>";
//----------- Logical Operator  IF(Condition  , True , False)
// SELECT * ,IF(nbrV > 20 ,"Yes > 20" ,"Not > 20") FROM `v_30`;  // 3 rows
// UPDATE `v_30` SET  NAME = IF(nbrV > 10 , CONCAT("Mr",nbrV) , CONCAT("Mdm",nbrV) ) ;


/*
echo "V 41  -----------------------------<br>";
//----------- Logical Operator 
//  [  And=&&    |    Or=||    |    Xor   |   Not !=   ]

// SELECT * FROM `v_30` WHERE NAME LIKE "%nom%" AND nbrV > 5  ; 

// XOR   ( True or False )   ( False or True )   ===>>>   TRUE

 




/*
echo "V 40  -----------------------------<br>";
//-----------   Comparasion Operator
// select * FROM v_30 WHERE nbrV != 1;   meme 1
// select * FROM v_30 WHERE nbrV <> 1;   meme 1

/*
echo "V 39  -----------------------------<br>";
//-----------   LIKE Not LIKE
// SELECT * FROM `v_30` WHERE NAME LIKE "%r%";  
// SELECT * FROM `v_30` WHERE NAME Like "4%6"; // 4tesx6
// SELECT * FROM `v_30` WHERE NAME Like "Rom____";  // Rom 85s  ( _ ) = Un Letter



/*
echo "V 38  ---- ------------------------<br>";
//-----------   IN
// SELECT * FROM `v_30` WHERE idV IN (1,2,3,5,7,8,0); 
// SELECT * FROM `v_30` WHERE idV NOT IN (1,2,3,5,7,8,0); 





/*
echo "V 37  ---- ------------------------<br>";
//-----------   BETWEEN "FROM Date 9Dima" and "TO Date Jdida"  
// SELECT * FROM `v_30` WHERE dateV BETWEEN "2024-6-5" and "2024-6-25"; // 4 rows
// SELECT * FROM `v_30` WHERE dateV NOT BETWEEN "2024-6-18" and "2024-7-5"; // 3 Rows From 10 
// SELECT * FROM `v_30` WHERE idV BETWEEN 1 and 100;  // 3 rows



/*
echo "V 36  ----v11  table v_30 ------------------------<br>";
//-----------   Date :  DATE_ADD , DATE_SUB , Last_Day
// SELECT Last_Day("2025-1-10")  ;   //2025-01-31  (30 Ou 31) 

// SELECT DATE_ADD("2025-1-1" , INTERVAL 10 day);  // 2025-01-11
// SELECT DATE_SUB("2025-1-10", INTERVAL 5 day );  // 2025-01-05


/*
echo "V 35  ---- ------------------------<br>";
//-----------   Date : DATEDIFF(date Jdida , Date 9dima)   
// ========> Resultata En Jours
// SELECT DATEDIFF("2024-2-10","2024-1-25") FROM `v_30`;  // 16
// SELECT DATEDIFF("2024-2-10","2024-2-5") FROM `v_30`;   //  5






/*
echo "V 34  ---- ------------------------<br>";
//-----------   Date : Month Hour Minute
// SELECT 
// dateV,                MONTH(dateV),  MONTHNAME(dateV) ,  HOUR(dateV) ,  MINUTE(dateV) FROM `v_30`
// 2024-06-20 12:32:10 	6 	          June 	          12 	          32


/*
echo "V 33  ---- ------------------------<br>";
//-----------   Date : Day DayName
// SELECT DAYNAME(dateV) FROM `v_30`    // Tuesday
// SELECT DAYOFMONTH(dateV) FROM `v_30` // = DAY()  25  (1 - 31 )
// SELECT DAYOFWEEK(dateV) FROM `v_30`   // 3 (tlat  1 - 7 )
// SELECT DAYOFYEAR(dateV) FROM `v_30` WHERE 1;  // 177 (dans 365)

/*
echo "V 32  ---- ------------------------<br>";
//-----------   Date : YYYY-MM-DD  HH:MM:SS
//------------   CurTime  |   CurDate  |  Now;   
// SELECT curDate(),     CURRENT_DATE, Now(); 
//        2024-06-25 	2024-06-25 	2024-06-25 10:40:01
     // YYYY-MM-DD  HH:MM:SS

//SELECT CURTIME() , CURRENT_TIME;   //10:55:41 	10:55:41 


// CURRENT_TIMESTAMP() =	CURRENT_TIMESTAMP 	  =  NOW() 	
// 2024-06-25 11:11:04 	2024-06-25 11:11:04 	2024-06-25 11:11:04


/*
echo "V 31  ---- ------------------------<br>";
//-----------   MOD     POW        TRUNCATE(nbr , decimal) =(TA9riban)= ROUND
// SELECT MOD(11,5)  ; // 1
// SELECT POW(2,3); POWER(2,3)    // 8
// SELECT TRUNCATE(2.4567,2); //  2.45 
// SELECT ROUND(2.4567,2);    //  2.46


/*
echo "V 30  ---- ------------------------<br>";
//-----------  Ceil(SA9F)  Floor(ARDIYA)  Round(TA9RIBI)
// SELECT priceV , FLOOR(priceV) , CEIL(priceV) , ROUND(priceV , 2) FROM `v_30`; 
//        10.894 	10        	11 	          10.89


/*
echo "V 29  ---- ------------------------<br>";
//-----------  LPad RPad
// SELECT nom, RPAD(nom,5,"-") FROM `v_22_stringf
// pc#	pc#--        ||    	pcMoroco 	pcMor
echo str_pad("001234",12,"-",STR_PAD_RIGHT); //001234------


/*
echo "V 28  ----------------------------<br>";
//-----------  TRIM (str , {LEADING(lowal space) | TRAILING (lakher space) | Both(les deux)} ,  {Remove Str From str} )
// defalt values is ===>>  Both  and Space
//[ Nom      ]  => 	[Nom]
// SELECT nom , TRIM(nom) FROM `v_22_stringf`;
// SELECT TRIM(LEADING from nom) FROM `v_22_stringf`; ...mmm... =>mmm...
// SELECT TRIM(TRAILING  from nom) FROM `v_22_stringf`; ...mmm... =>...mmm
// SELECT TRIM(TRAILING "-" from nom) FROM `v_22_stringf`; ...mmm... =>...mmm---
// RTRIM LTRIM 

/*
echo "V 27  ----------------------------<br>";
//-----------  INSERT (str , Position ,  Length , Replace)
// select INSERT("9876543210",4,1,"F");  // 987F543210
// select INSERT("9876543210",4,3,"F");  // 987F3210


/*
echo "V 26  ----------------------------<br>";
//-----------  CONCAT  Concat_Ws
//---  CONCAT(str1,str2,str3,str4) 
//select concat("-","00","88","77");   //-008877

// Concat With Seperator
//---  Concat_Ws (separator , str1,str2,str3,str4)
// select concat_ws("-","00","88","77")  // 00-88-77


/*
echo "V 25  ----------------------------<br>";
//-----------  REPEAT  REPLACE  REVERSE
// Repeat (Str , nmbr Of Repatr)
// Replace  (Str ,cherche , to )
// Reverse  (Str  )
// SELECT REPEAT("test ",10); 
// SELECT REPEAT(nom,5) FROM `v_22_stringf`;  //M-r-c-
// SELECT REPLACE(nom,"o","-") FROM `v_22_stringf`; // Moroco M-r-c-
// SELECT REVERSE(nom) FROM `v_22_stringf`; // Moroco == ocoroM
// UPDATE v_22_stringf set nom = REPLACE(nom , "T","t") WHERE id_s=1;


//  echo str_repeat("*** --",10);



/*
echo "V 24  ----------------------------<br>";
//----------- Upper Case Lower Case
// SELECT nom, LCASE(nom) , UCASE(nom) FROM `v_22_stringf` WHERE 1
// LCASE(nom) = LOWER      UCASE = UPPER


/*
echo "V 23  ----------------------------<br>";
//----------- Sring Length Char_Length
// SELECT nom, LENGTH(nom) as "lENGTH" FROM `v_22_stringf`; 
// SELECT nom, Char_Length(nom) as "lENGTH" FROM `v_22_stringf`; 
// meme resultat
//  LENGTH(nom) €=3  £=2     |||||||| Char_Length(nom)    €=1  £=1


// SELECT nom, CONCAT( UPPER( LEFT(nom,1)) , LOWER(MID(nom,2))) as "Nom COmplete" FROM `v_22_stringf`; 
// Capitalize 








/*
echo "V 22  ----------------------------<br>";
//----------- Constraint   Foreign Key Many To Many ;
// base de donnnes v_11 table V_22_string
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