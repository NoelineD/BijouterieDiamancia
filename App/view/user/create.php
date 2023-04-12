<main class="container">

    <div class="formContainer">

        <div id="blocVideo">
            <video id="video" type="video/mp4" src="Autres\diamants-3122.mp4" controls autoplay muted loop></video>
        </div>
        <form class="form" method="post" action="index.php?entite=user&action=create">
            <div class="pageTitle">Entrez vos informations</div>
            <!-- <label for="id_nom">Votre nom : </label> -->
            <input class="inputHeight formEntry" type="text" id="id_nom" name="nom" placeholder="votre nom">

            <!-- <label for="id_prenom">Votre prénom : </label> -->
            <input class="inputHeight formEntry" type="text" id="id_prenom" name="prenom" placeholder="votre prenom">

            <!-- <label for="id_mail">Votre mail : </label> -->
            <input class="inputHeight formEntry" type="text" id="id_mail" name="email" placeholder="votre email">

            <!-- <label for="id_psw">Votre mot de passe : </label> -->
            <input class="inputHeight formEntry" type="password" id="id_password" name="password" placeholder="Votre Mot de passe">

            <!-- <label for="id_address">Votre adresse : </label> -->
            <input class="inputHeight formEntry" type="text" id="id_address" name="address" placeholder="votre adresse">

            <!-- <label for="id_city">Votre ville: </label> -->
            <input class="inputHeight formEntry" type="text" id="id_city" name="city" placeholder="votre ville">

            <input class="inputHeight formEntry" type="text" id="id_zipcode" name="zipcode" placeholder="votre code postal">
            <!-- <label for="id_tel">Votre numéro de téléphone: </label> -->
            <input class="inputHeight formEntry" type="text" id="id_tel" name="tel" placeholder="votre numéro de téléphone">

            <input type="hidden" name="token" value="<?php echo $token; ?>">

            <button class="submit formEntry">Envoyer</button>
        </form>
    </div>
</main>