<script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "Product",
  "name": "kissing",
  "image": "http://localhost/S05/S05-E04-atelier-oShop-GuillaumeBordeau/images/produits/1-kiss.jpg",
  "description": "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloru",
  "brand": {
    "@type": "Thing",
    "name": "BOOTstrap"
  },
  "review": {
    "@type": "Review",
    "reviewRating": {
      "@type": "Rating",
      "ratingValue": "4",
      "bestRating": "5"
    },
    "author": {
      "@type": "Person",
      "name": "Pépé zefrog"
    }
  },
  "offers": {
    "@type": "Offer",
    "url": "https://http://localhost/S05/S05-E04-atelier-oShop-GuillaumeBordeau/public/catalog/product/1",
    "priceCurrency": "EUR",
    "price": "40.00",
    "priceValidUntil": "2020-11-05",
    "itemCondition": "https://schema.org/UsedCondition",
    "availability": "https://schema.org/InStock",
    "seller": {
      "@type": "Organization",
      "name": "Oshop"
    }
  }
}
</script>

  <section class="hero">
    <div class="container">
      <!-- Breadcrumbs -->
      <ol class="breadcrumb justify-content-center">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Détente</li>
      </ol>
    </div>
  </section>

  <section class="products-grid">
    <div class="container-fluid">

      <!-- On balise notre produit depuis une balise englobante -->
      <div class="row">
        <!-- product-->
        <div class="col-lg-6 col-sm-12">
          <div class="product-image">
            <a href="detail.html" class="product-hover-overlay-link">
              <img src="<?php echo getAssetAbsoluteURL('images/produits/1-kiss.jpg'); ?>" alt="product" class="img-fluid">
            </a>
          </div>
        </div>
        <div class="col-lg-6 col-sm-12">
          <div class="mb-3">
            <h3 class="h3 text-uppercase mb-1" itemprop="name">Article #<?= $viewVars['id']?></h3>
            <div class="text-muted">by <em itemprop="brand">BOOTstrap</em></div>
            <div>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star-o"></i>
            </div>
          </div>
          <div class="my-2">
            <div class="text-muted"><span class="h4">40 €</span> TTC</div>
          </div>
          <div class="product-action-buttons">
            <form action="<?php echo $router->generate('add'); ?>" method="post">
                <input type="hidden" name="id" value="<?= $viewVars['id']?>">
                <input type="hidden" name="quantity" value="1">
                <button class="btn btn-dark btn-buy"><i class="fa fa-shopping-cart"></i><span class="btn-buy-label ml-2">Ajouter au panier</span></button>
            </form>
          </div>
          <div class="mt-5">
            <p>
              Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorum, consequuntur vel libero magni tempore rerum eos ipsum assumenda, velit architecto exercitationem animi dicta quis at facilis veritatis ut accusamus ipsa sequi recusandae officia similique tenetur? Nemo, repellat at dolore nobis non reprehenderit iusto, nostrum consectetur unde ab id quo quia eum rem veniam, ratione cum fuga autem odio perspiciatis minus reiciendis recusandae est. Earum praesentium minus quisquam et voluptates facere saepe, non velit tempore obcaecati! Porro esse sint blanditiis nulla in officiis aut dicta ipsum fugit ex enim, ab voluptas maxime culpa? Debitis, sequi minus cum, quos minima tempora eum quas repellat sunt incidunt delectus dolor eaque. Natus fugiat neque facere placeat corporis, commodi cum numquam vel exercitationem temporibus eum?
            </p>
          </div>
        </div>
        <!-- /product-->
      </div>
      <!-- /itemscope -->

    </div>
  </section>