
<header>
    <img src="./images/logo.jpg" alt="logo" id="logo">
    <div id="formLogin">
        <?php
        if ($oUser) {
            echo 'Bienvenue ' . $oUser->getEmail() . 'Vous êtes connecté.';
            echo '<BR/>';
            ?> <a href="./index.php?logout">Se déconnecter</a><?php } else {
            ?>

            <form  method="POST">
                <!--  Généralement on ajoute un élément LABEL pour chaque champ de formulaire afin de préciser la teneur du champ. On lie ces deux champs via l'attribut "for" sur l'élément LABEL -->
                <label for="email">Email</label>
                <!-- Les champs de formulaire (input, textarea, select) doivent avoir un attribut "name" qui correspondra à la clé de notre tableau PHP quand nous récupérons les données de notre formulaire -->
                <input type="text" id="email" name="email" required/>

                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required/>

                <input type="submit" name="loginForm" value="Se connecter" />
            </form>

        <?php } ?>
    </div>
    <nav>
        <ul class="menu">
            <li><a href="./index.php?page=home">accueil</a></li>
            <li><a id="aj1" href="#">accueil AJAX</a></li>
            <li><a href="./index.php?page=depot" id="dep">depot annonce</a></li>
            <li><a href="./index.php?page=modifPasswd"">demandes</a></li>
            <li><a id="aj2" href="#">contact AJAX</a></li>
            <li><a href="./index.php?page=contact">Contact</a></li>
        </ul>
    </nav>
</header>