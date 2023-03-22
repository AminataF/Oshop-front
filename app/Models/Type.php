<?php

namespace App\Models;

// Modèle pour la table "type"
class Type extends CoreModel
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
        $query = $pdo->query('SELECT * FROM type');
        $types = $query->fetchAll(\PDO::FETCH_CLASS, 'App\\Models\\Type');

        return $types;
    }

    /**
     * Permet de récupérer une entrée grâce à l'id en paramètre
     * Retourne false dans le cas où l'entrée n'a pas été trouvée
     */
    public function find($id)
    {
        $pdo = Database::getPDO();
        $query = $pdo->query('SELECT * FROM type WHERE id = '.$id);
        // fetchObject() est comme fetch() excepté qu'on récupère non pas un tableau mais un objet de la classe indiquée en argument
        $type = $query->fetchObject('App\\Models\\Type');

        return $type;
    }
}
