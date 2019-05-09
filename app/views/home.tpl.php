<?php
// On crée une variable temporaire pour se simplifier l'écriture
$categories = $viewVars['categories'];
?>

  <section>
    <div class="container-fluid">
      <div class="row mx-0">

        <!-- block category top x2 -->
        <?php for($c = 0; $c <= 1; $c++):?>
        <div class="col-md-6">
          <div class="card border-0 text-white text-center"><img src="<?= $_SERVER['BASE_URI'];?>/<?php echo $categories[$c]->getPicture() ?>"
              alt="Card image" class="card-img">
            <div class="card-img-overlay d-flex align-items-center">
              <div class="w-100 py-3">
                <h2 class="display-3 font-weight-bold mb-4"><?php echo $categories[$c]->getName() ?></h2><a href="<?=$router->generate('category', ['id' => 1]); ?>" class="btn btn-light"><?php echo $categories[$c]->getSubtitle() ?></a>
              </div>
            </div>
          </div>
        </div>
        <?php endfor; ?>
        <!-- /block -->

      </div>

      <div class="row mx-0">
          
        <!-- block category bot x3 -->
        <?php for($c = 2; $c <= 4; $c++):?>
        <div class="col-lg-4">
          <div class="card border-0 text-center text-white"><img src="<?= $_SERVER['BASE_URI'];?>/<?php echo $categories[$c]->getPicture() ?>"
              alt="Card image" class="card-img">
            <div class="card-img-overlay d-flex align-items-center">
              <div class="w-100">
                <h2 class="display-4 mb-4"><?php echo $categories[$c]->getName() ?></h2><a href="<?=$router->generate('category', ['id' => $categories[$c]->getId()]); ?>" class="btn btn-link text-white"><?php echo $categories[$c]->getSubtitle(); ?>
                  <i class="fa-arrow-right fa ml-2"></i></a>
              </div>
            </div>
          </div>
        </div>
        <?php endfor; ?>
        <!-- /block -->


        
      </div>
    </div>
  </section>