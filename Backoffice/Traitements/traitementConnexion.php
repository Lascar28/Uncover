<?php
session_start();
include_once('../../config/connexionBaseDeDonnee.php');
include_once('../../Fonctions/fonctionAdmin.php');

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
        $admin = connexionAdmin($email, $motDePasse);

        if(!$admin){
            echo "<div class='error'>Email ou mot de passe incorrect</div>";
        }else{
            $_SESSION['email'] = $email;
            header("Location: ../index.php?page=dashboard");
            exit();
        }
    }
}
?>
