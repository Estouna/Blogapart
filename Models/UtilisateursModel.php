<?php

namespace App\Models;

class UtilisateursModel extends Model
{
    protected $id;
    protected $login;
    protected $password;
    protected $email;
    protected $id_droits;


    /* 
        -------------------------------------------------------- CONSTRUCTEUR --------------------------------------------------------
    */
    public function __construct()
    {
        $class = str_replace(__NAMESPACE__ . '\\', '', __CLASS__);
        $this->table = strtolower(str_replace('Model', '', $class));
    }

    /* 
        -------------------------------------------------------- METHODES --------------------------------------------------------
    */

    /* 
       ----------  TROUVER UN UTILISATEUR PAR SON EMAIL OU VERIFIER SI L'EMAIL EXISTE  ----------
    */
    /**
     * Récupère un utilisateur à partir de son email
     * @param string $email
     * @return mixed
     */
    public function findOneByEmail(string $email)
    {
        return $this->requete("SELECT * FROM {$this->table} WHERE email = ?", [$email])->fetch();
    }

    /* 
       ----------  VERIFIER SI LE LOGIN EXISTE DEJA DANS LA BDD ----------
    */
    /**
     * Vérifie si le login existe déjà dans la bdd
     * @param string $login
     * @return void
     */
    public function checkIfLoginAlreadyExist(string $login)
    {
        return $this->requete("SELECT login FROM {$this->table} WHERE login = ?", [$login])->fetch();
    }

    /* 
       ----------  SESSION UTILISATEUR  ----------
    */
    /**
     * Crée la session de l'utilisateur
     * @return void
     */
    public function setSession()
    {
        $_SESSION['user'] = [
            'id' => $this->id,
            'login' => $this->login,
            'email' => $this->email,
            'id_droits' => $this->id_droits
        ];
    }

    /* 
        -------------------------------------------------------- GETTERS/SETTERS --------------------------------------------------------
    */
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of login
     */ 
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set the value of login
     *
     * @return  self
     */ 
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of id_droits
     */ 
    public function getId_droits()
    {
        return $this->id_droits;
    }

    /**
     * Set the value of id_droits
     *
     * @return  self
     */ 
    public function setId_droits($id_droits)
    {
        $this->id_droits = $id_droits;

        return $this;
    }
}