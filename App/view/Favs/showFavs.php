<main>
    <div class="mainContainer">
        <figure class="introFigure">

            <figcaption class="introFigcaption">Vos Favoris</figcaption>
            <img class="introImg" src="/Autres/banner3 (3).jpg" alt="introImg" style="width:100%">

        </figure>

        <table class="table">
            <tr class="">
                <th class="name">Nom de l'article</th>
                <th>Image Produit</th>
                <th>Prix Unitaire</th>
                <th></th>
                <th></th>
            </tr>
            <!-- is_object utilisé pour verifié si bien un objet avant d'afficher car probleme -->
            <?php
            foreach ($jewels as $jewel) {
                //  foreach ($jewels as  $key $jewel) {
                // if (is_object($jewel)) {
                echo '<tr>
            <td>' . $jewel->getTitle() . '</td>
            <td> <img src="/App/Assets/' . $jewel->getImage_name() . '"class="imgArticle"/></td>
            <td>' . $jewel->getPrice() . '</td>
            <td class="btnFont"><a class=" btn"
                 href="index.php?entite=jewels&action=addtocart&id=' . $jewel->getId() . '">
                 Ajouter au panier</a>
            </td>
             <td class="btnFont"><a class=" btn"
                 href="index.php?entite=favoris&action=remove&id=' . $jewel->getId() . '">
                 supprimer</a>
            </td>
        </tr>';
            }
            // }

            ?>
        </table>

    </div>
</main>