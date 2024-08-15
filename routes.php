<?php


use App\Core\Router;
use App\Middleware\AuthMiddleware;

$router = new Router();

$router->add('/', 'AuthController@showLogin');
$router->add('/postLogin', 'AuthController@login', 'POST');
$router->add('/home', 'HomeController@home', 'GET', [[AuthMiddleware::class, 'handle']]);
$router->add('/logout', 'AuthController@logout');

$router->add('/products/create', 'ProductController@create');
$router->add('/products/create', 'ProductController@store', 'POST');
$router->add('/products/list', 'ProductController@listProducts');
$router->add('/products/delete', 'ProductController@delete', 'POST');
$router->add('/products/alter', 'ProductController@edit', 'POST');
$router->add('/products/update', 'ProductController@update', 'POST');
$router->add('/products/search', 'ProductController@search', 'GET');
$router->add('/products/searchByCategory', 'ProductController@searchByCategory', 'GET');



$router->add('/register', 'AuthController@showRegister');
$router->add('/register', 'AuthController@sendRegister', 'POST');
$router->add('/users/list', 'UserController@listUsers');
$router->add('/users/delete', 'UserController@delete', 'POST');
$router->add('/users/alter', 'UserController@edit', 'POST');
$router->add('/users/update', 'UserController@update', 'POST');
$router->add('/users/search', 'UserController@search', 'GET');

$router->add('/suppliers/create', 'SupplierController@create');
$router->add('/suppliers/store', 'SupplierController@store', 'POST');
$router->add('/suppliers/list', 'SupplierController@listSuppliers');
$router->add('/suppliers/delete', 'SupplierController@delete', 'POST');
$router->add('/suppliers/alter', 'SupplierController@edit', 'POST');
$router->add('/suppliers/update', 'SupplierController@update', 'POST');
$router->add('/suppliers/searchByName', 'SupplierController@searchByName', 'GET');

$router->add('/category/create', 'CategoryController@create');
$router->add('/category/store', 'CategoryController@store', 'POST');
$router->add('/category/list', 'CategoryController@listCategories');
$router->add('/category/delete', 'CategoryController@delete', 'POST');
$router->add('/category/alter', 'CategoryController@edit', 'POST');
$router->add('/category/update', 'CategoryController@update', 'POST');
$router->add('/category/searchById', 'CategoryController@search', 'GET');


$router->add('/sales/create', 'SaleController@create');
$router->add('/sales/store', 'SaleController@store', 'POST');
$router->add('/sales/list', 'SaleController@listSales');
$router->add('/sales/delete', 'SaleController@delete', 'POST');
$router->add('/sales/alter', 'SaleController@edit', 'POST');
$router->add('/sales/update', 'SaleController@update', 'POST');
$router->add('/sales/searchByIdUser', 'SaleController@searchById', 'GET');
$router->add('/sales/searchByDate', 'SaleController@searchByDate', 'GET');

$router->add('/cart/add', 'CartController@add', 'POST');
$router->add('/cart/list', 'CartController@view', 'GET');

return $router;
