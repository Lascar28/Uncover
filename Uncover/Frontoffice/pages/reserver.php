<?php
    session_start();
    if (!isset($_SESSION['email'])) {
        header("Location: index.php?page=connexion");
        exit();
    }

    if (!isset($_GET['id'])) {
        header("Location: index.php?page=Accueil");
        exit();
    }

    include("../Includes/_navbar.php");
    include("../Fonctions/fonctionReservation.php");

    $id_projection = $_GET['id'];
    $film = detailFilms($id_projection);

    if (empty($film)) {
        echo "Aucune information trouvée pour cette projection.";
    } else {
?>

<div class="reservation-container">
    <div class="film-details">
        <img src="<?= $film['image_url']; ?>" alt="<?= $film['titre']; ?>">
        <div class="detail">
            <h2><?= $film['titre']; ?></h2>
            <p><span><?= date("l, j F", strtotime($film['date_projection'])); ?></span> à <?= $film['heures_projection']; ?></p>
            <p><span>Genre :</span>Genre : <?= $film['nom_categorie']; ?></p>
            <p><span>Réalisateur :</span> <?= $film['realisateur']; ?></p>
            <p><span>Acteur :</span> <?= $film['acteurs']; ?></p>
            <p class="synopsis"><?= $film['synopsis']; ?></p>
        </div>
    </div>

        <div class="form-reservation">
            <form action="#" method="POST">
                <div>
                    <label for="nbrePersonne">Nombre de personne :</label>
                    <input type="number" name="nbrePersonne" id="nbrePersonne">
                </div>

                <div>
                    <label for="heureCinema">Heure de cinema :</label>
                    <input type="text" name="heureCinema" id="heureCinema">
                </div>
                <input type="submit" name="reserver" value="Reserver">
            </form>
        </div>
</div>
<?php
}
?>
<?php include("../Includes/_footer.php"); ?>
