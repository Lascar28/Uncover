<?php
if (isset($_GET['id'])) {
    $reservation_id = $_GET['id'];
    $ticketFilePath = 'tickets/ticket_' . $reservation_id . '.pdf';
}

?>
<div class="succes-container">
    <i class="fas fa-check-circle"></i>
    <h2>Votre réservation a été confirmée avec succès!</h2>
    <a class="pdf "href="<?php echo $ticketFilePath; ?>" target="_blank">Télécharger votre ticket</a>
    <p>Retournez à <a href="index.php?page=Accueil">la page d'Accueil</a>.</p>
</div>


