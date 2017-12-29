<?php
namespace Trello\User\Controller;

/*
 * This file is part of the Trello.User package.
 */

use Neos\Flow\Annotations as Flow;
use Neos\Flow\Mvc\Controller\ActionController;

class UserController extends ActionController
{

    /**
     * @var \UserFactory
     * @Flow\Inject
     */
    protected $userFactory;

    /**
     * @param array $data
     */
    public function createAction($data)
    {
        $result = $this->userFactory->create($data);

//        $this->view->setVariablesToRender('response');
//        $this->response->setStatus(200);
//        $this->view->assign('response', 'funcionou');
    }
}
