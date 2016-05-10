<?php if ($oUser) {
    ?>
    <form method = "POST">
        <!--Généralement on ajoute un élément LABEL pour chaque champ de formulaire afin de préciser la teneur du champ. On lie ces deux champs via l'attribut "for" sur l'élément LABEL -->


        <label for = "password">Nouveau mot de passe</label>
        <input type = "password" id = "password" name = "password" required/>

        <input type = "submit" name = "modifPasswd" value = "Se connecter" />
    </form>
    <?php
} else {
    echo 'Vous devez vous identifier our accéder à cette page';
}
$aList = $oAnnonceManager->get($oUser->getID());
print_r($oUser->getID());
print_r(array($aList));
foreach ($aList as $key => $value) {
    echo $value;
    echo '</BR>';
}
