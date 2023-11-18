<?php

namespace App\Controllers;

use App\Models\CategoriesModel;
use App\Models\ArticlesModel;
use App\Core\Form;

class AdminController extends Controller
{
    public function index()
    {
        if ($this->isAdminOrModer()) {
            $this->render('admin/index', []);
        }
    }

    /* 
        -------------------------------------------------------- PUBLIER UNE ARTICLE --------------------------------------------------------
    */
    public function creer_article()
    {
        if ($this->isAdminOrModer()) {

            $categoriesModel = new CategoriesModel;
            $categories = $categoriesModel->findAll();

            // Vérifie que les champs existent et ne sont pas vides
            if (Form::validate($_POST, ['article'], ['articleCategorie'])) {

                $article = nl2br(Form::valid_donnees($_POST['article']));
                $categorie_parente = $_POST['articleCategorie'];
                // Vérifie qu'une catégorie a bien été sélectionnée
                if (isset($categorie_parente) && !empty($categorie_parente)) {
                    // Sécurise les données
                    // Instancie le modèle des articles
                    $new_article = new ArticlesModel;

                    // Hydrate l'article
                    $new_article->setArticle($article)
                        ->setId_utilisateur($_SESSION['user']['id'])
                        ->setId_categorie($categorie_parente);

                    // Enregistre l'article dans la bdd
                    $new_article->create();
                    // Redirige avec un message
                    $_SESSION['success'] = "Votre article a été enregistrée";
                    header('Location: /admin');
                    exit;
                } else {
                    $_SESSION['erreur'] = !empty($_POST) ? 'Vous devez choisir une catégorie avant de valider' : '';
                }
            } else {
                $_SESSION['erreur'] = !empty($_POST) ? 'Vous devez écrire votre article avant de valider' : '';
            }
            $this->render('admin/creer_article', compact('categories'));
        }
    }

    /**
     * Méthode qui vérifie si on est administrateur
     * @return boolean
     */
    private function isAdmin()
    {
        // Vérifie si l'utilisateur est connecté et que son id_droits est celle de l'admin
        if (isset($_SESSION['user']['id_droits']) && $_SESSION['user']['id_droits'] === 1337) {
            // Si admin
            return true;
        } else {
            // Si pas admin
            $_SESSION['erreur'] = "Vous n'avez pas accès à cette zone";
            header('Location: /utilisateurs/connexion');
            exit;
        }
    }

    /**
     * Méthode qui vérifie si on est administrateur ou modérateur
     * @return boolean
     */
    private function isAdminOrModer()
    {
        // Vérifie si l'utilisateur est connecté et que son id_droits est celle de l'admin
        if (isset($_SESSION['user']['id_droits']) && $_SESSION['user']['id_droits'] === 1337 || $_SESSION['user']['id_droits'] === 42) {
            // Si admin
            return true;
        } else {
            // Si pas admin
            $_SESSION['erreur'] = "Vous n'avez pas accès à cette zone";
            header('Location: /utilisateurs/connexion');
            exit;
        }
    }
}
