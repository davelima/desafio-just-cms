<?php
namespace Admin\Controller;

use Library\Auth;
use Library\Controller;

/**
 * Security controller
 *
 * @author David Lima
 */
class SecurityController extends Controller
{
    /**
     * Authenticate user using login/password combination
     *
     * @see \Library\Auth::authenticate()
     */
    public function authAction()
    {
        if (Auth::isAuthenticated()) {
            header('Location: /admin/');
            exit();
        }

        if (isset($_POST) && $_POST) {
            $login = filter_input(\INPUT_POST, 'login', \FILTER_SANITIZE_STRING);
            $password = filter_input(\INPUT_POST, 'password', \FILTER_SANITIZE_STRING);

            $auth = new Auth();

            if ($auth->authenticate($login, $password)) {
                header('Location: /admin/');
            } else {
                $error = 'Usuário ou senha incorretos';
            }
        }

        $params = [
            'title' => 'Admin :: Login'
        ];

        if ($error) {
            $params['error'] = $error;
        }

        $this->renderView('Admin/View/auth.phtml', $params);
    }

    /**
     * Ends user session and redirect it to website home
     */
    public function logoutAction()
    {
        Auth::logout();
        header('Location: /');
    }
}
