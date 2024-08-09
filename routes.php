<?php

// use App\Core\Router;
// use App\Middleware\AuthMiddleware;

// $router = new Router();

// $router->add('/', 'AuthController@showlogin');
// $router->add('/postLogin', 'AuthController@login', 'POST');
// $router->add('/home', 'HomeController@home', 'GET', [[AuthMiddleware::class, 'handle']]);
// $router->add('/logout', 'AuthController@logout');
// // Rutas del CRUD de Productos
// $router->add('/products/create', 'ProductController@create');
// $router->add('/products/create', 'ProductController@store', 'POST');
// $router->add('/products/list', 'ProductController@listProducts');
// $router->add('/products/delete', 'ProductController@delete', 'POST');
// $router->add('/products/alter', 'ProductController@edit', 'POST');
// $router->add('/products/update', 'ProductController@update', 'POST');

// //Rutas del CRUD de usuarios
// $router->add('/register', 'AuthController@showRegister');
// $router->add('/register', 'AuthController@sendRegister', 'POST');
// $router->add('/lista/usuarios', 'HomeController@index');

// return $router;



use App\Core\Router;
use App\Middleware\AuthMiddleware;

$router = new Router();

// Autenticación
$router->add('/', 'AuthController@showLogin');
$router->add('/postLogin', 'AuthController@login', 'POST');
$router->add('/home', 'HomeController@home', 'GET', [[AuthMiddleware::class, 'handle']]);
$router->add('/logout', 'AuthController@logout');

// CRUD de Productos
$router->add('/products/create', 'ProductController@create');
$router->add('/products/create', 'ProductController@store', 'POST');
$router->add('/products/list', 'ProductController@listProducts');
$router->add('/products/delete', 'ProductController@delete', 'POST');
$router->add('/products/alter', 'ProductController@edit', 'POST');
$router->add('/products/update', 'ProductController@update', 'POST');

// CRUD de Usuarios
$router->add('/users/create', 'UserController@create');
$router->add('/users/store', 'UserController@store', 'POST');
$router->add('/users/list', 'UserController@listUsers');
$router->add('/users/delete', 'UserController@delete', 'POST');
$router->add('/users/alter', 'UserController@edit', 'POST');
$router->add('/users/update', 'UserController@update', 'POST');

$router->add('/register', 'AuthController@showRegister');
$router->add('/register', 'AuthController@sendRegister', 'POST');

return $router;
