<?php
//The idInstance and apiTokenInstance values are available in your account, double brackets must be removed
$idInstance = "";
$apiTokenInstance = "";
$chatId = "";
$message = "";

$url = 'https://api.greenapi.com/waInstance'+ $idInstance + '/sendMessage/' + $apiTokenInstance;

//chatId is the number to send the message to (@c.us for private chats, @g.us for group chats)
$data = array(
    'chatId' => $chatId,
    'message' => $message
);

$options = array(
    'http' => array(
        'header' => "Content-Type: application/json\r\n",
        'method' => 'POST',
        'content' => json_encode($data)
    )
);

$context = stream_context_create($options);

$response = file_get_contents($url, false, $context);

echo $response;
?>
