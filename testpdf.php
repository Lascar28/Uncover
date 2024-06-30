<?php
// Inclure la bibliothèque FPDF ou TCPDF
require_once('./FPDF/fpdf.php');

// Créer une instance de FPDF
$pdf = new FPDF();
$pdf->AddPage();

// Données fictives pour le ticket de réservation
$reservationDetails = [
    'film' => 'Nom du film',
    'date' => '2024-06-30',
    'heure' => '20:00',
    'places' => 2
];

// Titre du ticket
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, 'Ticket de Reservation', 0, 1, 'C');
$pdf->Line(10,20,200,20);

$pdf->Ln(10);

// Contenu du tableau : détails de la réservation
$pdf->SetFont('Arial', 'B', 10);

// Film
$pdf->Cell(55, 7, 'Film', 1, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(58, 7, $reservationDetails['film'], 1, 1, 'L');

// Date de projection
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(55, 7, 'Date de projection', 1, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(58, 7, $reservationDetails['date'], 1, 1, 'L');

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

$pdf->Line(10,70,200,70);

        $pdf->Ln(10);
// Message de remerciement
$pdf->SetFont('Arial', 'I', 8);
$pdf->Cell(0, 10, 'Merci pour votre reservation!', 0, 1, 'C');

// Affichage du PDF dans le navigateur
$pdf->Output();
?>



<nav class="navbar">
        <div class="logo">Admin Dashboard</div>
        <div class="nav-links">
            <a href="./Traitements/traitementDeconnexion.php">Déconnexion</a>
        </div>
    </nav>

    <aside class="sidebar">
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="index.php?page=listeFilms">Gestion des Films</a></li>
            <li><a href="#">Gestion des Projections</a></li>
            <li><a href="#">Gestion des Réservations</a></li>
            <li><a href="#">Gestion des Utilisateurs</a></li>
        </ul>
    </aside>


