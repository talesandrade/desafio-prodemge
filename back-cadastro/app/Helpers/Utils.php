<?php
namespace App\Helpers;

use Exception;
use Illuminate\Support\Facades\Http;

class Utils
{
/**
     * @param array $data
     * @return \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response|Http
     */
    public static function getRequestHttp(array $data)
    {
        return  Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ])->get($data['url'] . "?api_key={$data['valor']}");
    }
}