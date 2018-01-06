<?php

namespace Trello\User\Domain\Model;

/*
 * This file is part of the Trello.User package.
 */

use Neos\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Trello\User\Domain\Handler\UserHandler;

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
     * @var Credential
     * @ORM\OneToOne
     */
    protected $credential;

    /**
     * @var \DateTime
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    protected $createdAt;

    /**
     * @var UserHandler
     * @Flow\Inject
     */
    protected $userHandler;

    /**
     * @var \DateTime
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    protected $updatedAt;

    /**
     * User constructor.
     * @param $name
     * @param Credential $credential
     */
    public function __construct($name, Credential $credential)
    {
        $this->setName($name);
        $this->setCredential($credential);
    }


    /**
     * @param User $newUser
     * @return User
     * @throws \Trello\User\Exception\EmailIsNotValidException
     * @throws \Trello\User\Exception\UserAlreadyRegisteredException
     */
    public function update(User $newUser)
    {
        return $this->userHandler->update($this, $newUser);
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

    /**
     * @return Credential
     */
    public function getCredential()
    {
        return $this->credential;
    }

    /**
     * @param Credential $credential
     */
    public function setCredential($credential)
    {
        $this->credential = $credential;
    }
}
