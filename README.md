# Caching helper for Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ollico/laravel-caching.svg?style=flat-square)](https://packagist.org/packages/ollico/laravel-caching)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/ollico/laravel-caching/run-tests?label=tests)](https://github.com/ollico/laravel-caching/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/ollico/laravel-caching/Fix%20PHP%20code%20style%20issues?label=code%20style)](https://github.com/ollico/laravel-caching/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/ollico/laravel-caching.svg?style=flat-square)](https://packagist.org/packages/ollico/laravel-caching)

## Installation

You can install the package via composer:

```bash
composer require ollico/laravel-caching
```

Install the package using:

```bash
php artisan caching:install
```

## Usage

```php
Ollico\Caching\Caching::remember('key', 'value');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [David Bonner](https://github.com/davidianbonner)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
