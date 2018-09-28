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
     * Get all prices from the CoinCap
     *
     * @return  array
     * @throws  \GuzzleHttp\Exception\GuzzleException
     */
    public function all(): array
    {
        $req = new Request('GET', 'rates');
        return $this->doRequest($req);
    }

    /**
     * Get rate by id
     *
     * @param   string $id
     * @return  array
     * @throws  \GuzzleHttp\Exception\GuzzleException
     */
    public function get(string $id): array
    {
        $req = new Request('GET', \sprintf('rates/%s', $id));
        $data = $this->doRequest($req);
        return \array_shift($data);
    }
}
