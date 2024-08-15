<?php

namespace App\Controllers;

use App\Models\Category;

class CategoryController
{
    private $category;

    public function __construct()
    {
        $this->category = new Category();
    }

    public function create()
    {
        require __DIR__ . '/../Views/categories/new_category.php';
    }

    public function store()
    {
        $data = $_POST;
        $this->category->create($data);

        header('Location: /category/list');
        exit();
    }

    public function listCategories()
    {
        $categories = $this->category->getAll();
        require __DIR__ . '/../Views/categories/categories.php';
    }

    public function delete()
    {
        $categoryId = $_POST['category_id'];
        $this->category->delete($categoryId);
        header('Location: /category/list');
        exit();
    }

    public function edit()
    {
        $id = $_POST['category_id'] ?? null;

        $category = $this->category->find($id);
        require __DIR__ . '/../Views/categories/alter_category.php';
    }

    public function update()
    {
        $id = $_POST['category_id'];
        $data = $_POST;
        $this->category->update($id, $data);
        header('Location: /category/list');
        exit();
    }

    public function search()
    {
        $id = $_GET['category_id'] ?? null;
        $category = $this->category->find($id);
        $categories = [];

        if ($category) {
            $categories[] = $category;
        }

        require __DIR__ . '/../Views/categories/categorySearchById.php';
    }

}
