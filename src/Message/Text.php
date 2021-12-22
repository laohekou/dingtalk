<?php

namespace Xyu\Dingtalk\Message;

use Xyu\Dingtalk\Contract\AbstractGateway;

class Text extends AbstractGateway
{

    protected $message;

    public function message(string $content)
    {
        $this->message = [
            'msgtype' => 'text',
            'text' => [
                'content' => $content
            ]
        ];
        return $this;
    }

}