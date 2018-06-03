<?php
namespace Trello\User\Command;

/*
 * This file is part of the Trello.User package.
 */

use GuzzleHttp\Client;
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
        $content = [
            "en" => 'English Message'
        ];

        $fields = [
            'app_id' => "0a439437-e71d-45a1-8151-47b3e33c856d",
            'included_segments' => ['Active Users'],
            'data' => ["foo" => "bar"],
            'contents' => $content
        ];

        $fields = json_encode($fields);
//        print("\nJSON sent:\n");
//        print($fields);
        $client = new Client();

        $response = $client->post("https://onesignal.com/api/v1/notifications",[
                'headers' => [
                    'authorization' => 'Basic OTM1MjIxOWUtYTc2Ni00YjExLTk3ZTktMzk4ZjU1ODQ5MzQ2',
                    'content-type' => 'application/json; charset=utf-8'
                ],
                'form_params' => $fields
        ]);

        var_dump($response->getBody()->getContents());
        die;

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

        var_dump($response);
        die;

        return $response;
    }
}
