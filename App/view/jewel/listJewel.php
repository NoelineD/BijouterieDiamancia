<div>

  <figure class="introFigure">

    <figcaption class="introFigcaption">Tous nos bijoux</figcaption>
    <img class="introImg" src="/Autres/banner.png" alt="introImg">

  </figure>

  <section class="flexContainer">

    <div class="filterContainer">

      <button class="btnImg" type="button">accueil</button>


      <h4>filtrer par:</h4>


      <div class="div-flex">
        <div class="filterType">
          <form method="POST" action="">
            <select id="stone-select" name="stone">
              <option value="all">-- Pierre --</option>
              <option value="1">Diamant</option>
              <option value="2">Emeraude</option>
              <option value="3">Aigue Marine</option>
              <option value="4">Amethyste</option>
              <option value="5">Opale</option>
              <option value="6">Quartz Rose</option>
              <option value="7">Rubis</option>
              <option value="8">Saphir</option>
              <option value="9">Topaze</option>
              <option value="10">Tourmaline</option>
            </select>
            <button type="submit">Filtrer</button>
          </form>
        </div>


        <div class="filterType">
          <form method="POST" action="">
            <select id="metal-select" name="metal">
              <option value="all">-- metal --</option>
              <option value="1">Or</option>
              <option value="2">Or Blanc</option>
              <option value="3">Or Rose</option>

            </select>
            <button type="submit">Filtrer</button>
          </form>
        </div>

        <div class="filterType">
          <form method="POST" action="">
            <select id="color-select" name="color">
              <option value="">-- couleur --</option>
              <option value="vert">vert</option>
              <option value="blanc">blanc</option>
              <option value="Gris">gris</option>
              <option value="rose">rose</option>
              <option value="bleuclaire">bleu claire</option>
              <option value="bleu">bleu foncé</option>
              <option value="violet">violet</option>
              <option value="rouge">rouge</option>
              <option value="multicolor">multicolor</option>
            </select>
            <button type="submit">Filtrer</button>
          </form>
        </div>

        <div class="filterType">
          <form method="POST" action="">
            <select id="price-select" name="price" ,>
              <option value="">-- Prix --</option>
              <option value="100-200">De 100 à 200€</option>
              <option value="200-300">De 200 à 300€ </option>
              <option value="300-400">De 300 à 400€ </option>
              <option value="400-500">De 400 à 1000€ </option>
            </select>
            <button type="submit">Filtrer</button>
          </form>
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
                <a class="pinkBtn" href="index.php?entite=jewels&action=see&id=<?= $jewel->getId(); ?>">modifier</a>
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
  //**********************************/ Favoris *************************************//

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

  //**********************************/ Filtres *************************************//


  const stoneSelect = document.querySelector('#stone-select');
  stoneSelect.addEventListener('change', () => {
    const selectedStone = stoneSelect.value;
    let filteredJewels = tabJewels;
    if (selectedStone !== 'all') {
      filteredJewels = tabJewels.filter(jewel => jewel.id_stone === selectedStone);
    }
    const articlesContainer = document.querySelector('.articlesContainer');
    articlesContainer.innerHTML = '';
    filteredJewels.forEach(jewel => {
      // Créer la carte pour chaque bijou ici
      // ...
    });
  });
</script>