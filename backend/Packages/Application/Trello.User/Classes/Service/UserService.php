<?php

namespace Trello\User\Service;

use Neos\Flow\Annotations as Flow;
use Trello\User\Domain\Model\User;
use Trello\User\Domain\Repository\UserRepository;

/**
 * Created by PhpStorm.
 * User: calison
 * Date: 29/12/17
 * Time: 10:15
 */

class UserService
{

    /**
     * @var UserRepository
     * @Flow\Inject
     */
    protected $userRepository;
}