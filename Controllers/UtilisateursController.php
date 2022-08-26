<?php

namespace App\Controllers;

use App\Core\Form;
use App\Models\UtilisateursModel;


class UtilisateursController extends Controller
{
    /* 
        -------------------------------------------------------- PAGE CONNEXION --------------------------------------------------------
    */
    public function connexion()
    {
        $this->render('utilisateurs/connexion', []);
    }

    /* 
        -------------------------------------------------------- PAGE INSCRIPTION --------------------------------------------------------
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
                if ($loginlength > 0 && $loginlength <= 20){

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
            ->ajoutLabelFor('email', 'E-mail :', ['class' => 'text-primary'])
            ->ajoutInput('email', 'email', ['class' => 'my-2 input-title', 'id' => 'email', 'required' => 'true'])
            ->ajoutLabelFor('pass', 'Mot de passe :')
            ->ajoutInput('password', 'password', ['class' => 'my-2 input-title', 'id' => 'pass', 'required' => 'true'])
            ->debutDiv(['class' => 'text-center mt-3'])
            ->ajoutBouton('M\'inscrire', ['type' => 'submit', 'name' => 'validateReg', 'class' => 'my-4'])
            ->finDiv()
            ->finForm();

        $this->render('utilisateurs/inscription', ['inscriptionForm' => $form->create()]);
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
