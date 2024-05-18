<?php
include_once "db_connect.php";

class productModel
{
    public $pdo;
    // public $productName;
    // public $productPrice;
    // public $category_id;

    public function __construct()
    {
        $connect = new db_connect('localhost', 'my_shop', 3306, 'kamate', 'kamate');
        $this->pdo = $connect->connection();
    }

    public function addProduct($productName, $productPrice, $decription, $picture,$categorie_id)
    {
        $query = $this->pdo->prepare("INSERT INTO products(name,price,category_id) VALUES (?,?,?)");
        $query->execute([$productName, $productPrice, $categorie_id]);
    }

    public function getAllProducts()
    {
        $query = $this->pdo->prepare("SELECT * FROM products");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteProduct($id)
    {
        $query = $this->pdo->prepare("DELETE FROM products WHERE id = ?");
        $query->execute([intval($id)]);
    }

    public function getProductByPrice($price)
    {
        $query = $this->pdo->prepare("SELECT price FROM products WHERE price = ?");
        $query->execute([intval($price)]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductByName($name)
    {
        $query = $this->pdo->prepare("SELECT name FROM products WHERE name = ?");
        $query->execute([$name]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }


}
