<?php

namespace Trello\User\Domain\Factory;

use Neos\Flow\Annotations as Flow;
use Trello\User\Domain\Dto\CredentialDto;
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

class CredentialDtoFactory
{
    /**
     * @var CredentialFactory
     * @Flow\Inject
     */
    protected $credentialFactory;

    /**
     * @param array $data
     * @return CredentialDto
     */
    public function create($data)
    {
        $username = $data['username'] ?? '';

        return new CredentialDto($data['email'], md5($data['password']), $username);
    }
}