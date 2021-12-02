set NAMES 'UTF8';

DROP TABLE IF EXISTS utilisateur;
DROP TABLE IF EXISTS avis;
DROP TABLE IF EXISTS proposition;
DROP TABLE IF EXISTS produit;
DROP TABLE IF EXISTS service;
DROP TABLE IF EXISTS bien;
DROP TABLE IF EXISTS listeoffres;
DROP TABLE IF EXISTS listedemandes;
DROP TABLE IF EXISTS campus;
DROP TABLE IF EXISTS categorie;
DROP TABLE IF EXISTS role;

CREATE TABLE IF NOT EXISTS role (
  idrole int(11) NOT NULL AUTO_INCREMENT,
  name_role varchar(100) NOT NULL,
  PRIMARY KEY (idrole)
);

INSERT INTO role (idrole,name_role) VALUES
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
  datenaissance DATE NOT NULL,
  idrole int(11) NULL,
  dateinscription DATETIME NOT NULL,
  idcampus int(11) NOT NULL,
  connecte boolean NOT NULL,
  deleted boolean NOT NULL default FALSE,
  PRIMARY KEY (idutilisateur),
  FOREIGN KEY (idrole) REFERENCES role(idrole)
);

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


CREATE TABLE IF NOT EXISTS service (
    idservice int(11) NOT NULL AUTO_INCREMENT,
    qualification varchar(100) NOT NULL,
    noteprestation int(11) NOT NULL,
    typeservice varchar(100) NOT NULL,
    PRIMARY KEY (idservice)
); 


CREATE TABLE IF NOT EXISTS bien (
    idbien int(11) NOT NULL AUTO_INCREMENT,
    etat varchar(100) not null,
    typebien varchar(100) not null,
    PRIMARY KEY (idbien)
); 


CREATE TABLE IF NOT EXISTS produit (
    idproduit int(11) NOT NULL AUTO_INCREMENT,
    nom varchar(100) NOT NULL,
    nom_categorie varchar(100) NOT NULL,
    description varchar(100) NOT NULL,
    type int(2) NOT NULL,
    idservice int(11),
    idbien int(11),
    PRIMARY KEY (idproduit),
    FOREIGN KEY (idservice) REFERENCES service(idservice),
    FOREIGN KEY (idbien) REFERENCES bien(idbien)
); 

CREATE TABLE IF NOT EXISTS listeoffres (
    idutilisateur int(11) NOT NULL ,
    idoffre int(11) NOT NULL ,
    PRIMARY KEY (idutilisateur,idoffre),
    FOREIGN KEY (idutilisateur) REFERENCES utilisateur(idutilisateur),
    FOREIGN KEY (idoffre) REFERENCES produit(idproduit)
); 


CREATE TABLE IF NOT EXISTS listedemandes (
    idutilisateur int(11) NOT NULL ,
    iddemande int(11) NOT NULL ,
    PRIMARY KEY (idutilisateur,iddemande),
    FOREIGN KEY (idutilisateur) REFERENCES utilisateur(idutilisateur),
    FOREIGN KEY (iddemande) REFERENCES produit(idproduit)
); 

INSERT INTO `utilisateur` (`idutilisateur`, `nom`, `prenom`, `email`, `password`, `datenaissance`, `dateinscription`, `idcampus`, `connecte`) VALUES 
(NULL, 'Smith', 'Jhon', 'jhon.smith@etu.univ-smb.fr', 'password', '2000-10-11', '2021-11-17 09:20:51', '1', '0'),
(NULL, 'Does', 'Jhon', 'jhon.does@etu.univ-smb.fr', 'password', '2000-05-16', '2021-11-16 09:20:51', '2', '0')
; 