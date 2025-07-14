create DATABASE final_project

use final_project;
create TABLE final_project_membre(
    id_membre INT AUTO_INCREMENT PRIMARY KEY,
    nom varchar(100),
    date_de_naissance DATE,
    genre ENUM('M', 'F'),
    email VARCHAR(100),
    ville VARCHAR(100),
    mdp VARCHAR(100),
    image_profil VARCHAR(100)
);


create TABLE final_project_categorie_objet(
create TABLE final_project_categorie_objet(
    id_categorie INT AUTO_INCREMENT PRIMARY KEY,
    nom_categorie VARCHAR(100)
);

create TABLE final_project_objet (
create TABLE final_project_objet (
    id_objet  INT AUTO_INCREMENT PRIMARY KEY,
    nom_objet VARCHAR(100),
    id_categorie INT ,
    id_membre INT,
    FOREIGN KEY(id_membre) REFERENCES final_project_membre(id_membre),
    FOREIGN KEY(id_categorie) REFERENCES final_project_categorie_objet(id_categorie)
    FOREIGN KEY(id_membre) REFERENCES final_project_membre(id_membre),
    FOREIGN KEY(id_categorie) REFERENCES final_project_categorie_objet(id_categorie)
);

CREATE TABLE final_project_images_objet(
CREATE TABLE final_project_images_objet(
    id_image INT AUTO_INCREMENT PRIMARY KEY, 
    id_objet INT, 
    nom_image VARCHAR(100),
    FOREIGN KEY(id_objet) REFERENCES final_project_objet(id_objet)
    FOREIGN KEY(id_objet) REFERENCES final_project_objet(id_objet)
);

CREATE TABLE final_project_emprunt(
CREATE TABLE final_project_emprunt(
    id_emprunt INT AUTO_INCREMENT PRIMARY KEY, 
    id_objet INT, 
    id_membre INT , 
    date_emprunt DATE, 
    date_retour DATE,
    FOREIGN KEY(id_objet) REFERENCES final_project_objet(id_objet),
    FOREIGN KEY(id_membre) REFERENCES final_project_membre(id_membre)
    FOREIGN KEY(id_objet) REFERENCES final_project_objet(id_objet),
    FOREIGN KEY(id_membre) REFERENCES final_project_membre(id_membre)
);


INSERT INTO final_project_membre (nom , date_de_naissance, genre, email, ville, mdp, image_profil) 
INSERT INTO final_project_membre (nom , date_de_naissance, genre, email, ville, mdp, image_profil) 
VALUES ("Rohan", "2007-01-30", 'M', "rohan@gmail.com", "Tana", "rohan", "placeholder"),
        ("Ovy", "2007-03-30", 'M', "ovy@gmail.com", "Tana", "ovy", "placeholder"),
        ("Natha", "2007-09-23", 'M', "natha@gmail.com", "Diego", "natha", "placeholder"),
        ("Gonz", "2007-05-12", 'F', "gonz@gmail.com", "Diego", "gonz", "placeholder");

INSERT INTO final_project_categorie_objet(nom_categorie )
INSERT INTO final_project_categorie_objet(nom_categorie )
VALUES ("esthetique"),
    ("bricolage"),
    ("mecanique "),
    ("cuisine ");

INSERT INTO final_project_objet(nom_objet, id_categorie, id_membre) VALUES
INSERT INTO final_project_objet(nom_objet, id_categorie, id_membre) VALUES
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

INSERT INTO final_project_objet(nom_objet, id_categorie, id_membre) VALUES
INSERT INTO final_project_objet(nom_objet, id_categorie, id_membre) VALUES
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

INSERT INTO final_project_objet(nom_objet, id_categorie, id_membre) VALUES
INSERT INTO final_project_objet(nom_objet, id_categorie, id_membre) VALUES
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

INSERT INTO final_project_objet(nom_objet, id_categorie, id_membre) VALUES
INSERT INTO final_project_objet(nom_objet, id_categorie, id_membre) VALUES
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

INSERT INTO final_project_emprunt(id_objet, id_membre, date_emprunt, date_retour) VALUES
(1, 2, '2025-07-01', '2025-07-08'),   
(2, 3, '2025-07-02', '2025-07-09'),   
(3, 4, '2025-07-03', '2025-07-10'),   
(11, 1, '2025-07-01', '2025-07-08'),  
(12, 3, '2025-07-02', '2025-07-09'),  
(13, 4, '2025-07-03', '2025-07-10'),  
(21, 1, '2025-07-04', '2025-07-11'),  
(22, 2, '2025-07-05', '2025-07-12'), 
(23, 4, '2025-07-06', '2025-07-13'),  
(31, 1, '2025-07-07', '2025-07-14');  
INSERT INTO final_project_emprunt(id_objet, id_membre, date_emprunt, date_retour) VALUES
(1, 2, '2025-07-01', '2025-07-08'),   
(2, 3, '2025-07-02', '2025-07-09'),   
(3, 4, '2025-07-03', '2025-07-10'),   
(11, 1, '2025-07-01', '2025-07-08'),  
(12, 3, '2025-07-02', '2025-07-09'),  
(13, 4, '2025-07-03', '2025-07-10'),  
(21, 1, '2025-07-04', '2025-07-11'),  
(22, 2, '2025-07-05', '2025-07-12'), 
(23, 4, '2025-07-06', '2025-07-13'),  
(31, 1, '2025-07-07', '2025-07-14');  


CREATE VIEW final_project_v_liste_objet AS
CREATE VIEW final_project_v_liste_objet AS
SELECT 
    o.id_objet AS objet_id,
    o.nom_objet,
    o.id_categorie,
    o.id_membre AS proprietaire_id,

    e.id_emprunt,
    e.id_membre AS emprunteur_id,
    e.date_emprunt,
    e.date_retour
    e.id_emprunt,
    e.id_membre AS emprunteur_id,
    e.date_emprunt,
    e.date_retour

FROM final_project_objet AS o
JOIN final_project_emprunt as e ON o.id_objet = e.id_objet;

CREATE VIEW final_project_v_liste_objet_with_image AS
SELECT
    o.id_objet AS objet_id,
    o.nom_objet,
    o.id_categorie,
    o.id_membre AS proprietaire_id,
    io.id_objet,

FROM final_project_objet AS o
JOIN final_project_images_objet as io on objet_id = io.id_objet;