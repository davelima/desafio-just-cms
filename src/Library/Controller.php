<?php

namespace Library;

/**
 * Base controller class
 * All controllers must extends this one
 *
 * @author David Lima
 */
class Controller
{
    /**
     * Module to search for the layout/view file (Must be "Admin" or "Front")
     *
     * @var string
     */
    public $module;

    /**
     * GET params
     *
     * @var string
     */
    protected $params = [];

    /**
     * Finds and render default layout file with the defined view
     *
     * @param string $view View to load inside layout
     * @param array|null $params Parameters to pass to View
     */
    public function renderView($view, array $params = null)
    {
        $module = $this->module;

        $view = __DIR__ . "/../" . $view;
        extract($params);

        $layoutFile = __DIR__ . "/../{$module}/Layout/Default.phtml";
        if (file_exists($layoutFile)) {
            require_once($layoutFile);
        }
    }

    /**
     * Sets a GET param
     *
     * @param string $key
     * @param mixed $value
     */
    public function setParam($key, $value)
    {
        $this->params[$key] = $value;
    }

    /**
     * Return a GET param
     *
     * @param string $key
     * @param string $default
     * @return string
     */
    public function getParam($key, $default = null)
    {
        if (isset($this->params[$key])) {
            return $this->params[$key];
        }

        return $default;
    }

    /**
     * Return all GET params
     */
    public function getParams()
    {
        return $this->params;
    }
}
