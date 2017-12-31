<?php

namespace Trello\User\Domain\Factory;

use Neos\Flow\Annotations as Flow;
use Trello\User\Domain\Model\User;
use Trello\User\Exception\UserAlreadyExistException;
use Trello\User\Exception\UsernameIsRequiredException;
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
     * @param array $data
     * @return User
     * @throws UserAlreadyExistException
     * @throws UsernameIsRequiredException
     */
    public function create(array $data)
    {
        if(isset($data['username']) && isset($data['email'])){
            $newUser = new User($data);

            if($this->userService->userIsRegistered($newUser)){
                throw new UserAlreadyExistException('Usuário já existe', 1514553949);
            }

            return $newUser;
        }

        throw new UsernameIsRequiredException('Nome de usuário e email são obrigatórios',1514553197);
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