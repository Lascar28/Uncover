<?php
if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
if (!isset($_SESSION['email'])) {
    header("Location: index.php?page=connexion&redirect=reserver&id=" . $_GET['id']);
    exit();
}

    if (!isset($_GET['id'])) {
        header("Location: index.php?page=Accueil");
        exit();
    }

    include("./Includes/_navbar.php");
    include("./Fonctions/fonctionReservation.php");

    $id_projection = $_GET['id'];
    $film = detailFilms($id_projection);

    if (empty($film)) {
        echo "Aucune information trouvée pour cette projection.";
    } else {
        $suggestions = obtenirSuggestionsFilms($id_projection);
?>

<div class="reservation-container">
    <div class="film-details">
        <img src="<?= $film['image_url']; ?>" alt="<?= $film['titre']; ?>">
        <div class="detail">
            <h2><?= $film['titre']; ?></h2>
            <p><span><?= date("l, j F", strtotime($film['date_projection'])); ?></span> à <?= $film['heures_projection']; ?></p>
            <p><span>Genre : </span> <?= $film['nom_categorie']; ?></p>
            <p><span>Réalisateur : </span> <?= $film['realisateur']; ?></p>
            <p><span>Acteur : </span> <?= $film['acteurs']; ?></p>
            <p><span class="price">Prix : <?= $film['prix'] . ' Ariary'; ?></span></p>
            <p class="synopsis"><?= $film['synopsis']; ?></p>
        </div>
    </div>

    <div class="form-reservation">
        <form action="index.php?page=validationReservation&id=<?= $id_projection ?>" method="POST">
            <input type="hidden" name="id_projection" value="<?= $id_projection ?>">
            <div>
                <label for="nbrePersonne">Nombre de personne :</label>
                <input type="number" name="nbrePersonne" id="nbrePersonne" min="0" required>
            </div>
            <div class="select">
                <label for="heure_projection">Heure de projection :</label>
                <select name="heure_projection" id="heure_projection" required>
                    <option value="16:00:00">16:00</option>
                    <option value="19:00:00">19:00</option>
                    <option value="21:00:00">21:00</option>
                </select>
            </div>
            <input type="submit" name="reserver" value="Reserver">
        </form>
    </div>
</div>
<div class="suggestions-container">
    <h3>Vous pourriez aussi aimer</h3>
    <div class="suggestions">
        <?php foreach ($suggestions as $suggestion) { ?>
            <div class="suggestion-card">
                <a href="index.php?page=detail&id=<?= $suggestion['id_projection']; ?>">
                    <img src="<?= $suggestion['image_url']; ?>" alt="<?= $suggestion['titre']; ?>">
                    <p><?= $suggestion['titre']; ?></p>
                </a>
            </div>
        <?php } ?>
    </div>
</div>
<?php
}
?>
<?php include("./Includes/_footer.php"); ?>