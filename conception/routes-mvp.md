# Routes

| URL | Méthode HTTP | Controller | Méthode | Titre | Contenu | Commentaire |
|--|--|--|--|--|--|--|
| `/` | `GET` | `MainController` | `home` | Dans les shoe | 5 catégories | - |
| `/legal-notice` | `GET` | `MainController` | `legalNotice` | Mentions Légales | Paragraphes sur les mentions légales | - |
| `/catalog/category/[id]` | `GET` | `CatalogController` | `category` | #Nom de la catégorie# | Liste des produits de la catégorie | `[id]` correspond au champ `id` de la catégorie en BDD |
| `/catalog/type/[id]` | `GET` | `CatalogController` | `type` | #Nom du type# | Liste des produits du type de produit | `[id]` correspond au champ `id` du type en BDD |
| `/catalog/product/[id]` | `GET` | `CatalogController` | `product` | #Nom du produit# | Infos détaillées sur le produit | `[id]` correspond au champ `id` du produit en BDD |
| `/cart` | `GET` | `CartController` | `cart` | Mon panier | Les produits actuellement dans le panier du visiteur | - |
| `/cart/add` | `POST` | `CartController` | `add` | - | Traite les données envoyées pour ajouter le produit dans le panier, puis rediriger vers la page "panier" | Les données envoyées doivent permettre d'identifier le produit ajouté et de connaitre la quantité souhaitée |
| `/cart/update` | `POST` | `CartController` | `update` | - | Traite les données envoyées pour modifier les quantités des produits dans le panier, puis rediriger vers la page "panier" | Les données envoyées doivent permettre d'identifier les ou les produits dont on souhaite modifier la quantité dans le panier |
| `/cart/remove/[id]` | `POST` | `CartController` | `delete` | - | Récupère l'identifiant du produit à supprimer du panier, le supprime du panier puis redirige vers la page "panier" | - |