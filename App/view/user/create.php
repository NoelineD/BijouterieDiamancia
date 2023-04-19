<!-- <main class="container"> -->

<div class="formContainer">

    <div id="blocVideo">
        <video id="video" type="video/mp4" src="Autres\diamants-3122.mp4" controls autoplay muted loop></video>
    </div>
    <form class="form" method="post" action="index.php?entite=user&action=create">
        <div class="pageTitle">Créer mon compte</div>
        <!-- <label for="id_nom">Votre nom : </label> -->
        <input class="inputHeight formEntry" type="text" id="id_nom" name="nom" placeholder="votre nom" required>

        <!-- <label for="id_prenom">Votre prénom : </label> -->
        <input class="inputHeight formEntry" type="text" id="id_prenom" name="prenom" placeholder="votre prenom" required>

        <!-- <label for="id_mail">Votre mail : </label> -->
        <input class="inputHeight formEntry" type="text" id="id_mail" name="email" placeholder="votre email" pattern="^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$" title="L'adresse mail doit être au format hello@hmail.co(x)" required>

        <!-- <label for="id_psw">Votre mot de passe : </label> -->
        <!-- (?=.*\d) au moins un chiffre n'importe lequel -->
        <input class="inputHeight formEntry" type="password" id="id_password" name="password" placeholder="Votre Mot de passe" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$" title="le mot de passe doit contenir au moins une minuscule, une majuscule et un chiffre" required>

        <!-- <label for="id_address">Votre adresse : </label> -->
        <input class="inputHeight formEntry" type="text" id="id_address" name="address" placeholder="votre adresse" pattern="^\d{1,2}\s[a-zA-ZÀ-ÖØ-öø-ÿ\s]+[a-zA-ZÀ-ÖØ-öø-ÿ]{2,3}[a-zA-ZÀ-ÖØ-öø-ÿ\s]*$" title="L'adresse mail doit être une adresse française" required>

        <!-- <label for="id_city">Votre ville: </label> -->
        <input class="inputHeight formEntry" type="text" id="id_city" name="city" placeholder="votre ville" required>

      
        <input class="inputHeight formEntry" type="text" id="id_zipcode" name="zipcode" placeholder="votre code postal" pattern="^((2[A|B])|[0-9]{2})[0-9]{3}$" title="Le code postal doit etre au format 1/2 a/b XX XXX" required>
        <!-- <label for="id_tel">Votre numéro de téléphone: </label> -->

        <input class="inputHeight formEntry" type="text" id="id_tel" name="tel" placeholder="votre numéro de téléphone" pattern="^(0|\+33)[1-9]([-. ]?[0-9]{2}){4}$" title=""  required>

        <input type="hidden" name="token" value="<?php echo $token; ?>">

        <button class="submit formEntry">Envoyer</button>
    </form>
</div>