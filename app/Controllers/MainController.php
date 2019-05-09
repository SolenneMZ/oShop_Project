<?php

/**
 * Classe va nous servir à gérer l'affichage de nos pages
 */

class MainController
{
    /**
     * Affiche la page d'accueil
     */
    public function home()
    {
        // On appele la méthode show avec la page correspondante
        $dbdata = new DBData();
        $categories = $dbdata->getHomeCategories();
        $types = $dbdata->getFooterProductTypes();
        $this->show('home', [
            'title' => 'Dans les shoe',
            'categories' => $categories,
            'types' => $types,
        ]);
    }

    public function legalNotice()
    {
        // Principe du $viewVars = tableau
        // qui contient les données à afficher
        $dbdata = new DBData();
        $types = $dbdata->getFooterProductTypes();
        $this->show('legal-notice', [
            'title' => 'Mentions légales',
            'types' => $types,
        ]);
    }

    public function products()
    {
        $dbdata = new DBData();
        $products = $dbdata->getProducts();
        $types = $dbdata->getFooterProductTypes();
        $this->show('products', [
            'title' => 'Dans les shoe',
            'products' => $products,
            'types' => $types,
        ]);

    }

    /**
     * Utiisée pour l'affichage de la page 404
     */
    public function error404()
    {
        $dbdata = new DBData();
        $types = $dbdata->getFooterProductTypes();
        $this->show('error404', [
            'title' => 'Page non trouvée',
            'types' => $types,
        ]);
    }

    /**
     * Cette méthode factorise le bout de code qui était présent
     * dans les point d'éntrées précédents (index.php, about.php)
     * Il suffit de transmettre le nom du template
     * du fichier à inclure
     */
    public function show($viewName, $viewVars = array()) {
        // C'est sale mais pas trop le choix à ce stade
        global $router;

        // Les marques du footer se trouvent dans show() car elles doivent être affichées dans toutes les pages
        $dbdata = new DBData();
        $footerBrands = $dbdata->getFooterBrands();

        // $viewVars est disponible dans chaque fichier de vue
        include(__DIR__.'/../views/header.tpl.php');
        include(__DIR__.'/../views/'.$viewName.'.tpl.php');
        include(__DIR__.'/../views/footer.tpl.php');
    }

}