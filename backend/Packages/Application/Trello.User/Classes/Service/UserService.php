<?php

namespace Trello\User\Service;

use Neos\Flow\Annotations as Flow;
use Trello\User\Domain\Model\User;
use Trello\User\Domain\Repository\UserRepository;

/**
 * Created by PhpStorm.
 * User: calison
 * Date: 29/12/17
 * Time: 10:15
 */

class UserService
{

    /**
     * @var CredentialService
     * @Flow\Inject
     */
    protected $credentialService;

    /**
     * @param User $user
     * @throws \Trello\User\Exception\EmailIsNotValidException
     * @throws \Trello\User\Exception\UserAlreadyExistException
     * @throws \Trello\User\Exception\UsernameIsRequiredException
     */
    public function userIsValid(User $user)
    {
        $this->credentialService->credentialIsValid($user->getCredential());
    }
}