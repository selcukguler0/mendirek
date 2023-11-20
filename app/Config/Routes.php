<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Home
$routes->get('/', 'Home::index');
$routes->get('/hakkimizda', 'Home::hakkimizda');
$routes->get('/iletisim', 'Home::iletisim');
$routes->get('/search', 'Home::search');
$routes->get('/yazarlar', 'Home::yazarlar');
$routes->get('/yazarlar/ara', 'Home::yazarlar_ara');
$routes->get('/yazarlar/(:any)', 'Home::yazarlar_grup/$1');
$routes->get('/lolla-kids', 'Home::lolla_kids');
$routes->get('/kitaplar/(:any)', 'Home::kitaplar/$1');

// User
$routes->match(['get', 'post'], '/login', 'User::login');
$routes->match(['get', 'post'], '/register', 'User::register');
$routes->match(['get', 'post'], '/forgot-pass', 'User::forgot_pass');
$routes->match(['get', 'post'], '/activation-code', 'User::activation_code');
$routes->get('/logout', 'User::logout');
$routes->get('/verify-mail', 'User::verify_mail');
$routes->get('/hesabim', 'User::hesabim');
$routes->get('/card', 'User::card');

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

// 404
$routes->set404Override(function () {
    $data["title"] = "Mendirek Dükkan | 404";
    return view('errors/404', $data);
});
