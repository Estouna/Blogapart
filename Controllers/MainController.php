<?php

namespace App\Controllers;

use App\Models\ArticlesModel;

class MainController extends Controller
{
   // Page d'accueil avec template home
   public function index()
   {
      $articlesModel = new ArticlesModel;
      $trois_dernierArticles = $articlesModel->findLastThreeArticles();
      $this->render('main/index', compact('trois_dernierArticles'));
   }
}