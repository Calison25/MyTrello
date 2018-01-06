<?php

namespace Trello\User\Domain\Handler;

use Neos\Flow\Annotations as Flow;
use Trello\Helper\Service\GeneralHelperService;
use Trello\User\Domain\Model\Credential;
use Trello\User\Domain\Model\User;
use Trello\User\Exception\EmailIsNotValidException;
use Trello\User\Exception\UserAlreadyRegisteredException;
use Trello\User\Service\CredentialService;
use Trello\User\Service\UserMessagesService;

/**
 * Created by PhpStorm.
 * User: calison
 * Date: 06/01/18
 * Time: 15:22
 */

class UserHandler
{

    /**
     * @var CredentialService
     * @Flow\Inject
     */
    protected $credentialService;

    /**
     * @var GeneralHelperService
     * @Flow\Inject
     */
    protected $generalHelper;

    /**
     * @param User $currentUser
     * @param User $newUser
     * @return User
     * @throws EmailIsNotValidException
     * @throws UserAlreadyRegisteredException
     */
    public function update(User $currentUser, User $newUser)
    {
        if(!empty($newUser->getName())){
            $currentUser->setName($newUser->getName());
        }


        if(!$currentUser->getCredential() instanceof Credential){
            return $currentUser;
        }

        if(!empty($newUser->getCredential()->getUsername()) &&
            $currentUser->getCredential()->getUsername() != $newUser->getCredential()->getUsername()){
            if($this->credentialService->credentialIsRegistered($newUser->getCredential())){
                throw new UserAlreadyRegisteredException(UserMessagesService::USER_REGISTERED, 1515263449);
            }

            $currentUser->getCredential()->setUsername($newUser->getCredential()->getUsername());
        }

        if(!empty($newUser->getCredential()->getEmail()) &&
            $currentUser->getCredential()->getEmail() != $newUser->getCredential()->getEmail()){
            if(!$this->generalHelper->validateEmail($newUser->getCredential()->getEmail())){
                throw new EmailIsNotValidException(UserMessagesService::USER_EMAIL_INVALID, 1515263989);
            }

            $currentUser->getCredential()->setEmail($newUser->getCredential()->getEmail());
        }

        if(!empty($newUser->getCredential()->getPassword())){
            $currentUser->getCredential()->setPassword(md5($newUser->getCredential()->getPassword()));
        }

        return $currentUser;
    }
}