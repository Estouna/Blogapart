<?php foreach ($categorie as $cat) : ?>
    <h1 class="h1 my-6"><?= $cat->nom ?></h1>
<?php endforeach; ?>


<?php foreach ($articles as $a) : ?>
    <?php if (isset($cat->id) && $cat->id == $a->id_categorie) : ?>
        <div class="bloc-imgArticle column m-3">
            <div class="flex centerAll">
                <?php if (isset($cat->id) && $cat->id === 1) : ?>
                    <img class="img-home mx-1" src="/assets/nu.jpg" alt="Images d'un dessin nu">
                <?php endif; ?>
                <?php if (isset($cat->id) && $cat->id === 2) : ?>
                    <img class="img-home mx-1" src="/assets/psycherRez.jpg" alt="Images d'un dessin psychédélique">
                <?php endif; ?>
                <?php if (isset($cat->id) && $cat->id === 3) : ?>
                    <img class="img-home mx-1" src="/assets/couleur.jpg" alt="Images d'un dessin en couleur">
                <?php endif; ?>
                <?php if (isset($cat->id) && $cat->id === 4) : ?>
                    <img class="img-home mx-1" src="/assets/portrait.jpg" alt="Images d'un portrait">
                <?php endif; ?>
                <div class="column centerAll">
                    <article class="bloc-article2">
                        <p class="titre-article mt-1 mx-1 pt-5 pb-3 px-2 ft-8">ARTICLE</p>
                        <p class="date-article mx-1 p-2 ft-1">Date <?= $a->date ?></p>
                        <p class="text-article mx-1 p-2 vh-30 ft-1"><?= $a->article ?></p>
                    </article>
                </div>
            </div>
            <div class="link-lire row centerAll py-4">
                <a class="ft-4" href="/articles/lire/<?= $a->id ?>">Lire l'article</a>
            </div>
        </div>
    <?php endif; ?>
<?php endforeach; ?>