# EasyAdminBundle Attribute Extend

[English](README.md) | [中文](README.zh-CN.md)

[![Latest Version](https://img.shields.io/packagist/v/tourze/easy-admin-attribute.svg?style=flat-square)](https://packagist.org/packages/tourze/easy-admin-attribute)
[![Quality Score](https://img.shields.io/scrutinizer/g/tourze/easy-admin-attribute.svg?style=flat-square)](https://scrutinizer-ci.com/g/tourze/easy-admin-attribute)
[![Total Downloads](https://img.shields.io/packagist/dt/tourze/easy-admin-attribute.svg?style=flat-square)](https://packagist.org/packages/tourze/easy-admin-attribute)

A PHP attribute extension for EasyAdmin Bundle that provides a comprehensive set of attributes to configure admin interfaces using PHP 8 attributes. This package simplifies EasyAdmin configuration by leveraging PHP 8's attribute system to create clean, type-safe admin interfaces.

## Features

- Configure EasyAdmin entities using PHP 8 attributes
- Rich set of field types including Text, RichText, Select, ImagePicker and more
- CRUD operation attributes (List, Create, Edit, Delete, Copy, Import/Export)
- Advanced filtering and search capabilities
- Customizable form layouts and validations
- Automatic column formatting for common types (FileSize, Boolean, Images)
- Support for soft delete operations
- Flexible display conditions and sorting options
- Permission-based access control system

## Requirements

- PHP 8.1 or higher
- EasyAdmin Bundle 4.x
- chrisullyott/php-filesize: ^4.2

## Installation

You can install the package via composer:

```bash
composer require tourze/easy-admin-attribute
```

## Quick Start

### Basic Entity Configuration

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
    private string $name;

    private float $price;

    private string $image;
}
```

### Using Permissions

```php
<?php

use Tourze\EasyAdmin\Attribute\Permission\AsPermission;
use Tourze\EasyAdmin\Attribute\Action\Listable;

#[AsPermission(name: 'product', title: 'Product Management')]
#[Listable(showTotal: true)]
class Product
{
    // Entity properties
}
```

## Available Attributes

### Action Attributes

- `Listable` - Configure list view with pagination and sorting
- `Deletable` - Enable delete operation with soft delete support
- `Copyable` - Add copy functionality
- `Importable` - Enable data import with template generation

### Field Attributes

- `FormField` - Configure form fields with validation and layout
- `SelectField` - Create select fields with entity relations
- `RichTextField` - Rich text editor integration
- `ImagePickerField` - Image upload and selection
- `ImportField` - Configure import field mappings

### Column Attributes

- `ListColumn` - Configure list view columns
- `ExportColumn` - Specify export settings
- `ImportColumn` - Define import field mappings
- `FileSizeColumn` - Automatic file size formatting
- `PictureColumn` - Image display configuration
- `BoolColumn` - Boolean value formatting
- `CopyColumn` - Column copying configuration

### Filter Attributes

- `Filterable` - Add filtering capabilities
- `Keyword` - Enable keyword search on fields

### Permission Attributes

- `AsPermission` - Configure permission-based access control

## Configuration

### Listable Configuration Options

```php
#[Listable(
    showPagination: true,
    actionWidth: 120,
    scrollX: 'max-content',
    showTotal: true,
    totalTitleColumn: 'name',
    sortColumn: ['created_at' => 'DESC']
)]
```

### FormField Configuration Options

```php
#[FormField(
    required: true,
    span: 12,
    label: 'Custom Label',
    placeholder: 'Enter value here'
)]
```

## Advanced Usage

### Custom Filtering

```php
<?php

use Tourze\EasyAdmin\Attribute\Filter\Filterable;
use Tourze\EasyAdmin\Attribute\Filter\Keyword;

#[Filterable]
class Product
{
    private string $name;

    // Other properties
}
```

## Common Issues and Solutions

- If attributes aren't applied correctly, make sure your PHP version is 8.1 or higher
- For form validation issues, check that all required fields have the `required` parameter set
- Permission issues may occur if the `AsPermission` attribute isn't configured properly

## Contributing

Please see [CONTRIBUTING.md](CONTRIBUTING.md) for details.

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
