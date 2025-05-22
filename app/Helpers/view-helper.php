<?php

if (!function_exists('words_limit')) {
    function words_limit($text, $limit = 10, $end = '...')
    {
        $words = explode(' ', strip_tags($text));
        if (count($words) <= $limit) {
            return implode(' ', $words);
        }
        return implode(' ', array_slice($words, 0, $limit)) . $end;
    }
}

if (!function_exists('format_number')) {
    function format_number($number, $decimals = 0)
    {
        return number_format($number, $decimals, ',', '.');
    }
}
