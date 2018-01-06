<?php

namespace Trello\User\Service;

use Neos\Flow\Annotations as Flow;
use Trello\Helper\Service\GeneralHelper;
use Trello\User\Domain\Model\Credential;
use Trello\User\Domain\Repository\CredentialRepository;
use Trello\User\Exception\EmailIsNotValidException;
use Trello\User\Exception\UserAlreadyExistException;
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
     * @var CredentialRepository
     * @Flow\Inject
     */
    protected $credentialRepository;

    /**
     * @var GeneralHelper
     * @Flow\Inject
     */
    protected $generalHelper;


    /**
     * @param Credential $credential
     * @throws EmailIsNotValidException
     * @throws UserAlreadyExistException
     * @throws UsernameIsRequiredException
     */
    public function credentialIsValid(Credential $credential)
    {
        if($this->credentialIsRegistered($credential)){
            throw new UserAlreadyExistException('Usuário já existe', 1514553949);
        }

        if(!$this->generalHelper->validateEmail($credential->getEmail())){
            throw new EmailIsNotValidException("Por favor, informe um endereço de email válido", 1514943370);
        }

        if(empty($credential->getUsername() || empty($credential->getEmail()))){
            throw new UsernameIsRequiredException('Nome de usuário e email são obrigatórios',1514553197);
        }
    }


    /**
     * @param Credential $credential
     * @return bool
     */
    private function credentialIsRegistered(Credential $credential)
    {
        $credential = $this->credentialRepository->findCredentialByUsernameAndEmail($credential->getUsername(), $credential->getEmail());

        if($credential instanceof Credential){
            return true;
        }

        return false;
    }
}