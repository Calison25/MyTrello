<?php
/**
 * Created by PhpStorm.
 * User: calison
 * Date: 06/01/18
 * Time: 00:36
 */

namespace Trello\Helper\Service;


use Trello\User\Exception\EmailIsNotValidException;

class GeneralHelper
{

    /**
     * @param $email
     * @return bool
     */
    public function validateEmail($email)
    {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return false;
        }

        return true;
    }
}