<?php

namespace App\Controllers;

class AdminController extends Controller
{
    public function index()
    {
        if ($this->isAdmin()) {
            $this->render('admin/index', []);
        }
    }

        /**
     * Méthode qui vérifie si on est administrateur
     * @return boolean
     */
    private function isAdmin()
    {
        // Vérifie si l'utilisateur est connecté et que son id_droits est celle de l'admin
        if (isset($_SESSION['user']['id_droits']) && in_array('1337', $_SESSION['user']['id_droits'])) {
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