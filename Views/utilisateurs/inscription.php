<h1 class="h1 my-6">Inscription</h1>
    <!-- 
        -------------------------------------------------------- MESSAGES -------------------------------------------------------- 
    -->
    <?php if (!empty($_SESSION['erreur'])) : ?>
        <div class="alert my-2">
            <?php
            echo $_SESSION['erreur'];
            unset($_SESSION['erreur']);
            ?>
        </div>
    <?php endif; ?>
    <?php if (!empty($_SESSION['success'])) : ?>
        <div class="succes my-2">
            <?php
            echo $_SESSION['success'];
            unset($_SESSION['success']);
            ?>
        </div>
    <?php endif; ?>
<!-- 
    -------------------------------------------------------- FORMULAIRE D'INSCRIPTION -------------------------------------------------------- 
-->
<?= $inscriptionForm ?>

<div class="text-center">
    <a href="/utilisateurs/connexion">Déjà inscrit - Me connecter</a>
</div>