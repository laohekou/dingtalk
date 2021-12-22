<?php

if (!function_exists('ding')) {
    /**
     * DingTalk
     * @param array $config
     * @return \Xyu\Dingtalk\DingApp
     * Author: xyu
     */
    function ding(array $config)
    {
        return (new \Xyu\Dingtalk\DingApp($config));
    }
}

if (!function_exists('dingtalk')) {
    /**
     * DingTalk
     * @param string $name
     * @return mixed|\Xyu\Dingtalk\DingApp
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     * Author: xyu
     */
    function dingtalk(string $name = 'default')
    {
        return \Hyperf\Utils\ApplicationContext::getContainer()->get(\Xyu\Dingtalk\Hyperf\Factory::class)->make($name);
    }
}