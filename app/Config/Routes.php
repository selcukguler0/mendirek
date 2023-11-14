<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/hakkimizda', 'Home::hakkimizda');
$routes->get('/iletisim', 'Home::iletisim');
