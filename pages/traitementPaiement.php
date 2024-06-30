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
            'dateProjection' => $film['date_projection'],
            'heure' => $heure_projection,
            'places' => $nbrePersonne
        ];

        require_once('./FPDF/fpdf.php');
        $pdf = new FPDF();
        $pdf->AddPage();

        $pdf->Image('./Images/logo.png', 10, 10, 30);
        
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, utf8_decode('Nº : ') . $reservation_enregistree, 0, 1, 'R');
        $pdf->Line(10,40,200,40);

        $pdf->Ln(10);
        // Titre du ticket
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(0, 10, utf8_decode('Ticket de Reservation'), 0, 1, 'C');
        $pdf->Ln(10);

        $pdf->SetFont('Arial', 'B', 10);

        // Film
        $pdf->Cell(55, 7, 'Film', 1, 0, 'L');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(58, 7, $reservationDetails['film'], 1, 1, 'L');

        // Date de projection
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(55, 7, 'Date de projection', 1, 0, 'L');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(58, 7, $reservationDetails['dateProjection'], 1, 1, 'L');

        // Heure de projection
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(55, 7, 'Heure de projection', 1, 0, 'L');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(58, 7, $reservationDetails['heure'], 1, 1, 'L');

        // Nombre de places
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(55, 7, 'Nombre de places', 1, 0, 'L');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(58, 7, $reservationDetails['places'], 1, 1, 'L');
        $pdf->Line(10,90,200,90);

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(55, 7, 'Date de reservation', 1, 0, 'L');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(58, 7, $reservationDetails['date'], 1, 1, 'L');

        $pdf->Ln(10);

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
