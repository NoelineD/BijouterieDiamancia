<div>

  <figure class="introFigure">

    <figcaption class="introFigcaption">Tous nos bijoux</figcaption>
    <img class="introImg" src="/Autres/banner.png" alt="introImg">

  </figure>

  <section class="mainContainer">

    <div class="filterContainer">

      <button class="btnImg" type="button">accueil</button>


      <h4>filtrer par:</h4>

      <div class="div-flex">
        <div class="filterType">
          <select>
            <option value="">-- Pierre --</option>
            <option value="diamant">Diamant</option>
            <option value="emeraude">Emeraude</option>
            <option value="aiguemarine">Aigue Marine</option>
            <option value="amethyste">Amethyste</option>
            <option value="opale">Opale</option>
            <option value="quartzrose">Quartz Rose</option>
            <option value="rubis">Rubis</option>
            <option value="saphir">Saphir</option>
            <option value="topaze">Topaze</option>
            <option value="tourmaline">Tourmaline</option>
          </select>
        </div>

        <div class="filterType">
          <select>
            <option value="">-- metal --</option>
            <option>or</option>
            <option>argent</option>
          </select>
        </div>

        <div class="filterType">
          <select>
            <option value="">-- couleur --</option>
            <option>vert</option>
            <option>blanc</option>
            <option>gris</option>
            <option>jaune</option>
            <option>rose</option>
            <option>bleu claire</option>
            <option>bleu foncé</option>
            <option>violet</option>
            <option>rouge</option>
            <option>multicolors</option>
          </select>
        </div>

        <div class="filterType">
          <select>
            <option value="">-- Prix --</option>
            <option>De 100 à 200€</option>
            <option>De 200 à 300€ </option>
            <option>De 400 à 500€ </option>
            <option>De 500 à 600€ </option>
          </select>
        </div>
      </div>

    </div>


    <div class="articlesContainer">
      <?php foreach ($jewels as $jewel) : ?>
        <div class="card">
          <figure>
            <!-- <img src="Assets/" alt="image article" /> -->

            <a id="linkdetails" href="index.php?entite=jewels&action=details&id=<?= $jewel->getId(); ?>">
              <img src="/App/Assets/<?= $jewel->getImage_name(); ?>" alt="image article" />
            </a>

            <figcaption><?= $jewel->getTitle(); ?></figcaption>
          </figure>
          <p> <?= $jewel->getPrice(); ?> &euro;</p>



          <ul>
            <?php if ($_SESSION['role'] === 'CLIENT') : ?>

              <!-- si la variable de session existe, que la variable de session est converti en tableau (unserialise) que le bijou actuel est present dans l'array
  alors on affiche coeur plein sinon on affiche plein car l'utilisateur a ajouté dans les -->

              <?php if (isset($_SESSION['favoris']) && in_array($jewel, unserialize($_SESSION['favoris']))) : ?>
                <a id="containerImgFavs" href="index.php?entite=jewels&action=addtofavs&id=<?= $jewel->getId() ?>" class="btn-favorite"><img id="imgFavsFull" src="/Autres/coeurplein2 (2).png"></a>
              <?php else : ?>
                <a id="containerImgFavs" href="index.php?entite=jewels&action=addtofavs&id=<?= $jewel->getId() ?>" class="btn-favorite"><img src="/Autres/coeurvide.png" id="imgFavsEmpty"></a>
              <?php endif; ?>

              <!-- si l'utilisateur est connecté -->

              <li>
                <a class="pinkBtn" href="index.php?entite=jewels&action=addtocart&id=<?= $jewel->getId(); ?>">Ajouter</a>
              </li>
              <!-- 
              <li>
                <a href="index.php?entite=jewels&action=delete&id=<?= $jewel->getId(); ?>">Retirer</a>
              </li> -->
            <?php endif ?>

            <!-- si l'utilisateur connecté est de rôle ADMIN -->
            <?php if ($_SESSION['role'] === 'ADMIN') : ?>


              <li>
                <a href="index.php?entite=jewels&action=see&id=<?= $jewel->getId(); ?>">modifier</a>
              </li>
            <?php endif ?>

          </ul>

        </div>
        <br>
      <?php endforeach ?>
      <!-- fin de boucle -->
    </div>

  </section>

  <video id="videoJewel" type="video/mp4" src="\Autres\Diamant.mp4" controls autoplay muted loop></video>

  <h3>Nos coups de coeurs</h3>

  <div class="containerBottom">

    <div class="heartContainer">
      <?php foreach ($jewelslimit as $jewellimit) : ?>
        <div class="cardHeart">
          <figure>
            <img src="/App/Assets/<?= $jewellimit->getImage_name(); ?>" alt=" imgjewel" />
            <figcaption><?= $jewellimit->getTitle(); ?></figcaption>
          </figure>
          <p> <?= $jewellimit->getPrice(); ?>&euro;</p>

          <ul>
            <!-- si l'utilisateur est connecté -->
            <?php if ($_SESSION['role'] === 'CLIENT') : ?>
              <li><a class="pinkBtn" href="index.php?entite=jewels&action=addtocart&id=<?= $jewellimit->getId(); ?>">Ajouter</a></li>
              <!-- <li><a href="index.php?entite=jewels&action=see&id=<?= $jewellimit->getId(); ?>">Retirer</a></li> -->
            <?php endif ?>

            <!-- si l'utilisateur connecté est de rôle ADMIN -->
            <?php if ($_SESSION['role'] === 'ADMIN') : ?>

              <li>
                <a href="index.php?entite=jewels&action=see&id=<?= $jewellimit->getId(); ?>">modifier</a>
              </li>
            <?php endif ?>
          </ul>

        </div>
      <?php endforeach ?>
    </div>
  </div>
</div>
<script>
  // on utilise jQuery pour ajouter un comportement de favori interactif sur un btn
  //when ready quand le doc est pret a etre manipulé donc clic le code est éxécuté
  $(document).ready(function() {
    // Quand l'utilisateur clique sur un bouton de favori, on crée l'evenement 
    $('.favorite-btn').click(function(event) {
      event.preventDefault(); // Empêche le comportement par défaut de la balise <a>

      // Stocke la balise <a> dans une variable pour une utilisation ultérieure
      var btn = $(this);

      // Récupère l'ID de l'article à ajouter/supprimer des favoris grace a l'attribut href ou j'ai mis mon id

      var articleId = btn.attr('href').split('=')[1];

      // Envoie une requête AJAX pour ajouter/supprimer l'article des favoris de l'utilisateur
      //qui s'occupe d'ajouter supp grace au add remove
      // $ = raccourci jquery, signifie on fait une requete de methode ajax, simplifie l'acces aux fonction, data = nom de la donnée a envoyé a la requete ajax
      $.ajax({
        type: 'POST',
        url: 'add_remove_favorite.php',
        data: {
          article_id: articleId
        },
        // si operation reussi ok le script envoie une reponse
        success: function(response) {
          // Met à jour l'état du coeur en modifiant la classe de la balise <a>
          // si l'operation reussit, le script envoie une reponse, si ajouté aux favs alors le btn ajoute la classe favorite et l'icone coeur vide est remplacé par plein
          if (response === 'added') {
            btn.addClass('favorite');
            btn.find('.empty-heart').hide();
            btn.find('.full-heart').show();

          } else if (response === 'removed') {
            btn.removeClass('favorite');
            btn.find('.full-heart').hide();
            btn.find('.empty-heart').show();
          }
          // cas opposé on enleve la class, on cache le coeur plein et on remet le coeur vide car plus present dans favvs
        }
      });
    });
  });
</script>