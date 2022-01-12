set NAMES 'UTF8';

DROP TABLE IF EXISTS offre;
DROP TABLE IF EXISTS demande;
DROP TABLE IF EXISTS avis;
DROP TABLE IF EXISTS proposition;
DROP TABLE IF EXISTS produit;
DROP TABLE IF EXISTS service;
DROP TABLE IF EXISTS bien;
DROP TABLE IF EXISTS campus;
DROP TABLE IF EXISTS categorie;
DROP TABLE IF EXISTS utilisateur;
DROP TABLE IF EXISTS role;

CREATE TABLE IF NOT EXISTS role (
  idrole int(11) NOT NULL AUTO_INCREMENT,
  nom_role varchar(100) NOT NULL,
  PRIMARY KEY (idrole)
);

INSERT INTO role (idrole,nom_role) VALUES
(1,"Utilisateur"),
(2,"Administrateur");


CREATE TABLE IF NOT EXISTS campus (
  idcampus int(11) NOT NULL AUTO_INCREMENT,
  nom_campus varchar(100) NOT NULL,
  PRIMARY KEY (idcampus)
);

INSERT INTO campus (idcampus,nom_campus) VALUES
(1,"Annecy"),
(2,"Bourget"),
(3,"Jacob");

CREATE TABLE IF NOT EXISTS utilisateur (
  idutilisateur int(11) NOT NULL AUTO_INCREMENT,
  nom varchar(100) NOT NULL,
  prenom varchar(100) NOT NULL,
  email varchar(100) NOT NULL,
  password varchar(100) NOT NULL,
  idrole int(11) NULL,
  dateinscription DATETIME NULL,
  idcampus int(11) NOT NULL,
  deleted boolean NOT NULL default FALSE,
  PRIMARY KEY (idutilisateur),
  FOREIGN KEY (idrole) REFERENCES role(idrole)
);

INSERT INTO `utilisateur` (`idutilisateur`, `nom`, `prenom`, `email`, `password`, `dateinscription`, `idcampus`) VALUES 
(1, 'test', 'test', 'test@test', '$2y$10$o4DNZQcAhfldBmAWnjgQaeZ0EXf94CnofAAgAvKjan08xnuDvA4/.', '2021-11-15 09:20:51', 1),
(2, 'Smith', 'Jhon', 'jhon.smith@etu.univ-smb.fr', 'password', '2021-11-17 09:20:51', 1),
(3, 'Does', 'Jhon', 'jhon.does@etu.univ-smb.fr', 'password', '2021-11-16 09:20:51', 2); 

CREATE TABLE IF NOT EXISTS avis (
  idavis int(11) NOT NULL AUTO_INCREMENT,
  idredacteur int(11) NOT NULL,
  idutilisateurconcerne int(11) NOT NULL,
  note int(11) NOT NULL,
  titre varchar(100) not null,
  description varchar(100) not null,
  PRIMARY KEY (idavis),
  FOREIGN KEY (idredacteur) REFERENCES utilisateur(idutilisateur),
  FOREIGN KEY (idutilisateurconcerne) REFERENCES utilisateur(idutilisateur)
);

CREATE TABLE IF NOT EXISTS proposition (
    id int(11) NOT NULL AUTO_INCREMENT,
    titre varchar(100) NOT NULL,
    description varchar(100) NOT NULL,
    type varchar(100) NOT NULL,
    dateemission DATETIME NOT NULL,
    vue boolean NOT NULL,
    PRIMARY KEY (id)
); 

CREATE TABLE IF NOT EXISTS produit (
    idproduit int(11) NOT NULL AUTO_INCREMENT,
    nom varchar(100) NOT NULL,
    description varchar(100) NOT NULL,
    type int(11) NOT NULL,
    PRIMARY KEY (idproduit)
); 

INSERT INTO `produit` (`idproduit`, `nom`, `description`, `type`) VALUES 
(1, 'Garde animaux', '5 ans expériences', 1),
(2, 'Cours de soutien', 'Niveau collège', 1),
(3, 'Téléphone', 'Bon état', 2),
(4, 'Bureau', 'Neuf', 2),
(5, 'Produit1', 'DESC1', 1),
(6, 'Produit2', 'DESC2', 1),
(7, 'Produit3', 'DESC3', 2),
(8, 'Produit4', 'DESC4', 2);

CREATE TABLE IF NOT EXISTS offre (
    idutilisateur int(11) NOT NULL ,
    idoffre int(11) NOT NULL ,
    PRIMARY KEY (idutilisateur,idoffre),
    FOREIGN KEY (idutilisateur) REFERENCES utilisateur(idutilisateur),
    FOREIGN KEY (idoffre) REFERENCES produit(idproduit)
); 

INSERT INTO `offre` (`idutilisateur`, `idoffre`) VALUES 
(1, 1),
(1, 2),
(1, 4),
(2, 7),
(3, 8);

CREATE TABLE IF NOT EXISTS demande (
    idutilisateur int(11) NOT NULL,
    iddemande int(11) NOT NULL ,
    PRIMARY KEY (idutilisateur,iddemande),
    FOREIGN KEY (idutilisateur) REFERENCES utilisateur(idutilisateur),
    FOREIGN KEY (iddemande) REFERENCES produit(idproduit)
); 

INSERT INTO `demande` (`idutilisateur`, `iddemande`) VALUES 
(1, 3),
(2, 6),
(3, 5);