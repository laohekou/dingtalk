<?php

namespace Xyu\Dingtalk\Message;

use Xyu\Dingtalk\Contract\AbstractGateway;

class Markdown extends AbstractGateway
{

    protected $message;

    public function message(string $title, string $text)
    {
        $this->message  = [
            'msgtype' => 'markdown',
            'markdown' => [
                'title' => $title,
                'text' => $text
            ]
        ];
        return $this;
    }

}