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


INSERT INTO membre (nom , date_de_naissance, genre, email, ville, mdp, image_profil) 
VALUES ("Rohan", "2007-01-30", 'M', "rohan@gmail.com", "Tana", "rohan", "placeholder"),
        ("Ovy", "2007-03-30", 'M', "ovy@gmail.com", "Tana", "ovy", "placeholder"),
        ("Natha", "2007-09-23", 'M', "natha@gmail.com", "Diego", "natha", "placeholder"),
        ("Gonz", "2007-05-12", 'F', "gonz@gmail.com", "Diego", "gonz", "placeholder");

INSERT INTO categorie_objet(nom_categorie )
VALUES ("esthetique"),
    ("bricolage"),
    ("mecanique "),
    ("cuisine ");

-- Rohan (id_membre = 1)
INSERT INTO objet(nom_objet, id_categorie, id_membre) VALUES
('Peigne dore', 1, 1),
('Lisseur cheveux', 1, 1),
('Vernis rouge', 1, 1),
('Marteau rouge', 2, 1),
('Tournevis', 2, 1),
('Scie manuelle', 2, 1),
('Cle a molette', 3, 1),
('Pompe a air', 3, 1),
('Mixeur', 4, 1),
('Grille-pain', 4, 1);

-- Ovy (id_membre = 2)
INSERT INTO objet(nom_objet, id_categorie, id_membre) VALUES
('Gel coiffant', 1, 2),
('Brosse a barbe', 1, 2),
('Creme visage', 1, 2),
('Perceuse', 2, 2),
('Pince multiprise', 2, 2),
('Metre ruban', 2, 2),
('Pneu de secours', 3, 2),
('Batterie auto', 3, 2),
('Blender', 4, 2),
('Cocotte-minute', 4, 2);

-- Natha (id_membre = 3)
INSERT INTO objet(nom_objet, id_categorie, id_membre) VALUES
('Parfum', 1, 3),
('Creme solaire', 1, 3),
('Lotion capillaire', 1, 3),
('Cutter', 2, 3),
('Visseuse', 2, 3),
('Colle forte', 2, 3),
('Pompe a velo', 3, 3),
('Jack hydraulique', 3, 3),
('Four micro-ondes', 4, 3),
('Poele antiadhesive', 4, 3);

-- Gonz (id_membre = 4)
INSERT INTO objet(nom_objet, id_categorie, id_membre) VALUES
('Mascara', 1, 4),
('Fond de teint', 1, 4),
('Rouge a levres', 1, 4),
('Cle Allen', 2, 4),
('Tenaille', 2, 4),
('Scie sauteuse', 2, 4),
('Crick de levage', 3, 4),
('Cables de demarrage', 3, 4),
('Robot patissier', 4, 4),
('Balance de cuisine', 4, 4);

INSERT INTO emprunt(id_objet, id_membre, date_emprunt, date_retour) VALUES
(1, 2, '2025-07-01', '2025-07-08'),   -- Objet de Rohan emprunté par Ovy
(2, 3, '2025-07-02', '2025-07-09'),   -- Rohan → Natha
(3, 4, '2025-07-03', '2025-07-10'),   -- Rohan → Gonz
(11, 1, '2025-07-01', '2025-07-08'),  -- Ovy → Rohan
(12, 3, '2025-07-02', '2025-07-09'),  -- Ovy → Natha
(13, 4, '2025-07-03', '2025-07-10'),  -- Ovy → Gonz
(21, 1, '2025-07-04', '2025-07-11'),  -- Natha → Rohan
(22, 2, '2025-07-05', '2025-07-12'),  -- Natha → Ovy
(23, 4, '2025-07-06', '2025-07-13'),  -- Natha → Gonz
(31, 1, '2025-07-07', '2025-07-14');  -- Gonz → Rohan
