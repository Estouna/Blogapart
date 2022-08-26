<?php

namespace App\Controllers;

use App\Models\ArticlesModel;

class ArticlesController extends Controller
{
    public function index()
    {

        $this->render('articles/index', []);
    }
    public function creer_article()
    {

        $this->render('articles/creer_article', []);
    }
}
