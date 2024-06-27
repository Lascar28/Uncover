create database cinema;
use cinema;

-- Création de la table categorie de film
CREATE TABLE categories (
    id_categorie INT PRIMARY KEY AUTO_INCREMENT,
    nom_categorie VARCHAR(255)
);

--creation table liste film
create table liste_film(
    id_film  INT PRIMARY KEY AUTO_INCREMENT,
    titre VARCHAR(255),
    id_categorie INT,
    id_admin INT,
    realisateur VARCHAR(255),
    date_sortie DATE,
    duree VARCHAR(50),
    prix int,
    FOREIGN KEY (id_categorie) REFERENCES categories(id_categorie),
    FOREIGN KEY (id_admin) REFERENCES admins(id_admin)
);
--creation table projection
create table projections(
    id_projection INT PRIMARY KEY AUTO_INCREMENT,
    id_film INT,
    id_admin INT,
    date_projection DATE,
    heure_projection TIME,
    place_disponible INT, 
    FOREIGN KEY (id_film) REFERENCES liste_film(id_film),
    FOREIGN KEY (id_admin) REFERENCES admins(id_admin)
);

--creation table clients
create table clients(
    id_client INT PRIMARY KEY AUTO_INCREMENT,
    nom  VARCHAR(100),
    prenom VARCHAR(100),
    email VARCHAR(100), 
    motDePasse VARCHAR(255)
);


--creation table admin

CREATE TABLE admins (
    id_admin INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(100),
    mot_de_passe VARCHAR(255)
);

-- liste achat (place reserver en ligne)
create table reservations(
    id_reservation int primary key AUTO_INCREMENT,
    id_client INT,
    id_projection INT,
    place_reserver INT,
    date_reservation DATE,
    FOREIGN KEY (id_projection) REFERENCES projections(id_projection),
    FOREIGN KEY (id_client) REFERENCES clients(id_client)
);

CREATE TABLE projection_hours (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_projection INT,
    heure_projection TIME,
    place_disponible INT,
    FOREIGN KEY (id_projection) REFERENCES projections(id_projection)
);

-- liste achat de billet , avy any am site vo misy insert ato anaty base
-- NY liste film tokony afaka ovaina avy any amy le site, ohatra oe ajouter supprimer na modifier


INSERT INTO categories(id_categorie, nom_categorie) VALUES
(1, 'Comique'),
(2, 'Horreur'),
(3, 'Romance'),
(4, 'Aventure'),
(5, 'Action'),
(6, 'Histoire'),
(7, 'Science fiction'), 
(8, 'Jeunesse'),
(9, 'Policier'),
(10, 'Comedie musicale');


INSERT INTO liste_film (titre, id_categorie, id_admin, realisateur, date_sortie, duree, prix) VALUES
('Dune', 7, 1, 'Denis Villeneuve', '2021-10-22', '2h35', 15000);
('The idea of you', 3, 1, 'Michael Showalter', '2024-03-16', '1h55', 15000),
('Barbie', 8, 1, 'Greta Gerwig', '2023-07-21', '2h12', 15000),
('Wakanda forever', 7, 1, 'Ryan Coogler', '2022-11-11', '1h43', 15000),
('Hotel transylvanie: changements monstres', 8, 1, 'Jennifer Kluska', '2022-02-25', '1h27', 15000),
('Operation fortune: Ruse de guerre', 5, 1, 'Guy Ritchie', '2023-01-13', '1h54', 15000),
('Red notice', 5, 1, 'Rawson Marshall Thurber', '2021-11-04', '1h58', 15000),
('The outfit', 5, 1, 'Graham Moore', '2022-03-18', '1h46', 15000),




INSERT INTO admins(email,motDePasse) VALUES
('admin1@gmail.com', '1234'),

/*******************************************************/

INSERT INTO projections (id_film, date_projection, heure_projection, place_disponible) VALUES
(30, '2024-07-19', '16:00:00', 100);

INSERT INTO projections (id_film, date_projection, heure_projection, place_disponible) VALUES
(30, '2024-07-19', '19:00:00', 100);

INSERT INTO projections (id_film, date_projection, heure_projection, place_disponible) VALUES
(30, '2024-07-19', '21:00:00', 100);

/********************************************************/


