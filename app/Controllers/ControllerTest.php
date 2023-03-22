<?php

class Abcd{

    // public function jeSaisPasEncore($method, $params, $ClassName){
        
    //     $productModel = new $ClassName();
    //     $products = $productModel->findAll();

    //     $this->show($method, [
    //         'id' => $params['id'],
    //         'products' => $products,
    //     ]);
    // }
    // $controller->jeSaisPasEncore($method, $routerMatch['params'], ucfirst($method))


    // cette fonction va intégret dans chaque page les requires necessaire
    public function show($viewName, $viewData = [])
    {
        global $router;
        global $routerMatch;

        // SI $_SERVER['BASE_URI'] n'éxiste pas (?? : null coalescing ) alors je met une chaine vide 
        $baseUri = $_SERVER['BASE_URI'] ?? '';

        $brandModel = new Brand();
        // On aura accès à $brands dans tous nos templates
        $brands = $brandModel->findAll();

        // $viewData est disponible dans chaque fichier de vue
        require_once __DIR__ . '/../views/header.tpl.php';
        require_once __DIR__ . '/../views/' . $viewName . '.tpl.php';
        require_once __DIR__ . '/../views/footer.tpl.php';
    }
    
}
