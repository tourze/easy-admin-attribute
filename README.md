# EasyAdminBundle Attribute Extend

[English](README.md) | [中文](README.zh-CN.md)

[![Latest Version](https://img.shields.io/packagist/v/tourze/easy-admin-attribute.svg?style=flat-square)](https://packagist.org/packages/tourze/easy-admin-attribute)
[![Quality Score](https://img.shields.io/scrutinizer/g/tourze/easy-admin-attribute.svg?style=flat-square)](https://scrutinizer-ci.com/g/tourze/easy-admin-attribute)
[![Total Downloads](https://img.shields.io/packagist/dt/tourze/easy-admin-attribute.svg?style=flat-square)](https://packagist.org/packages/tourze/easy-admin-attribute)

A PHP attribute extension for EasyAdmin Bundle that provides a comprehensive set of attributes to configure admin interfaces using PHP 8 attributes.

## Features

- Configure EasyAdmin entities using PHP 8 attributes
- Rich set of field types including Text, RichText, Select, ImagePicker and more
- CRUD operation attributes (List, Create, Edit, Delete, Copy, Import/Export)
- Advanced filtering and search capabilities
- Customizable form layouts and validations
- Automatic column formatting for common types (FileSize, Boolean, Images)
- Support for soft delete operations
- Flexible display conditions and sorting options

## Requirements

- PHP 8.1 or higher
- EasyAdmin Bundle 4.x

## Installation

You can install the package via composer:

```bash
composer require tourze/easy-admin-attribute
```

## Quick Start

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
    #[ListColumn(title: 'Product Name', sorter: true)]
    #[FormField(required: true)]
    private string $name;

    #[ListColumn(title: 'Price', columnType: 'money')]
    #[FormField(span: 12)]
    private float $price;

    #[ListColumn(title: 'Image')]
    #[FormField(allowRemote: true)]
    private string $image;
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

### Column Attributes

- `ListColumn` - Configure list view columns
- `ExportColumn` - Specify export settings
- `ImportColumn` - Define import field mappings
- `FileSizeColumn` - Automatic file size formatting
- `PictureColumn` - Image display configuration
- `BoolColumn` - Boolean value formatting

### Filter Attributes

- `Filterable` - Add filtering capabilities
- `Keyword` - Enable keyword search on fields

## Contributing

Please see [CONTRIBUTING.md](CONTRIBUTING.md) for details.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
