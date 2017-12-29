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
     *
     */
    public function createAction()
    {
        echo 'here!!!';
        die;
//        $this->response->setHeader('Access-Control-Allow-Origin', '*');
////        $this->response->setHeader('Access-Control-Allow-Methods', 'GET, PUT, POST, DELETE, OPTIONS');
////        $this->response->setHeader('Access-Control-Allow-Headers', 'X-Requested-With, content-type, X-HTTP-Method-Override, accept, key, Authorization');
////        $this->response->setHeader('Access-Control-Max-Age', '3600');
//        $this->view->setVariablesToRender('response');
//        $this->response->setStatus(200);
//        $this->view->assign('response', 'funcionou');
    }
}
