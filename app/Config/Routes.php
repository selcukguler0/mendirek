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
$routes->get('/yazar/(:any)', 'Home::yazar/$1');
$routes->get('/yazarlar', 'Home::yazarlar');
$routes->get('/yazarlar/ara', 'Home::yazarlar_ara');
$routes->get('/yazarlar/(:any)', 'Home::yazarlar_grup/$1');
$routes->get('/lolla-kids', 'Home::lolla_kids');
$routes->get('/kitaplar/(:any)', 'Home::kategori_kitaplar/$1');
$routes->get('/kitap/(:any)', 'Home::kitap/$1');
$routes->get('/bulten', 'Home::bultenler');
$routes->get('/bulten/(:any)', 'Home::bulten/$1');

// User
$routes->match(['get', 'post'], '/login', 'User::login');
$routes->match(['get', 'post'], '/register', 'User::register');
$routes->match(['get', 'post'], '/forgot-pass', 'User::forgot_pass');
$routes->match(['get', 'post'], '/activation-code', 'User::activation_code');
$routes->get('/logout', 'User::logout');
$routes->get('/verify-mail', 'User::verify_mail');
$routes->get('/hesabim', 'User::hesabim');
$routes->get('/card', 'User::card');
$routes->match(["get", "post"],'/checkout', 'User::checkout');

// Api
$routes->get('/api/loadtowns/(:any)', 'Api::loadTowns/$1');

// Iyzico
// $routes->post('/iyzico/pay', 'Iyzico::payWithIyzico');
$routes->post('/iyzico/bincontrol', 'Iyzico::binControl');
$routes->post('/iyzico/start3DS', 'Iyzico::start3DS');
$routes->match(["get", "post"],'/iyzico/check3D', 'Iyzico::check3D');
//ödeme sayfası
$routes->get('/iyzico/payout', 'Iyzico::payout');

// Admin
$routes->get('/admin', 'Admin::index');
$routes->get('/admin/editbook/(:any)', 'Admin::editbook/$1');
$routes->post('/admin/editbook', 'Admin::editbook/$1');
$routes->match(['get', 'post'], '/admin/addbook', 'Admin::addbook');
$routes->post('/admin/deletebook', 'Admin::deletebook');
$routes->match(['get', 'post'], '/admin/login', 'Admin::login');
$routes->get('/admin/logout', 'Admin::logout');
//--news
$routes->get('/admin/news', 'Admin::news');
$routes->get('/admin/editnews/(:any)', 'Admin::editnews/$1');
$routes->post('/admin/editnews', 'Admin::editnews/$1');
$routes->post('/admin/deletenews', 'Admin::deletenews');
$routes->match(['get', 'post'], '/admin/addnews', 'Admin::addnews');

// 404
$routes->set404Override(function () {
    $data["title"] = "Mendirek Dükkan | 404";
    return view('errors/404', $data);
});
