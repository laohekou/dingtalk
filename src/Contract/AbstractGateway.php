<?php

namespace Xyu\Dingtalk\Contract;

use GuzzleHttp\Client;
use Xyu\Dingtalk\DingApp;

abstract class AbstractGateway
{

    protected $message;

    protected $at = [];

    /**
     * @var DingApp
     */
    protected $app;


    public function __construct(DingApp $app)
    {
        $this->app = $app;
    }


    private function makeAt(array $mobiles = [], bool $atAll = false)
    {
        return [
            'at' => [
                'atMobiles' => $mobiles,
                'isAtAll' => $atAll
            ]
        ];
    }


    public function at(bool $atAll = false, array $mobiles = [])
    {
        $this->at = $this->makeAt($mobiles, $atAll);
        return $this;
    }


    protected function getRobotUrl()
    {
        $query['access_token'] = $this->app->getAccessToken();
        $secret = $this->app->getSecret();
        $timestamp = time() . sprintf('%03d', mt_rand(1, 999));
        $sign = hash_hmac('sha256', $timestamp . "\n" . $secret, $secret, true);
        $query['timestamp'] = $timestamp;
        $query['sign'] = base64_encode($sign);
        return $this->app->getUrl() . '?' . http_build_query($query);
    }


    public function send()
    {
        $params = $this->message + $this->at;
        var_dump($params);die;

        $request = $this->app->http->setClient(
            new Client(['timeout' => $this->app->getTimeout()])
        )->json($this->getRobotUrl(), $params);

        $result = $request->getBody()->getContents();

        return json_decode($result, true) ?? [];
    }

}