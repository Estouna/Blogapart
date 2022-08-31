<h1 class="h1 my-6">Article</h1>

<!-- 
    -------------------------------------------------------- MESSAGES -------------------------------------------------------- 
-->
<?php if (!empty($_SESSION['erreur'])) : ?>
    <div class="alert mb-5">
        <?php
        echo $_SESSION['erreur'];
        unset($_SESSION['erreur']);
        ?>
    </div>
<?php endif; ?>
<?php if (!empty($_SESSION['success'])) : ?>
    <div class="succes mb-5">
        <?php
        echo $_SESSION['success'];
        unset($_SESSION['success']);
        ?>
    </div>
<?php endif; ?>

<!-- 
    -------------------------------------------------------- LIRE UN ARTICLE -------------------------------------------------------- 
-->
<article class="lire-bloc-article mb-5">
    <p class="lire-titre-article mt-1 mx-1 pt-5 pb-3 px-2 ft-8">ARTICLE</p>
    <p class="date-article mx-1 p-2 ft-1">Date <?= $lire_article->date ?></p>
    <p class="lire-text-article mb-1 mx-1 p-2"><?= $lire_article->article ?></p>
</article>


<?php if (isset($_SESSION['user']) && !empty($_SESSION['user']['id'])) : ?>

    <!-- 
    -------------------------------------------------------- FORMULAIRE POSTER UN COMMENTAIRE -------------------------------------------------------- 
    -->
    <?= $commentaireForm ?>

<?php else : ?>
    <p class="ft-7 my-4">Laisser un commentaire sur l'article</p>
    <a class="ft-4 mb-8" href="/utilisateurs/connexion">Se connecter</a>
<?php endif; ?>