<?php

namespace Trello\User\CommandBus\Command;
/**
 * Created by PhpStorm.
 * User: calison
 * Date: 01/03/18
 * Time: 22:32
 */

class UserCommand
{
    /**
     * @var string
     */
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}