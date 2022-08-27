<?php
include_once 'includes/header.php';
?>

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
    
    <!-- Le buffer transféré par le contrôleur principal (ob_start(), ob_get_clean()) -->
    <?= $content ?>



<?php include_once 'includes/footer.php'; ?>