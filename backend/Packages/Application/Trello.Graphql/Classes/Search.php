<?php
/**
 * Created by PhpStorm.
 * User: calison
 * Date: 31/01/18
 * Time: 22:04
 */

namespace Trello\Graphql;


use Trello\User\Domain\Factory\SearchFactory;

interface Search
{
    /**
     * @param string $httpRequest
     * @return SearchFactory
     */
    public function initializeArguments($httpRequest);

    /**
     * @param string $httpRequest
     * @return object
     */
    public function getObjectByArguments($httpRequest);
}