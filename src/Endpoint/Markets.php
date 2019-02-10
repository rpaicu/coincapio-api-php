<?php

namespace CoinCapIO\Endpoint;

use CoinCapIO\Client;
use GuzzleHttp\Psr7\Request;

/**
 * Take a closer look into exchanges with the /markets endpoint. Similar to the /exchanges
 * endpoint, we strive to offer transparency into how real-time our data is with a key
 * identifying when the market was last updated. For a historical view on how a market
 * has performed, see the /candles endpoint. All market data represents actual trades
 * processed, orders on an exchange are not represented. Data received from individual
 * markets is used to calculate the current price of an asset.
 *
 * @package CoinCapIO\Endpoint
 * @since   0.1
 */
class Markets extends Client
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
            'exchangeId',   // (optional) search by exchange id
            'baseSymbol',   // (optional) returns all containing the base symbol
            'quoteSymbol',  // (optional) returns all containing the quote symbol
            'baseId',       // (optional) returns all containing the base id
            'quoteId',      // (optional) returns all containing the quote id
            'assetSymbol',  // (optional) returns all assets containing symbol (base and quote)
            'assetId',      // (optional) returns all assets containing id (base and quote)
            'limit',        // (optional) max limit of 2000
            'offset'        // (optional) offset
        ];
        // Check if options is in allowed list of current method
        $this->checkOptions(array_keys($options), $allowed_options);

        $req = new Request('GET', 'markets');
        return $this->doRequest($req, ['query' => $options]);
    }

}
