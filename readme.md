# dingtalk
钉钉

* 支持 `composer` 安装
* 支持 hyperf、laravel/lumen、tp 等框架

## 安装 - install

```bash
$ composer require xyu/dingtalk
```

发布配置 vendor:publish
```bash
Hyperf
php bin/hyperf.php vendor:publish xyu/sand
Laravel
php artisan vendor:publish
```

```php
Hyperf  调用：
$app = make(\Xyu\Dingtalk\Hyperf\Factory::class)->make()->text->message('message')->send();
fpm相关框架 调用：
$app = (new \Xyu\Dingtalk\DingApp(config('ding')))->text->message('message')->send();
```

https://github.com/laohekou/dingtalk