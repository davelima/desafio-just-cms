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
    ],
    [
        'name' => 'admin-logout',
        'route' => '/admin/logout/',
        'module' => 'Admin',
        'controller' => 'Security',
        'action' => 'logout'
    ],
    [
        'name' => 'admin-list-posts',
        'route' => '/admin/posts/list/',
        'module' => 'Admin',
        'controller' => 'Posts',
        'action' => 'index'
    ],
    [
        'name' => 'admin-create-post',
        'route' => '/admin/posts/create/',
        'module' => 'Admin',
        'controller' => 'Posts',
        'action' => 'create'
    ],
    [
        'name' => 'admin-edit-post',
        'route' => '/admin/posts/edit/([0-9]+)/',
        'params' => [
            'id'
        ],
        'module' => 'Admin',
        'controller' => 'Posts',
        'action' => 'edit'
    ],
    [
        'name' => 'admin-delete-post',
        'route' => '/admin/posts/delete/([0-9]+)/',
        'params' => [
            'id'
        ],
        'module' => 'Admin',
        'controller' => 'Posts',
        'action' => 'delete'
    ]
];

foreach ($routes as $route) {
    Router::addRoute($route);
}
