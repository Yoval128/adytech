<?php

use App\Core\Router;

$router = new Router();

$router->add('/lista/usuarios', 'HomeController@index');
$router->add('/', 'AuthController@showlogin');
$router->add('/login', 'AuthController@showlogin');
$router->add('/postLogin', 'AuthController@authLogin', 'POST');
$router->add('/register', 'AuthController@showRegister');
$router->add('/register', 'AuthController@sendRegister', 'POST');

return $router;
