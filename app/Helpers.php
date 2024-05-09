<?php

use Carbon\Carbon;

if (!function_exists('formatDate')) {
    function formatDate($date, $format = 'Y-m-d H:i:s')
    {
        return \Carbon\Carbon::parse($date)->format($format);
    }
}




if (!function_exists('formatDateToWords')) {
    function formatDateToWords($date)
    {
        // Convertir la date en objet Carbon
        $date = Carbon::parse($date);

        return $date->format('d F Y');
    }
}
