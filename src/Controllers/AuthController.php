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

    public function authLogin()
    {
        $firts_name = $_POST['username'];
        $password = $_POST['password'];

        //$passwordEncriptada = password_hash($password, PASSWORD_DEFAULT);

        $connection = $this->db->getConnection();
        $query = $connection->prepare("SELECT * FROM users WHERE first_name = ? AND password = ?");
        $query->bind_param('ss', $firts_name, $password);

        if ($query->execute()) {
            $result = $query->get_result();
            if ($result->num_rows > 0) {
                header('Location: lista/usuarios');
               //print("Usuario Encontrado");
            } else {
                //print("Erro, Datos de usuario o contraseña incorrecta");
                header('Location: login');
            }
        } 
    }

}
