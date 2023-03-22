<?php

namespace App\Models;

// Modèle pour la table "product"
class Product extends CoreModel
{
    // On créé des propriétés du même nom que les champs de la table ciblée
    private $name;
    private $description;
    private $picture;
    private $price;
    private $rate;
    private $status;
    private $brand_id; /**je dois créee une function avec une requete pour recupere le nom de la */
    private $category_id;
    private $type_id;
    private $typeName;

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
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     */
    public function setDescription($description)
    {
        $this->description = $description;
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
     * Get the value of price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * Get the value of rate
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Set the value of rate
     */
    public function setRate($rate)
    {
        $this->rate = $rate;
    }

    /**
     * Get the value of status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Get the value of brand_id
     */
    public function getBrandId()
    {
        return $this->brand_id;
    }

    /**
     * Set the value of brand_id
     */
    public function setBrandId($brand_id)
    {
        $this->brand_id = $brand_id;
    }

    /**
     * Get the value of category_id
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * Set the value of category_id
     */
    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
    }

    /**
     * Get the value of type_id
     */
    public function getTypeId()
    {
        return $this->type_id;
    }

    /**
     * Set the value of type_id
     */
    public function setTypeId($type_id)
    {
        $this->type_id = $type_id;
    }


    /**
     * Get the value of typeName
     */
    public function getTypeName()
    {
        return $this->typeName;
    }

    
    /**
     * Permet de récupérer toutes les entrées dans la table
     */
    public function findAll()
    {
        $pdo = Database::getPDO();
        $query = $pdo->query('SELECT * FROM product');
        $products = $query->fetchAll(\PDO::FETCH_CLASS, 'App\\Models\\Product');

        return $products;
    }

    /**
     * Permet de récupérer une entrée grâce à l'id en paramètre
     * Retourne false dans le cas où l'entrée n'a pas été trouvée
     */
    public function find($id)
    {
        $pdo = Database::getPDO();
        $query = $pdo->query('SELECT * FROM product WHERE id = '.$id);
        // fetchObject() est comme fetch() excepté qu'on récupère non pas un tableau mais un objet de la classe indiquée en argument
        $product = $query->fetchObject('App\\Models\\Product');

        return $product;
    }

    public function findByBrand($productId)
    {
        $pdo = Database::getPDO();
        $query = $pdo->query('SELECT product.name, product.description, product.price, product.picture, product.rate, brand.name AS brandName, category.name AS categoryName
                                FROM product
                                JOIN brand ON brand.id = brand_id
                                JOIN category ON category.id = category_id
                                WHERE product.id = ' .$productId);
        // fetchObject() est comme fetch() excepté qu'on récupère non pas un tableau mais un objet de la classe indiquée en argument
        $product = $query->fetchObject('App\\Models\\Product');
        return $product;
    }

    public function findProduitByCategory($brandCategoryId)
    {
        $pdo = Database::getPDO();
        $query = $pdo->query('
        SELECT product.id, product.name, product.price, product.picture, type.name AS typeName
        FROM product
        JOIN type ON type.id = type_id
        WHERE category_id = '. $brandCategoryId
        );
        // fetchObject() est comme fetch() excepté qu'on récupère non pas un tableau mais un objet de la classe indiquée en argument
        $product = $query->fetchObject('App\\Models\\Product');
        return $product;
    }

    
}
