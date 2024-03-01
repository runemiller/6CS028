<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Pages;
use App\Controllers\Users;
use App\Controllers\News;
use App\Controllers\Books;
use App\Controllers\Marks;
use App\Controllers\Front;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('pages/(:segment)', [Pages::class, 'view']);
$routes->get('users/login', [Users::class, 'login']);
$routes->get('users/logout', [Users::class, 'logout']);

$routes->get('news', [News::class, 'index']);
$routes->get('news/new', [News::class, 'new']);
$routes->post('news', [News::class, 'create']);
$routes->get('news/(:segment)', [News::class, 'show']);

$routes->get('home', [Front::class, 'home']);

$routes->get('books', [Books::class, 'index']);
$routes->get('books/new', [Books::class, 'new']);
$routes->post('books', [Books::class, 'create']);
$routes->get('books/(:segment)', [Books::class, 'show']);

$routes->get('marks', [Marks::class, 'index']);
$routes->get('marks/new', [Marks::class, 'new']);
$routes->post('marks', [Marks::class, 'create']);
$routes->get('marks/(:segment)', [Marks::class, 'show']);

$routes->get('(:segment)', [Pages::class, 'view']);
