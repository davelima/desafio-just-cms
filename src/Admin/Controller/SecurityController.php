<?php
namespace Admin\Controller;

use \Library\Controller;

/**
 * Default Admin Module Controller
 *
 * @author David Lima
 */
class DefaultController extends Controller
{
    public function indexAction()
    {
        $this->renderView('Admin/View/index.phtml', [
            'title' => 'Admin :: Bem vindo'
        ]);
    }

    public function authAction()
    {
        $this->renderView('Admin/View/auth.phtml', [
            'title' => 'Admin :: Login'
        ]);
    }
}
