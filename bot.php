<?php


$access_token = 'jlMoaDCsiy7kbz0JIpj/aFDVojwOc6V+jHZweM8HW4eaFzWVKTUF0UyNToc8RYq93NII5Nx4CpoD1KdlI0Pjld0HOXLOSzH16/DU0ocf9YNr8nRRt1CL8dClQqmQb98sdSdjOulzdZ+UGQfYfNgn0wdB04t89/1O/w1cDnyilFU=';

$jsonString = file_get_contents('php://input');
error_log($jsonString);
$jsonObj = json_decode($jsonString);

$message = $jsonObj->{"events"}[0]->{"message"};
$replyToken = $jsonObj->{"events"}[0]->{"replyToken"};

// 送られてきたメッセージの中身からレスポンスのタイプを選択
if ($message->{"text"} == 'confirm') {
    // 確認ダイアログタイプ
    $messageData = [
        'type' => 'template',
        'altText' => 'Confirm alt text',
        'template' => [
            'type' => 'confirm',
            'text' => 'Do it?',
            'actions' => [
                [
                    'type' => 'message',
                    'label' => 'Yes',
                    'text' => 'Yes'
                ],
                [
                    'type' => 'message',
                    'label' => 'No',
                    'text' => 'No'
                ],
            ]
        ]
    ];
} elseif ($message->{"text"} == 'button') {
    // ボタンタイプ
    $messageData = [
        'type' => 'template',
        'altText' => 'ボタン',
        'template' => [
            'type' => 'buttons',
            'title' => 'My button sample',
            'text' => 'Hello my button',
            'actions' => [
                [
                    'type' => 'postback',
                    'label' => 'view',
                    'data' => 'value'
                ],
                [
                    'type' => 'uri',
                    'label' => 'google',
                    'uri' => 'https://google.com'
                ]
            ]
        ]
    ];
} elseif ($message->{"text"} == 'carousel') {
    // カルーセルタイプ
    $messageData = [
        'type' => 'template',
        'altText' => 'カルーセル',
        'template' => [
            'type' => 'carousel',
            'columns' => [
                [
                    'title' => 'carousel1',
                    'text' => 'carousel1',
                    'actions' => [
                        [
                            'type' => 'postback',
                            'label' => 'view',
                            'data' => 'value'
                        ],
                        [
                            'type' => 'uri',
                            'label' => 'google',
                            'uri' => 'http://google.com'
                        ]
                    ]
                ],
                [
                    'title' => 'carousel2',
                    'text' => 'carousel2',
                    'actions' => [
                        [
                            'type' => 'postback',
                            'label' => 'view',
                            'data' => 'value'
                        ],
                        [
                            'type' => 'uri',
                            'label' => 'google',
                            'uri' => 'http://google.com'
                        ]
                    ]
                ],
            ]
        ]
    ];
} else {
    // それ以外は送られてきたテキストをオウム返し
    $messageData = [
        'type' => 'text',
        'text' => $message->{"text"}
    ];
}

$response = [
    'replyToken' => $replyToken,
    'messages' => [$messageData]
];
error_log(json_encode($response));

$ch = curl_init('https://api.line.me/v2/bot/message/reply');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($response));
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json; charser=UTF-8',
    'Authorization: Bearer ' . $accessToken
));
$result = curl_exec($ch);
error_log($result);
curl_close($ch);
