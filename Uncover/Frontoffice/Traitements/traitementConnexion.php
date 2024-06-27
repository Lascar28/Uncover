<?php
session_start();
include_once('../../config/connexionBaseDeDonnee.php');
include_once('../../Fonctions/fonctionClient.php');

if(isset($_POST['submit'])){
    $email = htmlentities($_POST['email']);
    $motDePasse = htmlentities($_POST['motDePasse']);
    $v = "/[a-zA-Z0-9_\-.+]+@[a-zA-Z0-9-]+.[a-zA-Z]+/";

    $errors = []; 

    if(!preg_match($v, $email)){
        $errors[] = "Veuillez saisir une adresse mail valide";
    }
    
    if(empty($motDePasse)){
        $errors[] = "Veuillez saisir votre mot de passe";
    }

    if(!empty($errors)){
        foreach($errors as $error){
            echo "<div class='error'>".$error."</div>";
        }
    }else{
        $client = connexionClient($email, $motDePasse);

        if(!$client){
            echo "<div class='error'>Email ou mot de passe incorrect</div>";
        }else{
            $_SESSION['email'] = $email;
            header("Location:../index.php?page=Accueil");
            exit();
        }
    }
}
?>
