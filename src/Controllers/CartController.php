<?php

namespace App\Controllers;

use App\Models\Product;
use App\Models\Cart;

class CartController
{
    private $product;
    private $cart;

    public function __construct()
    {
        $this->product = new Product();
        $this->cart = new Cart(); // Asegúrate de tener un modelo Cart que maneje el carrito
    }

    // Método para agregar un producto al carrito
    public function add()
    {
        // Verificar si el producto ID se ha enviado en la solicitud
        $data = json_decode(file_get_contents('php://input'), true);
        $productId = $data['product_id'] ?? null;

        if ($productId) {
            $product = $this->product->find($productId);
            if ($product) {
                // Lógica para agregar producto al carrito
                $result = $this->cart->addProduct($product);
                
                if ($result) {
                    echo json_encode(['success' => true, 'message' => 'Producto agregado al carrito']);
                } else {
                    echo json_encode(['success' => false, 'message' => 'No se pudo agregar el producto']);
                }
            } else {
                echo json_encode(['success' => false, 'message' => 'Producto no encontrado']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'ID de producto no proporcionado']);
        }
        exit();
    }

    // Método para mostrar el contenido del carrito
    public function view()
    {
        $cartItems = $this->cart->getItems();
        echo json_encode($cartItems);
        exit();
    }

    // Método para eliminar un producto del carrito
    public function remove()
    {
        // Verificar si el producto ID se ha enviado en la solicitud
        $data = json_decode(file_get_contents('php://input'), true);
        $productId = $data['product_id'] ?? null;

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

    // Método para procesar la compra
    public function checkout()
    {
        $data = $_POST;
        $discount = $data['discount'] ?? 0;
        $moneyReceived = $data['money_received'] ?? 0;
        
        // Obtener el contenido del carrito
        $cartItems = $this->cart->getItems();
        
        if (!empty($cartItems)) {
            // Calcular subtotal, descuentos y total
            $subtotal = 0;
            foreach ($cartItems as $item) {
                $subtotal += $item['price'] * $item['quantity'];
            }

            $total = $subtotal - $discount;
            $change = $moneyReceived - $total;

            // Aquí puedes agregar la lógica para guardar la venta en la base de datos
            // Por ejemplo, creando un registro de venta y vaciando el carrito

            // Vaciar el carrito después de la compra
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
