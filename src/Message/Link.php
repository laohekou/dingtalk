<?php

namespace Xyu\Dingtalk\Message;

use Xyu\Dingtalk\Contract\AbstractGateway;

class Link extends AbstractGateway
{

    protected $message;

    public function message(string $title, string $text, string $messageUrl, string $picUrl = '')
    {
        $this->message  = [
            'msgtype' => 'link',
            'link' => [
                'text' => $text,
                'title' => $title,
                'picUrl' => $picUrl,
                'messageUrl' => $messageUrl
            ]
        ];
        return $this;
    }

}