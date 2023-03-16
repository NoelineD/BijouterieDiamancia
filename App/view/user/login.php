<main>

     <div class="formContainer">
         <div id="blocVideo">
             <video id="video" type="video/mp4" src="Autres\diamants-3122.mp4" controls autoplay muted loop></video>
         </div>

         <form class="form" method="post" action="index.php?entite=user&action=verif">
             <div class="pageTitle">Connectez-vous</div>

             <input class="inputHeight formEntry" type="email" name="email" id="inputEmail" class="form-control" placeholder="Votre identifiant" required autofocus>
             <input class="inputHeight formEntry" type="password" name="password" id="inputPassword" class="form-control" placeholder="Votre Mot de passe" required>

             <?php if ($error) : ?><!-- si erreur : test d'une variable d'erreur -->
                 <div class="alert alert-danger"><?= $error ?></div>
             <?php endif ?><!-- fin de si -->

             <button class="submit formEntry" type="submit">
                 Valider
             </button>
         </form>

     </div>
 </main>