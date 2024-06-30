<?php
if (!isset($_SESSION['email'])) {
    header("Location: index.php?page=connexion");
    exit();
}
include_once("./Fonctions/fonctionFilms.php");

$moovies = listeTousLesFilmsAvecCategories();
$category = listerCategories();

?>
