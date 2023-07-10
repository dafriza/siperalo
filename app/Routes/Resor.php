<?php
namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

$routes->group('resor', ['filter' => 'logged'], function ($routes) {
    $routes->get('/', 'ResorController::index', ['as' => 'resor.index']);
    $routes->get('add', 'ResorController::add', ['as' => 'resor.add']);
    $routes->get('edit/(:num)', 'ResorController::edit/$1', ['as' => 'resor.edit']);
    $routes->get('delete/(:num)', 'ResorController::delete/$1', ['as' => 'resor.delete']);
    $routes->post('update', 'ResorController::update', ['as' => 'resor.update']);
});
