<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/vatservice/{price}/{countryCode}', function ($price, $countryCode) {

    // Get URL parameters
    $urlParameters = [
        'price' => $price,
        'countryCode' => $countryCode,
    ];

    // Get query parameters
    $queryParameters = request()->query();

    // Combine URL and query parameters
    $allParameters = array_merge($urlParameters, $queryParameters);

    // Dump all parameters
    //var_dump($allParameters);

    $apiUrl = 'https://vat.abstractapi.com/v1/calculate';
    $apiKey = 'c4327f82301a41cc917e7bf2791abb69';

    $vatService = new \App\Services\VATService($apiUrl, $apiKey, $countryCode);

    return $vatService->calculateVatAmount($price);
});
