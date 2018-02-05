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
                        $this->userController->createAction($args);
                        return 'usuário criado com sucesso!';
                    },
                ],
                'updateUser' => [
                    'type' => Type::string(),
                    'description' => 'Create an User',
                    'resolve' => function ($_, $args) {
                        return 'ta chegando aqui!';
                    },
                ],
                'deleteUser' => [
                    'type' => Type::string(),
                    'description' => 'Create an User',
                    'resolve' => function ($_, $args) {
                        return 'ta chegando aqui!';
                    },
                ],
            ],
        ]);
    }

}