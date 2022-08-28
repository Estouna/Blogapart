<?php

namespace App\Models;

class CategoriesModel extends Model
{
    protected $id;
    protected $nom;

    public function __construct()
    {
        $this->table = 'categories';
    }

    /* 
       ----------  TROUVER L'ID DE LA CATEGORIE PARENTE (pour articles) ----------
    */
    public function findId_cat(int $id)
    {
        return $this->requete("SELECT id FROM {$this->table} WHERE id = $id")->fetch();
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
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }
}