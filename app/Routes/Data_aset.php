<?php
namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

$routes->group('data_aset', ['filter' => 'logged'], function ($routes) {
    $routes->get('/', 'DataAsetController::index', ['as' => 'data_aset.index']);
    $routes->get('add', 'DataAsetController::add', ['as' => 'data_aset.add']);
    $routes->get('edit/(:num)', 'DataAsetController::edit/$1', ['as' => 'data_aset.edit']);
    $routes->get('delete/(:num)', 'DataAsetController::delete/$1', ['as' => 'data_aset.delete']);
    $routes->post('update', 'DataAsetController::update', ['as' => 'data_aset.update']);
});
