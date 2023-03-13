<?php

namespace plugin\swagger\app\controller;

use support\Request;
use OpenApi\Generator;

class IndexController
{

    public function index()
    {
        return view('index/index');
    }

    public function json()
    {
        $openapi = Generator::scan(config('plugin.swagger.app.scan_path'));
        return json($openapi);
    }

    public function test()
    {
        return json(config('plugin.swagger.app.scan_path'));
    }

}
