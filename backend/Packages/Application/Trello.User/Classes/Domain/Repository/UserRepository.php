<?php

namespace Trello\User\Domain\Repository;

use Doctrine\ORM\QueryBuilder;
use Neos\Flow\Annotations as Flow;
use Neos\Flow\Persistence\Repository;
use Trello\Helper\Domain\Repository\AbstractRepository;
use Trello\User\Domain\Factory\SearchFactory;
use Trello\User\Domain\Model\User;

/**
 * Created by PhpStorm.
 * User: calison
 * Date: 29/12/17
 * Time: 10:17
 */

/**
 * @Flow\Scope("singleton")
 */
class UserRepository extends AbstractRepository
{

    CONST ENTITY_CLASS = User::class;

    /**
     * @param QueryBuilder $queryBuilder
     * @param SearchFactory $searchFactory
     * @return mixed|void
     */
    protected function buildSelect(QueryBuilder $queryBuilder, SearchFactory $searchFactory)
    {
        $queryBuilder->select($this->getSelectString($searchFactory));
    }

    /**
     * @param QueryBuilder $queryBuilder
     */
    protected function buildFrom(QueryBuilder $queryBuilder)
    {
        $queryBuilder->from(self::ENTITY_CLASS, 'user');
    }

    /**
     * @param QueryBuilder $queryBuilder
     * @param SearchFactory $searchFactory
     */
    protected function buildJoin(QueryBuilder $queryBuilder, SearchFactory $searchFactory)
    {
        if($searchFactory->isUsername() || $searchFactory->isEmail() || $searchFactory->isPassword()){
            $queryBuilder->join('user.credential','credential');
        }
    }

    /**
     * @param QueryBuilder $queryBuilder
     * @param SearchFactory $searchFactory
     */
    protected function buildWhere(QueryBuilder $queryBuilder, SearchFactory $searchFactory)
    {
        if(!empty($searchFactory->getArgUsername())){
          $queryBuilder->where('credential.username = :username')
              ->setParameter('username', $searchFactory->getArgUsername());
        }
    }


    /**
     * @param SearchFactory $searchFactory
     * @return string
     */
    private function getSelectString(SearchFactory $searchFactory)
    {
        $select = '';

        if($searchFactory->isName()){
            $select .= 'user.name,';
        }

        if($searchFactory->isUsername()){
            $select .= 'credential.username,';
        }

        if($searchFactory->isEmail()){
            $select .= 'credential.email,';
        }

        if($searchFactory->isPassword()){
            $select .= 'credential.password,';
        }

        $select = trim($select, ",");

        return $select;
    }
}