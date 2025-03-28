# EasyAdminBundle Attribute Extend

[English](README.md) | [中文](README.zh-CN.md)

[![Latest Version](https://img.shields.io/packagist/v/php-monorepo/easy-admin-attribute.svg?style=flat-square)](https://packagist.org/packages/php-monorepo/easy-admin-attribute)
[![Quality Score](https://img.shields.io/scrutinizer/g/php-monorepo/easy-admin-attribute.svg?style=flat-square)](https://scrutinizer-ci.com/g/php-monorepo/easy-admin-attribute)
[![Total Downloads](https://img.shields.io/packagist/dt/php-monorepo/easy-admin-attribute.svg?style=flat-square)](https://packagist.org/packages/php-monorepo/easy-admin-attribute)

A PHP attribute extension for EasyAdmin Bundle that simplifies the configuration of admin interfaces using PHP 8 attributes.

## Features

- Configure EasyAdmin entities using PHP 8 attributes
- Simplified field configuration with attribute syntax
- Support for all EasyAdmin field types
- Auto-discovery of entity configurations
- Type-safe configuration with IDE support

## Installation

You can install the package via composer:

```bash
composer require php-monorepo/easy-admin-attribute
```

## Quick Start

```php
<?php

use PhpMonorepo\EasyAdminAttribute\Attribute\AsField;
use PhpMonorepo\EasyAdminAttribute\Attribute\AsEntity;

#[AsEntity]
class Product
{
    #[AsField(type: 'text', label: 'Product Name')]
    private string $name;

    #[AsField(type: 'money', currency: 'USD')]
    private float $price;
}
```

## Documentation

For detailed documentation, please check our [Documentation](docs/index.md).

## Contributing

Please see [CONTRIBUTING.md](CONTRIBUTING.md) for details.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
