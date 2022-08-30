<?php

use App\Models\CategoriesModel;

$categoriesModel = new CategoriesModel;
$nav_categories = $categoriesModel->findAll();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/stylesAll.css">
    <link rel="stylesheet" href="/css/blocs.css">
    <link rel="stylesheet" href="/css/btnLinkInput.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <title>Blogapart</title>
</head>

<body>

    <header class="header flex justify-content-end align-items-center">
        <div class="ml-4 py-2">
            <a class="logo ft-5" href="/">BLOG<span class="spanLogo">A</span>PART</a>
        </div>
        <nav id="mainNav" class="nav w-100 flex justify-content-end align-items-center">
            <div class="nav-block1">
                <ul class="nav-ul flex centerAll">
                    <li class="nav-li mx-6 my-1">

                        <select class="select-style py-2" onChange="window.location=this.options[this.selectedIndex].value;">
                            <option value="" class="titleSelect" selected><?= isset($cat->nom) ? $cat->nom : 'Catégories';?></option>
                            <?php foreach ($nav_categories as $cat) : ?>
                                <option value="/categories/categorie/<?= $cat->id ?>"><?= $cat->nom ?></option>
                            <?php endforeach; ?>
                            <option value="/articles">Tous les articles</option>
                        </select>

                    </li>
                    <li class="nav-li mx-5 my-1"><a class="nav-a py-2" href="/">Accueil</a></li>

                    <?php if (isset($_SESSION['user']) && !empty($_SESSION['user']['id'])) : ?>

                        <li class="nav-li mx-5 my-1"><a class="nav-a py-2" href="/utilisateurs/profil">Profil</a></li>

                        <?php if (isset($_SESSION['user']['id_droits']) && $_SESSION['user']['id_droits'] === 1337 || $_SESSION['user']['id_droits'] === 42) : ?>
                            <li class="nav-li mx-5 my-1"><a class="nav-a py-2" href="/admin">Admin</a></li>
                        <?php endif; ?>

                        <li class="nav-li mx-5 my-1"><a class="nav-a py-2" href="/utilisateurs/deconnexion">Déconnexion</a></li>
                        
                    <?php else : ?>
                        <li class="nav-li mx-5 my-1"><a class="nav-a py-2" href="/utilisateurs/connexion">Connexion</a></li>
                        <li class="nav-li mx-5 my-1"><a class="nav-a py-2" href="/utilisateurs/inscription">Inscription</a></li>
                    <?php endif; ?>

                </ul>
            </div>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    </header>


    <main class="container column align-items-center min-vh-100">