<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\Product;

class ProductController
{
    private $category;
    private $product;

    public function __construct()
    {
        $this->category = new Category();
        $this->product = new Product();
    }

    public function create()
    {
        $categories = $this->category->getAll();
        require __DIR__ . "/../Views/products/create.php";
    }

    public function store()
    {
        $data = $_POST;
        $this->product->create($data);

        require __DIR__ . "/../Views/products/create.php";
    }

    public function listProducts()
    {
        $products = $this->product->getAll();
        require __DIR__ . "/../Views/products/list.php";
    }

    public function delete()
    {
        $productId = $_POST['product_id'];
        $this->product->delete($productId);
        header('Location: /products/list');
        exit();
    }


    public function edit()
    {
        $id = $_POST['product_id'] ?? null;

        $product = $this->product->find($id);
        $categories = $this->category->getAll();
        require __DIR__ . '/../Views/products/alter.php';
    }


    public function update()
    {
        $id = $_POST['product_id'];
        $data = $_POST;
        $this->product->update($id, $data);
        header('Location: /products/list');
        exit();
    }

    public function search()
    {
        $id = $_GET['product_id'] ?? null;
        $product = $this->product->find($id);
        require __DIR__ . '/../Views/products/search.php';
    }
}
