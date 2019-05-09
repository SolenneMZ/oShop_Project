<?php
// Quand on crée une méthode dans DBData
/*
1 - déclarer la méthode
2 - écrire la requête SQL dans une variable de type String
3 - sur le connecteur (objet PDO) exécute la méthode query avec la requête en paramètre
4 - 2 cas de figure :
    4-a) 1 seul résultat => $pdoStatement->fetch ou $pdoStatement->fetchObject
    4-b) plusieurs résultats => $pdoStatement->fetchAll
5 - Retour en Objet ou Tableau :
    5-a) requête sur 1 seule table :
        5-a-i) 1 seul résultat => fetchObject(le Model correspondant)
        5-a-ii) plusieurs résultats => fetchAll(PDO::FETCH_CLASS, le Model correspondant)
    5-b) requête sur plusieurs tables => PDO::FETCH_ASSOC
6 - retourner le tableau
*/

/**
 * Classe permettant de retourner des données stockées dans la base de données
 */
class DBData
{
    /** @var PDO */
    private $dbh; // DataBase Handler

    /**
     * Constructeur se connectant à la base de données à partir des informations du fichier de configuration
     */
    public function __construct() {
        // Récupération des données du fichier de config
        //   la fonction parse_ini_file parse le fichier et retourne un array associatif
        // Attention, "config.conf" ne doit pas être versionné,
        //   on versionnera plutôt un fichier d'exemple "config.dist.conf" ne contenant aucune valeur

        // (to) Parse = Analyser
        // Versionner = gestion de versions multiples du code source = Git
        $configData = parse_ini_file(__DIR__.'/../config.conf');
        
        try {
            $this->dbh = new PDO(
                "mysql:host={$configData['DB_HOST']};dbname={$configData['DB_NAME']};charset=utf8",
                $configData['DB_USERNAME'],
                $configData['DB_PASSWORD'],
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING) // Affiche les erreurs SQL à l'écran
            );
        } catch (\Exception $exception) {
            echo 'Erreur de connexion...<br>';
            echo $exception->getMessage().'<br>';
            echo '<pre>';
            echo $exception->getTraceAsString();
            echo '</pre>';
            exit;
        }
    }

    public function getProducts() {
        // récupère toutes les colonnes de tous les produits de la table product 
        $sql = "
            SELECT *
            FROM product
        ";

        // query() me permet d'exécuter mon SQL 
        // et me renvoie un tableau avec les résultats de cette requête 
        // $this = objet dans lequel on est / accède à la propriété $pdo de DBData
        $pdoStatement = $this->dbh->query($sql);

        $products = array();
        

        $row = $pdoStatement->fetch(PDO::FETCH_ASSOC);
        while($row != false) {
            $id = $row['id'];
            $name=$row['name'];
            $description=$row['description'];
            $picture=$row['picture'];
            $price=$row['price'];
            $rate=$row['rate'];
            $brand_id=$row['brand_id'];
            $category_id=$row['category_id'];
            $type_id=$row['type_id'];

            // créer un objet de type article qui contient les données provenant de la bdd
            $product = new Product($name, $description, $picture, $price, $rate, $type_id, $brand_id, $category_id);

            // j'ajoute au tableau l'objet que je viens de créer
            // l'index de cet objet dans le tableau est l'id de product  
            $products[$id] = $product;
            
            // récupère la ligne suivante et continue la boucle
            // s'il n'y a plus de ligne, alors fetch renvoie false et la boucle s'arrête
            $row = $pdoStatement->fetch(PDO::FETCH_ASSOC);

        }
        
        return $products;
    }

    /**
     * Méthode pour récupérer les produits d'une catégorie
     */
    public function getProductsFromCategory($categoryId)
    {
        $sql = 'SELECT product.*, type.name AS type_name
        FROM `product`
        INNER JOIN type ON product.type_id=type.id
        WHERE category_id='.$categoryId.'
        ORDER BY name ASC';
        // On effectue la requête sur le serveur
        $result = $this->dbh->query($sql);
        // On récupère le résultat de la requête via $result
        $products = $result->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    }

    /**
     * Méthode permettant de retourner les données sur un produit donné
     *
     * @param int $productId
     * @return Product
     */
    public function getProductDetails($productId) {
        $sql = 'SELECT product.*, category.name AS category_name, brand.name AS brand_name FROM `product`
        LEFT JOIN category ON product.category_id=category.id
        LEFT JOIN brand ON product.brand_id=brand.id
        WHERE product.id='.$productId;

        // On effectue la requête sur le serveur
        $result = $this->dbh->query($sql);
        // On récupère le résultat de la requête via $result
        $product = $result->fetch(PDO::FETCH_ASSOC);

        return $product;
    }
    
    /**
     * Méthode permettant de retourner les données sur une catégorie donnée
     *
     * @param int $categoryId
     * @return Category
     */
    public function getCategoryDetails($categoryId) {
        // TODO
    }
    
    /**
     * Méthode permettant de retourner les données sur une marque donnée
     *
     * @param int $brandId Brand database id
     * @return Brand
     */
    public function getBrandDetails($brandId) {
        // Requête SQL
        $sql = 'SELECT * FROM `brand` WHERE id='.$brandId;
        // On effectue la requête sur le serveur
        $result = $this->dbh->query($sql);
        // On configure PDOStatement pour nous retourner des objets de type Brand
        $result->setFetchMode(PDO::FETCH_CLASS, 'Brand');
        // On récupère le résultat de la requête via $result
        $brandObject = $result->fetch();

        // Syntaxe alternative: 
        // $brandObject = $result->fetchObject('Brand');


        // dd($brandObject); = DUMP AND DIE

        return $brandObject;

        /***** METHODE FETCH_ASSOC  *****/
        // // On récupère le résultat de la requête via $result
        // $brand = $result->fetch(PDO::FETCH_ASSOC);

        // // On crée un objet de type Brand
        // $brandObject = new Brand();
        // $brandObject->setId($brand['id']);
        // $brandObject->setName($brand['name']);
        // $brandObject->setFooter_order($brand['footer_order']);
        // $brandObject->setCreated_at($brand['created_at']);
        // $brandObject->setUpdated_at($brand['updated_at']);

        // dd($brandObject);

        // return $brandObject;
    }
    
    /**
     * Méthode permettant de retourner les données sur un type de produit donné
     *
     * @param int $typeId
     * @return ProductType
     */
    public function getProductTypeDetails($typeId)
    {
        // TODO
    }
    
    /**
     * Méthode permettant de retourner les 5 catégories sur la page d'accueil
     *
     * @return Category[]
     */
    public function getHomeCategories() {
        $sql = 'SELECT *
        FROM `category`
        WHERE home_order != 0
        ORDER BY home_order ASC
        LIMIT 5';
        // On effectue la requête sur le serveur
        $result = $this->dbh->query($sql);
        // On configure PDOStatement pour nous retourner
        // des objets de type Category
        $result->setFetchMode(PDO::FETCH_CLASS, 'Category');
        // On récupère le résultat de la requête via $result
        $categories = $result->fetchAll();

        return $categories;
    }
    
    /**
     * Méthode permettant de retourner les 5 marques en bas de page
     *
     * @return Brand[]
     */
    public function getFooterBrands() {
        $sql = 'SELECT *
        FROM `brand`
        WHERE footer_order != 0
        ORDER BY footer_order ASC';

        $result = $this->dbh->query($sql);

        // $result->setFetchMode(PDO::FETCH_CLASS, 'Brand');
        // $brands = $result->fetchAll();
        // Ces deux lignes résumées en une:
        $brands = $result->fetchAll(PDO::FETCH_CLASS, 'Brand');

        return $brands;
    }
    
    /**
     * Méthode permettant de retourner les 5 types de produit en bas de page
     *
     * @return ProductType[]
     */
    public function getFooterProductTypes() {
        $sql = 'SELECT *
        FROM `type`
        WHERE footer_order != 0
        ORDER BY footer_order ASC';

        $result = $this->dbh->query($sql);

        // $result->setFetchMode(PDO::FETCH_CLASS, 'Brand');
        // $types = $result->fetchAll();
        $types = $result->fetchAll(PDO::FETCH_CLASS, 'Brand');

        return $types;
    }
}
