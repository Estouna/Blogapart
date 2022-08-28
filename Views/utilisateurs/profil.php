<h1 class="h1 m-6">Profil</h1>

<p class="h2 my-2">Publier un article dans :</p>

<div class="row justify-content-center">
    <?php foreach ($liste_categories as $lc) : ?>
        <div class="text-center m-2 py-2">
            <div class="p-1">
                <p class="p-1 mt-1"><a href="/articles/creer_article/<?= $lc->id ?>"><?= $lc->nom ?></a></p>
            </div>
        </div>
    <?php endforeach; ?>
</div>