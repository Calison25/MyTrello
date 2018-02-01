<?php

namespace Trello\User\Service;

use Neos\Flow\Annotations as Flow;
use Neos\Flow\Persistence\PersistenceManagerInterface;
use Trello\User\Domain\Model\User;
use Trello\User\Domain\Repository\UserRepository;
use Trello\User\Exception\UsernameNotFoundException;

/**
 * Created by PhpStorm.
 * User: calison
 * Date: 29/12/17
 * Time: 10:15
 */

class UserGraphQlService
{
    /**
     * @param string $httpRequest
     * @return array
     */
    public function getArgumentsFromHttpRequest($httpRequest)
    {
        $args = [];

        if(strpos($httpRequest,"user") !== false){
            $args['user'] = $this->getRequestParameterFromUser($httpRequest);
        }

        if(strpos($httpRequest,"name") !== false){
            $args['name'] = true;
        }

        if(strpos($httpRequest,"username") !== false){
            $args['username'] = $this->getRequestParameterFromUsername($httpRequest);
        }

        if(strpos($httpRequest,"email") !== false){
            $args['email'] = true;
        }

        if(strpos($httpRequest,"password") !== false){
            $args['password'] = true;
        }

        return $args;
    }

    /**
     * @param $httpRequest
     */
    private function getRequestParameterFromUser($httpRequest)
    {

    }

    /**
     * @param $httpRequest
     */
    private function getRequestParameterFromUsername($httpRequest)
    {

    }
}