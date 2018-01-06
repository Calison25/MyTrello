<?php

namespace Trello\Helper\Service;

use Neos\Flow\Mvc\View\ViewInterface;
use Trello\Helper\Domain\Model\ViewResponse;

/**
 * Created by PhpStorm.
 * User: calison
 * Date: 30/12/17
 * Time: 22:56
 */
class ViewHelperService
{
    /**
     * @param string $message
     * @param boolean $success
     * @return array
     */
    public function buildViewAssign($message, $success)
    {
        $result = [
            "message" => $message,
            "success" => $success
        ];

        return $result;
    }

    /**
     * @param ViewResponse $viewResponse
     */
    public function assignView(ViewResponse $viewResponse)
    {
        $viewResponse->getResponse()->setStatus(400);

        if($viewResponse->isSuccess()){
            $viewResponse->getResponse()->setStatus(200);
        }

        $viewResponse->getView()->setVariablesToRender(['response']);
        $response = $this->buildViewAssign($viewResponse->getMessage(), $viewResponse->isSuccess());
        $viewResponse->getView()->assign('response', $response);
    }
}