<?php
namespace Trello\User\Controller;

/*
 * This file is part of the Trello.User package.
 */

use Neos\Flow\Annotations as Flow;
use Neos\Flow\Mvc\Controller\ActionController;
use Neos\Flow\Mvc\View\JsonView;
use Trello\Helper\Service\RequestHelper;
use Trello\Helper\Service\ViewHelper;
use Trello\User\Domain\Factory\AbstractUserFactory;
use Trello\User\Domain\Factory\UserFactory;
use Trello\User\Domain\Model\User;
use Trello\User\Domain\Repository\CredentialRepository;
use Trello\User\Domain\Repository\UserRepository;
use Trello\User\Exception\Exception;
use Trello\User\Exception\UserAlreadyRegisteredException;
use Trello\User\Exception\UsernameIsRequiredException;
use Trello\User\Service\UserMessagesService;
use Trello\User\Service\UserService;

class UserController extends ActionController
{

    protected $defaultViewObjectName = JsonView::class;

    /**
     * @var RequestHelper
     * @Flow\Inject
     */
    protected $requestHelper;

    /**
     * @var UserRepository
     * @Flow\Inject
     */
    protected $userRepository;

    /**
     * @var CredentialRepository
     * @Flow\Inject
     */
    protected $credentialRepository;

    /**
     * @var ViewHelper
     * @Flow\Inject
     */
    protected $viewHelper;

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
     * @param array $data
     */
    public function createAction(array $data)
    {
        $this->view->setVariablesToRender(['response']);
        try{
            $convertedData = $this->requestHelper->convertRequestToArray($data);
            $createdUser = $this->userFactory->create($convertedData);
            $this->userService->userIsValid($createdUser);
            $this->credentialRepository->add($createdUser->getCredential());
            $this->userRepository->add($createdUser);

            $this->response->setStatus(200);
            $message = UserMessagesService::CREATE_USER;
            $success = true;
        }catch (UserAlreadyRegisteredException $e){
            $this->response->setStatus(400);
            $message = $e->getMessage();
            $success = false;
        }catch (UsernameIsRequiredException $e){
            $this->response->setStatus(400);
            $message = $e->getMessage();
            $success = false;
        }catch (\Exception $e){
            $this->response->setStatus(400);
            $message = $e->getMessage();
            $success = false;
        }

        $response = $this->viewHelper->buildViewAssign($message, $success);
        $this->view->assign('response', $response);
    }


    /**
     * @param User $user
     * @param array $data
     */
    public function updateAction(User $user, $data)
    {
        $this->view->setVariablesToRender(['response']);

        try{
            $convertedData = $this->requestHelper->convertRequestToArray($data);
            $newUser = $this->userFactory->create($convertedData);
            $updatedUser = $user->update($newUser);

            $this->response->setStatus(200);
            $this->credentialRepository->update($updatedUser->getCredential());
            $this->userRepository->update($updatedUser);
            $message = UserMessagesService::UPDATED_USER;
            $success = true;
        }catch (\Exception $e){
            $this->response->setStatus(400);
            $message = $e->getMessage();
            $success = false;
        }

        $response = $this->viewHelper->buildViewAssign($message, $success);
        $this->view->assign('response', $response);
    }
}
