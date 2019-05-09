<?php

// Chargement automatique des classes gérées avec Composer
require __DIR__ . '/../vendor/autoload.php';

/**
 * 1 seul point d'entrée (entonnoir)
 * => FrontController
 *
 * Route = récupérée depuis l'URL
 * et indique le chemin depuis le FrontController jusqu'au MainController
 * 1 URL = une requête (HTTP) = 1 demande
 * 1 Controller + 1 méthode = 1 réponse
 *
 * Proposition d'URLs pour nos pages
 * home : /
 * about : /about
 * store : /store
 * products: /products
 */

// On récupère la page présente dans le paramètre GET _url
// transmis par le .htaccess de Apache
// Sauf dans le cas où on est sur l'index
// dans ce cas l'URL vaut '/'

// En ternaire
// $currentUrl = isset($_GET['_url']) ? $_GET['_url'] : '/';

// En "normal"
if (isset($_GET['_url'])) {
    $currentUrl = $_GET['_url'];
} else {
    $currentUrl = '/';
}

// Dump la variable demandée
dump($currentUrl);
// OU Dump la variable demandée et termine script
// Dump & Die
dd($currentUrl);

// On inclus le fichier de contrôleur dont on a besoin
require_once '../app/Controllers/MainController.php';

// On doit instancier la classe MainController
// pour pouvoir l'utiliser
// On obtient en retour un objet
$controller = new MainController();

// On dispatch
// On enchaine une série de conditions
if ($currentUrl == '/legal-notice') {
    $controller->legalNotice();
} elseif ($currentUrl == '/') {
    // @TODO : gérer l'erreur sur /
    $controller->home();
} else {
    // 404
    // On indique au navigateur que le status code HTTP est 404
    // header('HTTP/1.1 404 Not Found');
    // ou
    http_response_code(404);
    // On peut utiliser notre contrôleur
    $controller->error404();
}
