<?php

namespace Library;

/**
 * Authentication library
 *
 * @author David Lima
 */
class Auth
{
    /**
     * Checks if there is an user authenticated
     *
     * @return bool
     */
    public static function isAuthenticated()
    {
        return (isset($_SESSION['just_cms_user']));
    }

    /**
     * Returns data from authenticated user if it exists.
     * Otherwise, returns null
     *
     * @return null|object
     */
    public static function getAuthenticatedUser()
    {
        if (self::isAuthenticated()) {
            return $_SESSION['just_cms_user'];
        }

        return null;
    }

    /**
     * Checks for user login and password to attempt an authentication
     * If the authentication succeeds, user data will be written on session
     *
     * @param string $login User login
     * @param string $password User password
     * @return bool
     */
    public function authenticate($login, $password)
    {
        $database = new Database();
        $user = $database->select('administrators', [
            'password',
            'name',
            'id'
        ], [
            "login = '{$login}'"
        ], 1);

        if ($user && password_verify($password, $user[0]->password)) {
            $_SESSION['just_cms_user'] = $user[0];

            return true;
        } else {
            return false;
        }
    }

    /**
     * Unsets authenticated user session
     */
    public static function logout()
    {
        if (self::isAuthenticated()) {
            unset($_SESSION['just_cms_user']);
        }
    }
}
