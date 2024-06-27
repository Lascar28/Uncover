    <h1>Inscription</h1>
    <form action="./Traitements/traitementInscription.php" method="post">
        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom" autocomplete="off"><br><br>

        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" id="prenom" ><br><br>

        <label for="email">Email</label>
        <input type="mail" name="email" id="email" autocomplete="off"><br><br>

        <label for="motDePasse">Mot de passe</label>
        <input type="password" name="motDePasse" id="motDePasse" ><br><br

        <label for="confirmMotDePasse">Confimer le mot de passe</label>
        <input type="password" name="confirmMotDePasse" id="confirmMotDePasse" ><br><br>

        <input type="submit" value="S'inscrire" name="submit">
        <p>Vous avez déja un compte? <a href="index.php?page=connexion">Se connecter</a></p>
    </form>
