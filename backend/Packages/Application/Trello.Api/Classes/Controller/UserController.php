<?php
namespace Trello\Api\Controller;

/*
 * This file is part of the Trello.Api package.
 */

use Neos\Flow\Annotations as Flow;
use Neos\Flow\Mvc\Controller\ActionController;
use Neos\Flow\Mvc\View\JsonView;
use Neos\Flow\Persistence\PersistenceManagerInterface;
use Trello\Helper\Domain\Factory\JsonViewFactory;
use Trello\User\Domain\Factory\UserFactory;
use Trello\User\Domain\Repository\UserRepository;
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
     * @var PersistenceManagerInterface
     * @Flow\Inject
     */
    protected $persistenceManager;

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
        }catch (\Exception $e){
        }
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
        }catch (\Exception $e){

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
        }catch (\Exception $e){

        }
    }
}
