<?php

namespace Trello\User\Service;

use Neos\Flow\Annotations as Flow;
use Neos\Flow\Persistence\PersistenceManagerInterface;
use Trello\Helper\Service\GeneralHelperService;
use Trello\User\Domain\Model\User;
use Trello\User\Domain\Repository\UserSearchRepository;
use Trello\User\Exception\RequestArgumentException;
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
     * @param $httpRequest
     * @return array
     * @throws RequestArgumentException
     */
    public function getArgumentsFromHttpRequest($httpRequest)
    {
        $args = [];

        if(strpos($httpRequest,"user") !== false){
            $args = $this->getRequestParameter($httpRequest);
        }

        if(strpos($httpRequest,"name") !== false){
            $args['name'] = true;
        }

        if(strpos($httpRequest,"username") !== false){
            $args['username'] = true;
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
     * @return array
     * @throws RequestArgumentException
     */
    private function getRequestParameter($httpRequest)
    {
       $args = [];
       preg_match_all('/user(.*)(\{)/', $httpRequest, $matches);
       $regexResult = $matches[1][0];

       if(strpos($regexResult, "username") !== false){
            $args['arg_username'] = $this->getRequestParameterFromUsername($regexResult);
            return $args;
       }

       throw new RequestArgumentException("É obrigatório o argumento username", 1517537620);
    }

    /**
     * @param $regexResult
     * @return string
     */
    private function getRequestParameterFromUsername($regexResult)
    {
        preg_match_all('/username:"(.*)(?=\))/', $regexResult, $matches);
        $parameter = trim(str_replace("\"","",$matches[1][0]));
        return $parameter;
    }
}