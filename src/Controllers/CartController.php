<?php

namespace App\Controllers;

use App\Core\Database;
use App\Models\Product;
use App\Models\Cart;

class CartController
{
    private $product;
    private $cart;
    private $db;



    public function __construct()
    {
        $this->product = new Product();
        $this->cart = new Cart();

        $this->db = Database::getInstance()->getConnection();
    }

    public function add()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $productId = $data['productId'] ?? null;
        header('Content-Type: application/json');
        session_start();
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        } 
        
        $product = $this->product->getById($productId);
        if ($product && $product['stock'] > 0) {
            if (isset($_SESSION['cart'][$productId])) {
                $_SESSION['cart'][$productId]['quantity']++;
            } else {
                $_SESSION['cart'][$productId] = ['quantity' => 1, 'price' => $product['price']];
            }
            return json_encode(['status' => 'success', 'message' => 'Product added to cart']);
        } else {
            return json_encode(['status' => 'error', 'message' => 'Product not available']);
        }
    }

    public function view()
    {
        $cartItems = $this->cart->getItems();
        echo json_encode($cartItems);
        exit();
    }

    public function remove()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $productId = $data['id'] ?? null;

        if ($productId) {
            $result = $this->cart->removeProduct($productId);

            if ($result) {
                echo json_encode(['success' => true, 'message' => 'Producto eliminado del carrito']);
            } else {
                echo json_encode(['success' => false, 'message' => 'No se pudo eliminar el producto']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'ID de producto no proporcionado']);
        }
        exit();
    }
    public function checkout()
    {
        $data = $_POST;
        $discount = $data['discount'] ?? 0;
        $moneyReceived = $data['money_received'] ?? 0;

        $cartItems = $this->cart->getItems();

        if (!empty($cartItems)) {
            $subtotal = 0;
            foreach ($cartItems as $item) {
                $subtotal += $item['price'] * $item['stock'];
            }

            $total = $subtotal - $discount;
            $change = $moneyReceived - $total;

            $this->cart->clear();

            echo json_encode([
                'success' => true,
                'subtotal' => number_format($subtotal, 2),
                'discount' => number_format($discount, 2),
                'total' => number_format($total, 2),
                'change' => number_format($change, 2)
            ]);
        } else {
            echo json_encode(['success' => false, 'message' => 'El carrito está vacío']);
        }
        exit();
    }
}
