<?php

namespace CoincapIO\Endpoint;

use CoinCapIO\Client;
use CoinCapIO\Exception;
use GuzzleHttp\Psr7\Request;

class Assets extends Client
{

    /**
     * Get all assets
     *
     * @param   int|null $limit
     * @param   int|null $start
     * @param   string|null $search
     * @return  array
     * @throws  \GuzzleHttp\Exception\GuzzleException
     */
    public function all(int $limit = null, int $start = null, string $search = null): array
    {
        $req = new Request('GET', 'assets');

        return $this->doRequest($req, [
            'query' => [
                'limit' => $limit,
                'start' => $start,
                'search' => $search
            ]
        ]);
    }

    /**
     * Get asset by id
     *
     * @param   string $id
     * @return  array
     * @throws  \GuzzleHttp\Exception\GuzzleException
     */
    public function get(string $id): array
    {
        $req = new Request('GET', \sprintf('assets/%s', $id));
        $data = $this->doRequest($req);
        return \array_shift($data);
    }

    /**
     * Get history of ticker by id
     *
     * @param   string $id
     * @param   array $options
     * @return  array
     * @throws  Exception
     * @throws  \GuzzleHttp\Exception\GuzzleException
     */
    public function history(string $id, array $options = []): array
    {
        // List of allowed options
        $allowed_options = ['interval', 'id', 'start', 'end', 'limit', 'offset'];
        // Check if options is in allowed list of current method
        $this->checkOptions(array_keys($options), $allowed_options);

        $req = new Request('GET', \sprintf('assets/%s/history', $id));
        return $this->doRequest($req, ['query' => $options]);
    }

}
