<?php

namespace App\Models;

/**
 * Cette classe doit être héritée par tous nos modèles pour que ceux-ci puissent profiter de ses propriétés / méthodes
 */
class CoreModel
{
    // En visibilité protégée, les propriétés et les méthodes sont accessibles depuis les classes enfants
    protected $id;
    protected $created_at;
    protected $updated_at;

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of created_at
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Get the value of updated_at
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }
}
