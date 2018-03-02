<?php

namespace Trello\User\CommandBus\Factory;
use League\Tactician\Handler\CommandHandlerMiddleware;
use League\Tactician\Handler\CommandNameExtractor\ClassNameExtractor;
use League\Tactician\Handler\Locator\InMemoryLocator;
use League\Tactician\Handler\MethodNameInflector\HandleClassNameInflector;
use Trello\User\Command\UserCommandController;
use Trello\User\CommandBus\Handler\UserHandler;

/**
 * Created by PhpStorm.
 * User: calison
 * Date: 02/03/18
 * Time: 00:02
 */

class MiddlewareFactory
{

    /**
     * @param object $handlerEntity
     * @param string $commandClassName
     * @return CommandHandlerMiddleware
     */
    public function create($handlerEntity, $commandClassName)
    {
        $locator = new InMemoryLocator();
        $locator->addHandler($handlerEntity, $commandClassName);

        $handlerMiddleware = new CommandHandlerMiddleware(
            new ClassNameExtractor(),
            $locator,
            new HandleClassNameInflector()
        );

        return $handlerMiddleware;
    }
}