<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/store', 'Home::store');
$routes->get('/fetch','Home::fetch');
$routes->post('/removedata','Home::removedata');
$routes->post('/editdata','Home::editdata');
$routes->post('/updatedata','Home::updatedata');

$routes->get('/imgform','Home::imgform');
$routes->post('/upload','Home::upload');