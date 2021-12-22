<?php

namespace Xyu\Dingtalk\Message;

use Xyu\Dingtalk\Contract\AbstractGateway;

class FeedCard extends AbstractGateway
{

    protected $message;

    public function message()
    {
        $this->message = [
            'msgtype' => 'feedCard',
            'feedCard' => [
                'links' => []
            ],
        ];
        return $this;
    }

    public function addLinks(string $title, string $messageUrl, string $picUrl)
    {
        $this->message['feedCard']['links'][] = [
            'title' => $title,
            'messageURL' => $messageUrl,
            'picURL' => $picUrl
        ];
        return $this;
    }

}