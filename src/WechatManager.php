<?php
/**
 * @link http://github.com/seffeng/
 * @copyright Copyright (c) 2021 seffeng
 */
namespace Seffeng\LaravelWechat;

use Seffeng\Wechat\Wechat;
use Seffeng\Wechat\Helpers\ArrayHelper;
use Seffeng\Wechat\Exceptions\WechatException;

/**
 *
 * @author zxf
 * @date   2021年2月23日
 *
 * @see \Seffeng\Wechat\Wechat
 */
class WechatManager
{
    /**
     * [default]
     * @var string
     */
    protected $connection;

    /**
     *
     * @var Wechat
     */
    protected $service;

    /**
     *
     * @var array
     */
    protected $config;

    /**
     *
     * @author zxf
     * @date   2020年9月14日
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
        $this->loadConnection();
    }

    /**
     *
     * @author zxf
     * @date   2021年2月24日
     * @param string $connection
     * @return static
     */
    public function loadConnection(string $connection = null)
    {

        $this->setConnection(is_null($connection) ? ArrayHelper::getValue($this->config, 'default') : $connection);
        $appid = ArrayHelper::getValue($this->config, 'connections.' . $this->getConnection() . '.appid');
        $appSecret = ArrayHelper::getValue($this->config, 'connections.' . $this->getConnection() . '.appSecret');
        $handler = ArrayHelper::getValue($this->config, 'connections.' . $this->getConnection() . '.handler');
        $cache = ArrayHelper::getValue($this->config, 'connections.' . $this->getConnection() . '.cacheHandler');

        if (!$appid || !$appSecret) {
            throw new WechatException('Warning: appid, appSecret cannot be empty.');
        }
        $this->service = new Wechat($appid, $appSecret, $handler, $cache);
        return $this;
    }

    /**
     *
     * @author zxf
     * @date   2020年9月14日
     * @param string $client
     * @return static
     */
    public function setConnection(string $connection = null)
    {
        !is_null($connection) && $this->connection = $connection;
        return $this;
    }

    /**
     *
     * @author zxf
     * @date   2020年9月15日
     * @return string
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     *
     * @author zxf
     * @date   2021年2月23日
     * @return string
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     *
     * @author zxf
     * @date   2021年2月23日
     * @param  string  $method
     * @param  mixed $parameters
     * @throws WechatException
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        try {
            return $this->getService()->{$method}(...$parameters);
        } catch (WechatException $e) {
            throw $e;
        } catch (\Exception $e) {
            throw new WechatException('异常错误！');
        }
    }
}
