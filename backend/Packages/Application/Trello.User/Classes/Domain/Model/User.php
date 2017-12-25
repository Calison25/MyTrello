<?php
namespace Trello\User\Domain\Model;

/*
 * This file is part of the Trello.User package.
 */

use Neos\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Flow\Entity
 */
class User
{
    /**
     * @var string
     * @Flow\Validate(type="NotEmpty")
     */
    protected $name;

    /**
     * @var string
     * @Flow\Validate(type="NotEmpty")
     */
    protected $password;

    /**
     * @var string
     * @Flow\Validate(type="NotEmpty")
     */
    protected $username;

    /**
     * @var string
     * @Flow\Validate(type="NotEmpty")
     */
    protected $email;

}
