<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['email'])) {
    header("Location: index.php?page=connexion");
    exit();
}

include("./Includes/_navbar.php");
include("./Fonctions/fonctionReservation.php");

$id_projection = $_POST['id_projection'];
$nbrePersonne = $_POST['nbrePersonne'];
$heure_projection = $_POST['heure_projection'];

$film = detailFilms($id_projection);
if (empty($film)) {
    echo "Aucune information trouvée pour cette projection.";
} else {
    $prix_unitaire = $film['prix']; 
    $montant_total = $nbrePersonne * $prix_unitaire;
}
?>

<div class="validation-container">
    <h2>Validation Achat</h2>
    <h4>Montant à payer : <?= $montant_total ?> Ariary</h4>
    <form action="index.php?page=traitementPaiement" method="POST">
        <input type="hidden" name="id_projection" value="<?= $id_projection ?>">
        <input type="hidden" name="nbrePersonne" value="<?= $nbrePersonne ?>">
        <input type="hidden" name="heure_projection" value="<?= $heure_projection ?>">
        
        <p>Choississez mode de paiement :</p>
        <div class="mode_paiement">
            <div>
                <input type="checkbox" value="orange" id="orange">
                <label for="orange"><img src="./Images/orange.jpeg" alt="Orange"></label>
            </div>
            <div>
                <input type="checkbox" value="airtel" id="airtel">
                <label for="airtel"><img src="./Images/airtel.jpeg" alt="Airtel"></label>
            </div>
            <div>
                <input type="checkbox" value="telma" id="telma">
                <label for="telma"><img src="./Images/telma.jpeg" alt="Telma"></label>
            </div>
        </div>
        <div  id="telephone-container" style="display: none;">
            <label for="telephone">Numéro de téléphone :</label>
            <input type="text" name="telephone" id="telephone" required>
        </div>
        <input type="submit" name="valider" value="Valider">
    </form>
</div>

