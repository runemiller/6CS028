<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Pages;
use App\Controllers\Books;
use App\Controllers\Marks;
use App\Controllers\Front;
use App\Controllers\Ajax;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('home', [Front::class, 'home']);
$routes->get('home/search', [Front::class, 'search']);
$routes->post('home', [Front::class, 'create']);

$routes->get('books', [Books::class, 'index']);
$routes->get('books/new', [Books::class, 'new']);
$routes->post('books', [Books::class, 'create']);
$routes->get('books/edit', [Books::class, 'edit']);
$routes->post('books/delete', [Books::class, 'delete']);
$routes->get('books/(:segment)', [Books::class, 'show']);
$routes->get('ajax/get/sortAuthor', [Ajax::class, 'sortAuthor']);
$routes->get('ajax/get/sortTitle', [Ajax::class, 'sortTitle']);
$routes->get('ajax/get/sortDate', [Ajax::class, 'sortDate']);
$routes->get('ajax/get/(:segment)', [Ajax::class, 'get']);


$routes->get('marks', [Marks::class, 'index']);
$routes->get('marks/new', [Marks::class, 'new']);
$routes->post('marks', [Marks::class, 'create']);
$routes->get('marks/(:segment)', [Marks::class, 'show']);

$routes->get('(:segment)', [Pages::class, 'view']);
