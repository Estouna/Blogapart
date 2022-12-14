<h1 class="h1 mt-6 mb-4">Accueil</h1>

<div class="flex flex-wrap centerAll w-100 my-2">
    <?php foreach ($trois_dernierArticles as $a) : ?>
        <div class="bloc-imgArticle column m-3">
            <div class="flex centerAll">
                <?php if (isset($a->id_categorie) && $a->id_categorie === 1) : ?>
                    <img class="img-home mx-1" src="/assets/nu.png" alt="Images d'un dessin nu">
                <?php endif; ?>
                <?php if (isset($a->id_categorie) && $a->id_categorie === 2) : ?>
                    <img class="img-home mx-1" src="/assets/psycherRez.png" alt="Images d'un dessin psychédélique">
                <?php endif; ?>
                <?php if (isset($a->id_categorie) && $a->id_categorie === 3) : ?>
                    <img class="img-home mx-1" src="/assets/couleur.png" alt="Images d'un dessin en couleur">
                <?php endif; ?>
                <?php if (isset($a->id_categorie) && $a->id_categorie === 4) : ?>
                    <img class="img-home mx-1" src="/assets/portrait.png" alt="Images d'un portrait">
                <?php endif; ?>
                <div class="column centerAll">
                    <article class="bloc-article2">
                        <p class="titre-article mt-1 mx-1 pt-5 pb-3 px-2 ft-8">ARTICLE</p>
                        <p class="date-article mx-1 p-2 ft-1">Date <?= $a->date ?></p>
                        <p class="text-article hidden mx-1 p-2 vh-30 ft-1"><?= $a->article ?></p>
                    </article>
                </div>
            </div>
            <div class="link-lire row centerAll py-4">
                <a class="ft-4" href="/articles/lire/<?= $a->id ?>">Lire l'article</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<a class="my-5" href="/articles/index/?start=1">Tous les articles</a>