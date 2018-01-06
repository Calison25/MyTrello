<?php

/**
 * Created by PhpStorm.
 * User: calison
 * Date: 02/01/18
 * Time: 21:39
 */

namespace Trello\User\Domain\Model;


use Neos\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Flow\Entity
 */
class Credential
{

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

    /**
     * @var string
     * @Flow\Validate(type="NotEmpty")
     */
    protected $password;


    /**
     * Credential constructor.
     * @param array $data
     */
    public function __construct($data)
    {
        $this->setUsername($data['username']);
        $this->setEmail($data['email']);
        $this->setPassword(md5($data['password']));
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
}