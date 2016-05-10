

<section id="detailAnnonce">
    <?php
    $oMyAnnManager = new AnnonceManager($oPDO);
    $oMonAnnonce = $oMyAnnManager->get($_GET['id']);

    if ($oMonAnnonce instanceof Annonce) {
        if ($oMonAnnonce->getIdUser() == $oUser->getId()) {
            echo '<a href=?delete_ann=' . $_GET['id'] . '>Supprimer cette annonce</a>';
        }
        echo '<article>';


        echo'<img src = "images/' . $oMonAnnonce->getPicture() . '" alt = "objet à vendre" class = "photo">';
        echo'<div class = "description">';

        echo'<p>';
        echo 'ref' . $_GET['id'] . ' ' . $oMonAnnonce->getCreatedDate();
        echo'<BR/>';
        echo $oMonAnnonce->getTitle();

        echo'<p class = "prix" >';
        echo $oMonAnnonce->getPrice() . ' €';
        echo'</p>';
        echo'</div>';
        echo'<div>';
        echo $oMonAnnonce->getDescription();
        echo'</div>';
        echo '</article>';
    } else {
        echo '<strong>la page demandé n\'existe pas</strong>';
    }
    ?>


</section>