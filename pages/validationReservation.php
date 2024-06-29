<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['email'])) {
    header("Location: index.php?page=connexion");
    exit();
}

include("./Includes/_navbar.php");

$id_projection = $_POST['id_projection'];
$nbrePersonne = $_POST['nbrePersonne'];
$heure_projection = $_POST['heure_projection'];

?>

<div class="validation-container">
    <h2>Validation de la réservation</h2>
    <form action="index.php?page=traitementPaiement" method="POST">
        <input type="hidden" name="id_projection" value="<?= $id_projection ?>">
        <input type="hidden" name="nbrePersonne" value="<?= $nbrePersonne ?>">
        <input type="hidden" name="heure_projection" value="<?= $heure_projection ?>">
        <div>
            <label for="mode_paiement">Mode de paiement :</label>
            <select name="mode_paiement" id="mode_paiement" required>
                <option value="airtel">Airtel</option>
                <option value="telma">Telma</option>
                <option value="orange">Orange</option>
            </select>
        </div>
        <div>
            <label for="telephone">Numéro de téléphone :</label>
            <input type="text" name="telephone" id="telephone" required>
        </div>
        <input type="submit" name="valider" value="Valider">
    </form>
</div>

<?php include("./Includes/_footer.php"); ?>
