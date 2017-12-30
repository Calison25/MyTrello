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
     * @param User $user
     * @return mixed
     */
    public function create(User $user);

    /**
     * @param string $username
     * @param array $data
     * @return User
     */
    public function edit($username, $data);

    /**
     * @param string $username
     * @return User
     */
    public function delete($username);
}