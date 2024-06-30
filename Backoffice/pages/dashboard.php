<?php
    session_start();
    if(!isset($_SESSION['email'])){
        header("Location: ../index.php?page=connexion");
        exit();
    }
    include("./Traitements/traitementListeFilm.php");
    include('./Fonctions/fonctionStatistique.php');

$reservations = recupererNombreReservations();
$utilisateurs = recupererNombreUtilisateurs();
$films = recupererNombreFilms();
$categories = recupererNombreCategories();
$nombre_reservations = $reservations[0]['total_reservations'];
$nombre_utilisateurs = $utilisateurs[0]['total_utilisateurs'];
$nombre_films = $films[0]['total_films'];
$nombre_categories = $categories[0]['total_categories'];
?>
    
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 text-dark fs-4 fw-bold text-uppercase border-bottom"><i
                    class="fas fa-user-secret me-2"></i>Uncover</div>
            <div class="list-group list-group-flush my-3">
                <a href="index.php?page=dashboard" class="list-group-item list-group-item-action bg-transparent text-dark active"><i
                        class="fas fa-tachometer-alt me-2"></i>Tableau de bord</a>
                <a href="index.php?page=listeFilms" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-video me-2"></i>Films</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-ticket-simple me-2"></i>Réservations</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-user me-2"></i>Utilisateurs</a>
                
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-chart-simple me-2"></i>Statistiques</a>
                <a href="./Traitements/traitementDeconnexion.php" class="list-group-item list-group-item-action bg-transparent text-warning fw-bold"><i
                        class="fas fa-power-off me-2"></i>Déconnexion</a>
            </div>
        </div>
         <!-- FIN Sidebar -->

         <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0 text-white">Tableau de bord</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2 text-warning"></i>Admin
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profil</a></li>
                                <li><a class="dropdown-item" href="#">Paramètre</a></li>
                                <li><a class="dropdown-item" href="./Traitements/traitementDeconnexion.php">Déconnexion</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="col-md-3">
                        <div class="p-3 bg-warning shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?= $nombre_reservations ?></h3>
                                <p class="fs-5">Réservations</p>
                            </div>
                            <i class="fas fa-ticket-simple primary-text  rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-danger shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?= $nombre_utilisateurs ?></h3>
                                <p class="fs-5">Utilisateurs</p>
                            </div>
                            <i
                                class="fas fa-user primary-text  rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-success shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?= $nombre_films ?></h3>
                                <p class="fs-5">Films</p>
                            </div>
                            <i class="fas fa-video primary-text  rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-primary shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?= $nombre_categories ?></h3>
                                <p class="fs-5">Catégories</p>
                            </div>
                            <i class="fas fa-list primary-text  rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                </div>

                <div class="row my-5">
                    <h3 class="fs-4 mb-3 text-white">Liste des films</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                <th>Id</th>
                                <th>Titre</th>
                                <th>Catégorie</th>
                                <th>Réalisateur</th>
                                <th>Date de sortie</th>
                                <th>Durée</th>
                                <th>Prix</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (!empty($moovies)) {
                                foreach ($moovies as $moovie) {
                            ?>
                            <tr>
                                <td><?= $moovie['id_film'] ?></td>
                                <td><?= $moovie['titre'] ?></td>
                                <td><?= $moovie['categorie'] ?></td>
                                <td><?= $moovie['realisateur'] ?></td>
                                <td><?= $moovie['date_sortie'] ?></td>
                                <td><?= $moovie['duree'] ?></td>
                                <td><?= $moovie['prix'] ?></td>
                            </tr>
                            <?php
                                }
                            } else {
                                echo "<tr><td colspan='6'>Aucun film trouvé.</td></tr>";
                            }
                            ?>
                        </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>

    