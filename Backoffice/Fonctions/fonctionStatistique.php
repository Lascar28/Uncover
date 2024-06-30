<?php
include('./database/connexionBaseDeDonnee.php');

function recupererNombreReservations() {
    global $db;
    $sql = "SELECT COUNT(*) as total_reservations FROM reservations";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $reservation = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $reservation;
}

function recupererNombreUtilisateurs(){
    global $db;
    $sql = "SELECT COUNT(*) as total_utilisateurs FROM clients";
    $stmt = $db-> prepare($sql);
    $stmt->execute();
    $utilisateurs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $utilisateurs;
}

function recupererNombreFilms(){
    global $db;
    $sql = "SELECT COUNT(*) as total_films FROM liste_film";
    $stmt = $db-> prepare($sql);
    $stmt->execute();
    $films = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $films;
}

function recupererNombreCategories(){
    global $db;
    $sql = "SELECT COUNT(*) as total_categories FROM categories";
    $stmt = $db-> prepare($sql);
    $stmt->execute();
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $categories;
}
?>
