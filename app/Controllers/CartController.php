<?php

class CartController extends CoreController
{
    public function cart()
    {
        // On va lire les produits depuis la classe Cart
        $cart = new Cart();
        $items = $cart->getCartProducts();

        $this->show('cart', [
            'title' => 'cart',
            'items' => $items,
        ]);
    }

    public function add() {
        // 1. récupération du produit selon l'id donné via POST
        $dbdata = new DBData();
        $productModel = $dbdata->getProductDetails($_POST['id']);

        // 2. récupération de la quantité
        $qty = $_POST['quantity'];

        // 3. ajout au panier
        $cart = new Cart();
        $cart->addProduct($productModel, $qty);


        // 4. redirection vers la page
        header('Location: ' . $this->router->generate('cart'));

        // $_POST contient les infos envoyées en POST via le form

        // Traitement du form (ajout en session ou BDD ou envoi mail de contact)
        // ...
        // $cart->addProduct();

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

}
