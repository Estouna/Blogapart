<h1 class="h1 mt-6 mb-4">Accueil</h1>

<div class="flex flex-wrap centerAll w-100 my-2">
    <?php foreach ($trois_dernierArticles as $a) : ?>
        <div class="column centerAll m-3">
            <article class="bloc-article2">
                <p class="text-article mt-3 mx-3 p-2 vh-40 ft-1"><?= $a->article ?></p>

                <p class="article-date p-3 ft-1">Date <?= $a->date ?></p>

                <div class="row centerAll py-4">
                    <a class="my-4" href="/articles/lire/<?= $a->id ?>">Lire l'article</a>
                </div>
            </article>
        </div>
    <?php endforeach; ?>
</div>

<a class="my-5" href="/articles">Tous les articles</a>