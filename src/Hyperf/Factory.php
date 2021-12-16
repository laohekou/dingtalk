<?php

namespace Xyu\Dingtalk\Hyperf;

use Hyperf\Contract\ConfigInterface;
use Xyu\Dingtalk\Factory as BaseFactory;

class Factory extends BaseFactory
{
    protected $config;

    protected $drivers;

    public function __construct(ConfigInterface $config)
    {
        parent::__construct($config->get('ding', []));
    }

    public function make(?string $name = null, ?array $config = null)
    {

        $app = parent::make($name);

        // 协程环境下，支持自定义 guzzle handler
        $app->rebind('guzzle_handler', 'Hyperf\Guzzle\CoroutineHandler');

        return $app;
    }
}