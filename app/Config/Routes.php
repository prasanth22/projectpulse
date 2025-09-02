<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// --------------------------------------------------
// Public Routes (Guest Access)
// --------------------------------------------------
$routes->get('/', 'HomeController::index');
$routes->post('register', 'AuthController::registerSubmit');
$routes->post('login', 'AuthController::loginSubmit');
$routes->get('/logout', 'AuthController::logout');

// --------------------------------------------------
// User Routes (After Login)
// --------------------------------------------------
$routes->group('', ['filter' => 'auth:auth'], static function ($routes) {
    $routes->get('/home', 'UserHome::index');

    $routes->get('user/profile', 'UserController::viewProfile');
    $routes->get('user/profile/edit', 'UserController::editProfile');
    $routes->post('user/profile/update', 'UserController::updateProfile');

    $routes->get('posts/create', 'PostsController::create');
    $routes->post('posts/create', 'PostsController::store');
    $routes->get('posts/view/(:num)', 'PostsController::view/$1');
    $routes->get('posts/edit/(:num)', 'PostsController::edit/$1');
    $routes->post('posts/update/(:num)', 'PostsController::update/$1');
    $routes->post('posts/upload_image', 'PostsController::uploadImage');


    $routes->get('projects', 'ProjectsController::index');
    $routes->get('projects/view/(:num)', 'ProjectsController::view/$1');

    $routes->get('topics', 'TopicsController::index');
    $routes->get('topics/view/(:num)', 'TopicsController::view/$1');

    $routes->post('questions/create', 'QuestionsController::store');

    $routes->get('answers', 'AnswersController::index');
    $routes->post('answers/store', 'AnswersController::store');
    $routes->get('answers/view/(:num)', 'AnswersController::view/$1');
    $routes->post('answers/update/(:num)', 'AnswersController::update/$1');

    $routes->get('search', 'SearchController::index'); 

});


// --------------------------------------------------
// Admin Routes (Separate Login and Access)
// --------------------------------------------------
$routes->group('admin', ['filter' => 'auth:admin'], static function ($routes) {
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
    $routes->get('projects_topics', 'Admin\ProjectTopicController::index');
    $routes->get('projects_topics/create', 'Admin\ProjectTopicController::create');
    $routes->post('projects_topics/store', 'Admin\ProjectTopicController::store');
    $routes->get('projects_topics/edit/(:num)', 'Admin\ProjectTopicController::edit/$1');
    $routes->post('projects_topics/update/(:num)', 'Admin\ProjectTopicController::update/$1');
    $routes->get('projects_topics/delete/(:num)', 'Admin\ProjectTopicController::delete/$1');
});



