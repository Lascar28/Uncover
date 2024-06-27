<?php
include('../../config/connexionBaseDeDonnee.php');

function inscriptionClient($nom,$prenom,$email,$motDePasse){
    global $db;
    $motDePasse = password_hash($motDePasse, PASSWORD_BCRYPT);
    $sql = "INSERT INTO clients(nom,prenom,email,motDePasse) VALUES(:nom, :prenom, :email, :motDePasse) ";
    $stmt = $db->prepare($sql);

    $stmt -> bindParam(':nom', $nom);
    $stmt -> bindParam(':prenom', $prenom);
    $stmt -> bindParam(':email', $email);
    $stmt -> bindParam(':motDePasse', $motDePasse);

    $stmt -> execute();
    }

    function connexionClient($email, $motDePasse){
        global $db;
        try {
            $sql = "SELECT email, motDePasse FROM clients WHERE email = :email";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $client = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($client) {
                if (password_verify($motDePasse, $client['motDePasse'])) {
                    return $client;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage();
            return false;
        }
    }   
?>