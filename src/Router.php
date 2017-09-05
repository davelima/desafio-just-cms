<?php

/**
 * Router class
 *
 * @author David Lima
 * @version 1.0
 */
class Router
{

    /**
     * Registered routes
     *
     * @var array
     */
    public static $routes = [];

    /**
     * Route that matches with current URI
     *
     * @var string
     */
    public static $matchingRoute = null;

    /**
     * GET params
     *
     * @var array
     */
    public static $params = [];

    /**
     * Register a route
     *
     * @param array $route
     */
    public static function addRoute(array $route)
    {
        $route['original-route'] = $route['route'];
        $route['route'] = '/^' . str_replace('/', "\\/", $route['route']) . '$/is';
        self::$routes[$route['name']] = $route;
    }

    /**
     * Search by a matching route and load it's controller/action
     */
    public static function dispatch()
    {
        $url = $_SERVER['REQUEST_URI'];
        $requestedRoute = strstr($url, '/');
        $requestedRoute = substr($url, strpos($url, $requestedRoute));

        if (! $requestedRoute) {
            $requestedRoute = '/';
        }

        foreach (self::$routes as $route) {
            if (preg_match($route['route'], $requestedRoute, $matches)) {
                self::$matchingRoute = $route;

                if (isset($route['params']) && $route['params']) {
                    array_shift($matches);
                    self::$params = array_combine($route['params'], $matches);
                }

                $module = $route['module'];

                $controllerName = $route['controller'];
                $controller = "{$module}\\Controller\\{$controllerName}Controller";
                $action = $route['action'] . 'Action';

                $controller = new $controller();
                $controller->module = $module;

                if (self::$params) {
                    foreach (self::$params as $key => $val) {
                        $controller->setParam($key, $val);
                    }
                }

                $controller->$action();

                return;
            }
        }
    }
}
