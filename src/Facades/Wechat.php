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
 * @method static \Seffeng\Wechat\Wechat getAccessToken()
 * @method static \Seffeng\Wechat\Handlers\JssdkHandler getJsapiTicket()
 * @method static \Seffeng\Wechat\Handlers\JssdkHandler getSignPackage(string $url)
 * @method static \Seffeng\Wechat\Handlers\OauthHandler jscode2session(string $jscode)
 * @method static \Seffeng\Wechat\Wechat decrypt(string $key, string $encryptedData, string $iv)
 * @method static \Seffeng\Wechat\Wechat wxaUnlimitedQRCode(string $scene = '', string $page = '', int $width = 430, bool $autoColor = false, array $lineColor = ['r' => 0, 'g' => 0, 'b' => 0], bool $isHyaline = false)
 *
 * @see \Seffeng\Wechat\Wechat
 * @see \Seffeng\Wechat\Handlers\OauthHandler
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
