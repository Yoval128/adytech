<?php

namespace App\Models;

use App\Core\Database;

class Product
{
    private $conn;

    public function __construct()
    {
        $this->conn =  Database::getInstance()->getConnection();
    }

    public function create($data)
    {
        $nombre = $data['name'];
    $descp = $data['description'];
    $price = $data['price'];
    $stock = $data['stock'];
    $categ = $data['category_id'];

       // $connection = $this->conn->getConnection();
        $query = $this->conn->prepare("INSERT INTO products (name, description, price, stock, category_id) VALUES (?, ?, ?, ?, ?)");
        $query->bind_param('ssdis', $nombre, $descp, $price, $stock, $categ);
 
        
        if ($query->execute()) {
            print("Se agregó correctamente el producto");
        } else {
            print('No se pudo generar el registro: ');
        }

    }
}
