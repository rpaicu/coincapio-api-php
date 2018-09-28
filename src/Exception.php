<?php

namespace CoinCapIO;

/**
 * Class Exception
 * @package CoinCapIO
 * @since   0.1
 */
class Exception extends \RuntimeException
{

    /**
     * @param   string $needle
     * @param   array $array
     * @return  bool
     */
    public static function inArray($needle, $array): bool
    {
        if (!\in_array($needle, $array, true)) {
            throw new self("Parameter '$needle' not in allowed list [" . implode('', $array) . ']');
        }
        return true;
    }

}
