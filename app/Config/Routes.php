<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/hakkimizda', 'Home::hakkimizda');
$routes->get('/iletisim', 'Home::iletisim');
$routes->get('/search', 'Home::search');
$routes->get('/yazarlar', 'Home::yazarlar');
$routes->get('/yazarlar/ara', 'Home::yazarlar_ara');
$routes->get('/yazarlar/(:any)', 'Home::yazarlar_grup/$1');
