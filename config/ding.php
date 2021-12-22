<?php

return [
    'debug' => true,

    // 默认发送的机器人

    'default' => [
        // 机器人的access_token
        'access_token' => env('DING_TOKEN',''),
        // 钉钉请求的超时时间
        'timeout' => env('DING_TIME_OUT',2.0),
        // secret
        'secret' => env('DING_SECRET',''),
    ],

    'other' => [
        'access_token' => env('OTHER_DING_TOKEN',''),

        'timeout' => env('OTHER_DING_TIME_OUT',2.0),

        'secret' => env('DING_SECRET',''),
    ]
];
