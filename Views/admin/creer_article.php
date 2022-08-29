<h1 class="h1 my-6">Publier un article</h1>

<!-- 
    -------------------------------------------------------- FORMULAIRE PUBLIER UNE ANNONCE -------------------------------------------------------- 
-->
<form method="post" action="#" class="column centerAll w-90">

    <select class="select-style2 py-2" name="articleCategorie" id="articleCategorie">
        <option value="" class="titleSelect" selected>Choisir la catégorie</option>
        <?php foreach ($categories as $cat) : ?>
            <option value="<?= $cat->id ?>"><?= $cat->nom ?></option>
        <?php endforeach; ?>
    </select>

    <div class="my-5 w-100">
        <textarea name="article" class="min-vh-40 w-100 p-1" required>
            <?php if (isset($_POST['article'])) : echo ($_POST['article']); ?><?php endif; ?>
        </textarea>
    </div>
    <div class="my-5">
        <button type="submit" name="validate" class="">Publier</button>
    </div>
</form>