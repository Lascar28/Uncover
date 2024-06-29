<?php
include_once('../config/connexionBaseDeDonnee.php');
include_once('../Fonctions/fonctionFilms.php');
?>
<div class="container">
    <div class="row">
        <section class="col-6 mt-4">
            <?php if (!empty($_SESSION['erreur'])) {
                echo '<div class="alert alert-danger" role="alert">' . $_SESSION['erreur'] . '</div>';
                $_SESSION['erreur'] = "";
            } ?>
            <h4>Ajouter un nouveau film</h4>
            <form action="./Traitements/traitementAjouterFilm.php" method="post">
                <div class="form-group">
                    <label for="titre">Titre</label>
                    <input type="text" class="form-control" id="titre" name="titre">
                </div>
                <div class="form-group">
                    <label for="idCategorie">Catégorie</label>
                    <input type="text" class="form-control" id="idCategorie" name="id_categorie">
                </div>
                <div class="form-group">
                    <label for="idAdmin">Administrateur</label>
                    <input type="text" class="form-control" id="idAdmin" name="id_admin">
                </div>
                <div class="form-group">
                    <label for="realisateur">Réalisateur</label>
                    <input type="text" class="form-control" id="realisateur" name="realisateur">
                </div>
                <div class="form-group">
                    <label for="dateSortie">Date de sortie</label>
                    <input type="text" class="form-control" id="dateSortie" name="date_sortie">
                </div>
                <div class="form-group">
                    <label for="duree">Durée</label>
                    <input type="text" class="form-control" id="duree" name="duree">
                </div>
                <div class="form-group">
                    <label for="prix">Prix</label>
                    <input type="text" class="form-control" id="prix" name="prix">
                </div>
                <div class="form-group mt-2">
                    <input type="submit" class="form-control btn btn-warning" value="Ajouter" name="Ajouter">
                </div>
            </form>
        </section>
    </div>
</div>
