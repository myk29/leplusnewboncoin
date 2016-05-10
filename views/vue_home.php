<?php
$dataAnnonces = $oAnnonceManager->getList();
?>
<div  id="rechercheForm">
    <form>
        <fieldset>
            <legend>Votre recherche</legend> <!-- Titre du fieldset -->
            <select name="cat">
                <!-- L'attribut "value" correspond à la valeur qui sera retournée lors de la soumission de notre formulaire -->
                <option value="Toutes catégories">Toutes catégories</option>
                <option value="Voiture">Voiture</option>
                <option value="Moto">Moto</option>
                <option value="Objet">objet</option>
            </select>
            <select name="reg">
                <!-- L'attribut "value" correspond à la valeur qui sera retournée lors de la soumission de notre formulaire -->
                <option value="Toutes Régions">Toutes régions</option>
                <option value="PACA">PACA</option>
                <option value="Bretagne">Bretagne</option>
                <option value="Est">Grand Est</option>
            </select>

            <input placeholder="Quelle ville ?" list="ville" type="text" id="choixVille">
            <datalist id="ville" >

                <option label="Arras" value="Arras">
                <option label="Bayonne"  value="Bayonne">
                <option label="Caen"  value="Caen">
                <option label="Brest"  value="Brest">
            </datalist>
        </fieldset>
        <input type="submit" value="GO" class="submit"/>
    </form>
</div>
<aside id="asideHome">
    <section id="sectionHome"><h2>Annonces à la une</h2>
        <?php
        foreach ($dataUne as $annonce) {

            echo '<article>';
            echo '<span class="photo_une">';
            echo'<img src="' . $annonce->getPicture() . '" alt="objet à vendre">';
            echo '</span >';
            echo'<div class="description_une">';
            echo 'ref' . $annonce->getId() . ': ';
            echo $annonce->getTitle();

            echo'</div>';
            echo'<div class="prix_une">';
            echo $annonce->getPrice() . ' €';
            echo'</div>';
            echo '</article>';
        };
        ?>
    </section>
</aside>
<section id="info">
    <?php
    foreach ($dataAnnonces as $annonce) {
        echo '<a href=?page=annonce&id=' . $annonce->getId() . '>';
        echo '<article>';

        echo'<img src="images/' . $annonce->getPicture() . '" alt="objet à vendre" class="photo">';

        echo'<div class="description">';

        echo'<p>';
        echo 'ref' . $annonce->getId() . ' ' . $annonce->getCreatedDate();
        echo'<BR/>';
        echo $annonce->getTitle();
        echo'<BR/>';

        echo '<em>' . mb_substr($annonce->getDescription(), 0, 100) . '</em>'; //mb_substr et non sub qui ne gre pas l'encoding

        echo'<p class="prix" >';
        echo $annonce->getPrice() . ' €';
        echo'</p>';
        echo'</div>';

        echo '</article>';
        echo '</a>';
    };
    ?>


</section>