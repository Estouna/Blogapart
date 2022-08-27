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
            <a class="logo ft-2" href="/">BLOG<span class="spanLogo">A</span>PART</a>
        </div>
        <nav id="mainNav" class="nav w-100 flex justify-content-end align-items-center">
            <div class="nav-block1">
                <ul class="nav-ul flex centerAll">
                    <li class="nav-li mx-6 my-2">
                        <div class="select-style">
                            <select class="py-2" onChange="window.location=this.options[this.selectedIndex].value;">
                                <option class="titleSelect">CATEGORIES</option>
                                <option value="/categories">CATEGORIE 1</option>
                                <option value="/categories">CATEGORIE 2</option>
                                <option value="/categories">CATEGORIE 3</option>
                                <option value="/categories">CATEGORIE 4</option>
                            </select>
                        </div>
                    </li>
                    <li class="nav-li mx-6 my-1"><a class="nav-a py-2" href="/">ACCUEIL</a></li>

                    <?php if (isset($_SESSION['user']) && !empty($_SESSION['user']['id'])) : ?>

                        <li class="nav-li mx-6 my-1"><a class="nav-a py-2" href="/utilisateurs/deconnexion">DECONNEXION</a></li>
                        <li class="nav-li mx-6 my-1"><a class="nav-a py-2" href="/utilisateurs/profil">PROFIL</a></li>

                        <?php if (isset($_SESSION['user']['id_droits']) && $_SESSION['user']['id_droits'] === 1337) : ?>
                            <li class="nav-li mx-6 my-1"><a class="nav-a py-2" href="/admin">ADMIN</a></li>
                        <?php endif; ?>

                    <?php else : ?>
                        <li class="nav-li mx-6 my-1"><a class="nav-a py-2" href="/utilisateurs/connexion">CONNEXION</a></li>
                        <li class="nav-li mx-6 my-1"><a class="nav-a py-2" href="/utilisateurs/inscription">INSCRIPTION</a></li>
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

    <main class="container column align-items-center h-100">