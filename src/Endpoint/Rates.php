<?php

namespace CoinCapIO\Endpoint;

use CoinCapIO\Client;
use GuzzleHttp\Psr7\Request;

/**
 * All prices on the CoinCap API are standardized in USD (United States Dollar).
 * To make translating to other values easy, CoinCap now offers a Rates endpoint.
 * We offer fiat and top cryptocurrency translated rates. Fiat rates are
 * available through OpenExchangeRates.org.
 *
 * @package CoinCapIO\Endpoint
 * @since   0.1
 */
class Rates extends Client
{
    /**
     * Get all rates from the CoinCap
     *
     * @example curl --location --request GET "api.coincap.io/v2/rates" --data ""
     *
     * @return  array
     * @throws  \GuzzleHttp\Exception\GuzzleException
     * @since   0.1
     */
    public function all(): array
    {
        $req = new Request('GET', 'rates');
        return $this->doRequest($req);
    }

    /**
     * Get rate by id
     *
     * @example curl --location --request GET "api.coincap.io/v2/rates/bitcoin" --data ""
     *
     * @param   string $id
     * @return  array
     * @throws  \GuzzleHttp\Exception\GuzzleException
     * @since   0.1
     */
    public function get(string $id): array
    {
        $req  = new Request('GET', \sprintf('rates/%s', $id));
        $data = $this->doRequest($req);
        return \array_shift($data);
    }
}
