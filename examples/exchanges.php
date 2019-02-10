<?php
require_once __DIR__ . '/../vendor/autoload.php';

$api = new \CoinCapIO\API();

// Get list of all exchanges
$exchangesAll = $api->exchanges->all();
print_r($exchangesAll);
//{
//  "data": [
//    {
//      "id": "okex",
//      "name": "Okex",
//      "rank": "1",
//      "percentTotalVolume": "21.379485735166293542000000000000000000",
//      "volumeUsd": "616465445.1646260280799955",
//      "tradingPairs": "22",
//      "socket": false,
//      "exchangeUrl": "https://www.okex.com/",
//      "updated": 1536343139514
//    },
//    ...
//    {
//      "id": "bleutrade",
//      "name": "Bleutrade",
//      "rank": "27",
//      "percentTotalVolume": "0.0013413661271628439817000000000000000000",
//      "volumeUsd": "38677.5377552719771068",
//      "tradingPairs": "97",
//      "socket": false,
//      "exchangeUrl": "https://bleutrade.com/",
//      "updated": 1536343084516
//    }
//  ],
//  "timestamp": 1536605835421
//}

// Get single exchange by id
$exchange = $api->exchanges->get('kraken');
print_r($exchange);
//{
//  "data": {
//    "id": "kraken",
//    "name": "Kraken",
//    "rank": "4",
//    "percentTotalVolume": "2.946801735133553120000000000000000000",
//    "volumeUsd": "84969370.4499608426167365",
//    "tradingPairs": "52",
//    "socket": false,
//    "exchangeUrl": "https://kraken.com",
//    "updated": 1536343139468
//  },
//  "timestamp": 1536605874069
//}
