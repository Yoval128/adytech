<?php

namespace App\Models;

use App\Core\Database;

class SaleDetail
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function create($saleId, $productId, $quantity, $price)
    {
        $stmt = $this->db->prepare("INSERT INTO sales_details (sale_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iiid", $saleId, $productId, $quantity, $price);
        return $stmt->execute();
    }
}
