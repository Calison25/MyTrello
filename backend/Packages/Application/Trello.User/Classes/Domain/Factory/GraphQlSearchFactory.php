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

class GraphQlSearchFactory
{
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

    public function setArguments($args)
    {
        if(isset($args['name']) && !empty($args['name'])){
            $this->name = true;
        }

        if(isset($args['username']) && !empty($args['username'])){
            $this->username = true;
        }

        if(isset($args['email']) && !empty($args['email'])){
            $this->email = true;
        }

        if(isset($args['password']) && !empty($args['password'])){
            $this->password = true;
        }
    }
}