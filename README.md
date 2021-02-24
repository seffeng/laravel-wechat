# Laravel Wechat

### 安装

```shell
# 安装
$ composer require seffeng/laravel-wechat
```

##### Laravel

```php
# 1、生成配置文件
$ php artisan vendor:publish --tag="wechat"

# 2、修改配置文件 /config/wechat.php，或 .env
```

##### lumen

```php
# 1、复制扩展内配置文件 /config/wechat.php 到项目配置目录 /config

# 2、修改配置文件 /config/wechat.php，或 .env

# 3、将以下代码段添加到 /bootstrap/app.php 文件中的 Providers 部分
$app->register(Seffeng\LaravelWechat\WechatServiceProvider::class);

# 4、/bootstrap/app.php 添加配置加载代码
$app->configure('wechat');
```

### 示例

```php
# 客户端示例
use Seffeng\Wechat\Exceptions\WechatException;
use Seffeng\LaravelWechat\Facades\Wechat;

class SiteController extends Controller
{
    public function test()
    {
        try {
            
        } catch (WechatException $e) {
            var_dump($e->getMessage());
        } catch (\Exception $e) {
            var_dump($e->getMessage());
        }
    }
}
```

### 备注

1、测试脚本 tests/WechatTest.php 仅作为示例供参考。

