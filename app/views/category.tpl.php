  <section class="hero">
    <div class="container">
      <!-- Breadcrumbs -->
      <ol class="breadcrumb justify-content-center">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Categorie #<?= $viewVars['id']?></li>
      </ol>
      <!-- Hero Content-->
      <div class="hero-content pb-5 text-center">
        <h1 class="hero-heading">Categorie #<?= $viewVars['id']?></h1>
        <div class="row">
          <div class="col-xl-8 offset-xl-2">
            <p class="lead text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
              incididunt.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="products-grid">
    <div class="container-fluid">

      <header class="product-grid-header d-flex align-items-center justify-content-between">
        <div class="mr-3 mb-3">
          Affichage <strong>1-12 </strong>de <strong>158 </strong>résultats
        </div>
        <div class="mr-3 mb-3"><span class="mr-2">Voir</span><a href="#" class="product-grid-header-show active">12 </a><a
            href="#" class="product-grid-header-show ">24 </a><a href="#" class="product-grid-header-show ">Tout </a>
        </div>
        <div class="mb-3 d-flex align-items-center"><span class="d-inline-block mr-1">Trier par</span>
          <select class="custom-select w-auto border-0">
            <option value="orderby_0">Defaut</option>
            <option value="orderby_1">Popularité</option>
            <option value="orderby_2">Vote</option>
            <option value="orderby_3">Nouveauté</option>
          </select>
        </div>
      </header>
      <div class="row">


        <!-- CE PREMIER PRODUIT EST LA VERSION DYNAMIQUE -->
        <!-- product -->
        <div class="product col-xl-3 col-lg-4 col-sm-6">
          <div class="product-image">
            <a href="<?=$router->generate('product', ['id' => 1]); ?>" class="product-hover-overlay-link">
              <img src="<?= $_SERVER['BASE_URI'];?>/assets/images/produits/1-kiss_tn.jpg" alt="product" class="img-fluid">
            </a>
          </div>
          <div class="product-action-buttons">
            <!-- Boutin du formulaire prend le style CSS du lien intégré -->
            <form action="<?php echo $router->generate('add'); ?>" method="post">
                <input type="hidden" name="id" value="1">
                <input type="hidden" name="quantity" value="1">
                <button type="submit" class="btn btn-outline-dark btn-product-left"><i class="fa fa-shopping-cart"></i></button>
            </form>

            <a href="<?=$router->generate('product', ['id' => 1]); ?>" class="btn btn-dark btn-buy"><i class="fa-search fa"></i><span class="btn-buy-label ml-2">Voir</span></a>
          </div>
          <div class="py-2">
            <p class="text-muted text-sm mb-1">Chausson</p>
            <h3 class="h6 text-uppercase mb-1"><a href="<?=$router->generate('product', ['id' => 1]); ?>" class="text-dark">Kissing</a></h3><span class="text-muted">40€</span>
          </div>
        </div>
        <!-- /product -->
        <!-- /CE PREMIER PRODUIT EST LA VERSION DYNAMIQUE -->



        <!-- product-->
        <div class="product col-xl-3 col-lg-4 col-sm-6">
            <div class="product-image">
              <a href="detail.html" class="product-hover-overlay-link">
                <img src="<?= $_SERVER['BASE_URI']; ?>/assets/images/produits/2-rose_tn.jpg" alt="product" class="img-fluid">
              </a>
            </div>
            <div class="product-action-buttons">
              <a href="#" class="btn btn-outline-dark btn-product-left"><i class="fa fa-shopping-cart"></i></a>
              <a href="detail.html" class="btn btn-dark btn-buy"><i class="fa-search fa"></i><span class="btn-buy-label ml-2">Voir</span></a>
            </div>
            <div class="py-2">
              <p class="text-muted text-sm mb-1">Tong</p>
              <h3 class="h6 text-uppercase mb-1"><a href="detail.html" class="text-dark">Pink lady</a></h3><span class="text-muted">20€</span>
            </div>
          </div>
          <!-- /product-->
          <!-- product-->
        <div class="product col-xl-3 col-lg-4 col-sm-6">
            <div class="product-image">
              <a href="detail.html" class="product-hover-overlay-link">
                <img src="<?= $_SERVER['BASE_URI'];?>/assets/images/produits/3-panda_tn.jpg" alt="product" class="img-fluid">
              </a>
            </div>
            <div class="product-action-buttons">
              <a href="#" class="btn btn-outline-dark btn-product-left"><i class="fa fa-shopping-cart"></i></a>
              <a href="detail.html" class="btn btn-dark btn-buy"><i class="fa-search fa"></i><span class="btn-buy-label ml-2">Voir</span></a>
            </div>
            <div class="py-2">
              <p class="text-muted text-sm mb-1">Chausson</p>
              <h3 class="h6 text-uppercase mb-1"><a href="detail.html" class="text-dark">Panda</a></h3><span class="text-muted">50€</span>
            </div>
          </div>
          <!-- /product-->
          <!-- product-->
        <div class="product col-xl-3 col-lg-4 col-sm-6">
            <div class="product-image">
              <a href="detail.html" class="product-hover-overlay-link">
                <img src="<?= $_SERVER['BASE_URI'];?>/assets/images/produits/20-deadpool.jpg" alt="product" class="img-fluid">
              </a>
            </div>
            <div class="product-action-buttons">
              <a href="#" class="btn btn-outline-dark btn-product-left"><i class="fa fa-shopping-cart"></i></a>
              <a href="detail.html" class="btn btn-dark btn-buy"><i class="fa-search fa"></i><span class="btn-buy-label ml-2">Voir</span></a>
            </div>
            <div class="py-2">
              <p class="text-muted text-sm mb-1">Pantoufle</p>
              <h3 class="h6 text-uppercase mb-1"><a href="detail.html" class="text-dark">Deadpool</a></h3><span class="text-muted">15€</span>
            </div>
          </div>
          <!-- /product-->

      </div>
      
    </div>
  </section>
