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

class UserHandler
{

    public function handleUserCommand(UserCommand $command)
    {
        echo "Command Bus chamado por".PHP_EOL;
        echo "Nome: {$command->getName()}".PHP_EOL;
    }
}