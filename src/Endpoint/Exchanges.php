<?php

namespace CoinCapIO\Endpoint;

use CoinCapIO\Client;
use CoinCapIO\Exception;
use GuzzleHttp\Psr7\Request;

/**
 * The /exchanges endpoint offers an understanding into the where cryptocurrency is
 * being exchanged and offers high-level information on those exchanges.
 *
 * @package CoinCapIO\Endpoint
 * @since   0.1
 */
class Exchanges extends Client
{
    /**
     * Get all exchanges
     *
     * @return  array
     * @throws  \GuzzleHttp\Exception\GuzzleException
     */
    public function all(): array
    {
        $req = new Request('GET', 'exchanges');
        return $this->doRequest($req);
    }

    /**
     * Get exchange by id
     *
     * @param   string $id
     * @return  array
     * @throws  \GuzzleHttp\Exception\GuzzleException
     */
    public function get(string $id): array
    {
        $req = new Request('GET', \sprintf('exchanges/%s', $id));
        $data = $this->doRequest($req);
        return \array_shift($data);
    }
}
