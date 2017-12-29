<?php
namespace Trello\User\Domain\Model;

/*
 * This file is part of the Trello.User package.
 */

use Neos\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Flow\Entity
 */
class User
{
    /**
     * @var string
     * @Flow\Validate(type="NotEmpty")
     */
    protected $name;

    /**
     * @var string
     * @Flow\Validate(type="NotEmpty")
     */
    protected $password;

    /**
     * @var string
     * @Flow\Validate(type="NotEmpty")
     */
    protected $username;

    /**
     * @var string
     * @Flow\Validate(type="NotEmpty")
     */
    protected $email;


    public function __construct($data)
    {
        $this->setName($data['name']);
        $this->setPassword($data['password']);
        $this->setUsername($data['username']);
        $this->setEmail($data['email']);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }
}
