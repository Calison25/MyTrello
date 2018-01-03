<?php

namespace Trello\User\Domain\Model;

/*
 * This file is part of the Trello.User package.
 */

use Neos\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

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
     */
    protected $createdAt;

    /**
     * @var \DateTime
     * @Gedmo\Timestampable(on="update")
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
