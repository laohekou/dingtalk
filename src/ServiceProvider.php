<?php

namespace Xyu\Dingtalk;

use Hanson\Foundation\Http;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $pimple)
    {
        $pimple['http'] = function (DingApp $app) {
            return new Http($app);
        };


    }
}