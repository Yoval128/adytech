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
        $sql = "INSERT INTO products (name, description, price, stock, category_id, image_path) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('ssiiis', $data['name'], $data['description'], $data['price'], $data['stock'], $data['category_id'], $data['image_path']);
        return $stmt->execute();
    }
    public function getAll()
    {
        $sql = "SELECT * FROM products ORDER BY id DESC";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }


    public function find($id)
    {
        $sql = "SELECT * FROM products WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }


    public function update($id, $data)
{
    $sql = "UPDATE products SET name = ?, description = ?, price = ?, stock = ?, category_id = ?, image_path = ? WHERE id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param(
        'ssiiisi',
        $data['name'],
        $data['description'],
        $data['price'],
        $data['stock'],
        $data['category_id'],
        $data['image_path'],
        $id
    );
    return $stmt->execute();
}


public function delete($id)
{
    $sql = "DELETE FROM inventory WHERE product_id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();

    $sql = "DELETE FROM products WHERE id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param('i', $id);
    return $stmt->execute();
}

    // public function findByCategory($categoryId)
    // {
    //     $sql = "SELECT * FROM products WHERE category_id = ?";
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->bind_param('i', $categoryId);
    //     $stmt->execute();
    //     $result = $stmt->get_result();
    //     return $result->fetch_all(MYSQLI_ASSOC);
    // }

   
    public function findByCategory($categoryId)
    {
        $sql = "SELECT * FROM products WHERE category_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $categoryId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }


    public function findNameById($categoryId)
    {
        $sql = "SELECT name FROM categories WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $categoryId);
        $stmt->execute();
        $result = $stmt->get_result();
        $category = $result->fetch_assoc();
        return $category['name'] ?? 'Categoría desconocida';
    }
}
