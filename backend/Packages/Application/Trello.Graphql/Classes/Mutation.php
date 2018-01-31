<?php

namespace Trello\Graphql;

use GraphQL\GraphQL;
use Neos\Flow\Annotations as Flow;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use Neos\Flow\Persistence\Doctrine\PersistenceManager;
use Neos\Flow\Persistence\PersistenceManagerInterface;
use Trello\Graphql\Type\UserType;
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
     * @param TypeResolver $typeResolver
     */
    public function __construct(TypeResolver $typeResolver)
    {
        return parent::__construct([
            'name' => 'Mutation',
            'fields' => [
                'user' => [
                    'type' => $typeResolver->get(UserType::class),
                    'resolve' => function ($root, array $args) {
                            return [];
                    },
                ],
                'board' => [
                    'type' => Type::string(),
                    'resolve' => function (){
                            return 'board';
                    }
                ],
                'team'  => [
                    'type' => Type::string(),
                    'resolve' => function (){
                        return 'team';
                    }
                ],
            ],
        ]);
    }

}