<?php
include('../config/connexionBaseDeDonnee.php');

function detailFilms($id_projection) {
    global $db; // Assurez-vous d'utiliser la connexion correcte à la base de données
    $sql = "SELECT 
                projections.id_projection,
                projections.id_film,
                projections.date_projection,
                GROUP_CONCAT(projection_hours.heure_projection ORDER BY projection_hours.heure_projection SEPARATOR ' / ') AS heures_projection,
                liste_film.titre,
                liste_film.realisateur,
                liste_film.synopsis,
                liste_film.acteurs,
                liste_film.image_url,
                categories.nom_categorie
            FROM 
                projections
            JOIN 
                liste_film ON projections.id_film = liste_film.id_film
            JOIN 
                projection_hours ON projections.id_projection = projection_hours.id_projection
            JOIN 
                categories ON liste_film.id_categorie = categories.id_categorie
            WHERE 
                projections.id_projection = :id_projection";
    
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":id_projection", $id_projection, PDO::PARAM_INT);
    $stmt->execute();
    $film = $stmt->fetch(PDO::FETCH_ASSOC);
    
    return $film ?: array();
}
?>
