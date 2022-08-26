<?php

namespace App\Controllers;

use App\Models\CategoriesModel;

class CategoriesController extends Controller
{
    public function index()
    {

        $this->render('categories/index', []);
    }
}