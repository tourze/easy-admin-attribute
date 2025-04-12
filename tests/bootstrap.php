<?php

// 尝试加载vendor/autoload.php，如果存在的话
$autoloadFile = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadFile)) {
    require_once $autoloadFile;
} else {
    // 否则尝试加载monorepo根目录的autoload
    $monorepoAutoload = __DIR__ . '/../../../vendor/autoload.php';
    if (file_exists($monorepoAutoload)) {
        require_once $monorepoAutoload;
    }
}

// 设置测试环境变量
$_ENV['TEST_PERMISSION_TITLE'] = '测试权限标题';
