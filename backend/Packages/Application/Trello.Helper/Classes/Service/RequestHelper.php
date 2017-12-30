<?php

namespace Trello\Helper\Service;

/**
 * Created by PhpStorm.
 * User: calison
 * Date: 30/12/17
 * Time: 16:40
 */

class RequestHelper
{

    /**
     * @param $request
     * @return mixed
     */
    public function convertRequestToArray($request)
    {
        $request = json_decode(implode(",",$request));
        $arguments = [];

        foreach ($request as $index => $value){
            $arguments[$index] = $value;
        }

        return $arguments;
    }
}