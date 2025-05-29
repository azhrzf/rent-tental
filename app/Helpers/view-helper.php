<?php

use Carbon\Carbon;

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

if (!function_exists('order_status_mapper')) {
    function order_status_mapper($status)
    {
        $statusMap = [
            'paid' => 'Sudah Dibayar',
            'unpaid' => 'Belum Dibayar',
            'returned' => 'Sudah Dikembalikan',
            'need_confirmation' => 'Perlu Konfirmasi',
        ];
        return $statusMap[$status] ?? 'Status Tidak Dikenal';
    }
}