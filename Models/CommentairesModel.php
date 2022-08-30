<?php

namespace App\Models;

class CommentairesModel extends Model
{
    protected $id;
    protected $commentaire;
    protected $id_article;
    protected $id_utilisateur;
    protected $date;

    /* 
        -------------------------------------------------------- CONSTRUCTEUR --------------------------------------------------------
    */
    public function __construct()
    {
        $this->table = 'commentaires';
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
     * Get the value of commentaire
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Set the value of commentaire
     *
     * @return  self
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get the value of id_article
     */
    public function getId_article()
    {
        return $this->id_article;
    }

    /**
     * Set the value of id_article
     *
     * @return  self
     */
    public function setId_article($id_article)
    {
        $this->id_article = $id_article;

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
