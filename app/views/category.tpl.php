<section class="hero">
    <div class="container">
      <!-- Breadcrumbs -->
      <ol class="breadcrumb justify-content-center">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active"><?= $category->getName() ?></li>
      </ol>
      <!-- Hero Content-->
      <div class="hero-content pb-5 text-center">
        <h1 class="hero-heading"><?= $category->getName() ?></h1>
        <div class="row">
          <div class="col-xl-8 offset-xl-2">
            <p class="lead text-muted"><?= $category->getSubtitle() ?></p>
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
        <?php foreach ($products as $product): ?>
        <!-- product -->
        <div class="product col-xl-3 col-lg-4 col-sm-6">
          <div class="product-image">
            <a href="<?= $router->generate('product', ['id' => $product['id']]); ?>" class="product-hover-overlay-link">
              <img src="<?= $_SERVER['BASE_URI'];?>/<?= $product['picture'] ?>" alt="<?= $product['name'] ?>" class="img-fluid">
            </a>
          </div>
          <div class="product-action-buttons">
            <!-- Boutin du formulaire prend le style CSS du lien intégré -->
            <form action="<?php echo $router->generate('add'); ?>" method="post">
                <input type="hidden" name="id" value="<?= $product['id'] ?>">
                <input type="hidden" name="quantity" value="1">
                <button type="submit" class="btn btn-outline-dark btn-product-left"><i class="fa fa-shopping-cart"></i></button>
            </form>

            <a href="<?=$router->generate('product', ['id' => $product['id']]); ?>" class="btn btn-dark btn-buy"><i class="fa-search fa"></i><span class="btn-buy-label ml-2">Voir</span></a>
          </div>
          <div class="py-2">
            <p class="text-muted text-sm mb-1"><?= $product['type_name'] ?></p>
            <h3 class="h6 text-uppercase mb-1"><a href="<?=$router->generate('product', ['id' => $product['id']]); ?>" class="text-dark"><?= $product['name'] ?></a></h3><span class="text-muted"><?= $product['price'] ?>&euro;</span>
          </div>
        </div>
        <!-- /product -->
        <?php endforeach; ?>
        <!-- /CE PREMIER PRODUIT EST LA VERSION DYNAMIQUE -->



      </div>
      
    </div>
  </section>
