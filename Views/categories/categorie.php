<?php foreach ($categorie as $cat) : ?>
    <h1 class="h1 my-6"><?= $cat->nom ?></h1>
<?php endforeach; ?>

<?php foreach ($articles as $a) : ?>
    <?php if (isset($cat->id) && $cat->id == $a->id_categorie) : ?>
        <div class="column centerAll w-100 my-3">
            <article class="bloc-article w-90">
                <p class="titre-article mt-3 mx-3 pt-5 pb-3 px-2 ft-8">ARTICLE</p>
                <p class="date-article mx-3 p-2 ft-1">Date <?= $a->date ?></p>
                <p class="text-article mx-3 p-2 vh-30"><?= $a->article ?></p>
                <div class="row centerAll py-4">
                    <a class="my-4" href="/articles/lire/<?= $a->id ?>">Lire l'article</a>
                </div>
            </article>
        </div>
    <?php endif; ?>
<?php endforeach; ?>