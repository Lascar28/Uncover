<?php
    session_start();
    if(!isset($_SESSION['email'])){
        header("Location: ../index.php?page=connexion");
        exit();
    }
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

