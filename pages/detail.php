<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['email'])){
    header("Location: index.php?page=connexion");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: index.php?page=Accueil");
    exit();
}

$id_projection = $_GET['id'];
include("./Includes/_navbar.php");
include("./Fonctions/fonctionReservation.php");

$film = detailFilms($id_projection);

?>

<div class="detail-container">
    <div class="film-detail">
        <img src="<?= $film['image_url']; ?>" alt="<?= $film['titre']; ?>">
        <div class="details">
            <h2><?= $film['titre']; ?></h2>
            <p><span><?= date("l, j F", strtotime($film['date_projection'])); ?></span> à <?= $film['heures_projection']; ?></p>
            <p><span>Genre :</span> <?= $film['nom_categorie']; ?></p>
            <p><span>Réalisateur :</span> <?= $film['realisateur']; ?></p>
            <p><span>Acteur :</span> <?= $film['acteurs']; ?></p>
            <p><span>Synopsis :</span> <?= $film['synopsis']; ?></p>
            <a href="index.php?page=reserver&id=<?= $film['id_projection']; ?>" class="reserver-btn">Resérver</a>
        </div>
    </div>

</div>
<?php include("./Includes/_footer.php"); ?>

