# EasyAdminBundle 属性扩展

[English](README.md) | [中文](README.zh-CN.md)

[![Latest Version](https://img.shields.io/packagist/v/tourze/easy-admin-attribute.svg?style=flat-square)](https://packagist.org/packages/tourze/easy-admin-attribute)
[![Quality Score](https://img.shields.io/scrutinizer/g/tourze/easy-admin-attribute.svg?style=flat-square)](https://scrutinizer-ci.com/g/tourze/easy-admin-attribute)
[![Total Downloads](https://img.shields.io/packagist/dt/tourze/easy-admin-attribute.svg?style=flat-square)](https://packagist.org/packages/tourze/easy-admin-attribute)

一个用于 EasyAdmin Bundle 的 PHP 属性扩展，通过 PHP 8 属性简化管理界面的配置。

## 功能特性

- 使用 PHP 8 属性配置 EasyAdmin 实体
- 使用属性语法简化字段配置
- 支持所有 EasyAdmin 字段类型
- 自动发现实体配置
- IDE 支持的类型安全配置

## 安装

通过 composer 安装:

```bash
composer require tourze/easy-admin-attribute
```

## 快速开始

```php
<?php

use PhpMonorepo\EasyAdminAttribute\Attribute\AsField;
use PhpMonorepo\EasyAdminAttribute\Attribute\AsEntity;

#[AsEntity]
class Product
{
    #[AsField(type: 'text', label: '产品名称')]
    private string $name;

    #[AsField(type: 'money', currency: 'USD')]
    private float $price;
}
```

## 文档

详细文档请查看 [文档中心](docs/index.md)。

## 贡献

请查看 [CONTRIBUTING.md](CONTRIBUTING.md) 了解详情。

## 开源协议

本项目基于 MIT 协议开源。详细信息请查看 [License 文件](LICENSE.md)。
