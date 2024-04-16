<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/customer', 'Customers::customer');

// Login routes defined here

$routes->POST('/login/check', 'Home::loginAuth');

// logout 
$routes->get('logout', 'Home::logout');

//Register
$routes->get('/onboard', 'Home::register');
$routes->post('/login', 'Home::store');

//customer Related
$routes->POST('/customer/add', 'Customers::store');