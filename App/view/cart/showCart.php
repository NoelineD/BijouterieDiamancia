<main>
    <div class="mainContainer">
        <figure class="introFigure">

            <figcaption class="introFigcaption">Votre Panier</figcaption>
            <img class="introImg" src="/Autres/collierAigue52.jpg" alt="introImg" style="width:100%">

        </figure>

        <table class="table">
            <tr class="">
                <th class="name">Nom de l'article</th>
                <th>Image Produit</th>
                <th>Quantité</th>
                <th>Prix Unitaire</th>
                <th>Ajouter</th>
            </tr>
            <?php
            foreach ($itemCarts as $key => $item) {
                echo '<tr>
            <td>' . $item[0]->getTitle() . '</td>
            <td> <img src="/App/Assets/' . $item[0]->getImage_name() . '"class="imgArticle"/></td>
            <td>' . $item[1] . '</td>
            <td>' . $item[0]->getPrice() . ' &euro;</td>
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
        </table>

    </div>
</main>