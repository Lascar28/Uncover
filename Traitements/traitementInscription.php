<?php
session_start();
include_once('../config/connexionBaseDeDonnee.php');
include_once('../Fonctions/fonctionClient.php');

if(isset($_POST["submit"])){

$nom = htmlentities($_POST['nom']);
$prenom = htmlentities($_POST['prenom']);
$email = htmlentities($_POST['email']);
$motDePasse = htmlentities($_POST['motDePasse']);
$confirmMotDePasse = htmlentities($_POST['confirmMotDePasse']);

$v = "/[a-zA-Z0-9_\-.+]+@[a-zA-Z0-9-]+.[a-zA-Z]+/";


if(empty($nom)){
    $errors[] = "Veuillez saisir un nom";
}
if(empty($prenom)){
    $errors[] = "Veuillez saisir un prénom";
}
if(!preg_match($v, $email)){
    $errors[] = "Veuillez saisir un adresse mail valide";
}

if($motDePasse != $confirmMotDePasse){
    $errors[] = "Vos deux mot passe doivent etre identique";
}

if(!empty($errors)){
    foreach($errors as $error){
        echo "<div class='error'>".$error."</div>";
    }
}else{
    inscriptionClient($nom,$prenom,$email,$motDePasse);
    $_SESSION['email'] = $email;
    header("Location:../index.php?page=Accueil");
    exit();
    // echo "Inscription terminé avec succès";
}
}
?>