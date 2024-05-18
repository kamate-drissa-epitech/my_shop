<?php

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

    




}
