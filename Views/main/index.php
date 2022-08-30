<h1 class="h1 mt-6 mb-4">Accueil</h1>

<div class="flex flex-wrap centerAll w-100 my-2">
    <?php foreach ($trois_dernierArticles as $a) : ?>
        <div class="column centerAll m-3">
            <article class="bloc-article2">
                <p class="titre-article mt-3 mx-3 pt-5 pb-3 px-2 ft-8">ARTICLE</p>
                <p class="date-article mx-3 p-2 ft-1">Date <?= $a->date ?></p>
                <p class="text-article hidden mx-3 p-2 vh-30 ft-1"><?= $a->article ?></p>
                <div class="row centerAll py-4">
                    <a class="my-4" href="/articles/lire/<?= $a->id ?>">Lire l'article</a>
                </div>
            </article>
        </div>
    <?php endforeach; ?>
</div>

<a class="my-5" href="/articles">Tous les articles</a>