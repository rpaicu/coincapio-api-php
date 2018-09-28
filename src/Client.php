<?php declare(strict_types=1);

namespace CoinCapIO;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Request;

class Client
{

    /**
     * @var HttpClient
     */
    private $client;

    /**
     * API constructor.
     *
     * @param   string $version
     * @param   int $timeout
     */
    public function __construct(string $version = 'v2', int $timeout = 3)
    {
        $this->client = new HttpClient([
            'base_uri' => \sprintf('https://api.coincap.io/%s/', $version),
            'timeout' => $timeout,
        ]);
    }

    /**
     * @param   array $options
     * @param   array $allowed_options
     * @return  bool
     * @throws  Exception
     */
    protected function checkOptions(array $options = [], array $allowed_options = []): bool
    {
        array_map(
            function($option) use ($allowed_options) {
                Exception::inArray($option, $allowed_options);
            },
            $options
        );
        return true;
    }

    /**
     * @param   Request $request
     * @param   array $options
     * @return  array
     * @throws  \GuzzleHttp\Exception\GuzzleException
     */
    protected function doRequest(Request $request, array $options = []): array
    {
        try {
            $res = $this->client->send($request, $options);
        } catch (ClientException $e) {
            throw new Exception($e->getMessage(), $e->getCode(), $e);
        }

        try {
            $body = $res->getBody()->getContents();
        } catch (\RuntimeException $e) {
            throw new Exception($e->getMessage(), $e->getCode(), $e);
        }

        return \json_decode($body, true);
    }
}
