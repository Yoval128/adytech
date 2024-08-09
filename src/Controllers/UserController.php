<?php

namespace App\Controllers;

use App\Models\User;

class UserController
{
    private $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function create()
    {
        require __DIR__ . "/../Views/users/create.php";
    }

    public function store()
    {
        $data = $_POST;
        $this->user->create($data);
        header('Location: /users/list');
        exit(); 
    }

    public function listUsers()
    {
        $users = $this->user->getAll();
        require __DIR__ . "/../Views/users/userList.php";
    }

    public function delete()
    {
        $userId = $_POST['user_id'];
        $this->user->delete($userId);
        header('Location: /users/list');
        exit();
    }

    public function edit()
    {
        $id = $_POST['user_id'] ?? null;
        $user = $this->user->find($id);
        require __DIR__ . '/../Views/users/alter.php';
    }

    public function update()
    {
        $id = $_POST['user_id'];
        $data = $_POST;
        $this->user->update($id, $data);
        header('Location: /users/list');
        exit();
    }
}
