<div>

  <figure class="introFigure">

    <figcaption class="introFigcaption">Tous nos bijoux</figcaption>
    <img class="introImg" src="/Autres/banner.png" alt="introImg" style="width:100%">

  </figure>

  <main class="mainContainer">

    <div class="filterContainer">

      <button class="btnImg" type="button">accueil</button>


      <h4>filtrer par:</h4>

      <div class="flex">
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
            <img src="/App/Assets/<?= $jewel->getImage_name(); ?>" alt="image article" />
            <figcaption><?= $jewel->getTitle(); ?></figcaption>
          </figure>
          <p> <?= $jewel->getPrice(); ?> &euro;</p>

          <ul>
            <!-- si l'utilisateur est connecté -->
            <?php if ($_SESSION['role'] === 'CLIENT') : ?>
              <li>
                <a href="index.php?entite=jewels&action=addtocart&id=<?= $jewel->getId(); ?>">Ajouter</a>
              </li>
              <!-- a faire Admin -->
              <!-- si l'utilisateur connecté est de rôle ADMIN -->
              <li>
                <a href="index.php?entite=jewels&action=delete&id=<?= $jewel->getId(); ?>">Retirer</a>
              </li>
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

  </main>

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
              <li><a href="index.php?entite=jewels&action=addtocart&id=<?= $jewellimit->getId(); ?>">Ajouter</a></li>
              <li><a href="index.php?entite=jewels&action=see&id=<?= $jewellimit->getId(); ?>">Retirer</a></li>
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