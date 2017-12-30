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
     * @param $class
     * @param $request
     * @param bool $hasArguments
     * @return mixed
     */
    public function createObjectFromRequest($class, $request, $hasArguments = true)
    {
        $request = json_decode(implode(",",$request));
        $arguments = [];

        if($hasArguments){
            foreach ($request as $index => $value){
                $arguments[$index] = $value;
            }
            return new $class($arguments);
        }

        return new $class();
    }
}