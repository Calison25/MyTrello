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
     * @var \Trello\Graphql\Resolvers\UserResolve
     * @Flow\Inject
     */
    protected $userResolve;

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
                    'resolve' => function(){
                        return UserType::user()->getCredential()->getUsername();
                    }
                ],
                'email' => [
                    'type' => Type::string(),
                    'resolve' => function(){
                        return UserType::user()->getCredential()->getEmail();
                    }
                ],
                'password' => [
                    'type' => Type::string(),
                    'resolve' => function(){
                        return UserType::user()->getCredential()->getPassword();
                    }
                ],
            ],
        ]);
    }

}