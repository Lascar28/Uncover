<?php
include("../Includes/_navbar.php");
?>
<h1>Connexion</h1>
    <form action="./Traitements/traitementConnexion.php" method="post">
        <label for="email">Email</label>
        <input type="mail" name="email" id="email" ><br><br>

        <label for="motDePasse">Mot de passe</label>
        <input type="password" name="motDePasse" id="motDePasse"><br><br>
        <input type="submit" value="Se connecter" name="submit">
        <p>Vous n'avez pas de compte? <a href="index.php?page=inscription">S'inscrire</a></p>
    </form>
