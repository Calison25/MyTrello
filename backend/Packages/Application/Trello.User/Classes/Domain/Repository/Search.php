<?php
/**
 * Created by PhpStorm.
 * User: calison
 * Date: 30/01/18
 * Time: 22:52
 */

namespace Trello\User\Domain\Repository;


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
     * @param string $httpRequest
     * @return SearchFactory
     */
   private function initializeArguments($httpRequest)
   {
      $arguments = $this->userGraphQlService->getArgumentsFromHttpRequest($httpRequest);

      return $this->searchFactory->create($arguments);

   }

    /**
     * @param string $httpRequest
     * @return object|void
     */
   public function getObjectByArguments($httpRequest)
   {
        $searchFactory = $this->initializeArguments($httpRequest);
   }

}