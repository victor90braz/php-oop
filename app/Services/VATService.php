<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class VATService
{
    /**
     * @param float $price
     * @return float
     */
    public function calculateVatAmount(float $price): float
    {
        $response = $this->callExternalAPI($price);
        return $response->json('vat_amount');
    }

    /**
     * @param float $price
     * @return \Illuminate\Http\Client\Response
     */
    protected function callExternalAPI(float $price)
    {
        $apiUrl = 'https://vat.abstractapi.com/v1/calculate';
        $apiKey = '2d1cf30f3e364b17ac99d68a4011aea2';
        $countryCode = 'DE';

        return Http::get($apiUrl, [
            'api_key' => $apiKey,
            'amount' => $price,
            'country_code' => $countryCode
        ]);
    }

}
