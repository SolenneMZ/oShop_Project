<?php

class CartController
{
    public function cart()
    {
        $dbdata = new DBData();
        $brands = $dbdata->getFooterBrands();
        $types = $dbdata->getFooterProductTypes();
        $this->show('cart', [
            'title' => "cart",
            'brands' => $brands,
            'types' => $types,
            ]);
    }

    public function add()
    {
        global $router;
        echo 'Données reçues :';
        // $_POST contient les infos envoyées en POST via le form
        // On debug via dump & die
        dd($_POST);

        // Traitement du form (ajout en session ou BDD ou envoi mail de contact)
        // ...

        // On redirige vers une page, ici le panier
        // Ici pas de template car on redirige vers une autre page
        // header('Location: ' . $router->generate('cart'));
    }

    public function update()
    {
        
        $this->show('update', [
            'title' => "Mise a jour",
        ]);
    }

    public function delete($urlParams)
    {
        // On supprime l'id reçu via la route et $urlParams['id']
        dd('Suppression de l\'article ' . $urlParams['id']);
    }

    public function show($viewName, $viewVars=array())
    {
        global $router;
        // $viewVars est disponible dans chaque fichier de vue
        include('../app/views/header.tpl.php');
        include('../app/views/'.$viewName.'.tpl.php');
        include('../app/views/footer.tpl.php');
    }
}
