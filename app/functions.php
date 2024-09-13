<?php
/**
 * Here is your custom functions.
 */

if (!function_exists('dd')) {
    function dd(...$vars)
    {
        foreach ($vars as $v) {
            var_dump($v);
        }
        exit(1);
    }
}