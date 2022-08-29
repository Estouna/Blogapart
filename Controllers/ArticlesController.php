<?php

namespace App\Controllers;

use App\Models\ArticlesModel;

class ArticlesController extends Controller
{
    public function index()
    {
        $articlesModel = new ArticlesModel;
        $articles = $articlesModel->findAll();
        $this->render('articles/index', compact('articles'));
    }

    /* 
        -------------------------------------------------------- LIRE UN ARTICLE --------------------------------------------------------
    */
    /**
     * Affiche une annonce
     * @param integer $id
     * @return void
     */
    public function lire(int $id)
    {
        // Instancie le modèle
        $articlesModel = new ArticlesModel;

        // Récupère une annonce par son id
        $lire_article = $articlesModel->find($id);

        // Envoi à la vue
        $this->render('articles/lire', compact('lire_article'));
    }
}
