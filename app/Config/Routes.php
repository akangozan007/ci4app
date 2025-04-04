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

$routes->get('/param/(:any)', 'Param::index/$1');
// routes khusus admin
// Get Welcome Admin Panel Page
$routes->get('/users', 'Admin\Users::index');


// static page
$routes->get('/pages/', 'Pages::index');
$routes->get('/pages/about', 'Pages::about');
$routes->get('/pages/contact-me', 'Pages::contact');

// database sekolah page
$routes->get('/sekolah', 'Sekolah::index');
