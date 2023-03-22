# Requêtes SQL

## Page d'accueil (home)

Récupération des 5 catégories à afficher :

```sql
SELECT * FROM category WHERE home_order > 0 ORDER BY home_order LIMIT 5
```

## Page catégorie (category)

Récupération des informations sur la catégorie de la page :

```sql
SELECT * FROM category WHERE id = $categoryId
```

Récupération des produits propre à la catégorie $categoryId en récupérant au passage le type de chaque produit :

```sql
SELECT product.id, product.name, product.price, product.picture, type.name AS typeName
FROM product
JOIN type ON type.id = type_id
WHERE category_id = $categoryId
```

## Page type (type)

Récupération des informations sur le type de la page :

```sql
SELECT * FROM type WHERE id = $typeId
```

Récupération des produits propre au type $typeId en récupérant au passage le type de chaque produit :

```sql
SELECT product.id, product.name, product.price, product.picture, type.name AS typeName
FROM product
JOIN type ON type.id = type_id
WHERE type_id = $typeId
```

## Page marque (brand)

Récupération des informations sur la marque de la page :

```sql
SELECT * FROM brand WHERE id = $brandId
```

Récupération des produits propre à la marque $brandId en récupérant au passage le type de chaque produit :

```sql
SELECT product.id, product.name, product.price, product.picture, type.name AS typeName
FROM product
JOIN type ON type.id = type_id
WHERE brand_id = $brandId
```

## Page produit (product)

Récupération du produit $productId en récupérant au passage la marque du produit :

```sql
SELECT product.name, product.description, product.price, product.picture, product.rate, brand.name AS brandName
FROM product
JOIN brand ON brand.id = brand_id
WHERE product.id = $productId
```
# listes les produit par category

SELECT product.id, product.name, product.price, product.picture, category.name AS categoryName, category.id AS categoryId
FROM product
JOIN category WHERE category_id = category.id