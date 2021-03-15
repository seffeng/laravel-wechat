<?php
/**
 * @link http://github.com/seffeng/
 * @copyright Copyright (c) 2021 seffeng
 */
namespace Seffeng\LaravelWechat\Handlers;

use Illuminate\Support\Facades\Cache;

class CacheHandler implements \Seffeng\Wechat\Contracts\Cache
{
    /**
     *
     * @author zxf
     * @date   2021年2月24日
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public function get(string $key, $default = null)
    {
        return Cache::get($key, $default);
    }

    /**
     *
     * @author zxf
     * @date   2021年2月24日
     * @param string $key
     * @param mixed $value
     * @param integer $ttl
     * @return boolean
     */
    public function set(string $key, $value, $ttl = null)
    {
        return Cache::add($key, $value, $ttl);
    }
}
