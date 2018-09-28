# CoinCap.io API PHP library

    rpasoft/coincapio-api-php

## Basic example

```php
<?php
require_once __DIR__ . '/../vendor/autoload.php';

$api = new \CoinCapIO\API();
$assets_all = $api->assets->all();
print_r($assets_all);
```

## Developer

* [E-Freelancer](https://github.com/EvilFreelancer)

## Links

* https://coincap.io/
* https://docs.coincap.io/
