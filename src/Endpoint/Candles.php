<?php

namespace CoinCapIO\Endpoint;

use CoinCapIO\Client;
use CoinCapIO\Exception;
use GuzzleHttp\Psr7\Request;

/**
 * The /candles endpoint offers a look into how a market has performed historically.
 * This data is represented in OHLCV candles - Open, High, Low, Close, and Volume.
 * Please note that many parameters are required to request candles for a specific
 * market. Candle history goes back to the inception of an exchange - you may even
 * find data for exchanges that have come and gone!
 *
 * @package CoinCapIO\Endpoint
 * @since   0.1
 */
class Candles extends Client
{
    /**
     * Get all prices from the CoinCap
     *
     * @param   array $options
     * @return  array
     * @throws  \GuzzleHttp\Exception\GuzzleException
     * @since   0.1
     */
    public function all(array $options = []): array
    {
        // List of allowed options
        $allowed_options = [
            'exchange',     // (required) exchange id
            'interval',     // (required) candle interval
            'baseId',       // (required) base id
            'quoteId',      // (required) quote id
            'start',        // (optional) UNIX time in milliseconds. omitting will return the most recent candles
            'end',          // (optional) UNIX time in milliseconds. omitting will return the most recent candles
        ];
        // Check if options is in allowed list of current method
        $this->checkOptions(array_keys($options), $allowed_options);


        $req = new Request('GET', 'candles');
        return $this->doRequest($req, ['query' => $options]);
    }

}
