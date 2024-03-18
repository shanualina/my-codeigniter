<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Crud::index'); //show list
// $routes->get('/crud/add', 'Crud::add'); //add view page
// $routes->post('/crud/add_validation', 'Crud::add_validation'); //post added data
// $routes->get('/crud/delete/(:num)', 'Crud::delete/$1');// delete record

// $routes->get('/crud/fetch_single_data/(:num)', 'Crud::fetch_single_data/$1');//get edit page
// $routes->post('/crud/edit_validation', 'Crud::edit_validation'); //update post

$routes->get('/', 'SignupController::index');
$routes->get('/signup', 'SignupController::index');
$routes->match(['get', 'post'], 'SignupController/store', 'SignupController::store');
$routes->match(['get', 'post'], 'SigninController/loginAuth', 'SigninController::loginAuth');
$routes->get('/signin', 'SigninController::index');
$routes->get('/dashboard', 'DashboardController::index', ['filter' => 'authGuard']);
$routes->get('/dashboard/delete/(:num)', 'DashboardController::delete/$1'); // delete record
$routes->get('/dashboard/get_record/(:num)', 'DashboardController::get_record/$1');
$routes->post('/dashboard/edit_validation', 'DashboardController::edit_validation'); //update post

$routes->get('dashboard', 'UploadController::index'); // Add this line.
$routes->post('dashboard/upload', 'UploadController::upload');
