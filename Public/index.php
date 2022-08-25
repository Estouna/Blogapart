<?php

use App\Autoloader;
use App\Core\Accueil;

// Temps chargement en ms
define('DEBUG_TIME', microtime(true));

// Défini la constante contenant le dossier racine du projet
define('ROOT', dirname(__DIR__));


// Import de l'autoloader
require_once ROOT . '/Autoloader.php';
Autoloader::register();


// On instancie Main
$app = new Accueil();

// On démarre l'application
$app->start();