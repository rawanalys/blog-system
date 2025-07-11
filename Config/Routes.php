<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Post');
$routes->setDefaultMethod('homepage');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true); // You can disable for security later

// 🔐 Auth Routes
$routes->get('/auth', 'Auth::index');            // Login page
$routes->post('/auth/login', 'Auth::login');     // Handle login POST
$routes->get('/auth/register', 'Auth::register'); // Show register form
$routes->post('/auth/save', 'Auth::save');        // Save new user
$routes->get('/logout', 'Auth::logout');          // Logout and destroy session

$routes->get('/dashboard', 'Post::dashboard');    
$routes->get('/posts/create', 'Post::create');
$routes->post('/posts/store', 'Post::store');
$routes->get('/posts/edit/(:num)', 'Post::edit/$1');
$routes->post('/posts/update/(:num)', 'Post::update/$1');
$routes->get('/posts/delete/(:num)', 'Post::delete/$1');

$routes->get('/posts/view/(:num)', 'Post::view/$1');
$routes->get('/', 'Post::homepage');             
$routes->get('/author/(:num)', 'Post::author/$1');