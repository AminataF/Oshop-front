<?php

namespace App\Models;

// Modèle pour la table "category"
class Category extends CoreModel
{
    // On créé des propriétés du même nom que les champs de la table ciblée
    private $name;
    private $subtitle;
    private $picture;
    private $home_order;

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get the value of subtitle
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * Set the value of subtitle
     */
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;
    }

    /**
     * Get the value of picture
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set the value of picture
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
    }

    /**
     * Get the value of home_order
     */
    public function getHomeOrder()
    {
        return $this->home_order;
    }

    /**
     * Set the value of home_order
     */
    public function setHomeOrder($home_order)
    {
        $this->home_order = $home_order;
    }

    /**
     * Permet de récupérer toutes les entrées dans la table
     */
    public function findAll()
    {
        $pdo = Database::getPDO();
        $query = $pdo->query('SELECT * FROM category');
        $categories = $query->fetchAll(\PDO::FETCH_CLASS, 'App\\Models\\Category');

        return $categories;
    }

    /**
     * Permet de récupérer une entrée grâce à l'id en paramètre
     * Retourne false dans le cas où l'entrée n'a pas été trouvée
     */
    public function find($id)
    {
        $pdo = Database::getPDO();
        $query = $pdo->query('SELECT * FROM category WHERE id = '.$id);
        // fetchObject() est comme fetch() excepté qu'on récupère non pas un tableau mais un objet de la classe indiquée en argument
        $category = $query->fetchObject('App\\Models\\Category');

        return $category;
    }
}
