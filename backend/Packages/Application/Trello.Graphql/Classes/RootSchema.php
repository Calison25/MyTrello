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
use Trello\User\Domain\Repository\Search;
use Trello\User\Service\UserGraphQlService;
use Trello\User\Service\UserService;
use Wwwision\GraphQL\AccessibleObject;
use Wwwision\GraphQL\GraphQLContext;
use Wwwision\GraphQL\TypeResolver;

/**
 * Created by PhpStorm.
 * User: calison
 * Date: 29/12/17
 * Time: 10:15
 */

class RootSchema extends ObjectType
{


    /**
     * @var PersistenceManagerInterface
     * @Flow\Inject
     */
    protected $persistenceManager;

    /**
     * @var UserGraphQlService
     * @Flow\Inject
     */
    protected $userGraphQlService;

    /**
     * @var InitSearch
     * @Flow\Inject
     */
    protected $initSearch;

    /**
     * @param TypeResolver $typeResolver
     */
    public function __construct(TypeResolver $typeResolver)
    {
        return parent::__construct([
            'name' => 'RootSchema',
            'fields' => [
                'user' => [
                    'type' => $typeResolver->get(UserType::class),
                    'args' => [
                        'id' => [
                            'type' => Type::string()
                        ],
                        'username' => [
                            'type' => Type::string()
                        ],
                    ],
                    'resolve' => function ($root, array $args, GraphQLContext $context) {
                        return $this->getResolve($context);
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

    /**
     * @param GraphQLContext $context
     * @return array
     * @throws \Exception
     * @throws \Trello\User\Exception\RequestArgumentException
     */
    private function getResolve(GraphQLContext $context)
    {
        $httpRequest = $context->getHttpRequest()->getParsedBody()['query'];
        $search = $this->initSearch->getSearchByClass(User::class);
        $user = $search->getObjectByArguments($httpRequest);
        return $user;
    }

}