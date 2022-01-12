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
(3, 'Does', 'Jhon', 'jhon.does@etu.univ-smb.fr', '$2y$10$o4DNZQcAhfldBmAWnjgQaeZ0EXf94CnofAAgAvKjan08xnuDvA4/.', '2021-11-16 09:20:51', 2),
(4, 'Hornai', 'Mickeal', 'mickael.hornai@etu.univ-smb.fr', '$2y$10$o4DNZQcAhfldBmAWnjgQaeZ0EXf94CnofAAgAvKjan08xnuDvA4/.', '2021-11-16 09:20:51', 2), 
(5, 'Dupleur', 'Tom', 'tom.dupleur@etu.univ-smb.fr', '$2y$10$o4DNZQcAhfldBmAWnjgQaeZ0EXf94CnofAAgAvKjan08xnuDvA4/.', '2021-11-16 09:20:51', 2), 
(6, 'Kolar', 'Eleanor', 'eleanor.kolar@etu.univ-smb.fr', '$2y$10$o4DNZQcAhfldBmAWnjgQaeZ0EXf94CnofAAgAvKjan08xnuDvA4/.', '2021-11-16 09:20:51', 2), 
(7, 'Boudon', 'Gaston', 'gaston.boudon@etu.univ-smb.fr', '$2y$10$o4DNZQcAhfldBmAWnjgQaeZ0EXf94CnofAAgAvKjan08xnuDvA4/.', '2021-11-16 09:20:51', 2), 
(8, 'Cartin', 'Solène', 'solene.cartin@etu.univ-smb.fr', '$2y$10$o4DNZQcAhfldBmAWnjgQaeZ0EXf94CnofAAgAvKjan08xnuDvA4/.', '2021-11-16 09:20:51', 2), 
(9, 'Haro', 'Fabrice', 'fabrice.haro@etu.univ-smb.fr', '$2y$10$o4DNZQcAhfldBmAWnjgQaeZ0EXf94CnofAAgAvKjan08xnuDvA4/.', '2021-11-16 09:20:51', 2),
(10, 'Mourano', 'Quentin', 'quentin.mourano@etu.univ-smb.fr', '$2y$10$o4DNZQcAhfldBmAWnjgQaeZ0EXf94CnofAAgAvKjan08xnuDvA4/.', '2021-11-16 09:20:51', 2), 
(11, 'Janus', 'Lucas', 'lucas.janus@etu.univ-smb.fr', '$2y$10$o4DNZQcAhfldBmAWnjgQaeZ0EXf94CnofAAgAvKjan08xnuDvA4/.', '2021-11-16 09:20:51', 2), 
(12, 'Poufu', 'Castor', 'castor.poufu@etu.univ-smb.fr', '$2y$10$o4DNZQcAhfldBmAWnjgQaeZ0EXf94CnofAAgAvKjan08xnuDvA4/.', '2021-11-16 09:20:51', 2), 
(13, 'Calos', 'Béatrice', 'beatrice.carlos@etu.univ-smb.fr', '$2y$10$o4DNZQcAhfldBmAWnjgQaeZ0EXf94CnofAAgAvKjan08xnuDvA4/.', '2021-11-16 09:20:51', 2), 
(14, 'Artis', 'mathieu', 'mathieu.artis@etu.univ-smb.fr', '$2y$10$o4DNZQcAhfldBmAWnjgQaeZ0EXf94CnofAAgAvKjan08xnuDvA4/.', '2021-11-16 09:20:51', 2); 
(15, 'Fofana', 'Xiao Ping', 'xiaoping.fofana@etu.univ-smb.fr', '$2y$10$o4DNZQcAhfldBmAWnjgQaeZ0EXf94CnofAAgAvKjan08xnuDvA4/.', '2021-11-16 09:20:51', 2); 


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
    idproposition int(11) NOT NULL AUTO_INCREMENT,
    titre varchar(100) NOT NULL,
    description varchar(100) NOT NULL,
    type varchar(100) NOT NULL,
    dateemission DATETIME NOT NULL,
    vue boolean NOT NULL,
    PRIMARY KEY (idproposition)
); 

