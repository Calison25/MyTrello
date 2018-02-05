<?php
namespace Trello\User\Controller;

/*
 * This file is part of the Trello.User package.
 */

use Neos\Flow\Annotations as Flow;
use Neos\Flow\Mvc\Controller\ActionController;
use Neos\Flow\Mvc\View\JsonView;
use Neos\Flow\Persistence\PersistenceManagerInterface;
use Trello\Helper\Domain\Factory\ViewFactory;
use Trello\Helper\Service\RequestHelperService;
use Trello\Helper\Service\ViewHelperService;
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
     * @var ViewHelperService
     * @Flow\Inject
     */
    protected $viewHelperService;

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
     * @var ViewFactory
     * @Flow\Inject
     */
    protected $viewFactory;

    /**
     * @var PersistenceManagerInterface
     * @Flow\Inject
     */
    protected $persistenceManager;

    /**
     * @param array $data
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

//        $viewResponse = $this->viewFactory->create($this->view, $this->response, $message, $success);
    }


    /**
     * @param User $user
     * @param array $data
     */
    public function updateAction(User $user, $data)
    {
        try{
            $newUser = $this->userFactory->create($data);
            $updatedUser = $user->update($newUser);

            $this->response->setStatus(200);
            $this->userRepository->update($updatedUser);
            $message = UserMessagesService::UPDATED_USER;
            $success = true;
        }catch (\Exception $e){
            $this->response->setStatus(400);
            $message = $e->getMessage();
            $success = false;
        }

        $viewResponse = $this->viewFactory->create($this->view, $this->response, $message, $success);
        $this->viewHelperService->assignView($viewResponse);
    }

    /**
     * @param User $user
     */
    public function deleteAction(User $user)
    {
        try{
            $this->userRepository->remove($user);
            $this->response->setStatus(200);
            $message = UserMessagesService::USER_DELETED;
            $success = true;
        }catch (\Exception $e){
            $this->response->setStatus(400);
            $message = $e->getMessage();
            $success = false;
        }

        $viewResponse = $this->viewFactory->create($this->view, $this->response, $message, $success);
        $this->viewHelperService->assignView($viewResponse);
    }
}
