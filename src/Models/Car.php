<?php

namespace App\Models;

class Cart
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    }

    public function addProduct($product)
    {
        $productId = $product['id'];
        
        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId]['quantity'] += 1;
        } else {
            $_SESSION['cart'][$productId] = [
                'id' => $productId,
                'name' => $product['name'],
                'description' => $product['description'],
                'price' => $product['price'],
                'quantity' => 1
            ];
        }

        return true;
    }

    public function getItems()
    {
        return isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    }

    public function removeProduct($productId)
    {
        if (isset($_SESSION['cart'][$productId])) {
            unset($_SESSION['cart'][$productId]);
            return true;
        }
        return false;
    }

    public function clear()
    {
        $_SESSION['cart'] = [];
        return true;
    }
}
