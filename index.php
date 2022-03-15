<?php

use SimpleTelegramBot\Connection\CurlConnectionService;

require_once 'vendor/autoload.php';
require_once 'config/settings.php';
require_once 'config/DataBase.php';

$connectionService = new CurlConnectionService();

$update = file_get_contents("php://input");
$update = json_decode($update, true);

switch ($update['message']['text']) {
    case '/start':
        $connectionService->withArrayResponse(
            'sendMessage?chat_id=' . $update['message']['chat']['id'] . '&text=hi!'
        );
        break;
    case '/save':
        DataBase::setUser($update);
        $connectionService->withArrayResponse(
            'sendMessage?chat_id=' . $update['message']['chat']['id'] . '&text=Saved!'
        );
        break;
    case '/me':
        $user = DataBase::getUserByChatId($update['message']['chat']['id']);
        $connectionService->withArrayResponse(
            'sendMessage?chat_id=' . $update['message']['chat']['id'] . '&text=Here You are!  First Name-> '
            .$user->first_name.'   Last Name->'.$user->last_name
        );
        break;
    default :
        $connectionService->withArrayResponse(
            'sendMessage?chat_id=' . $update['message']['chat']['id'] . '&text=I do not know what to say!'
        );
        exit;
}

