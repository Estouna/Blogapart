<?php

namespace App\Models;

class ArticlesModel extends Model
{
    protected $id;
    protected $article;
    protected $id_utilisateur;
    protected $id_categorie;
    protected $date;

    /* 
        -------------------------------------------------------- CONSTRUCTEUR --------------------------------------------------------
    */
    public function __construct()
    {
        $this->table = 'articles';
    }

    /* 
        -------------------------------------------------------- METHODES --------------------------------------------------------
    */
    /**
     * Récupère les 3 articles les plus récents
     * @return void
     */
    public function findLastThreeArticles()
    {
        return $this->requete("SELECT * FROM {$this->table} ORDER BY date DESC LIMIT 0,3")->fetchAll();
    }

    /**
     * Compte et retourne le nombre d'articles dans la table articles
     * @return void
     */
    public function find_nbArticles()
    {
        return $this->requete("SELECT COUNT(*) AS nb_articles FROM {$this->table}")->fetchAll();
    }

    /**
     * Undocumented function
     *
     * @param integer $id
     * @return void
     */
    public function find_FirstArticlesPerStart(int $currentStart)
    {
        // Détermine le nombre max d'articles par page
        $parStart = 5;
        /* Calcul du premier article de la page c'est-à-dire : 
        page actuelle * nombre d'article par page - nombre d'article par page = premier article 
        Exemples avec une limite de 5 articles par page [(1*5)-5 = 0] de 0 jusqu'à 5, [(2*5)-5 = 5] de 5 jusqu'à 10, [(3*5)-5 = 10] de 10 jusqu'à 15, etc.*/
        $premierArticle = ($currentStart * $parStart) - $parStart;

        return $this->requete("SELECT * FROM {$this->table} ORDER BY `id` DESC LIMIT $premierArticle, $parStart")->fetchAll();
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
     * Get the value of article
     */
    public function getArticle()
    {
        return $this->article;
    }

    /**
     * Set the value of article
     *
     * @return  self
     */
    public function setArticle($article)
    {
        $this->article = $article;

        return $this;
    }

    /**
     * Get the value of id_utilisateur
     */
    public function getId_utilisateur()
    {
        return $this->id_utilisateur;
    }

    /**
     * Set the value of id_utilisateur
     *
     * @return  self
     */
    public function setId_utilisateur($id_utilisateur)
    {
        $this->id_utilisateur = $id_utilisateur;

        return $this;
    }

    /**
     * Get the value of id_categorie
     */
    public function getId_categorie()
    {
        return $this->id_categorie;
    }

    /**
     * Set the value of id_categorie
     *
     * @return  self
     */
    public function setId_categorie($id_categorie)
    {
        $this->id_categorie = $id_categorie;

        return $this;
    }

    /**
     * Get the value of date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }
}
