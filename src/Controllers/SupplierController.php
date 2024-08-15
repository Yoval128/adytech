<?php

namespace App\Controllers;

use App\Models\Supplier;

class SupplierController
{
    private $supplier;

    public function __construct()
    {
        $this->supplier = new Supplier();
    }

    public function create()
    {
        require __DIR__ . "/../Views/suppliers/new_supplier.php";
    }

    public function store()
    {
        $data = $_POST;
        $this->supplier->create($data);
        header('Location: suppliers/list');
        exit();
    }

   
    public function listSuppliers()
    {
        $suppliers = $this->supplier->getAll();
    
        if ($suppliers === null) {
            $suppliers = [];
        }
    
         require __DIR__ . "/../Views/suppliers/suppliers.php";
    }
    

 
    public function delete()
    {
        $supplierId = $_POST['supplier_id'];
        $this->supplier->delete($supplierId);
        header('Location: /suppliers/list');
        exit();
    }

    public function edit()
    {
        $id = $_POST['supplier_id'] ?? null;
        if ($id === null) {
            die('ID del proveedor no especificado.');
        }
        $supplier = $this->supplier->find($id);
        if ($supplier === null) {
            die('Proveedor no encontrado.');
        }
        require __DIR__ . '/../Views/suppliers/alter_supplier.php';
    }
    

    public function update()
    {
        $id = $_POST['supplier_id'];
        $data = $_POST;
        $this->supplier->update($id, $data);
        header('Location: /suppliers/list');
        exit();
    }

    public function searchByName()
{
    $suppliers = $this->supplier->getAll(); 
    $supplier = null;
    if (isset($_GET['supplier_id']) && !empty($_GET['supplier_id'])) {
        $supplierId = $_GET['supplier_id'];
        $supplier = $this->supplier->find($supplierId); 
    }

    require __DIR__ . '/../Views/suppliers/suppliersSearchName.php';
}

}
