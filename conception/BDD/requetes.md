# Requêtes à créer

## Layout (gabarit global)

- Les 5 types (type) dans le footer
```sql
SELECT *
FROM `type`
WHERE footer_order != 0
ORDER BY footer_order ASC
```
- Les 5 marques (brand) dans le footer
```sql
SELECT *
FROM `brand`
WHERE footer_order != 0
ORDER BY footer_order ASC
```
## Home

- Les infos des 5 catégories (category) de la home
```sql
SELECT *
FROM `category`
WHERE home_order != 0
ORDER BY home_order ASC
LIMIT 5 -- LIMIT permet de limiter le nombre de résulats retournés
```

## Catégorie

- Les infos de la catégorie demandée
```sql
SELECT *
FROM `category`
WHERE id=1
```
- Les produits de la catégorie demandée, triés par nom croissant
```sql
SELECT *
FROM `product`
WHERE category_id=1
ORDER BY name ASC
```
- Les produits de la catégorie demandée, triés par prix croissant
```sql
SELECT *
FROM `product`
WHERE category_id=1
ORDER BY price ASC
```
## Marque

- Les infos de la marque demandée
```sql
SELECT *
FROM `brand`
WHERE id=1
```
- Les produits de la marque demandée, triés par nom croissant
```sql
SELECT *
FROM `product`
WHERE brand_id=1
ORDER BY name ASC
```
- Les produits de la marque demandée, triés par prix croissant
```sql
SELECT *
FROM `product`
WHERE brand_id=1
ORDER BY price ASC
```

## Type

- idem marque ou catégorie

## Produit

- Les infos du produit
- Sa marque
- Sa catégorie

```sql
SELECT product.*, category.name AS category_name, brand.name AS brand_name FROM `product`
INNER JOIN category ON product.category_id=category.id
INNER JOIN brand ON product.brand_id=brand.id
WHERE product.id=1
```
Ou plus _souple_ avec le `LEFT` (on va récupérer le produit même si la marque ou la catégorie est manquante dans la table associée OU si `category_id` ou `brand_id` est NULL).

```sql
SELECT product.*, category.name AS category_name, brand.name AS brand_name FROM `product`
LEFT JOIN category ON product.category_id=category.id
LEFT JOIN brand ON product.brand_id=brand.id
WHERE product.id=1
```