<main>
    <div class="mainContainer">
        <figure class="introFigure">

            <figcaption class="introFigcaption">Votre Panier</figcaption>
            <img class="introImg" src="/Autres/banner3 (3).jpg" alt="introImg" style="width:100%">

        </figure>

        <table class="table">
            <tr class="">
                <th class="name">Nom de l'article</th>
                <th>Image Produit</th>
                <th>Ajouter au panier</th>
            </tr>
            <?php
            foreach ($itemCarts as $key => $item) {
                echo '<tr>
            <td>' . $item[0]->getTitle() . '</td>
            <td> <img src="/App/Assets/' . $item[0]->getImage_name() . '"class="imgArticle"/></td>
            <td class="btnFont"><a class=" btn"
                 href="index.php?entite=cart&action=add&id=' . $item[0]->getId() . '">
                 +</a>
            </td>
        </tr>';
            }
            ?>
        </table>

    </div>
</main>