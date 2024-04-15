<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/customer/add', 'Customers::add_customer');

// Login routes defined here

$routes->POST('/login/check', 'Home::loginAuth');