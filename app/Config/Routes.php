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

//view customer
$routes->get('/customer/view', 'CustomerView::index');

//search customer
$routes->post('/customer/search', 'SearchCustomer::search');

//delete customer
$routes->get('delete/(:num)', 'CustomerView::delete/$1');

//show  customer
$routes->get('/customer/(:num)', 'Customers::showCustomer/$1');
// updated  customer
$routes->post('/customer/update', 'Customers::update');

// Email
$routes->get('/invite', 'SendMail::index'); 
$routes->post('/email/invite', 'SendMail::EmailInvite'); 
$routes->post('/save/invite', 'SendMail::SaveInvite');
 

//view customer api json
$routes->get('getcustomer/(:num)', 'CustomerView::viewCustomerAPI/$1');

// Add agent
$routes->get('/agent', 'AddAgent::index');
$routes->POST('/agent/add', 'AddAgent::store');




