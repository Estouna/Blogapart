<h1 class="h1 my-6">Articles</h1>

<?php foreach ($articles as $a) : ?>
    <div class="column centerAll w-100 my-3">

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

                    <article class="bloc-article">
                        <?php foreach ($categories as $c) : ?>
                            <?php if (isset($c->id) && $a->id_categorie === $c->id) : ?>
                                <p class="titre-article mt-3 mx-3 pt-5 pb-3 px-2 ft-8">ARTICLE</p>
                                <p class="categorie-article mx-3 p-2 ft-1">Catégorie <?= $c->nom ?></p>
                                <p class="date-article mx-3 p-2 ft-1">Date <?= $a->date ?></p>
                                <p class="text-article mx-3 p-2 vh-30"><?= $a->article ?></p>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </article>

                </div>
            </div>
            <div class="link-lire row centerAll py-4">
                <a class="ft-4" href="/articles/lire/<?= $a->id ?>">Lire l'article</a>
            </div>
        </div>
    <?php endforeach; ?>