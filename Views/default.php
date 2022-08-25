<?php
include_once 'includes/header.php';
?>

<main class="container flex centerAll">

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
        <div class="alert-success">
            <?php
            echo $_SESSION['success'];
            unset($_SESSION['success']);
            ?>
        </div>
    <?php endif; ?>

    <?= $content ?>

    </main>

<?php include_once 'includes/footer.php'; ?>