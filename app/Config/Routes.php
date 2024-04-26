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
$routes->get('/agent', 'Agent::index');
$routes->POST('/agent/add', 'Agent::store');
$routes->get('/agent/view', 'Agent::View');
// delete agent
$routes->get('agent/delete/(:num)', 'Agent::delete/$1');
//agent edit
$routes->get('agent/edit/(:num)', 'Agent::edit/$1');

// update agent
$routes->post('/agent/update', 'Agent::update');

//filter by days
$routes->get('filter/(:any)', 'FilterCustomer::filterByDays/$1');
$routes->post('filter/date', 'FilterCustomer::filterByDate');

//Agent login
$routes->get('/agent/login', 'AgentLogin::index');
$routes->POST('/agentlogin/check', 'AgentLogin::Agentlogin');

// searching customer from table only
$routes->POST('/search/customer', 'FilterCustomer::searchingCustomer');

//filter by status
$routes->get('status/(:any)', 'FilterCustomer::getStatusbyCustomer/$1');

//view call back
$routes->get('/view/callback', 'Dashboard::ViewCallback');
// callback date filter
$routes->post('callback/filter', 'FilterCustomer::CallbackFilter');

//test
$routes->post('/comment/add', 'Customers::addComment');
$routes->get('/comment/view/(:num)', 'Customers::getComments/$1');











