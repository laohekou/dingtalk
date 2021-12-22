<?php

namespace Xyu\Dingtalk;

use Hanson\Foundation\Http;
use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Xyu\Dingtalk\Message\ActionCard;
use Xyu\Dingtalk\Message\FeedCard;
use Xyu\Dingtalk\Message\Link;
use Xyu\Dingtalk\Message\Markdown;
use Xyu\Dingtalk\Message\Robot;
use Xyu\Dingtalk\Message\Text;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $pimple)
    {
        $pimple['http'] = function (DingApp $app) {
            return new Http($app);
        };

        $pimple['robot'] = function (DingApp $app) {
            return new Robot($app);
        };

        $pimple['action_card'] = function (DingApp $app) {
            return new ActionCard($app);
        };

        $pimple['feed_card'] = function (DingApp $app) {
            return new FeedCard($app);
        };

        $pimple['link'] = function (DingApp $app) {
            return new Link($app);
        };

        $pimple['markdown'] = function (DingApp $app) {
            return new Markdown($app);
        };

        $pimple['text'] = function (DingApp $app) {
            return new Text($app);
        };

    }
}