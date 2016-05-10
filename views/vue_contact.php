
</div>


<section id="info">
    <h2>Contactez-nous</h2>
    <form id="contact" method="POST">
        <div>
            <label for="motifContact">motif du Contact *</label>
            <span>
                <select name="motifContact" id=motifContact">
                    <!-- L'attribut "value" correspond à la valeur qui sera retournée lors de la soumission de notre formulaire -->
                    <option value="annonceRefusée">Annonce refusée</option>
                    <option value="depotAnnonce">Dépot annonce</option>
                    <option value="pbTechnique">Problème technique</option>
                    <option value="suggestion">Suggestion</option>
                </select>
            </span>
        </div>
        <div>
            <label for="yourName">Votre nom *</label>
            <input placeholder="Votre nom"  required="" name="yourName" type="text" id="yourName">
        </div>
        <div>
            <label for="yourEmail">Votre adresse e-mail *</label>
            <input placeholder="Votre email"  required="" name="yourEmail" type="email" id="yourEmail">
        </div>
        <div>
            <label for="yourText">Votre demande</label>
            <textarea name="yourText"  required="" id="yourText" rows="10" cols="40"></textarea>
        </div>
        <input type="submit" name="contact" value="Envoyer" class="submit"/>
    </form>

</section>
