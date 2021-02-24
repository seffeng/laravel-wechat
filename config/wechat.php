<?php
/**
 * @link http://github.com/seffeng/
 * @copyright Copyright (c) 2021 seffeng
 */

return [
    /**
     *  默认 connection
     */
    'default' => env('WECHAT_CONNECTION', 'jssdk'),

    /**
     * connections
     */
    'connections' => [
        /**
         * JSSDK
         */
        'jssdk' => [
            /**
             * APPID
             */
            'appid' => env('WECHAT_APPID', null),
            /**
             * APP SECRET
             */
            'appSecret' => env('WECHAT_APP_SECRET', null),
            /**
             * 处理程序
             */
            'handler' => \Seffeng\Wechat\Handlers\JssdkHandler::class,
            /**
             * 缓存处理类，提供 get($key) 和 set($key, $value, $ttl) 方法
             */
            'cacheHandler' => \Seffeng\LaravelWechat\Handlers\CacheHandler::class,
        ]
    ]
];
