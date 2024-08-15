<?php

namespace App\Models;

use App\Core\Database;

class Category
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::getInstance()->getConnection();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM product_categories";
        $query = $this->conn->query($sql);
        $categories = [];
        while ($row = $query->fetch_assoc()) {
            $categories[] = $row;
        }
        return $categories;
    }

    public function create($data)
    {
        $sql = "INSERT INTO product_categories (name) VALUES (?)";
        $stmt = $this->conn->prepare($sql);
        if ($stmt === false) {
            die('Prepare failed: ' . $this->conn->error);
        }
        $stmt->bind_param('s', $data['name']);
        $stmt->execute();
    }

    public function find($id)
    {
        $sql = "SELECT * FROM product_categories WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        if ($stmt === false) {
            die('Prepare failed: ' . $this->conn->error);
        }
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function update($id, $data)
    {
        $sql = "UPDATE product_categories SET name = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        if ($stmt === false) {
            die('Prepare failed: ' . $this->conn->error);
        }
        $stmt->bind_param('si', $data['name'], $id);
        $stmt->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM product_categories WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        if ($stmt === false) {
            die('Prepare failed: ' . $this->conn->error);
        }
        $stmt->bind_param('i', $id);
        $stmt->execute();
    }
        public function findNameById($categoryId)
    {
        $sql = "SELECT name FROM product_categories WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        if ($stmt === false) {
            die('Prepare failed: ' . $this->conn->error);
        }
        $stmt->bind_param('i', $categoryId);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $category = $result->fetch_assoc();
            return $category['name'];
        } else {
            return 'Categoría desconocida';
        }
    }
}
