<?php
namespace Front\Controller;

use \Library\Controller;

/**
 * Default Front Module Controller
 *
 * @author David Lima
 */
class DefaultController extends Controller
{
    public function indexAction()
    {
        $this->renderView('Front/View/index.phtml', [
            'title' => 'Front :: Bem vindo'
        ]);
    }
}
