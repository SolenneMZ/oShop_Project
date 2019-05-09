<?php

/**
 * Gestion du panier
 * Cart => $products => via load() + save() = $_SESSION (DBData)
 */

class Cart {

    /**
     * @var array $products Liste de produits
     */
    private $products;

    public function __construct() {
        // on initialise notre liste de produits à vide
        $this->products = [];
        // charger les données depuis la session
        $this->load();
    }

    public function load() {
        if (array_key_exists('cart', $_SESSION)) {
            // charger le contenu du panier en session
            $this->products = $_SESSION['cart'];
        }
    }

    public function save() {
        // sauvegarder le contenu du panier en session
        $_SESSION['cart'] = $this->products; 
    }

    public function addProduct($productModel, $qty) {
        // PROBLÈME : Si le produit est déjà dans le panier, on ajoute la quantité
        // SOLUTION : Possible avec isset()
        if (array_key_exists($productModel['id'], $this->products)) {
            $this->products[$productModel['id']]['quantity'] += $quantity;
        } else {
            $this->products[$productModel['id']] = [
                'productModel' => $productModel,
                'quantity' => $qty,
            ];
        }
        // on sauvegarde notre nouveau produit/panier        
        $this->save();

    }

    public function deleteProduct($productID) {
        // supprimer un produit du panier
    }

    public function changeQty($productId, $newQty) {
        // modifier la quantité dans le panier pour un produit donné
    }

    public function getCartProducts() {
        // un Getter qui retourne la liste des produits dans le panier et leur quantité
        return $this->products;
    }

    public function getTotal() {
        // retourner le montant total du panier
    }
}