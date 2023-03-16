<div class="containerupdate">
    <div>

        <h1>Création d'un nouveau produit</h1><br>

        <div>
            <form id="formContainer" method="post" action="index.php?entite=jewels&action=createjewel" enctype="multipart/form-data">
                <fieldset>
                    <legend><strong><em>Fiche produit</em></strong></legend>

                    <?php if ($error) : ?>
                        <div class="alert alert-danger"><?= $error ?></div>
                    <?php endif ?>

                    <div class="line">
                        <label for="id_title">Titre de l'article' : * </label>
                        <input type="text" name="title" id="id_title" required autofocus>
                    </div>

                    <div class="line">
                        <label for="id_metal">metal : * </label>
                        <input type="text" name="metal" id="id_metal" required autofocus>
                    </div>

                    <div class="line">
                        <label for="id_details">details : * </label>
                        <input type="text" name="details" id="id_details" required autofocus>
                    </div>

                    <div class="line">
                        <label for="id_size">Taille : * </label>
                        <input type="text" name="size" id="id_size">
                    </div>

                    <div class="line">
                        <label for="id_color">couleur dominante : * </label>
                        <input type="text" name="color" id="id_color" required autofocus>
                    </div>

                    <div class="line">
                        <label for="id_file">Nom de l'image : * </label>
                        <input type="file" name="image" id="id_file" required>
                    </div>

                    <div class="line">
                        <label for="id_price">prix : * </label>
                        <input type="text" name="price" id="id_price" required>
                    </div>

                    <div class="line">
                        <label for="id_stock">Stock : * </label>
                        <input type="text" name="stock" id="id_stock" required>
                    </div>

                    <div class="line">
                        <label for="id_type">Identifiant du type : * </label>
                        <input type="text" name="type" id="id_type" required>
                    </div>

                    <div class="line">
                        <label for="id_stone">Identifiant de la pierre : * </label>
                        <input type="text" name="stone" id="id_stone" required>
                    </div>

                    <br>
                    <button class="btn" type="submit">
                        valider
                    </button>
                </fieldset>
            </form>
        </div>
    </div>

</div>