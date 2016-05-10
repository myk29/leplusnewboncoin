<?php
if ($oUser) {
    ?>
    </div>
    <aside id="asideContact">
            <!--<section><h2>Annonces à la une</h2>
                    <article>
                            <span class="photo_une" >
                                    <img src="./images/im1u.jpg" alt="objet à vendre">
                            </span>
                            <div class="description_une" >
                                    Robe rouge MIM T.38 Neuve
                            </div>
                            <div class="prix_une" >
                                    36 €
                            </div>
                    </article>
                    <article>
                            <span class="photo_une" >
                                    <img src="./images/im2u.jpg" alt="objet à vendre">
                            </span>
                            <div class="description_une" >
                                    Petit chien pour réaliser vous même de délicieux nems...
                            </div>
                            <div class="prix_une" >
                                    48 €
                            </div>
                    </article>
                    <article>
                            <span class="photo_une" >
                                    <img src="./images/im3u.jpg" alt="objet à vendre">
                            </span>
                            <div class="description_une" >
                                    Robe rouge MIM T.38 Neuve
                            </div>
                            <div class="prix_une" >
                                    38 €
                            </div>
                    </article>
            </section>-->
    </aside>
    <section id="info">
        <h2>déposez votre annonce</h2>
        <div>
            <form id="depot" method="POST" enctype="multipart/form-data">
                <label for="annonce">nom annonce</label>
                <input placeholder="nom annonce"  type="text" id="nomAnn" name="nomAnn">
                <br />
                <label for="description">Description de l'annonce</label>
                <textarea  id="descriptionAnn" name="descriptionAnn" rows="10" cols="60"></textarea>
                <br />
                <label for="URL">URL de l'image</label>
                <input placeholder="URL de l'image" type="file" name="URLAnn" id="URLAnn">
                <br />
                <label for="prix">prix en €</label>
                <input placeholder="prix" type="text" name="prixAnn" id="prixAnn">
                <br />
                <input type="submit" name="annonceForm" value="Créer" class="submit"/>
            </form>
        </div>
    </section>
    <?php
} else {
    echo 'Veuillez vous connecter pour accéder à ce service !';
}
?>