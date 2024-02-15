<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Pages;
use App\Controllers\Users;
use App\Controllers\News;

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




$routes->get('(:segment)', [Pages::class, 'view']);
