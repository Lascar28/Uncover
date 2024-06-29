<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['email'])) {
    header("Location: index.php?page=connexion");
    exit();
}

include("./Includes/_navbar.php");
include_once("./Fonctions/fonctionReservation.php");

$id_client = $_SESSION['id_client'];
$reservations = recupererReservations($id_client); 

?>

<div class="mes-reservations-container">
    <h2>Mes Réservations</h2>
    <?php if (empty($reservations)) : ?>
        <p>Aucune réservation trouvée.</p>
    <?php else : ?>
        <table>
            <thead>
                <tr>
                    <th>ID Réservation</th>
                    <th>Titre du Film</th>
                    <th>Date de Projection</th>
                    <th>Nombre de Personnes</th>
                    <th>Montant Total (Ar)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservations as $reservation) : ?>
                    <tr>
                        <td><?= $reservation['id_reservation']; ?></td>
                        <td><?= $reservation['titre_film']; ?></td>
                        <td><?= date("Y-m-d", strtotime($reservation['date_projection'])); ?></td>
                        <td><?= $reservation['nbrePersonne']; ?></td>
                        <td><?= $reservation['montant_total']. ' Ar'; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<?php include("./Includes/_footer.php"); ?>
