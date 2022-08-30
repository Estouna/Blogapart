<?php

namespace App\Controllers;

use App\Models\ArticlesModel;
use App\Core\Form;
use App\Models\CommentairesModel;

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
