<?php

namespace SemiorbitSerial;


class SerialNumber
{

    /**
     * Generates an <b>alphanumeric 16 chars Serial Number</b>. Chars could be grouped in 4 seperated segments.
     *
     * @param string $separator none by default
     * @return string example: <b>CVPKRIJ48NZS4JRO</b> or <b>CVPK-RIJ4-8NZS-4JRO</b>
     */

    public static function Generate(string $separator = ''): string
    {

        $base = base_convert(preg_replace('/(0)\.(\d+) (\d+)/', '$3$1$2', microtime()), 10, 36);

        $suffix = '';

        if (($rem = 16 - strlen($base)) > 0)

            for ($i = 0; $i < $rem; $i++) $suffix .= base_convert(mt_rand(0, 35), 10, 36);

        elseif ($rem < 0) $base = substr($base, 0, 16);


        return strtoupper($separator ? static::Format($base . $suffix, $separator) : $base . $suffix);

    }


    /**
     * Returns a formatted Serial Number string width dashes (or selected separator)
     *
     * @param string $serial A Serial Number string to parse
     * @param string $separator
     * @return string in format 'xxxx-xxxx-xxxx-xxxx'
     */

    public static function Format(string $serial, string $separator = '-'): string
    {

        return

            substr($serial, 0, 4) . $separator .

            substr($serial, 8, 4) . $separator .

            substr($serial, 12, 4) . $separator .

            substr($serial, 16, 4)  . $separator;

    }


}