<?php

namespace Trello\User\CommandBus\Handler;
use Trello\User\Command\UserCommandController;
use Trello\User\CommandBus\Command\UserCommand;

/**
 * Created by PhpStorm.
 * User: calison
 * Date: 01/03/18
 * Time: 22:45
 */

class UserHandlerController
{

    public function handleUserCommandController(UserCommandController $command)
    {
        $command->userCommand();
    }
}