<?php

namespace App;

class Helpers
{
    static function getGapiClient()
    {
        $client = new \Google\Client();
        $client->setAuthConfig(storage_path() . env("GAPI_SERVICE_ACCOUNT_PATH"));
        $client->setScopes(["https://www.googleapis.com/auth/spreadsheets.readonly"]);
        return $client;
    }

    static function getSheetsService()
    {
        $client = self::getGapiClient();
        return new \Google\Service\Sheets($client);
    }

    /**
     * Get the values in a Google Sheets file, using the cache or calling the Google Sheets API
     * 
     * @param key: The key used in the env variables GSHEETS_{key}_ID and GSHEETS_{key}_RANGE that point to the file.
     * @param ttl: The cache time to live, in seconds.
     */
    static function getSheetValues($key, $ttl)
    {
        $values = \Cache::remember('GSHEETS_' . $key, $ttl, function () use ($key, $ttl) {
            $sheets = \App\Helpers::getSheetsService();
            return $sheets->spreadsheets_values->get(env("GSHEETS_" . $key . "_ID"), env("GSHEETS_" . $key . "_RANGE"));
        });
        return $values;
    }
}