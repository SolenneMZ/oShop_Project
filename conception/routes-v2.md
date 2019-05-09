# Routes V2, à compléter

| URL | Méthode HTTP | Controller | Méthode | Titre | Contenu | Commentaire |
|--|--|--|--|--|--|--|
| `/o-shop-admin/` | `GET` | `AdminController` | `dashboard` | Interface d'administration | Liste des 3 dernières commandes payées | Accès restreint |
| `/o-shop-admin/categories/` | `GET` | `AdminController` | `categories` | Liste des catégories | Liste de toutes les catégories en base de données | Accès restreint |
| `/o-shop-admin/categories/[id]` | `GET` | `AdminController` | `categorie` | Modification de la catégorie | Formulaire permettant de modifier la catégorie sélectionnées | Accès restreint - [id] = paramètre dynamique de l'URL contenant l'id de la catégorie en BDD |
| `/o-shop-admin/categories/[id]` | `POST` | `AdminController` | `categoriePost` | - | Gestion des valeurs du formulaire envoyé en POST + modification de la base de donnée + redirection vers la même page/route mais en `GET` | Accès restreint - [id] = paramètre dynamique de l'URL contenant l'id de la catégorie en BDD |