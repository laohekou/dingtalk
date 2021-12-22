<?php

namespace Xyu\Dingtalk\Message;

use Xyu\Dingtalk\Contract\AbstractGateway;

class ActionCard extends AbstractGateway
{

    protected $message;

    public function message(string $title, string $markdown, int $hideAvatar = 0, int $btnOrientation = 0)
    {
        $this->message = [
            'msgtype' => 'actionCard',
            'actionCard' => [
                'title' => $title,
                'text' => $markdown,
                'hideAvatar' => $hideAvatar,
                'btnOrientation' => $btnOrientation
            ]
        ];
        return $this;
    }


    public function single(string $title, string $url)
    {
        $this->message['actionCard']['singleTitle'] = $title;
        $this->message['actionCard']['singleURL'] = $url;
        return $this;
    }


    public function addButtons(string $title, string $url)
    {
        $this->message['actionCard']['btns'][] = [
            'title' => $title,
            'actionURL' => $url
        ];
        return $this;
    }

}