<?php
namespace Trello\User\Controller;

/*
 * This file is part of the Trello.User package.
 */

use League\Tactician\CommandBus;
use League\Tactician\Handler\CommandHandlerMiddleware;
use League\Tactician\Handler\CommandNameExtractor\ClassNameExtractor;
use League\Tactician\Handler\Locator\InMemoryLocator;
use League\Tactician\Handler\MethodNameInflector\HandleClassNameInflector;
use League\Tactician\Handler\MethodNameInflector\HandleInflector;
use Neos\Flow\Annotations as Flow;
use Neos\Flow\Mvc\Controller\ActionController;
use Neos\Flow\Mvc\View\JsonView;
use Neos\Flow\Persistence\PersistenceManagerInterface;
use Trello\Helper\Domain\Factory\JsonViewFactory;
use Trello\User\Command\UserCommandController;
use Trello\User\CommandBus\Command\UserCommand;
use Trello\User\CommandBus\Factory\MiddlewareFactory;
use Trello\User\CommandBus\Handler\UserHandler;
use Trello\User\CommandBus\Handler\UserHandlerController;
use Trello\User\Domain\Factory\UserFactory;
use Trello\User\Domain\Model\User;
use Trello\User\Domain\Repository\UserRepository;
use Trello\User\Domain\Repository\UserSearchRepository;
use Trello\User\Exception\Exception;
use Trello\User\Exception\UserAlreadyRegisteredException;
use Trello\User\Exception\UsernameIsRequiredException;
use Trello\User\Service\UserMessagesService;
use Trello\User\Service\UserService;

class UserController extends ActionController
{

    protected $defaultViewObjectName = JsonView::class;

    /**
     * @var UserRepository
     * @Flow\Inject
     */
    protected $userRepository;

    /**
     * @var UserService
     * @Flow\Inject
     */
    protected $userService;

    /**
     * @var UserFactory
     * @Flow\Inject
     */
    protected $userFactory;

    /**
     * @var JsonViewFactory
     * @Flow\Inject
     */
    protected $jsonViewFactory;

    /**
     * @var PersistenceManagerInterface
     * @Flow\Inject
     */
    protected $persistenceManager;

    /**
     * @var MiddlewareFactory
     * @Flow\Inject
     */
    protected $middlewareFactory;


    /**
     * @param array $data
     * @return string
     */
    public function createAction(array $data)
    {

        try{
            $createdUser = $this->userFactory->create($data);
            $this->userService->userIsValid($createdUser);
            $this->userRepository->add($createdUser);

            $message = UserMessagesService::CREATE_USER;
            $success = true;
        }catch (\Exception $e){
            $message = $e->getMessage();
            $success = false;
        }

        return $this->jsonViewFactory->create($message, $success);
    }


    /**
     * @param array $data
     * @return string
     */
    public function updateAction(array $data)
    {
        try{
            $updatedUser = $this->userService->updateUser($data);

            $this->userRepository->update($updatedUser);
            $message = UserMessagesService::UPDATED_USER;
            $success = true;
        }catch (\Exception $e){
            $message = $e->getMessage();
            $success = false;
        }

        return $this->jsonViewFactory->create($message, $success);
    }

    /**
     * @param array $data
     * @return string
     */
    public function deleteAction(array $data)
    {
        try{
            $user = $this->userService->getUserByUsername($data['username']);
            $this->userRepository->remove($user);
            $message = UserMessagesService::USER_DELETED;
            $success = true;
        }catch (\Exception $e){
            $message = $e->getMessage();
            $success = false;
        }

        return $this->jsonViewFactory->create($message, $success);
    }

    public function useCommandBusForCommandControllerAction()
    {
        $handlerMiddleware = $this->middlewareFactory->create(new UserHandlerController(), UserCommandController::class);

        $command = new UserCommandController();
        $commandBus = new CommandBus([$handlerMiddleware]);
        $commandBus->handle($command);
    }

    /**
     * @param string $name
     */
    public function useCommandBusForCommandClassAction($name)
    {
        $handlerMiddleware = $this->middlewareFactory->create(new UserHandler(), UserCommand::class);

        $command = new UserCommand($name);
        $commandBus = new CommandBus([$handlerMiddleware]);
        $commandBus->handle($command);
    }
}