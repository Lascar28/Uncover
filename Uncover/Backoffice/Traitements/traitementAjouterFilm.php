<?php
session_start();
include_once('../../config/connexionBaseDeDonnee.php');
include_once('../../Fonctions/fonctionFilms.php');

if (isset($_POST['Ajouter'])) {
    if (isset($_POST['titre']) && !empty($_POST['titre']) && isset($_POST['id_categorie']) && !empty($_POST['id_categorie']) && isset($_POST['id_admin']) && !empty($_POST['id_admin']) && isset($_POST['realisateur']) && !empty($_POST['realisateur']) && isset($_POST['date_sortie']) && !empty($_POST['date_sortie']) && isset($_POST['duree']) && !empty($_POST['duree']) && isset($_POST['prix']) && !empty($_POST['prix'])) {
        $titre = htmlentities($_POST['titre']);
        $id_categorie = htmlentities($_POST['id_categorie']);
        $id_admin = htmlentities($_POST['id_admin']);
        $realisateur = htmlentities($_POST['realisateur']);
        $date_sortie = htmlentities($_POST['date_sortie']);
        $duree = htmlentities($_POST['duree']);
        $prix = htmlentities($_POST['prix']);

        $resultat = ajouterFilm($titre, $id_categorie, $id_admin, $realisateur, $date_sortie, $duree, $prix);

        if ($resultat) {
            $_SESSION['message'] = "Film ajouté avec succès";
            header("Location: ../index.php?page=listeFilms");
            exit();
        } else {
            $_SESSION['erreur'] = "Erreur lors de l'ajout du film";
        }
    } else {
        $_SESSION['erreur'] = "Le formulaire est incomplet";
    }
    header("Location: ../index.php?page=ajouterFilm");
    exit();
}
