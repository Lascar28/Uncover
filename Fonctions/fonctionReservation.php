<?php
include('./config/connexionBaseDeDonnee.php');

function detailFilms($id_projection) {
    global $db;
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

//FONCTION POUR ENREGISTRER UNE RESERVATION
function enregistrerReservation($id_client, $id_projection, $nbrePersonne, $date_reservation)  {
    try {
        global $db;
        $sql = "INSERT INTO reservations (id_client, id_projection, date_reservation, nbrePersonne) 
                VALUES (:id_client, :id_projection, CURDATE(), :nbrePersonne)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id_client', $id_client);
        $stmt->bindParam(':id_projection', $id_projection);
        $stmt->bindParam(':nbrePersonne', $nbrePersonne);
        
        $stmt->execute();

        // Mise à jour des places disponibles dans projection_hours
        $sql2 = "UPDATE projection_hours 
                 SET place_disponible = place_disponible - :nbrePersonne 
                 WHERE id_projection = :id_projection AND heure_projection = :heure_projection";
        $stmt2 = $db->prepare($sql2);
        $stmt2->bindParam(':nbrePersonne', $nbrePersonne);
        $stmt2->bindParam(':id_projection', $id_projection);
        $stmt2->bindParam(':heure_projection', $heure_projection);

        return $stmt2->execute();
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
        return false;
    }
}

//FONCTION POUR RECUPERER UNE RESERVATION D'UNE CLIENT
function recupererReservations($id_client)
{
        global $db;
        $sql = "SELECT r.id_reservation, f.titre AS titre_film, p.date_projection, r.nbrePersonne, r.nbrePersonne * 15000 AS montant_total
        FROM reservations r
        JOIN projections p ON r.id_projection = p.id_projection
        JOIN liste_film f ON p.id_film = f.id_film
        WHERE r.id_client = :id_client";
        
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id_client', $id_client, PDO::PARAM_INT);
        $stmt->execute();
        
        $reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $reservations;
}
?>

