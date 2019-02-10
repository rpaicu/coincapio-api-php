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
     * Get a list of all assets
     *
     * @example curl --location --request GET "api.coincap.io/v2/assets" --data ""
     *
     * @param   string|null $search search by asset id (bitcoin) or symbol (BTC)
     * @param   string|null $ids    query with multiple ids=bitcoin,ethereum,monero
     * @param   int|null    $limit  max limit of 2000
     * @param   int|null    $offset offset
     * @return  array
     * @throws  \GuzzleHttp\Exception\GuzzleException
     * @since   0.1
     */
    public function all(string $search = null, string $ids = null, int $limit = null, int $offset = null): array
    {
        // List of all options
        $options = [];

        // If search is set
        if (null !== $search) {
            $options['search'] = $search;
        }

        // If ids is set
        if (null !== $ids) {
            $options['ids'] = $ids;
        }

        // If start is set
        if (null !== $limit) {
            $options['limit'] = $limit;
        }

        // If end is set
        if (null !== $offset) {
            $options['offset'] = $offset;
        }

        $req = new Request('GET', 'assets');
        return $this->doRequest($req, ['query' => $options]);
    }

    /**
     * Get asset by id
     *
     * @param   string $id asset id
     * @return  array
     * @throws  \GuzzleHttp\Exception\GuzzleException
     * @since   0.1
     */
    public function get(string $id): array
    {
        $req  = new Request('GET', \sprintf('assets/%s', $id));
        $data = $this->doRequest($req);
        return \array_shift($data);
    }

    /**
     * Get history of ticker by id
     *
     * @example curl --location --request GET "api.coincap.io/v2/assets/bitcoin/history?interval=d1" --data ""
     *
     * @param   string   $id       asset id
     * @param   string   $interval point-in-time interval. minute and hour intervals represent
     *                             price at that time, the day interval represents average of 24
     *                             hour periods (timezone: UTC)
     *                             Example: m1, m5, m15, m30, h1, h2, h6, h12, d1
     * @param   int|null $start    (optional) UNIX time in milliseconds. omiting will return the most
     *                             recent asset history. If start is supplied, end is required and vice vera
     * @param   int|null $end      (optional) UNIX time in milliseconds. omiting will return the most
     *                             recent asset history. If start is supplied, end is required and vice vera
     * @return  array
     * @throws  Exception
     * @throws  \GuzzleHttp\Exception\GuzzleException
     * @since   0.1
     */
    public function history(string $id, string $interval = '1d', int $start = null, int $end = null): array
    {
        // List of all options
        $options['interval'] = $interval;

        // If start is set
        if (null !== $start) {
            $options['start'] = $start;
        }

        // If end is set
        if (null !== $end) {
            $options['end'] = $end;
        }

        $req = new Request('GET', \sprintf('assets/%s/history', $id));
        return $this->doRequest($req, ['query' => $options]);
    }

    /**
     * Get historical data of some ticker
     *
     * @example curl --location --request GET "api.coincap.io/v2/assets/bitcoin/markets" --data ""
     *
     * @param   string   $id     asset id
     * @param   int|null $limit  max limit of 2000
     * @param   int|null $offset offset
     * @return  array
     * @throws  \GuzzleHttp\Exception\GuzzleException
     * @since   0.9
     */
    public function markets(string $id, int $limit = null, $offset = null): array
    {
        // List of all options
        $options = [];

        // If start is set
        if (null !== $limit) {
            $options['limit'] = $limit;
        }

        // If end is set
        if (null !== $offset) {
            $options['offset'] = $offset;
        }

        $req = new Request('GET', \sprintf('assets/%s/markets', $id));
        return $this->doRequest($req, ['query' => $options]);
    }
}
