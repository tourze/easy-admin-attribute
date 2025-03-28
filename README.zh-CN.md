# EasyAdminBundle 属性扩展

[English](README.md) | [中文](README.zh-CN.md)

[![Latest Version](https://img.shields.io/packagist/v/tourze/easy-admin-attribute.svg?style=flat-square)](https://packagist.org/packages/tourze/easy-admin-attribute)
[![Quality Score](https://img.shields.io/scrutinizer/g/tourze/easy-admin-attribute.svg?style=flat-square)](https://scrutinizer-ci.com/g/tourze/easy-admin-attribute)
[![Total Downloads](https://img.shields.io/packagist/dt/tourze/easy-admin-attribute.svg?style=flat-square)](https://packagist.org/packages/tourze/easy-admin-attribute)

一个基于 PHP 8 属性的 EasyAdmin Bundle 扩展包，提供了一套完整的属性集来配置管理界面。

## 特性

- 使用 PHP 8 属性配置 EasyAdmin 实体
- 丰富的字段类型，包括文本、富文本、选择器、图片上传等
- CRUD 操作属性（列表、创建、编辑、删除、复制、导入/导出）
- 高级过滤和搜索功能
- 可自定义的表单布局和验证
- 常用类型的自动格式化（文件大小、布尔值、图片）
- 支持软删除操作
- 灵活的显示条件和排序选项

## 系统要求

- PHP 8.1 或更高版本
- EasyAdmin Bundle 4.x

## 安装

```bash
composer require tourze/easy-admin-attribute
```

## 快速开始

```php
<?php

use Tourze\EasyAdmin\Attribute\Action\Listable;
use Tourze\EasyAdmin\Attribute\Column\ListColumn;
use Tourze\EasyAdmin\Attribute\Field\FormField;
use Tourze\EasyAdmin\Attribute\Action\Deletable;

#[Listable]
#[Deletable(softDelete: true)]
class Product
{
    #[ListColumn(title: '产品名称', sorter: true)]
    #[FormField(required: true)]
    private string $name;

    #[ListColumn(title: '价格', columnType: 'money')]
    #[FormField(span: 12)]
    private float $price;

    #[ListColumn(title: '图片')]
    #[FormField(allowRemote: true)]
    private string $image;
}
```

## 可用属性

### 操作属性

- `Listable` - 配置列表视图，支持分页和排序
- `Deletable` - 启用删除操作，支持软删除
- `Copyable` - 添加复制功能
- `Importable` - 启用数据导入，支持模板生成

### 字段属性

- `FormField` - 配置表单字段，支持验证和布局
- `SelectField` - 创建实体关联的选择字段
- `RichTextField` - 富文本编辑器集成
- `ImagePickerField` - 图片上传和选择

### 列属性

- `ListColumn` - 配置列表视图列
- `ExportColumn` - 指定导出设置
- `ImportColumn` - 定义导入字段映射
- `FileSizeColumn` - 自动文件大小格式化
- `PictureColumn` - 图片显示配置
- `BoolColumn` - 布尔值格式化

### 过滤属性

- `Filterable` - 添加过滤功能
- `Keyword` - 启用字段关键词搜索

## 贡献

请查看 [CONTRIBUTING.md](CONTRIBUTING.md) 了解详情。

## 开源协议

MIT 开源协议。详情请查看 [License File](LICENSE.md)。
