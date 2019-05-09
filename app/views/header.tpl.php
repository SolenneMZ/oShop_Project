<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?= $_SERVER['BASE_URI'];?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $_SERVER['BASE_URI'];?>/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= $_SERVER['BASE_URI'];?>/assets/css/styles.css">
    <title><?= $viewVars['title'] ?> - Dans les shoe</title>
</head>

<body>
    <header>
        <div class="top-bar">
            <div class="container-fluid">
                <div class="row d-flex align-items-center">
                    <div class="col-sm-7 d-none d-sm-block">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item pr-3 mr-0">
                                <i class="fa fa-phone"></i> 01 02 03 04 05
                            </li>
                            <li class="list-inline-item px-3 border-left d-none d-lg-inline-block">Livraison offerte à
                                partir de 100€</li>
                        </ul>
                    </div>
                    <div class="col-sm-5 d-flex justify-content-end">
                        <!-- Currency Dropdown-->
                        <div class="dropdown pl-3 ml-0">
                            <a id="currencyDropdown" class="dropdown-toggle topbar-link">EUR</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-sticky navbar-airy navbar-light">
            <div class="container-fluid">
                <!-- Navbar Header  -->
                <a href="<?=$router->generate('home'); ?>" class="navbar-brand">oShop</a>
                <button type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse"
                    aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i
                        class="fa fa-bars"></i></button>
                <!-- Navbar Collapse -->
                <div id="navbarCollapse" class="collapse navbar-collapse">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a href="<?=$router->generate('home'); ?>" class="nav-link active">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=$router->generate('products'); ?>" class="nav-link">Produits</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Boutique</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Marques</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Contact</a>
                        </li>
                    </ul>
                    <div class="d-flex align-items-center justify-content-between justify-content-lg-end mt-1 mb-2 my-lg-0">
                        <!-- Search Button-->
                        <div class="nav-item navbar-icon-link">
                            <a href="#" class="navbar-icon-link"><i class="fa fa-search"></i></a>
                        </div>
                        <!-- User Not Logged - link to login page-->
                        <div class="nav-item">
                            <a href="#" class="navbar-icon-link"><i class="fa fa-user"></i></a>
                        </div>
                        <!-- Cart Dropdown-->
                        <div class="nav-item dropdown">
                            <a href="#" class="navbar-icon-link d-lg-none">
                                <span class="badge badge-secondary">New</span>
                            </a>
                            <div class="d-none d-lg-block">
                                <a id="cartdetails" href="<?=$router->generate('cart')?>" class="navbar-icon-link">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span class="badge badge-secondary">2</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
        </nav>
    </header>