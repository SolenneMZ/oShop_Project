<?php

class CatalogController extends CoreController
{
    /**
     * Affiche la page catégorie
     */
    public function category($urlParams)
    {
        // On va chercher les produits de la catégorie demandée
        $dbdata = new DBData();
        $products = $dbdata->getProductsFromCategory($urlParams['id']);
        // Infos de la catégorie
        $category = $dbdata->getCategoryDetails($urlParams['id']);

        // On appele la méthode show avec la page correspondante
        $this->show('category', [
            'title' => 'Titre de la catégorie',
            'id' => $urlParams['id'],
            'products' => $products,
            'category' => $category,
        ]);
    }

    public function type($urlParams)
    {
        // On va chercher les produits du type demandée
        // ...

        $this->show('category', [
            'title' => "Titre type",
            'id' => $urlParams['id'],
        ]);
    }

    public function product($urlParams)
    {
        $dbdata = new DBData();
        // on va chercher le produit dont l'id est dans le tableau de paramètres d'URL
        $product = $dbdata->getProductDetails($urlParams['id']);        
        $this->show('product', [
            'title' => "Titre product",
            'id' => $urlParams['id'],
            'product' => $product,
        ]);
    }

}
