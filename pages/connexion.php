<?php
include("./Includes/_navbar.php");
?>
    <div class="form-connexion">
    <form action="./Traitements/traitementConnexion.php" method="post">
    <h2>Connexion</h2>
                <div>
                    <label for="email">Email</label>
                    <input type="mail" name="email" id="email" ><br><br>
                </div>

                <div>
                    <label for="motDePasse">Mot de passe</label>
                    <input type="password" name="motDePasse" id="motDePasse"><br><br>
                </div>
                <input type="submit" value="Se connecter" name="submit">
                <p>Vous n'avez pas de compte? <a href="index.php?page=inscription">S'inscrire</a></p>
            </form>
        </div>