<?php

namespace App\Controllers;

use App\Models\CategoriesModel;

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

        $this->render('categories/categorie', compact('categorie'));
    }
}