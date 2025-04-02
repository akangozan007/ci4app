<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pages::index');
// menambahkan routing
$routes->get('/test', 'Home::test');
// menambahkan controller & menambahkan routing
$routes->get('/razan', 'Razan::index');
$routes->get('/razan/developer', 'Razan::developer');
// route dengan param
// /param/inputan apapun 
// index/$1 mengurutkan variable yang masuk kedalam class
// (:any) untuk apapun
// (:num) untuk number
// (:alphanum) untuk alphabet & number
$routes->get('/param/(:any)', 'Param::index/$1');
// routes khusus admin
// Get Welcome Admin Panel Page
$routes->get('/users', 'Admin\Users::index');


// static page
$routes->get('/pages/', 'Pages::index');
$routes->get('/pages/about', 'Pages::about');
