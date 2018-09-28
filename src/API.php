<?php

namespace CoinCapIO;

use CoinCapIO\Endpoint\Assets;
use CoinCapIO\Endpoint\Candles;
use CoinCapIO\Endpoint\Exchanges;
use CoinCapIO\Endpoint\Markets;
use CoinCapIO\Endpoint\Rates;

/**
 * @property    Assets $assets - The asset price is a volume-weighted average calculated by collecting Ticker data
 * @property    Candles $candles - The /candles endpoint offers a look into how a market has performed historically
 * @property    Exchanges $exchanges - Where cryptocurrency is being exchanged and offers high-level information on those exchanges.
 * @property    Markets $markets - Take a closer look into exchanges with the /markets endpoint
 * @property    Rates $rates - All prices on the CoinCap
 *
 * Single entry point for all classes
 *
 * @package     CoinCapIO
 * @since       0.1
 */
class API
{
    /**
     * Magic method required for call of another classes
     *
     * @param   string $class
     * @return  bool|object
     */
    public function __get(string $class)
    {
        // By default return is false
        $object = false;

        try {
            // Generate dynamic name of class
            $class = __NAMESPACE__ . '\\Endpoint\\' . ucfirst(strtolower($class));

            // Try to create object by name
            $object = new $class();

            // If object is not created
            if (!\is_object($object)) {
                throw new Exception("Class $class could not to be loaded");
            }

        } catch (Exception $e) {
            // __constructor
        }

        return $object;
    }
}
