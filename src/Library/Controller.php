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
}
