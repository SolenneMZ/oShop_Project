<?php 
$dbdata = new DBData();
$products = $dbdata->getProducts();
?>

<section class="hero">
    <div class="container">
      <!-- Breadcrumbs -->
      <ol class="breadcrumb justify-content-center">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Nos produits</li>
      </ol>
      <!-- Hero Content-->
      <div class="hero-content pb-5 text-center">
        <h1 class="hero-heading">Nos produits</h1>
        <div class="row">
          <div class="col-xl-8 offset-xl-2">
            <p class="lead text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
              incididunt.</p>
          </div>
        </div>
      </div>
    </div>
</section>

<div class="row">
<?php  foreach ($products as $currentId=>$currentProduct) : ?>
        <div class="product col-xl-3 col-lg-4 col-sm-6">
          <div class="product-image">
            <a href="<?=$router->generate('product', ['id' => $currentId]); ?>" class="product-hover-overlay-link">
              <img src="<?= $_SERVER['BASE_URI'];?>/<?= $currentProduct->getPicture() ?>" alt="product" class="img-fluid">
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
            <p class="text-muted text-sm mb-1"><?= $currentProduct->getBrand_id() ?></p>
            <h3 class="h6 text-uppercase mb-1"><a href="<?=$router->generate('product', ['id' => $currentProduct->getBrand_id()]); ?>" class="text-dark"><?= $currentProduct->getName() ?></a></h3><span class="text-muted"><?= $currentProduct->getPrice() ?> €</span>
          </div>
        </div>
    <?php endforeach; ?>
</div>