<?php

namespace App\Controllers;

use App\Core\Database;



class AuthController
{

    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function showlogin()
    {
        require __DIR__ . '/../Views/login.php';
    }

    public function showRegister()
    {
        require __DIR__ . '/../Views/register.php';
    }

    public function sendRegister()
    {

        print_r($_POST);
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $password = $_POST['password'];
        print_r($password);
        print_r("<br>");

        $passwordEncrypada = password_hash($password, PASSWORD_DEFAULT);

        print_r($passwordEncrypada);

        $conection = $this->db->getConnection();
        $query = $conection->prepare("INSERT INTO users (first_name, email,password) VALUES(?,?,?)");
        $query->bind_param('sss', $nombre, $correo, $passwordEncrypada);

        if ($query->execute()) {
            header('Location: /register');
            exit();
        } else {
            print('No se pudo generar el registro');
        }
    }




    // public function login()
    // {
    //     $username = $_POST['username'] ?? '';

    //     if (empty($username)) {
    //         $message = 'Please provide a username';
    //     } else {
    //         $connection = $this->db->getConnection();
    //         $stmt = $connection->prepare('SELECT * FROM users WHERE first_name = ?');
    //         $stmt->bind_param('s', $username);

    //         $stmt->execute();
    //         $result = $stmt->get_result();
    //         $user = $result->fetch_assoc();

    //         if ($user) {
    //             print('Existe el usuario: ' . $_POST['username']);
    //         } else {
    //             print 'El usuario no existe';
    //         }
    //     }
    // }
}
