    <?php
    session_start();
    if(!isset($_SESSION['email'])){
        header("Location: index.php?page=Accueil");
        exit();
    }
    include("../Includes/_navbar.php");
    include("../Fonctions/fonctionFilms.php");
    $films = afficherProgrammeDeLaSemaine();
    $movies = afficherFilmSemaineProchaine();
    ?>
 <div class="banner">
    <div class="header">
        <div id="details">
            <h1>DUNE</h1>
            <h3>Jeudi, 18 Juillet à 16h/19h/21h</h3>
            <h3><span>Genre :</span> Science fiction</h3>
            <h3><span>Acteur :</span> Thimothée Chalamet, Zendaya</h3>
            <p>Paul Atréides se rallie à Chani et aux Fremen tout en préparant sa revanche contre ceux qui ont détruit sa famille. Alors qu'il doit faire un choix entre l'amour de sa vie et le destin de la galaxie, il devra néanmoins tout faire pour empêcher un terrible futur que lui seul peut prédire.<p>
        </div>
        </div>
    </div>
</div>

<div class="section-container">
<div class="section">
    <h2 id="programme">Programme de la semaine</h2>
    <div class="card-container">
        <?php foreach ($films as $film) { ?>
            <div class="card">
                <img src="<?= $film['image_url']; ?>" alt="<?=$film['titre']; ?>">
                <h3><?=$film['titre']; ?></h3>
                <p>Date de projection : <?=$film['date_projection']; ?></p>
                <p>Genre : <?=$film['nom_categorie']; ?></p>
                <div class="button">
                <a href="index.php?page=reserver&id=<?= $film['id_projection']; ?>" class="btn btn-reserver">Réserver</a>
                <a href="index.php?page=detail&id=<?= $film['id_projection']; ?>" class="btn btn-detail">Détail</a>

                </div>
            </div>
        <?php } ?>
    </div>
</div>
</div>

<div class="section">
    <h2>Semaine prochaine</h2>
    <div class="card-container">
        <?php foreach ($movies as $movie) { ?>
            <div class="card">
                <img src="<?= $movie['image_url']; ?>" alt="<?=$movie['titre']; ?>">
                <h3><?=$movie['titre']; ?></h3>
                <p>Date de projection : <?=$movie['date_projection']; ?></p>
                <p>Genre : <?=$movie['nom_categorie']; ?></p>
                <div class="button">
                <a href="index.php?page=reserver&id=<?= $movie['id_projection']; ?>" class="btn btn-reserver">Réserver</a>
                <a href="index.php?page=detail&id=<?= $movie['id_projection']; ?>" class="btn btn-detail">Détail</a>

                </div>
            </div>
        <?php } ?>
    </div>
</div>
</div>

</div>

<?php include("../Includes/_footer.php"); ?>
