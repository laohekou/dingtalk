<?php

namespace Xyu\Dingtalk;

use Hanson\Foundation\Foundation;
use Xyu\Dingtalk\Message\ActionCard;
use Xyu\Dingtalk\Message\FeedCard;
use Xyu\Dingtalk\Message\Link;
use Xyu\Dingtalk\Message\Markdown;
use Xyu\Dingtalk\Message\Text;

/**
 * Class DingApp
 * @package Xyu\Dingtalk\DingApp
 *
 * @property-read ActionCard $action_card
 * @property-read FeedCard $feed_card
 * @property-read Link $link
 * @property-read Markdown $markdown
 * @property-read Text $text
 */
class DingApp extends Foundation
{
    protected $providers = [
        ServiceProvider::class,
    ];

    public function __construct($config)
    {
        if (!isset($config['debug'])) {
            $config['debug'] = $this->config['debug'] ?? false;
        }
        parent::__construct($config);
    }

    public function getUrl()
    {
        return 'https://oapi.dingtalk.com/robot/send';
    }

    public function getAccessToken()
    {
        return $this->getConfig('access_token');
    }

    public function getTimeout()
    {
        return $this->getConfig('timeout');
    }

    public function getSecret()
    {
        return $this->getConfig('secret');
    }

    public function rebind(string $id, $value)
    {
        $this->offsetUnset($id);
        $this->offsetSet($id, $value);

        return $this;
    }
}