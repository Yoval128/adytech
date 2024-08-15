<?php

namespace App\Controllers;

use App\Models\Sale;

class SaleController
{
    private $sale;

    public function __construct()
    {
        $this->sale = new Sale();
    }

    public function create()
    {
        require __DIR__ . "/../Views/sales/new_sale.php";
    }

    public function store()
    {
        $data = $_POST;
        $this->sale->create($data);
        header('Location: /sales/list');
        exit();
    }

    public function listSales()
    {
        $sales = $this->sale->getAll();
        require __DIR__ . "/../Views/sales/sales.php";
    }
    
  
    public function delete()
    {
        $saleId = $_POST['sale_id'];
        $this->sale->delete($saleId); 
        header('Location: /sales/list');
        exit();
    }
    

    public function edit()
    {
        $id = $_POST['sale_id'] ?? null;
        $sale = $this->sale->find($id);
        require __DIR__ . '/../Views/sales/alter.php';
    }

    public function update()
    {
        $id = $_POST['sale_id'];
        $data = $_POST;
        $this->sale->update($id, $data);
        header('Location: /sales/list');
        exit();
    }
}
