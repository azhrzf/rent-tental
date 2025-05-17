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
