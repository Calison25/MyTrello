<?php
namespace Trello\Api\Controller;

/*
 * This file is part of the Trello.Api package.
 */

use Neos\Flow\Annotations as Flow;
use Neos\Flow\Mvc\Controller\ActionController;
use Neos\Flow\Mvc\View\JsonView;
use Neos\Flow\Persistence\PersistenceManagerInterface;
use Trello\Helper\Domain\Factory\JsonViewFactory;
use Trello\User\Domain\Factory\CredentialDtoFactory;
use Trello\User\Domain\Factory\UserFactory;
use Trello\User\Domain\Repository\UserRepository;
use Trello\User\Service\UserMessagesService;
use Trello\User\Service\UserService;

class AccessController extends ActionController
{

    /**
     * @var CredentialDtoFactory
     * @Flow\Inject
     */
    protected $credentialDtoFactory;

    /**
     * @param array $data
     */
    public function signInAction($data)
    {
        $credentialDto = $this->credentialDtoFactory->create($data);
        var_dump($credentialDto->getEmail());
        die;
    }
}
