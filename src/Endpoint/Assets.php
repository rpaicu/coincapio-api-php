<?php

namespace CoinCapIO\Endpoint;

use CoinCapIO\Client;
use CoinCapIO\Exception;
use GuzzleHttp\Psr7\Request;

/**
 * The asset price is a volume-weighted average calculated by collecting Ticker data
 * from exchanges. Each exchange contribues to this price in relation to their volume,
 * meaning higher volume exchanges have more affect on this global price.
 * All values are translated into USD (United States Dollar) and can be translated
 * into other units of measurement through the /rates endpoint.
 *
 * @package CoinCapIO\Endpoint
 * @since   0.1
 */
class Assets extends Client
{
    /**
     * Get all assets
     *
     * @param   array $options
     * @return  array
     * @throws  \GuzzleHttp\Exception\GuzzleException
     */
    public function all(array $options = []): array
    {
        // List of allowed options
        $allowed_options = ['search', 'limit', 'offset'];
        // Check if options is in allowed list of current method
        $this->checkOptions(array_keys($options), $allowed_options);

        $req = new Request('GET', 'assets');
        return $this->doRequest($req, ['query' => $options]);
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
