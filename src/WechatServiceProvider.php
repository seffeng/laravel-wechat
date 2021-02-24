<?php
/**
 * @link http://github.com/seffeng/
 * @copyright Copyright (c) 2021 seffeng
 */
namespace Seffeng\LaravelWechat;

use Illuminate\Foundation\Application as LaravelApplication;
use Laravel\Lumen\Application as LumenApplication;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Seffeng\Wechat\Exceptions\WechatException;

class WechatServiceProvider extends BaseServiceProvider
{
    /**
     *
     * {@inheritDoc}
     * @see \Illuminate\Support\ServiceProvider::register()
     */
    public function register()
    {
        $this->registerAliases();
        $this->mergeConfigFrom($this->configPath(), 'wechat');

        $this->app->singleton('seffeng.laravel.wechat', function ($app) {
            $config = $app['config']->get('wechat');

            if ($config && is_array($config)) {
                return new WechatManager($config);
            } else {
                throw new WechatException('Please execute the command `php artisan vendor:publish --tag="wechat"` first to generate wechat configuration file.');
            }
        });
    }

    /**
     *
     * @author zxf
     * @date    2021年2月23日
     */
    public function boot()
    {
        if ($this->app->runningInConsole() && $this->app instanceof LaravelApplication) {
            $this->publishes([$this->configPath() => config_path('wechat.php')], 'wechat');
        } elseif ($this->app instanceof LumenApplication) {
            $this->app->configure('wechat');
        }
    }

    /**
     *
     * @author zxf
     * @date    2021年2月23日
     */
    protected function registerAliases()
    {
        $this->app->alias('seffeng.laravel.wechat', WechatManager::class);
    }

    /**
     *
     * @author zxf
     * @date    2021年2月23日
     * @return string
     */
    protected function configPath()
    {
        return dirname(__DIR__) . '/config/wechat.php';
    }
}
