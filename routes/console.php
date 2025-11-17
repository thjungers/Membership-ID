<?php

use Illuminate\Support\Facades\Schedule;

// Load in cache data from Google Sheets
Schedule::call(function () {
    $files = ["TRESORERIE", "BADMINTON", "NATATION"];

    foreach ($files as $file) {
        \App\Helpers::getSheetValues($file, env('GAPI_CACHE_TTL'));
    }
})->hourly();