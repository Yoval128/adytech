<?php

namespace App\Controllers;

use App\Models\Sale;
use App\Models\User; 

class SaleController
{
    private $sale;
    private $user;

    public function __construct()
    {
        $this->sale = new Sale();
        $this->user = new User();
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
    public function searchById()
    {
        $sales = [];
    
        $employees = $this->user->getAll();
    
        if (isset($_GET['employee_id']) && !empty($_GET['employee_id'])) {
            $employeeId = $_GET['employee_id'];
            $sales = $this->sale->getSalesByEmployee($employeeId); 
        }
    
    
        require __DIR__ . '/../Views/sales/salesSearchByIdUser.php';
    }
    public function searchByEmployee()
    {
        $employees = $this->user->getAll(); 
        $sales = [];

        if (isset($_GET['employee_id']) && !empty($_GET['employee_id'])) {
            $employeeId = $_GET['employee_id'];
            $sales = $this->sale->getSalesByEmployee($employeeId); 
        }

        require __DIR__ . '/../Views/sales/salesSearchByEmployee.php';
    }
    public function totalSalesByDate()
{
    $month = $_GET['month'] ?? null;
    
    if ($month) {
        $salesByDate = $this->sale->getTotalSalesByMonth($month);
    } else {
        $salesByDate = $this->sale->getTotalSalesByDate();
    }
    
  require __DIR__ . '/../Views/sales/saleSearchByDate.php';
    }
    
}
