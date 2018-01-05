<?php

namespace Trello\User\Domain\Factory;
use Trello\User\Domain\Model\User;

/**
 * Created by PhpStorm.
 * User: calison
 * Date: 29/12/17
 * Time: 09:59
 */

interface UserFactoryInterface
{

    /**
     * @param array $data
     * @return User
     */
    public function create($data);

    /**
     * @param User $user
     * @param array $data
     * @return User
     */
    public function update(User $user, $data);

    /**
     * @param string $username
     * @return User
     */
    public function delete($username);
}