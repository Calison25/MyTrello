<?php

namespace Trello\User\Domain\Repository;

use Neos\Flow\Annotations as Flow;
use Neos\Flow\Persistence\Repository;

/**
 * Created by PhpStorm.
 * User: calison
 * Date: 29/12/17
 * Time: 10:17
 */

/**
 * @Flow\Scope("singleton")
 */
class CredentialRepository extends Repository
{

    /**
     * @param $username
     * @param $email
     * @return object
     */
    public function findCredentialByUsernameAndEmail($username, $email)
    {
        $query = $this->createQuery();

        $result = $query->matching(
            $query->logicalOr([
                $query->equals('username', $username),
                $query->equals('email', $email)
            ])
        );

        return $result->execute()->getFirst();
    }
}