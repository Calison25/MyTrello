<?php

namespace Trello\Helper\Service;
use Neos\Flow\Mvc\View\ViewInterface;

/**
 * Created by PhpStorm.
 * User: calison
 * Date: 30/12/17
 * Time: 22:56
 */
class ViewHelper
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
     * @param ViewInterface $view
     * @param $message
     * @param $success
     */
    public function assignView(ViewInterface $view, $message, $success)
    {
        $view->setVariablesToRender(['response']);
        $response = $this->buildViewAssign($message, $success);
        $view->assign('response', $response);
    }
}