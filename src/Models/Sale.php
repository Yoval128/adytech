<?php

namespace App\Models;

use App\Core\Database;

class Sale
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::getInstance()->getConnection();
    }

    public function create($data)
    {
        $sql = "INSERT INTO sales (product_id, quantity, total_price, sale_date, customer_id) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('iidss', $data['product_id'], $data['quantity'], $data['total_price'], $data['sale_date'], $data['customer_id']);
        return $stmt->execute();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM sales";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id)
    {
        $sql = "SELECT * FROM sales WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function update($id, $data)
    {
        $sql = "UPDATE sales SET product_id = ?, quantity = ?, total_price = ?, sale_date = ?, customer_id = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('iidssi', $data['product_id'], $data['quantity'], $data['total_price'], $data['sale_date'], $data['customer_id'], $id);
        return $stmt->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM sales WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }
}
