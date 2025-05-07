<?php

if (!function_exists('format_currency')) {
    function format_currency($amount)
    {
        return number_format($amount, 0, '.', ',') . ' ل.س';
    }
}

if (!function_exists('arabic_date')) {
    function arabic_date($date)
    {
        return \Carbon\Carbon::parse($date)->locale('ar')->isoFormat('LL');
    }
}
