-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 26 juin 2024 à 15:03
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `uncover`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `id_admin` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `motDePasse` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id_admin`, `email`, `motDePasse`) VALUES
(1, 'admin1@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id_categorie` int(11) NOT NULL,
  `nom_categorie` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_categorie`, `nom_categorie`) VALUES
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

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id_client` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `motDePasse` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id_client`, `nom`, `prenom`, `email`, `motDePasse`) VALUES
(1, 'Rakotobe', 'Mahefa', 'mahefarakotobe232@gmail.com', '$2y$10$jDkTrQtPcwcbN2eUAetKu.TuLPCwfsEQoNXHNtHT6KGo3h7klMNdy'),
(6, 'Jean', 'Dupont', 'jean.dupont@example.com', '$2y$10$Mf6jVi.lS.r0H7W3hjF3jujOE/ljEniXBxPqVLN3bv4x0F96Kqr1.'),
(7, 'Franck', 'Vinci', 'frank@hotmail.com', '$2y$10$qyG1nINmAS4CWcc.RrO09.HXTBVfdjnBWbPmfd8JRLZvRY9/q7fnG'),
(8, 'Rakotobe', 'Miandra', 'miandra@yahoo.fr', '$2y$10$aPC29Heozqu2Rd1vUVlhVuLKgr1S8nmu5B6dAUqaXLdJ29ZW69Jam'),
(10, 'Randria ', 'Bernard', 'bernard@gmail.com', '$2y$10$r2jY.1V/l3pqkGBA3pCdre5eDmU7i62rvw2OGaDbmeH.nYivFJ7Uy'),
(11, 'Rasoanaivo', 'Laura', 'laura@gmail.com', '$2y$10$Ma9.F2zuRqejHO1ng10qveBCy5Fgx0jjqTJTCYEVGLKrMWz22qYC6');

-- --------------------------------------------------------

--
-- Structure de la table `liste_film`
--

CREATE TABLE `liste_film` (
  `id_film` int(11) NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `id_categorie` int(11) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `realisateur` varchar(255) DEFAULT NULL,
  `date_sortie` date DEFAULT NULL,
  `duree` varchar(50) DEFAULT NULL,
  `prix` int(11) DEFAULT NULL,
  `synopsis` text DEFAULT NULL,
  `acteurs` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `liste_film`
--

INSERT INTO `liste_film` (`id_film`, `titre`, `id_categorie`, `id_admin`, `realisateur`, `date_sortie`, `duree`, `prix`, `synopsis`, `acteurs`, `image_url`) VALUES
(8, 'The idea of you', 3, 1, 'Michael Showalter', '2024-03-16', '1h55', 15000, 'Une femme qui se rend à Coachella pour se rapprocher de sa fille tombe amoureuse d\'un chanteur célèbre.', 'Anne Hathaway, Nicholas Galitzine', '../Images/The-idea-of-you.jpg'),
(9, 'Barbie', 8, 1, 'Greta Gerwig', '2023-07-21', '2h12', 15000, 'Barbie traverse une crise qui la pousse à remettre en question son monde et son existence.', 'Margot Robbie, Ryan Gosling', '../Images/barbie.jpg'),
(10, 'Wakanda forever', 7, 1, 'Ryan Coogler', '2022-11-11', '1h43', 15000, 'Les habitants de Wakanda luttent pour protéger leur maison des puissances mondiales intervenantes alors qu\'ils pleurent la mort du roi T\'Challa.', 'Letitia Wright, Lupita Nyong\'o', NULL),
(11, 'Hotel transylvanie: changements monstres', 8, 1, 'Jennifer Kluska', '2022-02-25', '1h27', 15000, 'Drac et sa bande sont de retour, comme vous ne les avez jamais vus auparavant.', 'Brian Hull, Andy Samberg', NULL),
(12, 'Operation fortune: Ruse de guerre', 5, 1, 'Guy Ritchie', '2023-01-13', '1h54', 15000, 'L\'agent spécial Orson Fortune et son équipe recrutent l\'une des plus grandes stars de cinéma pour les aider dans une mission d\'infiltration lorsque la vente d\'une nouvelle technologie d\'armes mortelles menace de perturber l\'ordre mondial.', 'Jason Statham, Aubrey Plaza', NULL),
(13, 'Red notice', 5, 1, 'Rawson Marshall Thurber', '2021-11-04', '1h58', 15000, 'Un agent d\'Interpol traque les voleurs d\'art les plus recherchés du monde.', 'Dwayne Johnson, Ryan Reynolds, Gal Gadot', '../Images/Red-Notice.jpg'),
(23, 'Bad boys Ride or die', 5, 1, 'Adil El Arbi &amp; Bilall Fallah', '2024-06-07', '1h53', 15000, 'Marcus et Mike sont de retour pour faire face à de nouveaux défis alors qu\'ils deviennent plus âgés et plus sages.', 'Will Smith, Martin Lawrence', '../Images/bad-boys.jpeg'),
(24, 'spenser confidential', 9, 1, 'Peter Berg', '0202-03-06', '1h51', 15000, 'Un ancien flic revient dans la rue pour découvrir la vérité sur une conspiration brutale.', 'Mark Wahlberg, Winston Duke', '../Images/spenser-confidential.jpg'),
(29, 'John Wick 4', 4, 1, 'Chad Stahelski', '2023-03-24', '2h49', 15000, 'John Wick découvre une voie pour vaincre la Haute Table. Mais avant de pouvoir gagner sa liberté, Wick doit affronter un nouvel ennemi avec de puissantes alliances à travers le monde et des forces qui transforment de vieux amis en ennemis.', 'Keanu Reeves, Laurence Fishburne', '../Images/John-Wick.jpg'),
(30, 'Dune', 7, 1, 'Denis Villeneuve', '2021-10-22', '2h35', 15000, 'Paul Atreides, un jeune homme brillant et doué au destin plus grand que lui-même, doit se rendre sur la planète la plus dangereuse de l\'univers afin d\'assurer l\'avenir de sa famille et de son peuple. \', \n    acteurs = \'Timothée Chalamet, Zendaya', NULL, '../Images/Dune.jpg'),
(31, 'The outfit', 5, 1, 'Graham Moore', '2022-03-18', '1h46', 15000, NULL, NULL, '../Images/The-outfit.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `projections`
--

CREATE TABLE `projections` (
  `id_projection` int(11) NOT NULL,
  `id_film` int(11) DEFAULT NULL,
  `date_projection` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `projections`
--

INSERT INTO `projections` (`id_projection`, `id_film`, `date_projection`) VALUES
(11, 30, '2024-07-18'),
(14, 23, '2024-07-19'),
(17, 13, '2024-07-20'),
(20, 31, '2024-07-21'),
(23, 29, '2024-07-25'),
(26, 24, '2024-07-26'),
(29, 8, '2024-07-27'),
(32, 9, '2024-07-28');

-- --------------------------------------------------------

--
-- Structure de la table `projection_hours`
--

CREATE TABLE `projection_hours` (
  `id` int(11) NOT NULL,
  `id_projection` int(11) DEFAULT NULL,
  `heure_projection` time DEFAULT NULL,
  `place_disponible` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `projection_hours`
--

INSERT INTO `projection_hours` (`id`, `id_projection`, `heure_projection`, `place_disponible`) VALUES
(1, 11, '16:00:00', 100),
(2, 11, '19:00:00', 100),
(3, 11, '21:00:00', 100),
(4, 14, '16:00:00', 100),
(5, 14, '19:00:00', 100),
(6, 14, '21:00:00', 100),
(7, 17, '16:00:00', 100),
(8, 17, '19:00:00', 100),
(9, 17, '21:00:00', 100),
(10, 20, '16:00:00', 100),
(11, 20, '19:00:00', 100),
(12, 20, '21:00:00', 100),
(13, 23, '16:00:00', 100),
(14, 23, '19:00:00', 100),
(15, 23, '21:00:00', 100),
(16, 26, '16:00:00', 100),
(17, 26, '19:00:00', 100),
(18, 26, '21:00:00', 100),
(19, 29, '16:00:00', 100),
(20, 29, '19:00:00', 100),
(21, 29, '21:00:00', 100),
(22, 32, '16:00:00', 100),
(23, 32, '19:00:00', 100),
(24, 32, '21:00:00', 100);

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `id_reservation` int(11) NOT NULL,
  `id_client` int(11) DEFAULT NULL,
  `id_projection` int(11) DEFAULT NULL,
  `place_reserver` int(11) DEFAULT NULL,
  `date_reservation` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `liste_film`
--
ALTER TABLE `liste_film`
  ADD PRIMARY KEY (`id_film`),
  ADD KEY `id_categorie` (`id_categorie`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Index pour la table `projections`
--
ALTER TABLE `projections`
  ADD PRIMARY KEY (`id_projection`),
  ADD KEY `id_film` (`id_film`);

--
-- Index pour la table `projection_hours`
--
ALTER TABLE `projection_hours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_projection` (`id_projection`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id_reservation`),
  ADD KEY `id_projection` (`id_projection`),
  ADD KEY `id_client` (`id_client`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admins`
--
ALTER TABLE `admins`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `liste_film`
--
ALTER TABLE `liste_film`
  MODIFY `id_film` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `projections`
--
ALTER TABLE `projections`
  MODIFY `id_projection` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `projection_hours`
--
ALTER TABLE `projection_hours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id_reservation` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `liste_film`
--
ALTER TABLE `liste_film`
  ADD CONSTRAINT `liste_film_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categories` (`id_categorie`),
  ADD CONSTRAINT `liste_film_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `admins` (`id_admin`);

--
-- Contraintes pour la table `projections`
--
ALTER TABLE `projections`
  ADD CONSTRAINT `projections_ibfk_1` FOREIGN KEY (`id_film`) REFERENCES `liste_film` (`id_film`);

--
-- Contraintes pour la table `projection_hours`
--
ALTER TABLE `projection_hours`
  ADD CONSTRAINT `projection_hours_ibfk_1` FOREIGN KEY (`id_projection`) REFERENCES `projections` (`id_projection`);

--
-- Contraintes pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`id_projection`) REFERENCES `projections` (`id_projection`),
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id_client`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
