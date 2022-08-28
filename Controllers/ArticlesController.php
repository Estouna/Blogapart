<?php

namespace App\Controllers;

use App\Models\ArticlesModel;
use App\Core\Form;
use App\Models\CategoriesModel;

class ArticlesController extends Controller
{
    public function index()
    {

        $this->render('articles/index', []);
    }

    /* 
        -------------------------------------------------------- PUBLIER UNE ARTICLE --------------------------------------------------------
    */
    public function creer_article()
    {
        // Vérifie si la session contient les informations d'un utilisateur
        if (isset($_SESSION['user']) && !empty($_SESSION['user']['id'])) {
            
            $categoriesModel = new CategoriesModel;
            $categories = $categoriesModel->findAll();
            
            // Vérifie que les champs existent et ne sont pas vides
            if (Form::validate($_POST, ['article'], ['articleCategorie'])) {
                // Sécurise les données
                $article = Form::valid_donnees($_POST['article']);
                

                // On redirige avec un message
                $_SESSION['success'] = "Votre article a été enregistrée";
                header('Location: /utilisateurs/profil');
                exit;
            } else {
                // Message de session
                $_SESSION['erreur'] = !empty($_POST) ? 'Vous devez écrire votre article avant de valider' : '';
            }

            // Envoi à la vue  
        } else {
            header('Location: /users/login');
            exit;
        }
        $this->render('articles/creer_article', compact('categories'));
    

    }
}
