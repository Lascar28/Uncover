<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: index.php?page=connexion");
    exit();
}
include_once("../Fonctions/fonctionFilms.php");

$films = listeTousLesFilmsAvecCategories();
$categories = listerCategories();

?>
