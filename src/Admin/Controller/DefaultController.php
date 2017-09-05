<?php
namespace Admin\Controller;

use Library\Auth;
use \Library\Controller;

/**
 * Default Admin Module Controller
 *
 * @author David Lima
 */
class DefaultController extends Controller
{

    /**
     * Prevents non-authenticated users to access restrict area
     */
    public function __construct()
    {
        if (! Auth::isAuthenticated()) {
            header('Location: /admin/auth/');
            exit();
        }
    }

    public function indexAction()
    {
        $this->renderView('Admin/View/index.phtml', [
            'title' => 'Admin :: Bem vindo'
        ]);
    }
}
