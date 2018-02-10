<?php

namespace Trello\Graphql;

use GraphQL\GraphQL;
use Neos\Flow\Annotations as Flow;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use Neos\Flow\Persistence\Doctrine\PersistenceManager;
use Neos\Flow\Persistence\PersistenceManagerInterface;
use Trello\Graphql\Type\UserType;
use Trello\User\Controller\UserController;
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

class Mutation extends ObjectType
{

    /**
     * @var PersistenceManagerInterface
     * @Flow\Inject
     */
    protected $persistenceManager;

    /**
     * @var UserController
     * @Flow\Inject
     */
    protected $userController;

    /**
     * @param TypeResolver $typeResolver
     */
    public function __construct(TypeResolver $typeResolver)
    {
        return parent::__construct([
            'name' => 'Mutation',
            'description' => 'Mutations for trello',
            'fields' => [
                'createUser' => [
                    'type' => Type::string(),
                    'description' => 'Create an User',
                    'args' => [
                        'name' => ['type' => Type::nonNull(Type::string())],
                        'username' => ['type' => Type::nonNull(Type::string())],
                        'email' => ['type' => Type::nonNull(Type::string())],
                        'password' => ['type' => Type::nonNull(Type::string())]
                    ],
                    'resolve' => function ($root, array $args) {
                        $result = $this->userController->createAction($args);
                        return $result;
                    },
                ],
                'updateUser' => [
                    'type' => Type::string(),
                    'description' => 'Update an User',
                    'args' => [
                        'name' => ['type' => Type::string()],
                        'username' => ['type' => Type::nonNull(Type::string())],
                        'newUsername' => ['type' => Type::string()],
                        'email' => ['type' => Type::string()],
                        'password' => ['type' => Type::string()]
                    ],
                    'resolve' => function ($root_, array $args) {
                        $result = $this->userController->updateAction($args);
                        return $result;
                    },
                ],
                'deleteUser' => [
                    'type' => Type::string(),
                    'description' => 'Delete an User',
                    'args' => [
                        'username' => ['type' => Type::nonNull(Type::string())]
                    ],
                    'resolve' => function ($root_, $args) {
                        $result = $this->userController->deleteAction($args);
                        return $result;
                    },
                ],
            ],
        ]);
    }

}