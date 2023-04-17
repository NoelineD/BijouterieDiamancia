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
        <!-- ([.-]?\w+) peut etre séparé par un point ou tiret et contenir plusieurs lettres, (\.\w{2,3})+ derniere partie 2o u 3lettres -->
        <input class="inputHeight formEntry" type="text" id="id_mail" name="email" placeholder="votre email" pattern="^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$" title="L'adresse mail doit être au format hello@hmail.co(x)" required>

        <!-- <label for="id_psw">Votre mot de passe : </label> -->
        <!-- (?=.*\d) au moins un chiffre n'importe lequel -->
        <input class="inputHeight formEntry" type="password" id="id_password" name="password" placeholder="Votre Mot de passe" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$" title="le mot de passe doit contenir au moins une minuscule, une majuscule et un chiffre" required>

        <!-- <label for="id_address">Votre adresse : </label> -->
        <!-- des espaces ou des caractères spéciaux comme l'accent sont autorisés. \s : autorise un espace blanc  ooo majuscule minuscule de l'alphabet, \d est un raccourci en expression régulière (ou "regexp") qui correspond à n'importe quel chiffre de 0 à 9-->
        <input class="inputHeight formEntry" type="text" id="id_address" name="address" placeholder="votre adresse" pattern="^\d{1,2}\s[a-zA-ZÀ-ÖØ-öø-ÿ\s]+[a-zA-ZÀ-ÖØ-öø-ÿ]{2,3}[a-zA-ZÀ-ÖØ-öø-ÿ\s]*$" title="L'adresse mail doit être une adresse française" required>

        <!-- <label for="id_city">Votre ville: </label> -->
        <input class="inputHeight formEntry" type="text" id="id_city" name="city" placeholder="votre ville" required>

        <!-- le pattern : ^debut chaine ensuite 2a ou b corse ou 2 chiffre 0a9 ensuite 3 chiffre et fin -->
        <input class="inputHeight formEntry" type="text" id="id_zipcode" name="zipcode" placeholder="votre code postal" pattern="^((2[A|B])|[0-9]{2})[0-9]{3}$" title="Le code postal doit etre au format 1/2 a/b XX XXX" required>
        <!-- <label for="id_tel">Votre numéro de téléphone: </label> -->

        <!-- ([-. ]?[0-9]{2}){4} : Cette partie décrit les quatre groupes de deux chiffres qui suivent le premier chiffre. Chaque groupe peut être séparé par un point, un tiret ou un espace (ou aucun séparateur du tout). -->
        <!--  * signifie 0 ou plusieurs fois , w représente lettre chiffre ou tiret /w+ n'importe quel caractere -->
        <input class="inputHeight formEntry" type="text" id="id_tel" name="tel" placeholder="votre numéro de téléphone" pattern="^(0|\+33)[1-9]([-. ]?[0-9]{2}){4}$" title=""  required>

        <input type="hidden" name="token" value="<?php echo $token; ?>">

        <button class="submit formEntry">Envoyer</button>
    </form>
</div>