<?php

namespace Trello\Helper\Domain\Repository;

/**
 * Created by PhpStorm.
 * User: calison
 * Date: 02/02/18
 * Time: 22:10
 */

use Doctrine\ORM\QueryBuilder;
use Trello\User\Domain\Factory\SearchFactory;
use Neos\Flow\Annotations as Flow;
use Neos\Flow\Persistence\Repository;

/**
 * @Flow\Scope("singleton")
 * @package Trello\Helper\Domain\Repository
 */
abstract class AbstractRepository extends \Neos\Flow\Persistence\Doctrine\Repository
{
    /**
     * @param QueryBuilder $queryBuilder
     * @param SearchFactory $searchFactory
     * @return mixed
     */
    abstract protected function buildSelect(QueryBuilder $queryBuilder, SearchFactory $searchFactory);

    /**
     * @param QueryBuilder $queryBuilder
     * @return mixed
     */
    abstract protected function buildFrom(QueryBuilder $queryBuilder);

    /**
     * @param QueryBuilder $queryBuilder
     * @param SearchFactory $searchFactory
     * @return mixed
     */
    abstract protected function buildJoin(QueryBuilder $queryBuilder, SearchFactory $searchFactory);

    /**
     * @param QueryBuilder $queryBuilder
     * @param SearchFactory $searchFactory
     * @return mixed
     */
    abstract protected function buildWhere(QueryBuilder $queryBuilder, SearchFactory $searchFactory);

    /**
     * @param SearchFactory $searchFactory
     */
    public function search(SearchFactory $searchFactory)
    {
        $queryBuild = $this->getEntityManager()->createQueryBuilder();

        $this->buildSelect($queryBuild, $searchFactory);
        $this->buildFrom($queryBuild);
        $this->buildJoin($queryBuild, $searchFactory);
        $this->buildWhere($queryBuild, $searchFactory);
    }
}