<?php

namespace Trello\User\Service;

use Neos\Flow\Annotations as Flow;
use Neos\Flow\Persistence\PersistenceManagerInterface;
use Trello\User\Domain\Factory\UserFactory;
use Trello\User\Domain\Model\User;
use Trello\User\Domain\Repository\UserRepository;
use Trello\User\Domain\Repository\UserSearchRepository;
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
     * @var UserFactory
     * @Flow\Inject
     */
    protected $userFactory;

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
     * @param array $data
     * @return object
     * @throws UsernameNotFoundException
     * @throws \Trello\User\Exception\EmailIsNotValidException
     * @throws \Trello\User\Exception\UserAlreadyRegisteredException
     */
    public function updateUser(array $data)
    {
        $currentUser = $this->getUserByUsername($data['username']);

        if($currentUser instanceof User){
            $data['username'] = $data['newUsername'] ?? $data['username'];
            $newUser = $this->userFactory->create($data);
            $currentUser->update($newUser);

            return $currentUser;
        }

        throw new UsernameNotFoundException(UserMessagesService::USER_NOTFOUND, 1518237162);
    }
}