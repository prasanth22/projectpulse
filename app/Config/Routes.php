<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// --------------------------------------------------
// Public Routes (Guest Access)
// --------------------------------------------------
$routes->get('/', 'HomeController::index');
#$routes->get('/register', 'Auth::register');
$routes->post('register', 'AuthController::registerSubmit');
#$routes->get('/login', 'Auth::login');
$routes->post('login', 'AuthController::loginSubmit');
$routes->get('/logout', 'AuthController::logout');

// --------------------------------------------------
// User Routes (After Login)
// --------------------------------------------------
$routes->get('/home', 'UserHome::index');

$routes->get('user/profile', 'UserController::viewProfile');
$routes->get('user/profile/edit', 'UserController::editProfile');
$routes->post('user/profile/update', 'UserController::updateProfile');

$routes->post('posts/create', 'PostsController::create');
$routes->get('posts/view/(:num)', 'PostsController::view/$1');
$routes->post('posts/update/(:num)', 'PostsController::update/$1');

//$routes->get('admin/user-profile/(:num)', 'Admin\UserController::view/$1'); // for admin

// Add more user-only routes below as needed
// $routes->get('/projects', 'Project::index');

// --------------------------------------------------
// Admin Routes (Separate Login and Access)
// --------------------------------------------------
$routes->group('admin', static function ($routes) {
    // Admin Auth
    // $routes->get('login', 'Admin\Auth::login');
    // $routes->post('login', 'Admin\Auth::doLogin');
    $routes->get('logout', 'AuthController::logout');

    // Admin Dashboard & User Management
    $routes->get('dashboard', 'Admin\Dashboard::index');
    $routes->get('users', 'Admin\UserController::index');
    $routes->post('users/role/(:num)', 'Admin\UserController::updateRole/$1');
    $routes->get('users/block/(:num)', 'Admin\UserController::blockUser/$1');
    $routes->get('users/activate/(:num)', 'Admin\UserController::activateUser/$1');
    $routes->get('projects', 'Admin\ProjectController::index');
    $routes->get('projects/create', 'Admin\ProjectController::create');
    $routes->post('projects/store', 'Admin\ProjectController::store');
    $routes->get('projects/edit/(:num)', 'Admin\ProjectController::edit/$1');
    $routes->post('projects/update/(:num)', 'Admin\ProjectController::update/$1');
    $routes->get('projects/delete/(:num)', 'Admin\ProjectController::delete/$1');
});



