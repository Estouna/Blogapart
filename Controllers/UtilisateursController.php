<?php

namespace App\Controllers;

use App\Core\Form;
use App\Models\UtilisateursModel;


class UtilisateursController extends Controller
{

    /* 
    -------------------------------------------------------- PAGE CONNEXION --------------------------------------------------------
    */
    /**
     * Connexion des utilisateurs
     * @return void
     */
    public function connexion()
    {
        if (isset($_POST['validateLog'])) {

            if (Form::validate($_POST, ['email', 'password'])) {
                // Récupère l'utilisateur par son email
                $userModel = new UtilisateursModel;
                $userArray = $userModel->findOneByEmail(htmlspecialchars($_POST['email']));

                // Si l'utilisateur n'existe pas
                if (!$userArray) {
                    // http_response_code(404);
                    $_SESSION['erreur'] = 'L\'adresse email et/ou le mot de passe est incorrect';
                    header('Location: /utilisateurs/connexion');
                    exit;
                }

                // S'il existe hydrate l'objet
                $user = $userModel->hydrate($userArray);

                // Vérifie le mot de passe
                if (password_verify($_POST['password'], $user->getPassword())) {
                    // Si bon mot de passe, création la session
                    $user->setSession();

                    // Si admin redirige vers admin
                    if (isset($_SESSION['user']['id_droits']) && $_SESSION['user']['id_droits'] === 1337) {
                        header('Location: /admin');
                        exit;
                    }

                    // Redirige vers la page profil
                    header('Location: /utilisateurs/profil');
                    exit;
                } else {
                    // Si mauvais mot de passe
                    $_SESSION['erreur'] = 'L\'adresse email et/ou le mot de passe est incorrect';
                    header('Location: /utilisateurs/connexion');
                    exit;
                }
            } else {
                // Message de session et rechargement de la page
                $_SESSION['erreur'] = !empty($_POST) ? 'Tous les champs doivent être remplis' : '';
                header('Location: /utilisateurs/connexion');
                exit;
            }
        }


        $form = new Form;

        $form->debutForm('post', '#', ['class' => 'column'])
            ->ajoutLabelFor('email', 'E-mail :')
            ->ajoutInput('email', 'email', ['class' => 'my-2 input-title', 'id' => 'email', 'required' => 'true'])
            ->ajoutLabelFor('password', 'Mot de passe :', ['class' => 'mt-5'])
            ->ajoutInput('password', 'password', ['class' => 'my-2 input-title', 'id' => 'pass', 'required' => 'true'])
            ->debutDiv(['class' => 'text-center mt-3'])
            ->ajoutBouton('Me connecter', ['type' => 'submit', 'name' => 'validateLog', 'class' => 'my-5'])
            ->finDiv()
            ->finForm();

        // Envoi le formulaire à la vue
        $this->render('utilisateurs/connexion', ['connexionForm' => $form->create()]);
    }

    /* 
        -------------------------------------------------------- PAGE INSCRIPTION --------------------------------------------------------
    */
    /**
     * Inscription des utilisateurs
     * @return void
     */
    public function inscription()
    {

        if (isset($_POST['validateReg'])) {
            // Vérifie si le formulaire est valide
            if (Form::validate($_POST, ['login', 'email', 'password'])) {

                $user = new UtilisateursModel;

                $login = Form::valid_donnees($_POST['login']);
                $email = htmlspecialchars($_POST['email']);

                $loginlength = strlen($login);
                if ($loginlength > 0 && $loginlength <= 20) {

                    $verif_login = $user->checkIfLoginAlreadyExist($login);
                    if ($verif_login) {
                        $_SESSION['erreur'] = 'Ce login existe déjà';
                        header('Location: /utilisateurs/inscription');
                        exit;
                    }

                    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                        $verif_email = $user->findOneByEmail($email);
                        if ($verif_email) {
                            // http_response_code(404);
                            $_SESSION['erreur'] = 'Cet email existe déjà';
                            header('Location: /utilisateurs/inscription');
                            exit;
                        }

                        // Hash le mot de passe (ARGON2I à partir de PHP 7.2)
                        $pass = password_hash($_POST['password'], PASSWORD_ARGON2I);

                        // Hydrate l'utilisateur
                        $user->setLogin($login)
                            ->setEmail($email)
                            ->setPassword($pass)
                            ->setId_droits(1);
                        // Enregistre l'utilisateur dans la bdd
                        $user->create();

                        // On redirige avec un message
                        $_SESSION['success'] = "Merci et bienvenue";
                        header('Location: /');
                        exit;
                    } else {
                        $_SESSION['erreur'] = "Votre adresse email n'est pas valide";
                    }
                } else {
                    $_SESSION['erreur'] = "Votre login doit contenir entre 1 et 20 caractères";
                }
            } else {
                $_SESSION['erreur'] = !empty($_POST) ? 'Tous les champs doivent être remplis' : '';
                header('Location: /utilisateurs/inscription');
                exit;
            }
        }


        $form = new Form;

        // Formulaire
        $form->debutForm('post', '#', ['class' => 'column'])
            ->ajoutLabelFor('login', 'Login :')
            ->ajoutInput('text', 'login', ['class' => 'my-2 input-title', 'id' => 'login', 'required' => 'true'])
            ->ajoutLabelFor('email', 'E-mail :', ['class' => 'mt-5'])
            ->ajoutInput('email', 'email', ['class' => 'my-2 input-title', 'id' => 'email', 'required' => 'true'])
            ->ajoutLabelFor('pass', 'Mot de passe :', ['class' => 'mt-5'])
            ->ajoutInput('password', 'password', ['class' => 'my-2 input-title', 'id' => 'pass', 'required' => 'true'])
            ->debutDiv(['class' => 'text-center mt-3'])
            ->ajoutBouton('M\'inscrire', ['type' => 'submit', 'name' => 'validateReg', 'class' => 'my-5'])
            ->finDiv()
            ->finForm();

        $this->render('utilisateurs/inscription', ['inscriptionForm' => $form->create()]);
    }

    /* 
        -------------------------------------------------------- DECONNEXION --------------------------------------------------------
    */

    /**
     * Déconnexion de l'utilisateur
     * @return exit
     */
    public function deconnexion()
    {
        unset($_SESSION['user']);
        header('Location: /utilisateurs/connexion');
        exit;
    }

    /* 
        -------------------------------------------------------- PAGE PROFIL --------------------------------------------------------
    */
    public function profil()
    {
        if ($this->isUser()) {

            $this->render('utilisateurs/profil', []);
        }
    }

    /* 
    -------------------------------------------------------- VERIFIE SI L'UTILISATEUR EST CONNECTE ET QU'IL A UN ID--------------------------------------------------------
    */
    private function isUser()
    {
        if (isset($_SESSION['user']) && !empty($_SESSION['user']['id'])) {
            return true;
        } else {
            $_SESSION['erreur'] = "Vous n'avez pas accès à cette zone";
            header('Location: /utilisateurs/connexion');
            exit;
        }
    }
}
