
  <section> 
   <div class="row">
        <!-- product-->
        <?php foreach($categoriesProducts as $categorieProduct) :?>
          <?= dd($categorieProduct)?>
        <div class="product col-xl-3 col-lg-4 col-sm-6">
          <div class="product-image">
            <a href="product.html" class="product-hover-overlay-link">
              <img src="<?= $baseURI ?>/<?= $categorieProduct->getPicture();  ?>" alt="product" class="img-fluid">
            </a>
          </div>
          <div class="product-action-buttons">
            <a href="#" class="btn btn-outline-dark btn-product-left"><i class="fa fa-shopping-cart"></i></a>
            <a href="product.html" class="btn btn-dark btn-buy"><i class="fa-search fa"></i><span class="btn-buy-label ml-2">Voir</span></a>
          </div>
          <div class="py-2">
            <p class="text-muted text-sm mb-1">Chausson</p>
            <h3 class="h6 text-uppercase mb-1"><a href="<?= $router->generate('catalog-product', [ 'id'=> $product->getId()]) ?>" class="text-dark"><?= $baseURI ?>/<?= $categorieProduct->getName();  ?></a></h3><span class="text-muted">40€</span>
          </div>
        </div>
        <?php endforeach; ?>
        <!-- /product-->
</section>
