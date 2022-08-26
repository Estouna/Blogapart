<?php
include_once 'includes/header.php';
?>

<main class="container column align-items-center vh-100">

    <!-- 
        -------------------------------------------------------- MESSAGES -------------------------------------------------------- 
    -->
    <?php if (!empty($_SESSION['erreur'])) : ?>
        <div class="alert">
            <?php
            echo $_SESSION['erreur'];
            unset($_SESSION['erreur']);
            ?>
        </div>
    <?php endif; ?>
    <?php if (!empty($_SESSION['success'])) : ?>
        <div class="succes">
            <?php
            echo $_SESSION['success'];
            unset($_SESSION['success']);
            ?>
        </div>
    <?php endif; ?>
    
    <!-- Le buffer transféré par le contrôleur principal (ob_start(), ob_get_clean()) -->
    <?= $content ?>

</main>

<?php include_once 'includes/footer.php'; ?>