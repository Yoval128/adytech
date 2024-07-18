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
        $sql = "INSERT INTO products (name, description, price, stock, category_id) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('ssiii', $data['name'], $data['description'], $data['price'], $data['stock'], $data['category_id']);
        return $stmt->execute();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM products";
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
        $sql = "UPDATE products SET name = ?, description = ?, price = ?, stock = ?, category_id = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param(
            'ssiiii',
            $data['name'],
            $data['description'],
            $data['price'],
            $data['stock'],
            $data['category_id'],
            $id
        );
        return $stmt->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM products WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }
}
