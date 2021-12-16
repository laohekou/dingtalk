<?php

namespace Xyu\Dingtalk\Laravel;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use Laravel\Lumen\Application;
use Xyu\Dingtalk\DingApp;
use Xyu\Dingtalk\Factory;

/**
 * Class ServiceProvider
 *
 * @package Xyu\Sand
 */
class ServiceProvider extends LaravelServiceProvider
{
    /**
     * Setup the config.
     */
    protected function setupConfig()
    {
        $source = dirname(__DIR__).'/config/ding.php';
        if ($this->app->runningInConsole()) {
            $this->publishes([$source => base_path('config/ding.php')], 'ding');
        }

        if ($this->app instanceof Application) {
            $this->app->configure('ding');
        }

        $this->mergeConfigFrom($source, 'ding');
    }

    public function register()
    {
        $this->setupConfig();

        $this->app->singleton(DingApp::class, function ($app) {
            return app(Factory::class)->make();
        });

        $this->app->singleton(Factory::class, function ($app) {
            return new Factory(config('ding'));
        });

        $this->app->alias(Factory::class, 'ding.factory');
        $this->app->alias(DingApp::class, 'ding');
    }
}