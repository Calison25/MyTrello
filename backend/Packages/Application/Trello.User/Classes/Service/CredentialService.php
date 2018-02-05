<?php

namespace Trello\User\Service;

use Neos\Flow\Annotations as Flow;
use Trello\Helper\Service\GeneralHelperService;
use Trello\User\Domain\Model\Credential;
use Trello\User\Domain\Repository\UserRepository;
use Trello\User\Domain\Repository\UserSearchRepository;
use Trello\User\Exception\EmailIsNotValidException;
use Trello\User\Exception\UserAlreadyRegisteredException;
use Trello\User\Exception\UsernameIsRequiredException;

/**
 * Created by PhpStorm.
 * User: calison
 * Date: 29/12/17
 * Time: 10:15
 */

class CredentialService
{

    /**
     * @var UserRepository
     * @Flow\Inject
     */
    protected $userRepository;

    /**
     * @var GeneralHelperService
     * @Flow\Inject
     */
    protected $generalHelper;


    /**
     * @param Credential $credential
     * @throws EmailIsNotValidException
     * @throws UserAlreadyRegisteredException
     * @throws UsernameIsRequiredException
     */
    public function credentialIsValid(Credential $credential)
    {
        if($this->credentialIsRegistered($credential)){
            throw new UserAlreadyRegisteredException(UserMessagesService::USER_REGISTERED, 1514553949);
        }
        if(!$this->generalHelper->validateEmail($credential->getEmail())){
            throw new EmailIsNotValidException(UserMessagesService::USER_EMAIL_INVALID, 1514943370);
        }

        if(empty($credential->getUsername() || empty($credential->getEmail()))){
            throw new UsernameIsRequiredException(UserMessagesService::USERNAME_REQUIRED, 1514553197);
        }
    }


    /**
     * @param Credential $credential
     * @return bool
     */
    public function credentialIsRegistered(Credential $credential)
    {
        $credential = $this->userRepository->findCredentialByUsernameAndEmail($credential->getUsername(), $credential->getEmail());

        if($credential instanceof Credential){
            return true;
        }

        return false;
    }
}