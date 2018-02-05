<?php

namespace Trello\User\Domain\Resolvers;

use Neos\Flow\Persistence\PersistenceManagerInterface;
use Trello\User\Domain\Model\User;
use Trello\User\Domain\Repository\UserSearchRepository;
use Neos\Flow\Annotations as Flow;
use Trello\User\Exception\UsernameNotFoundException;

/**
 * Created by PhpStorm.
 * User: calison
 * Date: 18/01/18
 * Time: 23:53
 */

class UserResolve
{


    /**
     * @var PersistenceManagerInterface
     * @Flow\Inject
     */
    protected $persistenceManager;

    /**
     * @var UserSearchRepository
     * @Flow\Inject
     */
    protected $userRepository;


    /**
     * @param $id
     * @return object
     * @throws \Exception
     */
    public function getUserById($id)
    {
        $user = $this->persistenceManager->getObjectByIdentifier($id, User::class);

        if($user instanceof User){
            return $user;
        }

        throw new \Exception('Id de usuário não existe', 1516332021);
    }

    /**
     * @param $username
     * @return object
     * @throws \Exception
     */
    public function username($username)
    {
       $user = $this->userRepository->findUserByUsername($username);

       if($user instanceof User){
            return $user;
       }

       throw new \Exception('Username não existe', 1516332434);
    }

    public function getName()
    {

    }
}