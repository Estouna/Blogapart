<?php

namespace App\Controllers;

use App\Models\ArticlesModel;
use App\Core\Form;
use App\Models\CommentairesModel;
use App\Models\CategoriesModel;

class ArticlesController extends Controller
{
    public function index($id)
    {
        $categoriesModel = new CategoriesModel;
        $categories = $categoriesModel->findAll();

        /*
            PAGINATION
        */
        // Détermine la page actuelle
        $currentStart = $id;

        if($currentStart == null) {
            header('Location: /articles/index/1' );
        }
        
        $articlesModel = new ArticlesModel;

        // Récupère le nombre d'articles dans la table articles
        $resultat = $articlesModel->find_nbArticles();
        $nbArticles = $resultat[0]->nb_articles;
        // Détermine le nombre d'articles par page
        $parStart = 5;
        // Calcule le nombre de pages total en arrondissant au nombre supérieur
        $starts = ceil($nbArticles / $parStart);
        // Calcul du 1er article de la page c'est-à-dire : [(1*5)-5 = 0] de 0 jusqu'à 5, [(2*5)-5 = 5] de 5 jusqu'à 10, [(3*5)-5 = 10] de 10 jusqu'à 15, etc.
        $articles = $articlesModel->find_FirstArticlesPerStart($currentStart);

        $this->render('articles/index', compact('articles', 'categories', 'currentStart', 'starts'));
    }

    /* 
        -------------------------------------------------------- LIRE UN ARTICLE --------------------------------------------------------
    */
    /**
     * Affiche un article
     * @param integer $id
     * @return void
     */
    public function lire(int $id)
    {
        $articlesModel = new ArticlesModel;
        // Récupère un article par son id
        $lire_article = $articlesModel->find($id);

        if (isset($_POST['validatePost'])) {
            // Vérifie si le formulaire est valide
            if (Form::validate($_POST, ['commentaire'])) {
                // Sécurise les données
                $commentaire = nl2br(form::valid_donnees($_POST['commentaire']));

                $post = new CommentairesModel;
                // Hydrate le commentaire
                $post->setCommentaire($commentaire)
                    ->setId_article($id)
                    ->setId_utilisateur($_SESSION['user']['id']);

                // Enregistre l'article dans la bdd
                $post->create();
                // Redirige avec un message
                $_SESSION['success'] = "Votre commentaire a été enregistrée";
                header("Location: /articles/lire/$id");
                exit;
            } else {
                $_SESSION['erreur'] = !empty($_POST) ? 'Vous devez écrire votre commentaire avant de valider' : '';
            }
        }


        $form = new Form;
        // Formulaire
        $form->debutForm('post', '#', ['class' => 'post-form column centerAll mt-5 mb-6'])
            ->ajoutLabelFor('commentaire', 'Poster votre commentaire sur l\'article ici :', ['class' => 'ft-4 mt-2'])
            ->ajoutTextarea('commentaire', '', ['class' => 'post-textarea min-vh-25 w-95 p-1 my-2', 'id' => 'commentaire', 'required' => 'true'])
            ->debutDiv(['class' => 'text-center mt-3'])
            ->ajoutBouton('Poster', ['type' => 'submit', 'name' => 'validatePost', 'class' => 'mb-5'])
            ->finDiv()
            ->finForm();

        // Envoi à la vue
        $this->render('articles/lire', ['lire_article' => $lire_article, 'commentaireForm' => $form->create()]);
    }
}
