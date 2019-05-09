<main>
<h1>Type #<?= $viewVars['id']?></h1>
<ul>
<li><a href="<?=$router->generate('product', ['id'=>1])?>">Article 1</a>
<!-- a href="URL" correspond à action="URL" -->
    <form action="<?php echo $router->generate('add'); ?>" method="post">
        <input type="hidden" name="id" value="1">
        <label for="quantity">Quantité</label>
        <input type="number" name="quantity" value="1" id="quantity">
        <button type="submit">Ajouter au Panier</button>
    </form>
    </li>
<li><a href="<?=$router->generate('product', ['id'=>2])?>">Article 2</a>
<!-- a href="URL" correspond à action="URL" -->
    <form action="<?php echo $router->generate('add'); ?>" method="post">
        <input type="hidden" name="id" value="2">
        <label for="quantity">Quantité</label>
        <input type="number" name="quantity" value="1" id="quantity">
        <button type="submit">Ajouter au Panier</button>
    </form>
</li>
</ul>
</main>