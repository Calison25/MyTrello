<?php

namespace Trello\Graphql;

use GraphQL\GraphQL;
use Neos\Flow\Annotations as Flow;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use Neos\Flow\Persistence\Doctrine\PersistenceManager;
use Neos\Flow\Persistence\PersistenceManagerInterface;
use Trello\Graphql\Resolvers\UserResolve;
use Trello\Graphql\Type\UserType;
use Trello\User\Domain\Model\Credential;
use Trello\User\Domain\Model\User;
use Trello\User\Domain\Repository\GraphQlSearch;
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
     * @var \Trello\Graphql\Resolvers\UserResolve
     * @Flow\Inject
     */
    protected $userResolve;

    /**
     * @var UserService
     * @Flow\Inject
     */
    protected $userService;

    /**
     * @var GraphQlSearch
     * @Flow\Inject
     */
    protected $userGraphQlSearch;

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
                        $searchCriteria = $args['username'];
                        if(isset($args['id']) && !empty($args['id'])){
                            $searchCriteria = $args['id'];
                        }

                        $httpRequest = $context->getHttpRequest()->getParsedBody()['query'];
                        $httpRequestArgs = $this->userService->getArgsFromHttpRequest($httpRequest);
                        $user = $this->userGraphQlSearch->consultBySearchArgs($httpRequestArgs, $searchCriteria);
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