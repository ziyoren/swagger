# Swagger

Swagger UI plugin for webman

## 项目介绍
Swagger是一个规范和完整的框架，用于生成、描述、调用和可视化 RESTful 风格的 Web 服务。
`ziyoren/swagger`集成了SwaggerUI和`zircote/swagger-php`。具备以下特点：
* 接口文档在线自动生成
* 可完成功能测试
* API文档始终保持同步

## 安装
```sh 
composer require ziyoren/swagger
```
> **注意**
> 虽然可以在Webman的应用市场下载源码，但是推荐用composer安装，因为可以自动安装相关依赖。

## 访问

访问`http://127.0.0.1:8787/app/swagger`就可以看到SwaggerUI的界面。

## 更新你的代码
以主项目`app/controller/IndexController.php`为例，增加注释
```php
<?php

namespace app\controller;

use support\Request;

/**
 * @OA\Info(
 *   title="我的第一个API",
 *   version="0.0.1",
 *   contact={
 *     "name": "技术支持",
 *     "email": "asun@66580.cn"
 *   }
 * )
 */


class IndexController
{


    public $name;

    
    public function index(Request $request)
    {
        return response('hello webman'. $this->name);
    }

    public function view(Request $request)
    {
        return view('index/view', ['name' => 'webman']);
    }


    /**
     * @OA\Get(
     *     path="/index/json",
     *     @OA\Response(response="200", description="{ 'code': 0, 'msg': 'ok' }")
     * )
     */

    public function json(Request $request)
    {
        return json(['code' => 0, 'msg' => 'ok']);
    }

}

```

## 默认扫描路径
默认扫描主项目的`app/controller`目录。如果需要增加扫描的目录，请修改`plugin/swagger/config/app.php`文件里的`scan_path`。
```php
<?php

use support\Request;

return [
    'debug' => true,
    'controller_suffix' => 'Controller',
    'controller_reuse' => false,
    'version' => '0.1.0',
    //增加对model目录的扫描
    'scan_path' => [app_path('controller'), app_path('model')],
];

```

## 依赖
* PHP >= 7.2
* Webman >= 1.4
* zircote/swagger-php >= 4.5

## Link
[Swagger-PHP](https://zircote.github.io/swagger-php/)

[示例值得看看/Learn by example](https://github.com/zircote/swagger-php/tree/master/Examples)

[Swagger-php 2.x documentation](https://github.com/zircote/swagger-php/tree/2.x/docs)