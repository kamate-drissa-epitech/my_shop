<?php
include_once "db_connect.php";

class categorieModel
{

    public $pdo;
    public $categorieName;
    public $categorieParent_id;

    public function __construct()
    {
        $connect = new db_connect('localhost', 'my_shop', 3306, 'kamate', 'kamate');
        $this->pdo = $connect->connection();
    }


    public function getCategory($id)
    {
        $query = $this->pdo->prepare("SELECT * FROM categories WHERE id = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllCategories()
    {
        $query = $this->pdo->prepare("SELECT * FROM categories");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addCategory($name, $parent_id = null)
    {
        $query = $this->pdo->prepare("INSERT INTO categories(name, parent_id) VALUES(?,?)");
        $query->execute([$name, $parent_id]);
    }

    public function deleteCategory($id)
    {
        $query = $this->pdo->prepare("DELETE FROM categories WHERE id = ?");
        $query->execute([$id]);
    }

    public function updateCategory($id, $name, $parent_id)
    {
        $query = $this->pdo->prepare("UPDATE categories SET name = ?, parent_id = ? WHERE id = ?");
        $query->execute([$name, $parent_id, $id]);
    }
}
