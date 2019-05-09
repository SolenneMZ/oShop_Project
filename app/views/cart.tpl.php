<main>
    <h1>Panier</h1>
    <ul>
        <li>Produit 1

        <!-- Bouton de suppression -->
        <form action="<?php echo $router->generate('delete', ['id' => 1]); ?>" method="post">
            <button type="submit">Supprimer du Panier</button>
        </form>

        </li>
        <li>Produit 2</li>
        <li>...</li>
        <li>Produit n</li>
    </ul>
</main>