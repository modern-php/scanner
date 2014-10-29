# URL Scanner

Scan an array of URLs and report inaccessible URLs

## Install

Via Composer

``` bash
$ composer require modernphp/scanner
```

## Usage

``` php
$urls = [
    'http://www.apple.com',
    'http://php.net',
    'http://sdfssdwerw.org'
];
$scanner = new \Oreilly\ModernPHP\Url\Scanner($urls);
print_r($scanner->getInvalidUrls());
```

## Testing

Tests unavailable.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Josh Lockhart](https://github.com/codeguy)
- [All Contributors](https://github.com/modernphp/scanner/contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
