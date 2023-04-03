
<div class="mainContainer">

    <a class="btnPurple marginBtn" href="index.php?entite=jewels&action=list">Retour</a>
    
    <div class="Containerdetails">

        <?php
        // var_dump($jewel);
        // m'a permi de voir que tout mes attributs etait transforméé en int

        echo '
            <div class="containerImg">
            <img src="/App/Assets/' . $jewel->getImage_name() . '"class="imgArticle"/>
            </div>
            <div class="ContainerP">
            <p>' . $jewel->getTitle() . '</p>
            <p>' . $jewel->getPrice() . ' &euro;</p>
            <p>' . $jewel->getDetails() . '</p>
            <p>Pierre: ' . $jewel->getNameStone() . '</p>
            <p>Metal: ' . $jewel->getNameMetal() . '</p>
            <p>Taille: ' . $jewel->getNbrSize() . '</p>
            <a class="btnPurple" href="index.php?entite=jewels&action=addtocart&id=' . $jewel->getId() . '">Ajouter au panier</a>
            </div>';

        ?>
    </div>


</div>
