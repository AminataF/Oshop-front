# L'héritage

Bon à savoir :

- Une classe ne peut hériter que d'une autre classe
- La classe hérite de l'ensemble des propriétés et méthodes de la classe parente

## Exemple

```php
<?php
class CoreModel
{
    protected $id;
    // ...
}
```

Cette classe va pouvoir être étendue par autant de classes enfants que l'on souhaite :

```php
<?php

class Product extends CoreModel
{
    // J'ai accès à la propriété $id et je peux rajouter ce que je souhaite dans Product (ce qui est spécifique à cette classe)
}

class Category extends CoreModel
{
    // J'ai accès à la propriété $id et je peux rajouter ce que je souhaite dans Category (ce qui est spécifique à cette classe)
}
```
