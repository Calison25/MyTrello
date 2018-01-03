<?php

namespace Trello\User\Domain\Factory;

use Neos\Flow\Annotations as Flow;
use Trello\User\Domain\Model\User;
use Trello\User\Exception\UserAlreadyExistException;
use Trello\User\Exception\UsernameIsRequiredException;
use Trello\User\Service\CredentialService;
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
     * @var CredentialFactory
     * @Flow\Inject
     */
    protected $credentialFactory;

    /**
     * @param array $data
     * @return User
     * @throws UserAlreadyExistException
     * @throws UsernameIsRequiredException
     * @throws \Neos\Flow\Persistence\Exception\IllegalObjectTypeException
     * @throws \Trello\User\Exception\EmailIsNotValidException
     */
    public function create(array $data)
    {
        $credential = $this->credentialFactory->create($data);
        $newUser = new User($data, $credential);

        return $newUser;
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