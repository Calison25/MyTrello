<?php

namespace Trello\User\Service;

use Neos\Flow\Annotations as Flow;
use Neos\Flow\Persistence\PersistenceManagerInterface;
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
     * @var PersistenceManagerInterface
     * @Flow\Inject
     */
    protected $persistenceManager;

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

    /**
     * @param $username
     * @return object
     * @throws UsernameNotFoundException
     */
    public function getIdentifierByUsername($username)
    {
        $user = $this->userRepository->findUserByUsername($username);

        if($user instanceof User){
            return $this->persistenceManager->getIdentifierByObject($user);
        }

        throw new UsernameNotFoundException(UserMessagesService::USER_NOTFOUND, 1516335645);
    }

    /**
     * @param string $httpRequest
     * @return array
     */
    public function getArgumentsFromHttpRequest($httpRequest)
    {
        $args = [];

        if(strpos($httpRequest,"name") !== false){
            $args['name'] = true;
        }

        if(strpos($httpRequest,"username") !== false){
            $args['username'] = true;
        }

        if(strpos($httpRequest,"email") !== false){
            $args['email'] = true;
        }

        if(strpos($httpRequest,"password") !== false){
            $args['password'] = true;
        }

        return $args;
    }
}