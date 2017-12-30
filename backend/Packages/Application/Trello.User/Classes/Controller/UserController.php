<?php
namespace Trello\User\Controller;

/*
 * This file is part of the Trello.User package.
 */

use Neos\Flow\Annotations as Flow;
use Neos\Flow\Mvc\Controller\ActionController;
use Trello\Helper\Service\RequestHelper;
use Trello\User\Domain\Factory\UserFactory;
use Trello\User\Domain\Model\User;
use Trello\User\Exception\Exception;
use Trello\User\Exception\UserAlreadyExistException;
use Trello\User\Exception\UsernameIsRequiredException;

class UserController extends ActionController
{
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
     * @param array $data
     */
    public function createAction(array $data)
    {
        try{
            /**
             * @var User $user
             */
            $user = $this->requestHelper->createObjectFromRequest(User::class, $data);
            $createdUser = $this->userFactory->create($user);
        }catch (UserAlreadyExistException $e){

        }catch (UsernameIsRequiredException $e){

        }
        catch (Exception $e){

        }


//        $this->view->setVariablesToRender('response');
//        $this->response->setStatus(200);
//        $this->view->assign('response', 'funcionou');
    }
}
