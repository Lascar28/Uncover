<?php
include("../../config/connexionBaseDeDonnee.php");

function connexionAdmin($email, $motDePasse){
        global $db;
        try {
            $sql = "SELECT email, motDePasse FROM admins WHERE email = :email";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $admin = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($admin) {
                if ($motDePasse == $admin['motDePasse']) {
                    return $admin;
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

    function getNombreUtilisateurs() {
        global $db;
        $sql = "SELECT COUNT(*) AS count FROM clients";
        $stmt = $db->query($sql);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'];
    }

    function getNombreDeFilms() {
        global $db;
        $sql = "SELECT COUNT(*) AS count FROM liste_film";
        $stmt = $db->query($sql);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'];
    }

    function getNombreDeProjections() {
        global $db;
        $sql = "SELECT COUNT(*) AS count FROM projections";
        $stmt = $db->query($sql);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'];
    }

    function getNombreDeReservations() {
        global $db;
        $sql = "SELECT COUNT(*) AS count FROM reservations";
        $stmt = $db->query($sql);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'];
    }
?>