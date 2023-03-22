<?php

namespace App\Models;

// Modèle pour la table "brand"
class Brand extends CoreModel
{
    // On créé des propriétés du même nom que les champs de la table ciblée
    private $name;

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
     * Permet de récupérer toutes les entrées dans la table
     */
    public function findAll()
    {
        $pdo = Database::getPDO();
        $query = $pdo->query('SELECT * FROM brand');
        $brands = $query->fetchAll(\PDO::FETCH_CLASS, 'App\\Models\\Brand');

        return $brands;
    }

    /**
     * Permet de récupérer une entrée grâce à l'id en paramètre
     * Retourne false dans le cas où l'entrée n'a pas été trouvée
     */
    public function find($id)
    {
        $pdo = Database::getPDO();
        $query = $pdo->query('SELECT * FROM brand WHERE id = '.$id);
        // fetchObject() est comme fetch() excepté qu'on récupère non pas un tableau mais un objet de la classe indiquée en argument
        $brand = $query->fetchObject('App\\Models\\Brand');

        return $brand;
    }

    public function findBrandByType($brandTypeId)
    {
        $pdo = Database::getPDO();
        $query = $pdo->query('SELECT product.id, product.name, product.price, product.picture, type.name AS typeName
        FROM product
        JOIN type ON type.id = type_id
        WHERE brand_id = ' . $brandTypeId);
        // fetchObject() est comme fetch() excepté qu'on récupère non pas un tableau mais un objet de la classe indiquée en argument
        $product = $query->fetchObject('App\\Models\\Product');
        return $product;
    }




}
