<?php

namespace App\Models;

use App\Core\Database;

class Supplier
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::getInstance()->getConnection();
    }

    public function create($data)
    { 
        $sql = "INSERT INTO suppliers (name, contact, phone, email, address) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('sssss', $data['name'], $data['contact'], $data['phone'], $data['email'], $data['address']);
        return $stmt->execute();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM suppliers";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id)
    {
        $sql = "SELECT * FROM suppliers WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function update($id, $data)
    {
        $sql = "UPDATE suppliers SET name = ?, contact = ?, phone = ?, email = ?, address = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('sssssi', $data['name'], $data['contact'], $data['phone'], $data['email'], $data['address'], $id);
        return $stmt->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM suppliers WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }
}
