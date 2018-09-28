<?php

namespace CoinCapIO;

use CoincapIO\Endpoint\Assets;

/**
 * @property    Assets $assets - For work with assets (that mean tickers)
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
