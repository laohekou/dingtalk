<?php

return [
    'debug' => true,

    // 默认发送的机器人

    'default' => [
        // 机器人的access_token
        'access_token' => env('DING_TOKEN','c7559742392d320ed7d382e7430052321c250e308e144a75a464f77673d7a237'),
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
