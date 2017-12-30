<?php
namespace Trello\User\Controller;

/*
 * This file is part of the Trello.User package.
 */

use Neos\Flow\Annotations as Flow;
use Neos\Flow\Mvc\Controller\ActionController;
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
     * @param User $user
     */
    public function createAction(User $user)
    {

        var_dump($user->getName());
        die;

        try{
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
