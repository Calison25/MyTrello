<?php
/**
 * Created by PhpStorm.
 * User: calison
 * Date: 30/01/18
 * Time: 22:52
 */

namespace Trello\User\Domain\Repository;


use Neos\Flow\Annotations as Flow;
use Trello\User\Domain\Factory\SearchFactory;
use Trello\User\Service\UserGraphQlService;
use Trello\User\Service\UserService;

class Search implements \Trello\Graphql\Search
{
   /**
    * @var SearchFactory
    * @Flow\Inject
   */
   protected $searchFactory;

    /**
     * @var UserGraphQlService
     * @Flow\Inject
     */
   protected $userGraphQlService;

    /**
     * @var UserRepository
     * @Flow\Inject
     */
   protected $userRepository;


    /**
     * @param $httpRequest
     * @return SearchFactory
     * @throws \Trello\User\Exception\RequestArgumentException
     */
   private function initializeArguments($httpRequest)
   {
      $arguments = $this->userGraphQlService->getArgumentsFromHttpRequest($httpRequest);

      return $this->searchFactory->create($arguments);

   }

    /**
     * @param string $httpRequest
     * @return array
     * @throws \Trello\User\Exception\RequestArgumentException
     */
   public function getObjectByArguments($httpRequest)
   {
        $searchFactory = $this->initializeArguments($httpRequest);
        return $this->userRepository->search($searchFactory);
   }
}