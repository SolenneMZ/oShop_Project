<?php

/**
 * Notre contrôleur de base
 */

class CoreController
{
    /**
     * Cette méthode factorise le bout de code qui était présent
     * dans les point d'éntrées précédents (index.php, about.php)
     * Il suffit de transmettre le nom du template
     * du fichier à inclure
     */
    public function show($viewName, $viewVars = array()) {
        // C'est sale mais pas trop le choix à ce stade
        global $router;
        
        // Le top serait que toutes les clés du tableau $viewVars
        // soient accessible directement par le nom de la clé
        // ex. : $categories = $viewVars['categories'], $id = $viewVars['id']


        // Marques du footer
        // Se trouvent dans show() car doivent être affichées
        // sur toutes les pages
        $dbdata = new DBData();
        // $footerBrands est utilisable directement dans les vues
        $footerBrands = $dbdata->getFooterBrands();
        // idem pour $footerTypes
        $footerTypes = $dbdata->getFooterProductTypes();

        // $viewVars est disponible dans chaque fichier de vue
        include(__DIR__.'/../views/header.tpl.php');
        include(__DIR__.'/../views/'.$viewName.'.tpl.php');
        include(__DIR__.'/../views/footer.tpl.php');
    }
}