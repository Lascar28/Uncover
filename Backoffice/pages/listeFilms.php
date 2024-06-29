<?php
include("./Traitements/traitementListeFilm.php");
?>
<div class="container">
    <div class="row mt-4">
            <?php
                if(!empty($_SESSION['message'])){
                    echo '<div class="alert alert-success" role="alert">'.$_SESSION['message'].'</div>';
                    $_SESSION['message'] = "";
                }
            ?>
        <section class="col-12 mt-4">
            <h4>Liste des films</h4>
            <a href="index.php?page=ajouterFilm" class="btn btn-warning">Ajouter</a>
            <table class="table">
    <thead>
        <th>Id</th>
        <th>Titre</th>
        <th>Catégorie</th>
        <th>Réalisateur</th>
        <th>Date de sortie</th>
        <th>Durée</th>
        <th>Prix</th>
    </thead>
    <tbody>
        <?php
        if (!empty($films)) {
            foreach ($films as $film) {
        ?>
        <tr>
            <td><?= $film['id_film'] ?></td>
            <td><?= $film['titre'] ?></td>
            <td><?= $film['categorie'] ?></td>
            <td><?= $film['realisateur'] ?></td>
            <td><?= $film['date_sortie'] ?></td>
            <td><?= $film['duree'] ?></td>
            <td><?= $film['prix'] ?></td>
        </tr>
        <?php
            }
        } else {
            echo "<tr><td colspan='6'>Aucun film trouvé.</td></tr>";
        }
        ?>
    </tbody>
</table>
        </section>
    </div>

    <!-- Liste des catégories -->
    <div class="row mt-4">
        <section class="col-12">
            <h4>Liste des categories</h4>
            <a href="#" class="btn btn-warning">Ajouter</a>
            <table class="table">
    <thead>
        <th>Id</th>
        <th>Catégorie</th>
    </thead>
    <tbody>
        <?php
        if (!empty($categories)) {
            foreach ($categories as $categorie) {
        ?>
        <tr>
            <td><?= $categorie['id_categorie'] ?></td>
            <td><?= $categorie['nom_categorie'] ?></td>
        </tr>
        <?php
            }
        } else {
            echo "<tr><td colspan='6'>Aucun film trouvé.</td></tr>";
        }
        ?>
    </tbody>
</table>
        </section>
    </div>

</div>
