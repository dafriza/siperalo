<?php
namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

$routes->group('pnc', ['filter' => 'logged'], function ($routes) {
    $routes->get('/', 'PNCController::index', ['as' => 'pnc.index']);
    $routes->get('add', 'PNCController::add', ['as' => 'pnc.add']);
    $routes->get('edit/(:num)', 'PNCController::edit/$1', ['as' => 'pnc.edit']);
    $routes->get('delete/(:num)', 'PNCController::delete/$1', ['as' => 'pnc.delete']);
    $routes->post('update', 'PNCController::update', ['as' => 'pnc.update']);
});
