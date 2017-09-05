<?php

/**
 * System routes file
 *
 * @author David Lima
 */

$routes = [
    [
        'name' => 'front-home',
        'route' => '/',
        'module' => 'Front',
        'controller' => 'Default',
        'action' => 'index'
    ],
    [
        'name' => 'admin-home',
        'route' => '/admin/',
        'module' => 'Admin',
        'controller' => 'Default',
        'action' => 'index'
    ],
    [
        'name' => 'admin-auth',
        'route' => '/admin/auth/',
        'module' => 'Admin',
        'controller' => 'Security',
        'action' => 'auth'
    ], [
        'name' => 'admin-logout',
        'route' => '/admin/logout/',
        'module' => 'Admin',
        'controller' => 'Security',
        'action' => 'logout'
    ]
];

foreach ($routes as $route) {
    Router::addRoute($route);
}
