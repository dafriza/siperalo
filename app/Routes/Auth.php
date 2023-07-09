<?php
namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

$routes->get('/', 'AuthController::index', ['as' => 'login']);