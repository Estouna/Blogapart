<?php

namespace App\Controllers;

use App\Models\CategoriesModel;
use App\Models\ArticlesModel;

class CategoriesController extends Controller
{
    public function index()
    {
        $categoriesModel = new CategoriesModel;

        $categories = $categoriesModel->findAll();

        $this->render('categories/index', compact('categories'));
    }

    public function categorie(int $id)
    {
        $categoriesModel = new CategoriesModel;
        $categorie = $categoriesModel->findBy(['id' => $id]);

        $articlesModel = new ArticlesModel;
        $articles = $articlesModel->findBy(['id_categorie => $id']);

        $this->render('categories/categorie', compact('categorie', 'articles'));
    }
}