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

class UserFactory
{
    /**
     * @var CredentialFactory
     * @Flow\Inject
     */
    protected $credentialFactory;

    /**
     * @param $data
     * @return User
     */
    public function create($data)
    {
        $credential = $this->credentialFactory->create($data);
        return new User($data['name'], $credential);
    }
}