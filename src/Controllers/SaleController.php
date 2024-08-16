<?php

namespace App\Controllers;

use App\Models\Sale;
use App\Models\User;

use App\Models\Product;

use App\Models\SaleDetail;


class SaleController
{
    private $sale;
    private $user;

    private $saleDetail;
    private $product;
    public function __construct()
    {
        session_start();
        $this->saleDetail = new SaleDetail();
        $this->sale = new Sale();
        $this->user = new User();
        $this->product = new Product();
    }

    public function create()
    {
        $products = $this->product->getAll(); 
        require __DIR__ . "/../Views/sales/new_sale.php";
    }


    // public function store()
    // {
    //     $data = $_POST;
    //     $this->sale->create($data);
    //     header('Location: /sales/list');
    //     exit();
    // }

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
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $products = json_decode($_POST['cart_data'], true);
            $total = 0;

            foreach ($products as $product) {
                $total += $product['price'] * $product['quantity'];
            }

            $date = $_POST['date'];
            $userId = $_POST['user_id'];

            try {
                $saleId = $this->sale->create($date, $userId, $total);

                foreach ($products as $product) {
                    $this->saleDetail->create($saleId, $product['id'], $product['quantity'], $product['price']);
                }
                
                header('Location: /sales/list');
                exit();
            } catch (\Exception $e) {
                http_response_code(500);
                echo json_encode(['error' => $e->getMessage()]);
            }
        }
    }
}
