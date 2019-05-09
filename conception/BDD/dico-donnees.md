# Dictionnaire de données

## Produits (entité `product`)

|Champ|Type SQL|Spécificités|Description|
|-|-|-|-|
|id|INT|PRIMARY KEY, UNSIGNED, NOT NULL, AUTO_INCREMENT|L'identifiant du produit|
|name|VARCHAR(64)|NOT NULL|Le nom du produit|
|price|DECIMAL(10,2)|NOT NULL, DEFAULT 0|Le prix du produit|
|picture|VARCHAR(255)|NULL|Le nom du fichier image du produit|
|description|TEXT|NULL|La description du produit|
|rate|TINYINT|NOT NULL, DEFAULT 0|L'avis sur le produit, de 1 à 5|
|status|TINYINT|NOT NULL, DEFAULT 2|Le statut du produit (1=dispo, 2=pas dispo)|
|created_at|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|La date de création du produit|
|updated_at|TIMESTAMP|NULL|La date de mise à jour du produit|
|brand|entity|NOT NULL|La marque du produit (autre entité)|
|category|entity|NULL|La catégorie du produit (autre entité)|
|type|entity|NULL|Le type du produit (autre entité)|

Les champs `created_at` et `updated_at` sont utilisés _en interne_ (MySQL et le dev) pour "tracer" les dates de créations et de modifications des _enregistrements en base_.

## Catégorie (`category`)

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|id|INT|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT|L'identifiant de la catégorie|
|name|VARCHAR(64)|NOT NULL|Le nom de la catégorie|
|subtitle|VARCHAR(64)|NULL|Le sous-titre/slogan de la catégorie|
|picture|VARCHAR(255)|NULL|le nom du fichier image de la catégorie (utilisée en home, par exemple)|
|home_order|TINYINT|NOT NULL, DEFAULT 0|L'ordre d'affichage de la catégorie sur la home (0=pas affichée en home)|
|created_at|TIMESTAMP|DEFAULT CURRENT_TIMESTAMP|La date de création de la catégorie|
|updated_at|TIMESTAMP|NULL|La date de la dernière mise à jour de la catégorie|

## Marque (`brand`)

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|id|INT|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT|L'identifiant de la marque|
|name|VARCHAR(64)|NOT NULL|Le nom de la marque|
|footer_order|TINYINT|NOT NULL, DEFAULT 0|L'ordre d'affichage de la marque dans le footer (0=pas affichée dans le footer)|
|created_at|TIMESTAMP|DEFAULT CURRENT_TIMESTAMP|La date de création de la marque|
|updated_at|TIMESTAMP|NULL|La date de la dernière mise à jour de la marque|

## Type de produit (`type`)

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|id|INT|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT|L'identifiant du type|
|name|VARCHAR(64)|NOT NULL|Le nom du type|
|footer_order|TINYINT|NOT NULL, DEFAULT 0|L'ordre d'affichage du type dans le footer (0=pas affichée dans le footer)|
|created_at|TIMESTAMP|DEFAULT CURRENT_TIMESTAMP|La date de création du type|
|updated_at|TIMESTAMP|NULL|La date de la dernière mise à jour du type|