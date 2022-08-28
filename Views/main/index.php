<h1 class="h1 m-6">Accueil</h1>

    <!-- 
        -------------------------------------------------------- MESSAGES -------------------------------------------------------- 
    -->
    <?php if (!empty($_SESSION['erreur'])) : ?>
        <div class="alert mt-2">
            <?php
            echo $_SESSION['erreur'];
            unset($_SESSION['erreur']);
            ?>
        </div>
    <?php endif; ?>
    <?php if (!empty($_SESSION['success'])) : ?>
        <div class="succes mt-2">
            <?php
            echo $_SESSION['success'];
            unset($_SESSION['success']);
            ?>
        </div>
    <?php endif; ?>

<a class="my-1" href="/articles">Articles</a>
<a class="my-1" href="/utilisateurs/Profil">Profil</a>
<a class="my-1" href="/articles/creer_article">Publier</a>
<a class="my-1" href="/admin">Administration</a>
