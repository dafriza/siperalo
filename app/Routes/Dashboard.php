<?php
namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

$routes->group('dashboard', ['filter' => 'logged'], function ($routes) {
    $routes->get('/', 'DashboardController::index', ['as' => 'dashboard']);
});
