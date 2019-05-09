<?php

class CatalogController
{
    /**
     * Affiche la page catégorie
     */
    public function category($urlParams)
    {
        // On va chercher les produits de la catégorie demandée
        // en BDD
        // ...

        // On appele la méthode show avec la page correspondante
        $this->show('category', [
            'title' => 'Titre de la catégorie',
            'id' => $urlParams['id'],
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
        $this->show('product', [
            'title' => "Titre product",
            'id' => $urlParams['id'],
        ]);
    }

    /**
     * Cette méthode factorise le bout de code qui était présent
     * dans les point d'éntrées précédents (index.php, about.php)
     * Il suffit de transmettre le nom du template
     * du fichier à inclure
     */
    public function show($viewName, $viewVars = array())
    {
        // C'est sale mais pas trop le choix à ce stade
        global $router;


        // Les marques du footer se trouvent dans show() car elles doivent être affichées dans toutes les pages
        $dbdata = new DBData();
        $footerBrands = $dbdata->getFooterBrands();
        $footerTypes = $dbdata->getFooterProductTypes();

        // $viewVars est disponible dans chaque fichier de vue
        include(__DIR__.'/../views/header.tpl.php');
        include(__DIR__.'/../views/'.$viewName.'.tpl.php');
        include(__DIR__.'/../views/footer.tpl.php');
    }
}
