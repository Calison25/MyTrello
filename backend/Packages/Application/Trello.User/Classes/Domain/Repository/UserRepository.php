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
class UserRepository extends Repository
{
    /**
     * @param $username
     * @return object
     */
    public function findUserByUsername($username)
    {
        $query = $this->createQuery();

        $result = $query->matching(
            $query->logicalAnd([
                $query->equals('credential.username', $username)
            ])
        );

        return $result->execute()->getFirst();
    }

    /**
     * @param $username
     * @param $email
     * @return object
     */
    public function findUserByUsernameAndEmail($username, $email)
    {
        $query = $this->createQuery();

        $result = $query->matching(
            $query->logicalOr([
                $query->equals('credential.username', $username),
                $query->equals('credential.email', $email)
            ])
        );

        return $result->execute()->getFirst();
    }
}