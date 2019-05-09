  <section class="hero">
    <div class="container">
      <!-- Breadcrumbs -->
      <ol class="breadcrumb justify-content-center">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active"><?= $viewVars['product']['category_name']?></li>
      </ol>
    </div>
  </section>

  <section class="products-grid">
    <div class="container-fluid">
      <!-- On balise notre produit depuis une balise englobante -->
      <div class="row" itemscope itemtype="http://schema.org/Product">
        <div class="row">
          <!-- product-->
          <div class="col-lg-6 col-sm-12">
            <div class="product-image">
              <a href="<?php echo $router->generate('product', ['id' => $viewVars['product']['id']]); ?>" class="product-hover-overlay-link">
                <img src="<?= $_SERVER['BASE_URI'];?>/<?= $viewVars['product']['picture']?>" alt="<?= $viewVars['product']['name']?>" class="img-fluid" itemprop="image">
              </a>
            </div>
          </div>
          <div class="col-lg-6 col-sm-12">
            <div class="mb-3">
              <h3 class="h3 text-uppercase mb-1" itemprop="name"><?= $viewVars['product']['name']?></h3>
              <div class="text-muted">by <em itemprop="brand"><?= $viewVars['product']['brand_name']?></em></div>
              <div itemprop="aggregateRating" content="http://schema.org/aggregateRating" itemscope content="<?= $viewVars['product']['rate']?>">
                <meta itemprop="reviewCount" content="10" />
                <meta itemprop="ratingValue" content="<?= $viewVars['product']['rate']?>" />
              <?php for ($i=0; $i < $viewVars['product']['rate']; $i++) : ?>
                <i class="fa fa-star"></i>
              <?php endfor; ?>
              <?php while ($i < 5) {
                echo '<i class="fa fa-star-o"></i>';
                $i++; }
              ?>
              </div>
            </div>
            <div class="my-2" itemprop="offers" content="http://schema.org/Offer">
              <meta itemprop="availability" content="http://schema.org/InStock"> 
              <meta itemprop="priceCurrency" cotent="EUR">             
              <div class="text-muted"><span class="h4" itemprop="price" content="<?= $viewVars['product']['price']?>"><?= $viewVars['product']['price']?> €</span> TTC</div>
            </div>
            <div class="product-action-buttons">

              <form action="<?php echo $router->generate('add'); ?>" method="post">
                  <input type="hidden" name="id" value="<?= $viewVars['id']?>">
                  <input type="hidden" name="quantity" value="1">
                  <button class="btn btn-dark btn-buy"><i class="fa fa-shopping-cart"></i><span class="btn-buy-label ml-2">Ajouter au panier</span></button>
              </form>

            </div>
          
            <div class="mt-5">
              <p itemprop="description">
              <?= $viewVars['product']['description']?>
              </p>
            </div>
          </div>
          <!-- /product-->
        </div>
      <!-- /itemscope -->
      </div>
    </div>
  </section>