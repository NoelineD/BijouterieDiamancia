    <div class="mainemptycart">

        <figure class="introFigure">

            <figcaption class="introFigcaption">Votre Panier</figcaption>
            <img class="introImg" src="/Autres/panierban.jpg" alt="introImg" style="width:100%">

        </figure>


        <!-- A ENLEVER SI PANIER MARCHE -->

        <?php if ($_SESSION['role'] === 'ROLE_VISITEUR') : ?>
            <p>Si vous n'êtes pas connecté, vous pouvez le faire ci-dessous afin de faciliter vos achats et sauvegarder votre panier et vos favoris :</p>


            <ul>
                <li>
                    <a class="pinkbtn" href="index.php?entite=user&action=login">Se connecter</a>
                </li>
                <li>
                    <a class="pinkbtn" href="index.php?entite=user&action=create">Créer un compte</a>
                </li>
            </ul>
        <?php else : ?>

            <p>Votre panier est vide.</p>

            <ul>
                <li>
                    <a class="pinkbtn" href="index.php?entite=jewels&action=list">Retour aux articles</a>
                </li>
            </ul>

        <?php endif ?>
    </div>