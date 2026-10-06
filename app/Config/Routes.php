<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// Public Pages 
$routes->get('/', 'TaskController::index');
$routes->get('/tasks', 'TaskController::list');
$routes->get('/profile', 'Users::profile');
$routes->get('/about', 'Home::about');

// Auth Routes
$routes->get('/login', 'AuthController::login');
$routes->post('/login/auth', 'AuthController::attemptLogin');
$routes->get('/logout', 'AuthController::logout');

// Protected Task Management Routes 
$routes->group('tasks', ['filter' => 'auth'], function($routes) {
    $routes->get('new', 'TaskController::create');
    $routes->post('store', 'TaskController::store');
    $routes->get('edit/(:num)', 'TaskController::edit/$1');
    $routes->post('update/(:num)', 'TaskController::update/$1');
    $routes->get('delete/(:num)', 'TaskController::delete/$1');
});