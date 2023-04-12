<head>
  <meta charset="UTF-8">
  <title>Bijouterie Diamancia</title>
  <link rel="stylesheet" href="App/Css/template.css" crossorigin="anonymous">
  <link rel="stylesheet" href="/App/Css/templateTab.css" crossorigin="anonymous">
  <link rel="stylesheet" href="/App/Css/commonClasses.css" crossorigin="anonymous">
  <link rel="stylesheet" href="/App/fontawesome/css/all.css" />
  <link rel="stylesheet" href="/App/fontawesome/css/all.min.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro:ital,wght@1,600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
  <link rel="stylesheet" href="App\css\<?= $css; ?>.css">
</head>

<body>

  <header>
    <div class="mobileFlex">
      <!------------------------ Menu Burger -------------------------->
      <div class="nav">

        <button class="btn-nav">
          <span class="icon-bar top"></span>
          <span class="icon-bar middle"></span>
          <span class="icon-bar bottom"></span>
        </button>
      </div>
      <div class="nav-content hideNav hidden">
        <ul class="nav-list">
          <li class="nav-item"><a href="index.php" class="item-anchor">Accueil</a></li>
          <li class="nav-item"><a href="index.php?entite=jewels&action=listofrings" class="item-anchor">Bagues</a></li>
          <li class="nav-item"><a href="index.php?entite=jewels&action=listofnecklaces" class="item-anchor">Colliers</a></li>
          <li class="nav-item"><a href="index.php?entite=jewels&action=listofbracelets" class="item-anchor">Bracelets</a></li>
          <li class="nav-item"><a href="index.php?entite=jewels&action=listofEarrings" class="item-anchor">Boucles</a></li>
          <li class="nav-item"><a href="index.php?entite=jewels&action=list" class="item-anchor">Tous nos bijoux</a></li>
        </ul>
        <div class="line-betwen"></div>
      </div>
      <!--------------------- Fin Menu Burger -------------------------->
      <!-- <form action="#" method="get" class=" search-form">

        <button type="submit" class="search-button"><i class="fa-solid fa-magnifying-glass fa-xl" style="color:#3D535F"></i></i></li>
           <i class="fa-duotone fa-magnifying-glass"></i> -->
      <!-- </form> -->
      <form action="#" method="get" class="iconsLeftContainer">
        <input type="text" name="search" class="searchInput" placeholder="Rechercher...">
        <button type="submit" class="searchButton"><i class="fa-solid fa-magnifying-glass" style="color:#3D535F"></i></i></button>
        <!-- <i class="fa-duotone fa-magnifying-glass"></i> -->
      </form>

      <div class="middlenav">
        <img class="logo" src="Autres\diamanciaSmall.png" alt="logo" style="height:60px; width:auto;">
      </div>

      <ul class="iconsRightContainer">

        <li class="iconsSpaceRight ">

          <a href="index.php?entite=favoris&action=showfavs">
            <i class="fa-regular fa-heart fa-xl" style="color:#3D535F"></i>
          </a>

        </li>

        <li class="iconsSpaceRight">

          <!-- j'ajoute une expression ternaire pour vérifier si le panier est vide Si c'est le cas, le lien renverra vers l'action emptycart. Sinon, il renverra vers l'action showcart. -->


          <!-- <a href="index.php?entite=cart&action=<= !empty($itemCarts) ? 'showcart' : 'emptycart' ?>"> -->
          <!-- <div> echo</div> -->

          <a href="index.php?entite=cart&action=showcart">
            <i class="fa-solid fa-bag-shopping fa-xl" style="color:#3D535F"></i>
          </a>

        </li>
        <li class="iconsSpaceRight"><label for="user"><i class="fa-regular fa-user fa-xl" style="color:#3D535F;cursor:pointer;"></i></label></li>

        <input type="checkbox" id="user">
        <div class="userMenu">
          <?php if ($_SESSION['role'] === 'ROLE_VISITEUR') : ?> <!-- si aucun utilisateur n'est pas connecté -->
            <a href="index.php?entite=user&action=login">Se connecter</a>
            <a href="index.php?entite=user&action=create">Créer un compte</a>
          <?php else : ?>
            <a href="index.php?entite=user&action=logout">Déconnexion</a>
          <?php endif; ?> <!-- fin de si -->
          <?php if ($_SESSION['role'] === 'ADMIN') : ?> <!-- si l'utilisateur connecté a le rôle ADMIN -->
            <a href="index.php?entite=jewels&action=list">Modifier mes bijoux</a>
            <a href="index.php?entite=jewels&action=createjewel">Ajouter un bijou</a>
          <?php endif ?>
        </div>
      </ul>
    </div>

    <!-- ---------------------- Menu Tab+ --------------------------- -->
    <div class="menuContainer">
      <ul class="navTab">
        <li><a href="index.php?entite=jewels&action=listofrings" class="tabAnchor">Bagues</a></li>
        <li><a href="index.php?entite=jewels&action=listofnecklaces" class="tabAnchor">Colliers</a></li>
        <li><a href="index.php?entite=jewels&action=listofbracelets" class="tabAnchor">Bracelets</a></li>
        <li><a href="index.php?entite=jewels&action=listofEarrings" class="tabAnchor">Boucles</a></li>
        <li><a href="index.php?entite=jewels&action=list" class="tabAnchor">Tous nos bijoux</a></li>
      </ul>
    </div>
    <!------------------------ Fin Menu Tab+ -------------------------->

  </header>

  <main>
    <?php include $vue . '.php'; ?>
  </main>

  <!------------------------ FOOTER -------------------------->
  <footer>
    <div class="footerContainer">
      <ul class="bottomMenu">
        <li class=""><a href="" class="">Mentions</a></li>
        <li class=""><a href="" class="">Contact</a></li>
        <li class=""><a href="" class="">A propos</a></li>
      </ul>

      <ul class="socialMedia">
        <li><a href="" target="_blank"><i class="fa-brands fa-instagram fa-2x"></i></a></li>
        <li><a href="" target="_blank"><i class="fa-brands fa-facebook-f fa-2x"></i></a></li>
        <li><a href="" target="_blank"><i class="fa-brands fa-pinterest-p fa-2x"></i></a></li>
    </div>
    <p>@2023 Diamancia</p>

  </footer>
  <!------------------------ FOOTER END -------------------------->

  <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
  <script src="App\JS\template.js"></script>
</body>