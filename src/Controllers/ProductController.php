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

        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $imageTmpPath = $_FILES['image']['tmp_name'];
            $imageName = basename($_FILES['image']['name']);
            $uploadDir = __DIR__ . '/../../public/images/products/';
            $destination = $uploadDir . $imageName;

            if (move_uploaded_file($imageTmpPath, $destination)) {
                $data['image_path'] = '/images/products/' . $imageName;
            } else {
                $data['image_path'] = null;
            }
        }

        $this->product->create($data);

        header('Location: /products/create');
        exit();
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
        $data = $_POST;
        $productId = $data['product_id'];

        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $imageTmpPath = $_FILES['image']['tmp_name'];
            $imageName = basename($_FILES['image']['name']);
            $uploadDir = __DIR__ . '/../../public/images/products/';
            $destination = $uploadDir . $imageName;

            if (move_uploaded_file($imageTmpPath, $destination)) {
                $data['image_path'] = '/images/products/' . $imageName;
            } else {
                $data['image_path'] = null;
            }
        }

        $productModel = new Product();
        $productModel->update($productId, $data);

        header("Location: /products/list");
        exit();
    }


    // public function search()
    // {
    //     $id = $_GET['product_id'] ?? null;
    //     $product = $this->product->find($id);
    //     require __DIR__ . '/../Views/products/search.php';

    // }

    public function search()
    {
        $id = $_GET['product_id'] ?? null;
        $product = $this->product->find($id);
        $products = [];

        if ($product) {
            $products[] = $product;
        }

        require __DIR__ . '/../Views/products/searchId.php';
    }

    public function searchByCategory()
    {
        $categories = $this->category->getAll();

        $categoryId = $_GET['category_id'] ?? null;
        $products = [];
        $categoryName = '';

        if ($categoryId) {
            $products = $this->product->findByCategory($categoryId);
            $categoryName = $this->category->findNameById($categoryId);
        }
        require __DIR__ . '/../Views/products/searchCategory.php';
    }
}
