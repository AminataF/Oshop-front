<?php

namespace App\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Type;

class CoreController
{
    public function show($viewName, $viewData = [])
    {
        global $router;

        /**
         * Si j'ai $viewData = [
         *     'products' => [...],
         *     'id' => 8,
         * ], alors je vais obtenir 2 variables $products = [...] et $id = 8
         * (change mes paramêtre en variable)
         */
        extract($viewData);

        // $_SERVER['BASE_URI'] est récupéré grâce à notre .htaccess
        $baseURI = $_SERVER['BASE_URI'] ?? '';

        $brandModel = new Brand();
        // On aura accès à $brands dans tous nos templates
        $brands = $brandModel->findAll();

        $categoryModel = new Category();
        // On aura accès à $categories dans tous nos templates
        $categories = $categoryModel->findAll();

        $typeModel = new Type();
        // On aura accès à $categories dans tous nos templates
        $types = $typeModel->findAll();

        // $viewData est disponible dans chaque fichier de vue
        require_once __DIR__ . '/../views/header.tpl.php';
        require_once __DIR__ . '/../views/' . $viewName . '.tpl.php';
        require_once __DIR__ . '/../views/footer.tpl.php';
    }
}
