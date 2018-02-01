<?php

namespace Trello\Graphql\Type;

use GraphQL\GraphQL;
use Neos\Flow\Annotations as Flow;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use Neos\Flow\Persistence\Doctrine\PersistenceManager;
use Neos\Flow\Persistence\PersistenceManagerInterface;
use Trello\User\Domain\Model\Credential;
use Trello\User\Domain\Model\User;
use Trello\User\Service\UserService;
use Wwwision\GraphQL\AccessibleObject;
use Wwwision\GraphQL\TypeResolver;

/**
 * Created by PhpStorm.
 * User: calison
 * Date: 29/12/17
 * Time: 10:15
 */

class UserType extends ObjectType
{
    /**
     * @var User
     */
    private static $user;

    /**
     * @var UserService
     * @Flow\Inject
     */
    protected $userService;

    /**
     * @param TypeResolver $typeResolver
     */
    public function __construct(TypeResolver $typeResolver)
    {
        return parent::__construct([
            'name' => 'User',
            'description' => 'A user',
            'fields' => [
                'name' => [
                    'type' => Type::string(),
                    'resolve' => function($root, array $args){
                        return self::$user->getName();
                    }
                ],
                'credential' => [
                    'type' => $typeResolver->get(CredentialType::class),
                    'resolve' => function ($root, array $args) {
                        return [];
                    },
                ]
            ],
        ]);
    }
}