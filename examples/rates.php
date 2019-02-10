<?php
require_once __DIR__ . '/../vendor/autoload.php';

$api = new \CoinCapIO\API();

// Get list of all rates
$ratesAll = $api->rates->all();
print_r($ratesAll);
//{
//    "data": [
//    {
//      "id": "barbadian-dollar",
//      "symbol": "BBD",
//      "currencySymbol": "$",
//      "type": "fiat",
//      "rateUsd": "0.5000000000000000"
//    },
//    ...
//    {
//        "id": "sudanese-pound",
//      "symbol": "SDG",
//      "currencySymbol": null,
//      "type": "fiat",
//      "rateUsd": "0.0553074310566601"
//    }
//  ],
//  "timestamp": 1536347807471
//}

// Get single rate by id
$rate = $api->rates->get('bitcoin');
print_r($rate);
//{
//  "data": {
//    "id": "bitcoin",
//    "symbol": "BTC",
//    "currencySymbol": "₿",
//    "type": "crypto",
//    "rateUsd": "6444.3132749056076909"
//  },
//  "timestamp": 1536347871542
//}
