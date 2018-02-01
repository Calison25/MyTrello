<?php
/**
 * Created by PhpStorm.
 * User: calison
 * Date: 31/01/18
 * Time: 22:40
 */

namespace Trello\Graphql;


use Trello\User\Domain\Model\User;

class InitSearch
{


    /**
     * @param $classType
     * @return \Trello\User\Domain\Repository\Search
     * @throws \Exception
     */
    public function getSearchByClass($classType)
    {
        switch ($classType){
            case User::class:
                return new \Trello\User\Domain\Repository\Search();
            default:
                throw new \Exception("Classe não possui Search implementado", 1517449542);
        }
    }
}