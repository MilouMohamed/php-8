<?php


/* base de Donnees mvc_1_v3
 
create TABLE stagaires_DAO (
    id int PRIMARY KEY AUTO_INCREMENT,
        nom varchar(100) DEFAULT "Nom 1",
        prenom varchar(100) DEFAULT "Pren 1",
        age int DEFAULT  0,
        login varchar(100) NOT null,
        pass varchar(50)
    
    );
    insert into stagaires_DAO ( `nom`, `prenom`, `age`, `login`, `pass`) VALUES ( "Nom 1", "Pre 1",20,"log","000"), ("nom 2","Pre 2",20,"log","000"), ("nom 3","Pre 3",20,"log","000"), ("nom 4","Pre 4",20,"log","000"); 
    
