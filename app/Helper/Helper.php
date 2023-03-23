<?php

// use Carbon\Carbon;

if (!function_exists('includeFilesInFolder')) {
    /**
     * Loops through a folder and requires all PHP files
     * Searches sub-directories as well.
     *
     * @param $folder
     */
    function includeFilesInFolder($folder)
    {
        try {
            $rdi = new RecursiveDirectoryIterator($folder);
            $it = new RecursiveIteratorIterator($rdi);

            while ($it->valid()) {
                if (!$it->isDot() && $it->isFile() && $it->isReadable() && $it->current()->getExtension() === 'php') {
                    require $it->key();
                }

                $it->next();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

if (!function_exists('includeRouteFiles')) {

    /**
     * @param $folder
     */
    function includeRouteFiles($folder)
    {
        includeFilesInFolder($folder);
    }
}

if (!function_exists('gcd')) {

    function gcd($x, $y)
    {
        if ($y == 0) return $x;
        return gcd($y, $x % $y);
    }
}

if (!function_exists('printBoolean')) {

    function printBoolean($value)
    {
        if ($value) return "Yes";
        return "No";
    }
}

if (!function_exists('getDayNumber')) {

    function getDayNumber($value)
    {
        switch ($value) {
            case 'sunday':
                return 1;
            case 'monday':
                return 2;
            case 'tuesday':
                return 3;
            case 'wednesday':
                return 4;
            case 'thursday':
                return 5;
            case 'friday':
                return 6;
            case 'saturday':
                return 7;

            default:
                return 0;
        }
    }
}