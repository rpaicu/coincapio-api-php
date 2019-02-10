<?php
require_once __DIR__ . '/../vendor/autoload.php';

$api = new \CoinCapIO\API();

// Get list of all exchanges
$candlesAll = $api->candles->all([
    'exchange' => 'poloniex',
    'interval' => 'h8',
    'baseId'   => 'ethereum',
    'quoteId'  => 'bitcoin'
]);
print_r($candlesAll);
//{
//    "data": [
//    {
//      "open": "0.0708000000000000",
//      "high": "0.0710450000000000",
//      "low": "0.0706434000000000",
//      "close": "0.0708350100000000",
//      "volume": "1818.1433015300000000",
//      "period": 1530720000000
//    },
//    ...
//    {
//      "open": "0.0709350000000000",
//      "high": "0.0711370000000000",
//      "low": "0.0704796500000000",
//      "close": "0.0706550000000000",
//      "volume": "640.3759941800000000",
//      "period": 1531670400000
//    }
//  ],
//  "timestamp": 1533581190540
//}
