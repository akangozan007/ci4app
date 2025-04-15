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
// database sekolah page
$routes->get('/sekolah/(:segment)', 'Sekolah::detail/$1');
// routes form add page
$routes->get('/sekolah/guru/addguru', 'Sekolah::addguru');
$routes->get('/sekolah/siswa/addsiswa', 'Sekolah::addsiswa');
// routes form post edit page
$routes->get('/sekolah/guru/editguru/(:segment)', 'Sekolah::editguru/$1');
$routes->get('/sekolah/siswa/editsiswa/(:segment)', 'Sekolah::editsiswa/$1');
// routes form post edit page
$routes->post('/sekolah/editgurupost/(:segment)', 'Sekolah::updateguru/$1');
$routes->post('/sekolah/editsiswapost/(:segment)', 'Sekolah::updatesiswa/$1');
// routes add post guru dan siswa
$routes->post('/sekolah/saveGuru', 'Sekolah::saveGuru');
$routes->post('/sekolah/saveSiswa', 'Sekolah::saveSiswa');
// routes delete post siswa
$routes->delete('/sekolah/siswadelete/(:any)', 'Sekolah::siswadelete/$1');
// routes delete post guru
$routes->delete('/sekolah/gurudelete/(:any)', 'Sekolah::gurudelete/$1');