<?php
require_once __DIR__ . '/../vendor/autoload.php';

$api = new \CoinCapIO\API();

// Get list of all markets
$marketsAll = $api->markets->all([
    'exchangeId'  => 'poloniex',
    'assetSymbol' => 'BTC'
]);
print_r($marketsAll);
//{
//  "data": [
//    {
//      "exchangeId": "bitstamp",
//      "rank": "1",
//      "baseSymbol": "BTC",
//      "baseId": "bitcoin",
//      "quoteSymbol": "USD",
//      "quoteId": "united-states-dollar",
//      "priceQuote": "6927.3300000000000000",
//      "priceUsd": "6927.3300000000000000",
//      "volumeUsd24Hr": "43341291.9576547008000000",
//      "percentExchangeVolume": "67.2199253376108585",
//      "tradesCount24Hr": "420721",
//      "updated": 1533581033590
//    },
//    ...
//    {
//      "exchangeId": "luno",
//      "rank": "2",
//      "baseSymbol": "BTC",
//      "baseId": "bitcoin",
//      "quoteSymbol": "NGN",
//      "quoteId": "nigerian-naira",
//      "priceQuote": "2462000.0000000000000000",
//      "priceUsd": "6810.5117565697726000",
//      "volumeUsd24Hr": "403593.5691728862733478",
//      "percentExchangeVolume": "18.2926095073936712",
//      "tradesCount24Hr": "2258",
//      "updated": 1533581073393
//    }
//  ],
//  "timestamp": 1533581173350
//}
