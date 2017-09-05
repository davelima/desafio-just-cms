<?php

namespace Model;

/**
 * Administrator model
 *
 * @author David Lima
 */
class Administrator
{
    /**
     * Administrator name
     *
     * @var string
     */
    public $name;

    /**
     * Administrator login
     *
     * @var string
     */
    public $login;

    /**
     * Administrator password
     *
     * @var string
     */
    public $password;

    /**
     * Administrator ID
     *
     * @var integer
     */
    public $id;

    /**
     * Sets administrator name
     *
     * @param $name
     * @return Administrator
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Gets administrator name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets administrator login
     *
     * @param $login
     * @return Administrator
     */
    public function setLogin($login)
    {
        $this->login = $login;
        return $this;
    }

    /**
     * Gets administrator login
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->getLogin();
    }

    /**
     * Sets administrator password
     *
     * @param $password
     * @return Administrator
     */
    public function setPassword($password)
    {
        $this->password = password_hash($password, \PASSWORD_DEFAULT);
        return $this;
    }

    /**
     * Gets administrator password (hashed)
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->getPassword();
    }

    /**
     * Sets administrator ID
     *
     * @param $id
     * @return Administrator
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Gets administrator ID
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
