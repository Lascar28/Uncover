<?php
include('./config/connexionBaseDeDonnee.php');

function listeTousLesFilms(){
    global $db;
    $sql = "SELECT * FROM liste_film ";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $films = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $films;
}

/********************************************* */
function listeTousLesFilmsAvecCategories() {
    global $db; 
    try {
        $sql = "
            SELECT liste_film.id_film, liste_film.titre, categories.nom_categorie AS categorie, liste_film.realisateur, 
                   liste_film.date_sortie, liste_film.duree, liste_film.prix
            FROM liste_film
            JOIN categories ON liste_film.id_categorie = categories.id_categorie
        ";
        $stmt = $db->query($sql);
        $films = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $films;
    } catch (PDOException $e) {
        echo "Erreur lors de la récupération des films: " . $e->getMessage();
        return false;
    }
}
/*************************************************** */

function listeProgrammeProjection(){
    global $db;
    $sql = "SELECT DISTINCT
    projections.id_projection, 
    projections.id_film, 
    projections.date_projection, 
    projection_hours.heure_projection, 
    projection_hours.place_disponible, 
    liste_film.titre, 
    liste_film.realisateur, 
    liste_film.synopsis, 
    liste_film.image_url, 
    categories.nom_categorie
        FROM 
            projections
        JOIN 
            liste_film ON projections.id_film = liste_film.id_film
        JOIN 
            categories ON liste_film.id_categorie = categories.id_categorie
        JOIN
            projection_hours ON projections.id_projection = projection_hours.id_projection
        ORDER BY 
            projections.date_projection, 
            projection_hours.heure_projection";

    $stmt = $db->query($sql);
    $films = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $films;
}

/********************************************* */

function afficherProgrammeDeLaSemaine() {
    global $db;
    $sql = "SELECT 
                projections.id_projection, 
                projections.id_film, 
                projections.date_projection, 
                liste_film.titre, 
                liste_film.realisateur, 
                liste_film.synopsis, 
                liste_film.image_url,
                categories.nom_categorie
            FROM 
                projections
            JOIN 
                liste_film ON projections.id_film = liste_film.id_film
            JOIN 
                categories ON liste_film.id_categorie = categories.id_categorie
            ORDER BY 
                projections.date_projection
            LIMIT 4"; 

    $stmt = $db->prepare($sql);
    $stmt->execute();

    $films = $stmt->fetchAll();

    return $films;
}


/*********************************************** */

function afficherFilmSemaineProchaine() {
    global $db;
    $sql = "SELECT 
                projections.id_projection, 
                projections.id_film, 
                projections.date_projection, 
                liste_film.titre, 
                liste_film.realisateur, 
                liste_film.synopsis, 
                liste_film.image_url,
                categories.nom_categorie
            FROM 
                projections
            JOIN 
                liste_film ON projections.id_film = liste_film.id_film
            JOIN 
                categories ON liste_film.id_categorie = categories.id_categorie
            ORDER BY 
                projections.date_projection DESC
            LIMIT 4"; 
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $films = $stmt->fetchAll();

    return $films;
}
/************************************************ */
function ajouterFilm($titre, $id_categorie, $id_admin, $realisateur, $date_sortie, $duree, $prix) {
    global $db;
    $sql = "INSERT INTO liste_film (titre, id_categorie, id_admin, realisateur, date_sortie, duree, prix) 
            VALUES (:titre, :id_categorie, :id_admin, :realisateur, :date_sortie, :duree, :prix)";
    
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':titre', $titre);
    $stmt->bindParam(':id_categorie', $id_categorie);
    $stmt->bindParam(':id_admin', $id_admin);
    $stmt->bindParam(':realisateur', $realisateur);
    $stmt->bindParam(':date_sortie', $date_sortie);
    $stmt->bindParam(':duree', $duree);
    $stmt->bindParam(':prix', $prix);

    try {
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        return false;
    }
}

/********************************************* */

function supprimerFilm($id_film){
    global $sdb;
    $sql = "DELETE FROM liste_film WHERE id_film=:id_film";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id_film', $id_film);
    $stmt->execute();
}

/********************************************* */

function mettreAJourFilm($id_film, $titre, $id_categorie, $realisateur, $date_sortie, $duree, $prix) {
    global $db;
    $sql = "UPDATE liste_film SET titre = :titre, id_categorie = :id_categorie, realisateur = :realisateur, date_sortie = :date_sortie, duree = :duree, prix = :prix WHERE id_film = :id_film";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id_film', $id_film);
    $stmt->bindParam(':titre', $titre);
    $stmt->bindParam(':id_categorie', $id_categorie);
    $stmt->bindParam(':realisateur', $realisateur);
    $stmt->bindParam(':date_sortie', $date_sortie);
    $stmt->bindParam(':duree', $duree);
    $stmt->bindParam(':prix', $prix);
    $stmt->execute();
}

/********************************************* */

function rechercherFilmsParCategorie($titre) {
    global $db;
    $sql = "SELECT * FROM liste_film WHERE titre LIKE :titre";
    $stmt = $db->prepare($sql);
    $titre = "%" . $titre . "%";
    $stmt->bindParam(':titre', $titre);
    $stmt->execute();
    $films = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $films;
}

/********************************************* */

function listerCategories(){
    global $db;
    $sql = "SELECT id_categorie, nom_categorie FROM categories";
    $stmt = $db->prepare($sql);
    $stmt -> execute();

    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $categories;
}

/********************************************* */

function listerFilmsParCategorie($id_categorie) {
    global $db;
    $sql = "SELECT * FROM liste_film WHERE id_categorie = :id_categorie";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id_categorie', $id_categorie);
    $stmt->execute();
    $films = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $films;
}

/********************************************* */



?>