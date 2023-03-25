<main>
    <div class="mainContainer">
        <figure class="introFigure">

            <figcaption class="introFigcaption">Votre Panier</figcaption>
            <img class="introImg" src="/Autres/collierAigue52.jpg" alt="introImg" style="width:100%">

        </figure>

        <div class="table">
            <?php
            foreach ($jewels as $jewel) {
                echo '<tr>
            <img src="/App/Assets/' . $jewel->getImage_name() . '"class="imgArticle"/>
            <p>' . $jewel->getTitle() . '</p>
            <p>' . $jewel->getPrice() . ' &euro;</p>
            <p>' . $jewel->getDetails() . '</p>
            <p>' . $jewel->getDetails() . '</p>
            <td class="btnFont"><a class=" btn"
                 href="index.php?entite=cart&action=add&id=' . $item[0]->getId() . '">
                 +</a>
                 <a class="btn btnMinus"
                 href="index.php?entite=cart&action=remove&id=' . $item[0]->getId() . '">
                 -</a>
            </td>
        </tr>';
            }
            echo '<tr><td colspan="2" class="totalPrice">Prix Total:  ' . $prixHt . ' &euro;</td></tr>';
            ?>
        </div>

    </div>
</main>