<?php
namespace Trello\User\Domain\Dto;

/**
 * Created by PhpStorm.
 * User: calison
 * Date: 13/10/18
 * Time: 19:10
 */

class CredentialDto
{

    /**
     * @var string
     */
    protected $userName;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $password;

    /**
     * CredentialDto constructor.
     * @param string $email
     * @param string $password
     * @param string|null $userName
     */
    public function __construct(string $email, string $password, string $userName = null)
    {
        $this->email = $email;
        $this->password = $password;
        $this->userName = $userName;
    }

    /**
     * @return string
     */
    public function getUserName(): string
    {
        return $this->userName;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }
}