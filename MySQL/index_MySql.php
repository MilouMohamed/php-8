<?php


// MySQL  Prof Noureddine Bahi   13 videos
// Database: v_p_n_b_v13   Table: table_1 
echo "MySQL <br>";  //  


echo "V 12/13 et 13/13    -----------------------------<br>";
/*----------- CURSOR   

DROP PROCEDURE if EXISTS p1;
DELIMITER //
CREATE PROCEDURE p1()
BEGIN
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

END //
DELIMITER ;
 





  DROP PROCEDURE if EXISTS  curdemo;
 
 DELIMITER //
 CREATE PROCEDURE curdemo()
BEGIN
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
/
  CLOSE cur1; 
END //
DELIMITER ;












echo "V 11/13   -----------------------------<br>";
/*----------- Les Fonctions    return Multiline 
DROP table if EXISTS temp1;
create TABLE  temp1(
id int,nom varchar(200), prix double , date_ date);

DELIMITER //
CREATE FUNCTION func_tab()
RETURNS int DETERMINISTIC
BEGIN   
DECLARE rs INT DEFAULT 0 ;
INSERT INTO  temp1 (SELECT * FROM table_1);
SET rs=1;
RETURN rs;
END //
DELIMITER ;


appeler La fonction 

SELECT * from temp1; 
 
SELECT func_tab();

SELECT * from temp1; 






SELECT *  from temp1  LIMIT 2  ; les troir premier 




echo "V 10/13   -----------------------------<br>";
/*----------- Les Fonctions   The functions 
drop FUNCTION if EXISTS nom_par_id;
DELIMITER // 
CREATE FUNCTION nom_par_id(num int)
RETURNS varchar(200) DETERMINISTIC 
BEGIN
DECLARE  res varchar(200);
 set res= (select Nom_ FROM table_1 WHERE id_ = num  );

RETURN res;

END //
DELIMITER ;







echo "V 9/13   -----------------------------<br>";
/*----------- Les Fonctions   The functions 

DROP FUNCTION if EXISTS  f_min_prix;

DELIMITER **
CREATE FUNCTION f_min_prix()
RETURNS text DETERMINISTIC 
BEGIN

DECLARE mn double;
DECLARE  nom varchar(20) ;
DECLARE  txt varchar(200);
DECLARE id int;
SET mn= (SELECT MIN(Prix_) from table_1);

SET  id=(SELECT id_ FROM table_1 WHERE Prix_ = mn);
SET  nom=(SELECT Nom_ FROM table_1 WHERE Prix_ = mn);
 
set txt = concat("Id:",id,"  Nom:",nom," Prix:",mn); 
RETURN txt;

END **
DELIMITER ;


select f_min_prix(); 







DELIMITER //
CREATE FUNCTION f_Max()
RETURNS INT DETERMINISTIC 
BEGIN
DECLARE max int;
set max=(SELECT max(Prix_) FROM table_1 );
RETURN max;
END //
 DELIMITER ;

 SELECT `f_Max`() AS `f_Max`; 






echo "V 8/13   -----------------------------<br>";
/*----------- Les Types  PROCEDURE 
DELIMITER //
CREATE PROCEDURE p_inout(in nbr1 int , INOUT conter int)
BEGIN

SET conter=conter+nbr1;

END //
DELIMITER  ;

SET @nb=2;
CALL  p_inout(1,@nb) ; 
SELECT @nb as Resultat;





echo "V 7/13   -----------------------------<br>";
/*----------- Les Types  PROCEDURE  OUT

DELIMITER //
CREATE PROCEDURE p_moyenne(OUT moyen float) 
BEGIN  
set moyen = (SELECT AVG(Prix_) FROM table_1);
 
END //
DELIMITER ;

CALL p_moyenne(@val);
select  @val as "Moyenne";


/*
echo "V 6/13   -----------------------------<br>";
/*----------- Les Types  PROCEDURE  
DELIMITER //
CREATE PROCEDURE p_moyenne(OUT moyen float) 
BEGIN  
set moyen = (SELECT AVG(Prix_) FROM table_1);
 
END //
DELIMITER ;

CALL p_moyenne(@val);
select  @val as "Moyenne";




DELIMITER //
CREATE PROCEDURE p_between_date(d1 date,d2 date)
BEGIN 
SELECT * from table_1 WHERE Date_ BETWEEN d1 AND d2;
 
END //
DELIMITER ;




DROP PROCEDURE  if EXISTS  p_sum_prix_par_nom;

DELIMITER //
CREATE PROCEDURE p_sum_prix_par_nom(in nom varchar(200))
BEGIN

SELECT SUM(Prix_) As  "Le Total pour "
FROM table_1 WHERE Nom_ LIKE nom;


END //
DELIMITER ;







echo "V 5/13   -----------------------------<br>";
/*----------- Les Types  PROCEDURE   
DROP PROCEDURE IF EXISTS p_prix;
DELIMITER //
CREATE PROCEDURE p_prix(id int) 
BEGIN
	SELECT Prix_ FROM table_1 WHERE id_ = id;
	
END //
DELIMITER ;

CALL p_prix(2);



echo "V 4/13   -----------------------------<br>";
/*----------- Les Types  PROCEDURE   
1 ------- sans param
1 ------- avec param  IN
1 ------- avec param  OUT
1 ------- avec param  IN OUT






echo "V 3/13   -----------------------------<br>";
/*----------- PROCEDURE while do  || LOOP 
DROP PROCEDURE if EXISTS loop_1;

DELIMITER //
CREATE PROCEDURE loop_1() 
BEGIN 
DECLARE nbr int;
SET nbr=1;

lp1:LOOP
SELECT concat( "nice ",nbr);
IF(nbr >= 4) THEN 
LEAVE lp1;
ELSE  SET nbr=nbr+1;
END IF;
 
END LOOP lp1; 
END //
DELIMITER ;





/*DELIMITER //
CREATE PROCEDURE p1(nbr int) 
BEGIN 

WHILE (nbr > 0)  DO
SELECT "salaam ";
SET nbr=nbr-1;
END WHILE;
 
END //

DELIMITER  ;
 


echo "V 2/13   -----------------------------<br>";
/*----------- PROCEDURE if | elseif | ELSE | end  | if


DROP  PROCEDURE if EXISTS p2_v2;

DELIMITER **   
CREATE PROCEDURE p2_v2(inn int)    
BEGIN    
DECLARE note  int;   
set note=inn;   
IF(note < 10) THEN  
SELECT "Roudouble"; 
ELSEIF(  note < 19) THEN   
SELECT "Bom";   
ELSE  SELECT "20/20"  ;  
END if;   
 
END **

DELIMITER ;
 
CALL  p2_v2(5) ;
CALL  p2_v2(15) ;
CALL  p2_v2(150) ;





// elseIf()
DROP  PROCEDURE if EXISTS p2_v2;

DELIMITER **
CREATE PROCEDURE p2_v2(inn int) 
BEGIN 
DECLARE note  int;
set note=inn;
IF(note >= 10) THEN 
SELECT "Braveau";
ELSEIF(note < 10) THEN 
SELECT "Redouble";
end if ;
 
END **

DELIMITER ;
 
CALL  p2_v2(5) ;




DROP  PROCEDURE if EXISTS p1_v2;

DELIMITER **
CREATE PROCEDURE p1_v2(inn int) 
BEGIN 
DECLARE note  int;
set note=inn;
IF(note >= 10) THEN 
SELECT "Braveau";
end IF;
if(note < 10) THEN 
SELECT "Redouble";
end if ;
 
END **

DELIMITER ;
 
CALL  p1_v2(5) ;
// ---------------------------------------------------
DROP  PROCEDURE if EXISTS p1_v2;

DELIMITER **
CREATE PROCEDURE p1_v2() 
BEGIN 
DECLARE note  int DEFAULT 12;
IF(note >= 10) THEN 
SELECT "Braveau";
end IF;
if(note < 10) THEN 
SELECT "Redouble";
end if ;
 
END **

DELIMITER ;
 
CALL  p1_v2() ;









/*

echo "V 1/13  -----------------------------<br>";
//----------- Inner Join ... on 

--------------------------------------------------
DROP PROCEDURE IF EXISTS p2;
DELIMITER **

CREATE PROCEDURE p2 ()
BEGIN
DECLARE ch varchar(100) DEFAULT "Test";
 
SET ch="Mom 2";
SELECT ch;

END **
DELIMITER ;

CALL p2();





DROP PROCEDURE if EXISTS p1;

DELIMITER //
CREATE PROCEDURE p1() 
	BEGIN
    	DECLARE gt integer DEFAULT 44; 
        SET gt=gt+10;
        SELECT concat( "FROM P_",gt);

    END //
DELIMITER ;
    

DROP PROCEDURE  if EXISTS POne2; 
DELIMITER //
CREATE   PROCEDURE  POne3()
BEGIN 
	DECLARE n int; 
    SELECT "IS N "; 
    SELECT n; 
    SET n=1; 
    SELECT "Is 2 N"; 
    SELECT n; END  //

DELIMITER  ;
CALL POne3();



CREATE PROCEDURE POne(nb int) BEGIN DECLARE n int DEFAULT 10; SELECT n+"IS N "; SET n=n+1; SELECT n+"Is 2 N"; END; 

Proc
DELIMITER //
create PROCEDURE Proc1()
BEGIN

SELECT "This is sql proc";

declare n int;
set n =100;
select n;
END // 
DELIMITER ;

CALL `Proc1`(); 
*/




