<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Admin');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// Siswa
$routes->get('/', 'Admin::index'); //localhost:8080
$routes->get('/siswa', 'Siswa::index');
$routes->post('/siswa', 'Siswa::save');
$routes->get('/siswa/create', 'Siswa::create');
$routes->post('/siswa/getSiswaById', 'Siswa::getSiswaById');
$routes->get('/siswa/(:num)/delete', 'Siswa::delete');
$routes->get('/siswa/(:num)/edit', 'Siswa::edit');
$routes->post('/siswa/update', 'Siswa::update');

// Kategori
$routes->get('/kategori', 'Kategori::index');
$routes->get('/kategori/create', 'Kategori::create');
$routes->post('/kategori/save', 'Kategori::save');
$routes->get('/kategori/(:num)/edit', 'Kategori::edit');
$routes->get('/kategori/(:num)/delete', 'Kategori::delete');
$routes->post('/kategori/update', 'Kategori::update');

// Buku
$routes->get('/buku', 'Buku::index');
$routes->get('/buku/create', 'Buku::create');
$routes->post('/buku/save', 'Buku::save');
$routes->get('/buku/(:num)/edit', 'Buku::edit');
$routes->post('/buku/update', 'Buku::update');
$routes->get('/buku/(:num)/delete', 'Buku::delete');

// Peminjaman
$routes->get('/peminjaman', 'Peminjaman::index');
$routes->post('/peminjaman', 'Peminjaman::save');
$routes->get('/peminjaman/(:num)/kembali', 'Peminjaman::kembali');
$routes->get('/peminjaman/(:num)/delete', 'Peminjaman::delete');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
