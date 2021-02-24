<?php
/**
 * @link http://github.com/seffeng/
 * @copyright Copyright (c) 2021 seffeng
 */
namespace Seffeng\LaravelWechat\Facades;

use Illuminate\Support\Facades\Facade;

/**
 *
 * @author zxf
 * @date   2021年2月24日
 * @method static \Seffeng\LaravelWechat\WechatManager loadConnection(string $connection = null)
 * @method static \Seffeng\Wechat\Handlers\JssdkHandler setCacheKeyJsapiTicket(string $key)
 * @method static \Seffeng\Wechat\Handlers\JssdkHandler setCacheKeyAccessToken(string $key)
 * @method static \Seffeng\Wechat\Handlers\JssdkHandler getAccessToken()
 * @method static \Seffeng\Wechat\Handlers\JssdkHandler getJsapiTicket()
 * @method static \Seffeng\Wechat\Handlers\JssdkHandler getSignPackage(string $url)
 *
 * @see \Seffeng\Wechat\Handlers\JssdkHandler
 * @see \Seffeng\LaravelWechat\WechatManager
 */
class Wechat extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'seffeng.laravel.wechat';
    }
}