// MySQL  Elzero Web School   51 videos
echo "MySQL <br>";  //  


echo "V 51  -----------------------------<br>";
//----------- Inner Join ... on 
// inner join ==== declare ()


/*
echo "V 50  -----------------------------<br>";
//----------- Inner Join ... on 

// ELECT * FROM v_47_user u INNER JOIN v_47_lang l 
// on u.id_lng = l.id_lng;

// ELECT * FROM v_47_user u LEFT JOIN v_47_lang l 
// on u.id_lng = l.id_lng; // inner Join +  v_47_user

// ELECT * FROM v_47_user u right JOIN v_47_lang l 
// on u.id_lng = l.id_lng; // inner Join +  v_47_lang

/*
echo "V 49  -----------------------------<br>";
//----------- Inner Join ... on 





/*

echo "V 48  -----------------------------<br>";
//----------- Alias   ( as  "Nom Colun" )
/*
select 
u.id_usr as "Id User",
l.label_lng as "Nom Lang"
from  v_47_user u JOIN v_47_lang l 
ON  u.id_lng = l.id_lng

 
*/


/*
echo "V 47  -----------------------------<br>";
//----------- JOIN   (v_47_user  et v_47_lang )
/*
create table v_47_User (
id_usr int PRIMARY KEY AUTO_INCREMENT,
  name_usr  varchar(20) ,
    date_usr date DEFAULT NOW(),
id_lng int  not NULL
)
create TABLE v_47_Lang (
id_lng int PRIMARY KEY AUTO_INCREMENT,
    label_lng varchar(20) 
)
    ALTER TABLE v_47_user add CONSISTENT fk_lang FOREIGN KEY(id_lng) REFERENCES v_47_lang(id_lng)
*/


/*
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