INSERT INTO projections (id_film, date_projection, heure_projection, place_disponible) VALUES
(23,  '2024-07-19', '16:00:00', 100);
INSERT INTO projections (id_film, date_projection, heure_projection, place_disponible) VALUES
(23,  '2024-07-19', '19:00:00', 100);
INSERT INTO projections (id_film, date_projection, heure_projection, place_disponible) VALUES
(23,  '2024-07-19', '21:00:00', 100);

/***********************************************************/

INSERT INTO projections (id_film, date_projection, heure_projection, place_disponible) VALUES
(13,  '2024-07-20', '16:00:00', 100);
INSERT INTO projections (id_film, date_projection, heure_projection, place_disponible) VALUES
(13,  '2024-07-20', '19:00:00', 100);
INSERT INTO projections (id_film, date_projection, heure_projection, place_disponible) VALUES
(13,  '2024-07-20', '21:00:00', 100);

/***********************************************************/

INSERT INTO projections (id_film, date_projection, heure_projection, place_disponible) VALUES
(31,  '2024-07-21', '16:00:00', 100);
INSERT INTO projections (id_film, date_projection, heure_projection, place_disponible) VALUES
(31,  '2024-07-21', '19:00:00', 100);
INSERT INTO projections (id_film, date_projection, heure_projection, place_disponible) VALUES
(31,  '2024-07-21', '21:00:00', 100);

/**************************************************************/

INSERT INTO projections (id_film, date_projection, heure_projection, place_disponible) VALUES
(29,  '2024-07-25', '16:00:00', 100);
INSERT INTO projections (id_film, date_projection, heure_projection, place_disponible) VALUES
(29,  '2024-07-25', '19:00:00', 100);
INSERT INTO projections (id_film, date_projection, heure_projection, place_disponible) VALUES
(29,  '2024-07-25', '21:00:00', 100);

INSERT INTO projections (id_film, date_projection, heure_projection, place_disponible) VALUES
(24,  '2024-07-26', '16:00:00', 100);
INSERT INTO projections (id_film, date_projection, heure_projection, place_disponible) VALUES
(24,  '2024-07-26', '19:00:00', 100);
INSERT INTO projections (id_film, date_projection, heure_projection, place_disponible) VALUES
(24,  '2024-07-26', '21:00:00', 100);

INSERT INTO projections (id_film, date_projection, heure_projection, place_disponible) VALUES
(8,  '2024-07-27', '14:00:00', 100);
INSERT INTO projections (id_film, date_projection, heure_projection, place_disponible) VALUES
(8,  '2024-07-27', '14:00:00', 100);
INSERT INTO projections (id_film, date_projection, heure_projection, place_disponible) VALUES
(8,  '2024-07-27', '14:00:00', 100);

INSERT INTO projections (id_film, date_projection, heure_projection, place_disponible) VALUES
(9,  '2024-07-28', '14:00:00', 100);
INSERT INTO projections (id_film, date_projection, heure_projection, place_disponible) VALUES
(9,  '2024-07-28', '14:00:00', 100);
INSERT INTO projections (id_film, date_projection, heure_projection, place_disponible) VALUES
(9,  '2024-07-28', '14:00:00', 100);

/***************************************/

ALTER TABLE liste_film
ADD COLUMN synopsis TEXT,
ADD COLUMN acteurs VARCHAR(255);

ALTER TABLE liste_film ADD COLUMN image_url VARCHAR(255);


/**************************************/

UPDATE liste_film
SET synopsis = 'Une femme qui se rend à Coachella pour se rapprocher de sa fille tombe amoureuse d\'un chanteur célèbre.', 
    acteurs = 'Anne Hathaway, Nicholas Galitzine'
WHERE id_film = 8;

UPDATE liste_film
SET synopsis = 'Barbie traverse une crise qui la pousse à remettre en question son monde et son existence.', 
    acteurs = 'Margot Robbie, Ryan Gosling'
WHERE id_film = 9;

UPDATE liste_film
SET synopsis = 'Les habitants de Wakanda luttent pour protéger leur maison des puissances mondiales intervenantes alors qu\'ils pleurent la mort du roi T\'Challa.', 
    acteurs = 'Letitia Wright, Lupita Nyong\'o'
WHERE id_film = 10;

