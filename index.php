<?php

require 'vendor/autoload.php';

use SMSGatewayMe\Client\ApiClient;
use SMSGatewayMe\Client\Configuration;
use SMSGatewayMe\Client\Api\MessageApi;
use SMSGatewayMe\Client\Model\SendMessageRequest;

// Configure client
$config = Configuration::getDefaultConfiguration();
$config->setApiKey('Authorization', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTYzODM0MzMwOCwiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjkxNjM5LCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.ooC-RR3oKDcY-Si55sXbCHN0gZTgq44mMdpHC3YuzS0');
$apiClient = new ApiClient($config);
$messageClient = new MessageApi($apiClient);

if (isset($_POST["number"]) && isset($_POST["msg"])) {
    // Sending a SMS Message
    $sendMessageRequest1 = new SendMessageRequest([
        'phoneNumber' => $_POST["number"],
        'message' => $_POST["msg"],
        'deviceId' => 126407
    ]);
    $sendMessages = $messageClient->sendMessages([
        $sendMessageRequest1
    ]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        Number: <input type="text" name="number">
        Msg: <input type="text" name="msg">
        <input type="submit" name="sendSms">
    </form>
</body>

</html>