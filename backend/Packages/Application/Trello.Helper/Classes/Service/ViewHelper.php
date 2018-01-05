<?php

namespace Trello\Helper\Service;

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
}