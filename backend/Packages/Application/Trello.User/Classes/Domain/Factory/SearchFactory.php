<?php

namespace Trello\User\Domain\Factory;

use Neos\Flow\Annotations as Flow;
use Trello\User\Domain\Model\User;
use Trello\User\Exception\UserAlreadyRegisteredException;
use Trello\User\Exception\UsernameIsRequiredException;
use Trello\User\Service\CredentialService;
use Trello\User\Service\UserService;

/**
 * Created by PhpStorm.
 * User: calison
 * Date: 29/12/17
 * Time: 09:58
 */

class SearchFactory
{

    /**
     * @var string
     */
    protected $argUsername;

    /**
     * @var boolean
     */
    protected $name;

    /**
     * @var boolean
     */
    protected $username;

    /**
     * @var boolean
     */
    protected $email;

    /**
     * @var boolean
     */
    protected $password;

    /**
     * @param $arguments
     * @return $this
     */
    public function create($arguments)
    {
        if(isset($arguments['arg_username']) && !empty($arguments['arg_username'])){
            $this->argUsername = $arguments['arg_username'];
        }

        if(isset($arguments['name']) && !empty($arguments['name'])){
            $this->name = true;
        }

        if(isset($arguments['username']) && !empty($arguments['username'])){
            $this->username = $arguments['username'];
        }

        if(isset($arguments['email']) && !empty($arguments['email'])){
            $this->email = true;
        }

        if(isset($arguments['password']) && !empty($arguments['password'])){
            $this->password = true;
        }

        return $this;
    }


    /**
     * @return string
     */
    public function getArgUsername()
    {
        return $this->argUsername;
    }

    /**
     * @return bool
     */
    public function isName()
    {
        return $this->name;
    }

    /**
     * @return bool
     */
    public function isUsername()
    {
        return $this->username;
    }

    /**
     * @return bool
     */
    public function isEmail()
    {
        return $this->email;
    }

    /**
     * @return bool
     */
    public function isPassword()
    {
        return $this->password;
    }
}