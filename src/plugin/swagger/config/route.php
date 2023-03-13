<?php

use Webman\Route;

Route::any('/app/swagger/doc.json', [\plugin\swagger\app\controller\IndexController::class, 'json']);