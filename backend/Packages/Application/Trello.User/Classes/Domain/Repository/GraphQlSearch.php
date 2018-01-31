<?php
/**
 * Created by PhpStorm.
 * User: calison
 * Date: 30/01/18
 * Time: 22:52
 */

namespace Trello\User\Domain\Repository;


use Trello\General\Repository\GraphQlSearchInterface;
use Trello\User\Domain\Factory\GraphQlSearchFactory;

class GraphQlSearch implements GraphQlSearchInterface
{

   /**
    * @var GraphQlSearchFactory
    * @Flow\Inject
   */
   protected $graphQlSearchFactory;

   public function getUserBySearchArgs($httpRequest, $searchCriteria)
   {

   }

}