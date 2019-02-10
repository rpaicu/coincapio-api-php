<?php
require_once __DIR__ . '/../vendor/autoload.php';

$api = new \CoinCapIO\API();

// Get list of all assets
$assetsAll = $api->assets->all('bitcoin');
print_r($assetsAll);
//{
//  "data": [
//    {
//      "id": "bitcoin",
//      "rank": "1",
//      "symbol": "BTC",
//      "name": "Bitcoin",
//      "supply": "17193925.0000000000000000",
//      "maxSupply": "21000000.0000000000000000",
//      "marketCapUsd": "119150835874.4699281625807300",
//      "volumeUsd24Hr": "2927959461.1750323310959460",
//      "priceUsd": "6929.8217756835584756",
//      "changePercent24Hr": "-0.8101417214350335",
//      "vwap24Hr": "7175.0663247679233209"
//    },
//    ...
//    {
//        "id": "bibox-token",
//      "rank": "100",
//      "symbol": "BIX",
//      "name": "Bibox Token",
//      "supply": "102339166.0000000000000000",
//      "maxSupply": null,
//      "marketCapUsd": "72116102.5394724649666992",
//      "volumeUsd24Hr": "45084130.4166935808283857",
//      "priceUsd": "0.7046774500729512",
//      "changePercent24Hr": "-3.0331628584946192",
//      "vwap24Hr": "0.7207903092174193"
//    }
//  ],
//  "timestamp": 1533581088278
//}

// Get single asset by id
$asset = $api->assets->get('bitcoin');
print_r($asset);
//{
//  "data": {
//    "id": "bitcoin",
//    "rank": "1",
//    "symbol": "BTC",
//    "name": "Bitcoin",
//    "supply": "17193925.0000000000000000",
//    "maxSupply": "21000000.0000000000000000",
//    "marketCapUsd": "119179791817.6740161068269075",
//    "volumeUsd24Hr": "2928356777.6066665425687196",
//    "priceUsd": "6931.5058555666618359",
//    "changePercent24Hr": "-0.8101417214350335",
//    "vwap24Hr": "7175.0663247679233209"
//  },
//  "timestamp": 1533581098863
//}

// Get history by asset id and days range
$assetsHistory = $api->assets->history('bitcoin', 'd1');
print_r($assetsHistory);
//{
//  "data": [
//    {
//      "priceUsd": "6379.3997635993342453",
//      "time": 1530403200000
//    },
//    {
//      "priceUsd": "6987.2119251945676799",
//      "time": 1533427200000
//    }
//  ],
//  "timestamp": 1533581103627
//}

// Get information about markets
$assetsMarkets = $api->assets->markets('bitcoin');
print_r($assetsMarkets);
//{
//  "data": [
//    {
//      "exchangeId": "Binance",
//      "baseId": "bitcoin",
//      "quoteId": "tether",
//      "baseSymbol": "BTC",
//      "quoteSymbol": "USDT",
//      "volumeUsd24Hr": "277775213.1923032624064566",
//      "priceUsd": "6263.8645034633024446",
//      "volumePercent": "7.4239157877678087"
//    },
//    ...
//    {
//      "exchangeId": "Korbit",
//      "baseId": "bitcoin",
//      "quoteId": "south-korean-won",
//      "baseSymbol": "BTC",
//      "quoteSymbol": "KRW",
//      "volumeUsd24Hr": "5769780.4561206088012976",
//      "priceUsd": "6360.0679439900674000",
//      "volumePercent": "0.1542051348926291"
//    }
//  ],
//  "timestamp": 1539289444052
//}