UPDATE liste_film
SET synopsis = 'Drac et sa bande sont de retour, comme vous ne les avez jamais vus auparavant.', 
    acteurs = 'Brian Hull, Andy Samberg'
WHERE id_film = 11;

UPDATE liste_film
SET synopsis = 'L\'agent spécial Orson Fortune et son équipe recrutent l\'une des plus grandes stars de cinéma pour les aider dans une mission d\'infiltration lorsque la vente d\'une nouvelle technologie d\'armes mortelles menace de perturber l\'ordre mondial.', 
    acteurs = 'Jason Statham, Aubrey Plaza'
WHERE id_film = 12;

UPDATE liste_film
SET synopsis = 'Un agent d\'Interpol traque les voleurs d\'art les plus recherchés du monde.', 
    acteurs = 'Dwayne Johnson, Ryan Reynolds, Gal Gadot'
WHERE id_film = 13;

UPDATE liste_film
SET synopsis = 'Marcus et Mike sont de retour pour faire face à de nouveaux défis alors qu\'ils deviennent plus âgés et plus sages.', 
    acteurs = 'Will Smith, Martin Lawrence'
WHERE id_film = 23;

UPDATE liste_film
SET synopsis = 'Un ancien flic revient dans la rue pour découvrir la vérité sur une conspiration brutale.', 
    acteurs = 'Mark Wahlberg, Winston Duke'
WHERE id_film = 24;

UPDATE liste_film
SET synopsis = 'Paul Atreides, un jeune homme brillant et doué au destin plus grand que lui-même, doit se rendre sur la planète la plus dangereuse de l'univers afin d'assurer l\'avenir de sa famille et de son peuple.', 
    acteurs = 'Keanu Reeves, Laurence Fishburne'
WHERE id_film = 29;

UPDATE liste_film
SET synopsis = "Paul Atreides, un jeune homme brillant et doué au destin plus grand que lui-même, doit se rendre sur la planète la plus dangereuse de l'univers afin d'assurer l'avenir de sa famille et de son peuple. ', 
    acteurs = 'Timothée Chalamet, Zendaya"
WHERE id_film = 30;

UPDATE liste_film
SET image_url = "../Images/Dune.jpg"
WHERE id_film = 30;


UPDATE liste_film
SET image_url = "../Images/bad-boys.jpeg"
WHERE id_film = 23;

UPDATE liste_film
SET image_url = "../Images/Red-Notice.jpg"
WHERE id_film = 13;

UPDATE liste_film
SET image_url = "../Images/The-outfit.jpg"
WHERE id_film = 31;

UPDATE liste_film
SET image_url = "../Images/John-Wick.jpg"
WHERE id_film = 29;

UPDATE liste_film
SET image_url = "../Images/spenser-confidential.jpg"
WHERE id_film = 24;

UPDATE liste_film
SET image_url = "../Images/The-idea-of-you.jpg"
WHERE id_film = 8;

UPDATE liste_film
SET image_url = "../Images/barbie.jpg"
WHERE id_film = 9;


/**************************************/

INSERT INTO projections (id_film, id_admin, date_projection, heure_projection, place_disponible)
VALUES 
(8, 1, '2024-06-30', '16:00:00', 100),
(8, 1, '2024-06-30', '19:00:00', 100),
(8, 1, '2024-06-30', '21:00:00', 100),
(8, 1, '2024-07-01', '16:00:00', 100),
(8, 1, '2024-07-01', '19:00:00', 100),
(8, 1, '2024-07-01', '21:00:00', 100);


UPDATE liste_film SET image_url = 'Images/The-idea-of-you.jpg' WHERE id_film = 8;
UPDATE liste_film SET image_url = 'Images/barbie.jpg' WHERE id_film = 9;
UPDATE liste_film SET image_url = 'Images/wakanda.jpg' WHERE id_film = 10;
UPDATE liste_film SET image_url = 'Images/Red-Notice.jpg' WHERE id_film = 13;
UPDATE liste_film SET image_url = 'Images/spenser-confidential.jpg' WHERE id_film = 24;



INSERT INTO projection_hours (id_projection, heure_projection, place_disponible)
VALUES (32, '16:00:00', 100), (32, '19:00:00', 100), (32, '21:00:00', 100);
