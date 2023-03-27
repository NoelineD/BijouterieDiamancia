<!-- <main> -->
    <div class="mainContainer">
        <!-- <figure class="introFigure">

            <figcaption class="introFigcaption">Votre Panier</figcaption>
            <img class="introImg" src="/Autres/collierAigue52.jpg" alt="introImg" style="width:100%">

        </figure> -->

        <div class="Containerdetails">
            <?php
            foreach ($jewels as $jewel) {
                echo '
            <img src="/App/Assets/' . $jewel->getImage_name() . '"class="imgArticle"/>
            <div>
            <p>' . $jewel->getTitle() . '</p>
            <p>' . $jewel->getPrice() . ' &euro;</p>
            <p>' . $jewel->getDetails() . '</p>
            <p>Pierre: ' . $jewel->getNameStone() . '</p>
            <p>Metal: ' . $jewel->getNameMetal() . '</p>
            <p>Taille: ' . $jewel->getNbrSize() . '</p>
            <a href="index.php?entite=jewels&action=addtocart&id=' . $jewel->getId() . '">Ajouter au panier</a>
            </div>';
            }
            ?>
        </div>


    </div>
<!-- </main> -->