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
use Trello\User\Domain\Model\User;
use Trello\User\Domain\Repository\UserRepository;
use Trello\User\Service\UserMessagesService;
use Trello\User\Service\UserService;

class AccessController extends ActionController
{
    protected $defaultViewObjectName = JsonView::class;

    /**
     * @var CredentialDtoFactory
     * @Flow\Inject
     */
    protected $credentialDtoFactory;

    /**
     * @var UserService
     * @Flow\Inject
     */
    protected $userService;

    /**
     * @param array $data
     */
    public function signInAction($data)
    {
        $this->view->setVariablesToRender(['response']);
        try{
            $credentialDto = $this->credentialDtoFactory->create($data);

            if (!$this->userService->userCanSignIn($credentialDto)){
                throw new \Exception(UserMessagesService::USER_IS_NOT_ALLOWED, 1539471786);
            }

            $this->view->setConfiguration([
                'response' => [
                    '_descendAll' => $this->getConfiguration()
                ]
            ]);

            $response = $this->userService->getUserByEmail($credentialDto->getEmail());
            $this->response->setStatus(200);
        }catch (\Exception $exception){
            $response = "Erro: {$exception->getMessage()}";
            $this->response->setStatus(400);
        }

        $this->view->assign('response', ['response' => $response]);
    }

    private function getConfiguration()
    {
        return [
            '_exposeObjectIdentifier' => false,
            '_exposedObjectIdentifierKey' => '__identity',
            '_descend' => [
                'credential' => [
                    '_exposeObjectIdentifier' => false,
                    '_exposedObjectIdentifierKey' => '__identity'
                ]
            ]
        ];
    }
}
