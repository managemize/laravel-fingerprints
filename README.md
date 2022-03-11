# ![](https://managemize.com/favicon-32x32.png) managemize/laravel-fingerprints 

[![Latest Version on Packagist](https://img.shields.io/packagist/v/managemize/laravel-fingerprints.svg?style=flat-square)](https://packagist.org/packages/managemize/laravel-fingerprints)
[![Total Downloads](https://img.shields.io/packagist/dt/managemize/laravel-fingerprints.svg?style=flat-square)](https://packagist.org/packages/managemize/laravel-fingerprints)
![GitHub Actions](https://github.com/managemize/laravel-fingerprints/actions/workflows/main.yml/badge.svg)

This laravel package will allow your models to record the the created, updated and deleted by User FingerPrints

## Installation

You can install the package via composer:

```bash
composer require managemize/laravel-fingerprints
```

## Usage
Add the trait to your models
```php
use HasUserFingerPrint;
```

### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email managemize@gmail.com instead of using the issue tracker.

## Credits

-   [Pedro Monteiro](https://github.com/managemize)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.