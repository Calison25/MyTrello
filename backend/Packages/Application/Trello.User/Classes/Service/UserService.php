<?php

namespace Trello\User\Service;

use Neos\Flow\Annotations as Flow;
use Trello\User\Domain\Model\User;
use Trello\User\Domain\Repository\UserRepository;
use Trello\User\Exception\UsernameNotFoundException;

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
     * @var UserRepository
     * @Flow\Inject
     */
    protected $userRepository;

    /**
     * @param User $user
     * @throws \Trello\User\Exception\EmailIsNotValidException
     * @throws \Trello\User\Exception\UserAlreadyRegisteredException
     * @throws \Trello\User\Exception\UsernameIsRequiredException
     */
    public function userIsValid(User $user)
    {
        $this->credentialService->credentialIsValid($user->getCredential());
    }

    /**
     * @param $username
     * @return object
     * @throws UsernameNotFoundException
     */
    public function getUserByUsername($username)
    {
        $user = $this->userRepository->findUserByUsername($username);

        if($user instanceof User){
            return $user;
        }

        throw new UsernameNotFoundException(UserMessagesService::USER_NOTFOUND, 1515286664);
    }
}