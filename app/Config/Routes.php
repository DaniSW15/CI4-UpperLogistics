<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'ArticleController::index');
$routes->get('/article', 'ArticleController::showCreateForm');
$routes->get('/article/edit/(:num)', 'ArticleController::edit/$1');
$routes->post('/article/update/(:num)', 'ArticleController::update/$1');
$routes->get('/article/detalis/(:num)', 'ArticleController::detalis/$1');
$routes->post('/article/create', 'ArticleController::create');
$routes->get('/article/delete/(:num)', 'ArticleController::delete/$1');