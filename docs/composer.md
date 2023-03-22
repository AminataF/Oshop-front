# Composer

## Installation des dépendances

Pour installer des dépendances à partir du fichier composer.lock (ou à défaut composer.json) :
`composer install`
`composer i`

On pense bien à ajouter le dossier `vendor` à notre fichier `.gitignore` pour ne pas le versionner !

## Ajout d'une dépendance

`composer require vendor/package`
Par exemple : `composer require symfony/var-dumper`

Pour utiliser les dépendances dans nos fichiers PHP, on oublie pas d'ajouter l'autoloader à notre front controller :

```php
require_once __DIR__ . '/../vendor/autoload.php';
```

## Mise à jour des dépendances

`composer update vendor/package` ou `composer update` pour mettre toutes les dépendances à jour.

## Suppression de dépendances

`composer remove vendor/package`
Par exemple : `composer remove symfony/var-dumper`

## Liens utiles

[Composer](https://getcomposer.org/) : Site officiel du gestionnaire de dépendances
[Packagist](https://packagist.org/) : Dépôt officiel des dépendances de Composer.
