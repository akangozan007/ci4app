<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// menambahkan routing
$routes->get('/test', 'Home::test');
// menambahkan controller & menambahkan routing
$routes->get('/razan', 'Razan::index');
$routes->get('/razan/developer', 'Razan::developer');
// route dengan param
// /param/inputan apapun 
// index/$1 mengurutkan variable yang masuk kedalam class
$routes->get('/param/(:any)', 'Param::index/$1');
