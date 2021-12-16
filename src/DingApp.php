<?php

namespace Xyu\Dingtalk;

use Hanson\Foundation\Foundation;
use Xyu\Sand\ServiceProvider;

class DingApp extends Foundation
{
    protected $providers = [
        ServiceProvider::class,
    ];

    public function getAccessToken()
    {
        return $this->getConfig('token');
    }

    public function getEnabled()
    {
        return $this->getConfig('enabled');
    }

    public function getTimeout()
    {
        return $this->getConfig('timeout');
    }

    public function getSslVerify()
    {
        return $this->getConfig('ssl_verify');
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