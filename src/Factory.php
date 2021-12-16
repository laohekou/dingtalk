<?php

namespace Xyu\Dingtalk;

use Xyu\Dingtalk\Exception\DingAppException;

class Factory
{
    protected $config;

    protected $drivers;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function make(?string $name = null, ?array $config = null)
    {
        $name = $name ?? $this->getDefaultDriver();

        if (empty($this->config[$name])) {
            throw new DingAppException("Undefined {$name} configuration");
        }

        $config = $config ?? $this->config[$name];

        return $this->drivers[$name] ?? $this->drivers[$name] = new DingApp($config);
    }

    public function getDefaultDriver()
    {
        return $this->config['default'] ?? 'default';
    }

    public function __call($name, $arguments)
    {
        $app = $this->make();

        if (method_exists($app, $name)) {
            return call_user_func_array([$app, $name], $arguments);
        }

        throw new DingAppException("Undefined {$name} method!");
    }
}