<?php

namespace Trello\Graphql\Type;

use GraphQL\GraphQL;
use Neos\Flow\Annotations as Flow;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use Neos\Flow\Persistence\Doctrine\PersistenceManager;
use Neos\Flow\Persistence\PersistenceManagerInterface;
use Trello\Graphql\Resolve\UserResolve;
use Trello\User\Domain\Model\Credential;
use Trello\User\Domain\Model\User;
use Wwwision\GraphQL\AccessibleObject;
use Wwwision\GraphQL\TypeResolver;

/**
 * Created by PhpStorm.
 * User: calison
 * Date: 29/12/17
 * Time: 10:15
 */

class CredentialType extends ObjectType
{
    /**
     * @param TypeResolver $typeResolver
     */
    public function __construct(TypeResolver $typeResolver)
    {
        return parent::__construct([
            'name' => 'Credential',
            'description' => 'A Credential',
            'fields' => [
                'username' => [
                    'type' => Type::string(),
                    'resolve' => function($root){
                        return $root[0]['username'];
                    }
                ],
                'email' => [
                    'type' => Type::string(),
                    'resolve' => function($root){
                        return $root[0]['email'];
                    }
                ],
                'password' => [
                    'type' => Type::string(),
                    'resolve' => function($root){
                        return $root[0]['password'];
                    }
                ],
            ],
        ]);
    }

}