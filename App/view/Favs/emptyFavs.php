  <div class="mainemptycart">

      <figure class="introFigure">

          <figcaption class="introFigcaption">Vos favoris</figcaption>
          <img class="introImg" src="/Autres/banner3 (3).jpg" alt="introImg" style="width:100%">

      </figure>


      <!-- A ENLEVER SI PANIER MARCHE -->

      <?php if ($_SESSION['role'] === 'ROLE_VISITEUR') : ?>
          <p>Si vous n'êtes pas connecté, vous pouvez le faire ci-dessous afin de faciliter vos achats et sauvegarder vos favoris :</p>


          <ul>
              <li>
                  <a class="pinkbtn" href="index.php?entite=user&action=login">Se connecter</a>
              </li>
              <li>
                  <a class="pinkbtn" href="index.php?entite=user&action=create">Créer un compte</a>
              </li>
          </ul>
      <?php else : ?>

          <p>Vous n'avez pas encore ajouter de favoris.</p>

          <ul>
              <li>
                  <a class="pinkbtn" href="index.php?entite=jewels&action=list">Retour aux article</a>
              </li>
          </ul>

      <?php endif ?>
  </div>