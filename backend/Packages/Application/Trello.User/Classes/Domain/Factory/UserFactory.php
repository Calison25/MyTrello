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
    public function create($data)
    {
        $credential = $this->credentialFactory->create($data);
        $newUser = new User($data['name'], $credential);

        return $newUser;
    }

    /**
     * @param User $user
     * @param array $data
     * @return mixed|void
     */
    public function update(User $user, $data)
    {

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