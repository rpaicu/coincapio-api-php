# CoinCap.io API PHP library

    rpaicu/coincapio-api-php

## Basic examples

More additional examples with responses you can find [here](examples). 

```php
$api = new \CoinCapIO\API();

// Assets
$assetsAll = $api->assets->all('bitcoin');  // Get list of all assets
$asset = $api->assets->get('bitcoin');      // Get single asset by id
$assetsHistory = $api->assets->history('bitcoin', 'd1'); // Get history by asset id and days range
$assetsMarkets = $api->assets->markets('bitcoin'); // Get information about markets

// Rates
$ratesAll = $api->rates->all();             // Get list of all rates
$rate = $api->rates->get('bitcoin');        // Get single rate by id

// Exchanges
$exchangesAll = $api->exchanges->all();     // Get list of all exchanges
$exchange = $api->exchanges->get('kraken'); // Get single exchange by id

// Markets
$marketsAll = $api->markets->all([          // Get list of all markets
    'exchangeId'  => 'poloniex',
    'assetSymbol' => 'BTC'
]);

// Candles
$candlesAll = $api->candles->all([          // Get list of all candles
    'exchange' => 'poloniex', 
    'interval' => 'h8',
    'baseId'   => 'ethereum', 
    'quoteId'  => 'bitcoin'
]);
```

## Links

* https://coincap.io/ - Main site of ConCap project
* https://docs.coincap.io/ - API documentation
