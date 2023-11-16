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

// Admin
$routes->get('/admin', 'Admin::index');
$routes->get('/admin/editbook/(:any)', 'Admin::editbook/$1');
$routes->post('/admin/editbook', 'Admin::editbook_post');
$routes->get('/admin/addbook', 'Admin::addbook');
$routes->post('/admin/addbook', 'Admin::addbook_post');
$routes->post('/admin/deletebook', 'Admin::deletebook');
$routes->get('/admin/login', 'Admin::login');
$routes->post('/admin/login', 'Admin::login_post');
$routes->get('/admin/logout', 'Admin::logout');

