<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// Public Routes
$routes->get('/', 'Home::index');
$routes->post('contact/send', 'Home::submitContact');
$routes->get('resume/download', 'Home::downloadResume');

// Admin Auth Routes
$routes->get('admin/login', 'Admin\Auth::login');
$routes->post('admin/login', 'Admin\Auth::processLogin');
$routes->get('admin/logout', 'Admin\Auth::logout');

// Admin Protected Routes
$routes->group('admin', ['filter' => 'auth'], static function ($routes) {
    $routes->get('/', 'Admin\Dashboard::index');
    $routes->get('dashboard', 'Admin\Dashboard::index');

    // Projects CRUD
    $routes->get('projects', 'Admin\Projects::index');
    $routes->get('projects/create', 'Admin\Projects::create');
    $routes->post('projects/store', 'Admin\Projects::store');
    $routes->get('projects/edit/(:num)', 'Admin\Projects::edit/$1');
    $routes->post('projects/update/(:num)', 'Admin\Projects::update/$1');
    $routes->get('projects/delete/(:num)', 'Admin\Projects::delete/$1');

    // Skills CRUD
    $routes->get('skills', 'Admin\Skills::index');
    $routes->get('skills/create', 'Admin\Skills::create');
    $routes->post('skills/store', 'Admin\Skills::store');
    $routes->get('skills/edit/(:num)', 'Admin\Skills::edit/$1');
    $routes->post('skills/update/(:num)', 'Admin\Skills::update/$1');
    $routes->get('skills/delete/(:num)', 'Admin\Skills::delete/$1');

    // Experience CRUD
    $routes->get('experience', 'Admin\Experience::index');
    $routes->get('experience/create', 'Admin\Experience::create');
    $routes->post('experience/store', 'Admin\Experience::store');
    $routes->get('experience/edit/(:num)', 'Admin\Experience::edit/$1');
    $routes->post('experience/update/(:num)', 'Admin\Experience::update/$1');
    $routes->get('experience/delete/(:num)', 'Admin\Experience::delete/$1');

    // Education CRUD
    $routes->get('education', 'Admin\Education::index');
    $routes->get('education/create', 'Admin\Education::create');
    $routes->post('education/store', 'Admin\Education::store');
    $routes->get('education/edit/(:num)', 'Admin\Education::edit/$1');
    $routes->post('education/update/(:num)', 'Admin\Education::update/$1');
    $routes->get('education/delete/(:num)', 'Admin\Education::delete/$1');

    // Services CRUD
    $routes->get('services', 'Admin\Services::index');
    $routes->get('services/create', 'Admin\Services::create');
    $routes->post('services/store', 'Admin\Services::store');
    $routes->get('services/edit/(:num)', 'Admin\Services::edit/$1');
    $routes->post('services/update/(:num)', 'Admin\Services::update/$1');
    $routes->get('services/delete/(:num)', 'Admin\Services::delete/$1');

    // Resume Management
    $routes->get('resume', 'Admin\Resume::index');
    $routes->post('resume/upload', 'Admin\Resume::upload');

    // Contact Messages Management
    $routes->get('messages', 'Admin\Messages::index');
    $routes->get('messages/view/(:num)', 'Admin\Messages::view/$1');
    $routes->get('messages/delete/(:num)', 'Admin\Messages::delete/$1');

    // Social Links CRUD
    $routes->get('social-links', 'Admin\SocialLinks::index');
    $routes->get('social-links/create', 'Admin\SocialLinks::create');
    $routes->post('social-links/store', 'Admin\SocialLinks::store');
    $routes->get('social-links/edit/(:num)', 'Admin\SocialLinks::edit/$1');
    $routes->post('social-links/update/(:num)', 'Admin\SocialLinks::update/$1');
    $routes->get('social-links/delete/(:num)', 'Admin\SocialLinks::delete/$1');

    // Admin Profile
    $routes->get('profile', 'Admin\Profile::index');
    $routes->post('profile/update', 'Admin\Profile::update');
    $routes->post('profile/change-password', 'Admin\Profile::changePassword');

    // Site Settings
    $routes->get('settings', 'Admin\Settings::index');
    $routes->post('settings/update', 'Admin\Settings::update');
});
