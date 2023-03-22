<?php

// Front controller

// Autoload de Composer
require_once __DIR__.'/../vendor/autoload.php';

// spl_autoload_register(
//     // Appelée si l'entité n'est pas trouvée par l'interpréteur
//     function ($fqcn) { // Fully Qualified Class Name
//         $file = str_replace(['\\', 'App/'], ['/', 'app/'], $fqcn) . '.php';
//         /**
//          * Si $fqcn = 'App\\Controllers\\CatalogController'
//          * 1. Remplacement '\\' par '/' : 'App/Controllers/CatalogController'
//          * 2. Remplacement de 'App/' par 'app/' : 'app/Controllers/CatalogController'
//          * 3. Rajouter l'extension '.php' : 'app/Controllers/CatalogController.php'
//          */
//         require_once __DIR__.'/../'.$file;
//     }
// );

// Routeur

// $router = [
//     '/' => [ // On met en clé l'URI
//         'action' => 'home', // La méthode à exécuter
//         'controller' => 'MainController', // Le contrôleur à instancier
//     ],
//     '/catalogue/categorie/8' => [ // On met en clé l'URI
//         'action' => 'category', // La méthode à exécuter
//         'controller' => 'CatalogController', // Le contrôleur à instancier
//     ],
// ];

$router = new AltoRouter();

// $_SERVER['BASE_URI'] servira de base à toutes nos URIs (ex: /catalog deviendra /nazca/S05/oshop/public/catalog)
$router->setBasePath($_SERVER['BASE_URI'] ?? '');

// Page d'accueil

$router->map(
    'GET', // La méthode HTTP
    '/', // L'URI
    // L'action à exécuter
    [
        'controller' => 'MainController',
        'action' => 'home',
    ],
    'home', // Nom arbitraire de la route (utile pour la génération d'URL)
);

// Mentions légales

$router->map(
    'GET', // La méthode HTTP
    '/mentions-legales', // L'URI
    // L'action à exécuter
    [
        'controller' => 'MainController',
        'action' => 'legalMentions',
    ],
    'legal-mentions', // Nom arbitraire de la route (utile pour la génération d'URL)
);

// Page catégorie

$router->map(
    'GET', // La méthode HTTP
    '/catalogue/categorie/[i:id]', // L'URI avec un paramètre variable "id" qui devra être un entier (i pour integer)
    // L'action à exécuter
    [
        'controller' => 'CatalogController',
        'action' => 'category',
    ],
    'catalog-category', // Nom arbitraire de la route (utile pour la génération d'URL)
);

// Page type

$router->map(
    'GET', // La méthode HTTP
    '/catalogue/type/[i:id]', // L'URI avec un paramètre variable "id" qui devra être un entier (i pour integer)
    // L'action à exécuter
    [
        'controller' => 'CatalogController',
        'action' => 'type',
    ],
    'catalog-type', // Nom arbitraire de la route (utile pour la génération d'URL)
);

// Page marque

$router->map(
    'GET', // La méthode HTTP
    '/catalogue/marque/[i:id]', // L'URI avec un paramètre variable "id" qui devra être un entier (i pour integer)
    // L'action à exécuter
    [
        'controller' => 'CatalogController',
        'action' => 'brand',
    ],
    'catalog-brand', // Nom arbitraire de la route (utile pour la génération d'URL)
);

// Page produit (détails sur un produit)

$router->map(
    'GET', // La méthode HTTP
    '/catalogue/produit/[i:id]', // L'URI avec un paramètre variable "id" qui devra être un entier (i pour integer)
    // L'action à exécuter
    [
        'controller' => 'CatalogController',
        'action' => 'product',
    ],
    'catalog-product', // Nom arbitraire de la route (utile pour la génération d'URL)
);


// Dispatcher

// On regarde si la requête correspond à une route
$match = $router->match();

if ($match) {
    $controllerName = $match['target']['controller'];


    $controllerFQCN = 'App\\Controllers\\' . $controllerName;
    $controller = new $controllerFQCN();
    $method = $match['target']['action'];

    $controller->$method($match['params']); // $controller->store();
} else {
    $controller = new App\Controllers\ErrorController();
    $controller->error404();
}
