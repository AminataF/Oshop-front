

  <section class="products-grid">
    <div class="container-fluid">

      <div class="row">
        <!-- product-->
        <div class="col-lg-6 col-sm-12">
          <div class="product-image">
            <a href="detail.html" class="product-hover-overlay-link">
              <img src="<?= $baseURI ?>/<?=$product->getPicture() ?>" alt="product" class="img-fluid">
            </a>
          </div>
        </div>
        <div class="col-lg-6 col-sm-12">
          <div class="mb-3">
        <!-- le paramêtre $viewData['productId'] est changer un variable $productId grâce a la function extract contenu dans Show-->
            <h3 class="h3 text-uppercase mb-1"><?=$product->getName() ?></h3>
            <div class="text-muted">by <em><?= $product->brandName  ?></em></div>
            
            <div>
              <?php for($i = 0; $i < 5; $i++) :?>
                <?php if ($i < intval($product->getRate())) : ?>
                  <?= "<i class='fa fa-star'></i>" ?>
                <?php else :?>
                  <?= "<i class='fa fa-star-o'></i>" ?>
                <?php endif; ?>
              <?php endfor ?>
            </div>
          </div>
          <div class="my-2">
              
            <div class="text-muted"><span class="h4"><?=$product->getPrice() ?>  €</span> TTC</div>
          </div>
          <div class="product-action-buttons">
            <form action="cart.html" method="post">
              <input type="hidden" name="product_id" value="1">
              <button class="btn btn-dark btn-buy"><i class="fa fa-shopping-cart"></i><span class="btn-buy-label ml-2">Ajouter au panier</span></button>
            </form>
          </div>
          <div class="mt-5">
            <p><?=$product->getDEscription() ?></p>
          </div>
        </div>
        <!-- /product-->
      </div>

    </div>
  </section>
