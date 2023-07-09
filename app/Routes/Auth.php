<?php
namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

$routes->get('/', 'AuthController::index', ['as' => 'login']);
$routes->post('/loginAction','AuthController::loginAction', ['as' => 'login-action']);
$routes->post('/logout','AuthController::logoutAction',['as' => 'logout-action']);