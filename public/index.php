<?php

// Chargement automatique des classes gérées avec Composer
require __DIR__ . '/../vendor/autoload.php';

// Chargement de nos fonctions utilisateur
// require __DIR__ . '/../app/include/functions.php';

// Chargement de la classe DBData
require __DIR__.'/../app/Utils/DBData.php';

// Chargement des Model
require __DIR__.'/../app/Model/CoreModel.php';
require __DIR__.'/../app/Model/Brand.php';
require __DIR__.'/../app/Model/Product.php';
require __DIR__.'/../app/Model/Category.php';
require __DIR__.'/../app/Model/Type.php';

// Test DBData
// $dbdata = new DBData();
// $dbdata->getHomeCategories();

// On require nos contrôleurs
require __DIR__ . '/../app/Controllers/MainController.php';
require __DIR__ . '/../app/Controllers/CatalogController.php';
require __DIR__ .'/../app/Controllers/CartController.php';

// On utiliser AltoRouter
$router = new AltoRouter();
// On défini le chemin jusqu'à notre sous-dossier
// Ce chemin nous est fourni par .htaccess via $_SERVER['BASE_URI']
$router->setBasePath($_SERVER['BASE_URI']);

// On map nos routes
// Paramètre 1 : Méthode HTTP (GET, POST, etc)
// 2 : URL / Path / Route à configurer qui sera demandée par le client
// 3 : cible de l'URL si match
// 4 : nom de la route (routing inverse)
$router->map('GET', '/', 'MainController#home', 'home');
$router->map('GET', '/legal-notice', 'MainController#legalNotice', 'legal-notice');
$router->map('GET', '/products', 'MainController#products', 'products');

// Route avec paramètre
$router->map('GET', '/catalog/category/[i:id]', 'CatalogController#category', 'category');
$router->map('GET', '/catalog/type/[i:id]', 'CatalogController#type', 'type');
$router->map('GET', '/catalog/product/[i:id]', 'CatalogController#product', 'product');
$router->map('GET', '/cart', 'CartController#cart', 'cart');
$router->map('POST', '/cart/add', 'CartController#add', 'add');
$router->map('POST', '/cart/update', 'CartController#update', 'update');
$router->map('POST', '/cart/remove/[i:id]', 'CartController#delete', 'delete');

// On voit si ça match (correspond)
// => on demande à AltoRouter de comparer la route demandé dans l'URL
// avec celles qui sont configurées ci-dessus
$match = $router->match();

// dump($match);

// Est-ce que ça match (si différent de false)
if ($match !== false) {
    // Ca match => On dispatch
    $dispatchInfos = $match['target'];
    // dump($dispatchInfos);
    // $dispatchInfos contient par ex. "MainController#home"
    // on va extraire de la chaine retournée
    // cf : explode : https://www.php.net/manual/en/function.explode.php
    $controllerAndMethod = explode('#', $dispatchInfos);
    // dump($controllerAndMethod);

    // le nom du contrôleur (à l'index 0)
    $controllerName = $controllerAndMethod[0];
    // dump($controllerName);

    // le nom de la méthode (à l'index 1)
    $methodName = $controllerAndMethod[1];
    // dump($methodName);

    // Appelons notre contrôleur et notre méthode dynamiquement
    // $controller = new "MainController"();
    // car $controllerName vaut "MainController"
    $controller = new $controllerName(); // Merci PHP :)
    // On va appler la méthode de la même manière
    // idem ici $methodName vaut "home"
    // $controller->"home"();
    $controller->$methodName($match['params']); // Appel dynamique
    // Ici on transmet le tableau de paramètres fourni par AltoRouter $match['params']
    // à la méthode que l'on appelle sur le contrôleur trouvé
    // $controller->category([
    //     'id' => 2
    // ])

} else {
    // 404
    http_response_code(404);
    // On appelle la 404 qui est dans MainController
    $controller = new MainController();
    $controller->error404();
}

// $product = new Product();
// $product->setName('iPhone');
// $product->setPrice(1200);
// Chaînage :
// $product->setName('iPhone')->setPrice(1200)->setPicture();