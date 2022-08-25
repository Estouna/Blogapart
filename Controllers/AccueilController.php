<?php

namespace App\Controllers;

class AccueilController extends Controller
{
   // Page d'accueil avec template home
   public function index()
   {
      $this->render('accueil/index', []);
   }
}