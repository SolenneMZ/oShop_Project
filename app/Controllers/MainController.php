<?php

/**
 * Classe va nous servir à gérer l'affichage de nos pages
 */

class MainController extends CoreController
{
    /**
     * Affiche la page d'accueil
     */
    public function home()
    {
        // On appele la méthode show avec la page correspondante
        $dbdata = new DBData();
        $categories = $dbdata->getHomeCategories();
        $this->show('home', [
            'title' => 'Dans les shoe',
            'categories' => $categories,
        ]);
    }

    public function legalNotice()
    {
        // Principe du $viewVars = tableau
        // qui contient les données à afficher
        $this->show('legal-notice', [
            'title' => 'Mentions légales',
        ]);
    }

    public function products()
    {
        $dbdata = new DBData();
        $products = $dbdata->getProducts();
        $this->show('products', [
            'title' => 'Dans les shoe',
            'products' => $products,
        ]);

    }

    /**
     * Utiisée pour l'affichage de la page 404
     */
    public function error404()
    {
        $this->show('error404', [
            'title' => 'Page non trouvée',
        ]);
    }



}