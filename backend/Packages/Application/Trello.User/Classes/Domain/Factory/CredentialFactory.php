<?php

namespace Trello\User\Domain\Factory;

use Neos\Flow\Annotations as Flow;
use Trello\User\Domain\Model\Credential;
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

class CredentialFactory
{

    /**
     * @param array $data
     * @return Credential
     */
    public function create($data)
    {
        $credential = new Credential($data);
        return $credential;
    }
}