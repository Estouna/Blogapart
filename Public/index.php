<?php

use App\Autoloader;
use App\Core\Main;

// Défini la constante contenant le dossier racine du projet
define('ROOT', dirname(__DIR__));


// Import de l'autoloader
require_once ROOT . '/Autoloader.php';
Autoloader::register();


// On instancie Main
$app = new Main();

// On démarre l'application
$app->start();