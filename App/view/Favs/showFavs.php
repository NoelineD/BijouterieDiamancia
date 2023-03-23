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
                <th>Supprimer</th>
            </tr>
            <?php
            foreach ($jewels as $jewel) {
                echo '<tr>
            <td>' . $jewel->getTitle() . '</td>
            <td> <img src="/App/Assets/' . $jewel->getImage_name() . '"class="imgArticle"/></td>
            <td class="btnFont"><a class=" btn"
                 href="index.php?entite=favoris&action=add&id=' . $jewel->getId() . '">
                 +</a>
            </td>
             <td class="btnFont"><a class=" btn"
                 href="index.php?entite=favoris&action=remove&id=' . $jewel->getId() . '">
                 -</a>
            </td>
        </tr>';
            }
            ?>
        </table>

    </div>
</main>