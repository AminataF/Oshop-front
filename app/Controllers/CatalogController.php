<?php

namespace App\Controllers;

use App\Models\Brand;
use App\Models\Brands;
use App\Models\Category;
use App\Models\Product;

class CatalogController extends CoreController
{
    // Affichage des produits par catégorie
    public function category($params)
    {
        $categoryModel = new Category();
        $currentCategory = $categoryModel->find($params['id']);

        if (!$currentCategory) {
            $error = new ErrorController();
            $error->error404();
        }
        $productModels = new Product();
        $productsCategory = $productModels->findProduitByCategory($params['id']);

        $this->show('category', [
            'currentCategory' => $currentCategory,
            'productsCategory' => $productsCategory
        ]);
    }

    // Affichage des produits par type
    public function type($params)
    {
        $this->show('type', [
            'typeId' => $params['id'],
        ]);
    }

    // Affichage des produits par marque
    public function brand($params)
    {
        $brandTypes = new Brand();
        $brands = $brandTypes->findBrandByType($params['id']);

        $this->show('brand', [
            'brandId' => $params['id'],
            'brands' => $brands,

        ]);
    }

    // Affichage du détail d'un produit
    public function product($params)
    {
        
        $productModel = new Product();
        $product = $productModel->findByBrand($params['id']);
        
        if (!$product) {
            $error = new ErrorController();
            $error->error404();
        }

        $this->show('product', [
            'productId' => $params['id'],
            'product' => $product
        ]);
    }

}