CREATE TABLE IF NOT EXISTS produit (
    idproduit int(11) NOT NULL AUTO_INCREMENT,
    nom varchar(100) NOT NULL,
    description varchar(100) NOT NULL,
    type int(11) NOT NULL,
    PRIMARY KEY (idproduit)
); 

INSERT INTO `produit` (`idproduit`, `nom`, `description`, `type`) VALUES 
(1, 'Garde animaux', 'Toutes races de chiens, 5 ans expériences', 1),
(2, 'Cours de soutien', 'Niveau collège', 1),
(3, 'Téléphone', 'Iphone 13 Pro Max', 2),
(4, 'Bureau', 'Neuf, réglable', 2),
(5, 'Balai', 'Balais en plastique', 1),
(6, 'Duvet', "Efficace jusqu'à -20°C", 1),
(7, 'Ménage', 'Nettoyage appartement', 2),
(8, 'Sport', 'Handspinner', 2),
(9, 'Ordinateur', 'vieux', 1),
(10, 'Télé', '4K', 1),
(11, 'Cuisine', 'mexicaine', 2),
(12, 'Impression', 'papier A4', 2),
(13, 'Taillage de crayon', 'Taille-crayon', 2),
(14, 'Partiel', 'passage de partiel', 2),
(15, 'Pochette PC', '13 pouces', 1),
(16, 'Oreiller', 'Oreiller blanc', 1),
(17, 'Ménage', 'Aspirateur', 2),
(18, 'Sport', 'Curling', 2),
(19, 'Soutien', 'aide aux devoirs', 2),
(20, 'Courses', 'livraison de courses', 2),
(21, 'Traduction', "traduction de l'anglais", 2),
(22, 'Coiffeur', 'coupe de cheveux homme', 2),
(23, 'Taillage de crayon', 'taille-crayon', 2),
(24, 'Partiel', 'passage de partiel', 2),
(25, 'Pochette PC', '15 pouces', 1),
(26, 'Oreiller', 'Oreiller à mémoire de forme', 1),
(27, 'Ménage', 'Aspirateur', 2),
(28, 'Sport', 'Musculation', 2),
(29, 'Sport', 'Basket', 2),
(30, 'Sport', 'Football', 2),
(31, 'Peruque', 'Cheveux bruns lisses', 1),
(32, 'Poule', 'Poule authentique, animal', 1),
(33, 'Audi R8', 'Voiture de luxe V8 6 cylindres', 1),
(34, 'Ballon de foot', 'Ballon crevé, excellent état', 1),
(35, 'Hotel particulier', 'Hotel particulier au centre de Paris', 1),
(36, 'Trotinette électrique', 'Vitesse max 30kmh', 1);

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
(4, 3),
(1, 4),
(5, 5),
(5, 6),
(2, 7),
(3, 8),
(5, 9),
(6, 10),
(10, 11),
(10, 12),
(12, 13),
(12, 14),
(12, 15),
(12, 16),
(12, 17),
(13, 18),
(14, 19),
(1, 20),
(2, 21),
(3, 22),
(4, 23),
(5, 24),
(6, 25),
(7, 26),
(8, 27),
(9, 28),
(10, 29),
(11, 30),
(12, 31),
(13, 32),
(14, 33),
(6, 34),
(4, 35),
(9, 36);



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
(3, 5),
(6, 1),
(1, 6),
(4, 9),
(2, 7),
(4, 1),
(8, 9),
(2, 2),
(1, 5),
(1, 33),
(2, 33),
(3, 33),
(4, 33),
(5, 33),
(6, 33),
(7, 33),
(8, 33),
(9, 33),
(10, 33),
(11, 33),
(12, 33),
(13, 33),
(12, 6),
(14, 10),
(10, 9),
(8, 6),
(7, 25),
(2, 26),
(1, 32),
(14, 27),
(1,10),
(1,19),
(1,11),
(5,11),
(7,12),
(12,12),
(14,13),
(13,13),
(8,14),
(7,14),
(4,15),
(3,15),
(2,16),
(6,16),
(9,17),
(5,17),
(1,18),
(12,18);