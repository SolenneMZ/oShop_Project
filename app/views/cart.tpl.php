<section class="hero">
      <div class="container">
        <!-- Breadcrumbs -->
        <ol class="breadcrumb justify-content-center">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Panier</li>
        </ol>
        <!-- Hero Content-->
        <div class="hero-content pb-5 text-center">
          <h1 class="hero-heading">Panier</h1>
          <div class="row">   
            <div class="col-xl-8 offset-xl-2"><p class="lead text-muted">Vous avez 2 produits dans votre panier</p></div>
          </div>
        </div>
      </div>
    </section>
  <section>
      <div class="container">
        <div class="row mb-5"> 
          <div class="col-lg-8">
            <div class="cart">
              <div class="cart-wrapper">
                <div class="cart-header text-center">
                  <div class="row">
                    <div class="col-5">Produit</div>
                    <div class="col-2">Prix</div>
                    <div class="col-2">Quantité</div>
                    <div class="col-2">Total</div>
                    <div class="col-1"></div>
                  </div>
                </div>
                <div class="cart-body">

                  <?php foreach ($items as $item) : ?>
                  <!-- Product-->
                  <div class="cart-item">
                    <div class="row d-flex align-items-center text-center">
                      <div class="col-5">
                        <div class="d-flex align-items-center"><a href="detail.html"><img src="<?= $_SERVER['BASE_URI'];?>/<?= $item['productModel']['picture'] ?>" alt="..." class="cart-item-img"></a>
                          <div class="cart-title text-left">
                            <a href="detail.html" class="text-uppercase text-dark"><strong><?= $item['productModel']['name'] ?></strong></a><br>
                            <span class="text-muted text-sm">Taille : Large</span><br>
                            <span class="text-muted text-sm">Couleur : Jaune</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-2"><?= $item['productModel']['price'] ?>€</div>
                      <div class="col-2">
                        <div class="d-flex align-items-center">
                          <div class="btn btn-items btn-items-decrease">-</div>
                          <input value="<?= $item['quantity'] ?>" class="form-control text-center input-items" type="text">
                          <div class="btn btn-items btn-items-increase">+</div>
                        </div>
                      </div>
                      <div class="col-2 text-center">260€</div>
                      <div class="col-1 text-center">
                        <form action="<?php echo $router->generate('delete', ['id' => $item['productModel']['id']]); ?>" method="post"> <button type="submit"><i class="fa fa-times"></i></button>                        
                      </div>
                    </div>
                  </div>
                  <!-- /Product -->
                  <?php endforeach; ?>

                </div>
              </div>
            </div>
            <div class="my-5 d-flex justify-content-between flex-column flex-lg-row"><a href="<?=$router->generate('category')?>" class="btn btn-link text-muted"><i class="fa fa-chevron-left"></i> Continuer les achats</a><a href="checkout1.html" class="btn btn-dark">Commander <i class="fa fa-chevron-right"></i></a></div>
          </div>

          <div class="col-lg-4 bg-light p-4">
            <div class="block mb-5">
              <div class="block-header pb-3">
                <h6 class="text-uppercase mb-0 font-weight-bold ">Récapitulatif</h6>
              </div>
              <div class="block-body pb-3">
                <p class="text-sm">Le coût de livraison est calculé en fonction des produits choisis</p>
                <ul class="order-summary mb-0 list-unstyled">
                  <li class="order-summary-item"><span>Sous total</span><span class="float-right">390€</span></li>
                  <li class="order-summary-item"><span>Livraison</span><span class="float-right">10€</span></li>
                  <li class="order-summary-item"><span>TVA</span><span class="float-right">0€</span></li>
                  <li class="order-summary-item border-0"><span>Total</span><strong class="order-summary-total float-right">400€</strong></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>