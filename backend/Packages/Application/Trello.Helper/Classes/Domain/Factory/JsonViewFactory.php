<?php

namespace Trello\Helper\Domain\Factory;

/**
 * Created by PhpStorm.
 * User: calison
 * Date: 10/02/18
 * Time: 01:03
 */

class JsonViewFactory
{

    /**
     * @param $message
     * @param $success
     * @return string
     */
    public function create($message, $success)
    {
        $result = [
            "message" => $message,
            "success" => $success
        ];

        return json_encode($result);
    }
}