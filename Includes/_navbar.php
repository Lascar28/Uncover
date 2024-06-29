<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<nav>
        <img src="./Images/logo.png" alt="logo" class="logo">
        <ul>
                <li><a href="./index.php?page=Accueil">Accueil</a></li>
                <li><a href="#programme">Programmes</a></li>
                <li><a href="./index.php?page=mesReservations">Mes reservations</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="./Traitements/traitementDeconnexion.php"><span>Déconnexion</span></a></li>
                <?php if (isset($_SESSION['prenom'])): ?>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle">
                    <span class="icon-profile"><i class="fa fa-user-circle"></i></span>
                    <span class="profile-name"><?= htmlspecialchars($_SESSION['prenom']); ?></span>
                </a>
            </li>
        <?php else: ?>
            <li><a href="index.php?page=connexion"><span>Connexion</span></a></li>
        <?php endif; ?>
        </ul>
    </nav>
