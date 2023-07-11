<?php
namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

$routes->group('radio_lok', ['filter' => 'logged'], function ($routes) {
    $routes->get('/', 'RadioLokController::index', ['as' => 'radio_lok.index']);
    $routes->get('add', 'RadioLokController::add', ['as' => 'radio_lok.add']);
    $routes->get('edit/(:num)', 'RadioLokController::edit/$1', ['as' => 'radio_lok.edit']);
    $routes->get('delete/(:num)', 'RadioLokController::delete/$1', ['as' => 'radio_lok.delete']);
    $routes->post('update', 'RadioLokController::update', ['as' => 'radio_lok.update']);
    $routes->get('detail/(:num)', 'RadioLokController::detail/$1', ['as' => 'radio_lok.detail']);
});
