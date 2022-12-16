# A short description of the tile

[![Latest Version on Packagist](https://img.shields.io/packagist/v/creacoon/laravel-dashboard-fathom-tile.svg?style=flat-square)](https://packagist.org/packages/creacoon/laravel-dashboard-fathom-tile)
[![GitHub Build Action Status](https://img.shields.io/github/workflow/status/creacoon/laravel-dashboard-fathom-tile/PHP%20Composer/master)](https://github.com/creacoon/laravel-dashboard-fathom-tile/actions?query=workflow%3Aphp+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/creacoon/laravel-dashboard-fathom-tile.svg?style=flat-square)](https://packagist.org/packages/creacoon/laravel-dashboard-fathom-tile)

This tile displays the visitors on a site using Fathom.

This tile can be used on [the Laravel Dashboard](https://docs.spatie.be/laravel-dashboard).

## Installation

1. Require the package via composer
1. Place all the necessary information in the config file, use the template below.
1. Place the tile component in your dashboard.
1. Schedule the command in the kernel.php.

### Composer
You can install the package via composer:
```bash
composer require creacoon/laravel-dashboard-fathom-tile 
```

### Config file
In the `dashboard` config file, you must add this configuration in the `tiles` key. 

```php
// in config/dashboard.php

return [
    // ...
    'tiles' => [
        'fathom' => [
            'token' => env('HELPSPACE_API_TOKEN'),
            'refresh_interval_in_seconds' => '60',
        ],
    ],
];
```
### Tile component
In your dashboard view you use the `livewire:fathom-tile` component.
```html
<x-dashboard>
    <livewire:fathom-tile position="e7:e16"/>
</x-dashboard>
```

### Schedule command
In `app\Console\Kernel.php` you should schedule the following commands.

```php
protected function schedule(Schedule $schedule)
{
    // ...
           $schedule->command(FetchDataFromFathomCommand::class)->everyMinute();
}
```

### Customizing the view
If you want to customize the view used to render this tile, run this command:

```php
php artisan vendor:publish --tag="dashboard-fathom-tile-views"
```

## Testing

``` bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email support@creacoon.nl instead of using the issue tracker.

## Credits

- [Dion Nijssen](https://github.com/dionnijssen)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
