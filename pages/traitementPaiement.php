<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['email'])) {
    header("Location: index.php?page=connexion");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['valider'])) {
    $id_projection = $_POST['id_projection'];
    $nbrePersonne = $_POST['nbrePersonne'];
    $heure_projection = $_POST['heure_projection'];
    $mode_paiement = $_POST['mode_paiement'];
    $telephone = $_POST['telephone'];

    $prix_unitaire = 15000;
    $montant_total = $nbrePersonne * $prix_unitaire;

    $id_client = $_SESSION['id_client'];

    $date_reservation = date("Y-m-d");

    include_once("./Fonctions/fonctionReservation.php");
    $reservation_enregistree = enregistrerReservation($id_client, $id_projection, $nbrePersonne, $date_reservation);

    if ($reservation_enregistree) {
        include_once("./Fonctions/fonctionFilms.php");
        $film = detailFilms($id_projection);

        $reservationDetails = [
            'id' => $reservation_enregistree,
            'image' => $film['image_url'],
            'film' => $film['titre'],
            'date' => $date_reservation,
            'heure' => $heure_projection,
            'places' => $nbrePersonne
        ];

        require_once('./FPDF/fpdf.php'); 
        $pdf = new FPDF();
        $pdf->AddPage();

        $imageWidth = 50; 
        $imageHeight = 0; 
        
      // Titre du ticket de réservation
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(0, 10, 'Ticket de Reservation', 0, 1, 'C');
    $pdf->Ln(10);

    // Calcul de la largeur du tableau et positionnement centré
    $tableWidth = 113; // Largeur totale des cellules

    // Positionnement centré
    $pdf->SetX(($pdf->GetPageWidth() - $tableWidth) / 2);

    // Bordure supérieure du tableau
    $pdf->Cell($tableWidth, 0, '', 'T');
    $pdf->Ln();

    // Tableau de détails de réservation
    $pdf->SetFont('Arial', 'B', 10);

    // Première ligne : Film
    $pdf->Cell(55, 7, 'Film :', 1, 0, 'L');
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(58, 7, $reservationDetails['film'], 1, 1, 'L');

    // Deuxième ligne : Date de projection
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(55, 7, 'Date de projection :', 1, 0, 'L');
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(58, 7, $reservationDetails['date'], 1, 1, 'L');

    // Troisième ligne : Heure de projection
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(55, 7, 'Heure de projection :', 1, 0, 'L');
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(58, 7, $reservationDetails['heure'], 1, 1, 'L');

    // Quatrième ligne : Nombre de places
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(55, 7, 'Nombre de places :', 1, 0, 'L');
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(58, 7, $reservationDetails['places'], 1, 1, 'L');

    // Bordure inférieure du tableau
    $pdf->Cell($tableWidth, 0, '', 'T');
    $pdf->Ln();

    // Message de remerciement
    $pdf->SetFont('Arial', 'I', 8);
    $pdf->Cell(0, 10, 'Merci pour votre reservation!', 0, 1, 'C');


        $pdfContent = $pdf->Output('S'); 
        
        $ticketFilePath = './tickets/ticket_' . $reservation_enregistree . '.pdf';
                file_put_contents($ticketFilePath, $pdfContent);

        header("Location: index.php?page=succesReservation&id=$reservation_enregistree");
        exit();
    } else {
        echo "Erreur lors de l'enregistrement de la réservation.";
    }
} else {
    header("Location: index.php?page=Accueil");
    exit();
}
?>