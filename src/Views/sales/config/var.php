<?php
session_start();

$subtotal = 0.00;
$discounts = 0.00;
$total = 0.00;

$cartItems = [
    ['name' => 'Producto 1', 'description' => 'Descripción del producto', 'price' => 200.00, 'quantity' => 2, 'category_id' => 6],

];

foreach ($cartItems as $item) {
    $subtotal += $item['price'] * $item['quantity'];
}

$discounts = $subtotal * 0.10;
$total = $subtotal - $discounts;

?>