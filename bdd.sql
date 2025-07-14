create DATABASE final_project

use final_project;

create TABLE membre(
    id_membre INT AUTO_INCREMENT PRIMARY KEY,
    nom varchar(100),
    date_de_naissance DATE,
    genre ENUM('M', 'F'),
    email VARCHAR(100),
    ville VARCHAR(100),
    mdp VARCHAR(100),
    image_profil VARCHAR(100)
);


create TABLE categorie_objet(
    id_categorie INT AUTO_INCREMENT PRIMARY KEY,
    nom_categorie VARCHAR(100)
);

create TABLE objet (
    id_objet  INT AUTO_INCREMENT PRIMARY KEY,
    nom_objet VARCHAR(100),
    id_categorie INT ,
    id_membre INT,
    FOREIGN KEY(id_membre) REFERENCES membre(id_membre),
    FOREIGN KEY(id_categorie) REFERENCES categorie_objet(id_categorie)
);

CREATE TABLE images_objet(
    id_image INT AUTO_INCREMENT PRIMARY KEY, 
    id_objet INT, 
    nom_image VARCHAR(100),
    FOREIGN KEY(id_objet) REFERENCES objet(id_objet)
);

CREATE TABLE emprunt(
    id_emprunt INT AUTO_INCREMENT PRIMARY KEY, 
    id_objet INT, 
    id_membre INT , 
    date_emprunt DATE, 
    date_retour DATE,
    FOREIGN KEY(id_objet) REFERENCES objet(id_objet),
    FOREIGN KEY(id_membre) REFERENCES membre(id_membre)
);
