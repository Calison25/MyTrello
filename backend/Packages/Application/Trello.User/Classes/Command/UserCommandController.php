<?php
namespace Trello\User\Command;

/*
 * This file is part of the Trello.User package.
 */

use Neos\Flow\Annotations as Flow;
use Neos\Flow\Cli\CommandController;
use Trello\User\Domain\Model\User;

/**
 * @Flow\Scope("singleton")
 */
class UserCommandController extends CommandController
{


    public function testeOneSignalCommand()
    {
        $response = $this->sendMessage();

        var_dump($response);
    }


    function sendMessage(){
        $content = array(
            "en" => 'English Message'
        );

        $fields = array(
            'app_id' => "0a439437-e71d-45a1-8151-47b3e33c856d",
            'included_segments' => array('Active Users'),
            'data' => array("foo" => "bar"),
            'contents' => $content
        );

        $fields = json_encode($fields);
        print("\nJSON sent:\n");
        print($fields);


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
            'Authorization: Basic OTM1MjIxOWUtYTc2Ni00YjExLTk3ZTktMzk4ZjU1ODQ5MzQ2'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }
}
