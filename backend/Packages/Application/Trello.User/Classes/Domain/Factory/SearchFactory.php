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
    protected $user;

    /**
     * @var boolean
     */
    protected $name;

    /**
     * @var string
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
        if(isset($arguments['user']) && !empty($arguments['user'])){
            $this->user = $arguments['user'];
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
}