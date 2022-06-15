<?php

// сюда нужно вписать токен вашего бота
define('TELEGRAM_TOKEN', '5335929290:AAFG7kDFinYEXnRgZzeejxpbOA8T5BOVlGw');

// сюда нужно вписать ваш внутренний айдишник
define('TELEGRAM_CHATID', '877322297');
//define('TELEGRAM_CHATID', '420544404');

message_to_telegram('Привет!Это завяка - ' . $_POST['textVal'] . '. ИМЯ: ' . $_POST['nameVal'] . ' ТЕЛЕФОН: ' . $_POST['telVal']);

function message_to_telegram($text) {
    $ch = curl_init();
    curl_setopt_array(
        $ch,
        array(
            CURLOPT_URL => 'https://api.telegram.org/bot' . TELEGRAM_TOKEN . '/sendMessage',
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_POSTFIELDS => array(
                'chat_id' => TELEGRAM_CHATID,
                'text' => $text,
            ),
        )
    );
    curl_exec($ch);
    $error_msg = [];
    if (curl_errno($ch)) {
        $error_msg = curl_error($ch);
    }
    echo json_encode($error_msg);
}