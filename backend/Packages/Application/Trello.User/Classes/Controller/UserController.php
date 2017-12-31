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
use Trello\User\Domain\Factory\UserFactory;
use Trello\User\Domain\Repository\UserRepository;
use Trello\User\Exception\Exception;
use Trello\User\Exception\UserAlreadyExistException;
use Trello\User\Exception\UsernameIsRequiredException;
use Trello\User\Service\UserMessages;

class UserController extends ActionController
{

    protected $defaultViewObjectName = JsonView::class;

    /**
     * @var UserFactory
     * @Flow\Inject
     */
    protected $userFactory;

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
     * @var ViewHelper
     * @Flow\Inject
     */
    protected $viewHelper;

    /**
     * @param array $data
     */
    public function createAction(array $data)
    {
        $createdUser = null;
        $this->view->setVariablesToRender(['response']);
        try{
            $convertedData = $this->requestHelper->convertRequestToArray($data);
            $createdUser = $this->userFactory->create($convertedData);
            $this->userRepository->add($createdUser);

            $this->response->setStatus(200);
            $message = UserMessages::CREATE_USER;
            $success = true;
        }catch (UserAlreadyExistException $e){
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

        $response = $this->viewHelper->buildViewAssign($message, $success, $createdUser);
        $this->view->assign('response', $response);
    }
}
