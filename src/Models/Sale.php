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

    public function create($date, $userId, $total)
    {
        $query = "INSERT INTO sales (date, user_id, total) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);

        if ($stmt === false) {
            throw new \Exception("Failed to prepare statement: " . $this->conn->error);
        }

        $stmt->bind_param('sii', $date, $userId, $total);

        if (!$stmt->execute()) {
            throw new \Exception("Failed to execute statement: " . $stmt->error);
        }

        return $stmt->insert_id;
    }



    public function getAll()
    {
        $sql = "SELECT sales.*, 
                       CONCAT(users.first_name, ' ', users.Last_name) AS seller_name 
                FROM sales 
                LEFT JOIN users ON sales.user_id = users.id";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id)
    {
        $sql = "SELECT s.*, sd.product_id, sd.quantity, sd.price 
                FROM sales s
                LEFT JOIN sales_details sd ON s.id = sd.sale_id
                WHERE s.id = ?";
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

    public function getSalesByEmployee($employeeId)
    {
        $sql = "SELECT sales.*, 
                       CONCAT(users.first_name, ' ', users.Last_name) AS seller_name 
                FROM sales 
                LEFT JOIN users ON sales.user_id = users.id
                WHERE sales.user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $employeeId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getTotalSalesByDate()
    {
        $sql = "SELECT DATE(date) as sale_date, SUM(total) as total_sales
                FROM sales
                GROUP BY sale_date
                ORDER BY sale_date ASC";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getTotalSalesByMonth($month)
    {
        $sql = "SELECT DATE(date) as sale_date, SUM(total) as total_sales
            FROM sales
            WHERE DATE_FORMAT(date, '%Y-%m') = ?
            GROUP BY sale_date
            ORDER BY sale_date ASC";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('s', $month);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
