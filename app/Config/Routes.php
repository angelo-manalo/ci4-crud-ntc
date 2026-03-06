<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


// Authentication Routes (Guest Only)
$routes->group('', ['filter' => 'guest'], static function ($routes) {
    $routes->get('register', 'Auth::register');
    $routes->post('register', 'Auth::attemptRegister');
    $routes->get('login', 'Auth::login');
    $routes->post('login', 'Auth::attemptLogin');
});

// Logout Route
$routes->get('logout', 'Auth::logout');

// Default routes mapping towards the Dashboard
$routes->get('/', 'Home::index', ['filter' => 'auth']);
$routes->get('dashboard', 'Home::index', ['filter' => 'auth']);
// Records CRUD Routes (Protected)
$routes->group('', ['filter' => 'auth'], static function ($routes) {
    $routes->resource('records', ['controller' => 'Records']);
});
