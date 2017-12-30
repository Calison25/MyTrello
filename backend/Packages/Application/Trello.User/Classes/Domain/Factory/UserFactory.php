<?php

namespace Trello\User\Domain\Factory;

use Neos\Flow\Annotations as Flow;
use Trello\User\Domain\Model\User;
use Trello\User\Service\UserService;

/**
 * Created by PhpStorm.
 * User: calison
 * Date: 29/12/17
 * Time: 09:58
 */

class UserFactory implements UserFactoryInterface
{

    /**
     * @var UserService
     * @Flow\Inject
     */
    protected $userService;

    /**
     * @param User $user
     * @return mixed|void
     */
    public function create(User $user)
    {
//        if(isset($data['username'])){
//            $user = $this->userService->getUserByUsername($data['username']);
//
//            if($user instanceof \Trello\User\Domain\Model\User){
//                throw new \Trello\User\Exception\UserAlreadyExistException('Username já existe', 1514553949);
//            }
//
//            //criar usuário;
//
//        }
//
//        throw new \Trello\User\Exception\UsernameIsRequiredException('Username não informado',1514553197);
    }

    /**
     * @param string $username
     * @param array $data
     * @return User|void
     */
    public function edit($username, $data)
    {
        // TODO: Implement edit() method.
    }

    /**
     * @param string $username
     * @return User|void
     */
    public function delete($username)
    {
        // TODO: Implement delete() method.
    }

}