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
    ]
];

foreach ($routes as $route) {
    Router::addRoute($route);
}
